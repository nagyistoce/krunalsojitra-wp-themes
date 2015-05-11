<?php
/*
Template Name: Account Setting
*/
?>
<?php get_header();
global $current_user, $wp_roles;
 global $wpdb;
get_currentuserinfo();
$user_id = get_current_user_id();
$current_user = wp_get_current_user();
$User_email = $current_user->user_email;
$Username = $current_user->user_login;


if(!is_user_logged_in()){
	wp_redirect(home_url('/'));
}
												 

if($_COOKIE['profilesuccess'] == "true" ){
		
		?>
			<script>
				toastr.options.onHidden = function() { 
					jQuery.cookie("profilesuccess", '', {
			 			expires : -1,
			 			path : '/'
					});
	 			};
				toastr.options.showMethod = 'slideDown';
				toastr.options.closeButton = true;
				toastr.options.positionClass = 'toast-bottom-left';
				toastr.options.timeOut = '10000';
				toastr.success('Profile successfully updated');
				
				 
				
			</script>
		<?php
	}

if($_COOKIE['passerror'] == "true" ){
		
		?>
			<script>
				toastr.options.onHidden = function() { 
					jQuery.cookie("passerror", '', {
			 			expires : -1,
			 			path : '/'
					});
	 			};
				toastr.options.showMethod = 'slideDown';
				toastr.options.closeButton = true;
				toastr.options.positionClass = 'toast-bottom-left';
				toastr.options.timeOut = '10000';
				toastr.error('Both Passwords does not match');
				
				 
				
			</script>
		<?php
	}

if($_COOKIE['picerror'] == "true" ){
		
		?>
			<script>
				toastr.options.onHidden = function() { 
					jQuery.cookie("picerror", '', {
			 			expires : -1,
			 			path : '/'
					});
	 			};
				toastr.options.showMethod = 'slideDown';
				toastr.options.closeButton = true;
				toastr.options.positionClass = 'toast-bottom-left';
				toastr.options.timeOut = '10000';
				toastr.error('Not an image');
				
				 
				
			</script>
		<?php
	}
/* Load the registration file. */
require_once( ABSPATH . WPINC . '/registration.php' );
$error = array();    
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            $sucess_pass = wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error_pass ='The passwords you entered do not match.';
    }

				  if ( !empty( $_FILES['file'] ) ){ 
								$allowedExts = array("gif", "jpeg", "jpg", "png");
								$temp = explode(".", $_FILES["file"]["name"]);
								$extension = end($temp);
								if ((($_FILES["file"]["type"] == "image/gif")
								|| ($_FILES["file"]["type"] == "image/jpeg")
								|| ($_FILES["file"]["type"] == "image/jpg")
								|| ($_FILES["file"]["type"] == "image/pjpeg")
								|| ($_FILES["file"]["type"] == "image/x-png")
								|| ($_FILES["file"]["type"] == "image/png"))
								&& in_array($extension, $allowedExts)){
						  
						  		if ($_FILES["file"]["error"] > 0)
						    	{
						    		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
						    	}
								
								if (file_exists("wp-starter/library/avtar/" . uniqid(). $_FILES["file"]["name"]))
						      	{
						      		//echo $_FILES["file"]["name"] . " already exists. ";
						      	}
						    	else
						      	{
								 	$target_path_sia = uniqid().$_FILES["file"]["name"];
								  move_uploaded_file($_FILES["file"]["tmp_name"],"wp-content/themes/wp-starter/library/avtar/" .$target_path_sia);
								  //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
								  //echo "<p  style='color:#2A97C7'>SIA Licence Upload</p>";
									$user_id = get_current_user_id();
									$user_avtar = $target_path_sia;
						
									$mylink = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $user_id");
								  	
								  	if ($mylink != null) {		 
									  $profile_update = $wpdb->query("UPDATE ".$wpdb->prefix."user_avtar SET user_avtar = '$user_avtar' WHERE user_id = $user_id"); 
									// echo "UPDATE sia_licence SET sia_licence = '$si_copy_licence' WHERE sia_user_id = $user_id";
									 }
										else{	
									 $profile_update = $wpdb->query("INSERT INTO ".$wpdb->prefix."user_avtar VALUES ('', $user_id, '$user_avtar')"); 
									//echo "INSERT INTO ".$wpdb->prefix."user_avtar VALUES ('', $user_id, '$user_avtar')";
									   }
											}
										//wp_redirect( get_bloginfo('wpurl').'/my-document', 301 ); 
											 }
					
					
				  }
				 
				 
