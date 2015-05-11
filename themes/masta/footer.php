<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div>
  </div>
</div><!-- #primary -->

<div class="socie_footer_part">
  <div class="soci_in_part">
    <div class="soci_main_part">
    <?php if ( is_active_sidebar( 'footer_social' ) ) : ?>
		<?php dynamic_sidebar( 'footer_social' ); ?>
		<?php endif; ?>
          </div>
  </div>
</div>
<div class="socie_footer_part_nnew">
  <div class="soci_in_part_new">
    <div class="footer_navi_part">
      <div class="navi">
       <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_class' => 'nav-menu' ) ); ?>
        <span>©2013 MastaPlasta Ltd. All Rights Reserved.</span> </div>
        <div class="paypal_logo"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/cards.png" /></div>
        
    </div>
  </div>
</div>

<?php wp_footer(); ?>
		
</body>
</html>