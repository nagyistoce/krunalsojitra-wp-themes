<?php
/**
 * Template Name: Sitemap
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

	<div class="blog-content inner-page">
	<div class="container">
		<div class="service-box">
			<div class="main-box">
			<?php while ( have_posts() ) : the_post(); ?>
				<h4><?php the_title();?></h4>
				<?php //the_content();?>
			 <?php endwhile; // end of the loop. ?>
			 <div class="site-map">
				<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>	 
			</div>
	 </div>
   	</div>
	</div>
</div>	 							            	           
<?php get_footer(); ?>