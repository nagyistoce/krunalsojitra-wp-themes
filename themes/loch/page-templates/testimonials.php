<?php
/**
 * Template Name: Testimonials
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
				<?php the_content();?>
			 <?php endwhile; // end of the loop. ?>

		
 				
 				   <div class="testi_page">
			               
  					<?php 
  					$i ==0;
					while ( have_posts() ) : the_post(); ?> 
						<?php if(get_field('testimonials_repeater')): ?>
			            <?php while(has_sub_field('testimonials_repeater')): 
											 $i++;
										if($i%2==0){
									?>
												<div class="testimonial-mainnew">
													<div class="testimonial-authorimg">
														<img src="<?php bloginfo('template_directory'); ?>/images/1-new.png" />
														<p class="testimonial-author"><?php  the_sub_field('name');?></p>
														<p class="testimonial-author"><?php  the_sub_field('date');?></p>
														<!-- <span class="author-city">Italy</span> -->
													</div>
													<div class="testimonial-cont">
														<blockquote class="testimonial"> 
															<?php echo the_sub_field('content');?>
														</blockquote>
													</div>
													
												</div>
							        <?php }else{ ?>
							        	       	<div class="testimonial-mainnew">
													<div class="testimonial-authorimg">
														<img src="<?php bloginfo('template_directory'); ?>/images/1-new.png" />
														<p class="testimonial-author"><?php  the_sub_field('name');?></p>
														<p class="testimonial-author"><?php  the_sub_field('date');?></p>
														<!-- <span class="author-city">Italy</span> -->
													</div>
													<div class="testimonial-cont">
														<blockquote class="testimonial"> 
															<?php echo the_sub_field('content');?>
														</blockquote>
													</div>	
												</div>
									 <?php }endwhile; ?>
						<?php endif; ?>
					<?php endwhile; wp_reset_query(); ?>	
				 </div>
	 </div>
   	</div>
	</div>
</div>	 							            	           
<?php get_footer(); ?>