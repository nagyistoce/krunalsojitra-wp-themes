<?php
/**
 * Template Name: Personal Details Template
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

get_header()?>
<?php 


if(isset($_POST['update_details'])) {
	
	     $new_user_id = $user_id;
		 $new_fname = $_POST['f_name'];
		 $new_lname = $_POST['l_name'];
		 $new_contact = $_POST['contact_no'];
		 $new_email = $_POST['email'];
		 $new_address = $_POST['address']; 
		 
	        	update_user_meta($user_id, 'first_name', $new_fname);
				update_user_meta($user_id, 'last_name', $new_lname);
				update_user_meta($user_id, 'phone_number', $new_contact);
				update_user_meta($user_id, 'email', $new_email);
				update_user_meta($user_id, 'address', $new_address);
			   $pro_update_mes = "Your profile data Has been upadated";
			   
			   wp_redirect( get_bloginfo('wpurl').'/personal-details', 301 ); 
			   
		  } 
		 
		
if(isset($_POST['profile_pic_upload']))
{
		  $user_avtar = $_FILES["file"]["name"];
	
	
	
	$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["file"]["name"]);
		//print_r($temp);
		$extension = $temp;
		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 20000)
		&& in_array($extension, $allowedExts))
  
  		if ($_FILES["file"]["error"] > 0)
    	{
    		 "Return Code: " . $_FILES["file"]["error"] . "<br>";
    	}
		
		if (file_exists("wp-content/themes/staffportal/upload/" . $_FILES["file"]["name"]))
      	{
      		 $_FILES["file"]["name"] . " already exists. ";
      	}
    	else
      	{
		  move_uploaded_file($_FILES["file"]["tmp_name"],
		  "wp-content/themes/staffportal/upload/" . $_FILES["file"]["name"]);
		}

	
		
$cond_qury = $wpdb->get_row("SELECT * FROM user_pic WHERE user_id = $user_id");
	if (!empty($cond_qury)) { 
	
 $wpdb->query("UPDATE user_pic SET user_avtar='$user_avtar' WHERE user_id = $user_id"); 
 //echo "UPDATE user_pic SET user_avtar='$user_avtar' WHERE user_id = $user_id";
 $pro_pic_mes = "Your profile image has been updated";
	}
		else{
 $wpdb->query("INSERT INTO user_pic VALUES ('', $new_user_id, '$user_avtar')"); 
 //echo "INSERT INTO user_pic VALUES ('', $new_user_id, '$user_avtar')";
 $pro_pic_mes = "Your profile image has been uploaded";

	}
		
}
 ?>
 

<section class="lor1">
	<div class="lol2">
		<div class="das1">
			<div class="das2">
				<form action="" method="post" enctype="multipart/form-data"> 
				<div class="das2_1">
					Personal Details
					<span class="pro4 pro4_1">
						&nbsp;
					</span>
				</div>
				<div class="das2_2 ped14">
					<div class="das2_3 das2_4">
						<div class="ped1">
							<div class="ped2">
                            <?php $use_que = $wpdb->get_row("SELECT * FROM user_pic WHERE user_id = $user_id"); 
							//echo "SELECT * FROM user_pic WHERE user_id = $user_id"; echo $use_que->user_avtar;?>
                            
                             <?php if($use_que->user_avtar == ""){?>
										<img src="<?php bloginfo('stylesheet_directory'); ?>/images/no-image.jpg">                                        <?php }else{?>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/upload/<?php echo $use_que->user_avtar;?>" />
                            <?php } ?>
                            
							</div>
							<div class="ped2 ped6">
								<p>
									<span class="das2_6">
										Staff ID: 
									</span>
									<span>
										<?php get_userid(); ?>
									</span>
								</p>
							</div>
							<div class="ped2 ped6 ped3">
								Profile Image *:
							</div>
							<div class="ped2 ped6">
								<input type="file" name="file" id="file">
							</div>
							<div class="ped2 ped4">
								<p>
									Please choose a file above to upload as a profile image. Images must be a jpg or png file under 2MB
								</p>
							</div>
                            <p style="color:#228BB9;"><?php echo $pro_pic_mes;?></p>
							<div class="ped2">
								<div class="lol7_8 ped5">
									<input type="submit" value="Upload" name="profile_pic_upload">
								</div>
							</div>
						</div>
					</div>
					<div class="das2_3">
						<div class="ped2">
							<div class="ped6 ped3">
								Name *:
							</div>
							<div class="ped6">
								<div class="ped7">
									<input type="text" name="f_name" placeholder="First Name"  value="<?php echo $all_meta_for_user['first_name'][0]; ?>"/>
								</div>
								<div class="ped7">
									<input type="text" name="l_name" placeholder="Last Name" value="<?php echo $all_meta_for_user['last_name'][0]; ?>" />
								</div>
							</div>
						</div>
					
						<div class="ped2">
							<div class="ped6 ped3">
								Contact Number: 
							</div>
							<div class="ped6">
								<div class="ped7 ped8">
									<input type="text" name="contact_no" placeholder="Contact Number" value="<?php echo $all_meta_for_user['phone_number'][0]; ?>" />
								</div>
							</div>
						</div>
						<div class="ped2">
							<div class="ped6 ped3">
								Email *:
							</div>
							<div class="ped6">
								<div class="ped7 ped8">
									<input type="email" name="email" placeholder="Email" value="<?php echo $all_meta_for_user['email'][0]; ?>" />
								</div>
							</div>
						</div>
						<div class="ped2">
							<div class="ped6 ped3">
								Address *:
							</div>
							<div class="ped6">
								<div class="ped7 ped8">
									
                                    <textarea name="address" placeholder="Address" rows="5" cols="48"><?php echo $all_meta_for_user['address'][0]; ?></textarea>
								</div>
							</div>
						</div>
                       <p style="color:#228BB9;"><?php echo $pro_update_mes;?></p>
                        <div class="ped2">
								<div class="lol7_8 ped5">
									<input type="submit" value="Update" name="update_details">
								</div>
                            </div>
					</div>
				</div>
                 </form> 
                  
                   <?php 
				    
							$doc_form = $wpdb->get_row("SELECT * FROM document_details WHERE doc_user_id = $user_id");
							//print_r($doc_form);
							
							
							 if(isset($_POST['adtnl_prof_details'])) {
								 
								 
								$doc_user_id = $user_id;
								 $nationality = $_POST['nationality']; 
								 $workpermit_in_uk = $_POST['workpremit'];
								 $ethnicity = $_POST['ethnicity'];
								 $place_of_entry = $_POST['place_of_entry'];
								 $date_entry = $_POST['date_of_entry'];
								 $date_of_entry = date('d-m-Y', strtotime($date_entry));
								 $visa_expiry = $_POST['date_of_visa_expiry'];
								 $date_of_visa_expiry = date('d-m-Y', strtotime($visa_expiry));
								 $uk_licence = $_POST['uk_licence'];	
								 $licence_type = $_POST['licence_type'];
								 $licence_no = $_POST['licence_no'];
								 $no_of_points = $_POST['no_of_points'];
								 
	
	
	$qury_form = $wpdb->get_row("SELECT * FROM document_details WHERE doc_user_id = $user_id");
	if ($qury_form != null) {	
							 
	$wpdb->query("UPDATE document_details SET nationality = '$nationality', workpermit_in_uk = '$workpermit_in_uk', ethnicity = '$ethnicity', place_of_entry = '$place_of_entry', date_of_entry = '$date_of_entry', date_of_visa_expiry = '$date_of_visa_expiry', uk_licence = '$uk_licence', licence_type = '$licence_type', licence_no = '$licence_no', no_of_points = '$no_of_points' WHERE doc_user_id = $user_id"); 

//echo "UPDATE document_details SET nationality = '$nationality', workpermit_in_uk = '$workpermit_in_uk', ethnicity = '$ethnicity', place_of_entry = '$place_of_entry', date_of_entry = '$date_of_entry', date_of_visa_expiry = '$date_of_visa_expiry', uk_licence = '$uk_licence', licence_type = '$licence_type', licence_no = '$licence_no', no_of_points = '$no_of_points' WHERE doc_user_id = $user_id";
	$pro_lic_mes= "Your Profile data Has been uploaded";
	
	} else{	
								 
	$wpdb->query("INSERT INTO document_details VALUES ('', $doc_user_id, '$nationality', '$workpermit_in_uk','$ethnicity', '$place_of_entry','$date_of_entry','$date_of_visa_expiry','$uk_licence','$licence_type','$licence_no','$no_of_points')");
 
 //echo "INSERT INTO document_details VALUES ('', $doc_user_id, '$nationality', '$workpermit_in_uk','$ethnicity', '$place_of_entry','$date_of_entry','$date_of_visa_expiry','$uk_licence','$licence_type','$licence_no','$no_of_points')";	
	$pro_lic_mes= "Your Profile Image Has been uploaded"; 
	}	
	 wp_redirect( get_bloginfo('wpurl').'/personal-details', 301 );					 
}
?>								 
		
                <form action="" method="post" name="adtnl_prof_details_frm" id="adtnl_prof_details_frm">   
				<div class="das2_2 pro6 ped14">
					<div class="das2_3 pro3">
						Nationality and Work Permit
					</div>
					<div class="das2_3 das2_4">
						<div class="ped1">
                        	<div class="ped2">
								<div class="ped6 ped3">
									Do you have a permit to work in the UK *:
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
										<div class="ped9">
                    <?php $work_in_uk = $wpdb->get_row("SELECT workpermit_in_uk FROM document_details WHERE doc_user_id = $user_id");
					$wik = $work_in_uk->workpermit_in_uk; ?>
											<span>
						<input type="radio" name="workpremit" <?php if($wik == "0"){ echo 'checked';}?>  value="0" id="permit_uk_yes"/>
											</span>
                                           
											<span>
												Yes
											</span>
										</div>
										<div class="ped9">
											<span>
						 <input type="radio" name="workpremit" <?php if($wik == "1"){ echo 'checked';}?> value="1" id="permit_uk_no"/>
                                               
											</span>
											<span>
												No
											</span>
										</div>
                                        
									</div>
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Nationality *:
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
                                    <?php $nati = $doc_form->nationality ; ?>
										 <select name="nationality" class="mnp_sel" id="natina">  
                  <?php  $nly = $wpdb->get_results("SELECT * FROM countries"); ?>
				<option value="">-- Select Type --</option>
				  <?php foreach($nly as $country){ 
                  $n = $country->country; ?>
					 <option value="<?php  echo $n; ?>" <?php if($nati == $n){echo "selected=selected";}?> ><?php  echo $n; ?></option>
                    <?php } ?> 
				</select>
									</div>
								</div>
							</div>
						
							<div class="ped2">
								<div class="ped6 ped3">
									Ethnicity *:
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
                                    <?php $ethn = $doc_form->ethnicity ; ?>
										 <select name="ethnicity" class="mnp_sel" id="ethinict">  
                  <?php  $ethni = $wpdb->get_results("SELECT * FROM countries"); ?>
				<option value="">-- Select Type --</option>
				  <?php foreach($ethni as $country){ 
                  $et = $country->country; ?>
					 <option value="<?php  echo $et; ?>" <?php if($ethn == $et){echo "selected=selected";}?> ><?php  echo $et; ?></option>
                    <?php } ?> 
				</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="das2_3">
						<div class="ped1">
							<div class="ped2">
								<div class="ped6 ped3">
									Only if Not UK National
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Place of Entry: *:
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
		<input type="text" name="place_of_entry" placeholder="Place of Entry"  value="<?php echo $doc_form->place_of_entry; ?>"  required="required" id="plac_en"/>
									</div>
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Date of Entry: *:
								</div>
								<div class="ped6">
									
									<div class="ped7 ped11">
							 <input class="datepicker" type="text" name="date_of_entry" placeholder="Date of Entry" required="required" value="<?php echo $doc_form->date_of_entry; ?>" id="dat_of_en">
									</div>
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Date of Visa Expiry: *:
								</div>
								<div class="ped6">
										<div class="ped7 ped11">
                                        
					<input class="datepicker" type="text" name="date_of_visa_expiry" placeholder="Date of Visa Expiry" required="required" value="<?php echo $doc_form->date_of_visa_expiry; ?>" id="date_vi_ex"  >
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="das2_2 pro6 ped14">
					<div class="das2_3 pro3">
						Driving Licence
					</div>
					<div class="das2_3 das2_4">
						<div class="ped1">
							<div class="ped2">
								<div class="ped6 ped3">
									Do you have a UK  licence *:
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
										<div class="ped9">
                     <?php $ukl = $wpdb->get_row("SELECT uk_licence FROM document_details WHERE doc_user_id = $user_id");
					$uklic = $ukl->uk_licence; ?>
											<span>
						<input type="radio" name="uk_licence"  <?php if($uklic == "0"){ echo 'checked';}?> value="0" id="uk_lic_yes"/>
											</span>
											<span>
												Yes
											</span>
										</div>
										<div class="ped9">
											<span>
						<input type="radio" name="uk_licence" <?php if($uklic == "1"){ echo 'checked';}?> value="1" id="uk_lic_no"/>
											</span>
											<span>
												No
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Licence Type:
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
                                      <?php $lic = $doc_form->licence_type; ?>
										 <select name="licence_type" class="mnp_sel"  required="required" id="lic_ty">  
                       <?php  $data1 = $wpdb->get_results("SELECT * FROM licence_details"); ?>
				<option value="">-- Select Type --</option>
				  <?php foreach($data1 as $licence_type){ 
                  $li = $licence_type->licence_type; ?>
					 <option value="<?php  echo $li; ?>" <?php if($lic == $li){echo "selected=selected";}?> ><?php  echo $li; ?></option>
                    <?php } ?> 
				</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="das2_3">
						<div class="ped1">
							<div class="ped2">
								<div class="ped6 ped3">
									&nbsp;
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Licence Number:
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
		<input type="text" name="licence_no" placeholder="Licence Number"  value="<?php echo $doc_form->licence_no; ?>"  required="required" id="lic_numb"/>
									</div>
								</div>
							</div>
							<div class="ped2">
								<div class="ped6 ped3">
									Number of Points:
								</div>
								<div class="ped6">
									<div class="ped7 ped8">
									<?php $no_of = $doc_form->no_of_points ; ?>
										 <select name="no_of_points" class="mnp_sel"   required="required" id="num_of_poi">  
                  <?php  $data1 = $wpdb->get_results("SELECT * FROM licence_number_points"); ?>
				<option value="">-- Select Type --</option>
				  <?php foreach($data1 as $number_points){ 
                  $no = $number_points->number_points; ?>
					 <option value="<?php  echo $no; ?>" <?php if($no_of == $no){echo "selected=selected";}?> ><?php  echo $no; ?></option>
                    <?php } ?> 
				</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<p style="color:#228BB9;"><?php echo $pro_lic_mes;?></p>
					<div class="das2_3 pro3 ped14">
						<div class="lol7_8 ped5 ped15">
							<input type="submit" value="SAVE CHANGES" name="adtnl_prof_details">
						</div>
					</div>
				</div>
                                <script type="application/javascript">
										$("#permit_uk_no").on('click',function(){
											$("#natina,#ethinict,#plac_en,#dat_of_en,#date_vi_ex").attr('disabled','disabled');
											});
											$("#permit_uk_yes").on('click',function(){
											$("#natina,#ethinict,#plac_en,#dat_of_en,#date_vi_ex").prop('disabled',false);
											});
											
											$("#uk_lic_no").on('click',function(){
											$("#lic_ty,#lic_ty,#lic_numb,#num_of_poi").attr('disabled','disabled');
											});
											$("#uk_lic_yes").on('click',function(){
											$("#lic_ty,#lic_ty,#lic_numb,#num_of_poi").prop('disabled',false);
											});
										
										</script>

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