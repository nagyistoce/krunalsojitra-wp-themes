<?php
/*
 * Template Name: Training Registration
 */
get_header(); ?>
<?php
$page_id  = get_queried_object_id(); // Get current page id 
?>
<script type="text/javascript">
 $(document).ready(function(){
 	jQuery.validator.addMethod('selectcheck', function (value) {
        return (value != '0');
    }, "year required");
		// validate signup form on keyup and submit
		$("#training_form").validate({
			 ignore: [],
			//debug: false
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
				fname: {
					required: true,
					minlength: 2,
					maxlength: 10,
					lettersonly: true
				},
				lname: {
					required: true,
					minlength: 2,
					maxlength: 10,
					lettersonly: true
				},
				apply_post: {
					 required: true,
				},
				college: {
					required: true,
					minlength: 2
				},
				university: {
					required: true,
					minlength: 2
				},
				datepicker: {
					required: true
				},
				passout_yr: {
					required: true,
				},
				address: {
					required: true,
				},
				mobile_no: {
					required: true,
					minlength: 10,
		 			maxlength: 15
				},
				email: {
					required: true,
					email: true,
					maxlength: 60
				}
			},
			messages: {
				fname: {
					required: "<p>Please enter your first name</p>",
					minlength: "<p>Please enter at least 2 characters</p>",
	                maxlength: "<p>Please enter at most 150 characters</p>"		
				},
				lname: {
					required: "<p>Please enter your last name</p>",
					minlength: "<p>Please enter at least 2 characters</p>",
	                maxlength: "<p>Please enter at most 150 characters</p>"		
				},
				apply_post: {
					required: "<p>Please select post</p>"
				},
				college: {
					required: "<p>Please enter college name</p>",
					minlength: "<p>Please enter at least 2 characters</p>"
				},
				university: {
					required: "<p>Please enter university name</p>",
					minlength: "<p>Please enter at least 2 characters</p>"
				},
				datepicker: {
					required: "<p>Please choose date</p>"
				},
				passout_yr: {
					required: "<p>Please enter year</p>"
				},
				address: {
					required: "<p>Please enter address</p>"
				},
				mobile_no: {
					required: "<p>Please enter mobile number</p>",
					minlength: "<p>Please enter at least 10 characters</p>",
	                maxlength: "<p>Please enter at most 15 characters</p>"
				},
				email: {
					required: "<p>Please enter email</p>",
					email: "<p>Please enter valid email address</p>",
					maxlength:"<p>Max 60 Character allowed</p>"
				}
			},
			
	errorPlacement: function (error, element) {
        if(element.attr('id') == 'passout_yr') {
			$('#dropdown-toggle').addClass('error');
		}
    },

		});
});
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<!--inner-page -->
<div class="inner-page blog"> 
  <!--banner -->
  <?php  $banner_image = get_field('page_banner', $page_id);?>
  <?php
    	if($banner_image != ''){?>
  <style>
       	.inner-page .banner{background: url("<?php echo $banner_image; ?>");}
       </style>
  <?php } ?>
  <div class="banner ff-left">
    <div class="container">
      <?php $args = array(
					'post_type'=> 'random_tips',
					'orderby'    => 'rand',
					'posts_per_page' => 1
				);
				query_posts( $args ); ?>
      <?php while ( have_posts() ) : the_post(); ?>
      <h4>
        <?php the_content(); ?>
      </h4>
      <?php endwhile; wp_reset_query(); ?>
    </div>
  </div>
  <!--banner -->
  <div class="blogs bloginner page_cont"> 
    <!--container -->
    <div class="container"> 
      <!--blog-left -->
      <div class="blog-left ff-left">
        <article>
          <div class="blog-detail training-reg-main">
            <h4>Training Registration</h4>
            <div class="training-reg">
              <form method="post" name="training_form" id="training_form">
                <ul>
                  <li>
                    <input type="text" name="fname" id="fname" value="" placeholder="First Name*" required="" class="hm-cnt-txbx" />
                  </li>
                  <li>
                    <input type="text" name="mname" id="mname" value="" placeholder="Middle Name" class="hm-cnt-txbx" />
                  </li>
                  <li>
                    <input type="text" name="lname" id="lname" value="" placeholder="Last Name*" required="" class="hm-cnt-txbx" />
                  </li>
                  <li>
                    <select name="apply_post" id="apply_post" class="hm-cnt-slct selectpicker">
                      <option value="">Select Post</option>
                      <option value="PHP">PHP</option>
                      <option value="Android">Android</option>
                      <option value="iOS">iOS</option>
                      <option value="Web Designer">Web Designer</option>
                      <option value="HTML">HTML</option>
                      <option value="BDE">BDE</option>
                      <option value="other">Other</option>
                    </select>
                  </li>
                  <li>
                    <input type="text" name="college" id="college" value="" placeholder="College*" required="" class="hm-cnt-txbx" />
                  </li>
                  <li>
                    <input type="text" name="university" id="university" value="" placeholder="University*" required="" class="hm-cnt-txbx" />
                  </li>
                  <li>
                    <input type="text" id="datepicker" name="datepicker" placeholder="Birthdate*">
                  </li>
                  <li>
                    <select name="passout_yr" id="passout_yr" class="hm-cnt-slct selectpicker">
                      <option value="">Select Passout year</option>
                      <option value="2006">2006</option>
                      <option value="2007">2007</option>
                      <option value="2008">2008</option>
                      <option value="2009">2009</option>
                      <option value="2010">2010</option>
                      <option value="2011">2011</option>
                      <option value="2012">2012</option>
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                    </select>
                  </li>
                  <li>
                    <input type="text" name="mobile_no" id="mobile_no" value="" placeholder="Mobile No*" class="hm-cnt-txbx" />
                  </li>
                  <li>
                    <input type="email" name="email" id="email" value="" placeholder="Email *" class="hm-cnt-txbx" />
                  </li>
                  <li class="full-width">
                    <textarea name="address" id="address" class="hm-cnt-txara" placeholder="Address*" ></textarea>
                  </li>
                  <li class="full-width">
                    <input type="button" name="reg_submit" id="reg_submit" value="Submit" class="hm-cnt-bt" />
                  </li>
                </ul>
              </form>
            </div>
          </div>
        </article>
        </article>
      </div>
      <!--blog-left -->
      <?php get_sidebar('page'); ?>
    </div>
    <!--container --> 
  </div>
  <!--blogs --> 
  
