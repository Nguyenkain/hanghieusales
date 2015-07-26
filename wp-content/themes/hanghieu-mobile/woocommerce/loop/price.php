<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>
<?php $price = get_post_meta( get_the_ID(), '_regular_price', true);
$sale = get_post_meta( get_the_ID(), '_sale_price', true); ?>
<div class="price-info">
	<p class="old-price"><?php echo number_format($sale,0,'.','.').' VNĐ</b><br/><span class="old-price">'.number_format($price,0,'.','.') ?> VNĐ</p>

	<p class="new-price"><?php echo number_format($price,0,'.','.') ?>  VNĐ</p>
</div>
