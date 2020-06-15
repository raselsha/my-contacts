<?php 

Class Home_model extends CI_Model{
	
	public function contacts($id){
	
		$this->db->select('*');
		$this->db->from('contacts');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		$result = $query->result();
		return $result;

	}

	public function count_contacts($id){
		$this->db->select('id');
		$this->db->from('contacts');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		$result = $query->num_rows();
		return $result;
	}

	public function save_contact($data){
		$this->db->select('mobile');
		$this->db->from('contacts');
		$this->db->where('mobile',$data['mobile']);
		$query = $this->db->get();
		$result = $query->row();
		if ($result) {
			return false;
		}
		else{
			$result = $this->db->insert('contacts', $data);
			return true;
		}
		
	}
	public function single_contact($id){
		
		$this->db->select('*');
		$this->db->from('contacts');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	public function update_contact ($data,$id){

		$this->db->where('id',$id);
		$this->db->update('contacts',$data);
		return true;
	
		
	}
	public function delete_contact($id){
		$this->db->where('id', $id);
		$this->db->delete('contacts'); 
	}

	public function profile($id){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	public function edit_profile($id){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	public function update_profile($data,$id){
		$this->db->where('id',$id);
		$result = $this->db->update('user',$data);
		return $result;
	}

	public function check_password($data,$id){
		$this->db->select('password');
		$this->db->from('user');
		$this->db->where('id',$id);
		$this->db->where('password',md5($data['c_password']));
		$query = $this->db->get();
		$result = $query->row();
		if ($result) {
			return true;
		}
		else{
			return false;
		}
		
	}

	public function update_password($password,$id){

		$this->db->set('password',md5($password));
		$this->db->where('id',$id);
		$result  = $this->db->update('user',$data);
		return $result;
	}

	public function export_contacts($id){
		$this->load->dbutil();
		$this->db->select('name,mobile,description');
		$this->db->from('contacts');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		$csv = $this->dbutil->csv_from_result($query);
		$path = './csv_file/user_id_'.$id.'/';
		if(!is_dir($path))
	    {
	      mkdir($path,0755,TRUE);
	    }
	    $path = './csv_file/user_id_'.$id.'/'.date('d-m-Y_h:i:s_a').'.csv';
		if (write_file($path,$csv))
		{
		    return $path;
		}
	}

	public function import_contacts($id,$d_path)
	{		
		$file = fopen($d_path,"r+");
		$count = 0;
		while(!feof($file))
		{	
			$data = fgetcsv($file);
			
			if(sizeof($data)>2){
				if (($data[0]!='name'&& $data[1]!='mobile'&& $data[2]!='description') and ($data[0]!='' && $data[1]!='')) {
				$this->db->select('*');
				$this->db->from('contacts');
				$this->db->where("mobile LIKE '%$data[1]%' and user_id =".$id);
				$query = $this->db->get();
				$result = $query->num_rows();
					if ($result<1) {
						$this->db->set('name',$data[0]);
						$this->db->set('mobile',$data[1]);
						$this->db->set('description',$data[2]);
						$this->db->set('user_id',$id);
						$this->db->insert('contacts');
						$count++;
					}
				}

			}


		}
		fclose($file);
		return $count;
	}
}

?>
