<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

 <div class="section" id="contact">
    	<!--container -->
    	<div class="container">
    		<nav class="side-navigation hide-mobile">
			<ul>
    		<li><a title="Welcome" href="#main"><span>Welcome</span></a></li>
			<li><a title="Services" href="#services"><span>Services</span></a></li>
			<li><a title="Testimonials" href="#clients"><span>Testimonials</span></a></li>
			<li><a title="Portfolio" href="#portfolio"><span>Portfolio</span></a></li>
			<li><a title="About" href="#about"><span>About</span></a></li>
			<li><a class="active" title="Contact" href="#contact"><span>Contact</span></a></li>
			</ul>
			</nav>
			
        	<h2 class="animated" data-animation="bounceInDown" data-revert="bounceOutUp">Get in touch</h2>
            <div class="clear"></div>
            <span class="line animated" data-animation="bounceInLeft" data-revert="bounceOutRight">&nbsp;</span>
            <div class="clear"></div>
            <div class="cnt-left animated home_fot" data-animation="fadeInLeft" data-revert="fadeOutLeft">
            	<?php dynamic_sidebar('sidebar-3'); ?>
            
            </div>
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
            <form class="animated home_footer" data-animation="fadeInRight" data-revert="fadeOutRight" method="post" id="home_conct_form">
            	<input type="hidden" name="innscrollbottom" id="innscrollbottom" />
            	<ul>
                	<li>
                    	<label>Your name *</label>
	                    <input type="text" name="your_name"   value="" placeholder=""  class="hm-cnt-txbx <?php  if(isset($errName)) echo $errName; ?>" />
                    </li>
                	<li>
                    	<label>Company *</label>
	                    <input type="text" name="company" value="" placeholder="" class="hm-cnt-txbx <?php  if(isset($errcompany)) echo $errcompany; ?>" />
                    </li>
                	<li class="half">
                    	<label>Phone *</label>
	                    <input type="text" name="phone" value="" placeholder=""  class="hm-cnt-txbx <?php  if(isset($errPhone)) echo $errPhone; ?>" />
                    </li>
                	<li class="half ff-right">
                    	<label>Email *</label>
	                    <input type="email" name="email" value="" placeholder="" " class="hm-cnt-txbx <?php  if(isset($errEmail)) echo $errEmail; ?>" />
                    </li>
                	<li>
                    	<label>Category *</label>
	                    <select name="category" class="hm-cnt-slct selectpicker <?php  if(isset($errCategory)) echo $errCategory; ?>" >
                        	<option value="">Select Category</option>
                            <option value="Website Design">Website Design</option>
                            <option value="Mobile App Development">Mobile App Development</option>
                            <option value="Search Engine Optimization">Search Engine Optimization</option>
                            <option value="Graphic Design">Graphic Design</option>
                            <option value="other">Other</option>
                        </select>
                    </li>
                	<li>
                    	<label>Enquiry *</label>
	                    <textarea name="enquiry" class="hm-cnt-txara <?php  if(isset($errEnquiry)) echo $errEnquiry; ?>"></textarea>
                    </li>
                    <li class="cpcha in_fot_cat">
                    	  <p>What's <?php echo $math; ?> = </p><input name="answer" type="text" /><p style="width: 245px ! important; text-align: right;"><?php echo $ctpwrong; ?></p><br />
									<!-- <input id="num1" class="sum" type="text" name="num1" value="<?php echo rand(1,4) ?>" readonly="readonly" /><span>+</span>
									<input id="num2" class="sum" type="text" name="num2" value="<?php echo rand(5,9) ?>" readonly="readonly" /><span>=</span>
									<input id="captcha" class="captcha <?php  if(isset($errCaptcha)) echo $errCaptcha; ?>" type="text" name="captcha" maxlength="2" />
									 -->
					</li>
                    
                	<li>
	                    <input type="submit" name="home_submit" id="home_submit"  value="Submit" class="hm-cnt-bt" />
                    </li>
                </ul>
            </form>
            
        </div>
        <!--container -->
        
            <div class="cpy">
            	<div class="container">
       			 Lets Nurture is registered company in India & UK. Have representatives in Australia & USA also.
       			</div>
       			<div class="container ft-menu">
       			 <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'footer-menu ' ) ); ?>
       			</div>
            	<!-- Copyright © <?php echo date("Y"); ?> Lets Nurture. India | <a href="http://www.letsnurture.co.uk/" title="LetsNurture UK">UK </a> <a href="<?php echo get_permalink(5241); ?>" title="Sitemap">Sitemap</a> -->
            </div>
    </div>
