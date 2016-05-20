<!DOCTYPE html>
<html lang="en">
<head>
    <title>Smart Money Ecycopedia |Login</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link href="https://format.com/login" rel="canonical">
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0" name="viewport">
<link rel="stylesheet" media="screen" href="<?php echo site_url();?>assets/login/css/style.css" />
<link rel="stylesheet" media="screen" href="<?php echo site_url();?>assets/login/css/login.css" />
<link rel="shortcut icon" type="image/png" href="<?php echo site_url();?>assets/login/css/fav.png"/>

</head>
<body class="sessions new">
<div class="login"> <a class="logo" href="<?php echo site_url('register');?>"><img alt="SME4ME" src="<?php echo site_url();?>assets/login/css/logo.png" /> </a>
  <div id="forgot_form">
    <?php echo show_notification(); ?>
    <span style="<?= $displayData ?>" >
    <?php echo show_valnotif(); ?>
    </span>
    <form novalidate class="js-login-form-forgot" action="<?php echo site_url('forgotpassword');?>" accept-charset="UTF-8" method="post">
      <fieldset>
        <label for="email">Email</label>
        <input type="email" name="txtusername" id="email" required />
      </fieldset>
      <fieldset>
        <input type="submit" name="commit" value="Reset Password" class="button green forgot" />
        <div class="login-return"> <a href="<?php echo site_url('login');?>" tabindex="-1">Return to Login</a> </div>
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