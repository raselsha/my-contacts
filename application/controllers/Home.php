<?php 

Class Home extends CI_Controller{
	
	public function __construct() {
       parent::__construct();
       $id =$this->session->userdata('u_id');
       if ($id=='') {
       		redirect('login');
       }
   }

	public function index(){
		$data = array();
		$data['title'] = 'Contacts';
		$id = $this->session->userdata('u_id');
		$data['contacts']=$this->home_model->contacts($id);
		$data['count_contacts']=$this->home_model->count_contacts($id);
		$data['content'] = $this->load->view('frontend/page/home',$data,true);
		$this->load->view('frontend/index',$data);
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('mobile');
		$this->session->unset_userdata('description');
	}

	public function log_out(){

		$this->session->unset_userdata('u_id');
		$this->session->unset_userdata('u_name');
		$this->session->unset_userdata('u_mobile');
		$this->session->unset_userdata('u_email');
		$this->session->unset_userdata('u_status');
		redirect('login');

	}
	public function new_contact(){
		$data = array();
		$data['title'] = 'New contact';
		$data['content'] = $this->load->view('frontend/page/new_contact',$data,true);
		$this->load->view('frontend/index',$data);

	}
	public function save_contact(){
		$data = array();
		$data['name'] = $this->input->post('name');
		$data['mobile'] = $this->input->post('mobile');
		$data['description'] = $this->input->post('description');
		$data['user_id'] = $this->session->userdata('u_id');
		$sdata = array();
		$er = 0;
		if($data['name']==''){
			$sdata['ename'] = "This field is required";
			$sdata['name'] = '';
			$this->session->set_userdata($sdata);
			$er++;
		}
		else{
			$sdata['name'] = $data['name'];
			$sdata['ename']='';
			$this->session->set_userdata($sdata);
		}
		if($data['mobile']==''){
			$sdata['emobile'] = 'This field is required';
			$sdata['mobile']='';
			$this->session->set_userdata($sdata);
			$er++;	
		}
		else{
			$sdata['mobile'] = $data['mobile'];
			$sdata['emobile'] = '';
			$this->session->set_userdata($sdata);
		}
		if($data['description']==''){
			$sdata['description'] = '';
			$this->session->unset_userdata('description');

		}
		else{
			$sdata['description'] = $data['description'];
			$this->session->set_userdata($sdata);
		}

		if($er==0){
		$result = $this->home_model->save_contact($data);
			if($result==true){
				$sdata['message'] = "Contact has been saved";
				$this->session->set_userdata($sdata);
				$this->session->unset_userdata('name');
				$this->session->unset_userdata('mobile');
				$this->session->unset_userdata('description');
				redirect('home/new_contact');
			}
			else{
				$sdata['exception'] = "This Contact already exists";
				$this->session->set_userdata($sdata);
				redirect('home/new_contact');
			}
		}
		else{
			redirect('home/new_contact');
		}
	}

	public function single_contact($id){
		$data = array();
		$data['title'] = 'Single contact';
		$data['single_contact'] = $this->home_model->single_contact($id);
		$data['content'] = $this->load->view('frontend/page/single_contact',$data,true);  
		$this->load->view('frontend/index',$data);
	}

	public function edit_contact($id){

		$data = array();
		$data['title'] = 'Edit contact';
		$data['single_contat'] = $this->home_model->single_contact($id);
		$data['content'] = $this->load->view('frontend/page/edit_contact',$data,true);
		$this->load->view('frontend/index',$data);

	}

	public function update_contact($id){
		$data = array();
		$data['name'] = $this->input->post('name');
		$data['mobile'] = $this->input->post('mobile');
		$data['description'] = $this->input->post('description');
		$data['user_id'] = $this->session->userdata('u_id');

		$sdata = array();
		$er = 0;
		if($data['name']==''){
			$sdata['ename'] = "This field is required";
			$this->session->set_userdata($sdata);
			$er++;
		}
		else{
			$sdata['name'] = $data['name'];
			$sdata['ename']='';
			$this->session->set_userdata($sdata);
		}
		if($data['mobile']==''){
			$sdata['emobile'] = 'This field is required';
			$sdata['mobile']='';
			$this->session->set_userdata($sdata);
			$er++;	
		}
		else{
			$sdata['mobile'] = $data['mobile'];
			$sdata['emobile'] = '';
			$this->session->set_userdata($sdata);
		}


		if($er==0){
		$result = $this->home_model->update_contact($data,$id);
			if($result==true){
				$sdata['message'] = "Contact has been Updated";
				$this->session->set_userdata($sdata);
				redirect('home/edit_contact/'.$id);
			}
			else{
				$sdata['exception'] = "This Contact already exists";
				$this->session->set_userdata($sdata);
				redirect('home/edit_contact/'.$id);
			}
		}
		else{
			redirect('home/edit_contact/'.$id);
		}

	}

	public function delete_contact($id){
		$data = array();
		$data['title'] = 'Delete contact';
		$data['single_contact'] = $this->home_model->single_contact($id);
		$data['content'] = $this->load->view('frontend/page/delete_contact',$data,true);  
		$this->load->view('frontend/index',$data);
	}

	public function	delete_confirm($id){
		$this->home_model->delete_contact($id);
		redirect('home');
	}

	Public function profile(){
		$data = array();
		$data['title'] = 'Profile';
		$id= $this->session->userdata('u_id');
		$data['profile'] = $this->home_model->profile($id);
		$data['content'] = $this->load->view('frontend/page/profile',$data,true); 
		$this->load->view('frontend/index',$data);

	}

	public function edit_profile(){
		$data = array();
		$data['title'] = 'Edit Profile';
		$id= $this->session->userdata('u_id');
		$data['profile'] = $this->home_model->edit_profile($id);
		$data['content'] = $this->load->view('frontend/page/edit_profile',$data,true); 
		$this->load->view('frontend/index',$data);

	}

	Public function update_profile(){
		$data = array();
		$id= $this->session->userdata('u_id');

		$data['name'] = $this->input->post('name');
		$data['mobile'] = $this->input->post('mobile');
		$data['email'] = $this->input->post('email');
		$data['photo'] = $_FILES['photo']['name'];
		$tmp_name = $_FILES['photo']['tmp_name'];
		$pro_pic = $this->input->post('pro_pic');

		if ($data['photo']=='') {
			$data['photo'] = $pro_pic;
		}

		$sdata = array();
		$er = 0;
		if($data['name']==''){
			$sdata['ename'] = 'This is required field';
			$sdata['name'] = '';
			$this->session->set_userdata($sdata);
			$er++;
		}
		else{
			$sdata['name'] = $data['name'];
			$sdata['ename']='';
			$this->session->set_userdata($sdata);
		}
		if($data['mobile']==''){
			$sdata['emobile'] = 'This is required field';
			$sdata['mobile'] = '';
			$this->session->set_userdata($sdata);
			$er++;
		}
		else{
			$sdata['mobile'] = $data['mobile'];
			$sdata['emobile'] = '';
			$this->session->set_userdata($sdata);
		}
		if($data['email']==''){
			$sdata['eemail'] = 'This is required field';
			$sdata['email'] = '';
			$this->session->set_userdata($sdata);
			$er++;
		}
		else{
			$sdata['email'] = $data['mobile'];
			$sdata['eemail'] = '';
			$this->session->set_userdata($sdata);
		}
		if($er==0){
			$result = $this->home_model->update_profile($data,$id);
			if($result){
				
				$d_path = 'theme/frontend/images/'.$id.'_'.$data['photo'];
				move_uploaded_file($tmp_name, $d_path);
				$sdata['message'] = 'Profile has been updated';
				$sdata['u_photo']=$data['photo'];
				$this->session->set_userdata($sdata);
				redirect('home/edit_profile','refresh');
			}
			else{
				$sdata['exception'] = 'Profile has not been updated';
				$this->session->set_userdata($sdata);
				redirect('home/edit_profile');
			}
		}
		else{
			redirect('home/edit_profile');
		}
	}

	Public function change_password(){
		$data = array();
		$data['title'] = 'Change Password';
		$data['content'] = $this->load->view('frontend/page/change_password',$data,true); 
		$this->load->view('frontend/index',$data);	 
	}

	Public function update_password(){
		$data = array();
		$id= $this->session->userdata('u_id');

		$data['c_password'] = $this->input->post('c_password');
		$data['n_password'] = $this->input->post('n_password');
		$data['cn_password'] = $this->input->post('cn_password');
		$er=0;
		$sdata = array();
		if($data['c_password'] ==''){
			$sdata['e_c_password'] = 'This field is required';
			$this->session->set_userdata($sdata);
			$er++;
		}

		if($data['n_password'] ==''){
			$sdata['e_n_password'] = 'This field is required';
			$this->session->set_userdata($sdata);
			$er++;
		}

		if($data['cn_password'] ==''){
			$sdata['e_cn_password'] = 'This field is required';
			$this->session->set_userdata($sdata);
			$er++;
		}

		if ($data['c_password']!='') {
			$result  =  $this->home_model->check_password($data,$id);

			if($result==false){
				$sdata['e_c_password'] = 'Current password not correct';
				$this->session->set_userdata($sdata);
				$er++;
			}
		}

		if ($data['n_password'] != $data['cn_password']) {
			
			$sdata['e_cn_password'] = 'New password and confirm password not matched';
			$this->session->set_userdata($sdata);
			$er++;
			
		}

		if($er==0){
			$password=$data['cn_password'];
			$result = $this->home_model->update_password($password,$id);
			if($result){
				$sdata['message'] = 'Password has been updated';
				$this->session->set_userdata($sdata);
				redirect('home/change_password');
			}
		}
		else{
				redirect('home/change_password');
		}
	}

	public function export()
	{	
		$data = array();
		$data['title'] = "Export contacts";
		$id = $this->session->userdata('u_id');
		$data['total_contacts']=$this->home_model->count_contacts($id);
		$data['content'] = $this->load->view('frontend/page/export',$data,true);
		$this->load->view('frontend/index',$data);
	}

	public function export_contacts()
	{	$sdata = array();
		$this->load->helper('download');
		$id = $this->session->userdata('u_id');
		$result=$this->home_model->export_contacts($id);
		if ($result) {
			$data = file_get_contents($result);
			$name = 'my_contacts.csv';
			force_download($name, $data);
			redirect('home/export');
		}
		else{
			$sdata['exception'] = 'Your file is now downloading. If not start automatically, download <a href="'.$result.'" target="_blank">directly...</a>';
			$this->session->set_userdata($sdata);
		}
		redirect('home/export');
	}

	public function import()
	{	
		$data = array();
		$data['title'] = "Import contacts";
		$id = $this->session->userdata('u_id');
		$data['content'] = $this->load->view('frontend/page/import',$data,true);
		$this->load->view('frontend/index',$data);
	}

	public function import_contacts(){
		$sdata = array();
		$id = $this->session->userdata('u_id');
		$data['csv'] = $_FILES['csv']['name'];
		$file = $_FILES['csv']['tmp_name'];
		$d_path = './csv_file/user_id_'.$id.'/'.$data['csv'];
		$path_parts = pathinfo($d_path);
		$extension =strtolower($path_parts['extension']);
		if ($extension=='csv'){
			move_uploaded_file($file, $d_path);
			$result=$this->home_model->import_contacts($id,$d_path);
			unlink($d_path);
			$sdata['message'] = 'Total '.$result.' contacts imported!';
			$this->session->set_userdata($sdata);
			redirect('home/import');
		}
		else{
			echo "Please select and valid .csv file";
			$sdata['exception'] = 'Extetion did not not match';
			$this->session->set_userdata($sdata);
			redirect('home/import');
		}
		

	}
}






?>