<?php
/*
Template Name: Page With Menu
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

<div class="slide" id="content-slide" data-slide="1" data-stellar-background-ratio="0.5">    	
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
    
	<div class="content-box" id="cust-scrl">        
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
    </div>
</div>

<?php get_footer(); ?>