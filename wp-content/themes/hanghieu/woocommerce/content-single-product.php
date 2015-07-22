<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
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

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="summary entry-summary">
		<div class="top-content-details">
			<div class="col-md-3">
				<div class="zoom-wrap">
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
			</div>
			<div class="col-md-6">
				<form class="cart" method="post" enctype='multipart/form-data'>
				<header class="clearfix">
					<h1 class="title-post"><?php the_title(); ?></h1>
					<?php social_share(); ?>
				</header>
				<div class="short-product">
					<div class="price-wrap price-single">
						 <?php
				            $price = get_post_meta( get_the_ID(), '_regular_price', true);
				            $sale = get_post_meta( get_the_ID(), '_sale_price', true);
				            if($sale)
				            {
				                $price_html = '<ins>'.number_format($price,0,'.','.').' VNĐ</ins>';
				                $price_html .='<span class="price">'.number_format($sale,0,'.','.').' VNĐ</span>';
				            }
				            else
				            {
				                    $price_html = '<span class="price">'.$price.'</span>';
				            }
				            echo $price_html;
				        ?>
					</div>
					<div class="short-description">
						<?php wc_get_template('single-product/short-description.php'); ?>
					</div>
					<!-- /.short-description -->
				</div>
				<div class="box-add-cart">
					<div class="box-btn">
						<div class="qty-wrap">
							<label for="qty" id="qty_label">Số lượng</label>
							<a href="#" class="qty-1"></a>
								<input type="text" id="qty" name="quantity" size="4" value="1">
							<a href="#" class="qty_1"></a>
						</div>
						<input type="hidden" name="add-to-cart" value="<?php the_ID(); ?>" />
						<button class="btn btn-dathang-ngay"><span class="uppercase">Đặt hàng ngay</span><span class="block">(Nhận hàng trực tiếp)</span></button>
						<a href="#ninja-popup-9192" rel="9192" class="btn snppopup-content btn-dathang-hotline btn-black"><span class="uppercase">Đặt hàng</span><span class="block">QUA HOTLINE 0902689449</span></a>
						<a href="#ninja-popup-9144" rel="9144" class="btn snppopup-content btn-giu-hang btn-black"><span class="uppercase">Giữ hàng</span><span class="block">(Sản phẩm của bạn sẽ được giữ trong 24h)</span></a>
					</div>
				</div>
			</form>
			</div>
			<div class="col-md-3">
				<div class="box-gray">
					<p>Chọn địa chỉ của bạn để kiểm tra hình thức giao hàng</p>
					<p>
						<label for="tinh">Tỉnh/Thành phố: </label>
						<select name="tinh" id="tinh">
							<option value="0"> -- Chọn tỉnh -- </option>
							<option value="-1">Không chọn địa điểm</option><option value="2" title="Ha Noi">Hà Nội</option><option value="1" title="TP. HCM">TP. HCM</option><option value="23" title="da Nang">Đà Nẵng</option><option value="9" title="Binh Duong">Bình Dương</option><option value="21" title="Can Tho">Cần Thơ</option><option value="22" title="Hai Phong">Hải Phòng</option><option value="53" title="Ba Ria - Vung Tau">Bà Rịa - Vũng Tàu</option><option value="91" title="Bac Giang">Bắc Giang</option><option value="92" title="Bac Kan">Bắc Kạn</option><option value="94" title="Thua Thien Hue">Thừa Thiên Huế</option><option value="32" title="Bac Ninh">Bắc Ninh</option><option value="93" title="Bac Lieu">Bạc Liêu</option><option value="90" title="Ben Tre">Bến Tre</option><option value="89" title="Binh dinh">Bình Định</option><option value="88" title="Binh Phuoc">Bình Phước</option><option value="87" title="Binh Thuan">Bình Thuận</option><option value="86" title="Ca Mau">Cà Mau</option><option value="85" title="Cao Bang">Cao Bằng</option><option value="84" title="Cuu Long">Cửu Long</option><option value="83" title="dac Lac">Đắc Lắc</option><option value="82" title="dac Nong">Đắc Nông</option><option value="52" title="An Giang">An Giang</option><option value="81" title="dien Bien">Điện Biên</option><option value="19" title="dong Nai">Đồng Nai</option><option value="80" title="dong Thap">Đồng Tháp</option><option value="79" title="Gia Lai">Gia Lai</option><option value="78" title="Ha Giang">Hà Giang</option><option value="77" title="Ha Nam">Hà Nam</option><option value="76" title="Ha Tinh">Hà Tĩnh</option><option value="27" title="Hai Duong">Hải Dương</option><option value="75" title="Hau Giang">Hậu Giang</option><option value="74" title="Hoa Binh">Hòa Bình</option><option value="26" title="Hung Yen">Hưng Yên</option><option value="73" title="Khanh Hoa">Khánh Hòa</option><option value="72" title="Kien Giang">Kiên Giang</option><option value="71" title="Kon Tum">Kon Tum</option><option value="70" title="Lai Chau">Lai Châu</option><option value="69" title="Lang Son">Lạng Sơn</option><option value="68" title="Lao Cai">Lào Cai</option><option value="67" title="Lam dong">Lâm Đồng</option><option value="66" title="Long An">Long An</option><option value="65" title="Nam dinh">Nam Định</option><option value="64" title="Nghe An">Nghệ An</option><option value="63" title="Ninh Binh">Ninh Bình</option><option value="62" title="Ninh Thuan">Ninh Thuận</option><option value="61" title="Phu Tho">Phú Thọ</option><option value="60" title="Phu Yen">Phú Yên</option><option value="59" title="Quang Binh">Quảng Bình</option><option value="58" title="Quang Nam">Quảng Nam</option><option value="30" title="Quang Ngai">Quảng Ngãi</option><option value="57" title="Quang Ninh">Quảng Ninh</option><option value="56" title="Quang Tri">Quảng Trị</option><option value="55" title="Soc Trang">Sóc Trăng</option><option value="54" title="Son La">Sơn La</option><option value="51" title="Tay Ninh">Tây Ninh</option><option value="50" title="Thai Binh">Thái Bình</option><option value="49" title="Thai Nguyen">Thái Nguyên</option><option value="48" title="Thanh Hoa">Thanh Hóa</option><option value="47" title="Tien Giang">Tiền Giang</option><option value="46" title="Tra Vinh">Trà Vinh</option><option value="45" title="Tuyen Quang">Tuyên Quang</option><option value="44" title="Vinh Long">Vĩnh Long</option><option value="43" title="Vinh Phuc">Vĩnh Phúc</option><option value="42" title="Yen Bai">Yên Bái</option>
						</select>
					</p>
					<p>
						<label for="tinh">Quận huyện: </label>
						<select name="tinh" id="tinh">
							<option value="0"> -- Vui lòng chọn -- </option>
						</select>
					</p>
					<p><i class="fa fa-check"></i>  Giao hàng hỏa tốc có thể được áp dụng</p>
					<p><i class="fa fa-check"></i>  Thẻ tín dụng</p>
					<p><i class="fa fa-check"></i>  Thẻ ATM nội địa</p>
					<p><i class="fa fa-check"></i>  Trả góp bằng thẻ tín dụng</p>
					<p><i class="fa fa-check"></i>  Thanh toán khi nhận hàng</p>
				</div>
				<div class="box-gray">
					<p class="text-hhs">Được bán & giao hàng bởi <span>hanghieusales</span></p>
					<p style="text-align:center"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-dam-bao.png" alt=""></p>
					<p><i class="fa fa-check"></i>  Giao hàng hỏa tốc có thể được áp dụng</p>
					<p><i class="fa fa-check"></i>  Thẻ tín dụng</p>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="box-icon clearfix">
				<div class="items-icon">
					<i class="fa fa-refresh"></i><span>đổi trả hàng trong 15 ngày</span>
				</div>
				<div class="items-icon">
					<i class="fa fa-truck"></i><span>miễn phí giao hàng</span>
				</div>
				<div class="items-icon">
					<i class="fa fa-building"></i><span>giao hàng nhận tiền</span>
				</div>
				<div class="items-icon">
					<i class="fa fa-thumbs-up"></i><span>đảm bào hàng chính hãng</span>
				</div>
			</div>
		</div>
		<!-- /.top-content-details -->
	</div><!-- .summary -->

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

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
