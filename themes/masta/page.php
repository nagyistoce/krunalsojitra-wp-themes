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

	<div class="slider_ppart">
       
      <div class="inr_leftpnl"> 
               <?php get_sidebar(); ?>
     </div>
        <div class="inr_rightpnl">

			<?php while ( have_posts() ) : the_post(); ?>
            
            
				<?php get_template_part( 'content', 'page' ); ?>
				<?php //comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div>
    </div>
  <?php get_footer(); ?>