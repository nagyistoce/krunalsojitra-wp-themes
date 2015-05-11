<?php
/**
 * Template Name: My Job
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
								EVENT NAME
							</div>
							<div class="evt3 evt3_3 evt4">
								Location 
							</div>
							<div class="evt3 evt3_1 evt4">
								Times
							</div>
						</div>
              <?php 
				if(isset($_POST['event_withdraw'])){
				$hidden_post_id = $_POST['hidden_post_id'];
				
				$delete_job = $wpdb->get_results("DELETE FROM my_job WHERE user_id = $user_id AND post_id = $hidden_post_id");
				//echo "DELETE FROM my_job WHERE user_id = $user_id AND post_id = $hidden_post_id";
				}
				$job = $wpdb->get_results("SELECT * FROM my_job WHERE user_id = $user_id");
				//print_r( $job);
				
				foreach($job as $jobdata){
					
					 
					 $job_date = date('d-m-Y', strtotime($jobdata->job_date));
					 $jobdata->job_event_name;
					 $jobdata->job_location;
					 $jobdata->job_time;
			 $permalink = get_permalink( $jobdata->post_id); 
			
			 
				?>
                
					
						<div class="evt2">
							<div class="evt3 evt3_1">
								<?php echo $job_date;?>
							</div>
							<div class="evt3 evt3_2">
								<a href="<?php echo $permalink;?>">
									<?php echo $jobdata->job_event_name;?>
								</a>
							</div>
							<div class="evt3 evt3_3">
								<?php echo $jobdata->job_location;?>
							</div>
							<div class="evt3 evt3_1">
								<?php echo $jobdata->job_time;?>
							</div>
							<div class="evt3_4">
								<a href="<?php echo $permalink;?>">
									View Event Details
								</a>
							</div>
							<div class="evt3_4 evt3_5">
                           <form name="event_delete" method="post" action="">
                            <input type="hidden" name="hidden_post_id" value="<?php echo $jobdata->post_id;?>" />
								<input type="submit" name="event_withdraw" value="Withdraw"  class="event_with_but"/>
                                </form>
                                </div>
                              
						</div>
					
                    
                   <?php }?>
                   </div>
					</div>
			</div>
            
			<?php get_sidebar(); ?>
<?php get_footer(); ?>