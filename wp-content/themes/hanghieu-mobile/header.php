<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?php wp_title( '' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="header">
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-xs-3 header-col logo" id="logo">
					<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'description' ); ?>"><img
							class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/logo.png"></a>
				</div>
				<div class="col-xs-6 header-col item-list" id="item">
					<ul class="nav">
						<li>
							<a href="#">
								<img class="img-responsive"
								     src="<?php echo get_template_directory_uri(); ?>/img/header-icon-1.png">
								<span>Diễn đàn</span>
							</a>
						</li>
						<li>
							<a href="<?php echo home_url( 'news_info' ); ?>" title="Tin tức">
								<img class="img-responsive"
								     src="<?php echo get_template_directory_uri(); ?>/img/header-icon-2.png">
								<span>Tin tức</span>
							</a>
						</li>
						<li>
							<a href="<?php echo home_url( 'thuong-hieu' ); ?>">
								<img class="img-responsive"
								     src="<?php echo get_template_directory_uri(); ?>/img/header-icon-3.png">
								<span>Thương hiệu</span>
							</a>
						</li>
						<li>
							<a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>"
							   title="Tài khoản">
								<img class="img-responsive"
								     src="<?php echo get_template_directory_uri(); ?>/img/header-icon-4.png">
								<span><?php if ( ! is_user_logged_in() ) {
										echo 'Đăng nhập';
									} else {
										echo 'Tài khoản';
									} ?></span>
							</a>
						</li>
					</ul>
				</div>
				<div class="col-xs-3 header-col menu-cart" id="menu-area">
					<div class="col-xs-6 header-col cart">
						<div class="mini-cart">
							<?php woocommerce_mini_cart(); ?>
						</div>
					</div>
					<div class="col-xs-6 header-col menu">
						<div class="menu-btn">
							<button id="menu">&nbsp;</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="container">

			<div id="menu-content" style="display: none;">
				<ul>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
				</ul>
			</div>

			<?php
			get_search_form();
			?>

		</div>
	</div>
	<!-- /#top-bar -->
</header>
<!-- /#header -->
