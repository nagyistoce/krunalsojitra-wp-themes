<?php
session_start();
/**
 * Template Name: Quote
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

//get_header(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<?php 
	
		$errName     = "";
	  $errcompany  = "";
	  $errPhone   = "";
      $errEmail    = "";
	  $errCategory  = "";
      $errEnquiry  = "";
	  $errCaptcha  = "";

if(isset($_POST['submit']))
{
		// Full Name must be letters, dash and spaces only
        if(empty($_POST["your_name"])){
        	 $errName = 'error';
        }else{
			if(preg_match("/^[a-zA-Z\s]+$/", $_POST["your_name"]) === 0)
          	$errName = 'error';
		}
		if(empty($_POST["company"])){
        	 $errcompany = 'error';
        }else{
			if(preg_match("/^[a-zA-Z\s]+$/", $_POST["company"]) === 0)
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
				$headers = "From: ".$_POST['your_name']."<".$_POST['email'].">";	
				$headers.= "MIME-version: 1.0\n";	
				$headers.= "Content-type: text/html; charset=utf-8\n";
				
			 $subject = "Contact form mail Get a Quote";
			 $message = "Name: ".$_POST['your_name']."<br>";
			 $message .= "Company: ".$_POST['company']."<br>";
			 $message .= "Phone: ".$_POST['phone']."<br>";
			 $message .= "Email: ".$_POST['email']."<br>";
			 $message .= "Category: ".$_POST['category']."<br>";
			 $message .= "Enquiry: ".$_POST['enquiry']."<br><br><br><br>";
				$message .= "IP Address: ".$_SERVER['SERVER_ADDR']."<br>"; 
				$message .= "URL: ".$_SERVER['HTTP_REFERER']."<br>"; 
				$message .= "Device/Browser: ".$_SERVER['HTTP_USER_AGENT']."<br>"; 
				
			 $mail = mail('info@letsnurture.com', $subject, $message, $headers); 
		     if($mail){
		     	echo '<script>window.location.href="http://www.letsnurture.com/thank-you.html";</script>';
				 //wp_redirect( get_bloginfo('wpurl'), 301 ); 
		     }
			}
		}else{
	            
				$ctpwrong = 'Oops !! Wrong Captcha';
		}
}
 

?>
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
		

	$.validator.addMethod('captcha',
	  function(value) {
	    $result = ( parseInt($('#num1').val()) + parseInt($('#num2').val()) == parseInt($('#captcha').val()) ) ;
	    $('#spambot').fadeOut('fast');
	        return $result;
	    },
	        'Incorrect value, please try again.'
	    );


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
// 							
								 your_name:
								 {
									 required: true,
									
									 minlength: 2,
						 			 maxlength: 15,
						 			 customAlpha: true
								 },
								 company: 
								 {
									 required: true,
									 minlength: 2,
						 			 maxlength: 150,
// 						 			
// 						 			
								 },
								 phone: 
								 {
									 required: true,
									 number: true,
									 minlength: 10,
						 			 maxlength: 15,
// 						 			
// 						 			
								 },
								 email: {
									 required: true,
									 email: true,
									maxlength: 100
								 },
								 category: {
									 required: true
// 									
								 },
								 enquiry:{
									 required:true,
									maxlength: 400
        						 },
			                     answer: {
			                         required: true
			                         
			                     }
							 },	
						 messages: {
// 							
								 your_name:{
										 required: "<p>Please enter you name</p>",
										 minlength: "<p>Please enter at least 2 characters</p>",
						                 maxlength: "<p>Please enter at most 150 characters</p>"						               
								 },
								 company: {
										 required: "<p>Please enter company name</p>",
										 minlength: "<p>Please enter at least 2 characters</p>",
						                 maxlength: "<p>Please enter at most 15 characters</p>"
// 						              							
										 },
								 phone: {
										 required: "<p>Please enter phone number</p>",
										 minlength: "<p>Please enter at least 10 characters</p>",
						                 maxlength: "<p>Please enter at most 15 characters</p>"
// 						                
								 },
								 email:
								 {
									 required: "<p>Please enter email</p>",
									 email: "<p>Please enter valid email address</p>"
								 },
								 category: {
										 required: "<p>Please select category</p>"
// 										
								 },
								 enquiry: {
										 required: "<p>Please enter enquiry</p>"
// 										
								 },
			                     answer: {
			                         required: "Required"
			                     }
							 }  		
			 }); //registration form validation ends(registration.php)
			});
    </script>
    <!-- jquery.validate -->
    
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />

   	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap-select.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css">
   	
<div class="quote_main">
	<!-- BEGIN PAGE CONTENT-->
	<div class="quote_center quo_header">
			<div class="logo"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" /></div>
	</div>
	<div class="quote_center quo_cont">
			<div id="contact">
				<div class="quor_box">
				<h1 style="margin-top: 0px ! important;">Get a Quote</h1>
				   <?php
    $digit1 = mt_rand(1,20);
    $digit2 = mt_rand(1,20);
    if( mt_rand(0,1) === 1 ) {
            $math = "$digit1 + $digit2";
            $_SESSION['answer'] = $digit1 + $digit2;
    } else {
            $math = "$digit1 - $digit2";
            $_SESSION['answer'] = $digit1 - $digit2;
    } 
    ?>
				<div class=" form">
					<form method="post" name="get_a_quote" id="get_a_quote">
					         <ul>
					        	<li>
					            	
					                <input type="text" name="your_name" value="<?php if(isset($_POST["your_name"])){echo $_POST["your_name"];} ?>" placeholder="Your name *" class="hm-cnt-txbx <?php  if(isset($errName)) echo $errName; ?>" />
					            </li>
					        	<li>
					            	
					                <input type="text" name="company" value="<?php if(isset($_POST["company"])){echo $_POST["company"];} ?>" placeholder="Company *" class="hm-cnt-txbx <?php  if(isset($errcompany)) echo $errcompany; ?>" />
					            </li>
					        	<li class="half">
					            	
					                <input type="text" name="phone" value="<?php if(isset($_POST["phone"])){echo $_POST["phone"];} ?>" placeholder="Phone *" class="hm-cnt-txbx <?php  if(isset($errPhone)) echo $errPhone; ?>" />
					            </li>
					        	<li class="half ff-right">
					            	
					                <input type="email" name="email" value="<?php if(isset($_POST["email"])){echo $_POST["email"];} ?>"  placeholder="Email *"  class="hm-cnt-txbx <?php  if(isset($errEmail)) echo $errEmail; ?>" />
					            </li>
					        	<li>
					            	
					                <select name="category" class="hm-cnt-slct selectpicker <?php  if(isset($errCategory)) echo $errCategory; ?>" style="opacity: 0.75; padding-left: 4px;" data-size="5">
					                	<option value="<?php if(isset($_POST["category"])){echo $_POST["category"];} ?>">Select Category</option>
					                     <option value="Logo Design">Logo Design</option>

                            <option value="UI Design">UI Design</option>

                            <option value="Prototype Design">Prototype Design</option>

                            <option value="App Design">App Design</option>

                            <option value="Brochure Design">Brochure Design</option>

						    <option value="Ecommerce Web">Ecommerce Web</option>	
			
						    <option value="CMS Web">CMS Web</option>	
			
						    <option value="Mobile Friendly Web">Mobile Friendly Web</option>	
			
						    <option value="POC Development">POC Development</option>
			
						    <option value="App Upgrade">App Upgrade</option>	
			
						    <option value="iOS8 Upgrade">iOS8 Upgrade</option>
			
						    <option value="Android Wear Development">Android Wear Development</option>
			
						    <option value="AI Development">AI Development</option>
			
						    <option value="Bluetooth Apps">Bluetooth Apps</option>
			
						    <option value="iBeacon Apps">iBeacon Apps</option>

		          			<option value="NFC Apps">NFC Apps</option>

			    		    <option value="Other">Other</option>
					                </select>
					            </li>
					        	<li>
					            	
					                <textarea name="enquiry" class="hm-cnt-txara <?php  if(isset($errEnquiry)) echo $errEnquiry; ?>" placeholder="Enquiry *"><?php if(isset($_POST["enquiry"])){echo $_POST["enquiry"];} ?></textarea>
					            </li>
					            <div><p>We guarantee 100% Security of your information
We will not share the details you provide above with anyone. Your email won't be used for spamming.</p></div>
								<li class="cpcha get_cat">
									  <p>What's <?php echo $math; ?> = </p><input name="answer" type="text" /><p style="width: 245px ! important; text-align: right;"><?php echo $ctpwrong; ?></p><br />
									<!-- <input id="num1" class="sum" type="text" name="num1" value="<?php echo rand(1,4) ?>" readonly="readonly" /><span>+</span>
									<input id="num2" class="sum" type="text" name="num2" value="<?php echo rand(5,9) ?>" readonly="readonly" /><span>=</span>
									<input id="captcha" class="captcha  <?php  if(isset($errCaptcha)) echo $errCaptcha; ?>" type="text" name="captcha" maxlength="2" />
									 -->
								</li>
					        	<li>
					                <input type="submit" name="submit"  value="Get a Quote" class="hm-cnt-bt" />
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

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/fonts.css" />
<style>

* {
    margin: 0;
    padding: 0;
     font-family: "arial";
}
.quote_main {
    float: left;
    width: 100%;
}	
.quote_center {
    margin: 0 auto;
    text-align: center;
    /*width: 1080px;
   font-family: Lato,sans-serif;*/
}

