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
<section class="lor1 user_not_login">
<div class="lol2">
<div class="das1">
<div  class="log_mes">
<div class="test_but"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Login</a></div>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Please login to view this page.</a>
    </div>
</div>
</div>
</section>
<footer class="foo">
  <div class="foo4"> Copyright Limited Risk 2013 </div>
  <div class="foo1">
    <div class="foo2">
      <nav>
        <ul>
          <?php
if ( is_user_logged_in() ) {
   ?>
        <li> <a href="<?php echo wp_logout_url( 'http://localhost/staffportal/' ); ?>" title="Logout">Logout</a></li>
        <li> <a href="<?php echo bloginfo('wpurl'); ?>/password-reset" title="Password Reset">Password Reset</a></li>
          <?php
} else {
   ?>
          <li> <a href="<?php echo bloginfo('wpurl'); ?>">Sign in</a> </li>
          <li> <a href="<?php echo bloginfo('wpurl'); ?>"> Register </a> </li>
          <li> <a href="<?php echo bloginfo('wpurl'); ?>/wp-login.php?action=lostpassword"> Forgotten Password? </a> </li>
          <?php
}
	
?>
        </ul>
      </nav>
    </div>
    <div class="foo2 foo3">
      <nav>
        <ul>
          <li> <a href="<?php echo bloginfo('wpurl'); ?>/terms-of-use"> Terms of Use </a> </li>
          <li> <a href="<?php echo bloginfo('wpurl'); ?>/contact-us"> Contact Us </a> </li>
        </ul>
      </nav>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body></html>