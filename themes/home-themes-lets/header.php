<?php
session_start();
$type = $_SERVER['HTTP_USER_AGENT'];
if(strpos((string)$type, "Windows Phone") != false || strpos((string)$type, "iPhone") != false || 
strpos((string)$type, "Android") != false || strpos((string)$type, "BlackBerry") != false)
{
	$_SESSION['device_type_str']='mobile';
}else{
	$_SESSION['device_type_str']='other';
}


/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/fonts.css" />
   	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap-select.css">
   	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/res.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css">
   	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css">
   	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/blog.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/magnific-popup.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/flexslider.css" />
	<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/easy-responsive-tabs.css" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.magnific-popup.min.js"></script> 
    
    <script  type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/easyResponsiveTabs.js"></script>
<script>
$(function() {
  $('.slimmenu a').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 750);
        return false;
      }
    }
  });
  

});

$(function() {
  $('.read-more').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 750);
        return false;
      }
    }
  });
  $('.side-navigation a').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 750);
        return false;
      }
    }
  });
});

//sm header script
	$(window).scroll(function() {    
			var scroll = $(window).scrollTop();
	
			if (scroll >= 10) {
				$("#youelementID").addClass("sml-hd");
			}
			 else {
				$("#youelementID").removeClass("sml-hd");
			}
		});
</script>
<!-- popup newsletter -->
<script type="text/javascript">
	function popUpClose() {
		document.getElementById('light').style.display = 'none';
		document.getElementById('fade').style.display = 'none'
		//alert("close");
		$.cookie('newsletterpopup', 'close', { expires: 1 });
	}
	$(document).keyup(function(e) {
		if (e.keyCode == 27){ 
			$('#fade').css("display", "none");
			$.cookie('newsletterpopup', 'close', { expires: 1 });
		}
	});
$(document).ready(function() {
	if($.cookie('newsletterpopup') != "close"){
	
				mamu = ($(window).height());
				$('.cools').css({
					'height' : mamu + 'px'
				});
				$('.cools').css({
					'position' : 'fixed'
				});
				var hei = $('.main').height();
				var mam = (mamu - hei) / 8;
				$('.mains').css({
					'top' : mam + "px"
				});
			
			function popUp() {
				document.getElementById('light').style.display = 'block';
				document.getElementById('fade').style.display = 'block'
			}
	 setTimeout(function() {
			$("#fade").css("display", "block");
			$("#light").css("display", "block");
			//alert("popup");
		}, 30000);
} 
});		
</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cookie.js"></script>
<!-- popup newsletter -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/modernizr-2.6.2.min.js"></script>
 <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/additional-methods.js"></script>
 <script type="text/javascript">
 $(document).ready(function(){
	//home page contact form
		$("#home_conct_form").validate({
			//set this to false if you don't what to set focus on the first invalid input
                    focusInvalid: false,
                    //by default validation will run on input keyup and focusout
                    //set this to false to validate on submit only
                    onkeyup: false,
                    onfocusout: false,
                    //by default the error elements is a <label>
                    errorElement: "div",
                    //place all errors in a <div id="errors"> element
                    errorPlacement: function(error, element) {
                        error.appendTo("div#errors");
                    },
							rules: {
							
								your_name:
								{
									required: true,
									minlength: 3,
						 			maxlength: 30,
						 			lettersonly: true
						 		},
								company: 
								{
									required: true,
									minlength: 8,
						 			maxlength: 35,
						 			lettersonly: true
						 		},
								phone: 
								{
									required: true,
									number: true,
									minlength: 10,
						 			maxlength: 15
						 		},
								email: {
									required: true,
									email: true,
									maxlength: 35
								},
								category: {
									required: true
								},
								enquiry:{
									required:true,
									maxlength: 225
        						},
			                    answer: {
			                        required: true
			                        
			                    }
								
							},	
						messages: {
							
								your_name:{
										required: "<p>Please enter your name</p>",
										minlength: "<p>Please enter at least 3 characters</p>",
						                maxlength: "<p>Please enter at most 30 characters</p>",
						                lettersonly: 'Please enter only alphabetic value',						               
								},
								company: {
										required: "<p>Please enter company name</p>",
										minlength: "<p>Please enter at least 2 characters</p>",
						                maxlength: "<p>Please enter at most 100 characters</p>"
						              
								},
								phone: {
										required: "<p>Please enter phone number</p>",
										minlength: "<p>Please enter at least 10 characters</p>",
						                maxlength: "<p>Please enter at most 15 characters</p>"
						                
								},
								email:
								{
									required: "<p>Please enter email</p>",
									email: "<p>Please enter valid email address</p>"
								},
								category: {
										required: "<p>Please select category</p>"
										
								},
								enquiry: {
										required: "<p>Please enter enquiry</p>"
										
								},
			                    answer: {
			                        required: "Required"
			                    }

								}  		
			}); //home page contact form validation ends
			
			
			
			});
    </script>
    <!-- jquery.validate -->

