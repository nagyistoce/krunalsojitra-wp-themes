<?php
/**
 * Template Name: Default No Social
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
		global $post;     // if outside the loop
		$page_object = get_queried_object();
		$page_id  = get_queried_object_id(); // Get current page id
	?>
	
	<div class="slide" id="content-slide" data-slide="1" data-stellar-background-ratio="0.5">    
		<div class="content-box" id="cust-scrl">
			<?php
				while ( have_posts() ) : the_post(); ?>
						
			   		<?php
						$hide_title = get_field('hide_main_title', $page_id);
						 
					 	if($hide_title != "Yes"): 
					?>
		            	<h1><?php the_title(); ?></h1>
		            <?php endif; ?>
		            
					<p><?php the_content(); ?></p>
				
			<?php endwhile; ?>
			<?php //echo do_shortcode('[ssba]'); ?>
        </div>
	</div>
	
<?php get_footer(); ?>