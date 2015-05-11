<?php
/**
 * The template for displaying all pages.
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
<div class="navi">
  <div class="navi1">
    <div class="navi2">
     <?php if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?>        
    </div>
  </div>
</div>

<div class="navi in_con">
	<div class="navi1">
<div class="common_page">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php //comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
                   
</div>
		</div><!-- #navi -->
	</div><!-- #navi1 -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>