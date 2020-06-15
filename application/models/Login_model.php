<?php 

Class Login_model extends CI_Model{
		
	Public function check_login($email,$password){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email',$email);
		$this->db->where('password',md5($password));
		$query = $this->db->get();
		$result = $query->row();
		
		return $result;
	}
}



?>