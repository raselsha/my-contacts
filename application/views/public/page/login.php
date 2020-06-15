<!-- form start -->
<form method="post" action="<?php echo base_url(); ?>login/check_login">
  <fieldset>
    <legend>Login</legend>
    <p class="label">Email</p>
    <input type="text" name="email" value="">
    <?php 
    	$eemail = $this->session->userdata('eemail'); 
    	if ($eemail) {
    		echo '<span class="error">'.$eemail.'</span>';
    		$this->session->unset_userdata('eemail');
    	}
    ?>
    <p class="label">Password</p>
    <input type="password" name="password" value="">
    <?php $epassword = $this->session->userdata('epassword'); 
    	if ($epassword) {
    		echo '<span class="error">'.$epassword.'</span>';
    		$this->session->unset_userdata('epassword');
    	}
    ?>
    <input type="submit" value="Log in">
  </fieldset>
</form>
<p class="form_link">
	<a class="left" href="<?php echo base_url(); ?>register">Create a new account?</a>
	<a class="right" href="<?php echo base_url(); ?>forgot_password">Forgot password ?</a>
</p>
