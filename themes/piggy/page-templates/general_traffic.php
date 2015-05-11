<?php
/**
 * Template Name: General Traffic Template
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

  

<div class="navi in_con gem1">
  <div class="navi1">
    <div class="in_con1">
      <div class="in_con2">
        <h1><?php the_title();?></h1>
      </div>
    </div>
  </div>
</div>
<div class="navi in_con">
	<div class="navi1">
    
    <!-------------------------------------------Bulk (No Taget) traffic  start------------------------------------------------>        
		<div class="middle_01 resp_mi1">
			<h2>Bulk (No Taget) traffic </h2>
			<div class="middle_1">
				<div class="middle_11"> Package Name </div>
				<div class="middle_12"> Price </div>
				<div class="middle_13"> Buy </div>
			</div>
         <?php
	        $args = array( 'post_type' => 'product', 'product_cat' => 'no-taget-traffic', 'order' => 'ASC');
        $loop = new WP_Query( $args );


	
        while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>
        <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
			<div class="middle_1 ev_od">
				<div class="middle_11 middle_14"> <?php the_title(); ?></div>
				<div class="middle_12 middle_15 val_img"><?php echo $product->get_price_html(); ?></div>
				<div class="middle_13 middle_15"><?php woocommerce_template_loop_add_to_cart( $loop->post, $product );  ?></div>
			</div>
            
            <?php endwhile;?>
					</div>
    <!--------------REsponsiv Niche (Category) Targeted Traffic  start---------------->     
        
		<div class="middle_01 resp_mi2">
			<h2>Bulk (No Taget) traffic </h2>
			<div class="middle_1">
				<div class="middle_11">
					Packages
				</div>
			</div>
		<div class="middle_1 middle_3">
        
        <?php
	        $args = array( 'post_type' => 'product', 'product_cat' => 'no-taget-traffic', 'order' => 'ASC');
        $loop = new WP_Query( $args );


	
        while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>
        <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
        
				<div class="middle_1 ev_od">
					<div class="middle_11 middle_14">
						<p>
							<?php the_title(); ?>
						</p>
						<p>
							<span class="val_img_re"><?php echo $product->get_price_html(); ?></span>
							
						</p>
						<p class="middle_13 middle_15">
							<?php woocommerce_template_loop_add_to_cart( $loop->post, $product );  ?> 
						</p>
					</div>
				</div>
                 <?php endwhile;?>
                
		  </div>
		</div>
        
  <!-------------------------------------------Niche (Category) Targeted Traffic start------------------------------------------------>      
        
		<div class="middle_01 middle_02 resp_mi1">
			<h2>Niche (Category) Targeted Traffic </h2>
			<div class="middle_1">
				<div class="middle_11"> Package Name </div>
				<div class="middle_12"> Price </div>
				<div class="middle_13"> Buy </div>
			</div>
            <?php
	        $args = array( 'post_type' => 'product', 'product_cat' => 'targeted-traffic', 'order' => 'ASC');
        $loop = new WP_Query( $args );


	
        while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>
        <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
            
			<div class="middle_1 ev_od">
				<div class="middle_11 middle_14"><?php the_title(); ?></div>
				<div class="middle_12 middle_15 val_img"><?php echo $product->get_price_html(); ?></div>
				<div class="middle_13 middle_15"><?php woocommerce_template_loop_add_to_cart( $loop->post, $product );  ?></div>
			</div>
            <?php endwhile;?>
			
		</div>
        
 <!--------------REsponsiv Niche (Category) Targeted Traffic  start---------------->           
		<div class="middle_01 middle_02 resp_mi2">
			<h2>Niche (Category) Targeted Traffic </h2>
			<div class="middle_1">
				<div class="middle_11">
					Packages
				</div>
			</div>
			<div class="middle_1 middle_3">
        
        <?php
	        $args = array( 'post_type' => 'product', 'product_cat' => 'targeted-traffic', 'order' => 'ASC');
        $loop = new WP_Query( $args );


	
        while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>
        <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
        
				<div class="middle_1 ev_od">
					<div class="middle_11 middle_14">
						<p>
							<?php the_title(); ?>
						</p>
						<p>
							<span class="val_img_re"><?php echo $product->get_price_html(); ?></span>
							
						</p>
						<p class="middle_13 middle_15">
							<?php woocommerce_template_loop_add_to_cart( $loop->post, $product );  ?> 
						</p>
					</div>
				</div>
                 <?php endwhile;?>
                
		  </div>
		</div>
        
     
 <!----------------------------Niche (Category) & Geo (Country) Targeted Traffic  start----------------------------------------->        
		<div class="middle_01 middle_03 resp_mi1">
			<h2>Niche (Category) & Geo (Country) Targeted Traffic </h2>
			<div class="middle_1">
				<div class="middle_11"> Package Name </div>
				<div class="middle_12"> Price </div>
				<div class="middle_13"> Buy </div>
			</div>
			
			<?php
	        $args = array( 'post_type' => 'product', 'product_cat' => 'country-targeted-traffic', 'order' => 'ASC');
        $loop = new WP_Query( $args );


	
        while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>
        <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
            
			<div class="middle_1 ev_od">
				<div class="middle_11 middle_14"><?php the_title(); ?></div>
				<div class="middle_12 middle_15 val_img"><?php echo $product->get_price_html(); ?></div>
				<div class="middle_13 middle_15"><?php woocommerce_template_loop_add_to_cart( $loop->post, $product );  ?></div>
			</div>
            <?php endwhile;?>
			
			
			
			
			
		</div>
        
        
 <!--------------REsponsiv Niche (Category) & Geo (Country) Targeted Traffic  start---------------->    
		<div class="middle_01 middle_03 resp_mi2">
			<h2>Niche (Category) & Geo (Country) Targeted Traffic</h2>
			<div class="middle_1">
				<div class="middle_11">
					Packages
				</div>
			</div>
			
			<div class="middle_1 middle_3">
        
        <?php
	        $args = array( 'post_type' => 'product', 'product_cat' => 'country-targeted-traffic', 'order' => 'ASC');
        $loop = new WP_Query( $args );


	
        while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>
        <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
        
				<div class="middle_1 ev_od">
					<div class="middle_11 middle_14">
						<p>
							<?php the_title(); ?>
						</p>
						<p>
							<span class="val_img_re"><?php echo $product->get_price_html(); ?></span>
							
						</p>
						<p class="middle_13 middle_15">
							<?php woocommerce_template_loop_add_to_cart( $loop->post, $product );  ?> 
						</p>
					</div>
				</div>
                 <?php endwhile;?>
                
		  </div>
		</div>
        
        
        
        
		</div>
</div>
   


<?php get_footer(); ?>
