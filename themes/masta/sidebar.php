<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<div class="main_primary">
          <div class="mas_slider">
	<div id="slider5">
		<a class="buttons prev" href="#">left</a>
		<div class="viewport">
			<ul class="overview">
            
            <?php
	        $args = array( 'post_type' => 'product', 'order' => 'ASC');
        $loop = new WP_Query( $args );
       while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>
      <?php woocommerce_show_product_sale_flash( $post, $product );?>
      
      <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size);?>  
				<li>
                <div class="sl_img"><a href="<?php echo get_permalink($product_id); ?>"><img src="<?php  print_r($src[0]);?>"  width="120px;"/></a></div>
                <div class="buy_now"><div class="but_btn"><a href="<?php echo get_permalink($product_id); ?>">Buy Now</a></div></div>
                </li>
      
      <?php endwhile;?>    
      
               	
			</ul>
		</div>
		<a class="buttons next" href="#">right</a>
	</div>
    </div>
    

         </div>
        
       
        
	<?php /*?><?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
			<?php endif; ?><?php */?>