<?php
/*
Template Name: Special Offers
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
			
<!-- <div class="slide book-now-page" id="webcm-slide" data-slide="1" data-stellar-background-ratio="0.5"> -->
       
    <div class="slide special_offers" id="pkg-slide" data-slide="1" data-stellar-background-ratio="0.5">
		<div class="packege-box" id="offers-slide">
        	<ul class="pkg-main">
				<?php
					if(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
						$flag = 'uk';	
					}else{
						$flag = strtolower($_SESSION['flag']);
					}
					
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
					query_posts('category_name='.$flag.'&showposts=-1&post_type=offers&menu_order=0&orderby='.$orderby.'&order='.$order.'&paged='.$paged);
					while(have_posts()):the_post();
						$nomenu_order_array[] = get_the_ID();
					endwhile;
					wp_reset_query();
					
					/*echo '<pre>';
					print_r($nomenu_order_array);
					echo '</pre>';*/
					
					$args = array(
								'category_name'=>$flag,
								'showposts'=>-1,
								'post_type'=>'offers',
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
					
					$counter = 1;
					$myposts = get_posts( array('showposts'=>-1,'post_type'=>'offers','post__in'=>$post_array,'orderby'=>'post__in','paged'=>$paged) );
					foreach ( $myposts as $post ) : setup_postdata( $post ); 
					
				?>
					<li title="<?php the_title(); ?>">
						<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
						<?php if(!empty($url)){
							?> <img src="<?php echo $url ?>" alt="<?php the_title(); ?>" /> <?php	
						}else{
							?> <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg" alt="No Image" /> <?php
						} ?>
	                	<div class="pkg-dtl">
							<p><?php the_title(); ?></p>
	                        <span class="offer-title">
	                        	<?php echo get_field('short_content', $post->ID); ?>
	                        </span>
	                    </div>
	                    <div class="shr-opt">
	                    	
	                    	   
			                     <?php
			           			 if($_SESSION['flag'] == 'pt'){
								?>
								<h3>Partilhe</h3>
								<?php
									}elseif($_SESSION['flag'] == 'uk'){
								?>
								<h3>Share it</h3>
								<?php
									}elseif($_SESSION['flag'] == 'de'){
								?>
								<h3>Teilen</h3>
								<?php
									}elseif($_SESSION['flag'] == 'es'){
								?>
								<h3>Compartir</h3>
								<?php
									}elseif($_SESSION['flag'] == 'fr'){					
								?>
								<h3>Share it</h3>
								<?php
									}elseif($_SESSION['flag'] == 'it'){					
								?>
								<h3>Condividi</h3>
								<?php
									}elseif($_SESSION['flag'] == 'nl'){
								?>
								<h3>Deel dit</h3>
								<?php
									}elseif($_SESSION['flag'] == 'ru'){
								?>
								<h3>Share it</h3>
								<?php
									}elseif($_SESSION['flag'] == 'cn'){
								?>
								<h3>Share it</h3>
								<?php
									}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
								?>
								<h3>Share it</h3>
								<?php
									}?>	                 	
	                    
	                    	
	                        <ol>
	                            
	                            <li>
	                            	<a href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Twitter">
	                            		<img src="<?php echo get_template_directory_uri(); ?>/images/ssl-2.png" alt="Twitter" />
	                            	</a>
	                            </li>
	                            <li>
	                            	<a href="http://www.facebook.com/sharer.php?s=100&p[title]=<?php the_title(); ?>&p[url]=<?php the_permalink(); ?>&p[summary]=<?php echo get_field('short_content', $post->ID); ?>&p[images][0]=<?php echo $url ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Facebook">
	                            		<img src="<?php echo get_template_directory_uri(); ?>/images/ssl-3.png" />
	                            	</a>
	                            </li>
	                            
	                            <li>
	                            	<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;" title="Google+">
	                            		<img src="<?php echo get_template_directory_uri(); ?>/images/ssl-4.png" alt="Google+" />
	                            	</a>
	                            </li>
	                            <li>
	                            	<a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $url ?>&description=<?php the_title(); ?> <?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;" title="Pinterest">
	                            		<img src="<?php echo get_template_directory_uri(); ?>/images/ssl-6.png" alt="Pinterest" />
	                            	</a>
	                            </li>
	                        </ol>
	                        
	                        	<div class="clear"></div>
	                        
	                     <?php
	           			 if($_SESSION['flag'] == 'pt'){
						?>
						<a href="<?php the_permalink(); ?>">Ver detalhes</a> 
						<?php
							}elseif($_SESSION['flag'] == 'uk'){
						?>
						<a href="<?php the_permalink(); ?>">View Details</a> 
						<?php
							}elseif($_SESSION['flag'] == 'de'){
						?>
						<a href="<?php the_permalink(); ?>">Mehr</a> 
						<?php
							}elseif($_SESSION['flag'] == 'es'){
						?>
						<a href="<?php the_permalink(); ?>">Ver detalles</a>  
						<?php
							}elseif($_SESSION['flag'] == 'fr'){					
						?>
						<a href="<?php the_permalink(); ?>">Plus de détails</a>   
						<?php
							}elseif($_SESSION['flag'] == 'it'){					
						?>
						<a href="<?php the_permalink(); ?>">Visualizza dettagli </a> 
						<?php
							}elseif($_SESSION['flag'] == 'nl'){
						?>
						<a href="<?php the_permalink(); ?>">Zie details</a> 
						<?php
							}elseif($_SESSION['flag'] == 'ru'){
						?>
						<a href="<?php the_permalink(); ?>">View Detail</a>   
						<?php
							}elseif($_SESSION['flag'] == 'cn'){
						?>
						<a href="<?php the_permalink(); ?>">View Detail</a> 
						<?php
							}elseif(!$_POST and !isset($page) and !isset($_SESSION['flag']) or $_SESSION['flag'] == ''){
						?>
						<a href="<?php the_permalink(); ?>">View Detail</a>  
						<?php
							}?>	                 	
	                         
	                    </div>
	                </li>
	                
	                <?php
	                	if(($counter % 4) == 0) {
						   echo "<div class='clear'></div>";
						}
	                ?>
					
				<?php $counter++; endforeach; 
					wp_reset_postdata(); ?>
			 </ul>
			 
			 <!-- <nav> -->
				<!-- <br /> -->
				<!-- <?php previous_posts_link('&laquo; Newer') ?>
				<?php next_posts_link('Older &raquo;') ?> -->
				<!-- <?php
					if(have_posts()){
						if(function_exists('wp_simple_pagination')) {
					    	wp_simple_pagination();
						}		
					} 
				?> -->
			<!-- </nav> -->
					
			<?php
			  	//$wp_query = null;
				//$wp_query = $temp;  // Reset
			?>
        </div>
	</div>
	
