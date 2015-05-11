<?php
/*
Template Name: Explore Page
*/
?>

<?php get_header(); 	global $wpdb;
 $author_id = get_current_user_id();
  $user_id = get_current_user_id();
 $current_user = wp_get_current_user();
  $current_user_name = $current_user->user_login ;
  
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

						<div class="grid__item desk--one-whole">

                            <div class="contant-home">
                                <h6>Recent Prayer Posts, Tailored For You</h6>
                                
                            <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="sect-txbx" placeholder="Search by #word @username"/>
									<input type="submit" id="searchsubmit" value="search" class="gray-but"/>
								
							</form>
                            </div>
						    <div id="main" class="main" role="main">
  							
										<?php 
											 global $current_user;
											 $tag_name_ar = array();
										    get_currentuserinfo();
										    $args = array('posts_per_page' => '-1','author' => $current_user->ID);
											query_posts( $args );
										    while (have_posts()) : the_post();
										
													$posttags = get_the_tags();
											
												if(is_array($posttags)){
													
													
												   foreach($posttags as $tag) {
										$tag_name_ar[] = $tag->name;
													
														?>
														
															<?php 
															
													}
													}       
										    endwhile;
											$tag_name_coma_arry = implode(",", $tag_name_ar);
										//print_r($tag_name_ar);
										if(!empty($tag_name_ar)){ 
												$args=array('posts_per_page'=>50, 'author' => -$current_user->ID, 'tag' => $tag_name_coma_arry);
												query_posts( $args );
												//print_r($wp_query);
												    while (have_posts()) : the_post();
												?>
												 <section>
                                	  	
                                    <div class="image-main ff-left" id="<?php the_author_ID(); ?>">
                                    	<a href="<?php the_permalink();?>" title="">
                                         <?php if ( has_post_thumbnail() ) {
													the_post_thumbnail('custom-size');
												}else {	?>
													  <img src="<?php echo get_template_directory_uri(); ?>/library/images/pray-img-1.jpg">
										 <?php }  ?> 
										 </a>
                                        <div class="img-des">
                                            <ul>
                                            	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
                                            	<?php $postid = get_the_ID(); ?> 
                                            	   <!-- <li><span class="share"></span></li> -->
                                                <li>
                                                	<a class="fb" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Facebook"></a>
                                                </li>
                                                 <li>
                                                	<a class="twt" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>&url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return false;" title="Twitter"></a>
	                            				</li>
                                                <li>
                                                	<a class="gp"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;" title="Google+"></a>
                                                </li>
                                            </ul>
                                            <!-- <p>I’m telling my friends to pray</p> -->
                                        </div>
                                    </div>
                                    <div class="user-detail ff-left">
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
                                      
                                        <div class="user-name">
                                            <h3><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php the_author_nickname(); ?></a></h3>
                                            <div class="clear"></div>
                                            <span><?php echo get_the_time(); ?> / <?php the_time('F d,Y') ?></span>
                                        </div>
                                        <div class="clear"></div>
                                        
                                      <?php echo "<p>".get_excerpt_with_hashtag(130)."</p>"; ?>
                                        
                                        <ul id="<?php echo get_the_ID(); ?>">
                                        	<?php
												if(!is_user_logged_in()){?> 
													  <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
															</span>
			                                            </li>
                                             <?php }else{?> 
													<a href="javascript:void(0);" class="like_plus" title="I'm Praying">
			                                            <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
																
			                                                	</span>
			                                            </li>
		                                            </a>
                                            	  	
										    <?php } ?>
										    
										    <?php
												if(!is_user_logged_in()){?> 
                                               <li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                          
	                                            <?php }else{?> 
	                                            <a href="javascript:void(0);" class="prayer_list" title="Add to Prayer List">
                                             	<li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                            </a>
                                                <?php } ?>
                                            <a href="<?php the_permalink(); ?>#prayerform" title="Prayer Replies">
	                                            <li class="ref">
	                                                <span><?php echo $my_var = get_comments_number( $post_id ); ?></span>
	                                            </li>
                                            </a>
                                            
                                        </ul>
                                        
                		<?php  
                			$posttags = get_the_tags();
							$postid = get_the_ID(); 
							//print_r($posttags);
							if(is_array($posttags)){
							   foreach($posttags as $tag) {
							   		if(!is_user_logged_in()){ 
									?>
									<a class="prg_notlog" href="javascript:void(0);" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a>
									<?php }else{?> 
									<a class="prg" href="javascript:void(0);" id="<?php echo $postid;?>" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a>
									<?php } ?>
									<?php 
								}
							}
						?>				
                                    </div>
                                </section>
                              	<?php endwhile; ?>
											 
									<?php } //check empty $pid 
                                              else{?>
										<h2>No prayers added.</h2>	
										<?php }?>		 
							
							 

		    				</div><!-- end #main -->

						</div>

					</div><!-- end .grid -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>