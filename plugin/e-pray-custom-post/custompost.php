<?php ob_start();
/*
Plugin Name: e-Pray Custom post
Description: custome post Form for e-Pray
Version: 1.0
License: GPL
*/ 
function custompost() {
	global $wpdb;
 	$author_id = get_current_user_id();
  	$user_id = get_current_user_id();
 	$current_user = wp_get_current_user();
  	$current_user_name = $current_user->user_login;
?>
<script type="text/javascript">
	jQuery.removeCookie("posted", { path: '/' }); // => true
</script>
<?php	
	if(isset($_COOKIE['posted'])):	
?>
	<script type="text/javascript">
		toastr.options.onHidden = function() { 
			jQuery.cookie("posted", '', {expires : -1, path : '/'});
		};
	   	toastr.options.showMethod = 'slideDown'; 
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-left';
		toastr.options.timeOut= '5000';
		toastr.info('Posted!');
		
	</script>
<?php
	endif;
  
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {
	// Do some minor form validation to make sure there is content
	// if (isset ($_POST['title'])) {
		 // $title =  $_POST['title'];
	// } else {
		// echo 'Please enter the title';
	 // }
	 
	global $pccf_defaults;
	$tmp = get_option( 'pccf_options');
	$db_search_string = $tmp['txtar_keywords'];
	
	$abbusive_keywords = explode(', ', $db_search_string);
	//print_r($abbusive_keyword_arr);
 	$description = $_POST['description'];
	
	$keyword_array = explode(" ", $description);
	$count = 0;
					
						
	foreach ($keyword_array as $key) {
				 	 
		preg_match_all('/(#[A-z_]\w+)/', $key, $tag);
		
		$tagcount = count($tag[0]);
		$tag1 = str_replace('#', '', $tag[0][0]);
		
		if($tag1 != ""){
			
			//print_r($abbusive_keywords);						
			if(in_array($tag1, $abbusive_keywords))
			{ 
				$count++;
			}
		}else{
			if(in_array($key, $abbusive_keywords))
			{
				$count++;
			}
		}
			
	}
	
	if (isset ($_POST['description'])) {
		$description = $_POST['description'];
		
	} else {
		echo 'Please enter some notes';
	}
	
	
		$description = $_POST['description'];
		//$des_cont = strip_tags($description);
		//$tag = explode("#", $description);
		preg_match_all('/(#[A-z_]\w+)/', $description, $tag);
		
		$tagcount = count($tag[0]);
		$tag1 = str_replace('#', '', $tag[0][0]);
		
	$file = $_FILES['image_featured'];
	// ADD THE FORM INPUT TO $new_post ARRAY
	$new_post = array(
	'post_title'	=>	$description,
	'post_author'	=>	$author_id,
	'post_content'	=>	$description,
	'post_category'	=>	array($_POST['cat']),  // Usable for custom taxonomies too
	'tags_input'	=>	array($tag1),
	'post_status'	=>	'publish',           // Choose: publish, preview, future, draft, etc.
	'post_type'	=>	'post'  //'post',page' or use a custom post type if you want to
	);
if($count > 0){ ?>
		<script type="text/javascript">
		toastr.options.showMethod = 'slideDown'; 
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-left';
		toastr.options.timeOut= '5000';
	    toastr.error('No foul language please');
	   </script>
	<?php }
	
elseif($tagcount > 1 || $tagcount == 0){
						?><script type="text/javascript">
				    toastr.options.showMethod = 'slideDown'; 
					toastr.options.closeButton = true;
					toastr.options.positionClass = 'toast-bottom-left';
					toastr.options.timeOut= '5000';
				<?php if($tagcount > 1){ ?>
					toastr.error('More than one #tag not allowed');
				<?php }else{ ?>
					toastr.error('At least one #tag required');
			   <?php }?>
			</script><?php 
}elseif(isset($_POST['feat-id']) && $_POST['feat-id'] != '')
{
	$attach_id = $_POST['feat-id'];
		//SAVE THE POST
				if($tagcount > 1 || $tagcount == 0){
						?><script type="text/javascript">
				    toastr.options.showMethod = 'slideDown'; 
					toastr.options.closeButton = true;
					toastr.options.positionClass = 'toast-bottom-left';
					toastr.options.timeOut= '5000';
				<?php if($tagcount > 1){ ?>
					toastr.error('More than one #tag not allowed');
				<?php }else{ ?>
					toastr.error('At least one #tag required');
			   <?php }?>
			</script><?php
				}else{
					
					$pid = wp_insert_post($new_post, $attach_id);// save post with image id
					set_post_thumbnail( $pid, $attach_id ); // feacture image upload
					
					//add_post_meta($post_id, '_thumbnail_id', $attach_id);  
				         
					wp_set_post_tags($pid, $tag1);//SET OUR TAGS UP PROPERLY
				
					//REDIRECT TO THE NEW POST ON SAVE
					$link = get_permalink( $pid );
					setcookie('posted','true',time()+5,'/');
					wp_redirect(home_url());
				}
}elseif($file['name'] != ""){
	
			$uploaddir = wp_upload_dir();
			$file = $_FILES['image_featured'];
			if($file['name'] != ""){
		    $image = getimagesize($file['tmp_name']);
			
		    $minimum = array(
		        'width' => '300',
		        'height' => '300'
		    );
		    /*$maximum = array(
		        'width' => '300',
		        'height' => '300'
		    );*/
		    $image_width = $image[0];
		    $image_height = $image[1];
		
		   
		    if ( $image_width < $minimum['width'] || $image_height < $minimum['height'] ){
		    	?><script type="text/javascript">
		    	toastr.options.showMethod = 'slideDown'; 
				toastr.options.closeButton = true;
				toastr.options.positionClass = 'toast-bottom-left';
				toastr.options.timeOut= '5000';
				toastr.error('Image Too Small, Min 300px');
			</script><?php
		    }/*elseif ( $image_width > $maximum['width'] || $image_height > $maximum['height'] ){
		    	?><script type="text/javascript">
		    	toastr.options.showMethod = 'slideDown'; 
				toastr.options.closeButton = true;
				toastr.options.positionClass = 'toast-bottom-left';
				toastr.options.timeOut= '5000';
				toastr.error('Please upload image size 300*300');
			</script><?php
		    }*/else{ //upload image code
						if( ! empty( $_FILES ) ) {
					    foreach( $_FILES as $file ) {
					        if( is_array( $file ) ) {
					             $attachment_id = upload_user_file( $file );
					        }
					    }
					}
					
					//SAVE THE POST
				if($tagcount > 1 || $tagcount == 0){
						?><script type="text/javascript">
		    			toastr.options.showMethod = 'slideDown'; 
						toastr.options.closeButton = true;
						toastr.options.positionClass = 'toast-bottom-left';
						toastr.options.timeOut= '5000';
				<?php if($tagcount > 1){ ?>
				toastr.error('More than one #tag not allowed');
				<?php }else{ ?>
					toastr.error('At least one #tag required');
			   <?php }?>
			</script><?php
				}else{
					
					$pid = wp_insert_post($new_post, $attachment_id);// save post with image id
					set_post_thumbnail( $pid, $attachment_id ); // feacture image upload
					
					//add_post_meta($post_id, '_thumbnail_id', $attach_id);  
				         
					wp_set_post_tags($pid, $tag1);//SET OUR TAGS UP PROPERLY
				
					//REDIRECT TO THE NEW POST ON SAVE
					$link = get_permalink( $pid );
					setcookie('posted','true',time()+5,'/');
					wp_redirect(home_url());
					
				}
			}
		}else{
			
			if($tagcount > 1 || $tagcount == 0){?>
					<script type="text/javascript">
					    		toastr.options.showMethod = 'slideDown'; 
								toastr.options.closeButton = true;
								toastr.options.positionClass = 'toast-bottom-left';
								toastr.options.timeOut= '5000';
							<?php if($tagcount > 1){ ?>
							toastr.error('More than one #tag not allowed');
							<?php }else{ ?>
								toastr.error('At least one #tag required');
						   <?php }?>
					</script>
			<?php }else{
					
					$pid = wp_insert_post($new_post, $attach_id);// save post with image id
					set_post_thumbnail( $pid, $attach_id ); // feacture image upload
					
					//add_post_meta($post_id, '_thumbnail_id', $attach_id);  
				         
					wp_set_post_tags($pid, $tag1);//SET OUR TAGS UP PROPERLY
				
					//REDIRECT TO THE NEW POST ON SAVE
					$link = get_permalink( $pid );
					setcookie('posted','true',time()+5,'/');
					wp_redirect(home_url());
					
				}
		}
		
}else{
	?>
	<script type="text/javascript">
		toastr.options.showMethod = 'slideDown'; 
		toastr.options.closeButton = true;
		toastr.options.positionClass = 'toast-bottom-left';
		toastr.options.timeOut= '5000';
		toastr.error('Please select or upload an image');
	</script>
	
<?php }
	 

				
				
		
} // END THE IF STATEMENT THAT STARTED THE WHOLE FORM

//POST THE POST YO
							
do_action('wp_insert_post', 'wp_insert_post');
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
			//print_r($abbusive_keyword_arr);
 ?>
 <?php  //require_once( ABSPATH . 'wp-content/plugins/e-pray-custom-post/hide.php' );?>
 <script type="text/javascript">
 								
		function isUrl(s) {
		var regexp = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org|.uk]+(\[\?%&=]*)?/
		return regexp.test(s);
		}
								
				 $(document).ready(function(){
				 	var flag=0;
					// validate signup form on keyup and submit
					$("#new_post").validate({
						rules: {
							description: {
								required: true,
								//minlength: 20,
					 			maxlength: 225
							},
							image_featured: {
								//required: true
								//extension: "jpg|png"			
							},
							
						},
						messages: {
							description: {
								required: "Required",
								//minlength:"Minimum 20 Characters",
								maxlength:"Maximum 225 words allowed"
							},
							image_featured: {
								//required: "Required",
								//extension:"File Format not supported"
							 },
							
						}
					});
					
					
					$('#image_featured').on('change', function(evt){
						$('#validExt').html('');
					
					    var file = evt.target.files[0];
					    
						
					    if(file.type.match('image.*')){
					        var reader = new FileReader();
					        reader.onload = (function(file){
					            return function(e){
									$('#validExt').html('');
									
									$('#dis_upload_img').attr('src',e.target.result);
					                // $('#upload_img').css({
					                    // 'background-image': 'url(' + e.target.result +')' 
					                // });
					            }
					        })(file);
					    }else
						{
							$('#validExt').css('color','red');
							$('#validExt').html('Not an image');
							return false;
						}
					    
					    reader.readAsDataURL(file);
					})
					
					
					//find has tag 
					$("#description").on("change",function(){

						if (description.indexOf('#') > -1) {
						var split_value = description.match(/#(.*$)/)[1];//description.substring(description.indexOf('#')+1);
						var final_value = split_value.split(" ");
						//array.push();
						 //$("#devalue").val(final_value[0]); //add value in #devalue id 
						//alert(final_value[0]);
							}
					});
			
			
						     $(".phn").live("click", function(){
					    	$('.phn').removeClass('active');
					        $(this).addClass('active');
						    });
						
						$(document).on("click","#submit", function(){
							 if(isUrl($('#description').val()))
								{
									toastr.options.showMethod = 'slideDown'; 
									toastr.options.closeButton = true;
									toastr.options.positionClass = 'toast-bottom-left';
									toastr.options.timeOut= '5000';
								    toastr.error('Url not allowed.');
								
								return false;
								}else{
								//alert("submit");
								 return true;
								}
					  });
					  
					 
				});
	
 
	
			</script>		

		   <?php
		   
									if(!is_user_logged_in()){?> 
										   <h3>Hello Please <a href="<?php echo home_url(); ?>">Login</a>, <br />
											<span>To Post Your Prayer</span></h3>
	                             <?php }else{?> 
										<h3>Hello <?php echo $current_user_name;?>, <br />
											<span>Post Your Prayer Request</span></h3>
			                            <form id="new_post" name="new_post" method="post" action="" class="wpcf7-form" enctype="multipart/form-data">
				                            <textarea class="txt-ara" placeholder="225 character limit. You can tag your post with #" id="description" name="description"><?php echo $description; ?></textarea>
				                            
				                            <div class="left-img ff-left">
				                            	<label>
					                            	 <input type="file" name="image_featured" id="image_featured" class="image_featured" size="20">
					                                 <img  id="dis_upload_img" style="width: 169px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/library/images/slfi.jpg" />
				                                </label>
				                                <span class="validExt" id="validExt"></span>
				                            </div>
				                            <div class="right-img ff-right">
				                            	
				                            	<div id="fet_image">
				                            		<img  id="dis_upload_img" src="<?php echo get_template_directory_uri(); ?>/library/images/loader.gif" />
				                            		<?php /* $args = array(
													'post_type'=> 'featured_image',
													'posts_per_page' => 8,
													//'meta_value' => $tagnames,
													'orderby' => 'rand',
													//'exclude'     => get_post_thumbnail_id(),
												);
												query_posts( $args ); 
												 while ( have_posts() ) : the_post();
												 $img_array = get_field('image');
												 //print_r($img_array);?>
													
															<img class="phn" src="<?php echo $img_array['sizes']['small-custom-size']; ?>" style="width: 65px;"/>
												 <?php   endwhile; wp_reset_query(); */ ?>
												 </div> <!-----display feacture image by ajax----->
				                            	
				                            	  <input type="submit" id="submit" class="post-but" value="Post it!" />
				                            </div>
				                            <input type="hidden" name="action" value="new_post" />
											<?php wp_nonce_field( 'new-post' ); ?>
			                            </form>
	                            	  	
							    <?php } ?>
        
        <?php
        return ob_get_clean();
	}
add_shortcode('e-pray-custompost', 'custompost');
