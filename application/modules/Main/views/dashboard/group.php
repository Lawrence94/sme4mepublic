<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" version="HTML+RDFa 1.0" lang="en" dir="ltr">
<meta name=viewport content="width=device-width, initial-scale=1">
    <title>Smart Money Encyclopedia</title>  
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
    <meta name="theme-color" content="#ffffff">

</head>

<body class="html front not-logged-in no-sidebars page-all" >
<div id="main"> <a id="main-content"></a>
  <div class="region region-content">
    <div id="block-system-main" class="block block-system first last odd">
      <div id="isotope-container" data-fixed-filter="false">
         <div class="block  back-title aggregator" data-mobile-weight="3">
         <a href="<?php echo site_url('dashboard');?>">
          <div class="inner">
            
              <h1><span class="subtitle">Switch back  to the homepage<br/>
                We have more opportunities</span>
              </h1>
            
          </div>
          </a>
          <!-- /.inner --></div>
        <!-- /.block -->
        <div class="block  work filter-case_study aggregator" data-mobile-weight="2"><a class="inner">
          <div class="plus">
            <div class="cross"></div>
            <h2 class="title"><span><?= $title ?></span></h2>
          </div>
          <?php if (empty($result)) {
            ?>
            <h2 class="title"><span><?= $title ?><br>There is nothing here, please check back later</span></h2>
            <?php } ?>
          <!-- /plus -->
          
          <div class="plusicon"></div>
          <div class="count"> <span><?= $count ?></span> </div>
          <!-- /count --></a> <!-- /.inner --></div>
        <!-- /.block -->
        <?php foreach ($result as $val) {
          # code...
        ?>
        <div class="block  article" data-mobile-weight="4"><a class="inner" href="<?php echo site_url('dashboard/posts/'. $val->id);?>" >
          <h2 class="title"><span><?= $val->title ?> <br> <strong>Value:</strong> <?= $val->value ?></span></h2>
          <h1><span class="subtitle"><strong>Deadline:</strong> <?= $val->deadline ?></span></h1>
          </a> <!-- /.inner --></div>
        <!-- /.block -->
        <?php } ?>
        
      <!-- /.container -->
      <h2 class="element-invisible">Pages</h2>
      <div class="item-list">
        <ul class="pager">
          <li class="pager-current first">1</li>
          <li class="pager-item"><a title="Go to page 2" href="/all?page=1">2</a></li>
          <li class="pager-item"><a title="Go to page 3" href="/all?page=2">3</a></li>
          <li class="pager-item"><a title="Go to page 4" href="/all?page=3">4</a></li>
          <li class="pager-item"><a title="Go to page 5" href="/all?page=4">5</a></li>
          <li class="pager-item"><a title="Go to page 6" href="/all?page=5">6</a></li>
          <li class="pager-next"><a title="Go to next page" href="/all?page=1">next ›</a></li>
          <li class="pager-last last"><a title="Go to last page" href="/all?page=5">last »</a></li>
        </ul>
      </div>
    </div>
    <!-- /.block --> 
  </div>
</div>
<!-- /#content -->

<div id="ajax_custom_cont_wrapper"></div>
<!-- /ajax_custom_cont_wrapper -->

</div>
<!-- /#main -->

<footer id="footer" class="region region-footer">
  <div id="block-block-6" class="block block-block first last odd"> </div>
  <!-- /.block --> 
</footer>
<!-- region__footer -->

</div>
<!-- /#page --> 

<a href="/" class="home-page-button active">Home</a> 
<!-- admin tabs -->

</body>
</html>
