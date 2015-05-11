<?php
/**
 * Template Name: Full Width Page
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
                        
			                     <?php
									while ( have_posts() ) : the_post();
										the_content();
									endwhile;
								?>
                        </div>
	 </div>
    <!--inner-page -->
    </div>
<?php get_footer();
