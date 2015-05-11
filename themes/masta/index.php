<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
      
	  <?php
			$args = array(
                 'post_type'=>'homopost'
            );
            $i = 0;
			global $more; 
			query_posts( $args ); 
			while (have_posts()) : the_post(); 
			$more = 0;
			?>
            
       <div class="rt_bnr"><img src="<?php echo get_field('image'); ?>" alt="" /></div>
       <?php echo get_field('description'); ?>
       <?php endwhile;?>
  
  
     </div>
    </div>
  <?php get_footer(); ?>