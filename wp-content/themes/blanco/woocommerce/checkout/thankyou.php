<?php
  /**
   * Thankyou page
   *
   * @author    WooThemes
   * @package  WooCommerce/Templates
   * @version     2.0.0
   */

  if (!defined('ABSPATH')) exit; // Exit if accessed directly

  global $woocommerce;

  if ($order) : ?>

    <?php if (in_array($order->status, array('failed'))) : ?>

      <p><?php _e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce'); ?></p>

      <p><?php
          if (is_user_logged_in())
            _e(' ', 'woocommerce');
          else
            _e(' ', 'woocommerce');
        ?></p>

      <p>
        <a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>"
           class="button pay"><?php _e('Pay', 'woocommerce') ?></a>
        <?php if (is_user_logged_in()) : ?>
          <a href="<?php echo esc_url(get_permalink(wc_get_page_id('myaccount'))); ?>"
             class="button pay"><?php _e('My Account', 'woocommerce'); ?></a>
        <?php endif; ?>
      </p>

    <?php else : ?>

      <p><?php _e('Cảm ơn bạn. Đặt hàng của bạn đã được nhận.', 'woocommerce'); ?></p>

      <div class="border_box">
        <ul class="order_details">
          <li class="order">
            <?php _e('Order:', 'woocommerce'); ?>
            <strong><?php echo $order->get_order_number(); ?></strong>
          </li>
          <li class="date">
            <?php _e('Date:', 'woocommerce'); ?>
            <strong><?php echo date_i18n(get_option('date_format'), strtotime($order->order_date)); ?></strong>
          </li>
          <li class="total">
            <?php _e('Total:', 'woocommerce'); ?>
            <strong><?php echo $order->get_formatted_order_total(); ?></strong>
          </li>
          <?php if ($order->payment_method_title) : ?>
            <li class="method">
              <?php _e('Payment method:', 'woocommerce'); ?>
              <strong><?php echo $order->payment_method_title; ?></strong>
            </li>
          <?php endif; ?>
        </ul>
        <div class="clear"></div>
      </div>


    <?php endif; ?>

    <?php do_action('woocommerce_thankyou_' . $order->payment_method, $order->id); ?>
    <?php do_action('woocommerce_thankyou', $order->id); ?>

  <?php else : ?>

    <p><?php _e('Cảm ơn, đơn hàng của bạn đã được gửi', 'woocommerce'); ?></p>

  <?php endif; ?>
<!-- Conversion Pixel - Ibrands - DO NOT MODIFY -->
<script src="https://secure.adnxs.com/px?id=221339&t=1" type="text/javascript"></script>
<!-- End of Conversion Pixel -->