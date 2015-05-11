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

<section class="lor1">
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
						Forgotton your Fassword?
					</a>
				</div>
			</div>
            
			<div class="lol5 lol8">
				<div class="lol8_1 cal_h2">
					&nbsp;
				</div>
			</div>
            
             <?php
if ( is_user_logged_in() ) {
   ?>
  <div class="lol4 lol7 lol9 cal_h1">
				<div class="lol7_2 lol12">
					<div class="lol7_3">
						<div class="lol12_1">
							<div class="lol12_2"></div>
							<div class="lol12_3">
								Success
							</div>
						</div>
						
					</div>
				</div>
				<div class="lol7_9">
					&nbsp;
				</div>
			</div>
  
   <?php
} else {
   ?> <div class="lol4 lol7 lol9 cal_h1">
				<div class="lol7_2">
					<div class="lol7_3">
                 <?php regform();?>
                       <?php //echo do_shortcode('[register password="yes" fields="first_name,last_name,phone_number,date_of_birth,pin_supplied_by_limited_risk,address,accept_terms_of_use,email"]');?>                
						
             
                        
            
					</div>
				</div>
				</div>
 <?php } ?>
			
            
            
		</div>
	</div>
</section>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>