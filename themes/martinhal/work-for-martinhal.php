<?php
/*
Template Name: Work For Martinhal
*/

get_header(); ?>
		
	<?php
		global $post; // If outside the loop
		$page_object = get_queried_object();
		$page_id  = get_queried_object_id(); // Get current page id
		
		$args = array(
			'sort_order' => 'ASC',
			'sort_column' => 'post_title',
			'hierarchical' => 1,
			'exclude' => '',
			'include' => $page_id,
			'meta_key' => '',
			'meta_value' => '',
			'authors' => '',
			'child_of' => 0,
			'parent' => -1,
			'exclude_tree' => '',
			'number' => '',
			'offset' => 0,
			'post_type' => 'page',
			'post_status' => 'publish'
		); 
		$pages = get_pages($args);
		
		$parentID = $pages[0]->post_parent; // Get current page parent id
	?>
	
	<?php
		$custom_image = get_field('detail_page_image', $page_id);
		
		if(get_field('detail_page_image', $page_id)){
			?>
				<style type="text/css">
					#contact-slide {
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
					#contact-slide{
						background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-page-bg.jpg);
						min-height: 800px !important;
						max-height: 800px !important;
						background-size: auto 100% !important;
					}
				</style>
			<?php
		}
	?>
	
	<div class="slide" id="contact-slide" data-slide="1" data-stellar-background-ratio="0.5">
		
		<?php
			if($parentID == 689 || $parentID == 691 || $parentID == 693 || $parentID == 695 || $parentID == 697 || $parentID == 699 || $parentID == 701 || $parentID == 703 || $parentID == 705){
				$children = wp_list_pages("title_li=&child_of=".$page_id."&echo=0");
			}else{
				$children = wp_list_pages("title_li=&child_of=".$parentID."&echo=0");
			}
			if($children){
		?>
			<div class="sub-nav">
	        	<?php
					echo "<ul>";
						echo $children;
					echo "</ul>";
	        	?>
	    	</div>
	    <?php } ?>
	    
		<div class="contact-box form">
			
            <div class="clear"></div>

            <div class="detail-main ff-left">
            	
            	<noscript>
					Note: Please enabled javascript for proper email operation.
					<br /><br />
				</noscript>
				            	
            	<?php
            		while ( have_posts() ) : the_post(); ?>
						
				   		<?php
							$hide_title = get_field('hide_main_title', $page_id);
							 
						 	if($hide_title != "Yes"): 
						?>
		            		<h4><?php the_title(); ?></h4>
		            	<?php endif; ?>
		            
						<p><?php the_content(); ?></p>
				
				<?php endwhile; ?>
                
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('job-application') ) : ?> <?php endif; ?>
                
            </div>

        </div>
	</div>

<?php get_footer(); ?>