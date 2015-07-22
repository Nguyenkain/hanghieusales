<?php
/**
 * Show options for ordering
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $wp_query;

if ( 1 == $wp_query->found_posts || ! woocommerce_products_will_display() )
	return;
?>
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby">
		<?php
			$catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
				'menu_order' => __( 'Mặc định', ETHEME_DOMAIN ),
				'popularity' => __( 'Xem nhiều', ETHEME_DOMAIN ),
				'rating'     => __( 'Đánh giá cao', ETHEME_DOMAIN ),
				'date'       => __( 'Mới nhất', ETHEME_DOMAIN ),
				'price'      => __( 'Giá thấp đến cao', ETHEME_DOMAIN ),
				'price-desc' => __( 'Giá cao đến thấp', ETHEME_DOMAIN )
			) );

			if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
				unset( $catalog_orderby['rating'] );

			foreach ( $catalog_orderby as $id => $name )
				echo '<option value="' . esc_attr( $id ) . '" ' . selected( $orderby, $id, false ) . '>' . esc_attr( $name ) . '</option>';
		?>
	</select>
	<?php
		// Keep query string vars intact
		foreach ( $_GET as $key => $val ) {
			if ( 'orderby' == $key )
				continue;
			echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
		}
	?>
</form>
