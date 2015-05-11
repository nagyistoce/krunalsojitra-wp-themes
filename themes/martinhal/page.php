<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
		<div class="content-box">
			<?php
				while ( have_posts() ) : the_post(); ?>
						
			   		<?php
						$hide_title = get_field('hide_main_title', $page_id);
						 
					 	if($hide_title != "Yes"): 
					?>
		            	<h1><?php the_title(); ?></h1>
		            <?php endif; ?>
		            
					<?php the_content(); ?>
				
			<?php endwhile; ?>
			<?php //echo do_shortcode('[ssba]'); ?>
        </div>
	</div>
<?php 
 //require_once("footer.php");
 //include("footer.php"); 
get_footer(); ?>

