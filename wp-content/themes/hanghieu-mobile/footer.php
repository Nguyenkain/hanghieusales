<section class="last-views">
	<div class="container">
		<?php if ( ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ) {
			?>
			<div class="row recent-view">
				<div class="col-xs-2 block-title">
					Sản phẩm bạn vừa xem
				</div>
				<div class="col-xs-10">
					<div class="row slide-products">
						<div class="col-xs-1 nav-control nav-prev">
							<i class="fa fa-caret-left"></i>
						</div>
						<div class="col-xs-10 slide-content">
							<div class="recent-list-slide row">
								<div class="swiper-wrapper">
									<?php rc_woocommerce_recently_viewed_products(); ?>
								</div>
							</div>
						</div>
						<div class="col-xs-1 nav-control nav-next">
							<i class="fa fa-caret-right"></i>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>

		<div class="row tags">
			<div class="col-xs-1 tag-title">
				<span>TAGS:</span>
			</div>
			<div class="col-xs-11 tag-list">
				<ul>
					<?php
					$terms = get_terms( 'product_tag' );
					if ( ! empty( $terms ) ) {
						foreach ( $terms as $term ) {
							$link = get_term_link( $term, 'product_tag' );
							echo '<li><a href="' . $link . '" class="btn">' . $term->name . '</a></li>';
						}
					}
					?>
				</ul>
			</div>
		</div>
	</div>
</section>

<footer>
	<div class="footer">
		<div class="guide">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 guide-item">
						<div class="guide-item-bg">
							<div class="guide-title">
								<img src="<?php echo get_template_directory_uri() ?>/img/guide-1.png"
								     class="img-responsive">
								<span>HƯỚNG DẪN MUA HÀNG</span>
							</div>
							<div class="guide-content">Lorem ipsum dolor sit consectetur adipiscing elit, do et eiusmo
							</div>
							<div class="see-more">
								<a href="#">
									<img src="<?php echo get_template_directory_uri() ?>/img/guide-see-more.png"
									     class="img-responsive">
								</a>
							</div>
						</div>
					</div>
					<div class="col-xs-6 guide-item">
						<div class="guide-item-bg">
							<div class="guide-title">
								<img src="<?php echo get_template_directory_uri() ?>/img/guide-2.png"
								     class="img-responsive">
								<span>PHƯƠNG THỨC GIAO HÀNG</span>
							</div>
							<div class="guide-content">Lorem ipsum dolor sit consectetur adipiscing elit, do et eiusmo
							</div>
							<div class="see-more">
								<a href="#">
									<img src="<?php echo get_template_directory_uri() ?>/img/guide-see-more.png"
									     class="img-responsive">
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 guide-item">
						<div class="guide-item-bg">
							<div class="guide-title">
								<img src="<?php echo get_template_directory_uri() ?>/img/guide-3.png"
								     class="img-responsive">
								<span>CHÍNH SÁCH BẢO MẬT</span>
							</div>
							<div class="guide-content">Lorem ipsum dolor sit consectetur adipiscing elit, do et eiusmo
							</div>
							<div class="see-more">
								<a href="#">
									<img src="<?php echo get_template_directory_uri() ?>/img/guide-see-more.png"
									     class="img-responsive">
								</a>
							</div>
						</div>
					</div>
					<div class="col-xs-6 guide-item">
						<div class="guide-item-bg">
							<div class="guide-title">
								<img src="<?php echo get_template_directory_uri() ?>/img/guide-4.png"
								     class="img-responsive">
                                <span class="guild-title">BẢO HÀNH
                                <br/>
                                ĐỔI TRẢ - HOÀN TIỀN</span>
							</div>
							<div class="guide-content">Lorem ipsum dolor sit consectetur adipiscing elit, do et eiusmo
							</div>
							<div class="see-more">
								<a href="#">
									<img src="<?php echo get_template_directory_uri() ?>/img/guide-see-more.png"
									     class="img-responsive">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="subscribe">
			<div class="container">
				<div class="row">
					<div class="col-xs-8 subscribe-item sub-form">
						<span class="sub-title">NHẬN TIN KHUYẾN MÃI</span>

						<div class="input-group">
							<span class="input-group-addon letter"><i class="fa fa-envelope-o"></i></span>
							<input type="text" class="form-control" placeholder="Nhập email của bạn">
							<span class="input-group-addon send"><i class="fa fa-paper-plane"></i></span>
						</div>
					</div>
					<div class="col-xs-4 subscribe-item sns">
						<ul>
							<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/fb-icon.png"></a>
							</li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/twitter-icon.png"></a>
							</li>
							<li><a href="#"><img
										src="<?php echo get_template_directory_uri() ?>/img/pinterest-icon.png"></a>
							</li>
							<li><a href="#"><img
										src="<?php echo get_template_directory_uri() ?>/img/googleplus-icon.png"></a>
							</li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/img/youtube-icon.png"></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="site-link">
			<div class="container">
				<div class="row site-map">
					<div class="col-xs-3 site-map-item">
						<span class="site-map-item-title">Thông Tin Chung </span>
						<ul>
							<li><a href="#">Về Chúng Tôi</a></li>
							<li><a href="#">Tin Tức Chung</a></li>
							<li><a href="#">Bảng Quy Đổi Size</a></li>
							<li><a href="#">Liên Hệ</a></li>
							<li><a href="#">Ý Kiến Khách Hàng</a></li>
							<li><a href="#">Thế Giới Hàng Hiệu</a></li>
						</ul>
					</div>
					<div class="col-xs-3 site-map-item">
						<span class="site-map-item-title">Danh Mục Sản Phẩm</span>
						<ul>
							<li><a href="#">Áo Thun Nam</a></li>
							<li><a href="#">Quần Jean Nam</a></li>
							<li><a href="#">Áo Sơ Mi Nam</a></li>
							<li><a href="#">Áo Khoác Nam</a></li>
							<li><a href="#">Nước Hoa Nam</a></li>
							<li><a href="#">Thắt Lưng</a></li>
						</ul>
					</div>
					<div class="col-xs-3 site-map-item">
						<span class="site-map-item-title">Danh Mục Sản Phẩm</span>
						<ul>
							<li><a href="#">Áo Nữ</a></li>
							<li><a href="#">Quần Nữ</a></li>
							<li><a href="#">Đầm Nữ</a></li>
							<li><a href="#">Túi Xách</a></li>
							<li><a href="#">Ví Bóp</a></li>
							<li><a href="#">Nước Hoa Nữ</a></li>
						</ul>
					</div>
					<div class="col-xs-3 site-map-item">
						<span class="site-map-item-title">Thương Hiệu Nổi Bật</span>
						<ul>
							<li><a href="#">Lascote</a></li>
							<li><a href="#">Calvin Klein</a></li>
							<li><a href="#">Levis</a></li>
							<li><a href="#">Nike</a></li>
							<li><a href="#">Nine West</a></li>
							<li><a href="#">TOMMY Hillfiger</a></li>
						</ul>
					</div>
				</div>

				<div class="row site-map">
					<div class="col-xs-4 site-map-item">
						<span class="site-map-item-title">Cam Kết Của Chúng Tôi</span>
						<ul>
							<li>Hàng Chính Hãng</li>
							<li>Giá Luôn Thấp Hơn Thị Trường</li>
							<li>100% Nhập Khẩu Từ Mỹ</li>
							<li>Bảo Mật Thông Tin Khách Hàng</li>
							<li>Đổi Trả Hàng Trong Vòng 15 Ngày</li>
							<li>Giao Hàng Miễn Phí</li>
						</ul>
					</div>
					<div class="col-xs-8">
						<div class="shop-information">
							<div class="footer-logo">
								<img src="<?php echo get_template_directory_uri() ?>/img/footer-logo.png"
								     class="img-responsive">
							</div>
							<div class="detail">
                                <span>
                                    <p>HangHieuSales.Com - Website bán hàng hiệu hàng đầu tại Việt Nam
                                    <p>Địa chỉ: 35/21 C Trần Đình Xu,Phường Cầu Kho,Quận 1,TP.Hồ Chí Minh
                                    <p>Đơn vị chủ quản:CÔNG TY CỔ PHẦN ĐẦU TƯ THƯƠNG HIỆU QUỐC TẾ
                                    <p>Giấy phép kinh doanh số 031219
                                </span>
							</div>
						</div>
						<div class="payment">
							<img class="img-responsive"
							     src="<?php echo get_template_directory_uri() ?>/img/payment.png">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- /#footer -->
<?php wp_footer(); ?>
<div id="fb-root"></div>
<script>(function (d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s);
		js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=429315790568907";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<?php if ( is_page( 304 ) ) {
	?>
	<div id="popup-newsletter"
	     style="width: 1170px; height: 507px; background-image: url(<?php echo get_template_directory_uri(); ?>/images/bg-popup_1.png);">
		<form action="#" method="post" id="popup-newsletter-validate-detail">
			<div class="block-content">
				<div class="form-subscribe-header">
					<label for="newsletter">Đăng ký email nhận mã giảm giá</label>
				</div>
				<p class="promo-panel-sale">Đăng ký để nhận mã giảm giá các sản phẩm</p>

				<p class="promo-panel-text"></p>

				<div class="newsletter-new">
					<div class="input-box">
						<input type="text" name="email" id="pnewsletter" title="Sign up for our newsletter"
						       class="input-text required-entry validate-email">
					</div>
					<div class="actions">
						<button type="submit" title="Join Now !" class="btn btn-black"><span><span>Đăng ký ngay !</span></span>
						</button>
					</div>
				</div>
				<p class="promo-panel-text1">Tôi không quan tâm đến khuyến mãi này </p>

				<p class="promo-panel-text2">Vui lòng tích vào bên dưới nếu không muốn hiển thị lần sau !</p>
				<label class="subscribe-bottom">
					<input type="checkbox">Không hiển thị nữa</label>
			</div>
		</form>
	</div>
	<?php
} ?>
<div id="pop-checkuot" style="display:none;">
	<h3 class="title-checkout">Đặt hàng ngay tại Hanghieusales.com</h3>
	<!-- /.title-checkout -->
	<div class="box-content-sp" id="box-response">

	</div>
	<!-- /.box-content-sp -->
</div>
<!-- /#pop-checkuot -->
</body>
</html>
