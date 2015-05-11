<?php
/**
 * Template Name: Upcoming Events Template
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

<section class="lor1">
	<div class="lol2">
		<div class="das1">
			<div class="das2">
				<div class="das2_1">
					Upcoming Events
				</div>
				<div class="das2_2 ped14">
                
                
                <div class="evt1">
						<div class="evt2">
							<div class="evt3 evt3_1 evt4">
								Date
							</div>
							<div class="evt3 evt3_2 evt4">
							  	EVENT NAME HERE
							</div>
							<div class="evt3 evt3_3 evt4">
								Location 
							</div>
							<div class="evt3 evt3_1 evt4">
								Times
							</div>
						</div>

                <?php
			$args = array(
                 'post_type'=>'upcoming_events',
				 
           );
			global $more; 
			query_posts( $args ); 
			while (have_posts()) : the_post(); 
			?>
					<div class="evt2">
							<div class="evt3 evt3_1">
                            
								<?php 
								$postdate = date('d-m-Y' , strtotime(get_field('date')));
								echo $postdate;?>
							</div>
							<div class="evt3 evt3_2">
								<a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
								</a>
							</div>
							<div class="evt3 evt3_3">
								 <?php echo get_field('location__city_name'); ?>
							</div>
							<div class="evt3 evt3_1">
								<?php echo get_field('times'); ?>
							</div>
							
						
						</div>
                    
                <?php endwhile;?>     
                    </div>
                    				
				</div>
			</div>
			<?php get_sidebar(); ?>
<?php get_footer(); ?>