</div>
<!--inner-page -->
<style>
.train h4{text-align: center !important;}
.training-reg{float: left; width: 100%; background: #5279b8; padding: 17px;}
#training_form {width: 50%; margin: 0 auto;}
#training_form ul{padding: 0px !important; margin: 0px !important;}
#training_form ul li{background: none; padding-left: 0px !important; margin-bottom: 10px !important;}
#training_form input, #training_form textarea {    width: 100%;}
#training_form #reg_submit{ background: none repeat scroll 0 0 #fff;    border: 1px solid #279eea;    color: #279eea;    font-size: 18px;}
#training_form #reg_submit:hover{ background: none repeat scroll 0 0 #279eea; color: #fff;}
#training_form .btn-group{width: 100%;}
input[type=text]:focus, textarea:focus {
  box-shadow: 0 0 5px rgba(82, 121, 184, 1);
  border: 1px solid rgba(82, 121, 184, 1);
}

 </style>
<?php get_footer(); ?>
<script type="text/javascript">
jQuery('#reg_submit').click(function(){
	var fname = jQuery('#fname').val();
	var mname = jQuery('#mname').val();
	var lname = jQuery('#lname').val();
	var apply_post = jQuery('#apply_post').val();
	var college = jQuery('#college').val();
	var university = jQuery('#university').val();
	var datepicker = jQuery('#datepicker').val();
	var passout_yr = jQuery('#passout_yr').val();
	var address = jQuery('#address').val();
	var mobile_no = jQuery('#mobile_no').val();
	var email = jQuery('#email').val();
		
	if (jQuery('#training_form').valid()){
			
		var data = {};
		data.fname = fname;
  	    data.mname = mname;
		data.lname = lname;
		data.apply_post = apply_post;
  	    data.college = college;
		data.university = university;
		data.datepicker = datepicker;
  	    data.passout_yr = passout_yr;
		data.address = address;
		data.mobile_no = mobile_no;
		data.email = email;
		data.action = "TrainRegi_action";
		jQuery.post('<?php echo rawurldecode(esc_url( home_url( '/' ) )); ?>wp-admin/admin-ajax.php',data, locationSuccess);
	}	
	function locationSuccess(result){ //onSuccessFunction
			
		if(result==1){
			alert('Your request has been submitted. Thank You!');
			//window.location.href = document.location.href;
			//window.location.href="http://www.letsnurture.com/thank.html";
			jQuery("#training_form")[0].reset();
		}else{
			alert('Sorry! Failed to submit your request. Please try after some time.');	
		}
	}
});
$(document).ready(function(){
		$("#reg_submit").click(function(){
			$(".btn-group .btn").removeClass("error");
			$("select.error").next().children().addClass("error");
		});
});
</script> 
<script>
 $(function() {
    $( "#datepicker" ).datepicker({
 				  changeMonth: true,
				  changeYear: true,
				  //minDate: "-100Y", 
				  dateFormat: "mm/dd/yy",
				  yearRange: "-30:-16", // last hundred years
				  altField: "#alternate",
				  altFormat: "yy-mm-dd",
				   maxDate: 0,
	  });
});
</script>