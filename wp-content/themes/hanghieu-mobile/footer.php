<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="widget-footer">
					<div class="col-md-3">
						<div class="widget-items">
							<h3 class="title-widget">Thông Tin Chung</h3>
							<!-- /.title-widget -->
							<ul>
								<li><a href="#">Về chúng tôi</a></li>
								<li><a href="#">Tin tức chung</a></li>
								<li><a href="#">Bảng quy đổi size</a></li>
								<li><a href="#">Liên hệ</a></li>
								<li><a href="#">Thế giới hàng hiệu</a></li>
							</ul>
						</div>
						<!-- /.widget-items -->
					</div>
					<div class="col-md-3">
						<div class="widget-items">
							<h3 class="title-widget">Thông Tin Chung</h3>
							<!-- /.title-widget -->
							<ul>
								<li><a href="#">Về chúng tôi</a></li>
								<li><a href="#">Tin tức chung</a></li>
								<li><a href="#">Bảng quy đổi size</a></li>
								<li><a href="#">Liên hệ</a></li>
								<li><a href="#">Thế giới hàng hiệu</a></li>
							</ul>
						</div>
						<!-- /.widget-items -->
					</div>
					<div class="col-md-3">
						<div class="widget-items">
							<h3 class="title-widget">Thông Tin Chung</h3>
							<!-- /.title-widget -->
							<ul>
								<li><a href="#">Về chúng tôi</a></li>
								<li><a href="#">Tin tức chung</a></li>
								<li><a href="#">Bảng quy đổi size</a></li>
								<li><a href="#">Liên hệ</a></li>
								<li><a href="#">Thế giới hàng hiệu</a></li>
							</ul>
						</div>
						<!-- /.widget-items -->
					</div>
					<div class="col-md-3">
						<div class="widget-items">
							<h3 class="title-widget">Thông Tin Chung</h3>
							<!-- /.title-widget -->
							<ul>
								<li><a href="#">Về chúng tôi</a></li>
								<li><a href="#">Tin tức chung</a></li>
								<li><a href="#">Bảng quy đổi size</a></li>
								<li><a href="#">Liên hệ</a></li>
								<li><a href="#">Thế giới hàng hiệu</a></li>
							</ul>
						</div>
						<!-- /.widget-items -->
					</div>
				</div>
				<!-- /.widget-footer -->
				<div class="clearfix"></div>
				<div class="main-footer">
					<div class="col-md-6">
						<h4 id="logo-footer">
							<a href="#"><img class="img-responsive"  src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.jpg" alt=""></a>
						</h4>
						<!-- /#logo-footer -->
						<div class="footer-text">
							HangHieuSales.Com - Website bán hàng hiệu hàng đầu tại Việt Nam <br>
							Địa chỉ: 35/21 C Trần Đình Xu, Phường Cầu Kho, Quận 1,TP.Hồ Chí Minh<br>
							Đơn vị chủ quản: CÔNG TY CỔ PHẦN ĐẦU TƯ THƯƠNG HIỆU QUỐC TẾ<br>
							Giấy phép kinh doanh số 0312192829 do Sở KH & ĐT Tp.Hồ Chí Minh cấp.<br>
						</div>
					</div>
					<!-- /.pull-left -->
					<div class="col-md-6">
						<div>
							<a href="#"><img class="img-responsive"  src="<?php echo get_template_directory_uri(); ?>/images/right-footer-logo.png" alt=""></a>
						</div>
					</div>
					<!-- /.pull-right -->
				</div>
				<!-- /.main-footer -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</footer>
	<!-- /#footer -->
	<?php wp_footer(); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3&appId=429315790568907";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php if(is_page( 304 )) {
	?>
	<div id="popup-newsletter" style="width: 1170px; height: 507px; background-image: url(<?php echo get_template_directory_uri(); ?>/images/bg-popup_1.png);">
	   <form action="#" method="post" id="popup-newsletter-validate-detail">
	      <div class="block-content">
	         <div class="form-subscribe-header">
	            <label for="newsletter">Đăng ký email nhận mã giảm giá</label>
	         </div>
	         <p class="promo-panel-sale">Đăng ký để nhận mã giảm giá các sản phẩm</p>
	         <p class="promo-panel-text"></p>
	         <div class="newsletter-new">
	            <div class="input-box">
	               <input type="text" name="email" id="pnewsletter" title="Sign up for our newsletter" class="input-text required-entry validate-email">
	            </div>
	            <div class="actions">
	               <button type="submit" title="Join Now !" class="btn btn-black"><span><span>Đăng ký ngay !</span></span></button>
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