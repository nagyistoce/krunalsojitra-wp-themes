<?php
/*
Template Name: Webcam
*/

get_header(); ?>

<?php
	$page_object = get_queried_object();
	$page_id  = get_queried_object_id(); // Get current page id
	$webcam_title = get_post($page_id); // Get live webcam page title
	$custom_image = get_field('detail_page_image', $page_id);
	
	if(get_field('detail_page_image', $page_id)){
		?>
			<style type="text/css">
				#webcm-slide {
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
				#webcm-slide {
					background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-page-bg.jpg);
					min-height: 800px !important;
					max-height: 800px !important;
					background-size: auto 100% !important;
				}
			</style>
		<?php
	}
?>

<div class="slide" id="webcm-slide" data-slide="1" data-stellar-background-ratio="0.5">
		<div class="webcm-box" id="cust-scrl3">
			
        	    <h4><?php echo $webcam_title->post_title; ?></h4>
        	    <br />
        	    <?php
            		while ( have_posts() ) : the_post(); ?>
						<p><?php the_content(); ?></p>		
				<?php endwhile; ?>
				<br />
        	    
                <a href="http://www.portugal-webcams.com/sagres2/martinhal-mega.jpg" target="_blank" rel="nofollow">
					<img name="myImageName" src="http://www.portugal-webcams.com/sagres2/martinhal.jpg" alt="Webcam" />
				</a>
				
                <div class="wb-rgt ff-right">


<iframe src="http://www.martinhal.com/weather/weather-station-martinhal-sagres-portugal.html" name="irgendwas" border="0" frameborder="0" width="320px" height="517px" marginheight="0" marginwidth="0" scrolling="no" onload="setTimeout(function(){top.irgendwas.location.href = top.irgendwas.location.href;}, 60000);"></iframe>




                </div>
                
               <?php //echo do_shortcode('[ssba]'); ?>
        </div>
	</div>
	
	<script type="text/javascript">
		function reloadImage() {
		    var now = new Date();
		    
		    if (document.images) {
		       document.images.myImageName.src = 'http://www.portugal-webcams.com/sagres2/martinhal.jpg?' + now.getTime();
		    }
		    setTimeout('reloadImage()',60000);
		}
		
		setTimeout('reloadImage()',60000);	
	</script>
<style>.ssba_sharecount{display: none;}</style>
<?php get_footer(); ?>