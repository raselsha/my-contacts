
<!-- form start -->
<form method="post" action="<?php echo base_url(); ?>forgot_password/update_password">
  <fieldset>
    <legend>Reset password</legend>
    <p class="label">Authorization code</p>
    <input type="text" class="form-control"  name="auth_code" 
      value="<?php $auth_code=$this->session->userdata('auth_code');
      	if ($auth_code) {
      		echo $auth_code;
      	}
       ?>" >
    <?php 
    	$e_auth_code = $this->session->userdata('e_auth_code');
    	if ($e_auth_code) {
    	    echo '<span class="error">'.$e_auth_code.'</span>';
    	    $this->session->unset_userdata('e_auth_code');
    	}
    ?>

    <p class="label">New password</p>
    <input type="password" class="form-control" name="n_password" placeholder=""/>
    <?php 
        $e_n_password = $this->session->userdata('e_n_password');
        if ($e_n_password) {
            echo '<span class="error">'.$e_n_password.'</span>';
            $this->session->unset_userdata('e_n_password');
        }
    ?>

    <p class="label">Confirm password</p>
    <input type="password" class="form-control" name="cn_password" placeholder="" />
    <?php 
        $e_cn_password = $this->session->userdata('e_cn_password');
        if ($e_cn_password) {
            echo '<span class="error">'.$e_cn_password.'</span>';
            $this->session->unset_userdata('e_cn_password');
        }
    ?>

    <input type="submit" value="Submit">
  </fieldset>
</form>
<p class="form_link">
	<a class="left" href="<?php echo base_url(); ?>register">Create a new account?</a>
	<a class="right" href="<?php echo base_url(); ?>login">Have an account</a>
</p>
