<?php 

Class Register extends CI_Controller{
	
	public function index(){
		$data = array();
		$data['title'] = 'Register';
		$data['a'] = rand(1,9); 
		$data['b'] = rand(1,9);
		$data['c'] = $data['a']+ $data['b'];
		$data['content'] = $this->load->view('public/page/register',$data,true);
		$this->load->view('public/index',$data);
}
	public function new_user(){
		$data = array();
		$data['name'] = $this->input->post('name',true);
		$data['mobile'] = $this->input->post('mobile',true);
		$data['email'] = $this->input->post('email',true);
		$data['status'] = 0;
		$sum = $this->input->post('sum',true);
		$sum_result = $this->input->post('sum_result');
		$sdata = array();
		$er = 0;
		
		if(empty($data['name'])){
			$sdata['ename'] = 'This field is required';
			$sdata['name'] = '';
			$this->session->set_userdata($sdata);
			$er++;
		}
		elseif (is_numeric($data['name'])) {
			$sdata['ename'] = 'Please type your full name';
			$sdata['name'] = '';
			$this->session->set_userdata($sdata);
			$er++;
		}
		else{
			$sdata['ename'] = '';
			$sdata['name'] = $data['name'];
			$this->session->set_userdata($sdata);
		}

		if(empty($data['mobile'])){
			$sdata['emobile'] = 'This field is required';
			$sdata['mobile'] = '';
			$this->session->set_userdata($sdata);
			$er++;
		}
		elseif (!is_numeric($data['mobile'])) {
			$sdata['emobile'] = 'Please type your mobile number';
			$sdata['mobile'] = '';
			$this->session->set_userdata($sdata);
			$er++;
		}
		else{
			$sdata['emobile'] = '';
			$sdata['mobile'] = $data['mobile'];
			$this->session->set_userdata($sdata);
		}
		if(empty($data['email'])){
			$sdata['eemail'] = 'This field is required';
			$sdata['email'] = '';
			$this->session->set_userdata($sdata);
			$er++;
		}
		elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$sdata['eemail'] = 'Please type your email address';
			$sdata['email'] = '';
			$this->session->set_userdata($sdata);
			$er++;
		}
		else{
			$sdata['eemail'] = '';
			$sdata['email'] = $data['email'];
			$this->session->set_userdata($sdata);
		}
		if(empty($sum)){
			$sdata['esum'] = 'This field is required';
			$this->session->set_userdata($sdata);
			$er++;
		}
		elseif (!is_numeric($sum)) {
			$sdata['esum'] = 'Please type correct value';
			$this->session->set_userdata($sdata);
			$er++;
		}
		elseif($sum!= $sum_result){
			$sdata['esum'] = 'This is not correct answer';
			$this->session->set_userdata($sdata);
			$er++;
		}
		if($er==0){
			$auth_code  = $this->register_model->new_user($data);
			if ($auth_code!=false) {
				$mdata = array();

				$mdata['to'] = $data['email'];
				$mdata['user_name']=$data['name'];
				$mdata['from']="info@shahadat.website";
				$mdata['name']="My contacts";
				$mdata['subject'] = "Email verification";
				$mdata['auth_code'] = $auth_code;
				$this->register_model->send_mail($mdata);
				$sdata['message']= 'Please check your email for verification';
				$this->session->set_userdata($sdata);
				$this->session->unset_userdata('name');
				$this->session->unset_userdata('mobile');
				$this->session->unset_userdata('email');
				redirect('register');
			}
			else{
				$sdata['eemail'] = 'This email already exists';
				$sdata['email'] = $data['email'];
				$this->session->set_userdata($sdata);
				$sdata['exception']= 'Please try with new email';
				$this->session->set_userdata($sdata);
				redirect('register');
			}

		}
		else{
			$sdata['exception']= 'Please fill required fields!';
			$this->session->set_userdata($sdata);
			redirect('register');
		}
	}

	public function verification(){
		$data = array();
		$data['title'] = 'Verification';
		$data['content'] = $this->load->view('public/page/verification',$data,true);
		$this->load->view('public/index',$data);
	}

	public function account_verification(){
		$data = array();
		$data['auth_code'] = $this->input->post('auth_code');
		$data['password'] = $this->input->post('password');
		$data['cn_password'] = $this->input->post('cn_password');
		$sdata = array();
		$er = 0;
		if($data['auth_code']==''){
			$sdata['e_auth_code'] = 'This field is required';
			$this->session->set_userdata($sdata);
			$er++;
		}
		else{
			$result = $this->register_model->get_auth($data);
			if ($result!=true) {
				$sdata['e_auth_code'] = 'Your code is not correct';
				$this->session->set_userdata($sdata);
				$er++;
			}
			
		}	
		if($data['password']==''){
			$sdata['e_password'] = 'This field is required';
			$this->session->set_userdata($sdata);
			$er++;
		}
		if($data['cn_password']==''){
			$sdata['e_cn_password'] = 'This field is required';
			$this->session->set_userdata($sdata);
			$er++;
		}
		
		if($data['password'] != $data['cn_password']){
			$sdata['e_cn_password'] = 'password not match';
			$this->session->set_userdata($sdata);
			$er++;
		}
		if($er==0){
			$this->register_model->account_verified($data);
			$sdata['message']='You are successfully registered.Please login to your accout';
			$this->session->set_userdata($sdata);
			redirect('register/verification');
		}
		else{
			$sdata['exception'] = 'You entered wrong information';
			$this->session->set_userdata($sdata);
			redirect('register/verification');
		}
	}
}



?>