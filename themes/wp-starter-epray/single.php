<?php get_header(); 
$user_id = get_current_user_id();
 $current_user = wp_get_current_user();
 $user_eamil = $current_user->user_email;
 global $pccf_defaults;
$tmp = get_option( 'pccf_options');
$db_search_string = $tmp['txtar_keywords'];
//print_r($db_search_string);
$rows = explode(",", $db_search_string);
//print_r($rows);
for($n=0;$n<count($rows);$n++)
{
	$abbusive_keyword_arr[] = "'".$rows[$n]."'";
}
$abbusive_keywords = @implode(", ", $abbusive_keyword_arr);
 ?>
	<script type="text/javascript">
	function isUrl(s) {
		var regexp = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org|.uk]+(\[\?%&=]*)?/
		return regexp.test(s);
		}
		$(document).ready(function() {
			$( "input[name$='RBL_Mail']" ).val( "<?php echo $user_eamil; ?>" );
			// validate signup form on keyup and submit
			$("#commentform").validate({
				rules: {
					author: {
						required: true,
						minlength: 2,
						maxlength: 10,
					},
					email: {
						required: true,
						email: true,
						maxlength: 35,
					},
					comment: {
						required: true,
						//minlength: 6,
						maxlength: 25,
					},
					
				},
				messages: {
					author: {
						required: "Required",
						maxlength:"Max required"
					},
					email: {
						email: "Not a valid email",
						maxlength:"Max required"
					},
					comment: {
						required: "Required",
						//minlength: "Minimum 6 Characters",
						maxlength:"Max 25 Character allowed"
					},
					
				}
			});
			
			$("#editpost").validate({
				rules: {
					post_cont: {
						required: true,
						//minlength: 6,
						maxlength: 225,
					}
					
				},
				messages: {
					post_cont: {
						required: "Required",
						//minlength: "Minimum 20 Characters",
						maxlength:"Max 225 Character allowed"
					},
						
					}
			});
			$("#editcomment").validate({
				rules: {
					edit_coment: {
						required: true,
						//minlength: 6,
						maxlength: 25,
					}
					
				},
				messages: {
					edit_coment: {
						required: "Required",
						//minlength: "Minimum 6 Characters",
						maxlength:"Max 25 Character allowed"
					},
						
					}
			});
		});
$(document).on("click","#submit", function(){
				var keyword_array = [];
				var description = $("#comment").val();
				keyword_array = description.split(" ");
				var abusive_keyword_array = [];
				abusive_keyword_array = [<?php echo $abbusive_keywords;?>]
				var count = 0
				for (var i = 0; i < keyword_array.length; i++) {
					//alert(keyword_array[i]);
				    for (var j = 0; j < abusive_keyword_array.length; j++) {
				    	//alert(keyword_array[i]+"--"+abusive_keyword_array[j]);
				        if (keyword_array[i].trim() == abusive_keyword_array[j].trim()) {
				        	//is_abusive = 1;
				        		//alert("Please do not use abusive words");
				        		count = j;
				        		
				        }
				    }
				}		
						
					 if(isUrl($('#comment').val()))
						{
							toastr.options.showMethod = 'slideDown'; 
							toastr.options.closeButton = true;
							toastr.options.positionClass = 'toast-bottom-left';
							toastr.options.timeOut= '10000';
						    toastr.error('Url not allow.');
						
						return false;
						}
					else if(count > 0){
						
							toastr.options.showMethod = 'slideDown'; 
							toastr.options.closeButton = true;
							toastr.options.positionClass = 'toast-bottom-left';
							toastr.options.timeOut= '10000';
						    toastr.error('No foul language please');
						return false;
					}else{
						//alert("submit");
						 return true;
						}
			  });
			  
