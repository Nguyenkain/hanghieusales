<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php wp_title(''); ?></title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="header">
	<div id="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<ul>
						<li><a href="#">Mua hàng ở đâu</a></li>
						<li><a href="#">Bảng quy đổi size</a></li>
					</ul>
				</div>
				<div class="col-md-8">
					<div class="row row-no-padding">
						<div class="col-md-4 text-right">
							<p><i class="fa fa-phone"></i>&nbsp;090 268 9449 – 08.6 2912528</p>
						</div>
						<div class="col-md-4 text-right">
							<p><i class="fa fa-truck"></i>&nbsp;Giao hàng toàn quốc miễn phí</p>
						</div>
						<div class="col-md-4 text-right">
							<p><i class="fa fa-refresh"></i>&nbsp;Đổi trả hàng 15 ngày</p>
						</div>
					</div>
					<!-- /.row row-no-padding -->
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /#top-bar -->
	<div id="main-header">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h4 id="logo">
						<a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>"><img class="img-responsive"  src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt=""></a>
					</h4>
				</div>
				<div class="col-md-9">
					<?php
						get_search_form();
					?>
					<div class="menu-icon" id="menu-header">
						<ul>
							<li>
								<a href="#">
									<div class="icon-menu">
										<i class="fa fa-comments-o"></i>
									</div>
									<span>Diễn đàn</span>
								</a>
							</li>
							<li>
								<a href="<?php echo home_url('news_info'); ?>" title="Tin tức">
									<div class="icon-menu">
										<i class="fa fa-newspaper-o"></i>
									</div>
									<span>Tin tức</span>
								</a>
							</li>
							<li>
								<a href="<?php echo home_url('thuong-hieu'); ?>">
									<div class="icon-menu">
										<i class="fa fa-bookmark"></i>
									</div>
									<span>Thương hiệu</span>
								</a>
							</li>
							<li>
								<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="Tài khoản">
									<div class="icon-menu">
										<i class="fa fa-user"></i>
									</div>
									<span><?php if(!is_user_logged_in()) { echo 'Đăng nhập'; } else { echo 'Tài khoản'; } ?></span>
								</a>
							</li>
						</ul>
					</div>
					<div class="mini-cart">
							<?php woocommerce_mini_cart(); ?>
					</div>
				</div>
			</div>
		</div>
		<!-- /.container -->
	</div>
	<!-- /#main-header -->
</header>
<!-- /#header -->