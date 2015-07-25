<div class="row search" id="search-form">
	<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="clearfix"
	      id="search-form">
		<div class="input-group search-group">
			<div class="input-group-btn">
				<button type="button" class="btn btn-default dropdown-toggle search-menu"
				        data-toggle="dropdown"
				        aria-haspopup="true" aria-expanded="false">
					<span><i class="fa fa-book"></i></span>
					<span class="caret"></span>
					<span class="sr-only">Toggle Dropdown</span>
				</button>
				<ul class="dropdown-menu search-cate-list">
					<?php
					$args_search     = array(
						'type'         => 'product',
						'child_of'     => 0,
						'parent'       => 0,
						'orderby'      => 'name',
						'order'        => 'ASC',
						'hide_empty'   => 1,
						'hierarchical' => 1,
						'exclude'      => '',
						'include'      => '',
						'number'       => '',
						'taxonomy'     => 'product_cat',
						'pad_counts'   => false
					);
					$category_search = get_categories( $args_search );
					if ( isset( $_GET['cat'] ) ) {
						$cat = $_GET['cat'];
					} else {
						$cat = - 1;
					}
					?>
					<?php if ( ! empty( $category_search ) ) {
						foreach ( $category_search as $search ) {
							$args_search2     = array(
								'type'         => 'product',
								'child_of'     => 0,
								'parent'       => $search->term_id,
								'orderby'      => 'name',
								'order'        => 'ASC',
								'hide_empty'   => 1,
								'hierarchical' => 1,
								'exclude'      => '',
								'include'      => '',
								'number'       => '',
								'taxonomy'     => 'product_cat',
								'pad_counts'   => false
							);
							$category_search2 = get_categories( $args_search2 );
							?>
							<li><a href="javascript:;" data-value="<?php echo $search->slug;; ?>"><?php echo $search->name;; ?></a></li>
							<?php if ( ! empty( $category_search2 ) ) {
								foreach ( $category_search2 as $category_search2 ) {
									?>
									<li><a href="javascript:;" data-value="<?php echo $category_search2->slug; ?>">-- <?php echo $category_search2->name; ?></a></li>
									<?php
								}
							} ?>
						<?php }
					} ?>
				</ul>
				<input id="search-cate" type="hidden" name="cat" value="0">
			</div>
			<input type="text" class="form-control search-field"  value="<?php if(isset($_GET['s'])) { echo $_GET['s']; } ?>" name="s"
			       placeholder="Nhập từ khoá tìm kiếm">
			<input type="hidden" name="post_type" value="product" />

			<div class="input-group-btn btn-search">
				<button class="btn" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			</div>
		</div>
	</form>
</div>
