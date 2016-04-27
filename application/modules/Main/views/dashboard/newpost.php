<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" version="HTML+RDFa 1.0" lang="en" dir="ltr">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>Smart Money Encyclopedia</title>
<?= $meta ?>
<meta property="fb:app_id" content="1770218769864231">
<meta property="og:url" content="http://www.sme4.me/dashboard/posts/<?= $result->id ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $result->title; ?>">
<meta property="og:description" content="find amazing opportunities on sme4.me">
<meta property="og:image" content="http://www.sme4.me/assets/login/images/logo.png">
<meta name="theme-color" content="#ffffff">

<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>assets/assets-for-website/css/main-style.css" media="all" />
<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>assets/assets-for-website/css/style.css" media="all" />
<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>assets/assets-for-website/css/custom.css" media="all" />
<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>assets/assets-for-website/css/responsive.css" media="all" />
<script src="<?php echo site_url();?>assets/assets-for-website/js/js_RLdCYwzbvDqlQo2TU9KQgLHzdcyZ66umH31ME30FMh0.js"></script>
<script src="<?php echo site_url();?>assets/assets-for-website/js/js_RLdCYwzbvDqlQo2TU9KQgLHzdcyZ66umH31ME30FMh0.js"></script>
<script src="<?php echo site_url();?>assets/assets-for-website/js/js_X3wqWxXtw6R4AIb97o3dAWED9S2GhQf47b9XC3VETVg.js"></script>
<script src="<?php echo site_url();?>assets/assets-for-website/js/js_CC-zfeuQHcDhFtVRuKW53h30TL7j_105J32Nz8b8R38.js"></script>
<script src="<?php echo site_url();?>assets/assets-for-website/js/js_gQlbxMG_wwGeHhZ0A48UxYM004xIupskuGJjEprYK-g.js"></script>
<script>jQuery.extend(Drupal.settings, {"mediaelementAll":true,"googleanalytics":{"trackOutbound":1,"trackMailto":1,"trackDownload":1,"trackDownloadExtensions":"7z|aac|arc|arj|asf|asx|avi|bin|csv|doc(x|m)?|dot(x|m)?|exe|flv|gif|gz|gzip|hqx|jar|jpe?g|js|mp(2|3|4|e?g)|mov(ie)?|msi|msp|pdf|phps|png|ppt(x|m)?|pot(x|m)?|pps(x|m)?|ppam|sld(x|m)?|thmx|qtm?|ra(m|r)?|sea|sit|tar|tgz|torrent|txt|wav|wma|wmv|wpd|xls(x|m|b)?|xlt(x|m)|xlam|xml|z|zip"}});</script>


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

</head>
<body class="html not-front not-logged-in two-sidebars page-node page-node- page-node-1029 node-type-article section-blog" >
<header id="header" role="banner"> <a href="<?php echo site_url('dashboard');?>" title="Home" rel="home" id="logo"> <span class="logo">SME4ME</span> </a> </header>
<!-- /header -->

