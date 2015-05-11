<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<?php
$current_user = wp_get_current_user();
$user_id = $current_user->ID; 
$all_meta_for_user = get_user_meta( $user_id );

$prof_noti_count = 0;
$event_count = 0;
?>			
	
	
	<div class="das3">
				<div class="das3_1">
					<div class="das3_2">
						<div class="das3_2_1">
							Notifications
						</div>
						<div class="das3_2_2">
							<!--total notification goes here--> 
						</div>
					</div>
					<div class="das3_2 das3_3">
						<div class="das3_3_1">
                        
                        <!-- profile % condition starts-->
                         <div class="das3_3_2">	
                            
                        <?php 
						//condition1
						 $pr_fname = $all_meta_for_user['first_name'][0];
		$date_of_birth = $all_meta_for_user['date_of_birth'][0];
 		 $date_of_birth = date('d-m-Y', strtotime($date_of_birth)); 
 		 $pr_address = $all_meta_for_user['address'][0];
			if(empty($pr_fname) || empty($date_of_birth) || empty($pr_address)){				
			?>
								<!-- single row starts-->
                                <div class="das3_3_3">
									15th October 2013
								</div>
								<div class="das3_3_3 das3_3_4">
									<div class="das3_3_5">
										&nbsp;
									</div>
									<div class="das3_3_5 das3_3_6">
										You must complete your profile to continue using this site
									</div>
									<div class="das3_3_5 das3_3_7">
										<div class="das3_3_8">
											<a href="<?php echo bloginfo('wpurl'); ?>/personal-details/">
												View
											</a>
										</div>
									</div>   
								</div><!-- single row endss-->
                                 <?php $prof_noti_count++; }
									//echo "Prof noti. count after condtn 1:<br>".$prof_noti_count;
									?>
                                    
                                    
                                    
                                     <?php  
					$pr_email = $all_meta_for_user['email'][0];
		
		 $pr_phone_number = $all_meta_for_user['phone_number'][0];
			 if (empty($pr_email) || empty($pr_phone_number)){
		
							
			?>
								<!-- single row starts-->
                                <div class="das3_3_3">
									15th October 2013
								</div>
								<div class="das3_3_3 das3_3_4">
									<div class="das3_3_5">
										&nbsp;
									</div>
									<div class="das3_3_5 das3_3_6">
										You must complete your profile to continue using this site
									</div>
									<div class="das3_3_5 das3_3_7">
										<div class="das3_3_8">
											<a href="#">
												View
											</a>
										</div>
									</div>   
								</div><!-- single row endss-->
                                 <?php $prof_noti_count++; }
									//echo "Prof noti. count after condtn 2:<br>".$prof_noti_count;
									?>
                                    
                                   
                                    <?php //condition 3 
									$sia_data = $wpdb->get_row("SELECT * FROM sia_licence WHERE sia_user_id = $user_id");
		  
		  	   $pr_sia_lic_ahd = $sia_data->select_licence;
			  
			   $pr_lic_ex = $sia_data->visa_expiry;
			  
			   $pr_lic_num = $sia_data->licence_number;
			  
			   $pr_lic_copy = $sia_data->sia_licence; 
			   
			   $pr_drv_lic = $sia_data->driving_licence; 
			  
			   if(empty($pr_sia_lic_ahd) ||  empty($pr_lic_ex) || empty($pr_lic_num) || empty( $pr_lic_copy) || empty( $pr_drv_lic)){	
			?>
								<!-- single row starts-->
                                <div class="das3_3_3">
									15th October 2013
								</div>
								<div class="das3_3_3 das3_3_4">
									<div class="das3_3_5">
										&nbsp;
									</div>
									<div class="das3_3_5 das3_3_6">
										You must complete your profile to continue using this site
									</div>
									<div class="das3_3_5 das3_3_7">
										<div class="das3_3_8">
											<a href="#">
												View
											</a>
										</div>
									</div>   
								</div><!-- single row endss-->
                                 <?php $prof_noti_count++; }
									//echo "Prof noti. count after condtn 3:<br>".$prof_noti_count;
									?> 
                                    
                                    
                                    
                                 <?php 
								 //condition4
								 $em_data1 = $wpdb->get_row("SELECT * FROM emergency_contact WHERE int_user_id = $user_id"); 
			
			   $pr_em_fname = $em_data1->em_first_name;
			   
			   $pr_em_lname = $em_data1->em_last_name;
			   
			   $pr_em_mob_num = $em_data1->em_mobile_number;
			   
			   $pr_em_cont_num = $em_data1->em_contact_number;
			   
			   $pr_em_relat = $em_data1->em_relationship;
			   
			   $pr_em_add = $em_data1->em_address;
			  
      if(empty($pr_em_fname) ||  empty($pr_em_lname) || empty($pr_em_mob_num) || empty($pr_em_cont_num) || empty($pr_em_relat) || empty($pr_em_add)){				
			?>
								<!-- single row starts-->
                                <div class="das3_3_3">
									15th October 2013
								</div>
								<div class="das3_3_3 das3_3_4">
									<div class="das3_3_5">
										&nbsp;
									</div>
									<div class="das3_3_5 das3_3_6">
										You must complete your profile to continue using this site
									</div>
									<div class="das3_3_5 das3_3_7">
										<div class="das3_3_8">
											<a href="#">
												View
											</a>
										</div>
									</div>   
								</div><!-- single row endss-->
                                 <?php $prof_noti_count++; }
									//echo "Prof noti. count after condtn 4:<br>".$prof_noti_count;
									?>
                                    
								
							</div> <!-- profile % condition ENDS-->
                            
                               <?php 
							$notification_count = $prof_noti_count + $event_count;
							
							?>
                            <input type="hidden" value="<?php echo $notification_count; ?>" name="notification_count" id="notification_count"  />
