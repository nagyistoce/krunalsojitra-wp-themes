<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
* For example, it puts together the home page when no home.php file exists.
 *
* Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header(); ?>

<div class="mai_wra">
  <div id="wrapper">
    <div class="main_page">
      <div class="banner_txt_area">
        <div class="banner_head">We are <span style="color:#af587e;">SocialPiggy</span>, a viral marketing company.</div>
        <div class="banner_con">We create viral buzz around the internet...</div>
      </div>
      <div class="service_area">
        <div class="traffic_ser_area">
          <div class="traffic_head_area">
            <div class="traffic_head_txt"><a href="<?php echo get_bloginfo('wpurl');?>/services">Traffic Services</a></div>
          </div>
          <div class="traffic_img"><a href="<?php echo get_bloginfo('wpurl');?>/services"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/traffic.png" alt="Traffic Services" border="0" /></a></div>
          <div class="read_more_bg">
            <div class="read_more_txt"><a href="<?php echo get_bloginfo('wpurl');?>/services">Read More</a></div>
          </div>
        </div>
        <div class="horizon_sep"></div>
        <div class="traffic_ser_area" style="float:right">
          <div class="traffic_head_area">
            <div class="traffic_head_txt"><a href="<?php echo get_bloginfo('wpurl');?>/services">Social Media Services</a></div>
          </div>
          <div class="traffic_img"><a href="<?php echo get_bloginfo('wpurl');?>/services"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/social.png" alt="Social Media Services" border="0" /></a></div>
          <div class="read_more_bg">
            <div class="read_more_txt"><a href="<?php echo get_bloginfo('wpurl');?>/services">Read More</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="choose_area">
  <div id="wrapper_choose">
    <div class="choose_head">Why Choose<span style="color:#af587e;"> Social Piggy</span>?</div>
    <div class="choose_con">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, trud exercitation ullamco l"Lorem ipsum </div>
    <div class="categary_area">
      <div class="instant_area">
        <div class="inst_img"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/instant_result.png" /> </div>
        <div class="inst_txt_bg">
          <div class="inst_txt"> Instant Result </div>
        </div>
      </div>
      <div class="instant_area">
        <div class="inst_img"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/gerentee.png" /> </div>
        <div class="inst_txt_bg">
          <div class="inst_txt"> Guaranteed Satisfaction </div>
        </div>
      </div>
      <div class="instant_area">
        <div class="inst_img"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/customer_support.png" /> </div>
        <div class="inst_txt_bg">
          <div class="inst_txt"> 24/7 Customer Support </div>
        </div>
      </div>
    </div>
   <div class="mac">
		<div class="catagory_con_area">
			<div id="myCarousel" class="carousel slide">
				<div class="carousel-inner">
                <?php
			$args = array(
                 'post_type'=>'testimonial'
            );

            $i = 0;
			global $more; 

			query_posts( $args ); 

			while (have_posts()) : the_post(); 

			$more = 0;

			?>

                	<?php if($i== "0") {?>
					<div class="item active">
						<div class="container">
							<div class="catagory_txt">
								<?php echo get_field('description'); ?>
							</div>
							<div class="catagory_name">
								<?php echo get_field('name'); ?>
							</div>
						</div>
					</div>
                    
                    <?php }
			else{?>
					<div class="item">
						<div class="container">
							<div class="catagory_txt">
								<?php echo get_field('description'); ?>
							</div>
							<div class="catagory_name">
								<?php echo get_field('name'); ?>
							</div>
						</div>
					</div>
                   
			
				
            <?php } $i++; ?>
                    <?php endwhile;?>
					
				</div>
				
			</div>
		</div>
	</div>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
