<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<p itemprop="price" class="price"><?php echo $product->get_price_html(); ?></p>
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>
<?php /*?><h1>targeted-traffic  Followers: <?php echo $value = get_field( "total_sales" ); ?></h1><?php */?>

<!----------------target taffic selectbox--------------->
<?php 
global $post;
$terms = wp_get_post_terms( $post->ID, 'product_cat' );
foreach ( $terms as $term );
$target = array('Targeted Directory','Targeted Traffic');
if ( in_array( $term->name, $target)) {
  ?>
  <div class="selct_Box"> 
  <h1>Add Category</h1>
<div style="margin-bottom:10px;">
<select id='pre-selected-options' multiple='multiple'>
 <option value="1">Afghanistan</option>
<option value="2">Albania</option>
<option value="3">Algeria</option>
<option value="4">American Samoa</option>
<option value="5">Andorra</option>
<option value="6">Angola</option>
<option value="7">Anguilla</option>
<option value="8">Antarctica</option>
<option value="9">Antigua and Barbuda</option>
<option value="10">Argentina</option>
</select>
</div>
</div>
<?php } ?>


<!----------------Country target taffic selectbox--------------->
<?php 
global $post;
$terms = wp_get_post_terms( $post->ID, 'product_cat' );
foreach ( $terms as $term );
$target = array('Country Targeted Directory','Country Targeted Traffic');
if ( in_array( $term->name, $target)) {
  ?>
 <div class="selct_Box sd"> 
 <h1>Add Country</h1> 
<div style="margin-bottom:10px;">
<select id='country-selected-options' multiple='multiple'>
  <option value="1">Afghanistan</option>
<option value="2">Albania</option>
<option value="3">Algeria</option>
<option value="4">American Samoa</option>
<option value="5">Andorra</option>
<option value="6">Angola</option>
<option value="7">Anguilla</option>
<option value="8">Antarctica</option>
<option value="9">Antigua and Barbuda</option>
<option value="10">Argentina</option>
</select>
</div>
</div>
<?php } ?>



<?php 
global $post;
$terms = wp_get_post_terms( $post->ID, 'product_cat' );
foreach ( $terms as $term );
$target = array('Country Targeted Directory','Country Targeted Traffic');
if ( in_array( $term->name, $target)) {
  ?>
  <div class="selct_Box"> 
 <h1>Add Category</h1> 
<div style="margin-bottom:10px;">
<select id='category-selected-options' multiple='multiple'>
  <option value="50">Advertising Media</option>
<option value="51">Agriculture</option>
<option value="52">Animals</option>
<option value="53">Antiques</option>
<option value="54">Arts</option>
<option value="55">Astronomy</option>
<option value="56">Auctions</option>
<option value="169">Auto Insurance</option>
<option value="57">Auto Rental</option>
<option value="58">Autos</option>
<option value="59">Babies</option>
<option value="60">Beauty</option>
<option value="61">Bicycles</option>
<option value="62">Boats</option>
<option value="63">Books</option>
<option value="64">Business</option>
<option value="65">Camping</option>
</select>
</div>
</div>
<?php } ?>
