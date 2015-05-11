<?php
/**
 * Template Name: Inner Slider
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

get_header(); 

		global $post; // If outside the loop
		$page_object = get_queried_object();
		$page_id  = get_queried_object_id(); // Get current page id
?>
<?php
		$page_object = get_queried_object();
		$page_id  = get_queried_object_id(); // Get current page id
		$custom_image = get_field('detail_page_image', $page_id);
		
		if(get_field('detail_page_image', $page_id)){
			?>
				<style type="text/css">
					#real-slide{
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
					#real-slide {
						background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-page-bg.jpg);
						min-height: 800px !important;
						max-height: 800px !important;
						background-size: auto 100% !important;
					}
				</style>
			<?php
		}
	?>

    <div class="slide" id="real-slide" data-slide="1" data-stellar-background-ratio="0.5">
		<div class="real-box">
			
			 <?php
            if($_SESSION['flag'] == 'pt'){

				
				
			}elseif($_SESSION['flag'] == 'uk'){

				?>
	     		
               
				<?php
				
			}elseif($_SESSION['flag'] == 'de'){
				
				//wp_nav_menu( array('menu' => 'footer-de', 'menu_id' => 'nav', 'menu_class' => 'ft-nav' ));
	
			}elseif($_SESSION['flag'] == 'es'){
				
				//wp_nav_menu( array('menu' => 'footer-es', 'menu_id' => 'nav', 'menu_class' => 'ft-nav' ));
				
			}elseif($_SESSION['flag'] == 'fr'){
				
				//wp_nav_menu( array('menu' => 'footer-fr', 'menu_id' => 'nav', 'menu_class' => 'ft-nav' ));
				
			}elseif($_SESSION['flag'] == 'it'){
				
				//wp_nav_menu( array('menu' => 'footer-it', 'menu_id' => 'nav', 'menu_class' => 'ft-nav' ));
				
			}elseif($_SESSION['flag'] == 'nl'){
				
				//wp_nav_menu( array('menu' => 'footer-nl', 'menu_id' => 'nav', 'menu_class' => 'ft-nav' ));
				
			}elseif($_SESSION['flag'] == 'ru'){
				
				//wp_nav_menu( array('menu' => 'footer-ru', 'menu_id' => 'nav', 'menu_class' => 'ft-nav' ));
				
			}elseif($_SESSION['flag'] == 'cn'){
				
				//wp_nav_menu( array('menu' => 'footer-cn', 'menu_id' => 'nav', 'menu_class' => 'ft-nav' ));
				
			}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
				
				//wp_nav_menu( array('menu' => 'footer-uk', 'menu_id' => 'nav', 'menu_class' => 'ft-nav' ));
				
			}
		?> 
           <?php
		$slider_post = array( 'post_type' => 'inner_slider' );
		$slider = new WP_Query( $slider_post );
	?>
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                    	<?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
        <?php if(get_field('slider_image', $page_id)): ?>
            <?php while(has_sub_field('slider_image', $page_id)): ?>
                	
               
                 <li><img src="<?php the_sub_field('image'); ?>" /></li>
                
            <?php endwhile; ?>
        <?php endif; ?>
    <?php endwhile; ?>
                       
                        
                    </ul>
                </div>
            </section>
            
            <section class="asetet-detail">
					            	
        <?php if(get_field('content', $page_id)): ?>
        	<?php echo get_field('content', $page_id); ?>
        	   <?php endif; ?>

                   </section>
                
        </div>
	</div>
    <!--End Slide 1-->


<?php get_footer(); ?>