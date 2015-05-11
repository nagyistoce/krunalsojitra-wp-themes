<?php
/**
 * The Template for displaying all single posts
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

				<?php get_template_part( 'content', get_post_format() ); ?>

				<?php //comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		  </div>
    </div>
  <?php get_footer(); ?>