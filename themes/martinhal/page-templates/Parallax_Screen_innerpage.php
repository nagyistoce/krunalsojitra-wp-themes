<?php
/**
Template Name: Parallax Screen innerpage 
 */

get_header(); 
?>
<?php echo $page_id  = get_queried_object_id(); ?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.js"></script>
<script>
$(function() {
	$( "#from" ).datepicker({ defaultDate: "+1",
		minDate: 0,
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		numberOfMonths: 1,
			onClose: function( selectedDate ) {
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
		});

		$( "#to" ).datepicker({
			defaultDate: "+2",
			dateFormat: "yy-mm-dd",
			changeMonth: true,
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
			$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
});
$(function() {
	$( "#fromipad" ).datepicker({ defaultDate: "+1",
		minDate: 0,
		dateFormat: "yy-mm-dd",
		changeMonth: true,
		numberOfMonths: 1,
			onClose: function( selectedDate ) {
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
		});

		$( "#toipad" ).datepicker({
			defaultDate: "+2",
			dateFormat: "yy-mm-dd",
			changeMonth: true,
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
			$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
});

</script>
	<?php
    	if($_SESSION['flag'] == 'pt'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5930); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('parallax_screen_one_image', $page_id); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('parallax_screen_two_background_image', $page_id); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('parallax_screen_three_background_image', $page_id); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('parallax_screen_four_background_image', $page_id); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('parallax_screen_five_background_image', $page_id); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('ipad_background_image', $page_id); ?>);
			}
		</style>
			<!-- display-ipad -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide display-ipad" id="slide3" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="fromipad" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="toipad" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('ipad_title', $page_id); ?></h2>
	           <?php echo get_field('ipad_content', $page_id); ?>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="ipad_round"><a href="<?php echo get_field('round_one_link', $page_id); ?>"><?php echo get_field('round_one_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_two_link', $page_id); ?>"><?php echo get_field('round_two_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_three_link', $page_id); ?>"><?php echo get_field('round_three_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_four_link', $page_id); ?>"><?php echo get_field('round_four_title', $page_id); ?></a></div>
	            
	            
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <!-- <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a> -->
	        </div>
		</div>
		<!-- Accommodation -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm hide-ipad"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="from" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="to" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('parallax_screen_one_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_one_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Ofertas Especiais</a>
	        </div>
		</div>
		
		
	
		<!-- Restaurants -->
		<?php //$restaurants = get_post(204); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_two_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_two_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(204); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Ofertas Especiais</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php //$spa = get_post(202); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_three_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_three_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(202); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a>-->
	             
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Ofertas Especiais</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php //$facilities = get_post(200); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_four_title', $page_id); ?></h2>
				 <p><?php echo get_field('parallax_screen_four_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(200); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Ofertas Especiais</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php //$kids = get_post(198); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_five_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_five_content', $page_id); ?></p>
	           
	            <!-- <h3><a href="<?php echo get_permalink(198); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Ofertas Especiais</a>
	        </div>
		</div>
		
	<?php
		}elseif($_SESSION['flag'] == 'uk'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5930); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('parallax_screen_one_image', $page_id); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('parallax_screen_two_background_image', $page_id); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('parallax_screen_three_background_image', $page_id); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('parallax_screen_four_background_image', $page_id); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('parallax_screen_five_background_image', $page_id); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('ipad_background_image', $page_id); ?>);
			}
		</style>
		
			<!-- display-ipad -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide display-ipad" id="slide3" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="fromipad" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="toipad" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('ipad_title', $page_id); ?></h2>
	           <?php echo get_field('ipad_content', $page_id); ?>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="ipad_round"><a href="<?php echo get_field('round_one_link', $page_id); ?>"><?php echo get_field('round_one_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_two_link', $page_id); ?>"><?php echo get_field('round_two_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_three_link', $page_id); ?>"><?php echo get_field('round_three_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_four_link', $page_id); ?>"><?php echo get_field('round_four_title', $page_id); ?></a></div>
	            
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <!-- <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a> -->
	        </div>
		</div>
		<!-- Accommodation -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm hide-ipad"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="from" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="to" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('parallax_screen_one_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_one_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		
	
		<!-- Restaurants -->
		<?php //$restaurants = get_post(204); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_two_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_two_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(204); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php //$spa = get_post(202); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_three_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_three_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(202); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a>-->
	             
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php //$facilities = get_post(200); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_four_title', $page_id); ?></h2>
				 <p><?php echo get_field('parallax_screen_four_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(200); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php //$kids = get_post(198); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_five_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_five_content', $page_id); ?></p>
	           
	            <!-- <h3><a href="<?php echo get_permalink(198); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
	<?php
		}elseif($_SESSION['flag'] == 'de'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5930); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('parallax_screen_one_image', $page_id); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('parallax_screen_two_background_image', $page_id); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('parallax_screen_three_background_image', $page_id); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('parallax_screen_four_background_image', $page_id); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('parallax_screen_five_background_image', $page_id); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('ipad_background_image', $page_id); ?>);
			}
		</style>
		
			<!-- display-ipad -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide display-ipad" id="slide3" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="fromipad" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="toipad" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('ipad_title', $page_id); ?></h2>
	           <?php echo get_field('ipad_content', $page_id); ?>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="ipad_round"><a href="<?php echo get_field('round_one_link', $page_id); ?>"><?php echo get_field('round_one_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_two_link', $page_id); ?>"><?php echo get_field('round_two_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_three_link', $page_id); ?>"><?php echo get_field('round_three_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_four_link', $page_id); ?>"><?php echo get_field('round_four_title', $page_id); ?></a></div>
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <!-- <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a> -->
	        </div>
		</div>
		<!-- Accommodation -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm hide-ipad"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="from" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="to" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('parallax_screen_one_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_one_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Top Angebote</a>
	        </div>
		</div>
		
		
	
		<!-- Restaurants -->
		<?php //$restaurants = get_post(204); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_two_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_two_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(204); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Top Angebote</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php //$spa = get_post(202); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_three_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_three_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(202); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a>-->
	             
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Top Angebote</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php //$facilities = get_post(200); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_four_title', $page_id); ?></h2>
				 <p><?php echo get_field('parallax_screen_four_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(200); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Top Angebote</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php //$kids = get_post(198); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_five_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_five_content', $page_id); ?></p>
	           
	            <!-- <h3><a href="<?php echo get_permalink(198); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Top Angebote</a>
	        </div>
		</div>
		
	<?php
		}elseif($_SESSION['flag'] == 'es'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5930); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('parallax_screen_one_image', $page_id); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('parallax_screen_two_background_image', $page_id); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('parallax_screen_three_background_image', $page_id); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('parallax_screen_four_background_image', $page_id); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('parallax_screen_five_background_image', $page_id); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('ipad_background_image', $page_id); ?>);
			}
		</style>
		
			<!-- display-ipad -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide display-ipad" id="slide3" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="fromipad" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="toipad" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('ipad_title', $page_id); ?></h2>
	           <?php echo get_field('ipad_content', $page_id); ?>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="ipad_round"><a href="<?php echo get_field('round_one_link', $page_id); ?>"><?php echo get_field('round_one_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_two_link', $page_id); ?>"><?php echo get_field('round_two_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_three_link', $page_id); ?>"><?php echo get_field('round_three_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_four_link', $page_id); ?>"><?php echo get_field('round_four_title', $page_id); ?></a></div>
	            
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <!-- <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a> -->
	        </div>
		</div>
		<!-- Accommodation -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm hide-ipad"   method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="from" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="to" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('parallax_screen_one_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_one_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		
	
		<!-- Restaurants -->
		<?php //$restaurants = get_post(204); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_two_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_two_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(204); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php //$spa = get_post(202); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_three_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_three_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(202); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a>-->
	             
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php //$facilities = get_post(200); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_four_title', $page_id); ?></h2>
				 <p><?php echo get_field('parallax_screen_four_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(200); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php //$kids = get_post(198); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_five_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_five_content', $page_id); ?></p>
	           
	            <!-- <h3><a href="<?php echo get_permalink(198); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
	<?php
		}elseif($_SESSION['flag'] == 'fr'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5930); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('parallax_screen_one_image', $page_id); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('parallax_screen_two_background_image', $page_id); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('parallax_screen_three_background_image', $page_id); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('parallax_screen_four_background_image', $page_id); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('parallax_screen_five_background_image', $page_id); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('ipad_background_image', $page_id); ?>);
			}
		</style>
	
			<!-- display-ipad -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide display-ipad" id="slide3" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="fromipad" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="toipad" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('ipad_title', $page_id); ?></h2>
	           <?php echo get_field('ipad_content', $page_id); ?>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="ipad_round"><a href="<?php echo get_field('round_one_link', $page_id); ?>"><?php echo get_field('round_one_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_two_link', $page_id); ?>"><?php echo get_field('round_two_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_three_link', $page_id); ?>"><?php echo get_field('round_three_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_four_link', $page_id); ?>"><?php echo get_field('round_four_title', $page_id); ?></a></div>
	            
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <!-- <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a> -->
	        </div>
		</div>
		<!-- Accommodation -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm hide-ipad"   method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="fromipad" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="toipad" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('parallax_screen_one_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_one_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		
	
		<!-- Restaurants -->
		<?php //$restaurants = get_post(204); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_two_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_two_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(204); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php //$spa = get_post(202); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_three_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_three_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(202); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a>-->
	             
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php //$facilities = get_post(200); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_four_title', $page_id); ?></h2>
				 <p><?php echo get_field('parallax_screen_four_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(200); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php //$kids = get_post(198); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_five_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_five_content', $page_id); ?></p>
	           
	            <!-- <h3><a href="<?php echo get_permalink(198); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
	<?php
		}elseif($_SESSION['flag'] == 'it'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5930); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('parallax_screen_one_image', $page_id); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('parallax_screen_two_background_image', $page_id); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('parallax_screen_three_background_image', $page_id); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('parallax_screen_four_background_image', $page_id); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('parallax_screen_five_background_image', $page_id); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('ipad_background_image', $page_id); ?>);
			}
		</style>
		
			<!-- display-ipad -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide display-ipad" id="slide3" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="fromipad" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="toipad" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('ipad_title', $page_id); ?></h2>
	           <?php echo get_field('ipad_content', $page_id); ?>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="ipad_round"><a href="<?php echo get_field('round_one_link', $page_id); ?>"><?php echo get_field('round_one_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_two_link', $page_id); ?>"><?php echo get_field('round_two_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_three_link', $page_id); ?>"><?php echo get_field('round_three_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_four_link', $page_id); ?>"><?php echo get_field('round_four_title', $page_id); ?></a></div>
	            
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <!-- <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a> -->
	        </div>
		</div>
		<!-- Accommodation -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm hide-ipad"   method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="from" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="to" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('parallax_screen_one_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_one_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		
	
		<!-- Restaurants -->
		<?php //$restaurants = get_post(204); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_two_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_two_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(204); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php //$spa = get_post(202); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_three_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_three_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(202); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a>-->
	             
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php //$facilities = get_post(200); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_four_title', $page_id); ?></h2>
				 <p><?php echo get_field('parallax_screen_four_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(200); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php //$kids = get_post(198); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_five_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_five_content', $page_id); ?></p>
	           
	            <!-- <h3><a href="<?php echo get_permalink(198); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
	<?php
		}elseif($_SESSION['flag'] == 'nl'){			
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5930); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('parallax_screen_one_image', $page_id); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('parallax_screen_two_background_image', $page_id); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('parallax_screen_three_background_image', $page_id); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('parallax_screen_four_background_image', $page_id); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('parallax_screen_five_background_image', $page_id); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('ipad_background_image', $page_id); ?>);
			}
		</style>
		
			<!-- display-ipad -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide display-ipad" id="slide3" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm"   method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="fromipad" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="toipad" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('ipad_title', $page_id); ?></h2>
	           <?php echo get_field('ipad_content', $page_id); ?>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="ipad_round"><a href="<?php echo get_field('round_one_link', $page_id); ?>"><?php echo get_field('round_one_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_two_link', $page_id); ?>"><?php echo get_field('round_two_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_three_link', $page_id); ?>"><?php echo get_field('round_three_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_four_link', $page_id); ?>"><?php echo get_field('round_four_title', $page_id); ?></a></div>
	            
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <!-- <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a> -->
	        </div>
		</div>
		<!-- Accommodation -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm hide-ipad"   method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="from" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="to" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('parallax_screen_one_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_one_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		
	
		<!-- Restaurants -->
		<?php //$restaurants = get_post(204); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_two_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_two_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(204); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php //$spa = get_post(202); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_three_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_three_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(202); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a>-->
	             
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php //$facilities = get_post(200); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_four_title', $page_id); ?></h2>
				 <p><?php echo get_field('parallax_screen_four_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(200); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php //$kids = get_post(198); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_five_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_five_content', $page_id); ?></p>
	           
	            <!-- <h3><a href="<?php echo get_permalink(198); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
	<?php
		}elseif($_SESSION['flag'] == 'ru'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5930); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('parallax_screen_one_image', $page_id); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('parallax_screen_two_background_image', $page_id); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('parallax_screen_three_background_image', $page_id); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('parallax_screen_four_background_image', $page_id); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('parallax_screen_five_background_image', $page_id); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('ipad_background_image', $page_id); ?>);
			}
		</style>
		
		
			<!-- display-ipad -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide display-ipad" id="slide3" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="fromipad" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="toipad" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('ipad_title', $page_id); ?></h2>
	           <?php echo get_field('ipad_content', $page_id); ?>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="ipad_round"><a href="<?php echo get_field('round_one_link', $page_id); ?>"><?php echo get_field('round_one_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_two_link', $page_id); ?>"><?php echo get_field('round_two_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_three_link', $page_id); ?>"><?php echo get_field('round_three_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_four_link', $page_id); ?>"><?php echo get_field('round_four_title', $page_id); ?></a></div>
	            
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <!-- <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a> -->
	        </div>
		</div>
		<!-- Accommodation -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm hide-ipad"   method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="from" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="to" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('parallax_screen_one_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_one_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		
	
		<!-- Restaurants -->
		<?php //$restaurants = get_post(204); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_two_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_two_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(204); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php //$spa = get_post(202); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_three_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_three_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(202); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a>-->
	             
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php //$facilities = get_post(200); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_four_title', $page_id); ?></h2>
				 <p><?php echo get_field('parallax_screen_four_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(200); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php //$kids = get_post(198); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_five_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_five_content', $page_id); ?></p>
	           
	            <!-- <h3><a href="<?php echo get_permalink(198); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
	<?php
		}elseif($_SESSION['flag'] == 'cn'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5930); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('parallax_screen_one_image', $page_id); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('parallax_screen_two_background_image', $page_id); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('parallax_screen_three_background_image', $page_id); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('parallax_screen_four_background_image', $page_id); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('parallax_screen_five_background_image', $page_id); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('ipad_background_image', $page_id); ?>);
			}
		</style>
		
			<!-- display-ipad -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide display-ipad" id="slide3" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="fromipad" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="toipad" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('ipad_title', $page_id); ?></h2>
	           <?php echo get_field('ipad_content', $page_id); ?>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="ipad_round"><a href="<?php echo get_field('round_one_link', $page_id); ?>"><?php echo get_field('round_one_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_two_link', $page_id); ?>"><?php echo get_field('round_two_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_three_link', $page_id); ?>"><?php echo get_field('round_three_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_four_link', $page_id); ?>"><?php echo get_field('round_four_title', $page_id); ?></a></div>
	            
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <!-- <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a> -->
	        </div>
		</div>
		<!-- Accommodation -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm hide-ipad"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="from" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="to" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('parallax_screen_one_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_one_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		
	
		<!-- Restaurants -->
		<?php //$restaurants = get_post(204); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_two_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_two_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(204); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php //$spa = get_post(202); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_three_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_three_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(202); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a>-->
	             
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php //$facilities = get_post(200); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_four_title', $page_id); ?></h2>
				 <p><?php echo get_field('parallax_screen_four_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(200); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php //$kids = get_post(198); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_five_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_five_content', $page_id); ?></p>
	           
	            <!-- <h3><a href="<?php echo get_permalink(198); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
	<?php							
		}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5930); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('parallax_screen_one_image', $page_id); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('parallax_screen_two_background_image', $page_id); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('parallax_screen_three_background_image', $page_id); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('parallax_screen_four_background_image', $page_id); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('parallax_screen_five_background_image', $page_id); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('ipad_background_image', $page_id); ?>);
			}
		</style>
		
		<!-- display-ipad -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide display-ipad" id="slide3" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="fromipad" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="toipad" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('ipad_title', $page_id); ?></h2>
	           <?php echo get_field('ipad_content', $page_id); ?>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="ipad_round"><a href="<?php echo get_field('round_one_link', $page_id); ?>"><?php echo get_field('round_one_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_two_link', $page_id); ?>"><?php echo get_field('round_two_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_three_link', $page_id); ?>"><?php echo get_field('round_three_title', $page_id); ?></a></div>
	            <div class="ipad_round"><a href="<?php echo get_field('round_four_link', $page_id); ?>"><?php echo get_field('round_four_title', $page_id); ?></a></div>
	            <!-- <div class="ipad_round"><a href="<?php echo get_field('round_five_link', $page_id); ?>"><?php echo get_field('round_five_title', $page_id); ?></a></div> -->
	           
	            
	           
	            
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <!-- <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a> -->
	        </div>
		</div>
		<!-- Accommodation -->
		<?php //$accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
				<form id="chk-bx" class="chek-frm hide-ipad"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Check in
                        <input type="text" id="from" name="from">
                    </label>
                    <label for="to">
                        Check out
                        <input type="text" id="to" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>

	        	<h2><?php echo get_field('parallax_screen_one_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_one_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		
	
		<!-- Restaurants -->
		<?php //$restaurants = get_post(204); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_two_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_two_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(204); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php //$spa = get_post(202); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_three_title', $page_id); ?></h2>
	            <p><?php echo get_field('parallax_screen_three_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(202); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a>-->
	             
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php //$facilities = get_post(200); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_four_title', $page_id); ?></h2>
				 <p><?php echo get_field('parallax_screen_four_content', $page_id); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(200); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php //$kids = get_post(198); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_field('parallax_screen_five_title', $page_id); ?></h2>
	           <p><?php echo get_field('parallax_screen_five_content', $page_id); ?></p>
	           
	            <!-- <h3><a href="<?php echo get_permalink(198); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		

	<?php
		}
	?>       

		
	<style>
		h2{font-size: 36px!important;}
		
	</style>
<?php get_footer(); ?>