</div>
<!--main -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/bootstrap-hover-dropdown.min.js"></script>
<script>
var std_height = jQuery('header').height();
//var ft_height = jQuery('footer').height();

jQuery(window).load(function () {
	jQuery('#side-menu').css({
'height': ((jQuery(window).height())) - parseInt(std_height) - parseInt(17) + 'px'
		
	});
	
	jQuery('.menu').css({
'top': ((jQuery(window).height())) - parseInt(std_height) - parseInt(17) + 'px !important'
		
	});
	
	jQuery('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: true,
    slideshow: false,
    itemWidth: 75,
    itemMargin: 5,
    asNavFor: '#slider'
  });
   
  jQuery('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: true,
    slideshow: false,
    sync: "#carousel"
  });
 	
});
jQuery(window).resize(function () {
	jQuery('#side-menu').css({
'top': ((jQuery(window).height())) - parseInt(std_height) - parseInt(17) + 'px'
		
	});
	
	jQuery('.menu').css({
'top': ((jQuery(window).height())) - parseInt(std_height) - parseInt(17) + 'px !important'
		
	});
	
	/*jQuery('.section').css({
'height': (($(window).height())) - parseInt(std_height) - parseInt(17) + 'px'
		
	});*/
	
});
</script>
<script type="text/javascript">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });

jQuery(document).ready(function(){
	jQuery('.more').click(function(){
		jQuery('.menu').css({
'top': ((jQuery(window).height())) - parseInt(std_height) - parseInt(17) + 'px !important'
		
		});
	});
	
	
   jQuery("#side-menu").animate();
   //jQuery(".togle-menue").animate();
   jQuery('.slidercont').flexslider({
		animation: "slide",
		easing: "swing",
     	minItems: 1,
     	move: 1,
     	useCSS: false,
		directionNav: false
	});
	
  

   var height = '' ;
   jQuery(window).resize(function () {
   height = "height: "+((jQuery(window).height())) - parseInt(std_height) - parseInt(33) + "px";
   	
	});
   /*jQuery(".togle-menu").click(function(){
  
   if(jQuery("#side-menu").attr('style').indexOf("right: 0px;") > -1 ){
	   jQuery("#side-menu").animate().css("right","-260px");
   } else{
	   jQuery("#side-menu").animate().css("right","0px");
	   }
   });*/
   
   jQuery(".close").click(function(){
   jQuery("#side-menu").animate().css("right","-260px");
   });
   
	jQuery('.slimmenu').slimmenu(
	{   resizeWidth: '800',
	collapserTitle: '',
	animSpeed: 300,
	easingEffect: null,
	indentChildren: false,
	childrenIndenter: '&nbsp;'
	});

});

</script>    
<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-select.js"></script>
<script type="text/javascript">
window.onload=function(){
	$('.selectpicker').selectpicker();
};
</script>

<!--Menu js --> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.slimmenu.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-easing.js"></script> 
<script type="text/javascript">
$('#gallary').each(function() { // the containers for all your galleries
	$(this).magnificPopup({
		delegate: 'li a', // the selector for gallery item
		type: 'image',
		gallery: {
		  enabled:true
		}
	});
});

</script> 

<!--Menu js -->
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/waypoints.min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/main.js'></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });
    });
    $(document).ready(function () {
        $('#horizontalTabPortfolio').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);

                $name.text($tab.text());

                $info.show();
            }
        });
    });
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.magnific-popup.js"></script> 
<script>
	$('.popup-gallery').each(function() { // the containers for all your galleries
		$(this).magnificPopup({
			delegate: 'li a', // the selector for gallery item
			type: 'image',
			gallery: {
			  enabled:true
			}
		});
	});
	
  
 </script>
 
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-12421497-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- <script type="text/javascript">
// animsition loader full page
$(document).ready(function() {
  $(".animsition").animsition({
  	inClass               :   'fade-in-up-sm',
    outClass              :   'fade-out-up-sm',
    inDuration            :    1500,
    outDuration           :    800,
    linkElement           :   '.animsition-link',
    // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
    loading               :    true,
    loadingParentElement  :   'body', //animsition wrapper element
    loadingClass          :   'animsition-loading',
    unSupportCss          : [ 'animation-duration',
                              '-webkit-animation-duration',
                              '-o-animation-duration'
                            ],
     overlay               :   false,
    
    overlayClass          :   'animsition-overlay-slide',
    overlayParentElement  :   'body'
  });
});
</script> -->

</div><!-- animsition Starting Header -->
<?php wp_footer(); ?>

</body>
</html>