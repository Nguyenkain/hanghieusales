<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $product;

if ( ! $product->is_purchasable() ) return;
$ajax_addtocart = etheme_get_option('ajax_addtocart');
?>

<div class="clear"></div>
<hr>

<div class="addto-container">

	<?php if ( $product->is_in_stock() ) : ?>

		<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

		<form class="cart" method="post" enctype='multipart/form-data'>
		 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		 	<?php
		 		if ( ! $product->is_sold_individually() )
		 			woocommerce_quantity_input( array(
		 				'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
		 				'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
		 			) );
		 	?>

		 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />

                        <button type="submit" class="button big active <?php if($ajax_addtocart==1){?>  <?php } ?>"><span style="font-family: Arial;font-size: 20px;line-height: 30px;">ĐẶT NGAY</span><p style="color: #fff;">(Tư vấn miễn phí, không mua hàng cũng không sao)</p></button>

			<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
		</form>

		<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

	<?php endif; ?>
    <?php echo do_shortcode('[ninja-popup ID=9192]<p class="button dathang" style="margin-bottom: 5px;font-size: 18px;background-color: #7f8c8d;line-height: 55px;">ĐẶT HÀNG QUA HOTLINE 0902689449</p>[/ninja-popup]') ?>
	<?php echo do_shortcode('[ninja-popup ID=9144]<n class="button dathang" style="font-family: Arial;font-size: 20px;line-height: 30px;">GIỮ HÀNG<p style="color: #fff;font-size: 13px;font-family: Arial;">(Sản phẩm của bạn sẽ được giữ trong 24h)</p></n>[/ninja-popup]') ?>       
</div>
<div class="clear"></div>
<hr/>
