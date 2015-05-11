<?php
/**
 * The template for displaying 404 pages (Not Found)
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
    	<?php $banner_image = get_field('page_banner', $page_id);    	if($banner_image != ''){ ?>
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
        <div class="blogs">
        	<!--container -->
        	<div class="container">
            	<!--blog-left -->
            	<div class="blog-left ff-left cont_design">
            			<a href="<?php echo get_site_url(); ?>" class="error_page">
            				<img src="<?php bloginfo('template_directory'); ?>/images/404.png" style="width: 100%;"/>
            			</a>
                   </div>
				<!--blog-left -->	
               
<!--aside -->
                <aside>
                	<div class="follow">
                    	<h3>follow & subscribe</h3>
                        <ul>
                        	<li><a class="ss1" href="http://www.facebook.com/LetsNurture" target="_blank" title="Facebook"></a></li>
                        	<li><a class="ss2" href="http://twitter.com/letsnurture" target="_blank" title="Twitter"></a></li>
                        	<li><a class="ss3" href="#" target="_blank" title="Instagram"></a></li>
                        	<li><a class="ss4" href="http://pinterest.com/letsnurture" target="_blank" title="Pinterest"></a></li>
                        	<li><a class="ss5" href="#" target="_blank" title=""></a></li>
                        	<li><a class="ss6" href="http://www.letsnurture.com/blog/feed/" target="_blank" title="Rss"></a></li>
                        </ul>
                    </div>
                </aside>
                <!--aside -->
            </div>
            <!--container -->
        </div>
        <!--blogs -->
		
	 </div>
    <!--inner-page -->
<?php
get_footer();
