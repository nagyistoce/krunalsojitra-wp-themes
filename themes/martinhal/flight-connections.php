<?php
/*
Template Name: Flight Connections
*/

get_header(); ?>

	<?php
		$page_object = get_queried_object();
		$page_id  = get_queried_object_id(); // Get current page id
		$title = get_post($page_id); // Get live webcam page title
		$custom_image = get_field('detail_page_image', $page_id);
		
		if(get_field('detail_page_image', $page_id)){
			?>
				<style type="text/css">
					#pkg-slide {
						background-image: url(<?php echo $custom_image; ?>) !important;
						-webkit-background-size: cover !important;
			  			-moz-background-size: cover !important;
			  			-o-background-size: cover !important;
			  			background-size: cover !important;
					}
				</style>
			<?php
		}else{
			?>
				<style type="text/css">
					#pkg-slide {
						background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-page-bg.jpg);
						min-height: 800px !important;
						max-height: 800px !important;
						background-size: auto 100% !important;
					}
				</style>
			<?php
		}
	?>

	<style type="text/css">
		#cust-scrl2 {
		    /*margin-left: 13% !important;*/
		    width: 75% !important;
		}
		
		.sc_ext .colorfulborder {
			background-color: red !important;
		}
	</style>

	 <div class="slide special_offers flight-connections" id="pkg-slide" data-slide="1" data-stellar-background-ratio="0.5">
		<div class="packege-box" id="cust-scrl2">
			
			<?php
        		while ( have_posts() ) : the_post(); ?>
			   		<?php
						$hide_title = get_field('hide_main_title', $page_id);

					 	if($hide_title != "Yes"): 
					?>
	            		<h1><?php the_title(); ?></h1>
	            	<?php endif; ?>
	            
					<p><?php the_content(); ?></p>			
			<?php endwhile; ?>
			<br />
    		<script type="text/javascript" src="http://widgets.skycheck.com/XT29EK/sc_ext.js"></script>
    			
			<script type='text/javascript'> 

				/*$('iframe').load(function() {
					$( ".grid-2-12" ).hide(); 
					$('.body').css('background-color', 'red');
					$("iframe").contents().find(".body").css('background-color', 'red'); 
				});*/
				
				$(document).ready(function(){
					//$('iframe').contents().find('body').css('backgroundColor', 'green');
					//$(".body").contents().find("#sc_ext_XT29EK").addClass("colorfulborder");
				});
				
				//$('iframe').load(function() {
				  //$("iframe").contents().find("#sc_ext_XT29EK").css('border' , '#000 1px solid');	
				//});
			</script>
			
    		<div style="text-align:right; margin:0; display:block; clear:both; border:none;"><a target="_blank" href="http://www.skycheck.com" title="SKYCHECK" style="border:none; display:inline; text-decoration:none;">
    			<img alt="SKYCHECK" src="http://widgets.skycheck.com/images/partner/skycheck-flugsuche.png" style="border:none; display:inline;" /></a>
    		</div>
    		    	
        </div>
	</div>
		
	<!-- <script type="text/javascript">
		$( "grid-2-12" ).click(function() {
		  alert( "Handler for .click() called." );
		});
	</script> -->

<?php get_footer(); ?>