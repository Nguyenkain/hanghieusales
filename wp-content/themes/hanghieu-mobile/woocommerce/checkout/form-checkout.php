<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>
 <div class="check-out-step clearfix">
      <div class="step-1 active step">
        <i class="fa fa-check"></i>
        <p>Giỏ hàng</p>
      </div>
      <div class="step-2 active step">
        <span>2</span>
        <p>Đăng nhập/Đăng ký</p>
      </div>
      <div class="step-3 active step">
        <span>3</span>
        <p>Thông tin & Thanh toán</p>
      </div>
      <div class="step-4 step">
        <span>4</span>
        <p>Xác nhận thành công</p>
      </div>
    </div>
    <!-- /.check-out-step -->
<?php
// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>
<div class="info-checkout-section section">
<div class="container">
	<?php if ( WC()->cart->ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>
		<h3 class="title-rom"><?php _e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>
	<?php else : ?>
		<h3 class="title"><?php _e( 'Billing Details', 'woocommerce' ); ?></h3>
	<?php endif; ?>
	<div class="row">
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">

	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-md-5">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-5">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
				<div id="order_review" class="woocommerce-checkout-review-order form" style="margin-top:40px">
					<h3 class="title-form" id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>
				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>


</form>
	</div>
	<!-- /.row -->
</div>
<!-- /.container -->
</div>
<!-- /.info-checkout-section section -->

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
