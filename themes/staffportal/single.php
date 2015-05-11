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
//print_r($post);
?>
<section class="lor1">
	<div class="lol2">
		<div class="das1">
			<div class="das2">
				<div class="das2_1">
					<?php the_title(); ?>
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
					<span style="float:left">Positions Available to Work:</span>
                    <span id="apply_msg">&nbsp;</span>
				</div>
				<div class="das2_2 ped14">
                <!-- id, name of current event--> 
                                
                                <?php $job_event_name = get_the_title(); ?>
                 				<?php $postid = get_the_ID(); ?>  

 <?php 
 								$post_det = get_post_meta( $PostID ); 
				 
								$user_id = $user_id;
								$post_id = $postid;	
								$postdate = $post_det['date'][0];
								$job_date = date('Y-m-d', strtotime($postdate));
								
								$job_time = $post_det['times'][0];
								$job_location = $post_det['location__city_name'][0];
								
								$positions_name_one = $post_det['positions_name_one'][0];
								$positions_name_one_availablity = $post_det['positions_name_one_availablity'][0];
								
								$positions_name_two = $post_det['positions_name_two'][0];
								$positions_name_two_availablity = $post_det['positions_name_two_availablity'][0]; 
								
								$positions_name_three = $post_det['positions_name_three'][0];
								$positions_name_three_availablity = $post_det['positions_name_three_availablity'][0];
								
								$positions_name_four = $post_det['positions_name_four'][0];
								$positions_name_four_availablity = $post_det['positions_name_four_availablity'][0];
								
								$positions_name_five = $post_det['positions_name_five'][0];
								$positions_name_five_availablity = $post_det['positions_name_five_availablity'][0];			
								?>                                                              
<?php
//loop to check if user has already applied for the same event or not
$user_appli_count =  $wpdb->get_results("SELECT count(user_id) AS application_count FROM my_job WHERE user_id = $user_id AND post_id = $postid;");
echo '<br>';
//echo "SELECT count(user_id) AS application_count FROM my_job WHERE user_id = $user_id AND post_id = $postid;";
$user_application_count = $user_appli_count[0]->application_count;



if($user_application_count == "0")
{
	//echo '<span style="color:#0f6d96">You can apply</span><br>';
}
else
{
	
	?>
    <script>
	$(function(){
		$("#apply_to_work1,#apply_to_work2,apply_to_work3,#apply_to_work4,#apply_to_work5").click(function(e){ //alert('hello');
		e.preventDefault();
		$("#apply_msg").html("You can't reapply for this event.");
	});	
	});
		
	</script>
<?php }


			//check is user has valid licence for the position or not
$sia_licenece_typ = $wpdb->get_row("SELECT select_licence FROM sia_licence WHERE sia_user_id = $user_id");
//echo '<pre>';
//print_r($sia_licenece_typ); 
//echo "licence Type:-".$sia_licenece_typ->select_licence;
$sia_licenece_chk = $sia_licenece_typ->select_licence;
?>                
<!----------------------------------------- conditions for position-1 starts-------------------------------------------------->	
           
					<?php if( !empty($positions_name_one) && !empty($positions_name_one_availablity) )
					{?>
                    <div class="evt1 evt12">
						<div class="evt9">
                
							<?php echo $positions_name_one; ?>
						</div>
						<div class="evt9">
						
                            <?php echo $available_pos1; //print availabe positions after decrement?>
                                 <?php
//to check availibility of positions
	$pos_count1 =  $wpdb->get_results("SELECT count(user_id) AS total FROM my_job WHERE positions_name =  '$positions_name_one' AND post_id = $post_id"); 
	//echo "SELECT count(user_id) AS total FROM my_job WHERE positions_name =  '$positions_name_one' AND post_id = $post_id";


					$pos_count1 = $pos_count1[0]->total;
					$available_pos1 = $positions_name_one_availablity - $pos_count1;
									
					if($available_pos1 <= 0)
					{ $avl_pos1_msg = '<span style="color:#0f6d96"> - Not Available</span><br>';
					}
					else
					{ $avl_pos1_msg = '<span style="color:#0f6d96"> - Available</span><br>';
					} ?>
                            
                         	<span class="remaining_seats"><?php echo $available_pos1; ?></span>   
                            / <!--slashbetween 2 position counts-->
								<?php echo $positions_name_one_availablity; 
								
								
                                
                              echo $avl_pos1_msg; ?>
				  
			<?php	if(isset($_POST['apply_to_work1'])) {	 
				
						$wpdb->query("INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_one','$job_location','$job_time')");  
						//echo "INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_one','$job_location','$job_time')";
						$wpdb->query("INSERT INTO my_job_delete_record VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_one','$job_location','$job_time')"); 
					 wp_redirect(get_permalink($url),301);
					
				}

?>
			 

						</div>
						<div class="evt3_4 evt9 evt11">
                       
							<form  method="post" action="">                        	
							<input type="submit" name="apply_to_work1"  value="Apply to Work" class="apply_btn" id="apply_to_work1"/>
                            </form>
                            						</div>
                        </div>
                        <?php } // if ends ?>
