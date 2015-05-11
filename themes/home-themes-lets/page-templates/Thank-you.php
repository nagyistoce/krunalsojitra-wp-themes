<?php
/**
 * Template Name: Thank You Temp
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
    	<?php    	$banner_image = get_field('page_banner', $page_id); 
    	if($banner_image !=""){?>
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
            	<div class="blog-left rec">
                	<article>
                           <div class="blog-detail">
                        	<h4 style="text-align: center;">Thank you for submitting your query to us. We will get back to you soon.</h4>
                        <script type="text/javascript">	setTimeout(function () {   window.location.href= 'http://www.letsnurture.com/'; },50000); // 3 seconds</script>
                        </div>
                    </article>               	
                 	</article>
			    </div>
				<!--blog-left -->	
             

            </div>
            <!--container -->
        </div>
        <!--blogs -->
		
	 </div>
    <!--inner-page -->

<?php get_footer(); ?>
 