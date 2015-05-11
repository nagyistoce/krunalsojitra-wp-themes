<?php
/*
Template Name: Cares Page
*/
?>

<?php get_header(); 
global $wpdb;

?>
			<!--banner -->
			<div class="banner">
		    	<div class="bg-ring"></div>
		    	<!--container -->
		    	<div class="container">
		            <!--form-main -->
		            <div class="home-banner ff-left">
		            	<div class="home-box">
	    					  <?php echo do_shortcode('[e-pray-custompost]'); ?><!--- create plugin-->
	                     </div>
		               
		            </div>
		            <!--form-main -->
		        
		        </div>
		        <!--container -->
		    </div>    
		    <!--banner -->

			<div id="content" class="contant">

				<div id="inner-content" class="inner-content wrap">

					<div class="grid">
						<aside class="side-bar home-side ff-left carrer">
							<div class="counder">
                                <span>1</span>
                              <span class="coma">1</span>
                                <span>2</span>
                                <span>6</span>
                              <span class="coma">7</span>
                                <span>3</span>
                                <span>3</span>
                                <span>2</span>
                                
                                <a href="#">Our Current Social Reach</a>
                            </div>
                            
                          <h4>Find Friends Who Pray</h4>
                            <ul class="social">
                            	<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/images/s1.jpg" /></a></li>
                            	<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/images/s2.jpg" /></a></li>
                            	<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/library/images/s3.jpg" /></a></li>
                            </ul>
                            
                                	 <?php
                                	 	$user_id = get_current_user_id();
										$postid = get_the_ID(); 
										//$bookmark = $wpdb->get_results("SELECT post_id FROM ".$wpdb->prefix."bookmark_tag WHERE user_id = $user_id");
										$bookmark = $wpdb->get_results("SELECT * FROM  ".$wpdb->prefix."bookmark_tag WHERE user_id = $user_id GROUP BY  `post_tag`ORDER BY  `id` DESC");
										//echo "SELECT * FROM  ".$wpdb->prefix."bookmark_tag WHERE user_id = $user_id GROUP BY  `post_tag`ORDER BY  `id` DESC";
										
										//print_r($bookmark);
										$tagpid=array();
										foreach($bookmark as $postid ){
																											
											$tagpid[] = $postid->post_id;
										}
										//print_r($tagpid);
										//echo implode(",",$pid);
										
									if(!empty($tagpid)){ 
										$args = array('include'=> $tagpid);
										//print_r($args);
										$myposts = get_posts($args);
									 	$tag_count = 0;
										
									echo '<div class="recent-post"><h4 class="carrer">My Cares</h4><ul class="post-list care_page">';
									 	
										foreach ( $myposts as $post ) : setup_postdata( $post ); 
										
										?>
										
									 <li>
										<!----user avtar---->
									<?php $authore_id = get_the_author_meta('ID');?>
									<?php $provider = get_the_author_meta("wsl_current_provider", $authore_id); ?>
									
									<?php if($provider == ""){ ?>
										<?php $user_pix = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $authore_id");?>
										<?php if($user_pix->user_avtar == ""){?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/epray-icon.png" class="avtr_img" /></a>
										<?php }else{?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/library/avtar/<?php echo $user_pix->user_avtar;?>" class="avtr_img"/></a> 
										<?php }?>
									
									<?php } else {?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php echo get_avatar($authore_id, 60);?> </a> 
									<?php }?>
										<!----user avtar---->
	                                   
											<?php  
					                			
					                			$posttags = get_the_tags();
												
												if(is_array($posttags)){
												   foreach($posttags as $tag) {
												   $tag_name = $tag->name;
													   if($tag_count == 0){?>
													   	<span class="tag"><a class="tag_name first_tag" href="javascript:void(0);" title="<?php echo $tag->name; ?>" id="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a></span>
														
														<span class="tag_delete" id="<?php echo $tag->name; ?>"></span>
													   <?php }else{
														?>
														<span class="tag"><a class="tag_name" href="javascript:void(0);" title="<?php echo $tag->name; ?>" id="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a></span>
														
														<span class="tag_delete" id="<?php echo $tag->name; ?>"></span>
														 
														
														<?php }
													}
												   
												}
												$tag_count++;
											?>
                                 	</li>
                                    <?php endforeach; 
										wp_reset_postdata();
										}// check empty $pid
										else{?>
										<!-- <h2>No tag added</h2>	 -->
										<?php }?>
                                	
                                </ul>
                            </div>
                    
                            
                 	  </aside>
                        
						<div class="grid__item desk--three-quarters home-post">
						    <div id="main" class="main" role="main">

							    
                                <div class="contant-home">
                                	<h6>#<span id="title_tag"></span> Prayer Feed</h6>
                                	
                                    
                                    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
											<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="sect-txbx" placeholder="Search by #word @username"/>
											<input type="submit" id="searchsubmit" value="search" class="gray-but"/>
									</form>
                                    
                                </div>
                                
                             
                                <div id="tag_post">
                                	<?php if(empty($tagpid)){
                                			 echo "<h2>No prayers added.</h2>";
									}
									?>
                                </div><!-----------tag post list--------------->
                                
                                <div class="loging_prey_but">
									<div id="loader" style="display: none;">
		    		     				 <img src="<?php echo get_template_directory_uri(); ?>/library/images/loader.gif" alt="Loader">
		    	        			</div>
					    		</div>
                         	</div><!-- end #main -->

						</div>

					</div><!-- end .grid -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
<script type="text/javascript">
$(document).ready(function(){
	$('.tag_name').on('click', function(){
    tag_name = $(this).attr('id');
	$("#title_tag").html(tag_name);
	});
	$( ".first_tag" ).trigger( "click" );
});
</script>
<!---------tag post list----->
<script type="text/javascript">
	var post_id;
	$(document).on("click",".tag_name", function(event){
		jQuery('#loader').show(); 
		event.preventDefault();
		tag_name = $(this).attr('id');
		var user_id = <?php echo $user_id; ?>;
		//alert(tag_name);
		
			var data = {};
			data.tagname = tag_name;
			data.userid = user_id;
			data.action = "tagname_action";
			jQuery.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data, locationSuccessList);
		
	
	function locationSuccessList(result){ //onSuccessFunction
		jQuery('#loader').hide(); // HIDE AJAX LOADER
	//alert(result);
	//var count = $.trim(result);
	//alert(count);
	$("#tag_post").html(result);
	 //$(this).parent().find('.user-name').html(count)
	
	
	}
	});
	
	</script>
<!---------tag post list----->

<!---------DELETE bookmark tag----->
<script type="text/javascript">
	var post_id;
	$(document).on("click",".tag_delete", function(event){
		
		event.preventDefault();
		deletetag_name = $(this).attr('id');
		var user_id = <?php echo $user_id; ?>;
		//alert(deletetag_name);
		
			var data = {};
			data.deletetag = deletetag_name;
			data.userid = user_id;
			data.action = "deletetagname_action";
			jQuery.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data, locationdeletSuccessList);
		
	
		function locationdeletSuccessList(result){ //onSuccessFunction
			//jQuery('#loader').hide(); // HIDE AJAX LOADER
			var result = result;
				
			if(result == 1){
				location.reload();
			}
		
		}
});
	
	</script>
<!---------DELETE tag post list----->

<?php get_footer(); ?>