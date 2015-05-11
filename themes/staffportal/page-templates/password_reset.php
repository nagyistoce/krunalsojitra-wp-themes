<?php
/**
 * Template Name: Password Reset
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
/* Get user info. */
global $current_user, $wp_roles;
get_currentuserinfo();

/* Load the registration file. */
require_once( ABSPATH . WPINC . '/registration.php' );
$error = array();    
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] ){
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
			$pass_suce_mes =  "Your Password has been updated successfully.";
			}
        else{
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
		}
    }

     
}
get_header(); ?>
<section class="lor1">
	<div class="lol2">
		<div class="das1">
			<div class="das2">
				<div class="das2_1">
  <?php the_title();?>
  </div>
<div class="das2_2">
						<div class="lol7_3"><!-- lol7_3-->
               
                <form method="post" id="pass_reset" action="">
                  
                 			 <div class="lol7_6">
									<div class="lol7_4">
										Password
									</div>
									<div class="lol7_5">
										  <input class="text-input" name="pass1" type="password" id="pass1" />
									</div>
								</div>
                                
                                 <div class="lol7_6">
									<div class="lol7_4">
										Password Again
									</div>
									<div class="lol7_5">
										<input class="text-input" name="pass2" type="password" id="pass2" />
									</div>
								</div>
                  				
                                
                                 <div class="lol7_6">
									<div class="lol7_4">
                                    <div class="suc_mes"><?php echo $pass_suce_mes;?></div>
										<div class="lol7_8">
											<input name="updateuser" type="submit" id="updateuser" class="submit button" value="Update" />
                        <?php wp_nonce_field( 'update-user' ) ?>
                        <input name="action" type="hidden" id="action" value="update-user" />
                
										</div>
									</div>
								</div>
                   
                   
                   
                </form><!-- #adduser -->
            </div>
      </div>
      </div>
      
      
      <?php //get_sidebar(); ?>
      </div></div></section>
<?php get_footer(); ?>
