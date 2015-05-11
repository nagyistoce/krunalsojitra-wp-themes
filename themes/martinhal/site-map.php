<?php
/*
Template Name: Site Map
*/

get_header(); ?>

<style type="text/css">
	.sitemap ul li {
		float: none;
	}
</style>

<?php
	global $post; // If outside the loop
	$page_object = get_queried_object();
	$page_id  = get_queried_object_id(); // Get current page id
	$custom_image = get_field('detail_page_image', $page_id);
	
	$args = array(
		'sort_order' => 'ASC',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'exclude' => '',
		'include' => $page_id,
		'meta_key' => '',
		'meta_value' => '',
		'authors' => '',
		'child_of' => 0,
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
	$pages = get_pages($args);
	
	$parentID = $pages[0]->post_parent; // Get current page parent id
?>

<?php
	if(get_field('detail_page_image', $page_id)){
		?>
			<style type="text/css">
				.inner-page #content-slide {
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
				.inner-page #content-slide {
					background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-page-bg.jpg);
					min-height: 800px !important;
					max-height: 800px !important;
					background-size: auto 100% !important;
				}
			</style>
		<?php
	}
?>

<div class="slide" id="content-slide" data-slide="1" data-stellar-background-ratio="0.5">
  	<?php
		if($parentID == 689 || $parentID == 691 || $parentID == 693 || $parentID == 695 || $parentID == 697 || $parentID == 699 || $parentID == 701 || $parentID == 703 || $parentID == 705){
			$children = wp_list_pages("title_li=&child_of=".$page_id."&echo=0");
		}else{
			$children = wp_list_pages("title_li=&child_of=".$parentID."&echo=0");
		}
		if($children){
	?>
		<div class="sub-nav">
        	<?php
				echo "<ul>";
					echo $children;
				echo "</ul>";
        	?>
    	</div>
	<?php } ?>
	
	<div class="content-box sit_map" id="cust-scrl">
		<?php
			// Header Menu
            if($_SESSION['flag'] == 'pt'){

				wp_nav_menu( array('menu' => 'header-pt', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'uk'){

				wp_nav_menu( array('menu' => 'header-uk', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'de'){
				
				wp_nav_menu( array('menu' => 'header-de', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'es'){
				
				wp_nav_menu( array('menu' => 'header-es', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'fr'){
				
				wp_nav_menu( array('menu' => 'header-fr', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'it'){
				
				wp_nav_menu( array('menu' => 'header-it', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'nl'){
				
				wp_nav_menu( array('menu' => 'header-nl', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'ru'){
				
				wp_nav_menu( array('menu' => 'header-ru', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'cn'){
				
				wp_nav_menu( array('menu' => 'header-cn', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
				
				wp_nav_menu( array('menu' => 'header-uk', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}
		?>
		
		<br />
		<span class="site_footer">Footer</span>
		<br />
		
		<?php
			// Footer Menu
            if($_SESSION['flag'] == 'pt'){

				wp_nav_menu( array('menu' => 'footer-pt', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'uk'){

				wp_nav_menu( array('menu' => 'footer-uk', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'de'){
				
				wp_nav_menu( array('menu' => 'footer-de', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
	
			}elseif($_SESSION['flag'] == 'es'){
				
				wp_nav_menu( array('menu' => 'footer-es', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'fr'){
				
				wp_nav_menu( array('menu' => 'footer-fr', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'it'){
				
				wp_nav_menu( array('menu' => 'footer-it', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'nl'){
				
				wp_nav_menu( array('menu' => 'footer-nl', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'ru'){
				
				wp_nav_menu( array('menu' => 'footer-ru', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif($_SESSION['flag'] == 'cn'){
				
				wp_nav_menu( array('menu' => 'footer-cn', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
				
				wp_nav_menu( array('menu' => 'footer-uk', 'menu_id' => 'nav', 'menu_class' => 'sitemap', 'fallback_cb' => false ));
				
			}
		?>
	</div>
</div>

<?php get_footer(); ?>