<?php
/**
 * Single Product Up-Sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$upsells = $product->get_upsells();

if ( sizeof( $upsells ) == 0 ) {
	return;
}

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->id ),
	'meta_query'          => $meta_query
);

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<div class="up-sells clearfix">

		<div class="heading-section clearfix">
			<h2 class="title-section">Sản phẩm hay được mua cùng</h2>
		</div>

		<?php //woocommerce_product_loop_start(); ?>
			<div class="content-mua-cung">
				<label class="check-for" data-product-id="<?php the_ID(); ?>">
					<div class="item-muacung clearfix">
						<div class="thumb">
							<?php the_post_thumbnail(array(100,100)); ?>
						</div>
						<div class="info">
							<?php
					            $price = get_post_meta( get_the_ID(), '_regular_price', true);
					            $sale = get_post_meta( get_the_ID(), '_sale_price', true);
					            if($sale)
					            {
					                $price_html = '<p class="price">'.number_format($sale,0,'.','.').' VNĐ</p>';
					                $price_html .='<p class="price-old">'.number_format($price,0,'.','.').' VNĐ</p>';
					            }
					            else
					            {
					                    $price_html = '<p class="price">'.$price.'</p>';
					            }
					            echo $price_html;
					        ?>
							<p class="title"><?php the_title(); ?></p>
						</div>
						<input type="checkbox" value="1" readonly="readonly" disabled="disabled" checked="checked" id="check-<?php the_ID(); ?>" name="check_mua" class="check_mua" />
					</div>
					<!-- /.item-muacung -->
				</label>
				<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				<label class="check-for" data-product-id="<?php the_ID(); ?>" for="check-<?php the_ID(); ?>">
					<div class="item-muacung clearfix">
						<div class="thumb">
							<?php the_post_thumbnail(array(100,100)); ?>
						</div>
						<div class="info">
							<?php
					            $price = get_post_meta( get_the_ID(), '_regular_price', true);
					            $sale = get_post_meta( get_the_ID(), '_sale_price', true);
					            if($sale)
					            {
					                $price_html = '<p class="price">'.number_format($sale,0,'.','.').' VNĐ</p>';
					                $price_html .='<p class="price-old">'.number_format($price,0,'.','.').' VNĐ</p>';
					            }
					            else
					            {
					                    $price_html = '<p class="price">'.$price.'</p>';
					            }
					            echo $price_html;
					        ?>
							<p class="title"><?php the_title(); ?></p>
						</div>
						<input type="checkbox" value="1" checked="checked" id="check-<?php the_ID(); ?>" name="check_mua" class="check_mua" />
					</div>
					<!-- /.item-muacung -->
				</label>
			<?php endwhile; // end of the loop. ?>
			</div>
			<div class="content-btn-cart">
				<p class="action-text">Bạn sẽ được giảm giá 10% khi mua tất cả <span id="so-muacung">0</span> sản phẩm này!</p>
				<!-- /.action -->
				<p class="total">Tổng đơn hàng của bạn là : <span id="total-mua">0</span></p>
				<a href="#" class="btn btn-black" id="btn-all-to-cart" data-id-main="<?php the_ID(); ?>">Thêm vào giỏ hàng</a>
			</div>
			<!-- /.content-btn-cart -->

		<?php //woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
