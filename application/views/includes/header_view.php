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
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/styles.css">
<?php
// load all css
if(isset($css_includes)) {
	foreach($css_includes as $key => $css_include) {
		echo $css_include;
	}
}
?>
<script src="<?php echo base_url();?>assets/js/libs/modernizr-2.5.3.min.js"></script>	
</head>

<body id="<?php echo $page?>">
 <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
<div class="wrapper">
<?php $this->load->view('includes/framework_header_view'); ?>