<?php
/**
 * Result Count
 *
 * Shows text: Showing x - x of x results
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $wp_query;

if ( ! woocommerce_products_will_display() )
	return;
?>
<p class="woocommerce-result-count">
	<?php
	$paged    = max( 1, $wp_query->get( 'paged' ) );
	$per_page = $wp_query->get( 'posts_per_page' );
	$total    = $wp_query->found_posts;
	$first    = ( $per_page * $paged ) - $per_page + 1;
	$last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

	if ( 1 == $total ) {
		_e( 'Hiện kết quả duy nhất', ETHEME_DOMAIN );
	} elseif ( $total <= $per_page ) {
		printf( __( 'Hiển thị trong %d kết quả', ETHEME_DOMAIN ), $total );
	} else {
		printf( __( 'Đang hiển thị %1$d–%2$d trong %3$d kết quả',  ETHEME_DOMAIN ), $first, $last, $total );
	}
	?>
</p>