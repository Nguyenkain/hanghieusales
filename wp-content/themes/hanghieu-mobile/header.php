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
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-3 header-col logo" id="logo">
                    <a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/logo.png"></a>
                </div>
                <div class="col-xs-6 header-col item-list" id="item">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/header-icon-1.png">
                                <span>Diễn đàn</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo home_url('news_info'); ?>" title="Tin tức">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/header-icon-2.png">
                                <span>Tin tức</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo home_url('thuong-hieu'); ?>">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/header-icon-3.png">
                                <span>Thương hiệu</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="Tài khoản">
                                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/header-icon-4.png">
                                <span><?php if(!is_user_logged_in()) { echo 'Đăng nhập'; } else { echo 'Tài khoản'; } ?></span>
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

			<div class="row search" id="search-form">
				<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="clearfix" id="search-form">
					<div class="input-group search-group">
						<div class="input-group-btn">
							<select name="cat" id="category">
								<?php
								$args_search = array(
									'type'                     => 'product',
									'child_of'                 => 0,
									'parent'                   => 0,
									'orderby'                  => 'name',
									'order'                    => 'ASC',
									'hide_empty'               => 1,
									'hierarchical'             => 1,
									'exclude'                  => '',
									'include'                  => '',
									'number'                   => '',
									'taxonomy'                 => 'product_cat',
									'pad_counts'               => false
								);
								$category_search  = get_categories($args_search);
								if(isset($_GET['cat'])) { $cat = $_GET['cat']; } else { $cat = -1; }
								?>
								<option value="0"><i class="fa fa-book"></i><span class="caret"></span></option>
								<?php if(!empty($category_search)) {
									foreach($category_search as $search) {
										$args_search2 = array(
											'type'                     => 'product',
											'child_of'                 => 0,
											'parent'                   => $search->term_id,
											'orderby'                  => 'name',
											'order'                    => 'ASC',
											'hide_empty'               => 1,
											'hierarchical'             => 1,
											'exclude'                  => '',
											'include'                  => '',
											'number'                   => '',
											'taxonomy'                 => 'product_cat',
											'pad_counts'               => false
										);
										$category_search2  = get_categories($args_search2);
										?>
										<option <?php if($cat == $search->slug) { echo 'selected="selected"'; } ?> value="<?php echo $search->slug; ?>"><?php echo $search->name; ?></option>
										<?php if(!empty($category_search2)) {
											foreach($category_search2 as $category_search2) {
												?>
												<option <?php if($cat == $category_search2->slug) { echo 'selected="selected"'; } ?> value="<?php echo $category_search2->slug; ?>"> -- <?php echo $category_search2->name; ?></option>
											<?php
											}
										} ?>
									<?php
									}
								} ?>
							</select>
							<button type="button" class="btn btn-default dropdown-toggle search-menu" data-toggle="dropdown"
							        aria-haspopup="true" aria-expanded="false">
								<span><i class="fa fa-book"></i></span>
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Cate 1</a></li>
								<li><a href="#">Cate 2</a></li>
								<li><a href="#">Cate 3</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Cate 4</a></li>
							</ul>
							<input type="hidden" name="cat" value="0">
						</div>
						<input type="text" class="form-control search-field" value="<?php echo get_search_query(); ?>" placeholder="Nhập từ khoá tìm kiếm">

						<div class="input-group-btn btn-search">
							<button class="btn" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
    <!-- /#top-bar -->
</header>
<!-- /#header -->