<?php 
 	  $errName     = "";
	  $errcompany  = "";
	  $errPhone   = "";
      $errEmail    = "";
	  $errCategory  = "";
     
      $errEnquiry  = "";
	  $errCaptcha  = "";
	  
	  
if(isset($_POST['home_submit']))
{
			
			// Full Name must be letters, dash and spaces only
        if(empty($_POST["your_name"])){
        	 $errName = 'error';
        }else{
			if(preg_match("/^[a-z0-9_]+$/i", $_POST["your_name"]) === 0)
          	$errName = 'error';
		}
		if(empty($_POST["company"])){
        	 $errcompany = 'error';
        }else{
			if(preg_match("/^[a-z0-9_]+$/i", $_POST["company"]) === 0)
          	$errcompany = 'error';
		}
		 // Phone mask 1-800-998-7087
        if(empty($_POST["phone"])){
        	 $errPhone = 'error';
        }else{
        	if((preg_match("/[^0-9]/", '', $str)) && strlen($str) == 10)
          $errPhone = 'error';
		}
		// Email mask
          if(empty($_POST["email"])){
        	 $errEmail = 'error';
        }else{
        	if(preg_match("/^[a-zA-Z]\w+(\.\w+)*\@\w+(\.[0-9a-zA-Z]+)*\.[a-zA-Z]{2,4}$/", $_POST["email"]) === 0)
          $errEmail = 'error';
		}
		// Category
		if(empty($_POST["category"])){
        	 $errCategory = 'error';
        }
        // Address must be word characters only
         if(empty($_POST["enquiry"])){
        	 $errEnquiry = 'error';
        } 
         if ($_SESSION['answer'] == $_POST['answer'] ){
	           
       
		
				if(empty($errName) && empty($errcompany) && empty($errPhone) && empty($errEmail) && empty($errCategory) && empty($errEnquiry)){
						
					$header = "From: ".$_POST['your_name']."<".$_POST['email']."> \r\n";	
					$headers.= "MIME-version: 1.0\n";	
					$headers.= "Content-type: text/html; charset=utf-8\r\n";
			     $subject = "Contact form mail home page Footer";
				 $message = "Name: ".$_POST['your_name']."\n";
				 $message .= "Company: ".$_POST['company']."\n";
				 $message .= "Phone: ".$_POST['phone']."\n";
				 $message .= "Email: ".$_POST['email']."\n";
				 $message .= "Category: ".$_POST['category']."\n";
				 $message .= "Enquiry: ".$_POST['enquiry']."\n"; 
				 $message .= "IP Address: ".$_SERVER['SERVER_ADDR']."\n"; 
				$message .= "URL: ".$_SERVER['HTTP_REFERER']."\n"; 
				$message .= "Device/Browser: ".$_SERVER['HTTP_USER_AGENT']."\n"; 
				
				 $mail = mail('krunal.letsnurture@gmail.com', $subject, $message, $header); 
			     if($mail){
			     	//echo '<script>alert("Your Message has been Sent Successfully");</script>';
			     	echo '<script>window.location="http://www.letsnurture.com/thank.html";</script>';
			     }
				}
			 }else{
	            
				$ctpwrong = 'Wrong captcha';
			}
}


