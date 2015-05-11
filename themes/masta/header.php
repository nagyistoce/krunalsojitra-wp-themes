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
<link href="<?php bloginfo('stylesheet_directory'); ?>/style.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('stylesheet_directory'); ?>/fonts/stylesheet.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.min.js"></script>
       
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.js"></script>
 
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.tinycarousel.min.js"></script>

<script type="text/javascript">
		jQuery(document).ready(function(){
		jQuery('#slider5').tinycarousel({ axis: 'y'});
		
		

	$('#ajxd').hide();	
	//alert($('#cart_val').val());
    $('#clickbut').click(function () {
		if($('#cart_val').val() !=0){
        if ($('#ajxd').is(":hidden")) {
            $('#ajxd').slideDown('slow', function () {
            });
        } else {
            $('#ajxd').slideUp('slow');
          
    		    }
		}
    		});
	
	
		
		});

</script>

</head>

<body>
<div class="wrapper">
  <div class="sub_wrapper"> 
  <div  id="container">
  <!--headerpart-->
   
    <div class="header_part">
      <div class="header_firsr_part">
        <div class="header_left_part">
          <div class="header_logo_part"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/imageslogopart.png" alt=""></a></div>
        </div>
        <div class="header_right_part">           
          <div class="header_right_itomcart_part" id="clickbut">
            <div class="trolly_images_ttx_part collapse collapse">
              <div class="trooly_images collapse collapse"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/trolly.png" alt=""></div>
			  <?php global $woocommerce; ?>

              <div class="text_part collapse collapse">Items in Cart 
			 <?php if( sprintf($woocommerce->cart->cart_contents_count) != 0){echo sprintf($woocommerce->cart->cart_contents_count);}?>
             <input type="hidden" value="<?php echo sprintf($woocommerce->cart->cart_contents_count) ?>" id="cart_val"/>
             </div>
              <div class="line_part collapse collapse"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/verticalline.png" alt=""></div>
              <div class="down_aarow_part collapse collapse"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/down_arrow.png" alt=""></div>
            </div>
     
          </div>
          
          <div id="ajxd">
          <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
			<?php endif; ?>
          </div>
          
        </div>
      </div>
      <div class="header_second_part">
        <div class="menu_part">
          <div class="menu">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
          </div>
        </div>
      </div>
    </div>
    <!--headerpart-->
    <!--flag -->
    <div class="usa_flagttxt_part">
      <div class="flag_part"><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/flag.png" alt=""></a></div>
      <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
		<?php endif; ?>
    </div>
    <!--flag end -->
    
