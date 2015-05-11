<?php
/*
Template Name: Notifications Page
*/
?>

<?php get_header(); ?>
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
                            	<li><a href="https://www.facebook.com/everyonepray"><img src="<?php echo get_template_directory_uri(); ?>/library/images/s1.jpg" /></a></li>
                            	<li><a href="https://twitter.com/@everyonepray"><img src="<?php echo get_template_directory_uri(); ?>/library/images/s2.jpg" /></a></li>
                            	<li><a href="https://plus.google.com/115886611860590601841/posts"><img src="<?php echo get_template_directory_uri(); ?>/library/images/s3.jpg" /></a></li>
                            </ul>
                            
                            
                            
                            
			    			

    				  </aside>
                        
						<div class="grid__item desk--three-quarters home-post">
						    <div id="main" class="main" role="main">

                                
                                <div class="contant-home">
                                	<h6><img src="<?php echo get_template_directory_uri(); ?>/library/images/noti.png" />Notifications</h6>
                                    
                              <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="sect-txbx" placeholder="Search by #word @username"/>
									<input type="submit" id="searchsubmit" value="search" class="gray-but"/>
							 </form>
                                </div>
                                
                                <div class="notification-main">
                                	<ul>
                                		<?php global $wpdb;
                                				$authorid = get_the_author_meta(ID);
												$user_id = get_current_user_id();
												$post_id = get_the_ID(); 
                                		 $notification_reset = $wpdb->query("UPDATE ".$wpdb->prefix."notifications SET notification_status = '1' WHERE post_author_id = $user_id"); 
										 $notification = $wpdb->get_results("SELECT `id`, `post_id`, `post_author_id`, `user_id`, `post_like`, `post_add_prayer_list`, `post_comment`, `post_notification_time` FROM ".$wpdb->prefix."notifications WHERE post_author_id = $user_id ORDER BY post_notification_time DESC");
										//print_r($notification);
										
										global $post;
										$counter = 0;
										foreach($notification as $postid ){
											$postIds =  $postid->post_id;
											$tag_name = wp_get_post_tags($postid->post_id);															
										
											  $pray_content = get_post_field('post_content', $postid->post_id).'<br>';
											  $tagname = $tag_name[0]->name;
											  $tagid = $tag_name[0]->term_id;
											  $postlike = $notification[$counter]->post_like;
											  $addPrayerlist = $notification[$counter]->post_add_prayer_list;
											  $postComment = $notification[$counter]->post_comment;
											  $userId = $notification[$counter]->user_id;
											  $postauthorid = $notification[$counter]->post_author_id;
											  $user_info = get_userdata($userId);
											  $post_like = $notification[$counter]->post_like;
											  $post_add_prayer_list = $notification[$counter]->post_add_prayer_list;
											  $post_comment = $notification[$counter]->post_comment;
											  $post_notification_time	= $notification[$counter]->post_notification_time;
											  
										
										 $pray_content;
										 $tagname;
										 $postlike;
										 $addPrayerlist;
										 $postComment;
										 $postauthorid;
										 $postIds;

										?>
	
										<li>
                                        	<!-- <img src="<?php echo get_template_directory_uri(); ?>/library/images/user-icon.jpg" /> -->
                                        	
                                        	<div class="upload_img">
                                        		
                                        	<?php $authore_id = get_the_author_meta('ID');
                                        	  //$userId = get_current_user_id();?>
											<?php $provider = get_the_author_meta("wsl_current_provider", $userId); ?>
											
											<?php if($provider == ""){ ?>
												<?php $user_pix = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $userId");?>
												<?php if($user_pix->user_avtar == ""){?>
													<a href="<?php echo get_author_posts_url($userId); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/epray-icon.png" class="avtr_img_side" /></a>
												<?php }else{?>
														<a href="<?php echo get_author_posts_url($userId); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/library/avtar/<?php echo $user_pix->user_avtar;?>" class="avtr_img_side"/></a> 
												<?php }?>
											<?php } else {?>
												<a href="<?php echo get_author_posts_url($userId); ?>" title="<?php the_author_nickname(); ?>"><?php echo get_avatar($userId, 40);?> </a> 
											<?php }?>
											
											</div> 
                                            <article>
                                            	<p>
                                            		<a href="<?php echo get_author_posts_url($userId); ?>">
                                            			<?php echo $user_info->user_login; ?>
                                            	     </a>
                                            	     
                                            	    <a href="<?php echo get_author_posts_url($userId); ?>"> <span>@<?php echo $user_info->user_login; ?> - <?php echo time_elapsed_string($post_notification_time); ?></span></a>
                                            	     
                                            	     <?php if($post_like == like){ ?>
                                            	     <strong><a href="<?php echo get_permalink( $postIds ); // echo get_tag_link($tagid); ?>">Is praying for #<?php echo $tagname;?> post</a></strong>
                                            	     <?php }elseif($post_add_prayer_list == pray){?>
                                            	     <strong><a href="<?php  echo get_permalink( $postIds ); //echo get_tag_link($tagid); ?>">Added #<?php echo $tagname;?>  post to their prayer wall</a></strong>
                                            	     <?php }elseif($post_comment == comment){?>
                                            	     <strong><a href="<?php echo get_permalink( $postIds ); //echo get_tag_link($tagid); ?>">Added comment #<?php echo $tagname;?> post</a></strong>
                                            	     <?php } ?>
                                            	     
                                            	     <?php echo substr($pray_content,0,100);?></p>
												<!-- <a class="expnd" href="<?php echo get_permalink( $postIds ); ?>">Expand</a> -->
                                            </article>
                                        </li>	
										<?php
										$counter ++;	
										}
												if(empty($notification)){
													echo "<h5 style='text-align: center;margin-bottom:15px;font-size: 18px!important;font-weight:600!important;margin-top:-10px!important;color:#080808!important;'>No notifications.</h5>";
												}
										?>
                                    	
                                    </ul>
                                </div>
                       		</div><!-- end #main -->

						</div>

					</div><!-- end .grid -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>