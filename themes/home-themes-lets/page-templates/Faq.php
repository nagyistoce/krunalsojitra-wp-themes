<?php
/**
 * Template Name: Faq
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery-ui.css">
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery-ui.js"></script>
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
                        	<h1 class="head-title"><?php the_title(); ?></h1>
                        	<img src="<?php bloginfo('template_directory'); ?>/images/faqs.jpg" style="width: 741px;"/>
                        	<div id="accordion">
                        		<?php
										
									while(has_sub_field('faq', $page_id)):
									?>
									<h3><?php echo the_sub_field('faq_question', $page_id);?></h3>
							  <div>
							    <?php echo the_sub_field('faq_answer', $page_id);?>
							  </div>
												
									<?php	endwhile; wp_reset_query(); ?>
							  
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
<script>
  $(function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
  });
</script>
<?php get_footer(); ?>
