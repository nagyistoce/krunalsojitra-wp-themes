<?php
/**
 * Template Name: Staff Induction Test
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<section class="lor1">
  <div class="lol2">
    <div class="das1">
     
    <div class="test_que">
		<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
						<?php endwhile;?>
     <?php //echo sprintf( '<a href="%s">%s</a>', esc_url( home_url( '/' ) ), __( 'Register' ) );?>
    </div>
		</div>
	</div>
</section>

<?php /*?><script>
$(window).load(function() {
 $("#nxt19").click(function(){
	 
	 window.location.href = "http://localhost/staffportal/staff-induction-test-result";

 });
 });
</script><?php */?>

<?php get_footer(); ?>
