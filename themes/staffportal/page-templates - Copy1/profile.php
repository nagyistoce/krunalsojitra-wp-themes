<?php
/**
 * Template Name: Profile Template
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
	   $email_id = $current_user->user_email;
			
  $all_meta_for_user = get_user_meta( $user_id );
 //print_r($all_meta_for_user);
  $date_of_birth = $all_meta_for_user['date_of_birth'][0];
  $phone_number = $all_meta_for_user['phone_number'][0];
   $address = $all_meta_for_user['address'][0];
    $wp_user_avatar = $all_meta_for_user['wp_user_avatar'][0];
?>

                <section class="lor1">
	<div class="lol2">
		<div class="das1">
			<div class="das2">
				<div class="das2_1">
					My Profile
				</div>
				<div class="das2_2">
					<div class="das2_3 pro3">
						Personal Details
						<span class="pro4">
							&nbsp;
						</span>
					</div>
					<div class="das2_3 das2_4">
						 <?php $use_que = $wpdb->get_row("SELECT * FROM User_pic WHERE user_id = $user_id");?>
							<img src="<?php bloginfo('stylesheet_directory'); ?>/upload/<?php echo $use_que->user_avtar;?>" />
						<div class="das2_2 lol7_9 das2_7 set1">
							<a href="<?php echo get_site_url(); ?>/personal-details/">
								Edit details
							</a>
						</div>
					</div>
					<div class="das2_3">
						<p>
							<span class="das2_5">
								<?php echo $current_user->user_nicename; ?>
							</span>
						</p>
						<p>
							<span class="das2_6">
								Staff ID: 
							</span>
                
                        	<span>
								<?php get_userid(); ?>
							</span>
						</p>
						<p>
							<span class="das2_6">
								DoB: 
							</span>
							<span>
								<?php echo date('d-m-Y', strtotime($date_of_birth)); ?>
							</span>
						</p>
						<p>
							<span class="das2_6">
								Email:
							</span>
							<span>
								<a href="<?php echo $current_user->user_email; ?>"><?php echo $current_user->user_email; ?></a>
							</span>
						</p>
						<p>
							<span class="das2_6">
								Phone: 
							</span>
							<span>
								<?php echo $all_meta_for_user['phone_number'][0]; ?>
							</span>
						</p>
						<p>
							<span class="das2_6 das2_6_1">
								Address: 
							</span>
							<span class="das2_6_2">
								<?php echo $all_meta_for_user['address'][0]; ?>
							</span>
						</p>
					</div>
				</div>
                 <?php $sia_data = $wpdb->get_row("SELECT * FROM sia_licence WHERE sia_user_id = $user_id"); 	?>
				<div class="das2_2 pro6">
					<div class="das2_3 pro3">
						SIA Licence Details
						
							&nbsp;
						</span>
					</div>
					<div class="das2_3 pro5">
						<p>
							<span class="das2_6">
								SIA Licence Held: 
							</span>
							<span>
								<?php echo $sia_data->select_licence;  ?>
							</span>
						</p>
						<p>
							<span class="das2_6">
								Expiry Date
							</span>
							<span>
								<?php echo $sia_data->visa_expiry;  ?>
							</span>
						</p>
						<p>
							<span class="das2_6">
								Licence Number:
							</span>
							<span>
								<?php echo $sia_data->licence_number;  ?>
							</span>
						</p>
						<p>
							<span class="das2_6">
								Copy Uploaded:
							</span>
							<span>
								<?php $nocopy = $sia_data->sia_licence; 
								
								if($nocopy == ''){
									echo "No";
									
								}
								else{
									echo "yes";
								}
																				
								?>
							</span>
						</p>
					</div>
					<div class="das2_2 lol7_9 das2_7 set1">
						<a href="<?php echo get_site_url(); ?>/sia-licence-details">
							Edit details
						</a>
					</div>
				</div>
                
          <?php $em_data = $wpdb->get_row("SELECT * FROM emergency_contact WHERE int_user_id = $user_id"); 	?> 
				<div class="das2_2 pro6">
					<div class="das2_3 pro3">
						Emergency Contact Details
						
							&nbsp;
                            
						</span>
					</div>
					<div class="das2_3 pro5">
						<p>
							<span class="das2_6">
								Name: 
							</span>
							<span>
								<?php echo $em_data->em_first_name;  ?>
							</span>
						</p>
						<p>
							<span class="das2_6">
								Phone Number
							</span>
							<span>
								<?php echo $em_data->em_contact_number;  ?>
							</span>
						</p>
					</div>
					<div class="das2_2 lol7_9 das2_7 set1">
						<a href="<?php echo get_site_url(); ?>/emergency-contact-details/" id="edit_em_details" >
							Edit details
						</a>
					</div>

				</div>
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
  


<script type="text/javascript">
$(document).ready(function() {
		
	
		
		var id = '#dialog';
	
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		//transition effect		
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		//Set the popup window to center
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		//transition effect
		$(id).fadeIn(2000); 	
	
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	//if mask is clicked
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});		
	
});

</script>
<style type="text/css">
#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}  
#boxes .window {
  position:absolute;
  z-index:9999;
  padding:20px;
}
#boxes #dialog {
  width:375px; 
  height:203px;
  padding:10px;
  background-color:#ffffff;
}
div{ width:100%;}
</style>
<?php $today_date = date('d-m-Y');
$sia_data->visa_expiry.'<br>';

$startTimeStamp = strtotime($today_date);
 $endTimeStamp = strtotime($sia_data->visa_expiry);

$timeDiff = $endTimeStamp - $startTimeStamp;

 $numberDays = $timeDiff/86400;  // 86400 seconds in one day

if(($numberDays) <= 7 && $endTimeStamp != '')
{
		?>
    <div id="boxes">
<div class="window">
<div class="pou2">
		<div class="pou3">
			<div class="pou4">
				<h3>
					SIA Licence Expired
				</h3>
				<p>
					Thanks for applying to work as (position applied for). Unfortunately our system shows that your SIA licence has or
					will expire by the time of this event. If you have a renewed SIA licence please add it to your profile.
				</p>
				<a href="#" class="close">Close it</a>
			</div>
		</div>
	</div>

</div>
<!-- Mask to cover the whole screen -->
<div style="width: 1478px; height: 602px; display: none; opacity: 0.8;" id="mask"></div>

</div>
<?php
}?>


<?php get_footer(); ?>