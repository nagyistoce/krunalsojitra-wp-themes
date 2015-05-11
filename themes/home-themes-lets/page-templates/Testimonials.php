<?php
/**
 * Template Name: Testimonials
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<?php
$page_id  = get_queried_object_id(); // Get current page id 
?>

  <!--inner-page -->
	<div class="inner-page blog">
    	<!--banner -->
    	<?php $banner_image = get_field('page_banner', $page_id);  if($banner_image !=""){?>
       <style>
       	.inner-page .banner{background: url("<?php echo $banner_image; ?>");}
       </style>
       <?php } ?>
        <div class="banner ff-left">
            <div class="container">
             	<?php $args = array(
					'post_type'=> 'random_tips',
					'orderby'    => 'rand',
					'posts_per_page' => 1
				);
				query_posts( $args ); ?>
					<?php while ( have_posts() ) : the_post(); ?>
             			<h4><?php the_content(); ?></h4>
                    <?php endwhile; wp_reset_query(); ?>
                 </div>
        </div>
         <!--banner -->
        <!--blogs -->
        <div class="blogs bloginner page_cont">
        	<!--container -->
        	<div class="container">
            	<!--blog-left -->
            	<div class="blog-left ff-left">
                	<article>
                           <div class="blog-detail">
                        	<h1 class="head-title"><?php the_title(); ?></h1>
                        <div class="testi_page">
			               
  								<?php wp_reset_query(); 
															
  										$i ==0;
  										
											while(has_sub_field('testimonials', 2)):
											 $i++;
										if($i%2==0){
									?>
												<div class="testimonial-mainnew">
													<div class="testimonial-authorimg">
														<?php if(get_sub_field('images', 2) != ''){ ?>
																<img src="<?php echo get_sub_field('images', 2); ?>" />
														<?php }else{?>
																<img src="<?php bloginfo('template_directory'); ?>/images/1-new.png" />
														<?php }?>
														<p class="testimonial-author"><?php echo the_sub_field('client_name', 2);?></p>
														<!-- <span class="author-city">Italy</span> -->
													</div>
													<div class="testimonial-cont">
														<blockquote class="testimonial"> 
															<?php echo the_sub_field('description', 2);?>
														</blockquote>
													</div>
												</div>
							        <?php }else{ ?>
							        	       	<div class="testimonial-mainnew">
													<div class="testimonial-authorimg">
														<?php if(get_sub_field('images', 2) != ''){ ?>
																<img src="<?php echo get_sub_field('images', 2); ?>" />
														<?php }else{?>
																<img src="<?php bloginfo('template_directory'); ?>/images/2-new.png" />
														<?php }?>
														<p class="testimonial-author"><?php echo the_sub_field('client_name', 2);?></p>
														<!-- <span class="author-city">Italy</span> -->
													</div>
													<div class="testimonial-cont">
														<blockquote class="testimonial"> 
															<?php echo the_sub_field('description', 2);?>
														</blockquote>
													</div>
												</div>
									<?php }
											endwhile;
									
										wp_reset_query(); 
									?>
			           		
							</div>
                        </div>
                    </article>               	
                 	</article>
			    </div>
				<!--blog-left -->	
               <?php get_sidebar('page'); ?>

            </div>
            <!--container -->
        </div>
        <!--blogs -->
		
	 </div>
    <!--inner-page -->

<?php get_footer(); ?>
