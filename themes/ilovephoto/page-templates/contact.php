<?php
/**
 * Template Name: Contact us
 *
 */
get_header(); ?>

<div class="index-contact full-height">
	

		<div id="container" class="container">

		<a class="cd-primary-nav-trigger" id="trigger-menu" href="#0">
		  	<span class="cd-menu-icon"></span>
		</a>
		<!-- BOF: Fancy Search Form (content imported via jQuery: from search-form.html) -->
		<div id="Letsnurture-search" class="Letsnurture-search">
			<form action="#l">
				<input class="Letsnurture-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
				<input class="Letsnurture-search-submit" type="submit" value="">
				<span class="Letsnurture-icon-search fa fa-search"></span>
			</form>
		</div>
		<!-- EOF: Fancy Search Form (content imported via jQuery: from search-form.html) -->

			<header class="header">
				<div class="bg-img">
					<img class="async-image hide" data-src="<?php bloginfo('template_url'); ?>/img/Contact_pic.jpg" alt="" />
					<div class="overlay hidden" id="overlay"></div>
				</div>
				<div class="title">
					<h1>
						<span>CONTACT</span>
						<span>ME</span>
					</h1>
					<p class="subline">Don't be a stranger</p>

					<div>
                        <div id="theForm" class="simform">
                            <div class="simform-inner">
                                <?php echo do_shortcode('[contact-form-7 id="89" title="Contact form 1"]');?>
                            </div><!-- /simform-inner -->
                            <span class="final-message"></span>
                        </div><!-- /simform -->

				</div>
				</div>
			</header>
		</div><!-- /container -->
</div>	
	
	    
        
<?php
//get_sidebar();
get_footer();
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<script type="text/javascript">
     jQuery(document).ready(function(){
   		 jQuery("#wpcf7-f89-o1 form").validate({
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
									 minlength: 2,
						 			 maxlength: 150
								 },
								 about: 
								 {
									 required: true,
									 minlength: 2,
						 			 maxlength: 150
								 },
								 email: {
									 required: true,
									 email: true,
									maxlength: 100
								 },
								 details:{
									 required:true,
									maxlength: 400
        						 }
							 },	
						 messages: {
								 name:{
										 required: "<p>Please enter you name</p>",
										 minlength: "<p>Please enter at least 2 characters</p>",
						                 maxlength: "<p>Please enter at most 150 characters</p>"						               
								 },
								 about: {
										 required: "<p>Please enter about you</p>",
										 minlength: "<p>Please enter at least 2 characters</p>",
						                 maxlength: "<p>Please enter at most 150 characters</p>"
								},
								 email:
								 {
									 required: "<p>Please enter email</p>",
									 email: "<p>Please enter valid email address</p>"
								 },
								 details: {
										 required: "<p>Please enter details</p>"
								 }
							 }  		
			 }); //registration form validation ends(registration.php)
			});
    </script>
    <!-- jquery.validate --> 