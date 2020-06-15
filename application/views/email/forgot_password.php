<!DOCTYPE html>
<html>
<head>
	<title>Forgot password</title>
	<style type="text/css">
	body{
		font-family: vendara;
	}
	.content{
		width: 550px;
		margin: 0 auto;
	}
	</style>
</head>
<body>
	<div class="header">
		<h2>My contacts</h2>
		<hr>
	</div>
	<div class="content">
		<p>Hello,<?php echo $user_name; ?>.</p>
		<p>To reset your password! please input this Athorization code <strong><?php echo $auth_code; ?></strong> into this <a href="<?php echo base_url(); ?>forgot_password/reset_password"><?php echo base_url(); ?>forgot_password/reset_password</a> page</p>
	</div>
</body>
</html>