<!----------------------------------------- conditions for position-1 ends-------------------------------------------------->	
<!----------------------------------------- conditions for position-2 starts-------------------------------------------------->	
		<?php if( !empty($positions_name_two) && !empty($positions_name_two_availablity) )
					{?>
        <div class="evt1 evt12">
						<div class="evt9">
                
							<?php echo $positions_name_two; ?>
						</div>
						<div class="evt9">
							
                            <?php echo $available_pos2; //print availabe positions after decrement?>
                                 <?php
//to check availibility of positions
	$pos_count2 =  $wpdb->get_results("SELECT count(user_id) AS total FROM my_job WHERE positions_name =  '$positions_name_two' AND post_id = $post_id"); 
	//echo "SELECT count(user_id) AS total FROM my_job WHERE positions_name =  '$positions_name_two' AND post_id = $post_id";

					$pos_count2 = $pos_count2[0]->total;
					$available_pos2 = $positions_name_two_availablity - $pos_count2;
									
					if($available_pos2 <= 0)
					{ $avl_pos2_msg = '<span style="color:#0f6d96"> - Not Available</span><br>';
					?>
					<style>
					#apply_to_work1{display:none;}
					</style>
					<?php }
					else
					{ $avl_pos2_msg = '<span style="color:#0f6d96"> - Available</span><br>';
					} ?>
                            
                         	<span class="remaining_seats"><?php echo $available_pos2; ?></span>   
                            / <!--slashbetween 2 position counts-->
								<?php echo $positions_name_two_availablity; 
							  
                             		 echo $avl_pos2_msg; ?>
				  
			<?php	if(isset($_POST['apply_to_work2'])) {	 
				
						$wpdb->query("INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_two','$job_location','$job_time')");  
						//echo "INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_one','$job_location','$job_time')";
						$wpdb->query("INSERT INTO my_job_delete_record VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_two','$job_location','$job_time')");
						wp_redirect(get_permalink($url),301);
				}
?>
						</div>
						<div class="evt3_4 evt9 evt11">
                         <?php if($sia_licenece_chk == "CCTV") {   ?>
							<form  method="post" action="" class="apply2">                        	
							<input type="submit" name="apply_to_work2"  value="Apply to Work" class="apply_btn" id="apply_to_work2"/>
                            </form>
                            <?php } else { ?>
                            <span class="cctv">Need licence</span>
                           <style>.apply2{ display:none;} .cctv{ display:block;color:white;}</style>	
                            <?php } ?>
						</div>
                 </div>
                 <?php } //if ends ?>
 <!----------------------------------------- conditions for position-2 ends--------------------------------------------------> <!----------------------------------------- conditions for position-3 starts-------------------------------------------------->	
		<?php if( !empty($positions_name_three) && !empty($positions_name_three_availablity) )
					{?>
        <div class="evt1 evt12">
						<div class="evt9">
                
							<?php echo $positions_name_three; ?>
						</div>
						<div class="evt9">
							
                            <?php echo $available_pos3; //print availabe positions after decrement?>
                                 <?php
//to check availibility of positions
	$pos_count2 =  $wpdb->get_results("SELECT count(user_id) AS total FROM my_job WHERE positions_name =  '$positions_name_three' AND post_id = $post_id"); 
	//echo "SELECT count(user_id) AS total FROM my_job WHERE positions_name =  '$positions_name_three' AND post_id = $post_id";

					$pos_count3 = $pos_count3[0]->total;
					$available_pos3 = $positions_name_three_availablity - $pos_count3;
									
					if($available_pos3 <= 0)
					{ $avl_pos3_msg = '<span style="color:#0f6d96"> - Not Available</span><br>';
					?>
					<style>
					#apply_to_work3{display:none;}
					</style>
					<?php }
					else
					{ $avl_pos3_msg = '<span style="color:#0f6d96"> - Available</span><br>';
					} ?>
                            
                         	<span class="remaining_seats"><?php echo $available_pos3; ?></span>   
                            / <!--slashbetween 2 position counts-->
								<?php echo $positions_name_three_availablity; 
							  
                             		 echo $avl_pos3_msg; ?>
				  
			<?php	if(isset($_POST['apply_to_work3'])) {	 
				
						$wpdb->query("INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_three','$job_location','$job_time')");  
						//echo "INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_three','$job_location','$job_time')";
						$wpdb->query("INSERT INTO my_job_delete_record VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_three','$job_location','$job_time')");
						wp_redirect(get_permalink($url),301);
				}
?>
						</div>
						<div class="evt3_4 evt9 evt11">
                     <?php   if($sia_licenece_chk  == "Manned Guarding")
							{ ?>
							<form  method="post" action="" class="apply3">                        	
							<input type="submit" name="apply_to_work3"  value="Apply to Work" class="apply_btn" id="apply_to_work3"/>
                            </form>
                              <?php } else { ?>
                            <span class="guarding">Need licence</span>
                           <style>.apply3{ display:none;} .guarding{ display:block;color:white;}</style>	
                            <?php } ?>
						</div>
                        </div>
                        <?php } //if ends ?>
 <!----------------------------------------- conditions for position-3 ends-------------------------------------------------->
 <!-------------------------------------- conditions for position-4 starts------------------------------------------------>	
		<?php if( !empty($positions_name_four) && !empty($positions_name_four_availablity) )
					{?>
        <div class="evt1 evt12">
						<div class="evt9">
                
							<?php echo $positions_name_four; ?>
						</div>
						<div class="evt9">
							
                            <?php echo $available_pos4; //print availabe positions after decrement?>
                                 <?php
//to check availibility of positions
	$pos_count4 =  $wpdb->get_results("SELECT count(user_id) AS total FROM my_job WHERE positions_name =  '$positions_name_four' AND post_id = $post_id"); 
	//echo "SELECT count(user_id) AS total FROM my_job WHERE positions_name =  '$positions_name_two' AND post_id = $post_id";

					$pos_count4 = $pos_count4[0]->total;
					$available_pos4 = $positions_name_four_availablity - $pos_count4;
									
					if($available_pos4 <= 0)
					{ $avl_pos4_msg = '<span style="color:#0f6d96"> - Not Available</span><br>';
					?>
					<style>
					#apply_to_work4{display:none;}
					</style>
					<?php }
					else
					{ $avl_pos4_msg = '<span style="color:#0f6d96"> - Available</span><br>';
					} ?>
                            
                         	<span class="remaining_seats"><?php echo $available_pos4; ?></span>   
                            / <!--slashbetween 2 position counts-->
								<?php echo $positions_name_four_availablity; 
							  
                             		 echo $avl_pos4_msg; ?>
				  
			<?php	if(isset($_POST['apply_to_work4'])) {	 
				
						$wpdb->query("INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_four','$job_location','$job_time')");  
						//echo "INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_four','$job_location','$job_time')";
						$wpdb->query("INSERT INTO my_job_delete_record VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_four','$job_location','$job_time')");
						wp_redirect(get_permalink($url),301);
				}
?>
						</div>
						<div class="evt3_4 evt9 evt11">
							<?php  
                            if($sia_licenece_chk == "Door Supervision")
                            {?>
							<form  method="post" action="" class="apply4">                        	
							<input type="submit" name="apply_to_work4"  value="Apply to Work" class="apply_btn apply4" id="apply_to_work4"/>
                            </form>
                             <?php } else { ?>
                            <span class="supervision">Need licence !</span>
                           	<style>.apply4{ display:none;} .supervision{ display:block;color:white;}</style>	
                            <?php } ?>
						</div>
                        </div>
                        <?php } //if ends?>
 <!----------------------------------------- conditions for position-4 ends-------------------------------------------------->
 <!--------------------------------------- conditions for position-5 starts------------------------------------------------>	
		<?php if( !empty($positions_name_five) && !empty($positions_name_five_availablity) )
					{ ?>
        <div class="evt1 evt12">
						<div class="evt9">
                
							<?php echo $positions_name_five; ?>
						</div>
						<div class="evt9">
							
                            <?php echo $available_pos5; //print availabe positions after decrement?>
                                 <?php
//to check availibility of positions
	$pos_count5 =  $wpdb->get_results("SELECT count(user_id) AS total FROM my_job WHERE positions_name =  '$positions_name_five' AND post_id = $post_id"); 
	//echo "SELECT count(user_id) AS total FROM my_job WHERE positions_name =  '$positions_name_five' AND post_id = $post_id";

					$pos_count5 = $pos_count5[0]->total;
					$available_pos5 = $positions_name_five_availablity - $pos_count5;
									
					if($available_pos5 <= 0)
					{ $avl_pos5_msg = '<span style="color:#0f6d96"> - Not Available</span><br>';
					?>
					<style>
					#apply_to_work5{display:none;}
					</style>
					<?php }
					else
					{ $avl_pos5_msg = '<span style="color:#0f6d96"> - Available</span><br>';
					} ?>
                            
                         	<span class="remaining_seats"><?php echo $available_pos5; ?></span>   
                            / <!--slashbetween 2 position counts-->
								<?php echo $positions_name_five_availablity; 
							  
                             		 echo $avl_pos5_msg; ?>
				  
			<?php	if(isset($_POST['apply_to_work5'])) {	 
				
						$wpdb->query("INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_five','$job_location','$job_time')");  
						//echo "INSERT INTO my_job VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_five','$job_location','$job_time')";
						$wpdb->query("INSERT INTO my_job_delete_record VALUES ('', $user_id, '$post_id', '$job_date','$job_event_name',  '$positions_name_five','$job_location','$job_time')");
						wp_redirect(get_permalink($url),301);
				}
?>
						</div>
						<div class="evt3_4 evt9 evt11">
                     <?php  if($sia_licenece_chk == "Close Protection") {  ?>
							<form  method="post" action="" class="apply5">                        	
							<input type="submit" name="apply_to_work5"  value="Apply to Work" class="apply_btn" id="apply_to_work5"/>
                            </form>
                             <?php } else { ?>
                            <span class="protection">Need licence</span>
                           	<style>.apply5{ display:none;} .protection{ display:block; color:white;}</style>	
                            <?php } ?>
						</div>
                        </div>
                        <?php } //if ends ?>
 <!----------------------------------------- conditions for position-5 ends-------------------------------------------------->                      
                            
					
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