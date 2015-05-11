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
                            	<li><a href="https://www.facebook.com/everyonepray" title="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/library/images/s1.jpg" /></a></li>
                            	<li><a href="https://twitter.com/@everyonepray" title="Twitter"><img src="<?php echo get_template_directory_uri(); ?>/library/images/s2.jpg" /></a></li>
                            	<li><a href="https://plus.google.com/115886611860590601841/posts"  title="Googleplus"><img src="<?php echo get_template_directory_uri(); ?>/library/images/s3.jpg" /></a></li>
                            </ul>
                            <div class="recent-post">
                              <h4>Recent Prayer Posts</h4>
                                
                                <ul class="post-list">
                                	<?php
									$args = array(
									'post_type'=> 'post',
						            /*'category'  => '12',*/
						              'orderby' => 'post_date',
    									'order' => 'DESC',	
									  /*'posts_per_page'=>'1'
									'paged' => get_query_var('paged')*/
						           );
						           
									global $more; 
									query_posts( $args ); 
									while (have_posts()) : the_post(); 
								
								?>
                                	<li>
                                      	<!----user avtar---->
										<?php $authore_id = get_the_author_meta('ID');?>
											<?php $provider = get_the_author_meta("wsl_current_provider", $authore_id); ?>
											
											<?php if($provider == ""){ ?>
												<?php $user_pix = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $authore_id");?>
												<?php if($user_pix->user_avtar == ""){?>
													<a href="<?php echo get_author_posts_url($userId); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/epray-icon.png" class="avtr_img_side" /></a>
												<?php }else{?>
														<a href="<?php echo get_author_posts_url($userId); ?>" title="<?php the_author_nickname(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/library/avtar/<?php echo $user_pix->user_avtar;?>" class="avtr_img_side"/></a> 
												<?php }?>
											<?php } else {?>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php echo get_avatar($authore_id, 40);?> </a> 
									<?php }?>
											
										<!----user avtar---->
                                   	
                                        <h5><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_nickname(); ?>"><?php the_author_nickname(); ?></a> <span>@<?php the_author_nickname(); ?> - <?php echo time_elapsed_string(get_the_time()); ?></span></h5>
                                        <?php  
                			$posttags = get_the_tags();
							//print_r($posttags);
							if(is_array($posttags)){
							   foreach($posttags as $tag) {
									?>
									<span class="tag"><a class="prg_sidebar" href="<?php echo get_tag_link($tag->term_id); ?>" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a></span><?php 
								}
							}
						?>
                                     
                                        <a href="<?php the_permalink(); ?>">Expand</a>
                                    </li>
                                    <?php endwhile; wp_reset_query();?>
                                	
                                </ul>
                            </div>
<div class="clearfix"></div>
<div id="sidebarlower">
<?php
if ( has_nav_menu( 'footer-links' ) ) { /* if menu location 'primary-menu' exists then use custom menu */
      wp_nav_menu( array( 'theme_location' => 'footer-links') ); 
}
?>
<div class="clearfix"></div>
</div>