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

<script type="text/javascript" src="<?php echo site_url();?>assets/login/js/city_state.js"></script>

</head>
<body class="sessions new">
<div class="login"> <a class="logo" href="<?php echo site_url('register');?>"><img alt="SME4ME" src="<?php echo site_url();?>assets/login/css/logo.png" /> </a>
  <div id="login_form">
    <?php echo show_notification(); ?>
    <span style="<?= $displayData ?>" >
    <?php echo show_valnotif(); ?>
    </span>
    <form novalidate class="js-login-form" action="<?php echo site_url('register');?>" accept-charset="UTF-8" method="post">
      <fieldset>
        <label for="email">Name</label>
        <input type="hidden" name="url" value="<?php echo empty($url)? '' : $url;?>" />
        <input type="text" name="signup[fullname]" id="email" required autofocus />
      </fieldset>
       <fieldset>
        <label for="email">Email</label>
        <input type="email" name="signup[username]" min="8" id="email" required autofocus />
      </fieldset>
       <fieldset>
        <label for="email">Select Country</label>
        <br>
        <select required name="signup[country]">
        <option value="" selected="selected">--Select--</option>
        <option value=""></option>
        <script type="text/javascript">
          setCountries(this);
        </script>
        </select><!-- 
        <input type="text" name="signup[phone]" id="email" required autofocus /> -->
      </fieldset>
      <fieldset>
        <label for="password">Password</label>
        <input type="password" name="signup[password]" id="password" required />
      </fieldset>
       <fieldset>
        <label for="password">Confirm Password</label>
        <input type="password" name="signup[password1]" id="password" required />
      </fieldset>
      <fieldset>
        <table>
          <tr>
            <td><input type="submit" name="commit" value="Register" class="button green login-small" /></td>
          </tr>
        </table>
      </fieldset>
    </form>
  </div>
  <div id="forgot_form" style="display:none">
    <form novalidate class="js-login-form-forgot" action="#" accept-charset="UTF-8" method="post">
      <fieldset>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="" required />
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
<span data-credit_name="Shutterstock" data-href="http://www.Shutterstock.com/" data-small_url="<?php echo site_url();?>assets/login/css/1.jpg" data-url="<?php echo site_url();?>assets/login/css/1.jpg" id="background_1"></span> 

<span data-credit_name="Shutterstock" data-href="http://www.Shutterstock.com/" data-small_url="<?php echo site_url();?>assets/login/css/2.jpg" data-url="<?php echo site_url();?>assets/login/css/2.jpg" id="background_2"></span> 

<span data-credit_name="Shutterstock" data-href="http://www.Shutterstock.com/" data-small_url="<?php echo site_url();?>assets/login/css/3.jpg" data-url="<?php echo site_url();?>assets/login/css/3.jpg" id="background_3"></span> 

<script src="<?php echo site_url();?>assets/login/js/site_background.js"></script> 
<script>
  SiteBackground.loadFromParam(null)
</script>
<div class="sign-up"> <span>Already have an account?</span> <a class="button translucent" href="<?= empty($url)? site_url('login') : site_url('login/'.$url); ?>">Return to Login</a> </div>
<div class="overlay"></div>
</body>
</html>