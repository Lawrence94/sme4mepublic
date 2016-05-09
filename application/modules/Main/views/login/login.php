
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
<div class="login"> <a class="logo" href="<?php echo site_url('login');?>"><img alt="SME4ME" src="<?php echo site_url();?>assets/login/css/logo.png" /> </a>
  <div id="login_form">
  <?php echo show_notification(); ?>
  <span style="<?= $displayData ?>" >
  <?php echo show_valnotif(); ?>
  </span>
    <form validate class="js-login-form" action="<?php echo site_url('login');?>" accept-charset="UTF-8" method="post">
      <fieldset>
        <label for="email">Email</label>
        <input type="email" name="txtusername" id="email" required autofocus />
      </fieldset>
      <fieldset>
        <label for="password">Password</label>
        <a class="forgot-password" href="<?= site_url('forgotpassword') ?>" tabindex="-1">I Forgot</a>
        <input type="hidden" name="url" value="<?php echo empty($url)? '' : $url;?>" />
        <input type="password" min="8" name="txtpassword" id="password" required />
      </fieldset>
      <fieldset>
        <table>
          <tr>
            <td><input type="submit" name="commit" value="Login" class="button green login-small" /></td>
            <td class="remember-me"><div class="remember-me-checkbox">
                <input type="checkbox" name="remember_me" id="remember_me" value="1" />
                <label class="lbl" for="remember_me"></label>
              </div>
              <label for="remember_me">Stay Logged In</label></td>
          </tr>
        </table>
      </fieldset>
    </form>
  </div>

</div>
<div class="image-credit">
  <div class="image-credit"></div>
  Photo Licensed to SME4ME By <a href="http://sme4me.com/" id="background_credit_name" target="_blank"></a> </div>
<span data-credit_name="Shutterstock" data-href="http://www.Shutterstock.com/" data-small_url="<?php echo site_url();?>assets/login/css/1.jpg" data-url="<?php echo site_url();?>assets/login/css/1.jpg" id="background_1"></span> 

<span data-credit_name="Shutterstock" data-href="http://www.Shutterstock.com/" data-small_url="<?php echo site_url();?>assets/login/css/2.jpg" data-url="<?php echo site_url();?>assets/login/css/2.jpg" id="background_2"></span> 

<span data-credit_name="Shutterstock" data-href="http://www.Shutterstock.com/" data-small_url="<?php echo site_url();?>assets/login/css/3.jpg" data-url="<?php echo site_url();?>assets/login/css/3.jpg" id="background_3"></span> 

<script src="<?php echo site_url();?>assets/login/js/site_background.js"></script> 
<script>
  SiteBackground.loadFromParam(null)
</script>
<div class="sign-up"> <span>Don’t have an account?</span> <a class="button translucent" href="<?= empty($url)? site_url('register') : site_url('register/'.$url); ?>">Sign Up</a> </div>
<div class="overlay"></div>
</body>
</html>
