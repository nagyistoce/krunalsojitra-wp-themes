<?php
/**
 * Template Name: Contact Us
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

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function initialize () {
	 var latlng = new google.maps.LatLng(55.832164,-4.211603);
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
 		position: new google.maps.LatLng(55.832164,-4.211603),
 		map: map,
 		title: 'Loch Leven'
 });
 }
</script>

<style>
.map{ width:100%; float:left; height:400px;}
</style>
<div class="blog-content inner-page">
	<div class="container">
		<div class="service-box">
			<div class="main-box">
<h4>Contact Us</h4>
		 <div  class="map" id="map_canvas_1"></div>

             
 <div class="form_add">            
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 contact-bot">
		<div class="cont_form">
			<h4>Contact Form</h4>
			<?php echo do_shortcode('[contact-form-7 id="89" title="Contact form 1"]');?>
		</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 contact-bot">
		<div class="cont_add">
			<h4>Address</h4>
				7 Alleysbank Road,<br />
				Farmeloan Industrial Estate,<br />
				Rutherglen,<br />
				G73 1LX<br /><br />
				<b>Phone :</b> 0141 643 2452
			</div>
		</div>
	</div>
 <script type="text/javascript">
jQuery(document).ready(function(){
	initialize(); 
});
</script> 
 	
   </div>
   	</div>
	</div>
</div>	  
<?php get_footer(); ?>