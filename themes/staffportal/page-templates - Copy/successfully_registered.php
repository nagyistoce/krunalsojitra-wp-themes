<?php
/**
 * Template Name: Successfully Registered
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
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
            
     

<div class="lol4 lol7 lol9 cal_h1">
				<div class="lol7_2 lol12">
					<div class="lol7_3">
						<div class="lol12_1">
							<div class="lol12_2"></div>
							<div class="lol12_3">
								Success
							</div>
						</div>
						<div class="lol12_1">
							<div class="lol12_4">
								<p>
									An email with your password has now been sent to your email account provided! You can change this in 
									your dashboard once logged in
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="lol7_9">
					&nbsp;
				</div>
			</div>

  
  
			
            
            
		</div>
	</div>
</section>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>