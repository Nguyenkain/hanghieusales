<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
/**
 * woocommerce_before_single_product hook
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form();

	return;
}
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>"
     class="<?php echo get_post_class() ?>">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6">
			<?php
			/**
			 * woocommerce_before_single_product_summary hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div>
		<div class="visible-xs">
			<div class="clearfix"></div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="well product-short-detail">
				<div class="row">
					<div class="the-list">
						<h2 class="product-title"><?php the_title(); ?></h2>
					</div>
					<div class="the-list">
						<div class="row">
							<h3 class="col-xs-12 product-price">

								<?php
								$price = get_post_meta( get_the_ID(), '_regular_price', true );
								$sale  = get_post_meta( get_the_ID(), '_sale_price', true );
								if ( $sale ) {
									$price_html = '<span class="price-old col-xs-12">' . number_format( $price, 0, '.', '.' ) . ' VNĐ</span>';
									$price_html .= '<span class="price">' . number_format( $sale, 0, '.', '.' ) . ' VNĐ</span>';
								} else {
									$price_html = '<span class="price">' . $price . '</span>';
								}
								echo $price_html;
								?>
							</h3>
						</div>
					</div>
					<div class="the-list">
						<div class="row description">
							<?php wc_get_template( 'single-product/short-description.php' ); ?>
						</div>
					</div>
					<!--<div class="the-list">
						<div class="row attribute">
							<div class="col-xs-6">
								<select class="form-control">
									<option>SIZE</option>
								</select>
							</div>
							<div class="col-xs-6">
								<select class="form-control">
									<option>KÍCH THƯỚC</option>
								</select>
							</div>
						</div>
					</div>-->
					<form class="cart" method="post" enctype='multipart/form-data'>
						<div class="the-list">
							<div class="row quantity">
								<div class="col-xs-4 label-qtt">
									<label for="qty" id="qty_label">Số lượng</label>
								</div>
								<div class="col-xs-6 input-qty-detail">
									<div class="input-group bootstrap-touchspin">
								<span class="input-group-btn">
									<button class="btn btn-default bootstrap-touchspin-down" type="button">-</button>
								</span>
								<span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;">
								</span>
										<input type="text" class="form-control input-qty text-center" value="1"
										       name="quantity" size="4" value="1" id="qty"
										       style="display: block;">
								<span class="input-group-addon bootstrap-touchspin-postfix"
								      style="display: none;"></span>
								<span class="input-group-btn">
									<button class="btn btn-default bootstrap-touchspin-up"
									        type="button">+
									</button>
								</span>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="add-to-cart" value="<?php the_ID(); ?>"/>

						<div class="the-list">
							<div class="row">
								<div class="col-xs-10 col-xs-offset-1">
									<button class="btn-order col-xs-12 active">
										ĐẶT HÀNG NGAY<br>
										(Nhận hàng trực tiếp)
									</button>
								</div>
								<div class="col-xs-10 col-xs-offset-1">
									<a href="#ninja-popup-9192" rel="9192"
									   class="btn-order col-xs-12 btn snppopup-content">
										ĐẶT HÀNG<br>
										QUA HOTLINE 0902689449
									</a>
								</div>
								<div class="col-xs-10 col-xs-offset-1">
									<a href="#ninja-popup-9144" rel="9144"
									   class="btn-order col-xs-12 btn snppopup-content">
										GIỮ HÀNG<br>
										<span>(Sản phẩm của bạn sẽ được giữ trong 24h)</span>
									</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<br clear="all">
		<meta itemprop="url" content="<?php the_permalink(); ?>"/>
	</div>

	<?php
	/**
	 * woocommerce_after_single_product_summary hook
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
