<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = $product->get_related( $posts_per_page );

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );

$products = new WP_Query( $args );

	$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<div class="related products product-list-4cl">

		<div class="heading-section clearfix">
			<h2 class="title-section">Có thể bạn sẽ thích</h2>
		</div>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
$args = array(
'post_type' => 'product',
'posts_per_page' => 12,
'meta_key' => 'total_sales',
'orderby' => 'meta_value_num',
);
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
	?>
<div class="product-list-4cl carousel">
		<div class="heading-section clearfix">
			<h2 class="title-section">Sản phẩm bán chạy</h2>
		</div>
<div class="row sample">
<?php
echo '<div class="item-carousel" id="item-carousel">';
while ( $loop->have_posts() ) : $loop->the_post();
echo '<div class="item">';
wc_get_template_part( 'content', 'product' );
echo '</div>';
endwhile;
echo '</div>';
?>
</div>
</div>
<?php
}
wp_reset_query();
?>
