<?php
/**
 * Template Name: Web Mobile Desigital
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<!--<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/testimonial.css"> --> <!-- Resource style -->
<?php
$page_id  = get_queried_object_id(); // Get current page id 
?>
  <!--inner-page -->
	<div class="inner-page blog full-width">
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
		                
			                     <?php while ( have_posts() ) : the_post();?>
										<?php the_content();?>
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
           							 
									<h2>Our Portfolio</h2>	
									<?php
										query_posts('post_type=portfolio&posts_per_page=3&orderby=rand');
										while( have_posts() ):the_post();
									
									?>								
									<div class="portinline">
										<a href="<?php echo home_url(); ?>/portfolio.html" title="<?php the_title(); ?>">
											<img alt="<?php the_title(); ?>" src="<?php echo get_field('image'); ?>">
											<h6><?php the_title(); ?></h6>
										</a>
									</div>
									<?php  endwhile; wp_reset_query(); ?>
									
									
									<p><a href="http://www.letsnurture.com/contact.html" class="ct-btn">Contact</a></p>		
									<div class="display"><?php  echo do_shortcode( '[hupso]' ); ?></div>						
							<?php endwhile; ?>
		     </div>
	 </div>
    <!--inner-page -->
    </div>


<style>

.hupso-share-buttons{display: none;}
.display .hupso-share-buttons{display: block;}
.testimonial {
    margin: 0;
    /*background: #B7EDFF;*/
 padding: 10px 50px;
 position: relative;
 font-family: Georgia, serif;
 /*color: #fff;*/
 border-radius: 5px;
 font-style: italic;
 /*text-shadow: 0 1px 0 #ECFBFF;*/
 /*background: #0099FF;*/
}

.testimonial:before{
 content: "";
 position: absolute;
 font-size: 80px;
 line-height: 1;
 color: #000;
 font-style: normal;
 width:18px;
 height:18px;
 background: url("<?php bloginfo('template_directory'); ?>/images/invert.png") center no-repeat;
}

.testimonial:before {
 top: 0;
 left: 10px;
}
.testimonial-author {
 margin: 0 0 0 25px;
 font-family: Arial, Helvetica, sans-serif;
 color: #999;
 text-align:left;
 font-weight: bold;
}
.testimonial-author span {
 font-size: 12px;
 color: #666;
}
.testimonial-mainnew{float: left; width: 100%;}
.testimonial-authorimg{float: left; width: 140px; text-align: center;}
p.testimonial-author{text-align: center !important; color: rgb(0, 0, 0); font-weight: normal; font-size: 19px;}
span.author-city{float: left; font-size: 14px; width: 101%; font-weight: bold;}
.testimonial-cont{float: none; width: auto; display:table;}
.slidercont{margin-top: 44px !important; margin-bottom: 40px;}
.testimonial > p {
    color: #5b5959;
    font-style: normal;
    font-weight: normal;
    line-height: 22px;
}

@media screen and (max-width:480px) {
	.testimonial { padding:10px 0 10px 30px;}
	.testimonial p { line-height: 24px;}
		
}
@media screen and (max-width:320px) {
	
}

</style>
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
<?php get_footer();?>