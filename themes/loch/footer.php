<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */?>
<!--main-bot-content-part-start-->

<div class="main-bot-content-part"> 
  <!--container-start-->
  <div class="container"> 
    <!--bot-content-inner-start-->
    <div class="bot-content-inner"> 
      <!--contact-bot-start-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 contact-bot" id="foot-cont">
        <h4>Contact Us</h4>
       <?php echo do_shortcode('[contact-form-7 id="278" title="footer"]'); ?>
      </div>
      <!--contact-bot-end--> 
      
      <!--latest-news-start-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 latest-news">
        <h4>Latest News</h4>
        <?php
			$args = array(
			'post_type'=> 'post',
            /*'category'  => '12',*/
              'orderby' => 'post_date',
			'posts_per_page' => '2',
           );
            $i = 1;
			global $more; 
			query_posts( $args ); 
			while (have_posts()) : the_post(); 
			$more = 0;
		?>
        <!--latest-inblog1-start-->
        <div class="latest-blog1">
          <div class="latest-in-blog1"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-custom-size');?></a></div>
          <div class="latest-blog1-txt">
            <p> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
              <?php the_time('F d,Y') ?><br>
              <br>
              <?php content(12); ?></p>
          </div>
        </div>
        <!--latest-inblog-end--> 
        <?php endwhile; ?>
     
      </div>
      <!--latest-news-end--> 
      
      <!--follow-us-start-->
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 follow-us">
        <h4>Follow Us</h4>
        <div class="follow-inner">
                    <a class="twitter-timeline"  href="https://twitter.com/Loch_Leven" data-widget-id="560047540695879680"  width="290"  height="250">Tweets by @Loch_Leven</a>
            <script>	! function(d, s, id) {		var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';		if (!d.getElementById(id)) {			js = d.createElement(s);			js.id = id;			js.src = p + "://platform.twitter.com/widgets.js";			fjs.parentNode.insertBefore(js, fjs);		}	}(document, "script", "twitter-wjs"); </script>
        
        </div>
      </div>
      <!--follow-us-end--> 
      
    </div>
    <!--bot-content-inner-end--> 
  </div>
  <!--container-end--> 
</div>
<!--main-bot-content-part-end--> 

<!--footer-start-->
<div class="main-footer"> 
  <!--container-start-->
  <div class="container">
    <div class="footer-in">
      <div class="footer-in-left fot-menu">
      	<?php wp_nav_menu(array('theme_location' => 'footer_menu')); ?>
      	
        <span class="copy-rigt"> © Dalmatian Windows <?php echo date("Y"); ?>. All Rights Reserved.Designed by <a href="http://www.wsiglobalnet.com/" title="WSI Globalnet" target="_blank">WSI Globalnet</a>.</span></div>
      <div class="footer-in-right"><img src="<?php echo get_template_directory_uri(); ?>/images/footer_logos.png" alt=""/></div>
      <div class="clearfix"></div>
    </div>
  </div>
  <!--container-end--> 
</div>
<!--footer-end--> 
<!--last-footer-start-->
<div class="footer-last-put">
  <div class="container">
    <div class="footer-last-inner">
      <p>This website uses cookies to improve your experience. We'll assume you're ok with this, but you can opt-out if you wish</p>
    </div>
  </div>
</div>
<!--last-footer-end-->

</div>
<!--row-end-->
</div>
<!--container-fluid-end--> 

<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script> 
<script>	jQuery('.carousel').carousel({
		interval : 3000 //changes the speed
	})
	jQuery('.navbar-toggle').on('click', function() {
		jQuery('.navbar-collapse').slideToggle();
	});
    </script> 
<script type="text/javascript">	jQuery(window).scroll(function() {
		// find the id with class 'active' and remove it
		jQuery(".sticky-header").addClass("fixed");
		// get the amount the window has scrolled
		var scroll = jQuery(window).scrollTop();
		// add the 'active' class to the correct id based on the scroll amount
		if (scroll <= 5) {
			jQuery(".sticky-header").removeClass("fixed");
		}
	});
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css" rel="stylesheet" />
<script type="text/javascript">	jQuery(document).ready(function() {
		jQuery('.bxslider').bxSlider({
			pager : true,
			auto : true
		});
	});
</script>
<?php wp_footer(); ?>
</body></html>