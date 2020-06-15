<!-- form start -->
<form method="post" action="<?php echo base_url(); ?>forgot_password/check_email">
  <fieldset>
    <legend>Forgot password</legend>
    <p class="label">Email</p>
    <input type="text" name="email" value="">
	    <?php 
	    	$eemail = $this->session->userdata('eemail'); 
	    	if ($eemail) {
	    		echo '<span class="error">'.$eemail.'</span>';
	    		$this->session->unset_userdata('eemail');
	    	}
	    ?>
    <input type="submit" value="Submit">
  </fieldset>
</form>
<p class="form_link">
	<a class="left" href="<?php echo base_url(); ?>login">Have an account?</a>
	<a class="right" href="<?php echo base_url(); ?>register">Create a new account?</a>
</p>
