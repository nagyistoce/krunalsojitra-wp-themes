<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
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
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php bloginfo('stylesheet_directory'); ?>/style.css" rel="stylesheet" type="text/css" />
<link  href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap-select.css" rel="stylesheet" type="text/css" media="screen">
<link href="<?php bloginfo('stylesheet_directory'); ?>/fonts/stylesheet.css" rel="stylesheet" type="text/css" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/jquery.jscrollpane.css" rel="stylesheet" media="all" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Raleway|Open+Sans' rel='stylesheet' type='text/css'>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript">
	$(window).load(function(){
		$(".scrom3").mCustomScrollbar({
			horizontalScroll:true,
			scrollButtons:{
				enable:false
			}
		});
	});
</script>

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap-select.js"></script>
<script type="text/javascript">
	window.onload=function(){
		$('.selectpicker').selectpicker();
	};
</script>
<script>
	$(function(){
    $('.carousel').carousel({
      interval: 2000
    });
});
</script>

    
</head>

<body>
<div class="mai_wra">
<div id="wrapper">
  <div class="main_page">
    <div class="head_area">
      <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="" border="0" /></a></div>
      <div class="ph_area">
        <div class="ph_txt_area">
          <div class="faq_txt"><a href="<?php echo bloginfo('wpurl');?>/faq">FAQs</a></div>
          <div class="faq_partition"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/faq_partition.png" alt="" border="0" /></div>
          <div class="num_txt">Phone # <span><a href="tel:079-400 959395">079-400 959395</a></span></div>
        </div>
        <?php global $woocommerce; ?>
        <div class="cart_area">
			<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
 <?php if( sprintf($woocommerce->cart->cart_contents_count) != 0){echo sprintf($woocommerce->cart->cart_contents_count);}?>
				<div class="cart_img">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/cart.png" />
				</div>
				<div class="cart_txt">
					<?php echo $woocommerce->cart->get_cart_total();?>
				</div>
			</a>
        </div>
      </div>
    </div>
    
 
   <div class="menu_area">
      <div class="menu">
      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
       
      </div>
      <div class="sign_in_area">
        <div class="sign_in_txt">
        <?php
if ( is_user_logged_in() ) {
   ?>
   <a href="<?php echo wp_logout_url( 'http://localhost/piggy/' ); ?>" title="Logout">Logout</a>
   </div>
   <div class="or_txt">Or</div>
        <div class="sign_in_txt"><a href="<?php echo bloginfo('wpurl'); ?>/my-account">My Account</a></div>
   <?php
} else {
   ?> <a href="<?php echo bloginfo('wpurl'); ?>/my-account">Sign in</a> 
   		  </div>
        <div class="or_txt">Or</div>
        <div class="sign_in_txt"><a href="<?php echo bloginfo('wpurl'); ?>/my-account">Create Account</a></div>
         <?php
}
	
?>
        
        
    
      </div>
    </div>
	
	<div class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
    
            <?php wp_nav_menu( array( 'walker' => new My_Custom_Nav_Walker(), 'theme_location' => 'primary', 'menu_class' => 'nav navbar-nav' ) ); ?>
		
        
        
        </div>
      </div>
</div>
</div>
</div>
