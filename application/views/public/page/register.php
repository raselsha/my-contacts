
<!-- form start -->
<form method="post" action="<?php echo base_url(); ?>register/new_user">
	  <fieldset>
	    <legend>Registration</legend>
	    <p class="label">Name</p>
	    <input type="text" name="name" value="<?php echo $this->session->userdata('name'); ?>">
	    <?php $ename=$this->session->userdata('ename');
				  if ($ename) {
				  		echo '<span class="error">'.$ename.'</span>';
				  		$this->session->unset_userdata('ename');
				  }
			 ?>
	    <p class="label">Mobile</p>
	    <input type="text" name="mobile" value="<?php echo $this->session->userdata('mobile'); ?>">
	    <?php $emobile=$this->session->userdata('emobile');
	    	  if ($emobile) {
	    	  		echo '<span class="error">'.$emobile.'</span>';
	    	  		$this->session->unset_userdata('emobile');
	    	  }
	     ?>

	     <p class="label">Email</p>
	     <input type="text" name="email" value="<?php echo $this->session->userdata('email'); ?>">
	     <?php $eemail=$this->session->userdata('eemail');
	     	  if ($eemail) {
	     	  		echo '<span class="error">'.$eemail.'</span>';
	     	  		$this->session->unset_userdata('eemail');
	     	  }
	      ?>
	      <p class="label">What is the sum <?php echo $a.'+'.$b.'='; ?> ?</p>
	      <input type="text" name="sum">
	      <input type="hidden" name="sum_result" value="<?php echo $c; ?>">
	      <?php $esum=$this->session->userdata('esum');
	      	  if ($esum) {
	      	  		echo '<span class="error">'.$esum.'</span>';
	      	  		$this->session->unset_userdata('esum');
	      	  }
	       ?>

	    <input type="submit" value="Submit">
	  </fieldset>
	</form>
	<p class="form_link">
		<a class="left" href="<?php echo base_url(); ?>login">Have an account?</a>
		<a class="right" href="<?php echo base_url(); ?>forgot_password">Forgot Password ?</a>
	</p>
