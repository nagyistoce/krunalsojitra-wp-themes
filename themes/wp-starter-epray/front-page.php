<?php get_header(); ?>
			<!--banner -->
			<div class="banner front-page">
		    	<div class="bg-ring"></div>
		    	<!--container -->
		    	<div class="container">
		        	<!--banner-text -->
		        	<div class="banner-text">
		            	<div class="img-wrap"><img src="<?php echo get_template_directory_uri(); ?>/library/images/diagram.png"></div>
		                <h1>Everyone pray.</h1>
						<span>Connect & Share With People Who Care</span>
		            </div>
		            <!--banner-text -->
		            <!--form-main -->
		            <div class="form-main ff-left">
		            	<!--login-form -->
		            	<div class="login-form">
		            		<?php echo do_shortcode('[e-pray-login]'); ?>
		            		<?php /*$args = array(
							        'echo'           => true,
									 
							        'form_id'        => 'loginform',
							        'label_username' => __( '' ),
							        'label_password' => __( '' ),
							        'label_remember' => __( 'Remember Me' ),
							        'label_log_in'   => __( 'Sign In' ),
							        'id_username'    => 'user_login',
							        'id_password'    => 'user_pass',
							        'id_remember'    => 'rememberme',
							        'id_submit'      => 'wp-submit',
							        'remember'       => true,
							        'value_username' => NULL,
							        'value_remember' => false

							); */?>
                            
		            		<?php //wp_login_form( $args ); ?> 
		                	<!--  
                            <form>
		                    	<ul>
		                        	<li>
		                            	<input type="text" value="" class="text-bx" placeholder="Username">
		                            </li>
		                        	<li>
		                            	<input type="password" value="" class="text-bx qt-hlf" placeholder="Password">
		                                <input type="button" value="Sign in" class="sgn-in" />
		                            </li>
		                        	<li>
		                            	<label><input type="checkbox" class="check-bx" />Remember me</label>
		                                <a href="#">Forgot password?</a>
		                            </li>
		                        </ul>
		                    </form>
		                    -->
		                </div>
		                <!--login-form -->
		                <div class="clear"></div>
		                <!--signup-form -->
		              
		                <?php echo do_shortcode('[e-pray-register]'); ?>
		            	
						

		                <!--signup-form -->
		            </div>
		            <!--form-main -->
		        
		        </div>
		        <!--container -->
		    </div>    
		    <!--banner -->

			<div id="content" class="contant"  style="margin-top:120px!important;">

				<div id="inner-content" class="inner-content wrap">

					<div class="grid">

						<div class="grid__item desk--one-whole">
						    <div id="main" class="main" role="main">
								<div class="ajax-container" id="container">
							     <?php
									$args = array(
									'post_type'=> 'post',
						            /*'category'  => '12',*/
						              'orderby' => 'post_date',
									  'posts_per_page'=>'9'
									/*'paged' => get_query_var('paged')*/
						           );
						           
									global $more; 
									query_posts( $args ); 
									while (have_posts()) : the_post(); 
								
								?>
                                
                                <section>
                                    <div class="image-main ff-left">
                                    	
                                       <?php if ( has_post_thumbnail() ) {
													the_post_thumbnail('custom-size');
												}else {	?>
													  <img src="<?php echo get_template_directory_uri(); ?>/library/images/pray-img-1.jpg">
										 <?php }  ?> 
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
                                    <div class="user-detail ff-left" id="<?php the_author_ID(); ?>">
                                         	<!----user avtar---->
									<?php $authore_id = get_the_author_meta('ID');?>
									<?php $provider = get_the_author_meta("wsl_current_provider", $authore_id); ?>
									
									<?php if($provider == ""){ ?>
										<?php $user_pix = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $authore_id");?>
										<?php if($user_pix->user_avtar == ""){?>
												<a href="#Loginform" title="<?php the_author_nickname(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/epray-icon.png" class="avtr_img" /></a>
										<?php }else{?>
												<a href="#Loginform" title="<?php the_author_nickname(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/library/avtar/<?php echo $user_pix->user_avtar;?>" class="avtr_img"/></a> 
										<?php }?>
									<?php } else {
										echo get_avatar($authore_id, 60); 
									}?>
										<!----user avtar---->
                                        <div class="user-name">
                                           <h3><a href="#Loginform" title="<?php the_author_nickname(); ?>"><?php the_author_nickname(); ?></a></h3>
                                            <div class="clear"></div>
                                            <span><?php echo get_the_time(); ?> / <?php the_time('F d,Y') ?></span>
                                        </div>
                                        <div class="clear"></div>
                                        
                                      <?php echo "<p>".get_excerpt_with_hashtag(130)."</p>"; ?>
                                        
                                         <ul>
                                        	<?php if(!is_user_logged_in()){?> 
													<a href="#Loginform">
													  <li class="like">
			                                                <span>
			                                                	<?php
			                                                	$postid = get_the_ID(); 
			                                                	 $likecount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."post_like WHERE post_id = $postid");
																echo $likecount;?>
															</span>
			                                            </li>
			                                          </a>
                                             <?php }else{?> 
													<a href="javascript:void(0);" id="<?php echo get_the_ID(); ?>" class="like_plus">
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
										    <a href="#Loginform">
                                        	 <li class="list">
	                                                <span><?php
			                                                	$postid = get_the_ID(); 
			                                                	 $prayerlistcount = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."user_paryer_list WHERE post_id = $postid");
																echo trim($prayerlistcount);?>
													</span>
	                                             </li>
	                                         </a>
	                                         
	                                         
                                            <a href="#Loginform">
	                                            <li class="ref">
	                                                <span><?php echo $my_var = get_comments_number( $post_id ); ?></span>
	                                            </li>
                                            </a>
                                            
                                        </ul>
                                        <?php  
				                			$posttags = get_the_tags();
											//print_r($posttags);
											if(is_array($posttags)){
											   foreach($posttags as $tag) {
													?>
													<a class="prg_notlog" href="#Loginform" title="<?php echo $tag->name; ?>">#<?php echo $tag->name; ?></a><?php 
												}
											}
										?>
                                    </div>
                                </section>
                                
                                     <?php endwhile;?>
                              </div><!-- end .ajax-container -->
								<div class="loging_prey_but">
									<div id="load_more_ajax">
					                   <a id="1" href="javascript:void(0);">LOAD MORE</a>
					                </div>
									<div id="loader" style="display: none;">
		    		     				 <img src="<?php echo get_template_directory_uri(); ?>/library/images/loader.gif" alt="Loader">
		    	        			</div>
					    		</div>
							   
		    				</div><!-- end #main -->

						</div>

					</div><!-- end .grid -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
