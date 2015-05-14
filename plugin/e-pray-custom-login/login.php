<?php ob_start();
/*
Plugin Name: e-Pray Custom Login Form
Description: Custom Login Form for e-Pray
Version: 1.0
License: GPL
*/ 
function loginForm() {
			?>
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
	
	font-size: 24px;
	font-weight: bold;
	line-height: 34px;
}
.pop_mes p {
	color: #000000;
	
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
		
<!-----Forget password pop script---->
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
	
	<script type="text/javascript">
		$().ready(function() {
		
			//$("#Loginform").validate();
	
			// validate signup form on keyup and submit
			$("#Loginform").validate({
				rules: {
					username: {
						required: true,
						maxlength: 20,
					},
					password: {
						required: true,
						maxlength: 30,
					},
					
				},
				messages: {
					username: {
						required: "Required",
						maxlength:"Max 20 Character allowed"
					},
					password: {
						required: "Required",
						maxlength:"Max 30 Character allowed"
					},
					
				}
			});
			$("#forgot-pass").validate({
				rules: {
					user_login: {
						required: true,
						maxlength: 60,
					},
											},
				messages: {
					user_login: {
						required: "Required",
						maxlength:"Max 60 Character allowed"
					}
					
				}
			});
		
		});
		function message(msg){
			var obj = JSON.parse(msg);
			
			toastr.options.showMethod = 'slideDown'; 
			toastr.options.closeButton = true;
			toastr.options.positionClass = 'toast-bottom-left';
			toastr.options.timeOut= '10000';
			
			for(i=0;i<obj.length;i++){
				toastr.error(obj[i]);
			}
				
		}
		</script>
					
					<?php
								        global $wpdb;
								        
								        $error = array();
								        $success = '';
								        require_once( ABSPATH . WPINC . '/registration.php');
								        // check if we're in reset form
								        if( isset( $_POST['action'] ) && 'reset' == $_POST['action'] ) 
								        {
								            $email = trim($_POST['user_login']);
											
								            if( empty( $email ) ) {
								                $error[] = 'Enter a e-mail address.';
								            } else if( ! is_email( $email )) {
								                $error[] = 'Invalid e-mail address.';
								            } else if( ! email_exists( $email ) ) {
								                $error[] = 'There is no user registered with this email address.';
								            } else {
								                
								                $random_password = wp_generate_password( 12, false );
								                $user = get_user_by( 'email', $email );
								                
								                $update_user = wp_update_user( array (
								                        'ID' => $user->ID, 
								                        'user_pass' => $random_password
								                    )
								                );
								                
								                // if  update user return true then lets send user an email containing the new password
								                if( $update_user ) {
								                    $to = $email;
								                    $subject = 'Your new password';
								                    $sender = 'ePray Team';
													$headers = 'MIME-Version: 1.0' . "\r\n";
								                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								                    $headers .= "X-Mailer: PHP \r\n";
								                    $headers .= 'From:ePray Team <eprayteam@epray.com>'."\r\n";
								                    
													$message ="<html>
															    <head>
															      <title>e-pray password change</title>
															    </head>
															    <body>
															      <table>
															      <tr><td><b>Dear user,</td></tr></b>
															      <tr><td>Your Password has been Changed.</td></tr><br />
															   		<tr><td><b>Your new password is: </b>$random_password</td></tr><br />
															     	
															    	 <tr><td><b>Best Regards,<br />
										  						  ePray Team</b></td></tr>
															      </table>
															      </body>
															      </html>";
													
													
													
								                    $mail = wp_mail( $to, $subject, $message, $headers );
								                    if( $mail )
								                        $error[] = 'Check your email for your new password.';
								                        
								                } else {
								                    $error[] = 'Oops something went wrong updating your account.';
								                }
								                
								            }
								            
								            if( ! empty( $error ) ){
								            	//echo '<div class="message"><p class="error">'. $error .'</p></div>';?>
												
												<script>
														message('<?php echo json_encode($error);?>');
												</script>
								            <?php }
								                
								            
								            //if( ! empty( $success ) )
								                //echo '<div class="error_login"><p class="success">'. $success .'</p></div>';
								        }
								    ?>
				<!-----Forget password pop script---->
		
			
			<?php
			if(isset($_POST['submit']))
			{
			
				$creds = array();
				$creds['user_login'] = trim($_POST['username']) ;
				$creds['user_password'] = trim($_POST['password']) ;
				if(isset($_POST['rememberme']))
				{
					if($_POST['rememberme'] == "forever"){
						$creds['remember'] = true;
					}
					else{
						$creds['remember'] = false;
					}
				}
				else
				{
					$creds['remember'] = false;
				}
				global $wpdb;
				$user_Name = $creds['user_login'];
				$eamil_verifi = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_email_veryfy WHERE user_name = '$user_Name' ",ARRAY_A);
				//print_r($eamil_verifi); 
				
				if($eamil_verifi['status'] == 1){
					
						$user = wp_signon( $creds, false );
				
						if ( is_wp_error($user) )
						{
							//$error_message = substr($user->get_error_message(), 0, strpos($user->get_error_message(), "."));
							$error_message[] = "Wrong username or password. Please try again."; 
						?>	
							<script>
									message('<?php echo json_encode($error_message);?>');
							</script>
						<?php
						}
						else 
						{
							wp_redirect(home_url('/')."home");
						}
				}else{
						$error_emailverifi_message[] = "Wrong username or password. Please try again."; 
						?>	
						
						<script>
								message('<?php echo json_encode($error_emailverifi_message);?>');
						</script>
					<?php 
				}	
					
			}
		?>
									 
    	<form method="post" action="" id="Loginform">
    		<ul>
                <li>
                	<input type="text" value="" class="text-bx" name="username" id="username" placeholder="Username" maxlength="20" autocomplete="off" />
                </li>
                <li>
                	<input type="password" value="" class="text-bx qt-hlf" name="password" id="password" placeholder="Password" maxlength="30" autocomplete="off"/>
                    <input type="submit" name="submit" value="Sign in" id="Login" class="sgn-in" />
                </li>
                <li>
                	<label><input type="checkbox" class="check-bx" name="rememberme" value="forever" />Remember me</label>
                    <a href="javascript:void(0)" onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Forgot password?</a>
                </li>
            </ul>
        </form>
        
        
        <!-----Forget password ---->
        <div id="fade" class="dark_overlay cool">
			<div id="light" class="bright_content main">
			      <div class="pop_mes">
			    <form id="forgot-pass" method="post">
			        <fieldset>
			            <p>Please enter your email address. You will receive a link to create a new password via email.</p>
			            <p><!-- <label for="user_login">E-mail:</label> -->
			                <input type="text" name="user_login" id="user_login_pass" maxlength="60" placeholder="Email" /></p>
			            <p>
			                <input type="hidden" name="action" value="reset" />
			                <input type="submit" value="Get New Password" class="button" id="submit" />
			            </p>
			        </fieldset> 
			    </form>
			  </div>
			 <a href="javascript:void(0)" onclick="popUpClose()" class="close"> Close</a> 
			 </div> 
 		</div>
        <!-----Forget password---->
        
        
        
        <?php
        return ob_get_clean();
	}
add_shortcode('e-pray-login', 'loginForm');
?>