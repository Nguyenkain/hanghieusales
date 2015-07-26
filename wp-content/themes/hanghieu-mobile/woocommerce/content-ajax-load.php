<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop'] ++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
if ( is_archive() ) {
	$classes[] = 'col-md-4 col-sm-4 col-xs-6';
} else {
	$classes[] = 'col-md-3 col-sm-4 col-xs-6';
}
$classes[] = 'sample-item';
?>
<div <?php post_class( $classes ); ?>>

	<div class="thumbnail">
		<a href="<?php echo get_the_permalink() ?>">
			<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
		</a>

		<div class="caption clearfix">
			<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
			<?php echo hhs_brand(); ?>
			<hr>
			<p class="caption-description"><a href="<?php the_permalink(); ?>"
			                                  title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
			<div class="caption-price">
				<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
			</div>
		</div>
	</div>
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
</div>
