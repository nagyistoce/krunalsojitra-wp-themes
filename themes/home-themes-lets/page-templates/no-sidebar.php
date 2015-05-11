<?php
/**
 * Template Name: No Sidebar
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
	<div class="inner-page blog no-sidebar">
    	<!--banner -->
    	
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
<div class="page-content">
	<!-- BEGIN PAGE CONTENT-->
			<div class="general-page">	
                        	<h1><?php the_title(); ?></h1>
                        
			                     <?php
									while ( have_posts() ) : the_post();
										the_content();
									endwhile;
								?>
                        </div>
                        
                        	<h2>Our Testimonials</h2>	
									 <div class="slidercont">
	          						  <ul class="bxslider">
	          						  	
								     	<?php $i ==0;
								     	while(has_sub_field('testimonials', 2)): 
								     	 $i++;
										if($i%2==0){
								     	?>
								     		<li>
												<div class="testimonial-mainnew">
													<div class="testimonial-authorimg">
														<?php if(get_sub_field('images', 2) != ''){ ?>
																<img src="<?php echo get_sub_field('images', 2); ?>" />
														<?php }else{?>
																<img src="<?php bloginfo('template_directory'); ?>/images/1-new.png" />
														<?php }?>
														
														<p class="testimonial-author"><?php the_sub_field('client_name', 2);?></p>
														<!-- <span class="author-city">Italy</span> -->
													</div>
													<div class="testimonial-cont">
														<blockquote class="testimonial"> 
																
															<?php echo substr(get_sub_field('description', 2), 0, 300);?>
														</blockquote>
													</div>
												</div>
							                </li>
							               <?php }else{ ?>
							               	<li>
												<div class="testimonial-mainnew">
													<div class="testimonial-authorimg">
														<?php if(get_sub_field('images', 2) != ''){ ?>
																<img src="<?php echo get_sub_field('images', 2); ?>" />
														<?php }else{?>
																<img src="<?php bloginfo('template_directory'); ?>/images/2-new.png" />
														<?php }?>
														<p class="testimonial-author"><?php the_sub_field('client_name', 2);?></p>
														<!-- <span class="author-city">Italy</span> -->
													</div>
													<div class="testimonial-cont">
														<blockquote class="testimonial"> 
															<?php echo substr(get_sub_field('description', 2), 0, 300);?>
														</blockquote>
													</div>
												</div>
							                </li>
										<?php } endwhile; wp_reset_query(); ?>
										  </ul>
           							 </div>
                        	<?php
								query_posts('post_type=portfolio&posts_per_page=3&orderby=rand');
								while( have_posts() ):the_post();
							
								?>								
									<div class="portinline">
										<a href="<?php echo home_url(); ?>/portfolio.html">
											<img alt="<?php the_title(); ?>" src="<?php echo get_field('image'); ?>">
											<h6><?php the_title(); ?></h6>
										</a>
									</div>
															
							<?php endwhile; ?>
							<p><a href="http://www.letsnurture.com/contact.html" class="ct-btn">Contact</a></p>				
							
	 </div>
    <!--inner-page -->
    </div>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery.bxslider.min.js"></script>
<link href="<?php bloginfo('template_directory'); ?>/css/jquery.bxslider.css" rel="stylesheet" />
<script type="text/javascript">
$(document).ready(function(){
$('.bxslider').bxSlider({
  minSlides: 2,
  maxSlides: 2,
  slideWidth: 800,
  slideMargin: 10,
  pager: false,
 	auto: true,
  touchEnabled: true,
controls: false
  
  
});
});
</script>
<?php get_footer();
