<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

$woocommerce->show_messages();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', $woocommerce->cart->get_checkout_url() ); ?>

<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>">

	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">

			<div class="col-1">

				<?php do_action( 'woocommerce_checkout_billing' ); ?>

			</div>

			<div class="col-2">

				<?php do_action( 'woocommerce_checkout_shipping' ); ?>

			</div>

		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

		<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>

	<?php endif; ?>

	<?php do_action( 'woocommerce_checkout_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;

<!-----------------------Login start here krunal-------------->
<?php if ( is_user_logged_in()  || ! $checkout->enable_signup ) return;

$info_message = apply_filters( 'woocommerce_checkout_login_message', __( 'Returning customer?', 'woocommerce' ) );
?>

<p class="woocommerce-info"><?php echo esc_html( $info_message ); ?> <a href="#" class="showlogin"><?php _e( 'Click here to login', 'woocommerce' ); ?></a></p>

<?php
	woocommerce_login_form(
		array(
			'message'  => __( 'If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.', 'woocommerce' ),
			'redirect' => get_permalink( woocommerce_get_page_id( 'checkout') ),
			'hidden'   => true
		)
	);
?>


<!-----------------------Coupn code start here krunal-------------->

<?php
if ( ! $woocommerce->cart->coupons_enabled() )
	return;

$info_message = apply_filters('woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ));
?>

<p class="woocommerce-info"><?php echo $info_message; ?> <a href="#" class="showcoupon"><?php _e( 'Click here to enter your code', 'woocommerce' ); ?></a></p>

<form class="checkout_coupon" method="post" style="display:none">

	<p class="form-row form-row-first">
		<input type="text" name="coupon_code" class="input-text" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
	</p>


	<p class="form-row form-row-last">
		<input type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />
	</p>

	<div class="clear"></div>
</form>
