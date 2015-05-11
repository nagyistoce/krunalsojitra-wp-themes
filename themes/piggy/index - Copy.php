<?php

/**

 * The main template file.

 *

 * This is the most generic template file in a WordPress theme

 * and one of the two required files for a theme (the other being style.css).

 * It is used to display a page when nothing more specific matches a query.

 * For example, it puts together the home page when no home.php file exists.

 *

 * Learn more: http://codex.wordpress.org/Template_Hierarchy

 *

 * @package WordPress

 * @subpackage Twenty_Twelve

 * @since Twenty Twelve 1.0

 */



get_header(); ?>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>



<div id="primary" class="site-content">

  <div id="content" role="main">

  

  <!---------------------------------facebook----------------------->

  <div class="box1">

  <div class="sel_title"> <select id="facebook">

  <option value="" label="">Facebook</option>

    <?php

	 $args = array( 'post_type' => 'product', 'product_cat' => 'facebook');

        $loop = new WP_Query( $args );

       while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>

             

     <option value="<?php echo $product->get_price_html(); ?>"  data-id="<?php echo $product->id;?>"> <?php the_title(); ?></option>

        <?php endwhile; ?>

   </select></div>

    <div class="sel_prize"><input type="text" name="prize"  id="facebook_prize"/></div>

	<div class="sel_adcart"><span id="fb_but"></span></div>

     <?php wp_reset_query(); ?>

     </div>

     <!---------------------------------facebook----------------------->

     

     <!---------------------------------Twitter----------------------->

     <div class="box1">

      <div class="sel_title"> <select id="twitter">

  <option value="" label="">Twitter</option>

    <?php

	 $args = array( 'post_type' => 'product', 'product_cat' => 'twitter');

        $loop = new WP_Query( $args );

       while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>

             

     <option value="<?php echo $product->get_price_html(); ?>"  data-id="<?php echo $product->id;?>"> <?php the_title(); ?></option>

        <?php endwhile; ?>

   </select></div>

    <div class="sel_prize"><input type="text" name="prize"  id="twitter_prize"/></div>

	<div class="sel_adcart"><span id="tw_but"></span></div>

     <?php wp_reset_query(); ?>

  </div>

  

  <!---------------------------------Twitter----------------------->

  

   

     <!---------------------------------Google+----------------------->

     <div class="box1">

      <div class="sel_title"> <select id="googleplus">

  <option value="" label="">Google Plus</option>

    <?php

	 $args = array( 'post_type' => 'product', 'product_cat' => 'googleplus');

        $loop = new WP_Query( $args );

       while ( $loop->have_posts() ) : $loop->the_post(); global $product;?>

             

     <option value="<?php echo $product->get_price_html(); ?>"  data-id="<?php echo $product->id;?>"> <?php the_title(); ?></option>

        <?php endwhile; ?>

   </select></div>

    <div class="sel_prize"><input type="text" name="prize"  id="googleplus_prize"/></div>

	<div class="sel_adcart"><span id="gplus_but"></span></div>

     <?php wp_reset_query(); ?>

  </div>

  

  <!---------------------------------Google+----------------------->

  

  </div>  <!-- #content --> 

</div><!-- #primary -->



<script>



$("#googleplus").on('change', function(){

if($('option:selected', this).attr('label') != ""){

	$("#gplus_but").html("<a  title='Add to cart' class='add_to_cart_button adbt button product_type_simple' data-product_sku='f1' data-product_id='"+$('option:selected', this).attr('data-id')+"' rel='nofollow' href='/piggy/?add-to-cart="+$('option:selected', this).attr('label')+"'></a>")

}

else{

	$("#gplus_but").html('');

}

   $('#googleplus_prize').val(this.value);

});









$("#twitter").on('change', function(){

if($('option:selected', this).attr('label') != ""){

	$("#tw_but").html("<a title='Add to cart' class='add_to_cart_button adbt button product_type_simple' data-product_sku='f1' data-product_id='"+$('option:selected', this).attr('data-id')+"' rel='nofollow' href='/piggy/?add-to-cart="+$('option:selected', this).attr('label')+"'></a>")

}

else{

	$("#tw_but").html('');

}

   $('#twitter_prize').val(this.value);

});





$("#facebook").on('change', function(){

if($('option:selected', this).attr('label') != ""){

	$("#fb_but").html("<a title='Add to cart' class='add_to_cart_button adbt button product_type_simple' data-product_sku='f1' data-product_id='"+$('option:selected', this).attr('data-id')+"' rel='nofollow' href='/piggy/?add-to-cart="+$('option:selected', this).attr('label')+"'></a>")

}

else{

	$("#fb_but").html('');

}

   $('#facebook_prize').val(this.value);

});



</script>



<?php //get_sidebar(); ?>

<?php get_footer(); ?>

