<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<!-- Favicon and touch icons -->
<link rel="apple-touch-icon" sizes="60x60" href="http://www.sme4.me/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="http://www.sme4.me/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="http://www.sme4.me/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="http://www.sme4.me/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="http://www.sme4.me/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="http://www.sme4.me/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="http://www.sme4.me/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="http://www.sme4.me/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="http://www.sme4.me/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="http://www.sme4.me/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="http://www.sme4.me/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="http://www.sme4.me/favicon-16x16.png">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title> Smart Money Encyclopedia</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <link href="<?php echo site_url();?>assets/profile/css/bootstrap.min.css" rel="stylesheet" />

    <link href="<?php echo site_url();?>assets/profile/css/animate.min.css" rel="stylesheet"/>

    <link href="<?php echo site_url();?>assets/profile/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <link href="<?php echo site_url();?>assets/profile/css/demo.css" rel="stylesheet" />


    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo site_url();?>assets/profile/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <!--   Core JS Files   -->
    <script src="<?php echo site_url();?>assets/profile/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo site_url();?>assets/profile/js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo site_url();?>assets/login/js/city_state.js"></script>

     

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="<?php echo site_url();?>assets/profile/img/sidebar-3.jpg">

    

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo site_url('home');?>" class="simple-text">
                    SME4ME
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="myopportunities">
                        <i class="pe-7s-graph"></i>
                        <p>My Opportunities</p>
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                
                </li>
				<li class="active-pro">
                    <a href="dashboard">
                        <i class="pe-7s-rocket"></i>
                        <p>Opportunities</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">My Profile</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        
                        <!-- <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li> -->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                        <li>
                            <a href="<?php echo site_url('Main/Dashboard/logout');?>">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                    <?php echo show_notification(); ?>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                                <br>
                                <h6><em>*</em> Please note that you will be required to sign in again if you change your email address.</h6>
                            </div>
                            <div class="content">
                                <form method="post" action="<?php echo site_url('Main/Profile/edit/'.$userid); ?>">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Company (disabled)</label>
                                                <input type="text" class="form-control" disabled placeholder="Company" value="SME4ME Inc.">
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" placeholder="Username" value="Suanu123">
                                            </div>
                                        </div> -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="editprofile[email]" class="form-control" placeholder="Email" value="<?php echo $username ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        if ($accesslevel == '1') {
                                              
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="editprofile[firstname]" class="form-control" placeholder="First Name" value="<?php echo $firstname ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="editprofile[lastname]" class="form-control" placeholder="Last Name" value="<?php echo $lastname ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }else{
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" name="editprofile[fullname]" class="form-control" placeholder="Full Name" value="<?php echo $fullname ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="editprofile[password]" class="form-control" placeholder="Enter a new password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <br>
                                                <select size="1" data-var="<?php echo $country ?>" id="nat" required name="editprofile[country]">
                                                <option value="" selected="selected">--Select--</option>
                                                <script type="text/javascript">
                                                  setCountries(this);
                                                </script>
                                                </select>
                                                <!-- <input type="text" name="editprofile[country]" value="<?php echo $country ?>" class="form-control" placeholder="Enter a phone number"> -->
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" disabled class="form-control" placeholder="Here can be your description" value="Mike">You can use this section once we are done working on it!.</textarea>
                                            </div>
                                        </div>
                                    </div> -->

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <hr>
                            <div class="text-center">
                                <h4 class="title">
                                        <?php
                                            if ($accesslevel == '1') {
                                        ?>
                                        <?php echo 'Hello ' . $firstname . ' ' . $lastname ?>
                                        <?php
                                            }else{
                                        ?>
                                        <?php echo 'Hello ' . $fullname ?>
                                        <?php
                                            }
                                        ?>
                                         <br />
                                         <small><?php echo $username ?></small>
                                         <br />
                                         <br />
                                         Time Left on your Subscription
                                         <br />
                                         <br />
                                         <?php echo $daysleft; ?>
                                         <br />
                                         <br />
                                </h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="<?php echo site_url('dashboard');?>">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('about');?>">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('contact');?>">
                                Contact
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#">
                               Opportunities
                            </a>
                        </li> -->
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.sme4.me">SME4ME</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo site_url();?>assets/profile/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo site_url();?>assets/profile/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo site_url();?>assets/profile/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo site_url();?>assets/profile/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo site_url();?>assets/profile/js/demo.js"></script>

    <script src="<?php echo site_url();?>assets/js/add_company.js"></script>

</html>
