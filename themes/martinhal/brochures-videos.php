<?php
/*
Template Name: Brochures Videos
*/

get_header(); ?>

	<?php
		$page_object = get_queried_object();
		$page_id  = get_queried_object_id(); // Get current page id
		$title = get_post($page_id); // Get live webcam page title
		$custom_image = get_field('detail_page_image', $page_id);
		
		if(get_field('detail_page_image', $page_id)){
			?>
				<style type="text/css">
					#video-slide {
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
					#video-slide {
						background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-page-bg.jpg);
						min-height: 800px !important;
						max-height: 800px !important;
						background-size: auto 100% !important;
					}
				</style>
			<?php
		}
	?>
	
	<div class="slide" id="video-slide" data-slide="1" data-stellar-background-ratio="0.5">
		<div class="video-box">
            <ul class="video-gallery">
            	<?php while ( have_posts() ) : the_post(); ?>
			    	<?php if(get_field('brochures_videos')): ?>
			        	<?php $counter = 1; while(has_sub_field('brochures_videos')): ?>
			            	<li>
			                	<a class="html5lightbox" title="<?php echo the_sub_field('title'); ?>" href="<?php echo the_sub_field('video_url'); ?>"><img src="<?php echo the_sub_field('video_image'); ?>" /></a>
			                    <h5><?php echo the_sub_field('title'); ?></h5>
			                    <span><?php echo the_sub_field('short_content'); ?></span>
							</li>
			            <?php $counter++; endwhile; ?>
			        <?php endif; ?>
			    <?php endwhile; ?>
            <ul>
        </div>
	</div>

<?php get_footer(); ?>