<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	
<div class="fooer_area">
  <div id="wrapper_footer">
  <div class="footer_link_area">
    <div class="about_us_area">
      <div class="about_us_head">About Us </div>
      
      <div class="about_txt">We are a professional social media marketing agency. We are experts in creating viral buzz around  the internet for your product, service, company, or even if you are an individual.</div>
    </div>
    <div class="about_us_area">
      <div class="about_us_head">Quick Links</div>
      <div class="quick_link">
        <?php if ( is_active_sidebar( 'footer_menu' ) ) : ?>
					<?php dynamic_sidebar( 'footer_menu' ); ?>
			<?php endif; ?>
      </div>
    </div>
    <div class="about_us_area">
      <div class="about_us_head">Contact Us</div>
       <?php if ( is_active_sidebar( 'footer_contact_us' ) ) : ?>
					<?php dynamic_sidebar( 'footer_contact_us' ); ?>
			<?php endif; ?>
      
    </div>
    <div class="about_us_area resm1">
      <div class="about_us_head">Connect with Us</div>
      <div class="social_images">
        <div class="social_images1"> <a href="http://www.facebook.com/"></a> </div>
        <div class="social_images1 social_images2"> <a href="https://twitter.com/"></a> </div>
        <div class="social_images1 social_images3"> <a href="https://plus.google.com/"></a> </div>
        <div class="social_images1 social_images4"> <a href="http://www.linkedin.com/"></a> </div>
        <div class="social_images1 social_images5"> <a href="https://vimeo.com/"></a> </div>
        <div class="social_images1 social_images6"> <a href="https://myspace.com/"></a> </div>
      </div>
    </div>
    </div>
 <div class="copy_right_area">
  <div class="copy_right_txt">Copyright © 2013 social piggy All Rights reserved.</div>
  <div class="paypal_img_area">
  
        <div class="paypal_images1"> <a href="#"></a> </div>

  </div>
  </div>
 </div>
</div>
<?php wp_footer(); ?>
<!---------multi select js----->
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.multi-select.js" type="text/javascript"></script>
    <script type="text/javascript">
	$('#pre-selected-options').multiSelect();
	
	$('#country-selected-options').multiSelect();
	
	$('#category-selected-options').multiSelect();
	
	
	</script>

</body>
</html>