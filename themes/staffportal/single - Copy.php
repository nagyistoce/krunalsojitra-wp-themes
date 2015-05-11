<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
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
<?php if( 'upcoming_events' == get_post_type() ): /* Custom code for ‘news’ post type. */ ?>
<?php
$post = $wp_query->post;
$PostID = $post->ID;
$current_page = $PostID;
//echo "<pre>"."helo";
//print_r($PostID);
?>
<section class="lor1">
	<div class="lol2">
		<div class="das1">
			<div class="das2">
				<div class="das2_1">
					<?php the_title();?>
				</div>
				<div class="das2_2 ped14">
					<div class="evt1">
						<div class="evt5">
							<div class="evt5_1">
								Date:
							</div>
							<div class="evt5_2">
                            
								<?php 
								$postdate = date('d-m-Y' , strtotime(get_field('date'), $current_page));
								echo $postdate;?>
							</div>
						</div>
						<div class="evt5">
							<div class="evt5_1">
								Times:
							</div>
							<div class="evt5_2">
								<?php echo the_field('times', $current_page); ?>
							</div>
						</div>
						<div class="evt5">
							<div class="evt5_1">
								Location:
							</div>
							<div class="evt5_2">
								<?php echo the_field('location', $current_page); ?>
							</div>
						</div>
						<div class="evt5 evt6"><?php 
 
$location = get_field('google_map');
 
if( !empty($location) ):
?>
<div class="acf-map">
	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
</div>
<?php endif; ?>
							
						</div>
						<div class="evt5 evt7">
							<?php echo the_field('description', $current_page); ?>
						</div>
					</div>
				</div>
				<div class="das2_1 evt8">
					Positions Available to Work:
				</div>
				<div class="das2_2 ped14">
                
                <?php 
				 if(isset($_POST['apply_to_work1'])) {
							  $user_id = $user_id;
							$post_id  = get_the_ID();
					 		//$post_id = $_POST['hidden_post_id'];
								$post_det = get_post_meta( $PostID );
								$postdate = $post_det['date'][0];
							 $job_date = date('d-m-Y', strtotime($postdate));
							  $job_event_name = get_the_title();//$_POST['hidden_event_name'];
							  $job_time = $post_det['times'][0];
							  $job_location = $post_det['location__city_name'][0];
							  $positions_name_one = $post_det['positions_name_one'][0];
							  $positions_name_one_availab = $post_det['positions_name_one_availablity'][0];
			 
					 $wpdb->query("INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_one','$job_location','$job_time')");  
					 echo "INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_one','$job_location','$job_time')";
					$insert_mes = "Your applyes has been successfully.";

					
				 }
				
				?>
                
					<div class="evt1 evt12">
						<div class="evt9">
							<?php echo the_field('positions_name_one', $current_page); ?>
						</div>
						<div class="evt9">
							<span>
								<?php echo the_field('positions_name_one_availablity', $current_page); ?>
                            </span>
							<span class="evt10 txt_avl1">
								- Availble
							</span>
						</div>
                        
						<div class="evt3_4 evt9 evt11">
                        <form  method="post" action="">
                        	<input type="submit" name="apply_to_work1"  value="Apply to Work" class="apply_btn"/>
                           </form>
                           </div>
                           <div class="ped2 ped4">
								<p style="color:#2A97C7;">
									<?php  echo $insert_mes;?>
								</p>
							</div>
                        </div>
  <!-------------------------------------------------------apply_to_work1 -------------------------------------------------------->                   <?php 
				 if(isset($_POST['apply_to_work2'])) {
							  $user_id = $user_id;
					 		$post_id = $_POST['hidden_post_id'];
								$post_det = get_post_meta( $PostID );
								$postdate = $post_det['date'][0];
							 $job_date = date('d-m-Y', strtotime($postdate));
							  $job_event_name = $_POST['hidden_event_name'];
							  $job_time = $post_det['times'][0];
							  $job_location = $post_det['location__city_name'][0];
							  $positions_name_two = $post_det['positions_name_two'][0];
							  $positions_name_two_availab = $post_det['positions_name_two_availablity'][0];
			 
					 $wpdb->query("INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_two','$job_location','$job_time')");  
					// echo "INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_two','$job_location','$job_time')";
					$apply_to_work2_insert_mes = "Your applyes has been successfully.";
	
				 }
				
				?>
                    
                    
                    
					<div class="evt1 evt12">
						<div class="evt9">
							<?php echo the_field('positions_name_two', $current_page); ?>
						</div>
						<div class="evt9">
							<span>
								<?php echo the_field('positions_name_two_availablity', $current_page); ?>
                             </span>
							<span class="evt10 txt_avl2">
								- Availble
							</span>
						</div>
                        <div class="evt3_4 evt9 evt11">
							  <form  method="post" action="">
                        	<input type="hidden" name="hidden_post_id" value="<?php the_ID();?>" />
                        	<input type="hidden" name="hidden_event_name" value="<?php the_title()?>" />
							<input type="submit" name="apply_to_work2"  value="Apply to Work" class="apply_btn"/>
                           </form>
						</div>
                         <div class="ped2 ped4">
								<p style="color:#2A97C7;">
									<?php  echo $apply_to_work2_insert_mes;?>
								</p>
							</div>
                         </div>
                       <?php 
						
						   
							//$post_id = the_ID();
							//$job_event_name = the_title();
								$post_det = get_post_meta( $PostID );
								$postdate = $post_det['date'][0];
							 $job_date = date('d-m-Y', strtotime($postdate))."<br />";
							  $job_time = $post_det['times'][0]."<br />";
							  $job_location = $post_det['location__city_name'][0]."<br />";
							  $positions_name_one = $post_det['positions_name_one'][0]."<br />";
							  $positions_name_one_availab = $post_det['positions_name_one_availablity'][0]."<br />";
							  $positions_name_two = $post_det['positions_name_two'][0]."<br />";
							  $positions_name_two_availab = $post_det['positions_name_two_availablity'][0]."<br />";
							
						?> 
					
                        
				</div>
			</div>
            
            
		<?php get_sidebar(); ?>
<?php else: ?>


<section class="lor1">
	<div class="lol2">
		<div class="das1">
			<div class="das2">
            <div class="das2_2 ped14 singb">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
				<?php //comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

			</div>
			</div>
			<?php get_sidebar(); ?>

<?php endif;?>

<?php get_footer(); ?>