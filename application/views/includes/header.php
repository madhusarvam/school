<!DOCTYPE html>
<!--  
  <meta name="description" content="Welcome to niktech software School ERP . we proving school management erp software. we including online attendance with biometric attendance machine and tracking student with GPS technology & many other facilities in our school management erp system">
  <meta name="keywords" content="school,erp,system software,attendance,biometric,online, school management,gps,niktech software solution, online result, online admit card,omr">
  <meta name="author" content="School management System software">
-->
<html lang="en">
<!-- start: HEAD -->
<?php $school_code = $this->session->userdata("school_code");?>
<head>
    <title><?php echo $title; ?></title>
    <!-- start: META -->
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="description" content="Welcome to niktech software School ERP . we proving school management erp software. we including online attendance with biometric attendance machine and tracking student with GPS technology & many other facilities in our school management erp system">
  <meta name="keywords" content="school,erp,system software,attendance,biometric,online, school management,gps,niktech software solution, online result, online admit card,omr">
  <meta name="author" content="School management System software">
    <!-- end: META -->
  
    <!-- start: MAIN CSS -->
    <?php echo $this->load->view($headerCss); ?>
</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body>


<div id="slidingbar-area" style="max-height: 789px;">
        <div id="slidingbar">
            <div class="row">
                <!-- start: SLIDING BAR FIRST COLUMN -->
                <div class="col-md-4 col-sm-4">
                    <h2>My Options</h2>
                    <div class="row">
                        <div class="col-xs-6 col-lg-3">
                            <button class="btn btn-icon btn-block space10">
                                <i class="fa fa-folder-open-o"></i>
                                Projects <span class="badge badge-info partition-red"> 4 </span>
                            </button>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <button class="btn btn-icon btn-block space10">
                                <i class="fa fa-envelope-o"></i>
                                Messages <span class="badge badge-info partition-red"> 23 </span>
                            </button>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <button class="btn btn-icon btn-block space10">
                                <i class="fa fa-calendar-o"></i>
                                Calendar <span class="badge badge-info partition-blue"> 5 </span>
                            </button>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <button class="btn btn-icon btn-block space10">
                                <i class="fa fa-bell-o"></i>
                                Notifications <span class="badge badge-info partition-red"> 9 </span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- end: SLIDING BAR FIRST COLUMN -->
                <!-- start: SLIDING BAR SECOND COLUMN -->
                <div class="col-md-4 col-sm-4">
                    <h2>My Recent Works</h2>
                    <div class="blog-photo-stream margin-bottom-30">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#"><img alt="" src="<?php echo base_url();?>assets/images/image01_th.jpg"></a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="<?php echo base_url();?>assets/images/image02_th.jpg"></a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="<?php echo base_url();?>assets/images/image03_th.jpg"></a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="<?php echo base_url();?>assets/images/image04_th.jpg"></a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="<?php echo base_url();?>assets/images/image05_th.jpg"></a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="<?php echo base_url();?>assets/images/image06_th.jpg"></a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="<?php echo base_url();?>assets/images/image07_th.jpg"></a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="<?php echo base_url();?>assets/images/image08_th.jpg"></a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="<?php echo base_url();?>assets/images/image09_th.jpg"></a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="<?php echo base_url();?>assets/images/image10_th.jpg"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end: SLIDING BAR SECOND COLUMN -->
                <!-- start: SLIDING BAR THIRD COLUMN -->
                <div class="col-md-3 col-sm-3">
                    <h2>My Information</h2>
                <address class="margin-bottom-40">

                    <?php echo $this->session->userdata('name'); ?>

                    <?php if($this->session->userdata('login_type') == 'admin'): ?>
                    	<?php echo $this->session->userdata('your_school_name') ?>
                    	<br/>
                        Address :
                    	<?php echo $this->session->userdata('address_1')." ".$this->session->userdata('address_2'); ?>
                    	<br/>
                    	<?php echo $this->session->userdata('city')." ".$this->session->userdata('state')." - ".$this->session->userdata('pin');?>
                    	<br/>
                    	Contact : <?php echo $this->session->userdata('phone_number').", +91-".$this->session->userdata('mobile_number'); ?>

                    <?php elseif($this->session->userdata('login_type') == 'student'):?>
                    	Class : <?php echo $this->session->userdata('class_id')." ".$this->session->userdata('section'); ?>
                    	<br/>
                    	<?php echo $this->session->userdata('address_1')." ".$this->session->userdata('address_2'); ?>
                    	<br/>
                    	<?php echo$this->session->userdata('city')." ".$this->session->userdata('state')." - ".$this->session->userdata('pin_code');?>
                    	<br/>
                    	Contact : <?php echo "+91-".$this->session->userdata('mobile'); ?>

                    <?php else:?>
                    	Job Category : <?php echo $this->session->userdata('job_category'); ?>
                    	<br/>
                    	<?php echo $this->session->userdata('address_1')." ".$this->session->userdata('address_2'); ?>
                    	<br/>
                    	<?php echo $this->session->userdata('city')." ".$this->session->userdata('state')." - ".$this->session->userdata('pin_code');?>
                    	<br/>
                    	Contact : <?php echo "+91-".$this->session->userdata('mobile'); ?>
                    	<br/>
                    	Email : <?php echo $this->session->userdata('email');?>
                    <?php endif;?>
                </address>
                <?php if($this->session->userdata('login_type') == 'admin'): ?>
                <a class="btn btn-transparent-white" href="<?php echo base_url()?>index.php/adminController/adminProfile">
                <i class="fa fa-pencil"></i> Edit
                </a>
                <?php elseif($this->session->userdata('login_type') == 'employee'): ?>
                <a class="btn btn-transparent-white" href="<?php echo base_url()?>index.php/employeeController/employeeProfile/<?php echo $this->session->userdata("username");?>">
                <i class="fa fa-pencil"></i> Edit
                </a>
                <?php endif;?>
                </div>
                <div class="col-md-1 col-sm-1">
                    	<?php 
                    	  $this->db->where("id",$this->session->userdata("school_code"));
                       $result = $this->db->get("school")->row();
                    	if(strlen($this->session->userdata('photo')) > 1):?>
				    		<?php if($this->session->userdata('login_type') == 'student'): ?>
				        		<img src="<?php echo $this->config->item('asset_url'); ?><?php echo $school_code;?>/images/stuImage/<?php echo $this->session->userdata('photo');?>" class="img-circle" style="margin-top:30px; width:100px;" alt="">
				        	<?php else: ?>
				        		<img src="<?php echo $this->config->item('asset_url'); ?><?php echo $school_code;?>/images/empImage/<?php echo $result->logo;?>" class="img-circle" style="margin-top:30px; width:100px;" alt="">
				        	<?php endif;?>
				        <?php else:?>
				        	<img src="<?php echo $this->config->item('asset_url'); ?><?php echo $school_code;?>/images/anonymous.jpg" class="img-circle" style="margin-top:30px; width:100px;" alt="">
				        <?php endif;?>


                </div>
                <!-- end: SLIDING BAR THIRD COLUMN -->
            </div>
            <div class="row">
                <!-- start: SLIDING BAR TOGGLE BUTTON -->
                <div class="col-md-12 text-center">
                    <a href="#" class="sb_toggle open"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- end: SLIDING BAR TOGGLE BUTTON -->
            </div>
        </div>
    </div>

