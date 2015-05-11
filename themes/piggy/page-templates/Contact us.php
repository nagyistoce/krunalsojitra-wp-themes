<?php
/**
 * Template Name: Contact Template
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
	 var latlng = new google.maps.LatLng(41.906365,-87.675705);
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
 		position: new google.maps.LatLng(41.906365,-87.675705),
 		map: map,
 		title: 'LetsNurture India'
 });
 
 }

</script>
    
    
<div class="navi">
  <div class="navi1">
    <div class="navi2">
     <?php if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?>   
    </div>
  </div>
</div>
     
<div class="navi in_con">
  <div class="navi1">
    <div class="in_con1">
      <div class="in_con2">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
    <div class="in_con1">
    
    
    <div class="cont_page">
    
    <div class="contact"><?php echo do_shortcode('[contact-form-7 id="199" title="Contact form 1"]'); ?></div>
     <div class="map" id="map_canvas_1"</div>
    
    </div>
    
    
    
    </div>
      </div>
</div>
<script type="text/javascript">// <![CDATA[
jQuery(document).ready(function(){
initialize(); 
});
/*jQuery.unload(function(){
GUnload();
});*/

// ]]></script> 


<?php get_footer(); ?>
