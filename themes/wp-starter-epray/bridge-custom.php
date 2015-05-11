<?php
/*
Template Name: Bridge Custom Page
*/
?>

<?php get_header(); global $wpdb;

$username = $_REQUEST['username'];
$code = $_REQUEST['code'];

$email_verify = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."user_email_veryfy WHERE user_name = '$username' ",ARRAY_A);
//echo "SELECT * FROM ".$wpdb->prefix."user_email_veryfy WHERE user_name = $username and verified_code = $code ";
$user_id = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."users WHERE user_login = '$username' ",ARRAY_A);

if($email_verify['status'] == 0){

	//echo "<div class='verify'><h3>Thank you for Verifying your Email Address.</h3></div>";
		?>
	
			<!--banner -->
			<div class="banner front-page">
		    	<div class="bg-ring"></div>
		    	<!--container -->
		    	<div class="container">
		        	<!--banner-text -->
		        	<div class="banner-text bridg">
		                <h1>Welcome to epray!</h1>
						<span>Connect & Share With People Who Care</span>
                        
                        <a class="start" href="<?php echo home_url(); ?>">Start Now!</a>
						<div class="clear"></div>
                        <section style="width:300px;">
                            <div class="image-main ff-left">
                                <img src="<?php echo get_template_directory_uri(); ?>/library/images/banner-post.png">
                                <div class="img-des">
                                    <ul>
                                        <!-- <li><a class="share" href="#"></a></li> -->
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
                            <div class="user-detail ff-left bridg">
                                <img src="<?php echo get_template_directory_uri(); ?>/library/images/user-1.jpg">
                                <div class="user-name">
                                    <h3><a href="#">username</a></h3>
                                    <div class="clear"></div>
                                    <span>1.28 pm / August 11,2014</span>
                                </div>
                                <div class="clear"></div>
                                
                                <p>Today I have an appointment regarding my pregnancy. 
                                Please pray that the Lord will continue to protect the 
                                development and health of our baby boy...</p>
                                
                                <ul>
                                    <li class="like">
                                        <span>2</span>
                                    </li>
                                    <li class="list">
                                        <span>2</span>
                                    </li>
                                    <li class="ref">
                                        <span>2</span>
                                    </li>
                                </ul>
                                <a class="prg" href="#">#pregnancy</a>
                            </div>
                            <div class="clear"></div>
                        </section>

		            </div>
		            <!--banner-text -->
		            <!--form-main -->
		            
		            <!--form-main -->
		        
		        </div>
		        <!--container -->
		    </div>    
		    <!--banner -->
<?php
	//print_r($user_pix);
	//echo "UPDATE `".$wpdb->prefix."user_email_veryfy` set status = '1' WHERE user_name = '$username' and verified_code = '$code' ";
	$wpdb->query("UPDATE `".$wpdb->prefix."user_email_veryfy` set status = '1', verified_code = '' WHERE user_name = '$username' and verified_code = '$code' ");
	wp_set_current_user($user_id['ID']);
	wp_set_auth_cookie($user_id['ID']);
}	
else {
	echo "<div class='verify'><h3>Link is expired</h3></div>";
}		
			
?>


<?php get_footer(); ?>