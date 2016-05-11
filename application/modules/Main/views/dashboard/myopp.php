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

<script src="<?php echo site_url();?>assets/js/jquery.min.js"></script>

<script src="<?php echo site_url();?>assets/js/add_company.js"></script>

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

    <link rel="stylesheet" href="<?php echo site_url();?>assets/datatable/css/normalize.css">

    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css'>
    <link rel='stylesheet prefetch' href='http://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css'>

    <link rel="stylesheet" href="<?php echo site_url();?>assets/datatable/css/style.css">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="<?php echo site_url();?>assets/profile/img/sidebar-3.jpg">

    

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo site_url('Main/Home');?>" class="simple-text">
                    SME4ME
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard">
                        <i class="pe-7s-graph"></i>
                        <p>My Opportunities</p>
                    </a>
                </li>
                <li>
                    <a href="profile">
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
                    <div class="col-md-12">
                    <?php echo show_notification(); ?>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">My Smart Opportunities</h4>
                            </div>
                            <div class="content">
                                <?php if(!empty($results)){
                                ?>
                                <table summary="This table shows your personalised Opportunities" class="table table-bordered table-hover dt-responsive">
                                    <caption class="text-center">Personalised Opportunities </caption>
                                    <thead>
                                      <tr>
                                        <th>Deadline</th>
                                        <th>Opportunity Name</th>
                                        <th>Type</th>
                                        <th>Value</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($results as $result) {
                                    ?>
                                      <tr>
                                        <td><?= $result->deadline ?></td>
                                        <td><?= $result->title ?></td>
                                        <td><?= $result->category ?></td>
                                        <td><?= $result->value ?></td>
                                        <td><a href="<?= $result->weblink ?>" target="_blank">Visit Website</a></td>
                                        <td><a id="oppremove" href="#" data-uri="<?= site_url('Main/Dashboard/save/'.$result->id) ?>" data-url="<?= site_url('Main/Dashboard/unsave/'.$result->id) ?>">Remove</a></td>
                                      </tr>
                                    <?php }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                        <td colspan="5" class="text-center">For More Opportunities <a href="dashboard" target="_blank">Opportunities</a> </td>
                                      </tr>
                                    </tfoot>
                                </table>
                                <?php }else{
                                ?>
                                <table summary="This table shows your personalised Opportunities" class="table table-bordered table-hover dt-responsive">
                                    <tfoot>
                                      <tr>
                                        <td colspan="5" class="text-center"><h5>You have not saved any oppportunities yet...</h5><br>For Opportunities <a href="dashboard">Click Here</a> </td>
                                      </tr>
                                    </tfoot>
                                </table>
                                <?php }
                                ?>
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
                    &copy; 2016 <a href="http://www.sme4.me">SME4ME</a>, made with love 
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="<?php echo site_url();?>assets/profile/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo site_url();?>assets/profile/js/bootstrap.min.js" type="text/javascript"></script>

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

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js'></script>
    <script src='http://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js'></script>
    <script src='http://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js'></script>

    <script src="<?php echo site_url();?>assets/datatable/js/index.js"></script>

    

</html>
