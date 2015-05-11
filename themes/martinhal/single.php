<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php 
	$post = $wp_query->post;
	$PostID = $post->ID;
	$current_page = $PostID;
		
	if( 'press' == get_post_type() ){ /* Custom code for ‘news’ post type. */ 
		
		$slider_post = array( 'post_type' => 'press' );
		$slider = new WP_Query( $slider_post );
 ?>
 
 		<?php
			$page_object = get_queried_object();
			$page_id  = get_queried_object_id(); // Get current page id
			$custom_image = get_field('detail_page_image', $page_id);
			
			if(get_field('detail_page_image', $page_id)){
				?>
					<style type="text/css">
						#real-slide {
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
		
        <div class="slide press_slider" id="real-slide" data-slide="1" data-stellar-background-ratio="0.5">
			<div class="real-box">
				<?php the_title();?>
            	<section class="slider">
            		<div class="flexslider">
                    	<ul class="slides">	
            				<?php if ( $slider->have_posts() ) : $slider->the_post(); ?>
            					<?php if(get_field('popup_image', $current_page)): ?>
									<?php while(has_sub_field('popup_image', $current_page)): ?>
									     <li><img src="<?php the_sub_field('image', $current_page); ?>" /></li>
									<?php endwhile; ?>
								<?php endif; ?>
           					 <?php endif; ?>
                    	</ul>
                	</div>
            	</section>	
          	</div>
		</div>
<?php
	} else { 
?>

	<?php
		$page_object = get_queried_object();
		$page_id  = get_queried_object_id(); // Get current page id
		$custom_image = get_field('detail_page_image', $page_id);
		
		if(get_field('detail_page_image', $page_id)){
			?>
				<style type="text/css">
					#content-slide {
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
					#content-slide {
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
		<div class="content-box" id="cust-scrl">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					$hide_title = get_field('hide_main_title', $page_id);
					 
				 	if($hide_title != "Yes"): 
				?>
	            	<h1><?php the_title(); ?></h1>
	            <?php endif; ?>
	            <p><?php the_content(); ?></p>
	        <?php endwhile; // end of the loop. ?>
	        
	        <?php //echo do_shortcode('[ssba]'); ?>
        </div>
        
	</div>	
<?php } ?>
<?php get_footer(); ?>