if($sucess_pass){
	//echo "Sucessfully password update";
	setcookie("profilesuccess", "true", time()+3600, '/'); // Set cokkie for add company toaster
		
}elseif($error_pass){
	//echo $error_pass;
	setcookie("passerror", "true", time()+3600, '/'); // Set cokkie for add company toaster
}

if($profile_update){
	//echo "Profile picture update";
	setcookie("profilesuccess", "true", time()+3600, '/'); // Set cokkie for add company toaster
}elseif(isset($error_profile)){
	//echo $error_profile;
	setcookie("picerror", "true", time()+3600, '/'); // Set cokkie for add company toaster
}
        
  
      if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( get_permalink() );
        exit;
    }
}

?>
 <script type="text/javascript">
   $(document).ready(function(){
  	$('#file').on('change', function(evt){
						$('#provalidExt').html('');
					
					    var file = evt.target.files[0];
					    if(file.type.match('image.*')){
					        var reader = new FileReader();
					        reader.onload = (function(file){
					            return function(e){
									$('#provalidExt').html('');
									
									$('#pro_upload_img').attr('src',e.target.result);
					                // $('#upload_img').css({
					                    // 'background-image': 'url(' + e.target.result +')' 
					                // });
					            }
					        })(file);
					    }else
						{
							$('#provalidExt').css('color','red');
							$('#provalidExt').html('Not an image');
							return false;
						}
					    
					    reader.readAsDataURL(file);
					})
	});
</script>
					
					
			<!--banner -->
			<div class="banner">
		    	<div class="bg-ring"></div>
		    	<!--container -->
		    	<div class="container">
		            <!--form-main -->
		            <div class="home-banner ff-left">
		            		<div class="home-box">
	    					  <?php echo do_shortcode('[e-pray-custompost]'); ?>
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
                                <h6><?php the_title();?></h6>
                                	
                            </div>
						    <div id="main" class="main" role="main">         		  
                <form method="post" id="adduser" class="my-pro-form" action="" enctype="multipart/form-data">
					<?php   $authore_id = get_the_author_meta('ID');
					 			$user_id = get_current_user_id();?>
					<?php   $provider = get_the_author_meta("wsl_current_provider", $user_id); ?>
							
					<?php if($provider == ""){ ?>
						<?php $user_pix = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_avtar WHERE user_id = $user_id");?>
	                    <?php if($user_pix->user_avtar != ""){?>
	                        <div class="upload_img_profile"><img id="pro_upload_img" title="Profile Image" src="<?php bloginfo('stylesheet_directory'); ?>/library/avtar/<?php echo $user_pix->user_avtar;?>" class="avtr_img"  /></div> 
	                    <?php } else{?>
	                    	<div class="upload_img_profile"><img id="pro_upload_img" title="Profile Image" src="<?php echo get_template_directory_uri(); ?>/library/images/user.jpg" class="avtr_img"  /></div>
	                    <?php }?>
					
					<?php } else {
						echo get_avatar($user_id, 150); 
					}?>
					<span class="validExt" id="provalidExt"></span>
                   <ul>
					<li>
                        	<label class="brwos-but">
	                    	Upload
	                        <input type="file" name="file" id="file">
	                     </label>
	                 	
                        
                    </li>
                       <li>
                        <label for="first-name"><?php _e('User Name', 'profile'); ?></label>
                        <input class="text-input" name="first-name" type="text" id="first-name" value="<?php echo $Username; ?>" readonly disabled="disabled" />
                    </li>
									<li>
                        <label for="email"><?php _e('Email', 'profile'); ?></label>
                        <input class="text-input" name="email" type="text" id="email" value="<?php echo $User_email; ?>" readonly disabled="disabled" />
                   </li>
                       <li>
                        <h4 style="margin-top:15px;">Change your password:</h4>
                    </li>
									<li>
                        <label for="pass1"><?php _e('Password *', 'profile'); ?> </label>
                        <input class="text-input" name="pass1" type="password" id="pass1" />
                    </li>
									<li>
                        <label for="pass2"><?php _e('Repeat Password *', 'profile'); ?></label>
                        <input class="text-input" name="pass2" type="password" id="pass2" />
                    </li>
				<li>
					<input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'profile'); ?>" />
                        <?php wp_nonce_field( 'update-user' ) ?>
                        <input name="action" type="hidden" id="action" value="update-user" />
				</li>
	                    <?php /*<img  id="pro_upload_img" title="Preview Image" style="width: 169px; " src="<?php echo get_template_directory_uri(); ?>/library/images/user.jpg" />
	                     <span class="validExt" id="validExt"></span> */ ?>
                                </ul>
                </form><!-- #adduser -->
            
        	
        	
    </div><!-- end #main -->

						</div>

					</div><!-- end .grid -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
<?php get_footer(); ?>