<?php
/**
 * Template Name: Website Traffic Template
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
                 'post_type'=>'website_traffic'
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
					<?php the_title();?>
				</h1>
			</div>
		</div>
        
		<div class="in_con1">
			<div class="dism2">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/directory_submission.png" />
			</div>
			<div class="dism3">
            <?php echo get_field('description'); ?>
						</div>
		</div>
	</div>
</div>
  <div class="navi in_con">
	<div class="navi1">
		<div class="in_con1">
			<div class="dism4">
				 <?php echo get_field('descri1'); ?>
				<h3>
					 <?php echo get_field('title'); ?>
				</h3>
				 <?php echo get_field('descri2'); ?>
				<h3>
					 <?php echo get_field('title1'); ?>
				</h3>
				 <?php echo get_field('descri3'); ?>
			</div>
		</div>
		<div class="in_con1">
			<div class="wet">
				<div class="wet1">
					<div class="wet2">
						<a href="#">
							General Traffic
						</a>
					</div>
					<div class="wet2">
						<a href="#">
							Buy Adult Traffic
						</a>
					</div>
					<div class="wet2">
						<a href="#">
							Buy Casino Traffic
						</a>
					</div>
				</div>
			</div>
			<div class="wet">
				<div class="wet3">
					<div class="sel1">
						<p>General Niches</p>
							<select class="selectpicker">
								<option>test</option>
								<option>test 2</option>
								<option>test 3</option>
							</select>
					</div>
					<div class="sel1">
						<p>Adult Niches</p>
							<select class="selectpicker">
								<option>test</option>
								<option>test 2</option>
								<option>test 3</option>
							</select>
					</div>
					<div class="sel1">
						<p>Casino Niches</p>
							<select class="selectpicker">
								<option>test</option>
								<option>test 2</option>
								<option>test 3</option>
							</select>
					</div>
					<div class="sel1">
						<p>Countries</p>
							<input type="text" name="country" placeholder="Countries" />
					</div>
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
						What are the benefits of buying traffic?
					</h2>
					<div class="dism6_1_1">
						<?php echo get_field('the_benefits'); ?>
					</div>
				</div>
				<div class="dism6_1 dism6_2">
					<h2>
						What are the benefits of buying traffic?
					</h2>
					<div class="dism6_1_1">
						<?php echo get_field('buying_traffic'); ?>
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
					<a href="#">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/question.png" />
						Questions? Check our frequently asked questions about directory submissions.
					</a>
				</div>
				<div class="dism7_1 dism7_2">
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
