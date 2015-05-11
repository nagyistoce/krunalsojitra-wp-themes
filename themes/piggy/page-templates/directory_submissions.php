<?php
/**
 * Template Name: Directory Submissions Template
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

get_header(); ?>

<div class="navi">
  <div class="navi1">
    <div class="navi2">
     <?php if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?>   
    </div>
  </div>
</div>  

 <?php
			$args = array(
                 'post_type'=>'dire_subm'
            );

            $i = 1;
			global $more; 

			query_posts( $args ); 

			while (have_posts()) : the_post(); 

			$more = 0;

			?>
            
               
                 
                     
                       
             

<div class="navi in_con dism1">
	<div class="navi1">
		<div class="in_con1">
			<div class="in_con2">
				<h1>
					Directory Submissions
				</h1>
			</div>
		</div>
		<div class="in_con1">
			<div class="dism2">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/directory_submission.png" />
			</div>
			<div class="dism3">
				<p><?php echo get_field('descriptiom'); ?></p>
			</div>
		</div>
	</div>
</div>
<div class="navi in_con">
	<div class="navi1">
		<div class="in_con1">
			<div class="dism4">
				<h3>
					Why us?
				</h3>
				<p><?php echo get_field('why_us'); ?></p>
			</div>
		</div>
		<div class="in_con1">
			<div class="dism5">
				<div class="dism5_1">
					<a href="<?php echo bloginfo('wpurl');?>/general-traffic-package">
						<i>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/directory_cart.png" />
						</i>
						<div class="dism5_2">
							<p>
								Buy Directory Submission Now!
							</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="navi in_con dism1">
	<div class="navi1">
		<div class="in_con1">
			<div class="dism6">
				<div class="dism6_1">
					<h2>
						What we will do for you:
					</h2>
					<div class="dism6_1_1">
						 <?php echo get_field('what_we_will_do_for_you'); ?>
					</div>
				</div>
				<div class="dism6_1 dism6_2">
					<h2>
						What are the benefits of buying traffic?
					</h2>
					<div class="dism6_1_1">
						<?php echo get_field('benefits_of_buying_traffic'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="navi in_con">
	<div class="navi1">
		<div class="in_con1">
			<div class="dism7">
				<div class="dism7_1">
					<a href="<?php echo bloginfo('wpurl');?>/general-traffic-package">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/question.png" />
						Questions? Check our frequently asked questions about directory submissions.
					</a>
				</div>
				<div class="dism7_1 dism7_2 kl">
					 <?php echo get_field('leave_your_traffic'); ?>
				</div>
			</div>
		</div>
		<div class="in_con1">
			<div class="dism5">
				<div class="dism5_1">
					<a href="<?php echo bloginfo('wpurl');?>/general-traffic-package">
						<i>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/directory_cart.png" />
						</i>
						<div class="dism5_2">
							<p>
								Order Directory Submission Now!
							</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
 <? endwhile;?> 
<?php get_footer(); ?>