?>
<?php if(is_front_page()){ ?> 
			<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/supersized.css" type="text/css" media="screen" />
			<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/supersized.shutter.css" type="text/css" media="screen" />
			<link href="<?php bloginfo('template_directory'); ?>/css/jquery.bxslider.css" rel="stylesheet" />
<?php }?>
</head>

<body <?php body_class(); ?>>
 <div class="animsitions">
	<?php bloginfo_new();?> 
<?php if(isset($_SESSION['device_type_str']) && !empty($_SESSION['device_type_str'])){ $type = $_SESSION['device_type_str'];}
	  if($type=='other'){?>
	  	<?php if(is_front_page()){ ?> 
			
			<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.min.js"></script>
			<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/supersized.3.2.7.js"></script>
			<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/supersized.shutter.js"></script>
			<script type="text/javascript">
				jQuery(function($){
					$.supersized({
						// Functionality
						slide_interval          :   3000,		// Length between transitions
						transition              :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
						transition_speed		:	700,		// Speed of transition
						// Components							
						slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
						slides 					:  	[			// Slideshow Images
												<?php $args = array(
														'post_type'=> 'home_banner',
														'orderby'    => 'rand',
														'posts_per_page' => 15
													);
													query_posts( $args ); ?>
														<?php while ( have_posts() ) : the_post(); ?>
															{image : '<?php echo get_field('image'); ?>', title : '', thumb : '', url : ''},
															 <?php endwhile; wp_reset_query(); ?>
													]
					});
				});
			</script>
		<?php }?>			
 <?php }?><!-- hide in mobile -->                
