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
	 var latlng = new google.maps.LatLng(51.565833,-1.802663);
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
 		position: new google.maps.LatLng(51.565833,-1.802663),
 		map: map,
 		title: 'Masta Plasta'
 });
 }
</script>
<style>
.map {
	width: 100%;
	float: left;
	height: 400px;
}
</style>

<div class="slider_ppart">
  <div class="bloger_12">
    <div  class="map" id="map_canvas_1"></div>
    <div class="form_add">
      <div class="cont_form">
        <div class="tit">Contact Form</div>
        <?php echo do_shortcode('[contact-form-7 id="213" title="Contact form 1"]');?></div>
      <div class="cont_add">
        <div class="tit">Address</div>
        Staff Portal<br />
        66 Summers Street,<br />
        Swindon, Wiltshire, <br />
        SN2 2HB. <br />
        01793 497181 </div>
    </div>
    <script type="text/javascript">
jQuery(document).ready(function(){
initialize(); 
});
</script> 
  </div>
</div>
<?php get_footer(); ?>
