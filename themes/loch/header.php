<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="loch leven, windows, doors, conservatories, sunrooms, garage conversions, porches, roofline, scottish, scotland, glasgow, upvc, pvcu, composite, energy saving, glass, double glazing, triple glazing, stained glass, leadwork, bargeboards, gutters, downpipes, high security locks, french doors, patio doors, double doors, single doors, bi-fold doors, upvc doors, composite doors, vertical slider windows, tilt and turn windows, casement windows, side hung windows, top hung windows ">
<meta name="description" content="A leading family owned and operated Scottish supplier of PVCu Double Glazed Windows, Doors, Conservatories, Sunrooms, Garage Conversions and Roofline.">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/fevicon.png" type="icon/ico"  />
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/custom.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/fonts.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- jquery.validate -->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/additional-methods.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
			 jQuery('#wpcf7-f89-o1 form').validate({
							 rules: {
								 Name:{
									 required: true,
									 lettersonly: true,
									 minlength: 2,
						 			 maxlength: 15
						 			},
								Email: {
									 required: true,
									 email: true,
									 maxlength: 100
								 },
							   Phone:{
									 required: true,
									 number:true,
									 minlength: 10,
						 			 maxlength: 15
						 		},
						 		Postcode:{
									 required: true,
									 minlength: 6,
						 			 maxlength: 8
						 		},
								 Message:{
									 required:true,
									 maxlength: 400
        						 }
							 },	
						 messages: {
									 Name: {
										 required: "<p>Please enter name</p>",
										 minlength: "<p>Please enter at least 2 characters</p>",
						                 maxlength: "<p>Please do not enter more then 15 characters</p>"
   									},
								 Email: {
									 required: "<p>Please enter email</p>",
									 email: "<p>Please enter valid email</p>"
								 },
								 Phone : {
									 required: "<p>Please enter phone number</p>",
									 email: "<p>Please enter valid phone number</p>"
								 },
								 Postcode:{
									 required: "<p>Please enter postcode</p>",
									 email: "<p>Please do not enter more then 8 characters.</p>"
								 },
								 Message: {
										 required: "<p>Please enter message</p>",
										 maxlength: "<p>Please enter at most 400 characters</p>"
								 }
							 }  		
			 });
			 jQuery('#foot-cont form').validate({
							 rules: {
								 Name:{
									 required: true,
									 lettersonly: true,
									 minlength: 2,
						 			 maxlength: 15
						 			},
								Email: {
									 required: true,
									 email: true,
									 maxlength: 100
								 },
							   Phone:{
									 required: true,
									 number:true,
									 minlength: 10,
						 			 maxlength: 15
						 		},
						 		Postcode:{
									 required: true,
									 minlength: 6,
						 			 maxlength: 8
						 		},
								 Message:{
									 required:true,
									 maxlength: 400
        						 }
							 },	
						 messages: {
									 Name: {
										 required: "<p>Please enter name</p>",
										 minlength: "<p>Please enter at least 2 characters</p>",
						                 maxlength: "<p>Please do not enter more then 15 characters</p>"
   									},
								 Email: {
									 required: "<p>Please enter email</p>",
									 email: "<p>Please enter valid email</p>"
								 },
								 Phone : {
									 required: "<p>Please enter phone number</p>",
									 email: "<p>Please do not enter more then 8 characters.</p>"
								 },
								 Postcode:{
									 required: "<p>Please enter postcode</p>",
									 email: "<p>Please enter valid postcode number</p>"
								 },
								 Message: {
										 required: "<p>Please enter message</p>",
										 maxlength: "<p>Please enter at most 400 characters</p>"
								 }
							 }  		
			 });
			});
    </script>
    <!-- jquery.validate -->
<!--container-fluid-start-->
<div class="container-fluid">
<!--row-start-->
<div class="row">

