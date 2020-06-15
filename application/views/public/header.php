<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
	<meta name="author" content="Shahadat Hossain">
	<meta name="keywords" content="contacts,contact list,contacts management">
	<meta name="description" content="This is a contact list management application that will hold your emargency mobile number.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>theme/public/css/style.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo base_url(); ?>theme/public/css/responsive.css" rel='stylesheet' type='text/css' />
</head>
<body>

	<header>
		<div class="logo">
			<h2>My contacts</h2>
		</div>
	</header>

	<div class="container">	
		<div class="form">
			<div class="notification">
				<?php 
					$exception=$this->session->userdata('exception');
					if ($exception) {
						echo '<span class="error">'.$exception.'</span>';
						$this->session->unset_userdata('exception');
					}
					$message=$this->session->userdata('message');
					if ($message) {
						echo '<span class="success">'.$message.'</span>';
						$this->session->unset_userdata('message');
					}
				?>
			</div>