<!-------ajax code for post---------->
<script type='text/javascript'>
jQuery(document).ready(function() {
	
	jQuery("#load_more_ajax a").click(function() {
		
		jQuery('#loader').show(); // DISPLAY LOADER
		var page_id = this.id; // GET PAGE ID FROM LOAD MORE BUTTON
		var data = {};
		data.page_id = page_id;
		//data.categoryname = 1;
		data.action = "blog_action";
		jQuery.post('<?php echo esc_url( home_url( '/' ) ); ?>wp-admin/admin-ajax.php',data, blogSuccess);
		
	});
	
	function blogSuccess(result) { // AJAX ONSCCESS FUNCTION
		
		jQuery('#loader').hide(); // HIDE AJAX LOADER
		
		var current_page_id = jQuery('#load_more_ajax a').attr('id'); // GET LAST LOAD MORE BUTTON ID
		var new_id = ++current_page_id; // GET NEW ID FOR LOAD MORE BUTTON
		jQuery('#load_more_ajax a').attr('id',new_id); // CHANGE LOAD MORE BUTTON ID
		
		if(result==0){
			jQuery('#load_more_ajax a').remove(); // HIDE WHEN NO RESULT FOUND
		}else{
			jQuery(".ajax-container").append(result);
			
			
		}
	}
});
</script><!-------ajax code for post---------->
 <script>
 	var delayClick = (function () {
            var timer = 0;
            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
    })();
    $(window).scroll(function () {
        if ($(document).height() <= $(window).scrollTop() + $(window).height()) {
        	delayClick(function () {
            	$( "#load_more_ajax a" ).trigger( "click" );
            }, 500);
        }
    });
</script>

<!----Terms & Conditions----->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery.fancybox.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/library/css/jquery.fancybox.css" media="screen" />
	<script type="text/javascript">
		$(window).load(function() {
			$('.fancybox').fancybox();
		});
	</script>
  <div id="terms-content" style="display: none;max-width: 700px;">
    	<h2 class="our">Terms  &  Conditions</h2>
              <?php echo get_post_field('post_content', 827);?>
     </div>
<!----Terms & Conditions----->
<?php get_footer(); ?>