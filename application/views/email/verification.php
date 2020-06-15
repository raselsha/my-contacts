
<!DOCTYPE html>
<html>
<head>
	<title>Account verification</title>
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
		<p>To verify your account input this code <strong><?php echo $auth_code; ?></strong> into this <a href="<?php echo base_url(); ?>register/verification"><?php echo base_url(); ?>register/verification</a> verification page</p>
	</div>
</body>
</html>
