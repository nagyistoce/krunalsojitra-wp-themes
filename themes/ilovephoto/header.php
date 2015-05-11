<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta charset="UTF-8" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta name="author" content="Letsnurture" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<script>(function(){document.documentElement.className='js'})();</script>
	<?php wp_head(); ?>

		<link rel="shortcut icon" href="<?php bloginfo('template_url');?>/img/favicon.ico">
		<!-- ### CSS Stylesheets ##################################################################### -->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/normalize.css" /><!-- CSS: Normalize -->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/font-awesome.min.css" /><!-- CSS: Font Awesome -->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/styles.css" /><!-- CSS: Main CSS -->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/gallery.css" /><!-- CSS: Gallery CSS -->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/responsive.css" /><!-- CSS: Responsive CSS -->
	
</head>

<body <?php body_class(); ?>>
