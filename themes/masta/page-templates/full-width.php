<?php
/**
 * Template Name: test
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
	        $args = array( 'post_type' => 'product', 'order' => 'ASC');
        $loop = new WP_Query( $args );
       while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>
      <?php woocommerce_show_product_sale_flash( $post, $product );?>
      
       <?php the_title(); ?>
       <?php echo $product->get_price_html(); ?>
        <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
        <?php woocommerce_template_loop_add_to_cart( $loop->post, $product );  ?>
        
        <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size);?>
       <img src="<?php  //print_r($src[0]);?>" />
      
       <?php  echo '<a href="'.get_permalink($product_id).'">Buy Now</a>'; ?>
      <?php endwhile;?>       
<?php get_footer(); ?>