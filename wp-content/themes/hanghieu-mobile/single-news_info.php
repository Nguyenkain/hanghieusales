<?php get_header(); ?>
<article id="main-content">
		<div class="breacrumb">
			<div class="container">
					<a href="<?php echo home_url(); ?>">Trang chủ</a>
					<span>//</span>
					<a href="javascript//"><?php single_cat_title(); ?></a>
			</div>
		</div>
		<div class="news-section">
			<div class="container">
				<div class="row">
					<?php get_sidebar(); ?>
					<?php if(have_posts()):while(have_posts()):the_post(); ?>
					<div class="col-md-9">
						<h1 class="title-cat"><?php the_title(); ?></h1>
						<hr class="clearfix" />
						<div class="content-post <?php post_class(); ?>">
							<?php the_content(); ?>
						</div>
					</div>
					<?php endwhile; else: echo 'Không có bài viết nào trong mục này'; endif; ?>
				</div>
				<!-- /.row -->
			</div>
		</div>
		<div class="section last-views">
			<div class="container">
				<div class="row row-no-padding">
					<div class="col-md-1">
						<div class="hd-last">
							Sản phẩm bạn vừa xem
						</div>
					</div>
					<div class="col-md-11">
						<div class="btn-cc btn-prev"></div>
						<ul class="last-view-items clearfix">
							<li class="clearfix">
								<a href="#">
									<img class="img-responsive"  src="images/product/thumb-111x73.png" alt="">
									<p class="title">Giày dachuông cao cấp G117</p>
								</a>
							</li>
							<li class="clearfix">
								<a href="#">
									<img class="img-responsive"  src="images/product/thumb-111x73.png" alt="">
									<p class="title">Giày dachuông cao cấp G117</p>
								</a>
							</li>
							<li class="clearfix">
								<a href="#">
									<img class="img-responsive"  src="images/product/thumb-111x73.png" alt="">
									<p class="title">Giày dachuông cao cấp G117</p>
								</a>
							</li>
							<li class="clearfix">
								<a href="#">
									<img class="img-responsive"  src="images/product/thumb-111x73.png" alt="">
									<p class="title">Giày dachuông cao cấp G117</p>
								</a>
							</li>
							<li class="clearfix">
								<a href="#">
									<img class="img-responsive"  src="images/product/thumb-111x73.png" alt="">
									<p class="title">Giày dachuông cao cấp G117</p>
								</a>
							</li>
						</ul>
						<div class="btn-cc btn-prev"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.section last-views -->
		<div class="section tag-cloud">
			<div class="container">
					<span>Tags:</span>
					<a href="#">Áo đầm</a>
					<a href="#">Áo đầm</a>
					<a href="#">Áo dạ hội</a>
					<a href="#">Quần tụt</a>
					<a href="#">Áo nữ</a>
					<a href="#">Áo nam</a>
					<a href="#">Đồ công sở</a>
					<a href="#">Áo đầm</a>
			</div>
			<!-- /.container -->
		</div>
		<div class="section privacy">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="items clearfix">
							<h4 class="title-items"><span><i class="fa fa-shopping-cart"></i>&nbsp;</span>Hướng dẫn mua hàng</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, commodi repudiandae laudantium fugiat dignissimos...</p>
							<a href="#" class="more-privacy">Xem thêm &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="items clearfix">
							<h4 class="title-items"><span><i class="fa fa-shopping-cart"></i>&nbsp;</span>Hướng dẫn mua hàng</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, commodi repudiandae laudantium fugiat dignissimos...</p>
							<a href="#" class="more-privacy">Xem thêm &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="items clearfix">
							<h4 class="title-items"><span><i class="fa fa-shopping-cart"></i>&nbsp;</span>Hướng dẫn mua hàng</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, commodi repudiandae laudantium fugiat dignissimos...</p>
							<a href="#" class="more-privacy">Xem thêm &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="items clearfix">
							<h4 class="title-items"><span><i class="fa fa-shopping-cart"></i></span>Hướng dẫn mua hàng</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, commodi repudiandae laudantium fugiat dignissimos...</p>
							<a href="#" class="more-privacy">Xem thêm &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /.section privacy -->
		<div class="section secton-newslester">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<form class="form-inline" role="form">
						  <div class="form-group">
						    <label for="email">nhận tin khuyễn mãi</label>
						    <input type="email" class="form-control" id="email" placeholder="Enter email">
						  </div>
						  <button type="submit" class="btn btn-default"><i class="fa fa-send"></i></button>
						</form>
					</div>
					<!-- /.pull-left -->
					<div class="col-md-6">
						<div class="social-icon">
							<ul>
								<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /.section secton-newslester -->
	</article>
<?php get_footer(); ?>