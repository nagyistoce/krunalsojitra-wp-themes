<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package aThemes
 */
$at_options = get_option('at_options');
?>
		</div>
	<!-- #main --></div>

				<div class="footer-section">
					<div class="footer-category container">
						<?php if ( ! dynamic_sidebar( 'sidebar-6' ) ) : ?>
							<?php endif; // end sidebar widget area ?>
							<div class="visit-count">
								<?php if ( ! dynamic_sidebar( 'sidebar-5' ) ) : ?>
								<?php endif; // end sidebar widget area ?>
							</div>
					</div>
				</div>

	<footer id="colophon" class="site-footer" role="contentinfo">
					
		<div class="clearfix container">
			<div class="site-info">
				&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.
			</div><!-- .site-info -->

			<div class="site-credit">
				<!-- NOTE: Please support us by keeping the following link ;) -->
				Website Design and Developed by <a href="http://www.letsnurture.com/" target="_blank">LetsNurture</a>
			</div><!-- .site-credit -->
		</div>
	<!-- #colophon --></footer>

<?php wp_footer(); ?>
<?php echo $at_options['code_footer']; ?>

</body>
</html>