<?php 

Class Register_model extends CI_Model{
	
	public function new_user($data){

		$this->db->select('email');
		$this->db->from('user');
		$this->db->where('email',$data['email']);
		$query=$this->db->get();
		$result = $query->row();
		if ($result) {
			return false;
		}
		else{
			$result=$this->db->insert('user',$data);
			$id = $this->db->insert_id();
			$code = $id.rand();
			$this->db->set('auth_code',md5($code));
			$this->db->where('email',$data['email']);
			$this->db->update('user');
			return $code;
		}
	}

	Public function send_mail($mdata){
		
		$this->email->set_mailtype('html');
		$this->email->from($mdata['from'], $mdata['name']);
		$this->email->to($mdata['to']);
		$this->email->subject($mdata['subject']);
		$body = $this->load->view('email/verification',$mdata,true);
		
		$this->email->message($body);
		$this->email->send();
		$this->email->clear();
		
	}

	Public function get_auth($data){
		$auth_code = md5($data['auth_code']);
		$this->db->select('auth_code');
		$this->db->from('user');
		$this->db->where('auth_code',$auth_code);
		$query = $this->db->get();
		$result = $query->row();
		
		if($result->auth_code){
			return true;
		}
		else{
			return false;
		}
		
	}

	Public function account_verified($data){
		
		$this->db->set('password', md5($data['cn_password']));
		$this->db->set('status',1);
		$this->db->where('auth_code',md5($data['auth_code']));
		$this->db->update('user');
	}
}



?>