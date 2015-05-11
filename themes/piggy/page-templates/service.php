<?php
/**
 * Template Name: Service Template
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

<div class="navi">
  <div class="navi1">
    <div class="navi2">
      <?php if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?>
    </div>
  </div>
</div>
<div class="navi in_con">
  <div class="navi1">
    <div class="in_con1">
      <div class="in_con2">
        <h1>
          <?php the_title(); ?>
        </h1>
      </div>
    </div>
    <div class="in_con1">
    <?php
$cats = get_terms('product_cat', array(
    'hide_empty' => 0,
    'orderby' => 'name'
	
));
?>

      <?php foreach($cats as $cat) : ?>           
        <?php   global $wp_query;
		//print_r($cat);
		$terms = array(15,22,14,19,26,24,13,21,23);
            if(in_array($cat->term_id, $terms)) {
                $category_id = $cat->term_id;
                $thumbnail_id   = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
			 ?>
      <div class="in_con3">
        <div class="in_con4">
          <div class="in_con5"> <?php echo '<img src="'.$image.'" alt="'. $cat->name .'"/>';?>
            <p> <?php echo  $cat->name ;?> </p>
          </div>
        </div>
        <div class="in_con6">
          <div class="in_con6_1">
            <div class="in_con6_2">
              <?php  echo '<a href="'.get_bloginfo('wpurl').'/services/'.$cat->slug.'">Buy Now</a>'; ?>
            </div>
          </div>
        </div>
      </div>
      
      <?php } endforeach; ?>
    </div>
    <div class="in_con1">
      <div class="in_con7">
        <p> <i> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/service_call.png" /> </i> Our Services are backed by 24/7 Email Support, and a 100% Satisfaction Guaruntee! </p>
      </div>
    </div>
  </div>
</div>
<div class="choose_area">
  <div class="ser1">
    <div class="ser2">
      <div class="ser3">
        <div class="ser3_1">
          <h2> After Ordering </h2>
        </div>
        <?php if ( is_active_sidebar( 'after_ordering' ) ) : ?>
        <?php dynamic_sidebar( 'after_ordering' ); ?>
        <?php endif; ?>
      </div>
      <div class="ser4">
        <div class="ser3_1">
          <h2> How Does it Work? </h2>
        </div>
        <div class="ser3_1 ser3_2 ser4_2">
          <div class="ser3_4">
            <p> All of our services are done by real humans. No bots or proxies are ever used! Since they are 
              done by real humans, your likes, followers, views, and reviews are guarunteed to stick! </p>
            <p class="ser4_1"> <a href="#"> Click Here </a> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
