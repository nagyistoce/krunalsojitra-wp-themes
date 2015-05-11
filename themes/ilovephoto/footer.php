<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<!-- ### Sidebar Menu ##################################################################### -->
		<div id="st-container" class="st-container">
			<div class="st-menu st-effect-1">
				<div class="fullwidth site-infos">
					<!-- <div class="logo">
						<a href="index.html">
							<img src="img/logo.png" alt="Letsnurture" >
						</a>
					</div> -->
					<a href="<?php echo home_url();?>"><h3 class="section-title">I <i class="red">♥</i> Photography</h3></a>
					<!-- <span class="section-description">I <i class="fa fa-heart"></i> Photography</span> -->
				</div>
				<nav class="fullwidth sidebar-navigation-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
				</nav>
				<div class="fullwidth newsletter">
					<div id="mc_embed_signup">
						<h4 class="section-title">Newsletter</h4>
						<span class="section-description">Subscribe and get the latest news about events and collections right to your inbox.</span>
					    <div id="email">
					    	<?php echo do_shortcode('[wysija_form id="1"]');?>
							<!-- <form action="#" id="invite" method="POST">
								<input type="text" placeholder="Enter email address" name="email" id="address" data-validate="validate(required, email)"/>
								<button type="submit" class="hidden">Submit</button>
								<span id="result" class="section-description"></span>
							</form>  -->
						</div>
					</div>
				</div> 
				<div class="fullwidth sidebar-social-networks">
					<ul>
						<li class="facebook"><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li class="twitter"><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li class="googleplus"><a href="#" title="Google+"><i class="fa fa-google-plus"></i></a></li>
						<li class="youtube"><a href="#" title="Youtube"><i class="fa fa-youtube"></i></a></li>
						<li class="pinterest"><a href="#" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li class="linkedin"><a href="#" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
				<div class="fullwidth bottom-links">
					<p><?php echo date("Y"); ?> © <a href="http://www.letsnurture.com/" title="Letsnurture">Letsnurture</a>. All rights reserved.</p>
				</div>
			</div>
		</div>
		
		<!-- gallery page js -->
      	<?php if(is_page(77)){?>
		<div id="filter-nav">
			<nav id="filter-main-nav">
				<ul>
					<li><a href="#" data-filter="*">All</a></li>
					<li><a href="#" data-filter=".wild">In the wild</a></li>
					<li><a href="#" data-filter=".city-break">City Break</a></li>
					<li><a href="#" data-filter=".paris">Paris</a></li>
					<li><a href="#" data-filter=".los-angeles">Los Angeles</a></li>
					<li><a href="#" data-filter=".las-vegas">Las Vegas</a></li>
					<li class="filter-title">Filters</li>
				</ul>
			</nav>
			<a href="#" class="filter-nav-trigger"><span class="fa fa-filter"></span></a>
		</div>
		<?php }?>
		
		
		<!-- ### JS Scripts ##################################################################### -->
		<script src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/sidebarEffects.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/classie.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/transition.js"></script>
		
		<script src="<?php bloginfo('template_url'); ?>/js/jquery.ketchup.all.min.js"></script>
		
		<!-- contact pagejs -->
		<?php if(is_page(66)){?>
		<script src="<?php bloginfo('template_url'); ?>/js/modernizr.form.custom.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/stepsForm.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/contact.js"></script>
        <script src="<?php bloginfo('template_url'); ?>/js/jquery.form.js"></script>
        <?php }?>
        <!-- contact pagejs -->
        
      	<!-- gallery page js -->
      	<?php if(is_page(77)){?>
		<script src="<?php bloginfo('template_url'); ?>/js/modernizr.custom.gallery.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/cbpGridGallery.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/isotope/modernizr-isotope.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/isotope/isotope.pkgd.min.js"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/isotope/imagesloaded.pkgd.min.js"></script>
	    <?php }?>
	    <!-- gallery page js -->
        
        
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<a href="#" class="back-to-top">Top</a>


<!-- <noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://googleads.g.googleads.net/pagead/viewthroughconversion/1008623479/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript> -->

<?php wp_footer(); ?>

</body>
</html>
