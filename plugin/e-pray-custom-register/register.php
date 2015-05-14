<?php ob_start();
/*
/*
Plugin Name: e-Pray Custom Register Form
Description: Custom Registration Form for e-Pray
Version: 1.0
License: GPL
*/
?>
<?php
function registrationForm() {
	
?>
	
	<script type="text/javascript">
	$().ready(function() {
		
		// validate signup form on keyup and submit
		$("#RegisterForm").validate({
			rules: {
				username: {
					required: true,
					minlength: 2,
					maxlength: 20,
				},
				password: {
					required: true,
					minlength: 6,
					maxlength: 30,
				},
				email: {
					required: true,
					email: true,
					maxlength: 60,
				},
				terms: {
					required: true,
				},
			},
			messages: {
				username: {
					required: "Required",
					minlength: "Required atleast 2 letters",
					maxlength:"Max 20 Character allowed"
				},
				password: {
					required: "Required",
					minlength: "Required atleast 6 letters",
					maxlength:"Max 30 Character allowed"
				},
				email: {
					email: "Not a valid email",
					maxlength:"Max 60 Character allowed"
				},
				terms: {
					required: "Required",
				},
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
			require_once(ABSPATH . WPINC . '/registration.php');
			global $wpdb, $user_ID;
			//Check whether the user is already logged in
			if ($user_ID) {
			 
			    // They're already logged in, so we bounce them back to the homepage.
			 
			    header( 'Location:' . home_url().'/home' );
			 
			} 
			else {
				
				$errors = array();
 
			    if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
			 
			        // Check username is present and not already in use
			        $username = $wpdb->escape($_REQUEST['username']);
			        if ( strpos($username, ' ') !== false ) {
			            $errors[] = "Sorry, no spaces allowed in usernames";
			        }
			        if(empty($username)) {
			            $errors[] = "Please enter a username";
			        } elseif( username_exists( $username ) ) {
			            $errors[] = "Username already exists, please try another";
			        }
			 
			        // Check email address is present and valid
			        $email = $wpdb->escape($_REQUEST['email']);
			        if( !is_email( $email ) ) {
			            $errors[] = "Please enter a valid email";
			        } elseif( email_exists( $email ) ) {
			            $errors[] = "This email address is already in use";
			        }
			 
			        // Check password is valid
			        if(0 === preg_match("/.{6,}/", $_POST['password'])){
			          $errors[] = "Password must be at least six characters";
			        }
			 
			        // Check password confirmation_matches
			        //if(0 !== strcmp($_POST['password'], $_POST['password_confirmation'])){
			        //  $errors['password_confirmation'] = "Passwords do not match";
			        //}
			 
			        // Check terms of service is agreed to
			        //if($_POST['terms'] != "Yes"){
			        //    $errors['terms'] = "You must agree to Terms of Service";
			        //}
			 
			        if(0 === count($errors)) {
			 
			            $password = $_POST['password'];
			 
			 			
			 			 $new_user_id = wp_create_user( $username, $password, $email );
						 // email verifaction code
						 global $wpdb;
						 $verification_code = md5(rand(8842, 100000));
						 $wpdb->query("INSERT INTO ".$wpdb->prefix."user_email_veryfy(`user_name`,`verified_code`) VALUES ('$username','$verification_code')");
						   
						    $to = $email;
							$subject = "E-pray New Account Verification";
							$from = 'E-pray Team';
							$headers= "MIME-version: 1.0\n";	
							$headers.= "Content-type: text/html; charset=utf-8\r\n";
							$headers.= "From: ePray Team <eprayteam@epray.com>";
							$message ="<html>
										    <head>
										      <title>e-pray New Account Verification</title>
										    </head>
										    <body>
										      <table>
										      <tr><td> <b>Dear $username, Thank you for registering on epray!</td></tr></b>
										       <tr><td><b>Email : $email</b></td></tr><br />
										      <tr><td> But before we can activate your account, one last step must be taken to complete your registration.
					Please note, you must complete this last step to become a registered member. You will only need to visit this URL once to activate your account.
					To complete your registration, please visit this URL:</td></tr> <br />
										     <tr><td>Verification Link : <a href='http://www.brilliantclips.com/bridge/?username=$username&code=$verification_code'>http://www.brilliantclips.com/bridge/?username=$username&code=$verification_code</a></td></tr>
										     <tr><td>After verification : <a href='http://www.brilliantclips.com/'>Sign in</a></td></tr>  <br /><br />
										      <b>Best Regards,<br />
					  						  e-pray Team</b>
										      </table>
										      </body>
										      </html>";
							 $res = mail($to, $subject, $message, $headers);
							
						 // email verifaction code end
						 
						// You could do all manner of other things here like send an email to the user, etc. I leave that to you.
			 
			            $success = 1;
			 
			            //header( 'Location:' . get_bloginfo('url') . '/?success=1&u=' . $username );
						
						//$errors[] = "Registered successfully please confirm your email address.";
						?>
						<script  type="text/javascript">
							toastr.options.showMethod = 'slideDown'; 
							toastr.options.closeButton = true;
							toastr.options.positionClass = 'toast-top-center';
							toastr.options.timeOut= '5000';
							toastr.success('Registered successfully please confirm your email address.');
						</script>
						<?php
						
						
						/*aWeber subscription logic start*/
						
						require_once(ABSPATH.'/aweber_api/aweber_api.php');
						 
						// Step 1: assign these values from https://labs.aweber.com/apps
						$consumerKey = 'AkPfYOK609eWdTkRPw4SYdlQ';
						$consumerSecret = '9KUawCIEMii5kbS5dS6rGyyL1Rn7Dz7Sp5gDzxoI';
						 
						// Step 2: load this PHP file in a web browser, and follow the instructions to set
						// the following variables:
						$accessKey = 'Agx2SUcHvqVPvt3BWb22gRIh';
						$accessSecret = 'EuiQTyMbCxMo2iOD5w84hk0VdWQ0pxtn3NVoUlWX'; 
						$list_id = '3386025'; //wppagespeed list
						 
												 
						$aweber = new AWeberAPI($consumerKey, $consumerSecret);
						if (!$accessKey || !$accessSecret){
						    //display_access_tokens($aweber);
						}
						 
						try {
						    $account = $aweber->getAccount($accessKey, $accessSecret);
						    $account_id = $account->id;
						 
						    if (!$list_id){
						        //display_available_lists($account);
						        //exit;
						    }
						 
						    //print "Your script is configured properly! " .
						    //    "You can now start to develop your API calls, see the example in this script.<br><br>" .
						    //    "Be sure to set \$test_email if you are going to use the example<p>";
						 
						    //example: create a subscriber
						    
						    $test_email = $email;
						    if (!$test_email){
						    //print "Assign a valid email address to \$test_email and retry";
						    //exit;
						    }
						    $listURL = "/accounts/{$account_id}/lists/{$list_id}";
						    $list = $account->loadFromUrl($listURL);
						    $params = array(
						        'email' => $test_email,
						        'misc_notes' => 'ePray app',
						        'name' => $username
						    );
						    $subscribers = $list->subscribers;
						    $new_subscriber = $subscribers->create($params);
						    //print "{$test_email} was added to the {$list->name} list!";
						    
						 
						} catch(AWeberAPIException $exc) {
						    //print "<h3>AWeberAPIException:<h3>";
						    //print " <li> Type: $exc->type <br>";
						    //print " <li> Msg : $exc->message <br>";
						    //print " <li> Docs: $exc->documentation_url <br>";
						    //print "<hr>";
						    //exit(1);
						}
						 
						function get_self(){
						    return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
						}
						 
						function display_available_lists($account){
						    //print "Please add one of the lines of PHP Code below to the top of your script for the proper list<br>" .
						    //        "then click <a href=\"" . get_self() . "\">here</a> to continue<p>";
						 
						    $listURL ="/accounts/{$account->id}/lists/";
						    $lists = $account->loadFromUrl($listURL);
						    foreach($lists->data['entries'] as $list ){
						        //print "\$list_id = '{$list['id']}'; // list name:{$list['name']}\n</br>";
						    }
						}
						 
						function display_access_tokens($aweber){
						    if (isset($_GET['oauth_token']) && isset($_GET['oauth_verifier'])){
						 
						        $aweber->user->requestToken = $_GET['oauth_token'];
						        $aweber->user->verifier = $_GET['oauth_verifier'];
						        $aweber->user->tokenSecret = $_COOKIE['secret'];
						 
						        list($accessTokenKey, $accessTokenSecret) = $aweber->getAccessToken();
						 
						        //print "Please add these lines of code to the top of your script:<br><br>" .
						        //        "\$accessKey = '{$accessTokenKey}';\n<br>" .
						        //        "\$accessSecret = '{$accessTokenSecret}';\n<br>" .
						        //        "<br><br>" .
						        //        "Then click <a href=\"" . get_self() . "\">here</a> to continue";
						        //exit;
						    }
						 
						    if(!isset($_SERVER['HTTP_USER_AGENT'])){
						        //print "This request must be made from a web browser\n";
						        //exit;
						    }
						 
						    $callbackURL = get_self();
						    list($key, $secret) = $aweber->getRequestToken($callbackURL);
						    $authorizationURL = $aweber->getAuthorizeUrl();
						 
						    setcookie('secret', $secret);
						 
						    header("Location: $authorizationURL");
						    exit();
						}
						
						
						
						?><!-- <script type="text/javascript">
							setTimeout(function () {
						    window.location.href= '<?php echo home_url(); ?>/bridge'; 
							},2500); // 3 seconds
							</script> -->
						<?php
						?>
							<script>
								message('<?php echo json_encode($errors);?>');
							</script>
						<?php
			 
			        }
					else {
						?>
							<script>
								message('<?php echo json_encode($errors);?>');
							</script>
						<?php
					}
			 
			    }

			}
		?>
		
        <div class="signup-form">
                	<form method="post" action="" id="RegisterForm"> 
                    	<ul>
                        	<li>
                            	<div class="top-head">
                                	<h2>New to ePray? <span>Sign Up</span></h2>
                                </div>
                            </li>
                        	<li>
                            	<input type="text" value="" class="text-bx" placeholder="Username" name="username" maxlength="20" autocomplete="off" />
                            </li>
                        	<li>
                            	<input type="email" value="" class="text-bx" placeholder="Email" name="email" maxlength="60" autocomplete="off" />
                            </li>
                        	<li>
                            	<input type="password" value="" class="text-bx" placeholder="Password" name="password" maxlength="30" autocomplete="off" />
                            </li>
                            <li>
                            	<input type="checkbox" name="terms" id="terms" class="check" /><a href="#terms-content" class="fancybox accpt_te">Accept terms & conditions</a>
                            </li>
                            <li>
                                   <?php do_action( 'wordpress_social_login' ); ?> <input type="submit" name="signup" value="Sign-up for ePray" class="sgn-up" />
                            </li>
                        </ul>
                    </form>
                </div>
	    	
        
<?php
}
add_shortcode('e-pray-register', 'registrationForm');
?>