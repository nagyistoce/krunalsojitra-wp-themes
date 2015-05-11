<?php
/**
 * Template Name: Our Services
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
    	<?php    	$banner_image = get_field('page_banner', $page_id);    			?>
       <style>
       	.inner-page .banner{background: url("<?php echo $banner_image; ?>");}
       </style>
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
                        	<h4><?php the_title(); ?></h4>
                        	<div class="service">
                        		<?php
									while ( have_posts() ) : the_post();
										the_content();
									endwhile;
								?>
								
             <?php //wp_nav_menu( array( 'theme_location' => 'web' ) ); ?>
								<ul>
									<li class="page_item page-item-4045 page_item_has_children"><a href="http://www.letsnurture.com/training.html">Training</a>
										<ul class="children">
											<li class="page_item page-item-4091"><a href="http://www.letsnurture.com/training/android-training-development-program-ahmedabad.html">Android Training &amp; Development Program</a></li>
											<li class="page_item page-item-4103"><a href="http://www.letsnurture.com/training/ios-training-development-program-ahmedabad.html">iOS/ iPhone Training &amp; Development Program in Ahmedabad</a></li>
											<li class="page_item page-item-4332"><a href="http://www.letsnurture.com/training/jquery-mobile-training.html">Jquery Mobile Training</a></li>
											<li class="page_item page-item-4330"><a href="http://www.letsnurture.com/training/phonegap-training.html">Phonegap Training</a></li>
											<li class="page_item page-item-4100"><a href="http://www.letsnurture.com/training/php-training-development-program-ahmedabad.html">PHP Training &amp; Development Program in Ahmedabad</a></li>
											<li class="page_item page-item-4035"><a href="http://www.letsnurture.com/training/register-here.html">Register here</a></li>
											<li class="page_item page-item-4347"><a href="http://www.letsnurture.com/training/responsive-website-training-in-ahmedabad.html">Responsive Website Training</a></li>
										</ul>
									</li>
									<li class="page_item page-item-623 page_item_has_children"><a href="http://www.letsnurture.com/what-we-do/open-source.html">Open Source</a>
										<ul class="children">
											<li class="page_item page-item-688"><a href="http://www.letsnurture.com/what-we-do/open-source/bigcommerce-ecommerce-development.html">BigCommerce</a></li>
											<li class="page_item page-item-703"><a href="http://www.letsnurture.com/what-we-do/open-source/cake-php.html">Cake PHP</a></li>
											<li class="page_item page-item-687"><a href="http://www.letsnurture.com/what-we-do/open-source/codeigniter-web-development.html">CodeIgniter</a></li>
											<li class="page_item page-item-849"><a href="http://www.letsnurture.com/what-we-do/open-source/doo-php-development.html">DOO PHP Development</a></li>
											<li class="page_item page-item-691"><a href="http://www.letsnurture.com/what-we-do/open-source/moodle-cms-web-development.html">Moodle Development</a></li>
											<li class="page_item page-item-678"><a href="http://www.letsnurture.com/what-we-do/open-source/opencart-ecommerce-webdevelopment.html">Opencart Development</a></li>
											<li class="page_item page-item-4345"><a href="http://www.letsnurture.com/what-we-do/open-source/responsive-website-design.html">Responsive Website Design</a></li>
											<li class="page_item page-item-680"><a href="http://www.letsnurture.com/what-we-do/open-source/x-cart-ecommerce-webdevelopment.html">X-cart Development</a></li>
										</ul>
									</li>
									<li class="page_item page-item-366 page_item_has_children"><a href="http://www.letsnurture.com/what-we-do/seo.html">SEO</a>
										<ul class="children">
											<li class="page_item page-item-777"><a href="http://www.letsnurture.com/what-we-do/seo/branding-reputation-management.html">Branding &amp; Reputation Management</a></li>
											<li class="page_item page-item-766"><a href="http://www.letsnurture.com/what-we-do/seo/conversion-rate-optimization.html">Conversion Rate Optimization</a></li>
											<li class="page_item page-item-763"><a href="http://www.letsnurture.com/what-we-do/seo/inbound-marketing.html">Inbound Marketing</a></li>
											<li class="page_item page-item-771"><a href="http://www.letsnurture.com/what-we-do/seo/search-engine-optimization.html">Search Engine Optimization</a></li>
											<li class="page_item page-item-775"><a href="http://www.letsnurture.com/what-we-do/seo/social-media-marketing.html">Social Media Marketing</a></li>
										</ul>
									</li>
									<li class="page_item page-item-619 page_item_has_children"><a href="http://www.letsnurture.com/what-we-do/customisation.html">Customisation</a>
										<ul class="children">
											<li class="page_item page-item-653"><a href="http://www.letsnurture.com/what-we-do/customisation/drupal-cms-themes.html">Drupal Customisation</a></li>
											<li class="page_item page-item-650"><a href="http://www.letsnurture.com/what-we-do/customisation/joomla-cms-themes.html">Joomla Customisation</a></li>
											<li class="page_item page-item-655"><a href="http://www.letsnurture.com/what-we-do/customisation/magento-cms-themes.html">Magento Customisation</a></li>
											<li class="page_item page-item-648"><a href="http://www.letsnurture.com/what-we-do/customisation/wordpress-cms-themes.html">WordPress Customisation</a></li>
										</ul>
									</li>										
								</ul>
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
