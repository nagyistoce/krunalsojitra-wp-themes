<?php
/**
 * Template Name: Contact Template
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
* @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
get_header(); ?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function initialize () {
	 var latlng = new google.maps.LatLng(23.072192,72.524754);
//change LatLng with yours
var myOptions = {
 		zoom: 17,
 		center: latlng,
 		mapTypeId: google.maps.MapTypeId.ROADMAP};
 		//(Change,MapTypeId options:HYBRID, ROADMAP, TERRAIN, SATELLITE)
var map = new google.maps.Map
 		(document.getElementById("map_canvas_1"),myOptions);
 		// add a map marker
	var marker = new google.maps.Marker({
 		position: new google.maps.LatLng(23.072192,72.524754),
 		map: map,
 		//icon:"http://localhost/letsnurture/wp-content/themes/letsnurture/images/india.png",
 		title: 'Lets Nurture'
 });
 }
</script>
<style>
.map{ width:100%; float:left; height:400px; margin-bottom: 25px;}
</style>

<?php $page_id  = get_queried_object_id(); // Get current page id ?>
  <!--inner-page -->
	<div class="inner-page blog">
    	<!--banner -->
    	<?php  $banner_image = get_field('page_banner', $page_id);?>
    	<?php
    	if($banner_image != ''){?>
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
            	<div class="blog-left ff-left">
                	<article>
                           <div class="blog-detail">
                        	<h1><?php the_title(); ?></h1>
                        
                        		<div  class="map" id="map_canvas_1"></div>
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

             

             

             

 <script type="text/javascript">
jQuery(document).ready(function(){
initialize(); 
});
</script> 

<?php get_footer(); ?>