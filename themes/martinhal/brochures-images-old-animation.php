<?php
/*
Template Name: Brochures Images
*/

get_header(); ?>

		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/component.css" />
		<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>
		
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
	
	<div class="slide brochures-images" id="pkg-slide" data-slide="1" data-stellar-background-ratio="0.5">
		<div class="packege-box packege-box-bimage" id="cust-scrl2">
			
			
			
			<?php
        		while ( have_posts() ) : the_post(); ?>
			   		<?php
						$hide_title = get_field('hide_main_title', $page_id);

					 	if($hide_title != "Yes"): 
					?>
	            		<h1><?php the_title(); ?></h1>
	            	<?php endif; ?>
	            
					<p><?php the_content(); ?></p>
					
					<?php $ck_image = get_field('brochures_images'); ?>
					<?php if(empty($ck_image[0]['images'])): ?>
						<span class="coming_soon">Coming Soon...</span>
					<?php endif; ?>	
							
			<?php endwhile; ?>
			<div class="clear"></div>
        	<ul class="grid effect-6" id="grid">
				<?php while ( have_posts() ) : the_post(); ?>
			        <?php if(get_field('brochures_images')): ?>
			            <?php $counter = 1; while(has_sub_field('brochures_images')): ?>
			            	<?php if(get_sub_field('images')): ?>
								<li>
				                	<a href="<?php echo the_sub_field('images'); ?>" rel="gallery" class="fancybox" title="<?php echo the_sub_field('title'); ?>">
				                		<img src="<?php echo the_sub_field('images'); ?>" />
				                	</a>
				                </li>
			                <?php endif; ?>
			                <?php
			                	if(($counter % 4) == 0) {
								   echo "<div class='clear'></div>";
								}
			                ?>
			            <?php $counter++; endwhile; ?>
			        <?php endif; ?>
			    <?php endwhile; ?>
            </ul>
            
        </div>
	</div>

        <script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/imagesloaded.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/AnimOnScroll.js"></script>
		<script>
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2
			} );
		</script>
<?php get_footer(); ?>