<?php
/**
 * Template Name: Newsletter
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<?php
		$page_object = get_queried_object();
		$page_id  = get_queried_object_id(); // Get current page id
		$title = get_post($page_id); // Get live webcam page title
		$custom_image = get_field('detail_page_image', $page_id);
		
		if(get_field('detail_page_image', $page_id)){
			?>
				<style type="text/css">
					#newslater-slide {
						background-image: url(<?php echo $custom_image; ?>) !important;
						-webkit-background-size: cover !important;
			  			-moz-background-size: cover !important;
			  			-o-background-size: cover !important;
			  			background-size: cover !important;
					}
				</style>
			<?php
		}else{
			?>
				<style type="text/css">
					#newslater-slide {
						background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-page-bg.jpg);
						min-height: 800px !important;
						max-height: 800px !important;
						background-size: auto 100% !important;
					}
				</style>
			<?php
		}
	?>

    <div class="slide" id="newslater-slide" data-slide="1" data-stellar-background-ratio="0.5">
		<div class="newslater-box" id="cust-scrl">
	   		<?php
				if($_SESSION['flag'] == 'pt'){
	
					if ( is_active_sidebar( 'sidebar-1' ) ) :
						dynamic_sidebar( 'sidebar-1' ); 
					endif; 
					
				}elseif($_SESSION['flag'] == 'uk'){
	
					if ( is_active_sidebar( 'sidebar-2' ) ) :
						dynamic_sidebar( 'sidebar-2' ); 
					endif; 
					
				}elseif($_SESSION['flag'] == 'de'){
					
					if ( is_active_sidebar( 'sidebar-3' ) ) :
						dynamic_sidebar( 'sidebar-3' ); 
					endif; 
					
				}elseif($_SESSION['flag'] == 'es'){
	
					if ( is_active_sidebar( 'sidebar-4' ) ) :
						dynamic_sidebar( 'sidebar-4' ); 
					endif; 
					
				}elseif($_SESSION['flag'] == 'fr'){
								
					if ( is_active_sidebar( 'sidebar-5' ) ) :
						dynamic_sidebar( 'sidebar-5' ); 
					endif; 
					
				}elseif($_SESSION['flag'] == 'it'){
	
					if ( is_active_sidebar( 'sidebar-6' ) ) :
						dynamic_sidebar( 'sidebar-6' ); 
					endif; 
					
				}elseif($_SESSION['flag'] == 'nl'){
					
					if ( is_active_sidebar( 'sidebar-7' ) ) :
						dynamic_sidebar( 'sidebar-7' ); 
					endif; 
					
				}elseif($_SESSION['flag'] == 'ru'){
					
					if ( is_active_sidebar( 'sidebar-8' ) ) :
						dynamic_sidebar( 'sidebar-8' ); 
					endif; 
					
				}elseif($_SESSION['flag'] == 'cn'){
	
					if ( is_active_sidebar( 'sidebar-9' ) ) :
						dynamic_sidebar( 'sidebar-9' ); 
					endif; 
					
				}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
					
					if ( is_active_sidebar( 'sidebar-2' ) ) :
						dynamic_sidebar( 'sidebar-2' ); 
					endif; 
					
				}
			?> 
        </div>
	</div>
	
	<style type="text/css">
		.widget_wysija_cont {
			margin-top: 6px;
		}
		.widget_wysija_cont p:nth-child(2) {
			float: left;
			width: 46%;
		}
		.widget_wysija_cont p:nth-child(3) {
			float: right;
			width: 46%;
		}
		.widget_wysija_cont p:nth-child(4) {
			float: left;
			width: 100%;
		}
		.wysija-input {
			width: 99.8%;
		}
		.widget_wysija_cont .wysija-submit {
			float: right;
			margin-top: 10px;
			background: none repeat scroll 0 0 #F18030;
			border: medium none;
			color: #FFFFFF;
			cursor: pointer;
			float: right;
			font-size: 11px;
			padding: 5px;
			width: 100px;
		}
		.widget_wysija_cont p:nth-child(3) .formError, .widget_wysija_cont p:nth-child(4) .formError {
			left: 447px !important;
		}
		.updated ul li {
			font-size: 16px;
			color: #fff;
		}
	</style>
	
<?php get_footer(); ?>