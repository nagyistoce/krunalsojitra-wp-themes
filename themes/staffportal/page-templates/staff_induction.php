<?php
/**
 * Template Name: Staff Induction
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

 <?php 
 
  $email_id = $current_user->user_email;
  $test_result = $wpdb->get_row("SELECT  `score` FROM  `wp_plugin_slickquiz_scores` WHERE  `createdBy` =  '$user_id' ORDER BY `id` DESC LIMIT 1");
     //echo $test_result->score;
  
$pos1 = explode("/",$test_result->score);
$pos1_trimmed1 = trim($pos1[0]);
//echo "Exame Result -> ".$pos1_trimmed1;

 

if($pos1_trimmed1 >= 16)
{ 

wp_redirect( get_bloginfo('wpurl').'/my-profile', 301 ); 

}  ?>
<?php /*?><script>
	$(function(){
	window.location.href = "http://localhost/staffportal/my-profile/";
	});
</script><?php */?>


<section class="lor1">
  <div class="lol2">
    <div class="das1">
     <div class="test_tit"><?php the_title();?></div>
    <div class="test_cont ped4">
   
<ul class="bxslider">
   <?php
			$args = array(
			'post_type'=> 'staff_induction',
            /*'category'  => '12',*/
              'order' => 'ASC',
			 'posts_per_page'=>'9'
			/*'paged' => get_query_var('paged')*/
           );
           
			global $more; 
			query_posts( $args ); 
			while (have_posts()) : the_post(); 
			
		?>
        <li><?php echo get_field('description'); ?><p class="page_num"><?php the_title();?></p></li>
        
        <?php endwhile;?>
<!--
<li><p>Morbi neque. Aliquam erat volutpat. Integer ultrices lobortis eros.  </p><div class="test_but"><a href="<?php echo bloginfo('wpurl'); ?>/staff-induction-test">TEST</a></div><p class="page_num">Page 9</p></li>-->
</ul>

<div class="outside">
   <div id="slider-prev"></div> <div id="slider-next"></div>
</div>
</div>
<script type="text/javascript">
$('.bxslider').bxSlider({
  pager: false,
  hideControlOnEnd: true,
 // nextSelector: '#slider-next',
//  prevSelector: '#slider-prev',
//  nextText: '<img src="<?php bloginfo('stylesheet_directory'); ?>/images/next.png"/>NEXT',
//  prevText: ' <p>PREV</p><img src="<?php bloginfo('stylesheet_directory'); ?>/images/pre.png"/>',
  infiniteLoop: false,
  
  
});
</script>
		</div>
	</div>
</section>


<?php get_footer(); ?>
