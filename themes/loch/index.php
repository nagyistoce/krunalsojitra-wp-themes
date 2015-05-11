<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<!--banner-start-->

<div id="banner">
  <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
    	<?php $args = array(
			'post_type'=> 'slider',
			'posts_per_page' => 10
			);
			$i ==0;
			query_posts( $args ); ?>
			<?php while ( have_posts() ) : the_post(); 
				?>
      
      <div class="item"> <img src="<?php echo get_field('image'); ?>" alt="<?php the_title();?>">
       <?php /*?> <div class="container">
          <div class="carousel-caption">
            <h1><?php the_title();?></h1>
            <div class="botline"></div>
            <?php echo get_field('content'); ?>
            <p><a class="btn btn-lg btn-primary" href="<?php echo get_field('link'); ?>" role="button">VIEW MORE</a></p>
          </div>
        </div>
	     <?php */?>
	    
      </div>
      
     
      <?php  endwhile; wp_reset_query();?>
      
     
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
  <!-- /.carousel --> 
</div>
<!--banner-end--> 
<!--blog-content-start-->
<div class="blog-content"> 
  <!--container-start-->
  <div class="container"> 
    <!--blog-content-start--> 
    <!--service-box-start-->
    <div class="service-box">
    	<?php $window = get_post(15); // Get martinhal beach resort hotel page title by page id
    	//print_r($window);?> 
      <!--blog1-start-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 blog-box1">
        <div class="imgbox1"><img src="<?php echo get_template_directory_uri(); ?>/images/blog1-img.jpg" alt=""></div>
        <div class="blog1-contbox">
          <h2><?php echo $window->post_title; ?></h2>
          <p><?php echo substr($window->post_content, 0, 150); ?></p>
          <div class="button-box">
            <div class="more-button"><a href="<?php echo get_permalink(15); ?>">more details</a></div>
          </div>
        </div>
      </div>
      <!--blog1-end--> 
      <?php $doors = get_post(58); // Get martinhal beach resort hotel page title by page id?> 
      <!--blog2-start-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 blog-box2">
        <div class="imgbox2"><img src="<?php echo get_template_directory_uri(); ?>/images/blog2-img.jpg" alt=""></div>
        <div class="blog2-contbox">
          <h2><?php echo $doors->post_title; ?></h2>
          <p><?php echo substr($doors->post_content, 0, 150); ?></p>
          <div class="button-box">
            <div class="more-button"><a href="<?php echo get_permalink(58); ?>">more details</a></div>
          </div>
        </div>
      </div>
      <!--blog2-end--> 
      <?php $consectetur = get_post(61); // Get martinhal beach resort hotel page title by page id?> 
      <!--blog3-start-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 blog-box3">
        <div class="imgbox3"><img src="<?php echo get_template_directory_uri(); ?>/images/blog3-img.jpg" alt=""></div>
        <div class="blog3-contbox">
          <h2><?php echo $consectetur->post_title; ?></h2>
          <p><?php echo substr($consectetur->post_content, 0, 150); ?></p>
          <div class="button-box">
            <div class="more-button"><a href="<?php echo get_permalink(61); ?>">more details</a></div>
          </div>
        </div>
      </div>
      <!--blog3-end--> 
    </div>
  </div>
  <!--service-box-end--> 
  <!--container-end--> 
</div>
<!--blog-content-end--> 
	<?php $args = array(
			'post_type'=> 'home_content',
			'posts_per_page' => 1
			);
			
			query_posts( $args ); ?>
			<?php while ( have_posts() ) : the_post(); 
				?>
      
<!--main-content-start-->
<div class="main-content"> 
  <!--left-content-start--> 
  <!--content-start-->
  <div class="container">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 content-left"> 
      
      <!--left-cont-box1-->
      <div class="left-cont-box1">
        <div class="left-cont-box1-leftimg"><img src="<?php echo get_field('service_one_image'); ?>" alt=""></div>
        <div class="left-cont-box1-text"><?php echo get_field('service_one_content'); ?></div>
      </div>
      <!--left-cont-box1-end--> 
      
      <!--left-cont-box2-->
      <div class="left-cont-box2">
        <div class="left-cont-box2-text"><?php echo get_field('service_two_content'); ?></div>
        <div class="left-cont-box2-rightimg"><img src="<?php echo get_field('service_two_image'); ?>" alt=""></div>
      </div>
      <!--left-cont-box2-end--> 
      
      <!--left-cont-box3-->
      <div class="left-cont-box3">
        <div class="left-cont-box3-leftimg"><img src="<?php echo get_field('service_three_image'); ?>" alt=""></div>
        <div class="left-cont-box3-text"><?php echo get_field('service_three_content'); ?></div>
      </div>
      <!--left-cont-box3-end--> 
      
    </div>
    
    <!--left-content-end--> 
    <?php endwhile; wp_reset_query();?>
    <!--right-content-start-->
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 content-right"> 
      <!--testimonials-blog-start-->
      <div class="testimonials-blog">
        <h3>Testimonials</h3>
     <?php while(has_sub_field('testimonials_repeater', 81)):?>
			<?php echo the_sub_field('content', 81);?>
			<p class="name-cli"><strong>—  <?php echo the_sub_field('name', 81);?></strong></p>
	 <?php endwhile; wp_reset_query();?>
       
        <!-- <p>Dalmation Windows is rated 5/5 based on 3 testimonials.</p> -->
      </div>
     
     <?php $args = array(
			'post_type'=> 'home_content',
			'posts_per_page' => 1
			);
			
			query_posts( $args );
			 while ( have_posts() ) : the_post();	?>
      <!--whats-new-start-->
      <div class="whats-new-blog">
        <h3>What's New</h3>
        <?php echo get_field('whats_new_content'); ?>
        
        <!--call-us-start-->
        <div class="call-us">Call Us: <span><?php echo get_field('whats_new_number'); ?></span></div>
        <!--call-us-start--> 
      </div>
      <!--whats-new-end--> 
       <?php endwhile; wp_reset_query();?>
    </div>
    <!--right-content-end--> 
    
  </div>
  <!--container-end--> 
  
</div>
<!--main-content-end-->
 <script>
	$(document).ready(function(){
		$(".carousel-inner .item:first").addClass("active"); 
	});
</script>  
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
