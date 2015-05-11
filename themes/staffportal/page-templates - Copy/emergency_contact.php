<?php
/**
 * Template Name: Emergency Contact 
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
 <?php
 $user_id = $current_user->ID; 
 $em_data1 = $wpdb->get_row("SELECT * FROM emergency_contact WHERE int_user_id = $user_id"); 
 
    if(isset($_POST['emerg_cont'])) {
		
		$int_user_id = $user_id;
		$em_first_name = $_POST['first_name'];
		$em_last_name = $_POST['last_name'];
		$em_mobile_number = $_POST['mobile_number'];
		$em_contact_number = $_POST['contact_number'];
		$em_relationship = $_POST['relationship'];
		$em_address = $_POST['address'];
		//print_r($inst_email);
		
$em_qury =  $wpdb->get_row("SELECT * FROM emergency_contact WHERE int_user_id = $user_id");
	if ($em_qury  != null) { 
	
 $wpdb->query("UPDATE emergency_contact SET em_first_name='$em_first_name', em_last_name='$em_last_name', em_mobile_number='$em_mobile_number', em_contact_number='$em_contact_number', em_relationship='$em_relationship', em_address='$em_address' WHERE int_user_id = $user_id"); 
  $update_mes = "Your data has been updated successfully.";
 //echo "UPDATE emergency_contact SET em_first_name='$em_first_name', em_last_name='$em_last_name', em_mobile_number='$em_mobile_number', em_contact_number='$em_contact_number', em_relationship='$em_relationship', em_address='$em_address' WHERE int_user_id = $user_id";
	}
		else{		
$wpdb->query("INSERT INTO emergency_contact VALUES ('', $int_user_id, '$em_first_name', '$em_last_name', '$em_mobile_number', '$em_contact_number', '$em_relationship', '$em_address')"); 
 //echo "INSERT INTO emergency_contact VALUES ('', $inst_user_id, '$em_first_name', '$em_last_name', '$em_mobile_number', '$em_contact_number', '$em_relationship', '$em_address')"; 
  $insert_mes = "Your data has been submitted successfully.";
		}
		//wp_redirect( 'http://localhost/staffportal/emergency-contact-details', 301 ); 
		wp_redirect( get_bloginfo('wpurl').'/emergency-contact-details', 301 );
}
 ?>

<section class="lor1">
	<div class="lol2">
		<div class="das1">
			<div class="das2">
				<form action="" method="post" id="emergen_Form"> 
				<div class="das2_1">
					Emergency Contact Details
					<span class="pro4 pro4_1">
						&nbsp;
					</span>
				</div>
				<div class="das2_2 ped14">
					<div class="das2_3 das2_4">
						<div class="ped1">
							<div class="ped2">
								<div class="ped6 ped3">
									Name *:
								</div>
								<div class="ped6">
									<div class="ped7">
		<input type="text" name="first_name" placeholder="First Name"   name="first_name" value="<?php echo $em_data1->em_first_name;?>"/>
									</div>
									<div class="ped7">
		<input type="text" name="last_name" placeholder="Last Name"  value="<?php echo $em_data1->em_last_name;?>"/>
									</div>
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Mobile Number *:
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
										<input type="text" name="mobile_number" placeholder="Mobile Number" value="<?php echo $em_data1->em_mobile_number;?>"/>
									</div>
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Contact Number: 
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
										<input type="text" name="contact_number" placeholder="Contact Number" value="<?php echo $em_data1->em_contact_number;?>"/>
									</div>
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Relationship *:
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
										<input type="text" name="relationship" placeholder="Relationship"value="<?php echo $em_data1->em_relationship;?>"/>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="das2_3">
						<div class="ped2">
							<div class="ped6 ped3">
								Address *:
							</div>
							<div class="ped6">
								<div class="ped7 ped8">
        							<textarea name="address" rows="7" cols="48" placeholder="Address" ><?php echo $em_data1->em_address;?></textarea>                     
									
								</div>
							</div>
						</div>
					</div>
                    
                    <div class="ped2 ped4">
								<p style="color:#2A97C7;">
									<?php  echo $insert_mes; echo $update_mes;?>
								</p>
							</div>
					
					<div class="das2_3 pro3 ped14">
						<div class="lol7_8 ped5 ped15">
							<input type="submit" value="submit" name="emerg_cont">
						</div>
					</div>
				</div>
				</form>
			</div>
  
          
            
			<div class="das3">
				<div class="das2_2 das2_7 das2_8 das2_9">
					<div class="das2_10 pro1 pro2">
                     <div class="mar" id="note_0" data-note="<?php echo $data_percentage;?>"></div><!--wheel-->

						
					</div>
					<div class="das2_11 pro1">
						<ul>
							<li>
							
									<span>
										<img src="<?php bloginfo('stylesheet_directory'); ?>/images/right.png">
									</span>
									<span>
										Complete online staff induction
									</span>
								
							</li>
							<li>
							
									<span>
										<img src="<?php bloginfo('stylesheet_directory'); ?>/images/right.png">
									</span>
									<span>
										Complete all required fields in your profile
									</span>
								
							</li>
							<li>
                            <span>
							<?php $upload_proof_check = $wpdb->get_row("SELECT * FROM sia_licence WHERE sia_user_id = $user_id"); $che_pro_sia_lic = $upload_proof_check->sia_licence; $che_pro_driv_lic = $upload_proof_check->driving_licence;
							
							if($che_pro_driv_lic == "" or $che_pro_sia_lic == ""){
							?><img src="<?php bloginfo('stylesheet_directory'); ?>/images/wrong.png">
							<?php } else{ ?>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/right.png">
							<?php }	?>
									
							</span>
									<span>
										Upload proof of qualifications (if applicable)
									</span>
								
							</li>
							<li>
							
									<span>
										 <?php $phnu_y = $all_meta_for_user['phone_number'][0]; if($phnu_y == ""){?>
										<img src="<?php echo bloginfo("stylesheet_directory"); ?>/images/wrong.png">
                                        <?php } else{ ?> 
										<img src="<?php echo bloginfo("stylesheet_directory"); ?>/images/right.png">
										<?php }?>
									</span>
									<span>
										Provide contact number
									</span>
								
							</li>
							<li>
								
									<span>
									<?php $emai_y = $all_meta_for_user['email'][0]; if($emai_y == ""){?>
										<img src="<?php echo bloginfo("stylesheet_directory"); ?>/images/wrong.png">
                                        <?php } else{ ?> 
										<img src="<?php echo bloginfo("stylesheet_directory"); ?>/images/right.png">
										<?php }?>
									</span>
									<span>
										Provide email address
									</span>
								
							</li>
						</ul>
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
				<div class="das3_1">
					<div class="das3_2">
						<div class="das3_2_1">
							Notifications
						</div>
						<div class="das3_2_2">
							06
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

<?php get_footer(); ?>