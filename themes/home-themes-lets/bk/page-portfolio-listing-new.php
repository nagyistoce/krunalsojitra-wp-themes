<?php get_header(); ?>

<div class="page-content">
	<!-- BEGIN PAGE CONTENT-->
			<div class="general-page portfolio_page">	
				<h1>Web</h1>
				
					<div class="portfolio-listing flexslider web_slider">
						<ul class="slides">	
						<?php
							query_posts('post_type=portfolio&portfolio_type=web&posts_per_page=-1');
							while( have_posts() ):the_post();
						?>
						<li>
							<img src="<?php  echo get_field('image');?>" title="<?php the_title(); ?>" />
							<p><?php the_title(); ?></p>
						</li>
						<?php  endwhile; wp_reset_query(); ?>
						</ul>
					</div>
				
				<h1>Mobile</h1>
					<div class="portfolio-listing flexslider mobile_slider">
						<ul class="slides">	
						<?php
							query_posts('post_type=portfolio&portfolio_type=mobile&posts_per_page=-1');
							while( have_posts() ):the_post();
							$image = get_field('image_gallery');
						?>
						<li>
							<img src="<?php  echo get_field('image');?>" title="<?php the_title(); ?>" />
							<p><?php the_title(); ?></p>
						</li>
						<?php endwhile; ?>
						</ul>
					</div>	


<?php get_footer();?>