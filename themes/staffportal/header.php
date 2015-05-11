<?php
ob_start();
global $current_user;
global  $user_id;
$user_id = $current_user->ID; 
global  $all_meta_for_user;
$all_meta_for_user = get_user_meta( $user_id );
global $data_percentage;
global $data_percentage1;
global $data_percentage2;
global $data_percentage3;
global $data_percentage4;
global $notification_count;

/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

<link href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="<?php bloginfo('stylesheet_directory'); ?>/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.validate.js"></script>

<script>window.jQuery || document.write('<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.min.js">\x3C/script>')</script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/main.js"></script>
<!--[if gte IE 9]>
  <style type="text/css">
    .head, .lol7_8 input, .head4_2 {
       filter: none;
    }
  </style>
<![endif]-->
<script type="text/javascript">
$(function(){
	$('select.mnp_sel').customSelect();
	
});
</script>
<script type="text/javascript">
				$(function() {
			$(".datepicker").datepicker();
			
		});
	</script>
<link type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-ui.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/time.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.bxslider.min.js"></script>
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/jquery.bxslider.css" rel="stylesheet">
<script>
$(document).ready(function(){
	
				$( "#pass_reset" ).validate({
			  rules: {
				pass1: "required",
				pass2: {
				  equalTo: "#pass1"
						}
					 },
				messages: {
						pass2: {
							equalTo: "Password does not match"
						}
					}	 
		});
	
	 $("#emergen_Form").validate({	
			 rules: {
				 first_name: "required",
				 last_name: "required",
				 mobile_number: "mobilenumber",
				 relationship: "required",
				 address: "required"
			 },
			
		
			
	});
	 $("#adtnl_prof_details_frm").validate({	
			 rules: {
				 nationality: "required",
				 ethnicity: "required",
				 place_of_entry: "required",
				 date_of_entry: "required",
				  date_of_visa_expiry: "required",
				   licence_type: "required",
				    licence_no: "required",
				no_of_points: "required",
				 
			 },
			
		
			
	});
	$("#sia_from").validate({	
			 rules: {
				 country: "required",
				 licence_number: "required",
				 sia_date_expire: "required",
				 file: "required",
				 
			 },
			
		
			
	});
	
	$("#registerform").validate({	
			 rules: {
				 user_login: "required",
				 last_name: "required",
				 user_email: {
					 required: true,
				     email: true
				     },
				 phone_number: "customphone",
				 date_of_birth_day: {
									required: true,
									 range: [1, 31]
																
								},
				 date_of_birth_mnth: {
									required: true,
									 range: [1, 12]
									
								},
				 date_of_birth_yr: {
									required: true,
									range: [1965, 2222],
									minlength: 4
									
								},
					pin_month: {
						     required:true,
							 minlength: 4,
							 maxlength: 4
					},
					pin_yr: {
						     required:true,
							  minlength: 4,
							  maxlength: 4
					},
				  accept_terms_of_use: "required",
				  
			 }
			
	});
	
	$('#pin_month').blur(function(){
		if($('#pin_month').val() != 'LR13')
			{
				$('.invali_pin').html('Please enter valid pin');
				return false;
			}
	});
	$('#pin_yr').blur(function(){
		if($('#pin_yr').val() != '46sp')
			{
				$('.invali_pin_yr').html('Please enter valid pin');
				return false;
			}
	});
		
	
	$.validator.addMethod('customphone', function (value, element) {
    return this.optional(element) || /^(\(?(0|\+44)[1-9]{1}\d{1,4}?\)?\s?\d{3,4}\s?\d{3,4})$/.test(value);
}, "<p>This field is required.<p>");

$.validator.addMethod('mobilenumber', function (value, element) {
    return this.optional(element) || /^(\(?(0|\+44)[1-9]{1}\d{1,4}?\)?\s?\d{3,4}\s?\d{3,4})$/.test(value);
}, "<p>Please Mobile Number.<p>");


  });
	
	
</script>

<style type="text/css">
input.error {
    border: 1px dotted #2996C5;
}
.error, .invali_pin, .invali_pin_yr{
    color:#2996C5;
    font-size: 14px;
}

</style>
</head>

<body>
<header class="head">
	<div class="head1">
		<div class="head2">
			<div class="head3">
					<?php $email_id = $current_user->user_email;
						  $test_result = $wpdb->get_row("SELECT  `score` FROM  `wp_plugin_slickquiz_scores` WHERE  `createdBy` =  '$user_id' ORDER BY `id` DESC LIMIT 1");
						$pos1 = explode("/",$test_result->score);
						$pos1_trimmed1 = trim($pos1[0]);
						
						
						if ( is_user_logged_in() && $pos1_trimmed1 >= 16 ) {
						?>
                    <a href="<?php echo bloginfo('wpurl'); ?>/my-profile">
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" />
                            <span>
                                Limited Risk - Staff Portal
                            </span>
                        </a>
                        
                        
                        <?php } elseif(is_user_logged_in() && $pos1_trimmed1 < 16){?> 
                        
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" />
					<span>
						Limited Risk - Staff Portal
					</span>
				</a>
				<?php } else{?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" />
					<span>
						Limited Risk - Staff Portal
					</span>
				</a>
                
                <?php }?>
			</div>
			<div class="head4">
				<?php
    $current_user = wp_get_current_user();
	
	//echo '<pre>';
	//print_r($current_user);echo '</pre>'; exit;