$(document).on("click","#update", function(){
				// var keyword_array = [];
				// var description = $("#post_cont").val();
				// keyword_array = description.split(" ");
// 
				// var abusive_keyword_array = [];
				// abusive_keyword_array = [<?php echo $abbusive_keywords;?>]
// 
// 				
				// var count = 0
// 				
				// for (var i = 0; i < keyword_array.length; i++) {
					// //alert(keyword_array[i]);
				    // for (var j = 0; j < abusive_keyword_array.length; j++) {
				    	// //alert(keyword_array[i]+"--"+abusive_keyword_array[j]);
				        // if (keyword_array[i].trim() == abusive_keyword_array[j].trim()) {
				        	// //is_abusive = 1;
				        		// //alert("Please do not use abusive words");
				        		// count = j;
// 				        		
				        // }
				    // }
				// }		
						
					 // if(isUrl($('#post_cont').val()))
						// {
							// toastr.options.showMethod = 'slideDown'; 
							// toastr.options.closeButton = true;
							// toastr.options.positionClass = 'toast-bottom-left';
							// toastr.options.timeOut= '10000';
						    // toastr.error('Url not allow.');
// 						
						// return false;
						// }
					// else if(count > 0){
// 						
							// toastr.options.showMethod = 'slideDown'; 
							// toastr.options.closeButton = true;
							// toastr.options.positionClass = 'toast-bottom-left';
							// toastr.options.timeOut= '10000';
						    // toastr.error('Please do not use abusive words');
						// return false;
					// }else{
						// //alert("submit");
						 // return true;
						// }
			  });