<!--main -->
 <div class="main">
 	<!--header -->
    <header  id="youelementID">
        
    	<!--container -->
    	<div class="container">
    		<div class="header_faq"><a href="<?php echo get_permalink(4954); ?>">FAQs</a></div>
        	<div class="logo ff-left">
				<a title="Lets Nurture" href="<?php echo get_site_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" /></a>            
            </div>
           	 <nav>
             <a class="get-but ff-right" href="<?php echo get_permalink(84); ?>" title="Get a Quote">get a quote</a>
             <?php wp_nav_menu( array( 'theme_location' => 'responsive_menu', 'menu_class' => 'slimmenu mobimenu ' ) ); ?>
 <?php if($type=='other'){?>
            	<ul class="slimmenu desk-menu">
            		<li><a data-hover="dropdown" data-close-others="true" href="<?php echo get_permalink(209); ?>" class="fst_lev">Know us</a>
            			<ul class="dropdown-menu">
						<li>
							<!-- Content container to add padding -->
							<div class="mega-menu-content">
								<div class="row">
									
									<ul class="mega-menu-submenu">
									<?php
										$letsnurture_home_post = array( 'post_type' => 'toggle_menu' ); // Display Default Home 
										$letsnurture_home = new WP_Query( $letsnurture_home_post );
										while ( $letsnurture_home->have_posts() ) : $letsnurture_home->the_post();
											while(has_sub_field('know_menu')):
									?>
											
												<li>
													<a href="<?php echo the_sub_field('menu_url');?>" title="<?php echo the_sub_field('menu_name');?>">
														<img src="<?php echo the_sub_field('menu_image');?>" alt="wearable" title="<?php echo the_sub_field('menu_link');?>" /><br /> 
														<?php echo the_sub_field('menu_name');?>
													</a>
												</li>
									<?php 
											endwhile;
										endwhile;	 
										wp_reset_query(); 
									?>
										
									</ul>
									
									
								</div>
							</div>
						</li>
					</ul>
            		<li><a data-hover="dropdown" data-close-others="true" href="<?php echo get_permalink(4764); ?>" class="fst_lev">Solutions</a>
            		<ul class="dropdown-menu">
						<li>
							<!-- Content container to add padding -->
							<div class="mega-menu-content">
								<div class="row">
									
									<ul class="mega-menu-submenu">
									<?php
										$letsnurture_home_post = array( 'post_type' => 'toggle_menu' ); // Display Default Home 
										$letsnurture_home = new WP_Query( $letsnurture_home_post );
										while ( $letsnurture_home->have_posts() ) : $letsnurture_home->the_post();
											while(has_sub_field('solutions_menu')):
									?>
											
												<li>
													<a href="<?php echo the_sub_field('menu_url');?>" title="<?php echo the_sub_field('menu_name');?>">
														<img src="<?php echo the_sub_field('menu_image');?>" alt="wearable" title="<?php echo the_sub_field('menu_link');?>" /><br /> 
														<?php echo the_sub_field('menu_name');?>
													</a>
												</li>
									<?php 
											endwhile;
										endwhile;	 
										wp_reset_query(); 
									?>
										
									</ul>
									
									
								</div>
							</div>
						</li>
					</ul>
					</li>
                	<li><a data-hover="dropdown" data-close-others="true" href="<?php echo get_permalink(212); ?>" class="fst_lev">Services</a>
                	<ul class="dropdown-menu">
						<li class="new_menu">
							<!-- Content container to add padding -->
							<div class="mega-menu-content">
								<div class="row">
									
		<ul class="mega-menu-submenu">
								
		<div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li><img src="<?php bloginfo('template_directory'); ?>/images/mobile.png" alt="Mobile" title="Mobile" />Mobile</li>
                <li><img src="<?php bloginfo('template_directory'); ?>/images/web.png" alt="Web" title="Web" />Web</li>
                <li><img src="<?php bloginfo('template_directory'); ?>/images/web.png" alt="Digital Marketing" title="Digital Marketing" />Digital Marketing</li>
                
            </ul>
            <div class="resp-tabs-container">
                <div>
			           <ul class="hoz_menu mobile">
			           	<?php
										$letsnurture_home_post = array( 'post_type' => 'toggle_menu' ); // Display Default Home 
										$letsnurture_home = new WP_Query( $letsnurture_home_post );
										while ( $letsnurture_home->have_posts() ) : $letsnurture_home->the_post();
											while(has_sub_field('mobile_menu')):
									?>
											
												<li>
													<a href="<?php echo the_sub_field('menu_url');?>" title="<?php echo the_sub_field('menu_name');?>">
														<img src="<?php echo the_sub_field('menu_image');?>" alt="wearable" title="<?php echo the_sub_field('menu_link');?>" /><br /> 
														<?php echo the_sub_field('menu_name');?>
													</a>
												</li>
									<?php 
											endwhile;
										endwhile;	 
										wp_reset_query(); 
									?>
									
						</ul>
						
			           <ul class="hoz_menu slider_memu">
			           				<div class="flexslider">
  							<ul class="slides">
  								<?php
								query_posts('post_type=portfolio&portfolio_type=mobile&posts_per_page=1&order=ASC');
								while( have_posts() ):the_post();
							
								?>			
										<li>
											<a href="<?php echo get_permalink(101);?>" title="<?php the_title(); ?>">
											<img src="<?php echo get_field('image'); ?>">
											<!-- <p><?php the_title(); ?></p> -->
											</a>
											
										</li>
								<?php endwhile; wp_reset_query(); ?>
			           		
							</ul>
						</div>
							
			           </ul>
                </div>
                <div>
                   		<ul class="hoz_menu hoz_web">
							<?php
										$letsnurture_home_post = array( 'post_type' => 'toggle_menu' ); // Display Default Home 
										$letsnurture_home = new WP_Query( $letsnurture_home_post );
										while ( $letsnurture_home->have_posts() ) : $letsnurture_home->the_post();
											while(has_sub_field('web_menu')):
									?>
											
												<li>
													<a href="<?php echo the_sub_field('menu_url');?>" title="<?php echo the_sub_field('menu_name');?>">
														<img src="<?php echo the_sub_field('menu_image');?>" alt="wearable" title="<?php echo the_sub_field('menu_link');?>" /><br /> 
														<?php echo the_sub_field('menu_name');?>
													</a>
												</li>
									<?php 
											endwhile;
										endwhile;	 
										wp_reset_query(); 
									?>
			           </ul>
			           <ul class="hoz_menu slider_memu">
			           	<div class="flexslider">
  							<ul class="slides">
  								<?php
								query_posts('post_type=portfolio&portfolio_type=web&posts_per_page=1&order=ASC');
								while( have_posts() ):the_post();
							
								?>			
										<li>
											<a href="<?php echo get_permalink(101);?>" title="<?php the_title(); ?>">
											<img src="<?php echo get_field('image'); ?>">
											<!-- <p><?php the_title(); ?></p> -->
											</a>
											
										</li>
								<?php endwhile; wp_reset_query(); ?>
			           		
							</ul>
						</div>
			           </ul>
			      </div>
                <div>
			           <ul class="hoz_menu mobile">
			           	<?php
										$letsnurture_home_post = array( 'post_type' => 'toggle_menu' ); // Display Default Home 
										$letsnurture_home = new WP_Query( $letsnurture_home_post );
										while ( $letsnurture_home->have_posts() ) : $letsnurture_home->the_post();
											while(has_sub_field('digital_marketing')):
									?>
											
												<li>
													<a href="<?php echo the_sub_field('menu_url');?>" title="<?php echo the_sub_field('menu_name');?>">
														<img src="<?php echo the_sub_field('menu_image');?>" alt="wearable" title="<?php echo the_sub_field('menu_link');?>" /><br /> 
														<?php echo the_sub_field('menu_name');?>
													</a>
												</li>
									<?php 
											endwhile;
										endwhile;	 
										wp_reset_query(); 
									?>
									
						</ul>
						
			           <ul class="hoz_menu slider_memu">
			           				<div class="flexslider">
  							<ul class="slides">
  								<?php
								query_posts('post_type=portfolio&posts_per_page=1&order=ASC');
								while( have_posts() ):the_post();
							
								?>			
										<li>
											<a href="<?php echo get_permalink(101);?>" title="<?php the_title(); ?>">
											<img src="<?php echo get_field('image'); ?>">
											<!-- <p><?php the_title(); ?></p> -->
											</a>
											
										</li>
								<?php endwhile; wp_reset_query(); ?>
			           		
							</ul>
						</div>
							
			           </ul>
                </div>
            </div>
        </div>
      
									</ul>
									
									
								</div>
							</div>
						</li>
					</ul>	
                	</li>
                	<!-- <li><a href="<?php echo get_category_link(12); ?>">News</a></li>
                	<li><a href="<?php echo get_category_link(3); ?>">Blog</a></li> -->
               
                	   	<li><a data-hover="dropdown" data-close-others="true" href="<?php echo get_permalink(101); ?>" class="fst_lev">Our Portfolio</a>
                	<ul class="dropdown-menu">
						<li class="new_menu">
							<!-- Content container to add padding -->
							<div class="mega-menu-content">
								<div class="row">
									
		<ul class="mega-menu-submenu">
								
		<div id="horizontalTabPortfolio">
            <ul class="resp-tabs-list">
                <li><img src="<?php bloginfo('template_directory'); ?>/images/mobile.png" alt="Mobile" title="Mobile" />Mobile</li>
                <li><img src="<?php bloginfo('template_directory'); ?>/images/web.png" alt="Web" title="Web" />Web</li>
                 <li><img src="<?php bloginfo('template_directory'); ?>/images/graphic_icon.png" alt="Graphic" title="Graphic" />Graphic</li>
                
            </ul>
            <div class="resp-tabs-container">
                <div>
			           
			           <ul class="hoz_menu port_memu">
			           				<div class="flexslider">
  							<ul class="slides">
  								<?php
								query_posts('post_type=portfolio&portfolio_type=mobile&posts_per_page=1&order=ASC');
								while( have_posts() ):the_post();
							
								?>			
										<li>
											<a href="<?php echo get_permalink(101);?>" title="<?php the_title(); ?>">
											<img src="<?php echo get_field('image'); ?>">
											<!-- <p><?php the_title(); ?></p> -->
											</a>
											
										</li>
								<?php endwhile; wp_reset_query(); ?>
							</ul>
						</div>
							
			           </ul>
			            <a href="<?php echo get_permalink(101); ?>" class="more_port"  title="View More">View More</a>
                </div>
                <div>
                   		
			           <ul class="hoz_menu port_memu">
			           	<div class="flexslider">
  							<ul class="slides">
  								<?php
								query_posts('post_type=portfolio&portfolio_type=web&posts_per_page=1&order=ASC');
								while( have_posts() ):the_post();
							
								?>			
										<li>
											<a href="<?php echo get_permalink(101);?>" title="<?php the_title(); ?>">
											<img src="<?php echo get_field('image'); ?>">
											<!-- <p><?php the_title(); ?></p> -->
											</a>
											
										</li>
								<?php endwhile; wp_reset_query(); ?>
							</ul>
						</div>
			           </ul>
			           <a href="<?php echo get_permalink(101); ?>" class="more_port web_more" title="View More">View More</a>
			      </div>
			      
			          <div>
                   		
			           <ul class="hoz_menu port_memu">
			           	<div class="flexslider">
  							<ul class="slides">
  								<?php
								query_posts('post_type=portfolio&portfolio_type=graphic&posts_per_page=1&order=ASC');
								while( have_posts() ):the_post();
							
								?>			
										<li>
											<a href="<?php echo get_permalink(101);?>" title="<?php the_title(); ?>">
											<img src="<?php echo get_field('image'); ?>">
											<!-- <p><?php the_title(); ?></p> -->
											</a>
											
										</li>
								<?php endwhile; wp_reset_query(); ?>
							</ul>
						</div>
			           </ul>
			           <a href="<?php echo get_permalink(101); ?>" class="more_port web_more" title="View More">View More</a>
			      </div>
               
            </div>
        </div>
      
									</ul>
									
									
								</div>
							</div>
						</li>
					</ul>	
                	</li>
                	<li><a href="<?php echo get_permalink(4760); ?>" class="fst_lev">Blog</a></li>
                	<li><a href="<?php echo get_permalink(4761); ?>" class="fst_lev">Contact</a></li>
                </ul>
<?php }?><!-- hide in mobile -->
            </nav>
            
             
            
        </div>
        <!--container -->
    </header>
    
    <div id="fade" class="dark_overlay cools">
		<div id="light" class="bright_content mains">
			<a href="javascript:void(0)" onclick="popUpClose()" class="close">X</a>
			<div class="pop_mes">
			<div class="pop-cont">	
			<p><span>Lets Nurture</span> your business., enter your email to keep yourself up to date on technology & get your</p>
				
	<h3>“FREE Website or Application Audit Report”</h3>
	<div class="funny-text">As our thanks</div>
</div>
<div style="float: left; width: 49%;  height: 281px;"><img style="height: 100%;" src="<?php echo home_url();?>/wp-content/themes/letsnurture/images/popimg.png" /></div>
			
			<div class="clear"></div>
				<?php echo do_shortcode('[wysija_form id="1"]');?>
			</div>
			
		</div>
	</div>