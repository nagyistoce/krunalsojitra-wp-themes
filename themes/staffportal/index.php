<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<section class="lor1 kun">
	<div class="lol2">
		<div class="lol3">
			<div class="lol4">
				<div class="lol4_1">
					<div class="lol4_2">
						<span class="lol4_3">
							Login
						</span>
					</div>
				</div>
			</div>
			<div class="lol5">
				<div class="lol5_1">
					OR
				</div>
			</div>
			<div class="lol6">
				<div class="lol4_1">
					<div class="lol4_2">
						<span class="lol4_3">
							Register
						</span>
					</div>
				</div>
			</div>
		</div>
        
		<div class="lol3 lol10">
			<div class="lol4 lol7">
				<div class="lol7_1">
					<div class="lol7_2">
						<div class="lol7_3">
                        <?php wp_login_form(); ?>
                        
							
						</div>
					</div>
				</div>
				<div class="lol7_9">
					<a href="<?php echo bloginfo('wpurl'); ?>/wp-login.php?action=lostpassword">
						Forgotten your Password?
					</a>
				</div>
			</div>
            
			<div class="lol5 lol8">
				<div class="lol8_1 cal_h2">
					&nbsp;
				</div>
			</div>
            
             <?php
$email_id = $current_user->user_email;
  $test_result = $wpdb->get_row("SELECT  `score` FROM  `wp_plugin_slickquiz_scores` WHERE  `createdBy` =  '$user_id' ORDER BY `id` DESC LIMIT 1");
$pos1 = explode("/",$test_result->score);
$pos1_trimmed1 = trim($pos1[0]);


if ( is_user_logged_in() && $pos1_trimmed1 >= 16 ) {
	
	wp_redirect( get_bloginfo('wpurl').'/my-profile', 301 );
}

elseif(is_user_logged_in() && $pos1_trimmed1 < 16 ){
	wp_redirect( get_bloginfo('wpurl').'/staff-induction', 301 );
   ?>
<!--<div class="lol4 lol7 lol9 cal_h1">
				<div class="lol7_2 lol12">
					<div class="lol7_3">
					<div class="lol12_1">
							<div class="lol12_2"></div>
						<div class="lol12_3">
								Success krunal
							</div>
						</div>
						
					</div>
				</div>
				<div class="lol7_9">
					&nbsp;
				</div>
			</div>-->
 <?php
  
} else {
   ?> <div class="lol4 lol7 lol9 cal_h1">
				<div class="lol7_2">
					<div class="lol7_3">
                 <?php regform();?>
                      	</div>
				</div>
				</div>
 <?php } ?>
			
            
            
		</div>
	</div>
</section>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>