</script>
<style type="text/css">
.dark_overlay {
	display: none;
	position: relative;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	
	z-index: 1001;
	
}
.bright_content {
	display: none;
	position: relative;
	top: 25%;
	width: 58%;
	background-color: rgba(255, 255, 255, 0.22);
	z-index: 1002;
	overflow: auto;
	padding:2%;
	margin:0px auto;
}
.pop_mes h3 {
	color: #000000;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 24px;
	font-weight: bold;
	line-height: 34px;
}
.pop_mes p {
	color: #000000;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 20px;
	line-height: 30px;
	margin-bottom: 15px;
	margin-top: 30px;
}
#submit{  background: none repeat scroll 0 0 #53a7e8;
    border: 1px solid #4092d0;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
   
    font-size: 15px;
    font-weight: bold;
    padding: 5px 12px;}
 .close{ color:  #53a7e8;}
.close:hover{ color:  #fff;}
</style>
		
<!-----pop script---->
	<script type="text/javascript">
	$(document).ready(function(){
		mamu = ($(window).height());
		$('.cool').css({'height': mamu + 'px'});
		$('.cool').css({'position': 'fixed'}); 
		var hei = $('.main').height();
		var mam = (mamu - hei) / 3;
		$('.main').css({'top': mam + "px"});
	});
	function popUp(){
		document.getElementById('light').style.display='block';
		document.getElementById('fade').style.display='block'
	}
	function popUpClose(){
		document.getElementById('light').style.display='none';
		document.getElementById('fade').style.display='none'
	}
	</script>
	
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
                                                             
                            <!-- <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="sect-txbx" placeholder="Search by #word @username"/>
									<input type="submit" id="searchsubmit" value="search" class="gray-but"/>
								
							</form> -->
                            </div>
						    <div id="main" class="main" role="main">
									<?php while (have_posts()) : the_post(); ?>
									<section>
										<div class="image-main ff-left">
                                    	
                                         <?php 
  																			                                     
                                         if ( has_post_thumbnail() ) {
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
													<a href="javascript:void(0);" class="like_plus"  title="I’m Praying">
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
                                             <a href="#prayerform">
	                                            <li class="ref">
	                                                <span><?php echo $my_var = get_comments_number( $post_id ); ?></span>
	                                            </li>
                                            </a>
                                            
                                        </ul>
                                        </div>
									</section>
									<div class="singe_post">
										<h6><?php the_author_nickname(); ?></h6>
                                    	 <span><?php echo get_the_time(); ?> / <?php the_time('F d,Y') ?></span>
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
                                      
                                       
                                      <div class="sing_con"><?php echo "<p>".get_excerpt_with_hashtag(400)."</p>"; ?></div>

                                       
										<?php //echo strip_tags(get_the_content());	?>
                                        <?php //print $content = get_the_content();?>
                                       
                                    	<?php comments_template(); ?>
                                    	<!-- <a href="<?php echo get_site_url(); ?>/report-problem" class="report-problem report-prob">Report Problem</a> -->
                                    	<?php RBL_UI(); ?>
                                 <?php 
                                 $authore_id = get_the_author_meta('ID');
                                 if($authore_id == $user_id){ ?> 
                                  <a href="javascript:void(0)" id="edite-post" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Edit</a>
									<?php } ?>
									
									</div>
								<?php
								 
								endwhile; ?>

									

								
		    				</div><!-- end #main -->
						
								

						</div>

					</div><!-- end .grid -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
			
		<div id="fade" class="dark_overlay cool">
			<div id="light" class="bright_content main">
			      <div class="pop_mes">
					   <form method="post" action="" id="editpost" name="editpost">
						   	<textarea name="post_cont" id="post_cont"><?php print $content = get_the_content();?></textarea>
							<input type="button" name="update" value="Update"  class="update_content" id="update"/>
					   </form>
				  </div>
				<a href="javascript:void(0)" onclick="popUpClose()" class="close"> Close</a> 
			</div> 
		</div> 
		
		 <?php $postid = get_the_ID(); ?> 
		 <?php /*
		 if(isset($_POST['update'])){
		 $postocnt = $_POST['post_cont'];
		// Update post 37
		  $my_post = array(
		      'ID'           => $postid,
		      'post_content' => $postocnt
		  );
		
		// Update the post into the database
		  wp_update_post( $my_post );
		  	
		  }*/
		?>
<!---------update prayer----->
<script type="text/javascript">
	var post_id;
	$(document).on("click",".update_content", function(event){
	  var keyword_array = [];
				var description = $("#post_cont").val();
				keyword_array = description.split(" ");

				var abusive_keyword_array = [];
				abusive_keyword_array = [<?php echo $abbusive_keywords;?>]

				
				var count = 0
				
				for (var i = 0; i < keyword_array.length; i++) {
					//alert(keyword_array[i]);
				    for (var j = 0; j < abusive_keyword_array.length; j++) {
				    	//alert(keyword_array[i]+"--"+abusive_keyword_array[j]);
				        if (keyword_array[i].trim() == abusive_keyword_array[j].trim() || keyword_array[i].trim() == '#'+abusive_keyword_array[j].trim()) {
				        	//is_abusive = 1;
				        		//alert("Please do not use abusive words");
				        		count = j;
				        		
				        }
				    }
				}		
		if ($('#editpost').valid()){
		event.preventDefault();
		//postconts = $('#post_cont').val();
		//alert(postconts);
		var post_id = <?php echo get_the_ID(); ?>;
		//alert("helo");
		
			var data = {};
			data.postcont = $('#post_cont').val();
			data.postid = post_id;
			data.action = "updatepost_action";
			jQuery.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data, locationupdatepostSuccessList);
		}
		function locationupdatepostSuccessList(result){ //onSuccessFunction
			//jQuery('#loader').hide(); // HIDE AJAX LOADER
			var result = result;
				//alert(result);
			if( result > 1 || result == 0){
				toastr.options.showMethod = 'slideDown'; 
				toastr.options.closeButton = true;
				toastr.options.positionClass = 'toast-bottom-left';
				toastr.options.timeOut= '10000';
				if(result > 1){ 
					toastr.error('More than one #tag not allowed');
				}else{ 
					toastr.error('At least one #tag required');
			    }
			}
			else if(isUrl($('#post_cont').val()))
				{
					toastr.options.showMethod = 'slideDown'; 
					toastr.options.closeButton = true;
					toastr.options.positionClass = 'toast-bottom-left';
					toastr.options.timeOut= '10000';
				    toastr.error('Url not allow.');
				//return false;
				}
			else if(count > 0){
				
					toastr.options.showMethod = 'slideDown'; 
					toastr.options.closeButton = true;
					toastr.options.positionClass = 'toast-bottom-left';
					toastr.options.timeOut= '10000';
				    toastr.error('No foul language please');
				//return false;
			}else{
				location.reload();
				}
		
		}
	
});
	
	</script>
<!---------update prayer----->
<?php get_footer(); ?>