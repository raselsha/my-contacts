<?php 

Class Forgot_password_model extends CI_Model{
	
	public function check_email($email){
		$this->db->select('email,id');
		$this->db->from('user');
		$this->db->where('email',$email);
		$query = $this->db->get();
		$result = $query->row();
		if($result) {
			$code = $result->id.rand();
			$this->db->set('auth_code',md5($code));
			$this->db->where('email',$email);
			$this->db->update('user');
			return $code;

		}
		else{
			return false;
		}
	}
	
	public function get_name($email){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email',$email);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	public function send_email($mdata){
		
		$this->email->set_mailtype('html');
		$this->email->from($mdata['from'], $mdata['name']);
		$this->email->to($mdata['to']);
		$this->email->subject($mdata['subject']);
		$body = $this->load->view('email/forgot_password',$mdata,true);
		$this->email->message($body);
		$this->email->send();
		$this->email->clear();

	}

	public function  check_auth_code($data){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('auth_code',md5($data['auth_code']));
		$query = $this->db->get();
		$result = $query->row();
		if ($result) {
			return true;
		}
		else{
			return false;
		}
	}

	public function update_password($data){
		$this->db->set('password',md5($data['cn_password']));
		$this->db->where('auth_code',md5($data['auth_code']));
		$this->db->update('user');
		return true;
	}

}

?>