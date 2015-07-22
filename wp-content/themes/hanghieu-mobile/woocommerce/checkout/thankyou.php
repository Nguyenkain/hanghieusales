<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( $order ) : ?>
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
      <div class="step-4 active step">
        <span>4</span>
        <p>Xác nhận thành công</p>
      </div>
    </div>
    <!-- /.check-out-step -->
	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>

		<p><?php
			if ( is_user_logged_in() )
				_e( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
			else
				_e( 'Please attempt your purchase again.', 'woocommerce' );
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>
		<div class="section" id="step-4">
				<h4 class="text-center sucess-text">CHÚC MỪNG BẠN GỬI ĐƠN HÀNH THÀNH CÔNG</h4>
				<a href="<?php echo home_url(); ?>" class="back-to-home btn btn-black">TRỞ VỀ TRANG CHỦ</a>
		</div>
		<div class="clear"></div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
	<?php //do_action( 'woocommerce_thankyou', $order->id ); ?>

<?php else : ?>

	<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

<?php endif; ?>
