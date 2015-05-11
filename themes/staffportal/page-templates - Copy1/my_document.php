<?php
/**
 * Template Name: My Document
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
					My Documents
					<span class="pro4 pro4_1">
						&nbsp;
					</span>
				</div>
				<div class="das2_2 ped14">
					<div class="myd3">
						<div class="das2_3 das2_4">
							<div class="ped1">
								<div class="ped2">
									<div class="ped6 ped3">
										SIA Licence
									</div>
                                    
                                    <?php $sia_data = $wpdb->get_row("SELECT * FROM sia_licence WHERE sia_user_id = $user_id");?>
									<div class="ped6">
                                    
										<img src="<?php bloginfo('stylesheet_directory'); ?>/upload/<?php echo $sia_data->sia_licence;?>" />
                                        
									</div>
									<?php
									echo $succes_mes;
                                  if(isset($_POST['SIA_licence_copy'])) {
									$si_user_id = $user_id;  
								//echo "test";	
						  $wpdb->query("UPDATE sia_licence SET sia_licence = '' WHERE sia_user_id = $user_id"); 
						  	
								  }
								  ?>
									<div class="ped6 myd2">
									<form method="post" action="">
                                    	<input type="submit" name="SIA_licence_copy" value="delete" />
                                        </form>
									</div>
								</div>
							</div>
						</div>
						<div class="das2_3 myd1">
							<div class="ped2">
                             <?php 
							
							 if(isset($_POST['sia_lic_upload'])) {
								 
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
		
		if (file_exists("wp-content/themes/staffportal/upload/" . uniqid(). $_FILES["file"]["name"]))
      	{
      		//echo $_FILES["file"]["name"] . " already exists. ";
      	}
    	else
      	{
		 	$target_path_sia = uniqid().$_FILES["file"]["name"];
		  move_uploaded_file($_FILES["file"]["tmp_name"],"wp-content/themes/staffportal/upload/" .$target_path_sia);
		  //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
		  echo "Driving Licence Upload";
		  
       
		
		
		$si_user_id = $user_id;
		$si_copy_licence = $target_path_sia;
		//print_r($inst_email);
								 
								 
								 							 
					 $wpdb->query("UPDATE sia_licence SET sia_licence = '$si_copy_licence' WHERE sia_user_id = $user_id"); 
								
					}
					 }
							?>
								<form action="" method="post" enctype="multipart/form-data"> 
									<div class="ped6 ped3">
										SIA Licence Uploader:
									</div>
									<div class="ped2 ped6">
										<input type="file" name="file" id="file">
									</div>
									<div class="ped2 ped4">
										<p>
											Please choose a file above to upload as a profile image. images must be a jpg or png file under 2MB
										</p>
									</div>
									<div class="ped2">
										<div class="lol7_8 ped5">
											<input type="submit" value="Upload" name="sia_lic_upload">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="myd3">
						<div class="das2_3 das2_4">
							<div class="ped1">
								<div class="ped2">
									<div class="ped6 ped3">
										Driving Licence
									</div>
									<div class="ped6">
                                    <?php //print_r($sia_data->driving_licence); ?>
										<img src="<?php bloginfo('stylesheet_directory'); ?>/upload/<?php echo $sia_data->driving_licence;?>" />
									</div>
                                  <?php
                                  if(isset($_POST['driving_licence_delete'])) {
									$si_user_id = $user_id;  
								//echo "test";	
						  $wpdb->query("UPDATE sia_licence SET driving_licence = '' WHERE sia_user_id = $user_id"); 
						  	
								  }
								  ?>
									<div class="ped6 myd2">
									<form method="post" action="http://localhost/staffportal/my-document/">
                                    	<input type="submit" name="driving_licence_delete" value="delete" />
                                        </form>
									</div>
                                  
								</div>
							</div>
						</div>
						<div class="das2_3 myd1">
							<div class="ped2">
                            <?php 
							
							 if(isset($_POST['dvpload'])) {
								 
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
		
		if (file_exists("wp-content/themes/staffportal/upload/" . uniqid(). $_FILES["file"]["name"]))
      	{
      		//echo $_FILES["file"]["name"] . " already exists. ";
      	}
    	else
      	{
			$target_path_lic = uniqid().$_FILES["file"]["name"];
		  move_uploaded_file($_FILES["file"]["tmp_name"],"wp-content/themes/staffportal/upload/" .$target_path_lic);
		  //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
		  echo "Driving Licence Upload";
       
								 $si_user_id = $user_id;
								 $drive_licence_copy = $target_path_lic;
								 							 
					 $wpdb->query("UPDATE sia_licence SET driving_licence = '$drive_licence_copy' WHERE sia_user_id = $user_id"); 
								
					}
					 }
							?>
                            
								<form action="" method="post" enctype="multipart/form-data"> 
									<div class="ped6 ped3">
										Driving Licence Uploader:
									</div>
									<div class="ped2 ped6">
										<input type="file" name="file" id="file">
									</div>
									<div class="ped2 ped4">
										<p>
											Please choose a file above to upload as a profile image. images must be a jpg or png file under 2MB
										</p>
									</div>
									<div class="ped2">
										<div class="lol7_8 ped5">
											<input type="submit" value="Upload" name="dvpload">
										</div>
									</div>
								</form>
							</div>
                            
						</div>
					</div>
					<div class="myd3">
						<div class="das2_3 pro3 ped14">
							<div class="ped6 ped3">
								Documents from Limited Risk
							</div>
							<div class="ped6 ped3 myd4">
								<ul>
                                  <?php
			$args = array(
                 'post_type'=>'documents',
				 'posts_per_page'=>'3'
				 
           );
			global $more; 
			query_posts( $args ); 
			while (have_posts()) : the_post(); 
			?>
									<li>
										<a href="<?php echo get_field('file_upload'); ?>">
											<div class="myd5">
												<img src="<?php bloginfo('stylesheet_directory'); ?>/images/pdf.png" />
											</div>
											<div class="myd5 myd6">
												<?php the_title();?>
											</div>
										</a>
									</li>
                                     <?php endwhile;?>     
								
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php get_sidebar(); ?>
<?php get_footer(); ?>