<script>
$(function(){
	var total_noti = document.getElementById("notification_count").value;
	$(".das3_2_2").html(+total_noti);
});
</script>  
                            <!--dynamic event data starts-->
                            
                            <?php
                            $job = $wpdb->get_results("SELECT * FROM my_job WHERE user_id = $user_id ORDER BY job_date DESC");
			//echo "SELECT * FROM my_job WHERE user_id = $user_id ORDER BY job_date DESC";

			$job_count = count($job);
			$i = 0;
			foreach($job as $jobdata){
			if($i==3)  break;
				//$job_date = date('d-m-Y', strtotime($jobdata->job_date));
				 $jobdata->job_date;
				 $jobdata->job_event_name;
				 $jobdata->job_location;
				 $jobdata->job_time;
				 $permalink = get_permalink( $jobdata->post_id); 
			
                             ?>
							<div class="das3_3_2">
								<div class="das3_3_3">
									<?php echo date('d-m-Y', strtotime($job[$i]->job_date)); ?>
								</div>
                                
								<div class="das3_3_3 das3_3_4">
									<div class="das3_3_5 das3_3_9">
										&nbsp;	
									</div>
									<div class="das3_3_5 das3_3_6">
										Accepted to work on <?php echo date('d-m-Y', strtotime($job[$i]->job_date)); ?> at <?php echo $job[$i]->job_location; ?> <?php echo $job[$i]->job_time; ?>
									</div>
									<div class="das3_3_5 das3_3_7">
										<div class="das3_3_8 das3_3_10">
											<a href="<?php echo $permalink; ?>">
												Ok
											</a>
										</div>
									</div>
								</div><!--single event data-->
								
							</div>
                            
							<!-- event list for 1 date ended(loop is used)-->
							<?php $i++;	} //foreach ends ?>
						</div>
					</div>
				</div>
				<div class="das3_1 das3_4">
					<div class="das3_2">
						<div class="das3_2_1">
							Menu
						</div>
					</div>
					<div class="das3_2 das3_3">
						<div class="das3_3_1">
							<nav class="das3_4_1">
								<?php if ( is_active_sidebar( 'sidebarmenu' ) ) : ?>
			<?php dynamic_sidebar( 'sidebarmenu' ); ?>
			<?php endif; ?>
							</nav>
						</div>
					</div>
				</div>
			</div>
		<div class="das4">
				<div class="das4_1 das4_3">
					<div class="lol4_2 das4_2">
						<span class="lol4_3">
							Latest News
						</span>
					</div>
				</div>
				<div class="das4_1">
					<article class="das4_4">
						<ul>
                          <?php
			$args = array(
			'post_type'=> 'post',
            /*'category'  => '12',*/
              'orderby' => 'post_date',
			  'posts_per_page'=>'3'
			/*'paged' => get_query_var('paged')*/
           );
            $i = 1;
			global $more; 
			query_posts( $args ); 
			while (have_posts()) : the_post(); 
			$more = 0;
		?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<figure>
										<img src="<?php echo $feat_image = wp_get_attachment_url( get_post_thumbnail_id() );?>" />
									</figure>
									<h2>
										<?php the_title();?>
									</h2>
								</a>
							</li>
                            <?php endwhile;?>
							
						</ul>
					</article>
				</div>
			</div>

		</div>
	</div>
</section>