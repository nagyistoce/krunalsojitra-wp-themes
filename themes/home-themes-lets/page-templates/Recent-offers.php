<?php
/**
 * Template Name: Recent Offers
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();
 ?>

<?php
$page_id = get_queried_object_id();
// Get current page id
?>
<script type="text/javascript">
 $(document).ready(function(){
	//recent Offers contact form
				$("#Offer_form").validate({
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
							
								name:
								{
									required: true,
									minlength: 3,
						 			maxlength: 30,
						 			lettersonly: true
								},
								company: 
								{
									required: true,
									minlength: 2,
						 			maxlength: 35,
						 			lettersonly: true
						 			
						 			
								},
								Phone_Number: 
								{
									required: true,
									number: true,
									minlength: 10,
						 			maxlength: 15,
						 			
						 			
								},
								Email: {
									required: true,
									email: true,
									maxlength: 35
								},
								interested_in: {
									required: true
									
								},
								specific_requr:{
									required:true,
									maxlength: 225
        						},
								hear_about:{
									required:true
        						},
			                    sanswer: {
			                        required: true
			                    }
								
							},	
						messages: {
							
								name:{
										required: "<p>Please enter your name</p>",
										minlength: "<p>Please enter at least 3 characters</p>",
						                maxlength: "<p>Please enter at most 30 characters</p>"						               
								},
								company: {
										required: "<p>Please enter company name</p>",
										minlength: "<p>Please enter at least 2 characters</p>",
						                maxlength: "<p>Please enter at most 35 characters</p>"
						              
								},
								Phone_Number: {
										required: "<p>Please enter phone number</p>",
										minlength: "<p>Please enter at least 10 characters</p>",
						                maxlength: "<p>Please enter at most 15 characters</p>"
						                
								},
								Email:
								{
									required: "<p>Please enter email</p>",
									email: "<p>Please enter valid email address</p>"
								},
								interested_in: {
										required: "<p>Please select category</p>"
										
								},
								specific_requr: {
										required: "<p>Please enter enquiry</p>"
										
								},
								hear_about: {
										required: "<p>Please enter enquiry</p>"
										
								},
			                    sanswer: {
			                        required: "Required"
			                    }

								}  		
			}); //recent Offers contact form validation ends
		});
</script>
  <!--inner-page -->
	<div class="inner-page blog">
    	<!--banner -->
    	<?php    	$banner_image = get_field('page_banner', $page_id); 
    	if($banner_image !=""){?>
       <style>
       	.inner-page .banner{background: url("<?php echo $banner_image; ?>
		");}
       </style>
       <?php } ?>
        <div class="banner ff-left">
            <div class="container">
             	<?php $args = array('post_type' => 'random_tips', 'orderby' => 'rand', 'posts_per_page' => 1);
				query_posts($args);
 ?>
					<?php while ( have_posts() ) : the_post(); ?>
             			<h4><?php the_content(); ?></h4>
                    <?php endwhile; wp_reset_query(); ?>
                 </div>
        </div>
         <!--banner -->
        <!--blogs -->
        <div class="blogs bloginner page_cont">
        	<!--container -->
        	<div class="container">
            	<!--blog-left -->
            	<div class="blog-left rec">
                	<article>
                           <div class="blog-detail">
                        	<h4 style="text-align: center;">Our Offers Will Delight You</h4>
                        <div class="Offer_page">
                        	 <div><p>LetsNurture has various promotion activities going on,  we are giving up to 40% discount on various projects.  Fill this form and Avail Offers</p></div>
									<?php
								$sdigit1 = mt_rand(1, 20);
								$sdigit2 = mt_rand(1, 20);
								if (mt_rand(0, 1) === 1) {
									$smath = "$sdigit1 + $sdigit2";
									$_SESSION['sanswer'] = $sdigit1 + $sdigit2;
								} else {

									$smath = "$sdigit1 - $sdigit2";
									$_SESSION['sanswer'] = $sdigit1 - $sdigit2;
								}
				    ?>		
						             <form method="post" name="Offer_form" id="Offer_form">
								         <ul>
								        	<li>
								            	
								                <input type="text" name="name" id="offers_name" value="" placeholder="Name *" required="" class="hm-cnt-txbx" />
								            </li>
								        	<li>
								            	
								                <input type="text" name="company" id="offers_company" value="" placeholder="Company *" class="hm-cnt-txbx" />
								            </li>
								        	<li class="half">
								            	
								                <input type="text" name="Phone_Number" id="offers_phone_number" value="" placeholder="Phone Number *" required="" required="" class="hm-cnt-txbx" />
								            </li>
								        	<li class="half ff-right">
								            	
								                <input type="email" name="Email" id="offers_email" value="" placeholder="Email *" required="" class="hm-cnt-txbx" />
								            </li>
								        	<li>
								            	
								                <select name="interested_in" id="offers_interested_in" class="hm-cnt-slct selectpicker">
								                				<option value=""></option>
																<option value="App Design">App Design</option>
																<option value="App Upgrade">App Upgrade</option>
																<option value="Android Wear Development">Android Wear Development</option>
															    <option value="AI Development">AI Development</option>
																<option value="Brochure Design">Brochure Design</option>
																<option value="Bluetooth Apps">Bluetooth Apps</option>
																<option value="CMS Web">CMS Web</option>   
																<option value="Ecommerce Web">Ecommerce Web</option>
																<option value="iOS8 Upgrade">iOS8 Upgrade</option>
																 <option value="iBeacon Apps">iBeacon Apps</option>
																<option value="Logo Design">Logo Design</option>
																 <option value="Mobile Friendly Web">Mobile Friendly Web</option>
																 <option value="NFC Apps">NFC Apps</option>   
																<option value="Prototype Design">Prototype Design</option>
																 <option value="POC Development">POC Development</option>
																<option value="UI Design">UI Design</option>
																<option value="Other">Other</option>
								                </select>
								            </li>
								        	<li>
								            	
								                <textarea name="specific_requr" id="offers_specific_requr" class="hm-cnt-txara" required=""placeholder="Do you have specific requirement *" ></textarea>
								            </li>
								            <li>
								            	
								                <select name="hear_about" id="offers_hear_about" class="hm-cnt-slct selectpicker">
								                	<option value="">From where did you find us?</option>
								                    <option value="Search Engines">Search Engines</option>
								                    <option value="Email">Email</option>
								                    <option value="Call">Call</option>
								                    <option value="Reference">Reference</option>
								                     <option value="Portals">Portals</option>
								                      <option value="Social Media">Social Media</option>
								                    <option value="other">Other</option>
								                </select>
								            </li>
								          <li class="cpcha offr_cat" style="padding-bottom: 11px;">				                        		
								          	 <p>What's <?php echo $smath; ?> = </p>			
								          	 	                        		 <input name="sanswer" id="sanswer" type="text"  min="2"/>				                        		 <p style="width: 245px ! important; text-align: right;"><?php echo $ctpwrong; ?></p><br />		
								          	 	                        		 											<!-- <input id="num1" class="sum" type="text" name="num1" value="<?php echo rand(1,4) ?>" readonly="readonly" /><span>+</span>													<input id="num2" class="sum" type="text" name="num2" value="<?php echo rand(5,9) ?>" readonly="readonly" /><span>=</span>													<input id="captcha" class="captcha" type="text" name="captcha" maxlength="2" /> -->																								</li>
								        	<li>
								                <input type="button" name="offer_submit" id="offer_submit" value="Get An Amazing Offer" class="hm-cnt-bt" />
								            </li>
								        </ul>
			            	</form>
							</div>
                        </div>
                    </article>               	
                 	</article>
			    </div>
				<!--blog-left -->	
             

            </div>
            <!--container -->
        </div>
        <!--blogs -->
		
	 </div>
    <!--inner-page -->

<?php get_footer(); ?>
  
<script type="text/javascript">
	jQuery('#offer_submit').click(function(){
	var recent_name = jQuery('#offers_name').val();
	var recent_email = jQuery('#offers_email').val();
	var recent_phone_number = jQuery('#offers_phone_number').val();
	var recent_company = jQuery('#offers_company').val();
	var recent_interested_in = jQuery('#offers_interested_in').val();
	var recent_specific_requr = jQuery('#offers_specific_requr').val();
	var recent_hear_about = jQuery('#offers_hear_about').val();
	
	if (jQuery('#Offer_form').valid()){
		var ans_value = $('#sanswer').val();
		var act_value = '<?php echo $_SESSION['sanswer']; ?>';	
		if($('#sanswer').val()=='')	{	
			alert('Please enter captcha value.');	
		}	else	{		
			if(ans_value===act_value)	
			{
		var data = {};
		data.name = recent_name;
		data.email = recent_email;
		data.phone_number = recent_phone_number;
		data.company = recent_company;
		data.interested_in = recent_interested_in;
		data.specific_requr = recent_specific_requr;
		data.hear_about = recent_hear_about;
		data.action = "getoffer_action";
		jQuery.post('<?php echo rawurldecode(esc_url(home_url('/'))); ?>wp-admin/admin-ajax.php',data, locationSuccess);
			}
			else alert('Oops !! Wrong Captcha');
			}
			}

			});

			function locationSuccess(result){ //onSuccessFunction
			if(result==1){
			//alert('Your request has been submitted. Thank You!');
			//window.location.href = document.location.href;
			window.location.href="http://www.letsnurture.com/thank-you.html";
			}else{
			alert('Sorry! Failed to submit your request.');
			}
			}
</script>
  <style>.cpcha.offr_cat p{color: #939393; width: 120px !important;}</style>
    <?php ?>