.quote_center.quo_cont {
    min-height: 594px;
    background: none repeat scroll 0 0 #275db2;
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
  font-family: "arial";
    padding-bottom: 5px;
    padding-top: 20px;}

.form {
    margin: 0 auto;
    width: 40%;
}
#contact form{float: none; width:  auto;}
#contact form ul li label{color: #fff;}

#contact form ul li .hm-cnt-slct option {
    color: #96bcd3;
}

p {
    color: #fff;
    font-size: 14px;
    margin:7px 0;
    float: left;
    font-family: "arial";
}
#contact{height: 120% !important;}
#contact form ul li .hm-cnt-bt{  font-family: "arial";float: none; margin: 0 auto; display: block;}
#contact form ul li .hm-cnt-slct.error, #contact form ul li .hm-cnt-txara.error, #contact form ul li .hm-cnt-txbx.error{border: 1px solid #FF0000;}
.captcha.error{border: 1px solid #FF0000;}
.get_cat .error{border: 1px solid #FF0000;}
.sum{ background: none repeat scroll 0 0 rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.4);
    border-radius: 2px;
    color: #fff;
    font-size: 14px;
    margin-top: 4px;
    padding: 5px 10px;
    text-align: center;
    width: 40px !important;}
 .cpcha span{padding-top: 9px;
    text-align: center;
    width: 35px !important;
    color: #fff;
}
.captcha{ background: none repeat scroll 0 0 rgba(255, 255, 255, 0.1);
    border: medium none;
    border-radius: 2px;
    color: #fff;
    font-size: 14px;
    margin-top: 4px;
    padding: 5px 10px;
    text-align: center;
    width: 40px !important;}
    .get_cat input{background: none repeat scroll 0 0 rgba(255, 255, 255, 0.1);
    border: medium none;
    border-radius: 2px;
    color: #fff;
    font-size: 14px;
    margin-top: 4px;
    padding: 5px 10px;
    text-align: center;
    width: 40px !important;}
#contact form ul li .hm-cnt-slct, #contact form ul li .hm-cnt-txara, #contact form ul li .hm-cnt-txbx{color: #96bcd3!important;}
@media screen and (max-width:580px){
.form{width: 80%;}
}
#contact form ul li .btn-group .btn{color:#96bcd3 !important;}
</style>

<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-select.js"></script>
<script type="text/javascript">
window.onload=function(){
	$('.selectpicker').selectpicker();
};
</script>
