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
		
		
$wpdb->query("INSERT INTO emergency_contact VALUES ('', $int_user_id, '$em_first_name', '$em_last_name', '$em_mobile_number', '$em_contact_number', '$em_relationship', '$em_address')"); 
 //echo "INSERT INTO emergency_contact VALUES ('', $inst_user_id, '$em_first_name', '$em_last_name', '$em_mobile_number', '$em_contact_number', '$em_relationship', '$em_address')"; 

}
 ?>

<section class="lor1">
	<div class="lol2">
		<div class="das1">
			<div class="das2">
				<form action="" method="post"> 
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
		<input type="text" name="first_name" placeholder="First Name"  required="required" value="<?php echo $em_data1->em_first_name;?>"/>
									</div>
									<div class="ped7">
		<input type="text" name="last_name" placeholder="Last Name" required="required" value="<?php echo $em_data1->em_last_name;?>"/>
									</div>
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Mobile Number *:
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
										<input type="text" name="mobile_number" placeholder="Mobile Number" required="required" value="<?php echo $em_data1->em_mobile_number;?>"/>
									</div>
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Contact Number: 
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
										<input type="text" name="contact_number" placeholder="Contact Number" required="required" value="<?php echo $em_data1->em_contact_number;?>"/>
									</div>
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Relationship *:
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
										<input type="text" name="relationship" placeholder="Relationship" required="required" value="<?php echo $em_data1->em_relationship;?>"/>
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
        							<textarea name="address" rows="7" cols="48" placeholder="Address" required="required"><?php echo $em_data1->em_address;?></textarea>                     
									
								</div>
							</div>
						</div>
					</div>
					
					<div class="das2_3 pro3 ped14">
						<div class="lol7_8 ped5 ped15">
							<input type="submit" value="submit" name="emerg_cont">
						</div>
					</div>
				</div>
				</form>
			</div>
            
            <?php
			$all_meta_for_user = get_user_meta($user_id);
		
		
		echo  $pr_fname = $all_meta_for_user['first_name'][0].'<br />';
		$date_of_birth = $all_meta_for_user['date_of_birth'][0];
 		echo $pr_dob = date('d-m-Y', strtotime($date_of_birth)).'<br />'; 
 		echo $pr_address = $all_meta_for_user['address'][0].'<br />';
		
			if($pr_fname == "" &&  $pr_dob == "" && $pr_address == ""  ){
				echo "All done".'<br />';
			}
			else{echo "Field khali che ".'<br />';}
			?>
              ***********30%
        <?php 
		echo  $pr_email = $all_meta_for_user['email'][0].'<br />';
		echo $pr_phone_number = $all_meta_for_user['phone_number'][0].'<br />';
		
		if($pr_phone_number == ""){
				echo "Field khali che ".'<br />';
			}
			else{echo "All done".'<br />';}
		
		
		?>
        
            **************20%
          <?php $sia_data = $wpdb->get_row("SELECT * FROM sia_licence WHERE sia_user_id = $user_id");
		  
		  	  echo $pr_sia_lic_ahd = $sia_data->select_licence.'<br />';
			  echo $pr_lic_ex = $sia_data->visa_expiry.'<br />';
			  echo $pr_lic_num = $sia_data->licence_number.'<br />';
			  echo $pr_lic_copy = $sia_data->sia_licence.'<br />';  
			  
			  if($pr_sia_lic_ahd == "" &&  $pr_lic_ex == "" && $pr_lic_num == "" && $pr_lic_copy == ""){
				echo "All done ".'<br />';
			}
			else{echo "Field khali che ".'<br />';}
			?>
			             ****************15%
            
			
			<?php $em_data1 = $wpdb->get_row("SELECT * FROM emergency_contact WHERE int_user_id = $user_id"); 
			
			  echo $pr_em_fname = $em_data1->em_first_name.'<br />';
			  echo $pr_em_lname = $em_data1->em_last_name.'<br />';
			  echo $pr_em_mob_num = $em_data1->em_mobile_number.'<br />';
			  echo $pr_em_cont_num = $em_data1->em_contact_number.'<br />';
			  echo $pr_em_relat = $em_data1->em_relationship.'<br />';
			  echo $pr_em_add = $em_data1->em_address.'<br />';
			  
      if($pr_em_fname == "" &&  $pr_em_lname == "" && $pr_em_mob_num == "" && $pr_em_cont_num == "" && $pr_em_relat == "" && $pr_em_add == ""){
				echo "All done ".'<br />';
			}
			else{echo "Field khali che ".'<br />';}
			  ?>
            **************15%
            
            
			<div class="das3">
				<div class="das2_2 das2_7 das2_8 das2_9">
					<div class="das2_10 pro1 pro2">
                    
                    <div class="mar" id="note_0" data-note="10"></div><!--wheel-->

						
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