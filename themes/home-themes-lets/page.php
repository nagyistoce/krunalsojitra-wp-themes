<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
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
                        	<h1><?php the_title(); ?></h1>
                        
			                     <?php
									while ( have_posts() ) : the_post();
										the_content();
									endwhile;
								?>
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