<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

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

</script>
	<?php
    	if($_SESSION['flag'] == 'pt'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5933); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('home_page_image', 1116); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('home_page_image', 1130); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('home_page_image', 1169); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('home_page_image', 1176); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('home_page_image', 1182); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('home_page_image', 1189); ?>);
			}
		</style>
		<!-- Martinhal Beach Resort & Hotel -->
		<?php $martinhal_pt = get_post(5933); // Get martinhal beach resort hotel page title by page id ?>
		<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
			<div class="banner-text">
				    <form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
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
	            <h1><?php echo $martinhal_pt->post_title; ?></h1>
	            <span><?php echo get_field('small_content', 5933); ?><?php //echo get_excerpt_by_id(5933); ?></span>
	            <div class="clear"></div>
	            <a class="wgt-tr-but" href="<?php echo get_permalink(5933); ?>">descubra mais</a>
	            <div class="clear"></div>
	            <a href="javascript:void(0);" id="down"><img class="down" src="<?php echo get_template_directory_uri(); ?>/images/down.png" /></a>
	        </div>
            
		</div>
		
		<!-- Accommodation -->
		<?php $accommodation = get_post(1116); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $accommodation->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1116); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1116); ?>" title="Read More">Ler mais</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/index.html?culture=pt-PT#startpage" target="_blank">Reserve Ja</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>pt/ofertas-especiais-familia-hotel-resort-martinhal-sagres-portugal">Ofertas Especiais</a>
	        </div>
		</div>
		

		<!-- Restaurants -->
		<?php $restaurants = get_post(1169); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $restaurants->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1169); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1169); ?>" title="Read more">Ler mais</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/index.html?culture=pt-PT#startpage" target="_blank">Reserve Ja</a> -->
	            
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>pt/ofertas-especiais-familia-hotel-resort-martinhal-sagres-portugal">Ofertas Especiais</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php $spa = get_post(1176); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $spa->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1176); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1176); ?>" title="Read More">Ler mais</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/index.html?culture=pt-PT#startpage" target="_blank">Reserve Ja</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>pt/ofertas-especiais-familia-hotel-resort-martinhal-sagres-portugal">Ofertas Especiais</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php $facilities = get_post(1182); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $facilities->post_title; ?></h2>
				<p><?php echo get_excerpt_by_id(1182); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1182); ?>" title="Read More">Ler mais</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/index.html?culture=pt-PT#startpage" target="_blank">Reserve Ja</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>pt/ofertas-especiais-familia-hotel-resort-martinhal-sagres-portugal">Ofertas Especiais</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php $kids = get_post(1189); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $kids->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1189); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1189); ?>" title="Read More">Ler mais</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/index.html?culture=pt-PT#startpage" target="_blank">Reserve Ja</a> -->
	          
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>pt/ofertas-especiais-familia-hotel-resort-martinhal-sagres-portugal">Ofertas Especiais</a>
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
				background-image: url(<?php echo get_field('home_page_image', 208); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('home_page_image', 206); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('home_page_image', 204); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('home_page_image', 202); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('home_page_image', 200); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('home_page_image', 198); ?>);
			}
		</style>
		<!-- Martinhal Beach Resort & Hotel -->
		<?php $martinhal_uk = get_post(5930); // Get martinhal beach resort hotel page title by page id ?>
		<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
			<div class="banner-text">
				    <form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
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
	            <h1><?php echo $martinhal_uk->post_title; ?></h1>
	            <span><?php echo get_field('small_content', 5930); ?><?php //echo get_excerpt_by_id(5930); ?></span>
	            <div class="clear"></div>
	            <a class="wgt-tr-but" href="<?php echo get_permalink(5930); ?>">find out more</a>
	            <div class="clear"></div>
	            <a href="javascript:void(0);" id="down"><img class="down" src="<?php echo get_template_directory_uri(); ?>/images/down.png" /></a>
	        </div>
		</div>
		
		<!-- Accommodation -->
		<?php $accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $accommodation->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(208); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>

		<!-- Restaurants -->
		<?php $restaurants = get_post(204); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $restaurants->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(204); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(204); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	           <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php $spa = get_post(202); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $spa->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(202); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(202); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php $facilities = get_post(200); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $facilities->post_title; ?></h2>
				<p><?php echo get_excerpt_by_id(200); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(200); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	         
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php $kids = get_post(198); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $kids->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(198); ?></p>
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
				background-image: url(<?php echo get_field('home_page_image', 5936); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('home_page_image', 1196); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('home_page_image', 1219); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('home_page_image', 1233); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('home_page_image', 1239); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('home_page_image', 1312); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('home_page_image', 1314); ?>);
			}
		</style>
		<!-- Martinhal Beach Resort & Hotel -->
		<?php $martinhal_de = get_post(5936); // Get martinhal beach resort hotel page title by page id ?>
		<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
			<div class="banner-text">
				    <form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Anreise
                        <input type="text" id="from" name="from">
                    </label>
                    <label for="to">
                        Abreise
                        <input type="text" id="to" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Jetzt Buchen">
                </form>
	            <h1><?php echo $martinhal_de->post_title; ?></h1>
	            <span><?php echo get_field('small_content', 5936); ?><?php //echo get_excerpt_by_id(5936); ?></span>
	            <div class="clear"></div>
	            <a class="wgt-tr-but" href="<?php echo get_permalink(5936); ?>">mehr erfahren</a>
	            <div class="clear"></div>
	            <a href="javascript:void(0);" id="down"><img class="down" src="<?php echo get_template_directory_uri(); ?>/images/down.png" /></a>
	        </div>
		</div>
				
		<!-- Accommodation -->
		<?php $accommodation = get_post(1196); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $accommodation->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1196); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1196); ?>" title="Read More">Weiter</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/index.html?culture=de-DE#startpage" target="_blank">Jetzt Buchen</a> -->
	         
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>de/urlaub-ferien-familien-angebote-hotel-resort-martinhal-sagres-portugal">Top Angebote</a>
	        </div>
		</div>

		<!-- Restaurants -->
		<?php $restaurants = get_post(1233); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $restaurants->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1233); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1233); ?>" title="Read More">Weiter</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/index.html?culture=de-DE#startpage" target="_blank">Jetzt Buchen</a> -->
	          
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>de/urlaub-ferien-familien-angebote-hotel-resort-martinhal-sagres-portugal">Top Angebote</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php $spa = get_post(1239); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $spa->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1239); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1239); ?>" title="Read More">Weiter</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/index.html?culture=de-DE#startpage" target="_blank">Jetzt Buchen</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>de/urlaub-ferien-familien-angebote-hotel-resort-martinhal-sagres-portugal">Top Angebote</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php $facilities = get_post(1312); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $facilities->post_title; ?></h2>
				<p><?php echo get_excerpt_by_id(1312); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1312); ?>" title="Read More">Weiter</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/index.html?culture=de-DE#startpage" target="_blank">Jetzt Buchen</a> -->
	          
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>de/urlaub-ferien-familien-angebote-hotel-resort-martinhal-sagres-portugal">Top Angebote</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php $kids = get_post(1314); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $kids->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1314); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1314); ?>" title="Read More">Weiter</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/index.html?culture=de-DE#startpage" target="_blank">Jetzt Buchen</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>de/urlaub-ferien-familien-angebote-hotel-resort-martinhal-sagres-portugal">Top Angebote</a>
	        </div>
		</div>
	<?php
		}elseif($_SESSION['flag'] == 'es'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5938); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('home_page_image', 1317); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('home_page_image', 1319); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('home_page_image', 1331); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('home_page_image', 1337); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('home_page_image', 1339); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('home_page_image', 1344); ?>);
			}
		</style>
		<!-- Martinhal Beach Resort & Hotel -->
		<?php $martinhal_es = get_post(5938); // Get martinhal beach resort hotel page title by page id ?>
		<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
			<div class="banner-text">
				    <form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Llegada
                        <input type="text" id="from" name="from">
                    </label>
                    <label for="to">
                        Salida
                        <input type="text" id="to" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>
	            <h1><?php echo $martinhal_es->post_title; ?></h1>
	            <span><?php echo get_field('small_content', 5938); ?><?php //echo get_excerpt_by_id(5938); ?></span>
	            <div class="clear"></div>
	            <a class="wgt-tr-but" href="<?php echo get_permalink(5938); ?>">Leer más</a>
	            <div class="clear"></div>
	            <a href="javascript:void(0);" id="down"><img class="down" src="<?php echo get_template_directory_uri(); ?>/images/down.png" /></a>
	        </div>
		</div>
		
		<!-- Accommodation -->
		<?php $accommodation = get_post(1317); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $accommodation->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1317); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1317); ?>" title="Read More">Leer más</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Reserve Ahora</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>es/ofertas-especiales-familia-hotel-resort-martinhal-sagres-portugal">Ofertas Especiales</a>
	        </div>
		</div>
		

		<!-- Restaurants -->
		<?php $restaurants = get_post(1331); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $restaurants->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1331); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1331); ?>" title="Read More">Leer más</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Reserve Ahora</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>es/ofertas-especiales-familia-hotel-resort-martinhal-sagres-portugal">Ofertas Especiales</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php $spa = get_post(1337); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $spa->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1337); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1337); ?>" title="Read More">Leer más</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Reserve Ahora</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>es/ofertas-especiales-familia-hotel-resort-martinhal-sagres-portugal">Ofertas Especiales</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php $facilities = get_post(1339); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $facilities->post_title; ?></h2>
				<p><?php echo get_excerpt_by_id(1339); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1339); ?>" title="Read More">Leer más</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Reserve Ahora</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>es/ofertas-especiales-familia-hotel-resort-martinhal-sagres-portugal">Ofertas Especiales</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php $kids = get_post(1344); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $kids->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1344); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1344); ?>" title="Read More">Leer más</a></h3> -->
	            <div class="clear"></div>
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/">Reserve Ahora</a>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Reserve Ahora</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>es/ofertas-especiales-familia-hotel-resort-martinhal-sagres-portugal">Ofertas Especiales</a>
	        </div>
		</div>
	<?php
		}elseif($_SESSION['flag'] == 'fr'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5940); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('home_page_image', 1350); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('home_page_image', 1352); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('home_page_image', 1356); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('home_page_image', 1358); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('home_page_image', 1361); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('home_page_image', 1367); ?>);
			}
		</style>
		<!-- Martinhal Beach Resort & Hotel -->
		<?php $martinhal_fr = get_post(5940); // Get martinhal beach resort hotel page title by page id ?>
		<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
			<div class="banner-text">
				    <form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
                    <label for="from">
                        Arrivée
                        <input type="text" id="from" name="from">
                    </label>
                    <label for="to">
                        Départ
                        <input type="text" id="to" name="to">
                    </label>
                    
                    <input type="hidden" name="hotel" value="2191,2192,2194">
                    <input class="submit" type="submit" value="Book now">
                </form>
	            <h1><?php echo $martinhal_fr->post_title; ?></h1>
	            <span><?php echo get_field('small_content', 5940); ?><?php //echo get_excerpt_by_id(5940); ?></span>
	            <div class="clear"></div>
	            <a class="wgt-tr-but" href="<?php echo get_permalink(5940); ?>">En savoir plus</a>
	            <div class="clear"></div>
	            <a href="javascript:void(0);" id="down"><img class="down" src="<?php echo get_template_directory_uri(); ?>/images/down.png" /></a>
	        </div>
		</div>
		
		<!-- Accommodation -->
		<?php $accommodation = get_post(1350); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $accommodation->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1350); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1350); ?>" title="Read More">En savoir plus</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Reserver Maintenant</a> -->
	          
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>fr/offres-speciales-familles-vacances-hotel-resort-martinhal-sagres-portugal">Offres Speciales</a>
	        </div>
		</div>

		<!-- Restaurants -->
		<?php $restaurants = get_post(1356); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $restaurants->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1356); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1356); ?>" title="Read More">En savoir plus</a></h3> -->
	            <div class="clear"></div>
	           <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Reserver Maintenant</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>fr/offres-speciales-familles-vacances-hotel-resort-martinhal-sagres-portugal">Offres Speciales</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php $spa = get_post(1358); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $spa->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1358); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1358); ?>" title="Read More">En savoir plus</a></h3> -->
	            <div class="clear"></div>
	           <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Reserver Maintenant</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>fr/offres-speciales-familles-vacances-hotel-resort-martinhal-sagres-portugal">Offres Speciales</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php $facilities = get_post(1361); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $facilities->post_title; ?></h2>
				<p><?php echo get_excerpt_by_id(1361); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1361); ?>" title="Read More">En savoir plus</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Reserver Maintenant</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>fr/offres-speciales-familles-vacances-hotel-resort-martinhal-sagres-portugal">Offres Speciales</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php $kids = get_post(1367); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $kids->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1367); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1367); ?>" title="Read More">En savoir plus</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Reserver Maintenant</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>fr/offres-speciales-familles-vacances-hotel-resort-martinhal-sagres-portugal">Offres Speciales</a>
	        </div>
		</div>
	<?php
		}elseif($_SESSION['flag'] == 'it'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5942); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('home_page_image', 1373); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('home_page_image', 1376); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('home_page_image', 1382); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('home_page_image', 1384); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('home_page_image', 1388); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('home_page_image', 1390); ?>);
			}
		</style>
		<!-- Martinhal Beach Resort & Hotel -->
		<?php $martinhal_it = get_post(5942); // Get martinhal beach resort hotel page title by page id ?>
		<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
			<div class="banner-text">
				    <form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
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
	            <h1><?php echo $martinhal_it->post_title; ?></h1>
	            <span><?php echo get_field('small_content', 5942); ?><?php //echo get_excerpt_by_id(5942); ?></span>
	            <div class="clear"></div>
	            <a class="wgt-tr-but" href="<?php echo get_permalink(5942); ?>">Scopri di più</a>
	            <div class="clear"></div>
	            <a href="javascript:void(0);" id="down"><img class="down" src="<?php echo get_template_directory_uri(); ?>/images/down.png" /></a>
	        </div>
		</div>
		
		<!-- Accommodation -->
		<?php $accommodation = get_post(1373); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $accommodation->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1373); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1373); ?>" title="Leggi tutto">Leggi tutto</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Prenota Ora</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>it/offerte-speciali-famiglie-vacanze-hotel-resort-martinhal-sagres-portugal">Offerte Speciali</a>
	        </div>
		</div>
		

		<!-- Restaurants -->
		<?php $restaurants = get_post(1382); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $restaurants->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1382); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1382); ?>" title="Leggi tutto">Leggi tutto</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Prenota Ora</a> -->
	          
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>it/offerte-speciali-famiglie-vacanze-hotel-resort-martinhal-sagres-portugal">Offerte Speciali</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php $spa = get_post(1384); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $spa->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1384); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1384); ?>" title="Leggi tutto">Leggi tutto</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Prenota Ora</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>it/offerte-speciali-famiglie-vacanze-hotel-resort-martinhal-sagres-portugal">Offerte Speciali</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php $facilities = get_post(1388); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $facilities->post_title; ?></h2>
				<p><?php echo get_excerpt_by_id(1388); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1388); ?>" title="Leggi tutto">Leggi tutto</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Prenota Ora</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>it/offerte-speciali-famiglie-vacanze-hotel-resort-martinhal-sagres-portugal">Offerte Speciali</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php $kids = get_post(1390); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $kids->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1390); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1390); ?>" title="Leggi tutto">Leggi tutto</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Prenota Ora</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>it/offerte-speciali-famiglie-vacanze-hotel-resort-martinhal-sagres-portugal">Offerte Speciali</a>
	        </div>
		</div>
	<?php
		}elseif($_SESSION['flag'] == 'nl'){			
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5945); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('home_page_image', 1392); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('home_page_image', 1395); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('home_page_image', 1398); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('home_page_image', 1401); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('home_page_image', 1404); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('home_page_image', 1407); ?>);
			}
		</style>
		<!-- Martinhal Beach Resort & Hotel -->
		<?php $martinhal_nl = get_post(5945); // Get martinhal beach resort hotel page title by page id ?>
		<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
			<div class="banner-text">
				    <form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
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
	            <h1><?php echo $martinhal_nl->post_title; ?></h1>
	            <span><?php echo get_field('small_content', 5945); ?><?php //echo get_excerpt_by_id(5945); ?></span>
	            <div class="clear"></div>
	            <a class="wgt-tr-but" href="<?php echo get_permalink(5945); ?>">Lees meer</a>
	            <div class="clear"></div>
	            <a href="javascript:void(0);" id="down"><img class="down" src="<?php echo get_template_directory_uri(); ?>/images/down.png" /></a>
	        </div>
		</div>
		
		<!-- Accommodation -->
		<?php $accommodation = get_post(1392); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $accommodation->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1392); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1392); ?>" title="Read More">Lees meer</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>nl/speciale-aanbiedingen-families-vakanties-hotel-resort-martinhal-sagres-portugal" target="_blank">Speciale Aanbiedingen</a>
	        </div>
		</div>
		

		<!-- Restaurants -->
		<?php $restaurants = get_post(1398); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $restaurants->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1398); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1398); ?>" title="Read More">Lees meer</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>nl/speciale-aanbiedingen-families-vakanties-hotel-resort-martinhal-sagres-portugal" target="_blank">Speciale Aanbiedingen</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php $spa = get_post(1401); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $spa->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1401); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1401); ?>" title="Read More">Lees meer</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>nl/speciale-aanbiedingen-families-vakanties-hotel-resort-martinhal-sagres-portugal" target="_blank">Speciale Aanbiedingen</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php $facilities = get_post(1404); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $facilities->post_title; ?></h2>
				<p><?php echo get_excerpt_by_id(1404); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1404); ?>" title="Read More">Lees meer</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>nl/speciale-aanbiedingen-families-vakanties-hotel-resort-martinhal-sagres-portugal" target="_blank">Speciale Aanbiedingen</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php $kids = get_post(1407); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $kids->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1407); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1407); ?>" title="Read More">Lees meer</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/">Book Now</a> -->
	          
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>nl/speciale-aanbiedingen-families-vakanties-hotel-resort-martinhal-sagres-portugal" target="_blank">Speciale Aanbiedingen</a>
	        </div>
		</div>
	<?php
		}elseif($_SESSION['flag'] == 'ru'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5947); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('home_page_image', 1419); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('home_page_image', 1421); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('home_page_image', 1425); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('home_page_image', 1427); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('home_page_image', 1432); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('home_page_image', 1435); ?>);
			}
		</style>
		<!-- Martinhal Beach Resort & Hotel -->
		<?php $martinhal_ru = get_post(5947); // Get martinhal beach resort hotel page title by page id ?>
		<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
			<div class="banner-text">
				    <form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
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
	            <h1><?php echo $martinhal_ru->post_title; ?></h1>
	            <span><?php echo get_field('small_content', 5947); ?><?php //echo get_excerpt_by_id(5947); ?></span>
	            <div class="clear"></div>
	            <a class="wgt-tr-but" href="<?php echo get_permalink(5947); ?>">find out more</a>
	            <div class="clear"></div>
	            <a href="javascript:void(0);" id="down"><img class="down" src="<?php echo get_template_directory_uri(); ?>/images/down.png" /></a>
	        </div>
		</div>
		
		<!-- Accommodation -->
		<?php $accommodation = get_post(1419); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $accommodation->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1419); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1419); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>ru/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		

		<!-- Restaurants -->
		<?php $restaurants = get_post(1425); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $restaurants->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1425); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1425); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>ru/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php $spa = get_post(1427); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $spa->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1427); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1427); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>ru/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php $facilities = get_post(1432); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $facilities->post_title; ?></h2>
				<p><?php echo get_excerpt_by_id(1432); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1432); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	         
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>ru/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php $kids = get_post(1435); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $kids->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(1435); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1435); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>ru/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	<?php
		}elseif($_SESSION['flag'] == 'cn'){
	?>
		<style type="text/css">
			#slide1 {
				background-image: url(<?php echo get_field('home_page_image', 5949); ?>);
			}
			#slide2 {
				background-image: url(<?php echo get_field('home_page_image', 1438); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('home_page_image', 1447); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('home_page_image', 1450); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('home_page_image', 1451); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('home_page_image', 1458); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('home_page_image', 1464); ?>);
			}
		</style>
		<!-- Martinhal Beach Resort & Hotel -->
		<?php $martinhal_cn = get_post(5949); // Get martinhal beach resort hotel page title by page id ?>
		<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
			<div class="banner-text">
				    <form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
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
	            <h1><?php echo $martinhal_cn->post_title; ?></h1>
	            <span><?php echo get_field('small_content', 5949); ?><?php //echo get_excerpt_by_id(5949); ?></span>
	            <div class="clear"></div>
	            <a class="wgt-tr-but" href="<?php echo get_permalink(5949); ?>">find out more</a>
	            <div class="clear"></div>
	            <a href="javascript:void(0);" id="down"><img class="down" src="<?php echo get_template_directory_uri(); ?>/images/down.png" /></a>
	        </div>
		</div>
		
		<!-- Accommodation -->
		<?php
			$accommodation = get_post_field('post_content', 1438); // Get accommodation page title by page id
			
			// strip tags to avoid breaking any html
			$accommodation = strip_tags($accommodation);
			if (strlen($accommodation) > 710) {
			    // truncate string
			    $accommodationCut = substr($accommodation, 0, 710);
			    // make sure it ends in a word so assassinate doesn't become ass...
			    $accommodation = substr($accommodationCut, 0, strrpos($accommodationCut, ' ')).' ... '; 
			}
		?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_the_title( 1438 ); ?></h2>
	            <p><?php  echo $accommodation; ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1438); ?>" title="阅读更多">阅读更多</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>cn/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		

	
		<!-- Restaurants -->
		<?php 
			$restaurants = get_post_field('post_content', 1450); // Get accommodation page title by page id
			
			// strip tags to avoid breaking any html
			$restaurants = strip_tags($restaurants);
			if (strlen($restaurants) > 710) {
			    // truncate string
			    $restaurantsCut = substr($restaurants, 0, 710);
			    // make sure it ends in a word so assassinate doesn't become ass...
			    $restaurants = substr($restaurantsCut, 0, strrpos($restaurantsCut, ' ')).' ... '; 
			} 
		?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_the_title( 1450 ); ?></h2>
	            <p><?php echo $restaurants; ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1450); ?>" title="阅读更多">阅读更多</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>cn/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php 
			$spa = get_post_field('post_content', 1451); // Get accommodation page title by page id
			
			// strip tags to avoid breaking any html
			$spa = strip_tags($spa);
			if (strlen($spa) > 710) {
			    // truncate string
			    $spaCut = substr($spa, 0, 710);
			    // make sure it ends in a word so assassinate doesn't become ass...
			    $spa = substr($spaCut, 0, strrpos($spaCut, ' ')).' ... '; 
			} 
		?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_the_title( 1451 ); ?></h2>
	            <p><?php echo $spa; ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1451); ?>" title="阅读更多">阅读更多</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>cn/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php 
			$facilities = get_post_field('post_content', 1458); // Get accommodation page title by page id
			
			// strip tags to avoid breaking any html
			$facilities = strip_tags($facilities);
			if (strlen($facilities) > 710) {
			    // truncate string
			    $facilitiesCut = substr($facilities, 0, 710);
			    // make sure it ends in a word so assassinate doesn't become ass...
			    $facilities = substr($facilitiesCut, 0, strrpos($facilitiesCut, ' ')).' ... '; 
			} 
		?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_the_title( 1458 ); ?></h2>
				<p><?php echo $facilities; ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1458); ?>" title="阅读更多">阅读更多</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>cn/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php 
			$kids = get_post_field('post_content', 1464); // Get kids clubs page title by page id
			
			// strip tags to avoid breaking any html
			$kids = strip_tags($kids);
			if (strlen($kids) > 710) {
			    // truncate string
			    $kidsCut = substr($kids, 0, 710);
			    // make sure it ends in a word so assassinate doesn't become ass...
			    $kids = substr($kidsCut, 0, strrpos($kidsCut, ' ')).' ... '; 
			} 
		?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo get_the_title( 1464 ); ?></h2>
	            <p><?php echo $kids; ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(1464); ?>" title="阅读更多">阅读更多</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>cn/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
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
				background-image: url(<?php echo get_field('home_page_image', 208); ?>);
			}
			#slide3 {
				background-image: url(<?php echo get_field('home_page_image', 206); ?>);
			}
			#slide4 {
				background-image: url(<?php echo get_field('home_page_image', 204); ?>);
			}
			#slide5 {
				background-image: url(<?php echo get_field('home_page_image', 202); ?>);
			}
			#slide6 {
				background-image: url(<?php echo get_field('home_page_image', 200); ?>);
			}
			#slide7 {
				background-image: url(<?php echo get_field('home_page_image', 198); ?>);
			}
		</style>
		<!-- Martinhal Beach Resort & Hotel -->
		<?php $martinhal_uk = get_post(5930); // Get martinhal beach resort hotel page title by page id ?>
		<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
			<div class="banner-text">
                <form id="chk-bx" class="chek-frm"  method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>book-now#detailview" target="_blank">
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

				<h1><?php echo $martinhal_uk->post_title; ?></h1>
	            <span><?php echo get_field('small_content', 5930); ?><?php //echo get_excerpt_by_id(5930);?></span>
	            <div class="clear"></div>
	            <a class="wgt-tr-but" href="<?php echo get_permalink(5930); ?>">find out more</a>
	            <div class="clear"></div>
	            <a href="javascript:void(0);" id="down"><img class="down" src="<?php echo get_template_directory_uri(); ?>/images/down.png" /></a>
	        </div>
		</div>
		
		<!-- Accommodation -->
		<?php $accommodation = get_post(208); // Get accommodation page title by page id ?>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $accommodation->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(208); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(208); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		
	
		<!-- Restaurants -->
		<?php $restaurants = get_post(204); // Get accommodation page title by page id ?>
		<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $restaurants->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(204); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(204); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	            <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	            <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Finisterra Spa -->
		<?php $spa = get_post(202); // Get accommodation page title by page id ?>
		<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $spa->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(202); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(202); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	          
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	
		<!-- Facilities -->
		<?php $facilities = get_post(200); // Get accommodation page title by page id ?>
		<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $facilities->post_title; ?></h2>
				<p><?php echo get_excerpt_by_id(200); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(200); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	            
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
		
		<!-- Kids clubs -->
		<?php $kids = get_post(198); // Get kids clubs page title by page id ?>
		<div class="slide" id="slide7" data-slide="7" data-stellar-background-ratio="0.5">
			<div class="slide-text">
	        	<h2><?php echo $kids->post_title; ?></h2>
	            <p><?php echo get_excerpt_by_id(198); ?></p>
	            <!-- <h3><a href="<?php echo get_permalink(198); ?>" title="Read More">Read More</a></h3> -->
	            <div class="clear"></div>
	             <!-- <a class="wgt-tr-but normal_button_book" href="<?php echo esc_url( home_url( '/' ) ); ?>book-now/" target="_blank">Book Now</a> -->
	           
	           <a class="wgt-tr-but" href="<?php echo esc_url( home_url( '/' ) ); ?>uk/special-offers-families-hotel-resort-martinhal-sagres-portugal">Special Offers</a>
	        </div>
		</div>
	<?php
		}
	?>       
      
<?php get_footer(); ?>