<!-- </div> -->

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
	(function($){
		$(window).load(function(){
			$("#offers-slide").mCustomScrollbar({
				scrollButtons:{
					enable:true
				}
			});
			$("#offers-slide").hover(function(){
				$(document).data({"keyboard-input":"enabled"});
				$(this).addClass("keyboard-input");
			},function(){
				$(document).data({"keyboard-input":"disabled"});
				$(this).removeClass("keyboard-input");
			});
			$(document).keydown(function(e){
				if($(this).data("keyboard-input")==="enabled"){
					var activeElem=$(".keyboard-input"),
						activeElemPos=Math.abs($(".keyboard-input .mCSB_container").position().top),
						pixelsToScroll=60;
					if(e.which===38){ //scroll up
						e.preventDefault();
						if(pixelsToScroll>activeElemPos){
							activeElem.mCustomScrollbar("scrollTo","top");
						}else{
							activeElem.mCustomScrollbar("scrollTo",(activeElemPos-pixelsToScroll),{scrollInertia:400,scrollEasing:"easeOutCirc"});
						}
					}else if(e.which===40){ //scroll down
						e.preventDefault();
						activeElem.mCustomScrollbar("scrollTo",(activeElemPos+pixelsToScroll),{scrollInertia:400,scrollEasing:"easeOutCirc"});
					}
				}
			});
		});
	})(jQuery);
</script>
<?php get_footer(); ?>