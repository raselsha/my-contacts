
<!-- form start -->
<form method="post" action="<?php echo base_url(); ?>register/account_verification">
	<fieldset>
	    <legend>Verification</legend>
	    <p class="label">Authorization code</p>
	    <input type="text" name="auth_code">
		<?php $e_auth_code=$this->session->userdata('e_auth_code');
			  if ($e_auth_code) {
			  		echo '<span class="error">'.$e_auth_code.'</span>';
			  		$this->session->unset_userdata('e_auth_code');
			  }
		 ?>

	    <p class="label">New password</p>
	    <input type="password" name="password">
		<?php $e_password=$this->session->userdata('e_password');
			  if ($e_password) {
			  		echo '<span class="error">'.$e_password.'</span>';
			  		$this->session->unset_userdata('e_password');
			  }
		 ?>

	    <p class="label">Confirm password</p>
	    <input type="password" name="cn_password">
	    <?php $e_cn_password=$this->session->userdata('e_cn_password');
	    	  if ($e_cn_password) {
	    	  		echo '<span class="error">'.$e_cn_password.'</span>';
	    	  		$this->session->unset_userdata('e_cn_password');
	    	  }
	     ?>

	    <input type="submit" value="Submit">
	  </fieldset>
</form>
<p class="form_link">
	<a class="left" href="<?php echo base_url(); ?>login">Have a account?</a>
	<a class="right" href="<?php echo base_url(); ?>forgot_password">Forgot Password ?</a>
</p>
