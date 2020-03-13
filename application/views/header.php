<?php //echo $u_id = $this->session->userdata('user_id'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Translator</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Translator">
	<meta name="Keyword" content="Translator">
	<meta name="author" content="">
		<script src="<?php echo base_url('front');?>/assets/js/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/icon" href="<?php echo base_url('front');?>/assets/images/favicon.png">
	<link href="<?php echo base_url('front');?>/assets/css/main.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>
  <body>
   <!-- Top Header Start -->
	<div class="top_header">
		<div class="container">
			<div class="header_left">
				<div class="header_contact">
					<div class="contact_list">
						<span class="c_icon"><i class="fas fa-envelope"></i></span>
						<div>
							<p>info@trans.com</p>
						</div>
					</div>
					<div class="contact_list">
						<span class="c_icon"><i class="fas fa-phone-alt"></i></span>
						<div>
							<p>455-5553-996</p>
						</div>
					</div>
				</div>
			</div>
			<div class="header_right">
			 	<div class="social_icons">
				  <a href="#"><i class="fab fa-facebook-f"></i></a>
				  <a href="#"><i class="fab fa-twitter"></i></a>
				  <a href="#"><i class="fab fa-google-plus-g"></i></a>
				  <a href="#"><i class="fab fa-instagram"></i></a>
		 		</div>
			</div>
		</div>
	</div>
	<!-- Top Header End -->
	<!-- Navigation Header start -->
	<div class="navigation_header">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-12">
					<!-- logo Desktop -->
					<div class="header_logo logo_desktop">
						<a href="<?php echo base_url();?>">
							<img src="<?php echo base_url('front');?>/assets/images/site_logo.png" alt="" class="img-fluid">
						</a>
					</div>
					<!-- logo Desktop -->
					<div class="navigation">
						<ul>
							<li><a href="<?php echo base_url();?>">Home</a></li>
							<li><a href="<?php echo base_url('translator');?>">Translator</a></li>
							<li><a href="<?php echo base_url('about');?>">About</a></li>
							<li><a href="<?php echo base_url('contact');?>">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-12">
					<!-- logo Mobile -->
					
					<div class="header_logo logo_mobile">
					
						<a href="index.html">
							<img src="<?php echo base_url('front');?>/assets/images/site_logo.png" alt="" class="img-fluid">
						</a>
					</div>
					<!-- logo Mobile -->
					
					<div class="header_login_rgt">
						<div class="header_login noti_count_dv">
						<?php if($this->session->userdata('user_id')!=""){ 
								if($this->session->userdata('user_group_id')==2){?>
							<a href="#" class="dropdown_btn"><span class="text"><i class="far fa-bell"></i></span>
								<span class="noti_icon" id="notify">0</span></a>
						<?php } 
							}?>	
						<ul class="dropdown_menu">
						<?php  $u_id = $this->session->userdata('user_id'); 
						$nioty = get_notificationall($u_id);
						//print_r($nioty);
						foreach($nioty as $notieee){ 
						//print_r($notieee);
						if($notieee['notification_type']=="user_booking") {
					?> 
					
						<li><a href="<?php echo base_url('vendor/history');?> "><?php print_r(get_user_name($notieee['user_id'])); ?> booked you for translation.</a></li>
					
					<?php } else if($notieee['notification_type']=="user_rating") { ?> 
                     <li><a href="<?php echo base_url('vendor/dashboard');?> "><?php print_r(get_user_name($notieee['user_id'])); ?> has given rating.</a></li>
					<?php } else {?> 
                     <li><a href="#">No Notifications</a></li>
					<?php  } } ?>
											
						</ul>
						</div>
						<div class="header_login">
							<a href="#" class="dropdown_btn"><i class="far fa-user"></i></a>
							<ul class="dropdown_menu">
							    <?php if($this->session->userdata('user_id')!=""){ 
								if($this->session->userdata('user_group_id')==2){?>
								<li><a href="<?php echo base_url('vendor/dashboard');?>">Profile</a></li>
								<li><a href="<?php echo base_url('vendor/history');?>">History</a></li>
								<li><a href="<?php echo base_url('user/User/logout');?>">Logout</a></li>
								<?php } 
								else if($this->session->userdata('user_group_id')==1){?>
								<li><a href="<?php echo base_url('user/dashboard');?>">Profile</a></li>
								<li><a href="<?php echo base_url('user/history');?>">History</a></li>
								<li><a href="<?php echo base_url('user/User/logout');?>">Logout</a></li>
								<?php } }else { ?>
								<li><a href="<?php echo base_url('signup');?>">Register</a></li>
								<li><a href="<?php echo base_url('signin');?>">Login</a></li>
								<?php } ?>
							</ul>
						</div>
						<div class="nav_toggle">
							<i></i>
							<i></i>
							<i></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Navigation header end -->
