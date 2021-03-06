<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo $page_title . ' - ' . SITE_NAME; ?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php
  // load all minified css into compressed files
  $this->carabiner->display('library', 'css');
  $this->carabiner->display($this->config->item('framework'), 'css');
  $this->carabiner->display('custom', 'css');
  if ($this->carabiner->has_files('css')) {
    $this->carabiner->display('css');
  }
?>

<script src="<?php echo base_url();?>assets/js/libs/modernizr-2.5.3.min.js"></script>	
</head>

<body id="<?php echo $page?>" class="<?php if(isset($section)) echo $section; ?>">
 <!--[if lt IE 7]>
 <p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p>
 <![endif]-->
<div id="wrap">
  <header>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"><?php echo SITE_NAME; ?></a>
          <div class="nav-collapse collapse">
            <?php $this->load->view('_includes/menu_view'); ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  </header>