?>
				<div class="head4_1">
					Welcome <span><?php echo $current_user->user_login; ?></span>
				</div>
				<div class="head4_2">
					 <?php
if ( is_user_logged_in() ) {
   ?>
   <a href="<?php echo wp_logout_url( 'http://localhost/staffportal' ); ?>" title="Logout">Logout</a>
  
   <?php
} else {
   ?> <a href="<?php echo bloginfo('wpurl'); ?>">Sign in</a> 
          <?php
}
	
?>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- wheel php code start-->

<?php
			
		  $pr_fname = $all_meta_for_user['first_name'][0];
		$date_of_birth = $all_meta_for_user['date_of_birth'][0];
 		 $date_of_birth = date('d-m-Y', strtotime($date_of_birth)); 
 		 $pr_address = $all_meta_for_user['address'][0];
			if(!empty($pr_fname) && !empty($date_of_birth) && !empty($pr_address)){
			
			 $data_percentage1 = "30";}
			 //30% completed
			
			 
		   $pr_email = $all_meta_for_user['email'][0];
		
		 $pr_phone_number = $all_meta_for_user['phone_number'][0];
		
		
		if (!empty($pr_email) && !empty($pr_phone_number)){
							 $data_percentage2 = "20";
			}
			
		//20% completed
		
		 $sia_data = $wpdb->get_row("SELECT * FROM sia_licence WHERE sia_user_id = $user_id");
		  
		  	   $pr_sia_lic_ahd = $sia_data->select_licence;
			  
			   $pr_lic_ex = $sia_data->visa_expiry;
			  
			   $pr_lic_num = $sia_data->licence_number;
			  
			   $pr_lic_copy = $sia_data->sia_licence;  
			  
			  if(!empty($pr_sia_lic_ahd) &&  !empty($pr_lic_ex) && !empty($pr_lic_num) &&!empty( $pr_lic_copy)){
				
				 $data_percentage3 = "15";
			}//15% completed
			 
			 $em_data1 = $wpdb->get_row("SELECT * FROM emergency_contact WHERE int_user_id = $user_id"); 
			
			   $pr_em_fname = $em_data1->em_first_name;
			   
			   $pr_em_lname = $em_data1->em_last_name;
			   
			   $pr_em_mob_num = $em_data1->em_mobile_number;
			   
			   $pr_em_cont_num = $em_data1->em_contact_number;
			   
			   $pr_em_relat = $em_data1->em_relationship;
			   
			   $pr_em_add = $em_data1->em_address;
			  
      if(!empty($pr_em_fname) &&  !empty($pr_em_lname) && !empty($pr_em_mob_num) && !empty($pr_em_cont_num) && !empty($pr_em_relat) && !empty($pr_em_add)){
				 $data_percentage4 = "15";
			}
			//15% completed
			
			$email_id = $current_user->user_email;
				  $test_result = $wpdb->get_row("SELECT  `score` FROM  `wp_plugin_slickquiz_scores` WHERE  `createdBy` =  '$user_id'");
				  
				$res = explode("/",$test_result->score);
				$res_trimmed = trim($res[0]);
				//echo "Exame Result ".$res_trimmed;
				
				if($res_trimmed >= 16 && $res_trimmed != "")
				{
				
				 $data_percentage5 = "20";
			}
			//20% completed
		$data_percentage = $data_percentage1 + $data_percentage2 + $data_percentage3 + $data_percentage4 + $data_percentage5;
		
		
		
			  ?>
<!-- wheel php code end-->  

<?php

$user_event_count = $wpdb->get_results("SELECT count(*) AS event_count FROM my_job WHERE user_id = $user_id"); 
//echo "SELECT count(*) AS event_count FROM my_job WHERE user_id = $user_id";
	$total_event_count = $user_event_count[0]->event_count;				 
	$prof_noti_count = 0; //starts from 0, will increment upon profile conditions

	$notification_count = $prof_noti_count + $total_event_count;
?>

 
 <?php /*?> <?php     
  
		if(is_home() || is_page('Successfully Registered')){
		?> 
	<style>
   	.lor1.user_not_login{ display: none !important;}
	</style>
	<?php	
		}
  
    if (!is_user_logged_in()) {
	?> 
	<style>
    .lor1{ display:none;}
	.lor1.kun{ display: block;}
	.lor1.user_not_login{ display: block;}
	</style>
	<?php
  }   else { ?>
  <style>
    .lor1{ display:block;}
	.lor1.user_not_login{ display: none;}
	</style>
  <?php }?>
<?php */?>
