
<!DOCTYPE html>
<html >
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <head>
    <meta charset="UTF-8">
    <title>Smart Money Ecycopedia |Login</title>
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
    <link rel="manifest" href="http://www.sme4.me/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="http://www.sme4.me/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
       
    
  <link rel="stylesheet" media="screen" href="<?php echo site_url();?>assets/login/css/style.css" />
  <link rel="stylesheet" media="screen" href="<?php echo site_url();?>assets/login/css/login.css" />
  <link rel="shortcut icon" type="image/png" href="<?php echo site_url();?>assets/login/css/fav.png"/>

    
    
    
  </head>

  <body>
  
    <div class="loginpanel">
    <?php echo show_notification(); ?>
  <span style="<?= $displayData ?>" >
  <?php echo show_valnotif(); ?>
  </span>
 
<body class="sessions new">
<div class="login"> <a class="logo" href="<?php echo site_url('register');?>"><img alt="SME4ME" src="<?php echo site_url();?>assets/login/css/logo.png" /> </a>
  <div id="forgot_form">
    <?php echo show_notification(); ?>
    <span style="<?= $displayData ?>" >
    <?php echo show_valnotif(); ?>
    </span>
    <form novalidate class="js-login-form-forgot" action="<?php echo site_url('passwordreset');?>" accept-charset="UTF-8" method="post">
      <fieldset>
        <label for="user">New Password</label>
        <input id="user" type="password" name="txtpassword" placeholder="New Password" required/>
      </fieldset>
      <fieldset>
        <label for="email">Confirm Password</label>
        <input id="user" type="password" name="txtpassword1" placeholder="Confirm Password" required/>
        <input id="user" type="hidden" name="id" value="<?php echo $id;?>" />
      </fieldset>
      <fieldset>
        <input type="submit" name="commit" value="Reset Password" class="button green forgot" />
      </fieldset>
    </form>
  </div>
</div>
<div class="image-credit">
  <div class="image-credit"></div>
  Photo Licensed to SME4ME By <a href="http://sme4.me/" id="background_credit_name" target="_blank"></a> </div>
<span data-credit_name="Shutterstock" data-href="http://www.Shutterstock.com/" data-small_url="<?php echo site_url();?>assets/login/css/3.jpg" data-url="<?php echo site_url();?>assets/login/css/3.jpg" id="background_1"></span> 

<span data-credit_name="Shutterstock" data-href="http://www.Shutterstock.com/" data-small_url="<?php echo site_url();?>assets/login/css/2.jpg" data-url="<?php echo site_url();?>assets/login/css/2.jpg" id="background_2"></span> 

<span data-credit_name="Shutterstock" data-href="http://www.Shutterstock.com/" data-small_url="<?php echo site_url();?>assets/login/css/3.jpg" data-url="<?php echo site_url();?>assets/login/css/3.jpg" id="background_3"></span>

<script src="<?php echo site_url();?>assets/login/js/site_background.js"></script> 
<script>
  SiteBackground.loadFromParam(null)
</script>
<div class="overlay"></div>
</body>
  
</html>