<div id="main">
  <div id="content" class="column" role="main"> <a id="main-content"></a>
    <div class="post-date"> Deadline: <?= $result->deadline ?> </div>
    <div class="region region-content">
      <div id="block-system-main" class="block block-system first last odd">
        <article>
        
          <div class="field field-name-body field-type-text-with-summary field-label-hidden">
            <div class="field-items">
              <div class="field-item even" property="content:encoded">
              <h1 class="title" id="page-title"><?= $result->title ?></h1>
                <p align="center">
                  

                  <strong>Purpose:</strong> <?= $result->purpose ?><br>
                  <strong>Eligibility:</strong> <?= $result->eligibility ?><br>
                  <strong>Level of Study:</strong> <?= $result->level ?><br>
                  <strong>Type:</strong> <?= $result->category ?><br>
                  <!-- <strong>Length of Study:</strong> 1 year<br> -->
                  <strong>Value:</strong> <?= $result->value ?><br>
                  <strong>Courses:</strong> <?= $result->frequency ?><br>
                  <!-- <strong> Study Establishment:</strong> <?= $result->establishment ?><br> -->
                  <strong>Country of Study:</strong> <?= $result->country ?> <br><br>
                  <!-- <strong>No. of awards offered:</strong> <?= $result->awards ?><br><br> -->
                  <a href="<?= $result->weblink ?>" target="_blank" class="form-submit"> Visit Website </a>



                </p>
              </div>
            </div>
          </div>
        </article>
        <!-- /.node --> 
        
      </div>
      <!-- /.block --> 
    </div>
  </div>
  <!-- /#content -->
  
  <aside class="sidebars">
    <div class="region region-sidebar-first column sidebar">
      <div id="block-blonde-global-blocks-home" class="block block-blonde-global-blocks first odd"> <a href="<?php echo site_url('dashboard');?>">
        <div class="title-wrapper">
          <h2><span class="icon">Homepage</span></h2>
        </div>
        </a> </div>
      <!-- /.block -->
      <div id="block-blonde-global-blocks-site-section" class="block block-blonde-global-blocks even"> 
         <a class="section-link section-work" href="<?= site_url('Main/Dashboard/getgroup/'.$result->category) ?>">
         <span class="line"><?= $result->category ?></span>
              <span class="section-total"><span><?php echo $count  ?></span>
        </span>
        <div class="minusicon"></div>
        </a> </div>
      <!-- /.block -->
      <div id="block-blonde-global-blocks-pagination" class="block block-blonde-global-blocks last odd">
        <div class="title-wrapper">
          <h2 class="block-title">Opportunities</h2>
        </div>
        <ul class="pagination">
          <li class="pre"><a href="#">Previous</a></li>
          <li class="next-disabled"><span>Next</span></li>
        </ul>
      </div>
      <!-- /.block --> 
    </div>
    <div class="region region-sidebar-second column sidebar">
      <div id="block-blonde-solr-service-search" class="block block-blonde-solr-service first odd">
        <div class="title-wrapper">
          <h2>Search</h2>
        </div>
        <form action="#" method="post">
          <div>
            <div class="form-item form-type-textfield form-item-search">
              <label for="edit-search">Search </label>
              <input type="text" id="edit-search" name="search" value="Type here..." size="60" maxlength="128" class="form-text" />
            </div>
          </div>
        </form>
      </div>
      <!-- /.block -->

      <div id="block-blonde-global-blocks-social-share" class="block block-blonde-global-blocks even">

      <div class="title-wrapper">
    <h2 class="block-title">Share</h2>
  <ul class="share">
    <li>
      <a class="google" href="https://plus.google.com/share?url=http%3A%2F%2Fwww.sme4.me%2Fdashboard%2Fposts%2F<?= $result->id ?>" target="_blank" >Google+</a>
    </li>
    <li>
      <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.sme4.me%2Fdashboard%2Fposts%2F<?= $result->id ?>" target="_blank" >Facebook</a>
    </li>
    <li>
      <a class="twitter" href="https://twitter.com/intent/tweet?text=Contact via @sme4_me&amp;url=http%3A%2F%2Fwww.sme4.me%2Fdashboard%2Fposts%2F<?= $result->id ?>" target="_blank" >Twitter</a>
    </li>
    <li>
      <a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2Fwww.blonde.net%2Fblog%2F2016%2F02%2F09%2Fgreat-ux-design-examples&amp;title=This+is+what+great+UX+looks+like.+%28Episode+1%29 via @blondedigital" target="_blank" >LinkedIn</a>
    </li>
    <li>
      <a class="pinterest" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.blonde.net%2Fblog%2F2016%2F02%2F09%2Fgreat-ux-design-examples&media=http%3A%2F%2Fwww.blonde.net%2F" target="_blank" >Pinterest</a>
    </li>
  </ul>

  </div>
    
</div>
      
    </div>
  </aside>
  <!-- /.sidebars --> 
  
</div>
<!-- /#main -->

<footer id="footer" class="region region-footer">
<div id="block-block-1" class="block block-block first odd"><p>
    2016 SME4ME.com<br />
    <a href="#">Contact us</a> | <a href="#">Privacy Policy</a> | <a href="http://twitter.com/sme4_me" target="_blank">Follow us on Twitter</a></p>
</div>
<!-- /.block -->

</body>
</html>
