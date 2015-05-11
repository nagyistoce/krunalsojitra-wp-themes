<?php
/**
 * Template Name: Contact Us Template 
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<?php
		global $post; // If outside the loop
		$page_object = get_queried_object();
		$page_id  = get_queried_object_id(); // Get current page id
		$title = get_post($page_id); // Get live webcam page title
		
		$args = array(
			'sort_order' => 'ASC',
			'sort_column' => 'post_title',
			'hierarchical' => 1,
			'exclude' => '',
			'include' => $page_id,
			'meta_key' => '',
			'meta_value' => '',
			'authors' => '',
			'child_of' => 0,
			'parent' => -1,
			'exclude_tree' => '',
			'number' => '',
			'offset' => 0,
			'post_type' => 'page',
			'post_status' => 'publish'
		); 
		$pages = get_pages($args);
		
		$parentID = $pages[0]->post_parent; // Get current page parent id
	?>

  	<div class="slide cont_page" id="contact-slide" data-slide="1" data-stellar-background-ratio="0.5">
  		<?php
			if($parentID == 689 || $parentID == 691 || $parentID == 693 || $parentID == 695 || $parentID == 697 || $parentID == 699 || $parentID == 701 || $parentID == 703 || $parentID == 705){
				$children = wp_list_pages("title_li=&child_of=".$page_id."&echo=0");
			}else{
				$children = wp_list_pages("title_li=&child_of=".$parentID."&echo=0");
			}
			if($children){
		?>
			<div class="sub-nav">
	        	<?php
					echo "<ul>";
						echo $children;
					echo "</ul>";
	        	?>
	    	</div>
	    <?php } ?>
	    
		<div class="contact-box">
				<?php
				while ( have_posts() ) : the_post(); ?>
						
			   		<?php
						$hide_title = get_field('hide_main_title', $page_id);
						 
					 	if($hide_title != "Yes"): 
					?>
		            	<h3><?php the_title(); ?></h3>
		            <?php endif; ?>
		            
			<?php endwhile; ?>
		<?php
    		$contact_us = array( 'post_type' => 'contact_us' );
			$contact = new WP_Query( $contact_us );
				
			if ( $contact->have_posts() ) : $contact->the_post();
		?>
        	
            <div class="clear"></div>
            <div class="detail-main ff-left">
                
                <div class="cnt-mn">
                <div class="call ff-left"><?php echo get_field('telephone_no', $page_id ); ?><br />
                <?php echo get_field('fax_no', $page_id ); ?></div>
                <br /><br />

                <a class="mail ff-left" href="mailto:<?php echo get_field('email', $page_id ); ?>"><?php echo get_field('email', $page_id ); ?></a>
				<br /><br />
				<?php
					$email = get_field('website', $page_id );
				?>
                <a class="web ff-left" href="http://<?php echo trim($email); ?>"><?php echo get_field('website', $page_id ); ?></a>
                </div>

                <div class="address ff-left"><?php echo get_field('address', $page_id ); ?>
               
                    <ul>
                    	<li><a href="<?php echo get_field('youtube_link', $page_id ); ?>"  target="_blank"><img src="<?php echo get_field('youtube_image', $page_id ); ?>" /></a></li>
                        <li><a href="<?php echo get_field('facebook_link', $page_id ); ?>"  target="_blank"><img src="<?php echo get_field('facebook_image', $page_id ); ?>" /></a></li>
                        <li><a href="<?php echo get_field('twitter_link', $page_id ); ?>"  target="_blank"><img src="<?php echo get_field('twitter_image', $page_id ); ?>" /></a></li>
                        <li><a href="<?php echo get_field('google_link', $page_id ); ?>"  target="_blank"><img src="<?php echo get_field('google_image', $page_id ); ?>" /></a></li>
                        <li><a href="<?php echo get_field('instagram_link', $page_id ); ?>"  target="_blank"><img src="<?php echo get_field('instagram_image', $page_id ); ?>" /></a></li>
                        <li><a href="<?php echo get_field('pinterest_link', $page_id ); ?>"  target="_blank"><img src="<?php echo get_field('pinterest_image', $page_id ); ?>" /></a></li>
                        
                    </ul>
                </div>

            </div>

            <div class="clear"></div>
          <?php 
 $location = get_field('map', $page_id );
 if( !empty($location) ):
?>
<div class="acf-map">
	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
</div>
<?php endif; ?>

  <?php endif; ?>
        </div>
	</div>
    <!--End Slide 1-->
<style type="text/css">
 
.acf-map {
	width: 100%;
	height: 400px;
	border: #ccc solid 1px;
	margin: 20px 0;
}
 
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
(function($) {
 
/*
*  render_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/
 
function render_map( $el ) {
 
	// var
	var $markers = $el.find('.marker');
 
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
 
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
 
	// add a markers reference
	map.markers = [];
 
	// add markers
	$markers.each(function(){
 
    	add_marker( $(this), map );
 
	});
 
	// center map
	center_map( map );
 
}
 
/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/
 
function add_marker( $marker, map ) {
 
	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
 
	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});
 
	// add to array
	map.markers.push( marker );
 
	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});
 
		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {
 
			infowindow.open( map, marker );
 
		});
	}
 
}
 
/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/
 
function center_map( map ) {
 
	// vars
	var bounds = new google.maps.LatLngBounds();
 
	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){
 
		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
 
		bounds.extend( latlng );
 
	});
 
	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}
 
}
 
/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
 
$(document).ready(function(){
 
	$('.acf-map').each(function(){
 
		render_map( $(this) );
 
	});
 
});
 
})(jQuery);
</script>
<?php get_footer(); ?>