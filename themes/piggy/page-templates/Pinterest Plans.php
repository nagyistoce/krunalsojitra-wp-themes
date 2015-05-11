<?php
/**
 * Template Name: Pinterest Plans
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
<?php
			$args = array(
                 'post_type'=>'all_plans'
            );

            $i = 1;
			global $more; 

			query_posts( $args ); 

			while (have_posts()) : the_post(); 

			$more = 0;

			?>
<div class="navi in_con dism1">
  <div class="navi1">
    <div class="in_con1">
      <div class="in_con2">
        <h1> <?php echo get_field('pinterest_plans_title'); ?> </h1>
      </div>
    </div>
    <div class="in_con1">
      <div class="dism2"> <img src="<?php echo get_field('pinterest_image'); ?>" /> </div>
      <div class="dism3"> <?php echo get_field('pinterest_plans_description'); ?> </div>
    </div>
  </div>
</div>
<? endwhile;?>
<div class="navi in_con">
  <div class="navi1">
    <div class="package_middle packa6">
      <div class="row1">
        <div class="package_middle1" style="width: 100%;">
          <div class="package_middle_22 package_middle_22_1"> &nbsp; </div>
          <h2>Select Your Plan</h2>
        </div>
        <div class="sub_row mac1">
          <p> pinterest Followers </p>
        </div>
        <div class="sub_row mac1">
          <p> pinterest Followers </p>
        </div>
        <div class="sub_row mac1">
          <p> Safe Method </p>
        </div>
        <div class="sub_row mac1">
          <p> Turnaround Time </p>
        </div>
        <div class="sub_row mac1">
          <p style="height:68px;"> </p>
        </div>
      </div>
      <?php
	        $args = array( 'post_type' => 'product', 'product_cat' => 'pinterest-plans', 'order' => 'ASC');
        $loop = new WP_Query( $args );


	
        while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>
      <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
      <div class="row2">
        <div class="sub_row">
          <div class="package_middle_22">
            <?php the_title(); ?>
          </div>
          <div class="package_22 ">
            <p> OneTime Payment </p>
            <span><?php echo $product->get_price_html(); ?></span> </div>
        </div>
        <div class="sub_row  mac2"><?php echo $value = get_field( "total_sales" ); ?> </div>
        <div class="sub_row mac2"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/right_normal.png"/> </div>
        <div class="sub_row mac2"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/right_normal.png" /> </div>
        <div class="sub_row mac2"> <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?> </div>
        <div class="sub_row  mac2"> <a href="#">
          <div class="in_con6 mac5">
            <div class="in_con6_1 mac4">
              <div class="in_con6_2 mac3">
                <?php woocommerce_template_loop_add_to_cart( $loop->post, $product );  ?>
              </div>
            </div>
          </div>
          </a>
           </div>
      </div>
      <?php endwhile;?>
    </div>
    <div class="packa1 packa7">
      <div class="panel-group" id="accordion">
        <?php
	        $args = array( 'post_type' => 'product', 'product_cat' => 'pinterest-plans', 'order' => 'ASC');
        $loop = new WP_Query( $args );


	
        while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>
        <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
        <div class="panel panel-default packa5">
          <div class="panel-heading">
            <h4 class="panel-title"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
              <?php the_title(); ?>
              </a> </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="packa2">
                <div class="packa4">
                  <div class="package_middle1 packa3"> &nbsp; </div>
                  <div class="package_middle1 package_middle_21 packa3">
                    <div class="package_22 ">
                      <p> OneTime Payment </p>
                      <span><?php echo $product->get_price_html(); ?></span> </div>
                  </div>
                </div>
                <div class="packa4">
                  <div class="package_middle1 mac1 packa3">
                    <p> pinterest Followers </p>
                  </div>
                  <div class="package_middle1 package_middle_21 mac2 packa3"><?php echo $value = get_field( "total_sales" ); ?></div>
                </div>
                <div class="packa4">
                  <div class="package_middle1 mac1 packa3">
                    <p> Safe Method </p>
                  </div>
                  <div class="package_middle1 package_middle_21 mac2 packa3"> <a href="#"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/right.png"> </a> </div>
                </div>
                <div class="packa4">
                  <div class="package_middle1 mac1 packa3">
                    <p> Turnaround Time </p>
                  </div>
                  <div class="package_middle1 package_middle_21 mac2 packa3"> <a href="#"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/right.png"> </a> </div>
                </div>
                <div class="packa4">
                  <div class="package_middle1 mac1 packa3">
                    <p> Real Users </p>
                  </div>
                  <div class="package_middle1 package_middle_21 mac2 packa3"> <a href="#"> <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?> </a> </div>
                </div>
                <div class="packa4">
                  <div class="package_middle1 mac1 packa3">
                    <p>&nbsp; </p>
                  </div>
                  <div class="package_middle1 package_middle_21 mac2 packa3"> <a href="#">
                    <div class="in_con6 mac5">
                      <div class="in_con6_1 mac4">
                        <div class="in_con6_2 mac3">
                          <?php woocommerce_template_loop_add_to_cart( $loop->post, $product );  ?>
                        </div>
                      </div>
                    </div>
                    </a> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile;?>
      </div>
    </div>
  </div>
</div>
<!-------------------------------------------------------scroll slider-------------------------------->
<div class="scrom1">
  <div class="scrom2">
    <div class="scrom3">
      <div class="scrom4">
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
    </div>
  </div>
</div>
<?php get_footer(); ?>
