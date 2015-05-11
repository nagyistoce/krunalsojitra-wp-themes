<?php
/**
 * Template Name: Quote
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

//get_header(); ?>
<!-- jquery.validate -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.js"></script>
	
 <script type="text/javascript">
     $(document).ready(function(){
    	 jQuery.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^\w+$/i.test(value);
}, "<p>Please enter valid name special charactes are not allowed</p>");

jQuery.validator.addMethod("specialChars", function( value, element ) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = value;

        if (!regex.test(key)) {
           return false;
        }
        return true;
    }, "<p>please use only alphanumeric or alphabetic characters</p>");
    
jQuery.validator.addMethod("customAlpha", function( value, element ) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = value;

        if (!regex.test(key)) {
           return false;
        }
        return true;
    }, "<p>Please use only alphabetic characters</p>");
		
		$("#get_a_quote").validate({
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
									alphanumeric: true,
									minlength: 2,
						 			maxlength: 15,
						 			customAlpha: true
								},
								company: 
								{
									required: true,
									minlength: 2,
						 			maxlength: 150,
						 			
						 			
								},
								phone: 
								{
									required: true,
									number: true,
									minlength: 10,
						 			maxlength: 15,
						 			
						 			
								},
								email: {
									required: true,
									email: true
								},
								category: {
									required: true
									
								},
								enquiry:{
									required:true
        						}
								
							},	
						messages: {
							
								your_name:{
										required: "<p>Please enter you name</p>",
										minlength: "<p>Please enter at least 2 characters</p>",
						                maxlength: "<p>Please enter at most 150 characters</p>"						               
								},
								company: {
										required: "<p>Please enter company name</p>",
										minlength: "<p>Please enter at least 2 characters</p>",
						                maxlength: "<p>Please enter at most 15 characters</p>"
						              
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
										
								}

								}  		
			}); //registration form validation ends(registration.php)
			});
    </script>
    <!-- jquery.validate -->
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css" />
   	
<div class="quote_main">
	<!-- BEGIN PAGE CONTENT-->
	<div class="quote_center quo_header">
			<div class="logo"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" /></div>
	</div>
	<div class="quote_center quo_cont">
			<div id="contact">
				<div class="quor_box">
				<h1>Get a Quote</h1>
				
				<div class=" form">
					<form method="post" name="get_a_quote" id="get_a_quote">
					         <ul>
					        	<li>
					            	<label>Your name *</label>
					                <input type="text" name="your_name" value="" placeholder="" required="" class="hm-cnt-txbx" />
					            </li>
					        	<li>
					            	<label>Company</label>
					                <input type="text" name="company" value="" placeholder="" class="hm-cnt-txbx" />
					            </li>
					        	<li class="half">
					            	<label>Phone *</label>
					                <input type="text" name="phone" value="" placeholder="" required="" required="" class="hm-cnt-txbx" />
					            </li>
					        	<li class="half ff-right">
					            	<label>Email *</label>
					                <input type="email" name="email" value="" placeholder="" required="" class="hm-cnt-txbx" />
					            </li>
					        	<li>
					            	<label>Category *</label>
					                <select name="category" class="hm-cnt-slct selectpicker">
					                	<option value="">Select Category</option>
					                    <option value="Website Design">Website Design</option>
					                    <option value="Mobile App Development">Mobile App Development</option>
					                    <option value="Search Engine Optimization">Search Engine Optimization</option>
					                    <option value="Graphic Design">Graphic Design</option>
					                    <option value="other">other</option>
					                </select>
					            </li>
					        	<li>
					            	<label>Enquiry *</label>
					                <textarea name="enquiry" class="hm-cnt-txara" required=""></textarea>
					            </li>
					            <div><p>We guarantee 100% Security of your information
We will not share the details you provide above with anyone. Your email won't be used for spamming.</p></div>
					        	<li>
					                <input type="submit" name="submit"  value="Submit" class="hm-cnt-bt" />
					            </li>
					        </ul>
            	</form>
            </div>
           </div>
			</div>
		</div>
	<div class="quote_center quo_footer">
			<div class="copy_right">Copyright © 2014 Lets Nurture. India | UK</div>
	</div>

</div>
<?php //get_footer(); ?>
<style>
* {
    margin: 0;
    padding: 0;
}
.quote_main {
    float: left;
    width: 100%;
}	
.quote_center {
    margin: 0 auto;
    text-align: center;
    /*width: 1080px;*/
   font-family: Lato,sans-serif;
}

.quote_center.quo_cont {
    min-height: 450px;
}

.quote_center.quo_footer {
    background: none repeat scroll 0 0 #0b1733;
    color: #fff;
    padding: 20px;
}
.quo_header{background: none repeat scroll 0 0 #0b1733;
    padding: 22px;}

.quote_center.quo_cont .contact{
    margin: 0 auto;
    width: 820px;
}
.quor_box {
    
   
}
 #contact h1{color: #fff;
    font-size: 26px;
    font-weight: 800;
    padding-bottom: 5px;
    padding-top: 20px;}

.form {
    margin: 0 auto;
    width: 40%;
}
#contact form{float: none; width:  auto;}
#contact form ul li label{color: #fff;}

#contact form ul li .hm-cnt-slct option {
    color: #000;
}

p {
    color: #fff;
    font-size: 14px;
    margin:7px 0;
    float: left;
}
#contact{height: 120% !important;}
#contact form ul li .hm-cnt-bt{ font-family: inherit; }
#contact form ul li .hm-cnt-slct.error, #contact form ul li .hm-cnt-txara.error, #contact form ul li .hm-cnt-txbx.error{border: 1px solid #FF0000;}
</style>
<?php 
if(isset($_POST['submit']))
{
	$from = "From: ".$_POST['your_name']."<".$_POST['email']."> \r\n"; // sender
     $subject = "Contact form mail";
	 $message = "Name: ".$_POST['your_name']."\n";
	 if($_POST['company'])
	 {
	 	$message .= "Company: ".$_POST['company']."\n";
	 }
     $message .= "Phone: ".$_POST['phone']."\n";
	 $message .= "Email: ".$_POST['email']."\n";
	 $message .= "Category: ".$_POST['category']."\n";
	 $message .= "Enquiry: ".$_POST['enquiry']."\n"; 
	 $mail = mail('krunal.letsnurture@gmail.com', $subject, $message, $from); 
     if($mail){
     	echo '<script>alert("Your Message has been Sent Successfully");window.location="http://192.168.1.119/letsnurture";</script>';
		 //wp_redirect( get_bloginfo('wpurl'), 301 ); 
     }
}
?>