<?php 

Class Forgot_password extends CI_Controller{
	
	public function index(){
		$data = array();
		$data['title'] = 'Forgot password';
		$data['content'] = $this->load->view('public/page/forgot_password',$data,true);
		$this->load->view('public/index',$data);
	}

	public function check_email(){
		$email = $this->input->post('email',true);
		$sdata = array();
		
		if(empty($email)){
			$sdata['eemail'] = 'Email is required';
			$this->session->set_userdata($sdata);
			redirect('forgot_password');
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$sdata['eemail'] = 'Please type a valid email address';
			$this->session->set_userdata($sdata);
			redirect('forgot_password');
		}

		else{
			$code=$this->forgot_password_model->check_email($email);
			if ($code) {
				$mdata = array();
				$result=$this->forgot_password_model->get_name($email);
				
				$mdata['to']=$result->email;
				$mdata['user_name']=$result->name;
				$mdata['from']="info@shahadat.website";
				$mdata['name']="My contacts";
				$mdata['auth_code']=$code;
				$mdata['subject'] = "Reset your password";
				
				$this->forgot_password_model->send_email($mdata);

				$sdata['message'] = 'Please check your email to reset password!';
				$this->session->set_userdata($sdata);
				redirect('forgot_password');
			}
			else{
				$sdata['eemail'] = 'This email is not registered';
				$this->session->set_userdata($sdata);
				redirect('forgot_password');
			}
			
		}

	}

	public function reset_password(){
		$data = array();
		$data['title'] = 'Reset password';
		$data['content'] = $this->load->view('public/page/reset_password',$data,true);
		$this->load->view('public/index',$data);
	}

	public function update_password(){
			$data = array();
			$data['auth_code'] = $this->input->post('auth_code',true);
			$data['n_password'] = $this->input->post('n_password',true);
			$data['cn_password'] = $this->input->post('cn_password',true);
			$er=0;
			$sdata = array();
			if(empty($data['auth_code'])){
				$sdata['e_auth_code'] = 'This field is required';
				$sdata['auth_code'] = '';	
				$this->session->set_userdata($sdata);
				$er++;
			}
			elseif (!is_numeric($data['auth_code'])) {
				$sdata['e_auth_code'] = 'Please type authorization code';
				$sdata['auth_code'] = '';	
				$this->session->set_userdata($sdata);
				$er++;
			}
			elseif(!empty($data['auth_code'])) {
				$result  =  $this->forgot_password_model->check_auth_code($data);

				if($result==true){
					$sdata['e_auth_code'] = '';
					$sdata['auth_code'] = $data['auth_code'];
					$this->session->set_userdata($sdata);
				}
				else{
					$sdata['e_auth_code'] = 'This code is not valid';
					$this->session->set_userdata($sdata);
					$er++;
				}

			}

			if(empty($data['n_password'])){
				$sdata['e_n_password'] = 'This field is required';
				$this->session->set_userdata($sdata);
				$er++;
			}

			if(empty($data['cn_password'])){
				$sdata['e_cn_password'] = 'This field is required';
				$this->session->set_userdata($sdata);
				$er++;
			}

			if ($data['n_password'] != $data['cn_password']) {
				$sdata['e_n_password'] = 'This field is required';
				$sdata['e_cn_password'] = 'This field is required';
				$sdata['exception'] = 'Both password are not matched';
				$this->session->set_userdata($sdata);
				$er++;
				
			}

			if($er==0){
				$result = $this->forgot_password_model->update_password($data);
				if($result==true){
					$sdata['message'] = 'Password has been changed';
					$this->session->set_userdata($sdata);
					redirect('login');
				}
				else{
					$sdata['exception'] ='Password can not be updated';
					$this->session->set_userdata($sdata);
					redirect('forgot_password/reset_password');
				}
			}
			else{
				
				redirect('forgot_password/reset_password');
			}
		}

}



?>