<div class="main-wrapper">
<!-- start: TOPBAR -->
<header class="topbar navbar navbar-inverse navbar-fixed-top inner">
    <!-- start: TOPBAR CONTAINER -->
    <div class="container">
    <div class="row">
        <div class="col-md-2" style="margin-top:10px"> 
            <a class="sb-toggle-left hidden-md hidden-lg" href="#main-navbar">
            <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="col-md-2" style="margin-top:10px">
            <a style="margin-left:120px;"  href="<?php echo base_url();?>assets/apk/niktech_software.apk" target="_blank"> 
            <span class="button_blink" style="margin-top:-5px;">  Download App </span>
            </a>
        </div>
        <div class="col-md-5">
            <div class="navbar-header">
            
            <!-- start: LOGO -->
            <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/login/">
                <?php echo $this->session->userdata('your_school_name') ?>
            </a>
            
            <!-- end: LOGO -->
            </div>
        </div>
        <div class="col-md-3" style="margin-top:10px">
        <div class="topbar-tools">
            <!-- start: TOP NAVIGATION MENU -->
            <ul class="nav navbar-right">
                <!-- start: USER DROPDOWN -->
                <li class="dropdown current-user">
                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                    	<?php if(strlen($this->session->userdata('photo')) > 1):?>
				    		<?php if($this->session->userdata('login_type') == 'student'): ?>
				        		<img src="<?php echo $this->config->item('asset_url'); ?><?php echo $school_code;?>/images/stuImage/<?php echo $this->session->userdata('photo');?>" class="img-circle" width="30" alt="">
				        	<?php else: ?>
				        		<img src="<?php echo $this->config->item('asset_url'); ?><?php echo $school_code;?>/images/empImage/<?php echo $this->session->userdata('photo');?>" class="img-circle" width="30" alt="">
				        	<?php endif;?>
				        <?php else:?>
				        	<img src="<?php echo base_url()?>assets/images/anonymous.jpg" class="img-circle" width="30" alt="">
				        <?php endif;?>
                        <span class="username hidden-xs"><?php echo $this->session->userdata("name")?></span>
                        <i class="fa fa-caret-down "></i>
                    </a>
                    <ul class="dropdown-menu dropdown-dark">
                        <li>
                        	<?php if($this->session->userdata('login_type') == 'admin'): ?>
		                    	 <a href="<?php echo base_url()?>index.php/adminController/adminProfile">
				                    My Profile
				                </a>
		                    <?php elseif($this->session->userdata('login_type') == 'student'):?>
                            <a href="<?php echo base_url()?>index.php/studentController/studentProfile">
				                    My Profile
				                </a>

		                    <?php else:?>
		                    	 <a href="<?php echo base_url()?>index.php/employeeController/employeeProfile/<?php echo $this->session->userdata("username");?>">
				                    My Profile
				                </a>
		                    <?php endif;?>
                        </li>
                        <!--<li>-->
                        <!--    <a href="<?php //echo base_url();?>pages_calendar.html">-->
                        <!--       My Calender-->
                        <!--    </a>-->
                        <!--</li>-->
                        <?php  $v=$this->session->userdata('username');
						            $abc = $this->db->query("SELECT * FROM message WHERE reciever_id='$v' AND open='n' AND school_code ='$school_code'");
						            $total = $abc->num_rows();
						            $this->db->where("school_code",$school_code);
						            $total1=$this->db->count_all("notice");
						            $totalNoti = $total1 + $total;?>

                        <!--<li>-->
                        <!--    <a href="pages_messages.html">-->

                        <!--    </a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--    <a href="<?php //echo base_url()?>index.php/homeController/lockPage">-->

                        <!--    </a>-->
                        <!--</li>-->
                        <li>
                            <a href="<?php echo base_url()?>index.php/homeController/logout">
                                Log Out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: USER DROPDOWN -->
                <li class="right-menu-toggle">
                    <a href="#" class="sb-toggle-right">
                        <i class="fa fa-globe toggle-icon"></i> <i class="fa fa-caret-right"></i> <span class="notifications-count badge badge-default hide"> <?php  echo $totalNoti;?></span>
                    </a>
                </li>
            </ul>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
        </div>
    </div>
       
       
    </div>
    <!-- end: TOPBAR CONTAINER -->
</header>
<!-- end: TOPBAR -->