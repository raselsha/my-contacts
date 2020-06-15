<?php 
defined('BASEPATH') or exit('No direct script access allowed');

Class Login extends CI_Controller{
	
	public function __construct() {
       parent::__construct();
       $id =$this->session->userdata('u_id');
       if ($id!='') {
       		redirect('home');
       }
   }

	Public function index(){
		$data = array();
		$data['title'] = 'Member Login';
		$data['content'] = $this->load->view('public/page/login',$data,true);
		$this->load->view('public/index',$data);
	}
	Public function check_login(){
		$email = $this->input->post('email',true);
		$password = $this->input->post('password',true);
		$sdata = array();
		$er = 0;

		if(empty($email)){
			$sdata['eemail'] = 'Email is required';
			$this->session->set_userdata($sdata);
			$er++;
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$sdata['eemail'] = 'Please type your email address';
			$this->session->set_userdata($sdata);
			$er++;
		}
		
		if(empty($password)){
			$sdata['epassword'] = 'Pssword is required';
			$this->session->set_userdata($sdata);
			$er++;
		}

		if($er==0){
			$result = $this->login_model->check_login($email,$password);
			
			if($result){
				$sdata['u_id']=$result->id;
				$sdata['u_name']=$result->name;
				$sdata['u_mobile']=$result->mobile;
				$sdata['u_email']=$result->email;
				$sdata['u_photo']=$result->photo;
				$sdata['u_status']=$result->status;
				$this->session->set_userdata($sdata);
				redirect('home');
			}
			else{
				$sdata['exception'] = "Invalid email and password";
				$this->session->set_userdata($sdata);
				redirect('login');
			}	
		}
		else{
			$sdata['exception'] = "Please type your email and password!";
			$this->session->set_userdata($sdata);
			redirect('login');
		}
	}
}

 ?>