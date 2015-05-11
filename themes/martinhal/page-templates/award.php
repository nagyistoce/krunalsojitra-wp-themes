<?php
/**
 * Template Name: Award Template
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
					#pres-slide {
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
					#pres-slide {
						background-image: url(<?php echo get_template_directory_uri(); ?>/images/content-page-bg.jpg);
						min-height: 800px !important;
						max-height: 800px !important;
						background-size: auto 100% !important;
					}
				</style>
			<?php
		}
	?>
	<div class="press_cov" id="pres-slide" data-slide="1" data-stellar-background-ratio="0.5">
		<div class="pres-box" id="cust-scrl3">
			<ul class="pres-main" >
				<?php
					$flag = strtolower($_SESSION['flag']);
					//$flag = "uk";
						
					$order = 'asc';
					$orderby = 'name';
					
					if(get_field('page_filters', $page_id))
					{
						$filter = get_field('page_filters', $page_id);
						
						if($filter == 'name-asc')
						{
							$order = 'asc';
							$orderby = 'name';
						}
						if($filter == 'name-desc')
						{
							$order = 'desc';
							$orderby = 'name';
						}
						if($filter == 'date-asc')
						{
							$order = 'asc';
							$orderby = 'date';
						}
						if($filter == 'date-desc')
						{
							$order = 'desc';
							$orderby = 'date';
						}
					}
					
					$nomenu_order_array = array();
					query_posts('category_name='.$flag.'&showposts=80&post_type=award&menu_order=0&orderby='.$orderby.'&order='.$order.'&paged='.$paged);
					while(have_posts()):the_post();
						$nomenu_order_array[] = get_the_ID();
					endwhile;
					wp_reset_query();
					
					/*echo '<pre>';
					print_r($nomenu_order_array);
					echo '</pre>';*/
					
					$args = array(
								'category_name'=>$flag,
								'showposts'=>80,
								'post_type'=>'award',
								'orderby'=>'menu_order',
								'order'=>'asc',
								'post__not_in'=>$nomenu_order_array,
								'paged'=>$paged
					);
					
					$menu_order_array = array();
					query_posts($args);
					while(have_posts()):the_post();
						$menu_order_array[] = get_the_ID();
					endwhile;
					wp_reset_query();
					
					$post_array = array_merge($menu_order_array,$nomenu_order_array);
					
					/*echo '<pre>';
					print_r($menu_order_array);
					echo '</pre>';
					
					echo '<pre>';
					print_r($post_array);
					echo '</pre>';*/
					
					$myposts = get_posts( array('showposts'=>80,'post_type'=>'award','post__in'=>$post_array,'orderby'=>'post__in','paged'=>$paged) );
					foreach ( $myposts as $post ) : setup_postdata( $post );
				?>
					<li>
						
							<?php if (get_field('thumbnail_image')): ?>
								<img src="<?php echo get_field('thumbnail_image'); ?>" alt="<?php the_title(); ?>" />
							<?php else: ?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg" alt="No Image" />
							<?php endif; ?>
						<p style="color: #7a0200; font-size: 15px;"><?php the_title(); ?></p>
					</li>
					<?php endforeach; 
					wp_reset_postdata();?>
			</ul>
	  </div>
	</div>
 	
 	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function($){
			$(window).load(function(){ 
				$("#cust-scrl3").mCustomScrollbar({
					scrollButtons:{  
						enable:true
					}
				});
			});
		});				
	</script>    
<?php get_footer(); ?>