<!--header-start-->
<div class="header sticky-header"> 
  <!--top-header-start-->
  <div class="top-head"> 
    <!--top-head-left-start--> 
    <!--container-start-->
    <div class="container">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left top-head-left">
        <div class="top-head-left-imagebox"><a href="<?php echo get_permalink(83); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/top-head-1.png" alt=""/></a></div>
        <div class="top-head-left-imagebox"><a href="<?php echo get_permalink(83); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/top-head-2.png" alt=""/></a></div>
        <div class="top-head-left-imagebox"><a href="<?php echo get_permalink(83); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/top-head-3.png" alt=""/></a></div>
      </div>
      <!--top-head-left-end--> 
      
      <!--top-head-right-start-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-right top-head-right"> 
        <!--top-callbox-start-->
        <div class="top-callbox">
          <div class="top-callbox-txt"><img src="<?php echo get_template_directory_uri(); ?>/images/phone.png" width="19" height="19" alt=""/>Call 0141 643 2452<br>
            <span>For a Free 30 minute survey</span></div>
        </div>
        <!--top-callbox-end--> 
        
        <!--social-start-->
        <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		<?php endif; ?>
        
        <div class="clearfix"></div>
        <!--social-end-->
        <div class="clearfix"></div>
      </div>
      <!--top-head-right-end--> 
    </div>
    <!--container-end--> 
  </div>
  <!--top-header-end--> 
  
  <!--main-header-start-->
  <div class="main-head"> 
    
    <!--container-start-->
    <div class="container"> 
      <!--main-head-left-start-->
      <div class="main-head-left"> 
        <!--logo-start-->
        <nav role="navigation" class="navbar navbar-inverse navbar-static-top menu-bg">
          <div class="container">
            <div class="navbar-header">
              <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a href="<?php echo home_url(); ?>" class="navbar-brand"><img src="<?php echo get_template_directory_uri(); ?>/images/logo1.png" alt="" title="Loch Leven"/></a> </div>
            
            <div class="navbar-collapse collapse res-border" id="navbar">
            	
              <ul class="nav navbar-nav menu-right">
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li class="dropdown"> 
                	<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="<?php echo get_permalink(15); ?>">Windows<span class="caret"></span></a>
                  <ul role="dropdown" class="dropdown-menu">
                    <li><a href="<?php echo get_permalink(5); ?>">Casement Window</a></li>
                    <li><a href="<?php echo get_permalink(7); ?>">Tilt & Turn</a></li>
                    <li><a href="<?php echo get_permalink(8); ?>">Vertical Slider</a></li>
                    <li><a href="<?php echo get_permalink(12); ?>">Top Hung Casement</a></li>
                    <li><a href="<?php echo get_permalink(11); ?>">Wooden</a></li>
                  </ul>
                </li>
                <li class="dropdown"> 
                	<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="<?php echo get_permalink(58); ?>">Doors<span class="caret"></span></a>
                  <ul role="dropdown" class="dropdown-menu">
                     <li><a href="<?php echo get_permalink(18); ?>">Single</a></li>
                      <li><a href="<?php echo get_permalink(19); ?>">Double/French Doors</a></li>
                       <li><a href="<?php echo get_permalink(20); ?>">Patio</a></li>
                        <li><a href="<?php echo get_permalink(21); ?>">Bi-Fold</a></li>
                         <li><a href="<?php echo get_permalink(22); ?>">Composite</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo get_permalink(61); ?>">Conservatories</a></li>
                <li class="dropdown"> <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="<?php echo get_permalink(63); ?>">About Us<span class="caret"></span></a>
                  <ul role="dropdown" class="dropdown-menu">
                    <li><a href="<?php echo get_permalink(66); ?>">Energy & Efficiency</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo get_permalink(81); ?>">Testimonials</a></li>
                <li><a href="<?php echo get_permalink(83); ?>">Contact</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!--main-head-left-end--> 
  </div>
</div>
<!--main-header-end--> 

 <?php  if(is_front_page()){ ?>
 	<style>.menu-right > li:nth-child(1) a{color: #33478f; border: 1px solid #33478f;}</style>
 <?php }
 if(is_page('conservatories')){ ?>
 	<style>.menu-right > li:nth-child(4) a{color: #33478f; border: 1px solid #33478f;}</style>
 <?php }
 if(is_page('testimonials')){ ?>
 	<style>.menu-right > li:nth-child(6) a{color: #33478f; border: 1px solid #33478f;}</style>
 <?php }
 if(is_page('contact-us')){ ?>
 	<style>.menu-right > li:nth-child(7) a{color: #33478f; border: 1px solid #33478f;}</style>
  <?php }
  if(is_page('terms-and-conditions')){ ?>
 	<style>#menu-footer-menu > li:nth-child(1) a{color: #fff;}</style>
  <?php }
  if(is_page('website-disclaimer')){ ?>
 	<style>#menu-footer-menu > li:nth-child(2) a{color: #fff;}</style>
  <?php }
  if(is_page('privacy-policy')){ ?>
 	<style>#menu-footer-menu > li:nth-child(3) a{color: #fff;}</style>
  <?php }
  if(is_page('accessibility-policy')){ ?>
 	<style>#menu-footer-menu > li:nth-child(4) a{color: #fff;}</style>
  <?php }
  if(is_page('sitemap')){ ?>
 	<style>#menu-footer-menu > li:nth-child(5) a{color: #fff;}</style>
  <?php }?>