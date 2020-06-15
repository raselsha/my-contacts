<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title><?php echo $title; ?></title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?php echo base_url(); ?>theme/frontend/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?php echo base_url(); ?>theme/frontend/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url(); ?>theme/frontend/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="header_left">
                <div class="pull-left"><h2><a href=" <?php echo base_url(); ?> ">My contacts</a></h2></div>
            </div>
            <div class="header_right hidden-xs">
                <div class="pull-right">
                    <?php 
                    $id =$this->session->userdata('u_id');
                    $photo = $this->session->userdata('u_photo'); 
                    if ($photo) {
                        echo '<a href="'.base_url().'home/profile"><img src="'.base_url().'theme/frontend/images/'.$id.'_'.$photo.'" width="96" height="96" align="middle"></a>';
                    }
                    else{
                        echo '<img class="img-responsive" src="'.base_url().'theme/frontend/images/default.jpg" width="96">';
                    }

                    ?>
                    
                </div>
                <div class="pull-right">
                    <?php 
                        $name = $this->session->userdata('u_name'); 
                        $mobile = $this->session->userdata('u_mobile');
                        $email = $this->session->userdata('u_email'); 
                        echo '<h4 class="text-right">Welcome, '.$name.'</h4>';
                        echo '<p class="text-right">'.$email.'<p>';
                        echo '<p class="text-right">Date: '.date('d M, Y').'</p>';
                    ?>
                </div>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <?php $this->load->view('frontend/menu'); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>