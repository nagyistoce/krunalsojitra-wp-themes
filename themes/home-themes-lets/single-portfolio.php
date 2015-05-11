<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); //exit('call');?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/magnific-popup.css"> 

<div class="inner-page detail_port">
	<div class="blogs bloginner">
		<div class="container">
			
	<!-- BEGIN PAGE CONTENT-->
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
			?>
			
			<div class="portfolio_detail">
				<div class="portfolio_left"> 		
					
					      <div class="main_img"><img src="<?php echo get_field('image');?>" /></div>
					
			 				<div class="more_img">
			 					<ul class="popup-gallery">
			 					<?php while(has_sub_field('more_image')):
			 						if(get_sub_field('image') != ""){?>
									<li>
										<a href="<?php  the_sub_field('image');?>" title="<?php the_title(); ?>">
											<img src="<?php  the_sub_field('image');?>" title="<?php the_title(); ?>" />
										</a>
									</li>
								<?php }endwhile; wp_reset_query(); ?>
								</ul>
							</div>
				</div>
			
			<div class="portfolio_right">
				<div class="port_framwork">
					
				<h1 class="head-title"><?php the_title();?></h1>
                </div>
                <?php if(get_field('framework') != ''){?>
				<div class="port_framwork">
					<span>Technology :</span>
				<?php echo get_field('framework');?>
				</div>
				<?php	}?>
				<?php if(get_field('operating_system') != ''){?>
				<div class="port_framwork">
					<span>Operating System :</span>
				<?php echo get_field('operating_system');?>
				</div>
				<?php	}?>
				<?php if(get_field('live_url') != ''){?>
				<div class="port_framwork">
					<span>Live URL :</span>
					<a href="<?php echo get_field('live_url');?>"><?php echo get_field('live_url');?></a>
				</div>
				<?php	}?>
				<?php if(get_field('project_duration') != ''){?>
				<div class="port_framwork">
					<span>Project Duration :</span>
				<?php echo get_field('project_duration');?>
				</div>
				<?php	}?>
				<?php if(get_field('category') != ''){?>
				<div class="port_framwork">
					<span>Category:</span>
				<?php echo get_field('category');?>
				</div>
				<?php	}?>
				<div class="port_des">
					<span>Project Details :</span>
					<?php the_field('description'); ?>
				</div>
					<div class="port_shar"><?php echo do_shortcode( '[hupso]' );?></div>
					<a href="<?php echo get_permalink(84); ?>" class="btn blue">Looking For Similar Solution?</a>
					<?php if(get_field('ios_apps_link') != ''){?>
					<a href="<?php echo get_field('ios_apps_link');?>" class="ios_apps_link"></a>	
					<?php	}?>
					<?php if(get_field('android_apps_link') != ''){?>
					<a href="<?php echo get_field('android_apps_link');?>" class="and_apps_link"></a>
					<?php	}?>
			</div>
			<?php endwhile;	?>
			</div>
				</div>
	</div>
	
</div><!-- #content -->

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.magnific-popup.js"></script> 
<script>
	$('.popup-gallery').each(function() { // the containers for all your galleries
		$(this).magnificPopup({
			delegate: 'li a', // the selector for gallery item
			type: 'image',
			gallery: {
			  enabled:true
			}
		});
	});
	
  
 </script>
<?php get_footer(); ?>