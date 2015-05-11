<?php
/**
 * Template Name: Portfolio
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div class="page-content">
	<!-- BEGIN PAGE CONTENT-->
			<div class="general-page">	
				<h1>Web Portfolio</h1>
				<div class="portfolio-listing flexslider">
					
				<ul class="slides">	
				<?php
					query_posts('post_type=portfolio&portfolio_type=web&posts_per_page=-1');
					while( have_posts() ):the_post();
					$image = get_field('image_gallery');
				?>
				<li>
					<img src="<?php echo get_site_url(); ?>/timthumb.php?src=<?php  echo get_field('image');?>&w=150&h=150&q=90" alt="" />
					<strong><?php the_title(); ?></strong>
				</li>
				<?php endwhile; wp_reset_query(); ?>
				</ul>
					
				</div>
				
				<h1>Mobile Portfolio</h1>
				<div class="portfolio-listing flexslider">
					
				<ul class="slides">	
				<?php
					query_posts('post_type=portfolio&portfolio_type=mobile&posts_per_page=-1');
					while( have_posts() ):the_post();
					$image = get_field('image_gallery');
				?>
				<li>
					<img src="<?php echo get_site_url(); ?>/timthumb.php?src=<?php  echo get_field('image');?>&w=150&h=150&q=90" alt="" />
					<strong><?php the_title(); ?></strong>
				</li>
				<?php endwhile; ?>
				</ul>
				</div>	
				
				
			</div>
</div>
<?php

get_footer();
