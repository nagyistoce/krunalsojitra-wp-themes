<?php
/**
 * Template Name: SIA Licence 
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
 //$user_id = $current_user->ID; 
 
 $sia_data = $wpdb->get_row("SELECT * FROM sia_licence WHERE sia_user_id = $user_id");
//echo $sia_data->sia_user_id;
    if(isset($_POST['sia_submit'])) {
		
				
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
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
    		echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    	}
		
		if (file_exists("wp-content/themes/staffportal/upload/" . $_FILES["file"]["name"]))
      	{
      		//echo $_FILES["file"]["name"] . " already exists. ";
      	}
    	else
      	{
		 $target_path_sia = uniqid().$_FILES["file"]["name"];
		  move_uploaded_file($_FILES["file"]["tmp_name"],"wp-content/themes/staffportal/upload/" .$target_path_sia);
		  //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
		 // echo "Driving Licence Upload";
       
		
		
		$si_user_id = $user_id;
		$si_country = $_POST['country'];
		$dateformate = $_POST['sia_date_expire'];
		$si_date_expire = date('d-m-Y', strtotime($dateformate));
		$si_licence_number = $_POST['licence_number'];
		$si_copy_licence = $target_path_sia;
		//print_r("pritn".$si_date_expire);
		
		
		
$mylink = $wpdb->get_row("SELECT * FROM sia_licence WHERE sia_user_id = $user_id");
// $mylink->sia_user_id;
	if ($mylink != null) {
		
		
		
		
$wpdb->query("UPDATE sia_licence SET select_licence='$si_country',visa_expiry='$si_date_expire',licence_number='$si_licence_number',sia_licence='$si_copy_licence' WHERE sia_user_id = $user_id"); 


echo 	"UPDATE sia_licence SET select_licence='$si_country',visa_expiry='$si_date_expire',licence_number='$si_licence_number',sia_licence='$si_copy_licence' WHERE sia_user_id = $user_id";
	}
		else{	
 $wpdb->query("INSERT INTO sia_licence VALUES ('', $si_user_id, '$si_country', '$si_date_expire','$si_licence_number',  '$si_copy_licence','')"); 	
echo "INSERT INTO sia_licence VALUES ('', $si_user_id, '$si_country', '$si_date_expire','$si_licence_number',  '$si_copy_licence','')";
		}
		}
}	
 
 ?>

<section class="lor1">
  <div class="lol2">
    <div class="das1">
      <div class="das2">
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="das2_1"> SIA Licence Details <span class="pro4 pro4_1"> &nbsp; </span> </div>
          <div class="das2_2 ped14">
            <div class="das2_3 das2_4">
              <div class="ped1">
                <div class="ped2">
                  <div class="ped6 ped3"> Select SIA licence held *: </div>
                  <div class="ped6">
                    <div class="ped7 ped8">
                    <?php $y = $sia_data->select_licence;?>
                  
                  
                  <select name="country" class="mnp_sel" required="required">  
                  <?php 
				  //echo "<pre>";
				  $sia_data1 = $wpdb->get_results("SELECT * FROM countries");
				// print_r($sia_data1);
				?>
				<option value="">-- Select Type --</option>
				  
                  <?php foreach($sia_data1 as $country){ 
                  $a = $country->country; ?>
					 <option value="<?php  echo $a; ?>" <?php if($y == $a){echo "selected=selected";}?> ><?php  echo $a; ?></option>
                      
					  <?php }
				  
				  ?> 
				</select>
                    </div>
                  </div>
                </div>
                <div class="ped2">
                  <div class="ped6 ped3"> Licence Number: </div>
                  <div class="ped6">
                    <div class="ped7 ped8">
                      <input type="text" name="licence_number" placeholder="SIA Licence Number" required="required" value="<?php echo $sia_data->licence_number;  ?>"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="das2_3">
              <div class="ped2">
                <div class="ped6 ped3"> Date of Visa Expiry: *: </div>
                <div class="ped6">
                  <div class="ped7 ped11">
                    <input class="datepicker" type="text" name="sia_date_expire" placeholder="Date of Visa Expiry" required="required" / value="<?php echo $sia_data->visa_expiry;  ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="das2_3 ped3 pro3"> Copy of Licence: </div>
            <div class="das2_3 pro3 ped14">
            
            
              <div class="ped2 ped12">
                <input type="file" name="file" id="file">
              </div>
              
              
              <div class="ped2 ped4 ped12 ped13">
                <p> Please choose a file above to upload as a profile image. Images must be a jpg or png file under 2MB </p>
              </div>
              <div class="ped2 ped12">
                <div class="lol7_8 ped5">
                  <input type="submit" value="Upload" name="copy_licence">
                </div>
              </div>
            </div>
            <div class="das2_3 pro3 ped14">
              <div class="lol7_8 ped5 ped15">
                <input type="submit" value="SAVE CHANGES" name="sia_submit">
              </div>
            </div>
          </div>
        </form>
              </div>
   <div class="das3">
				<div class="das2_2 das2_7 das2_8 das2_9">
					<div class="das2_10 pro1 pro2">
						 <div class="mar" id="note_0" data-note="65"></div><!--wheel-->
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
