<aside class="col-md-3">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('product-widgets')) : else : echo __('Vui lòng thêm Extension cho Sidebar Product','hanghieu'); ?>
<?php endif; ?>
<div class="widget">
	<h3 class="widget-title"><?php _e('Lọc sản phẩm','hanghieu'); ?></h3>
	<div class="fillter-widget">
		<form action="<?php echo 'http://'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" method="get">
			<div class="items-fillter active">
				<h3 class="title-fillter">Thương hiệu</h3>
				<div class="content-fillter">
					<select name="pa_brand" id="pa_brand">
						<option value="0">-- Chọn thương hiệu --</option>
						<?php $thuonghieu = get_terms('pa_brand');
							if(!empty($thuonghieu)) {
								foreach($thuonghieu as $thuonghieu) {
									?>
									<option value="<?php echo $thuonghieu->slug; ?>">-- <?php echo $thuonghieu->name; ?> --</option>
									<?php
								}
							}
						?>
					</select>
				</div>
			</div>
			<div class="items-fillter active">
				<h3 class="title-fillter">Giá</h3>
				<div class="content-fillter">
				</div>
			</div>
			<div class="items-fillter active">
				<h3 class="title-fillter">Kích thước</h3>
				<div class="content-fillter">
					<p>
						<input type="checkbox" name="xxm" id="xxm" /><label for="xxm">xxm</label>
					</p>
					<p>
						<input type="checkbox" name="xm" id="xm" /><label for="xm">xm</label>
					</p>
					<p>
						<input type="checkbox" name="M" id="M" /><label for="M">M</label>
					</p>
					<p>
						<input type="checkbox" name="M" id="L" /><label for="L">L</label>
					</p>
					<p>
						<input type="checkbox" name="M" id="M" /><label for="M">XL</label>
					</p>
					<p>
						<input type="checkbox" name="M" id="M" /><label for="M">XXL</label>
					</p>
				</div>
			</div>
			<div class="btn-fillter">
				<button>Tìm kiếm</button>
			</div>
		</form>
	</div>
	<!-- /.fillter-widget -->
</div>
<div class="widget">
	<div class="widget-image">
		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/ads.png" class="img-responsive" alt=""></a>
	</div>
</div>
<!-- /.widget -->
		<?php
		$args = array(
		'post_type' => 'product',
		'posts_per_page' => 5,
		'meta_key' => 'total_sales',
		'orderby' => 'meta_value_num',
		'tax_query'=>array(
				array(
						'taxonomy' => 'product_cat',
                        'field'    => 'term_id',
                        'terms'    =>get_queried_object()->term_id
					)
			)
		);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			?>
		<div class="widget">
			<h3 class="widget-title">Bán chạy</h3>
			<ul class="product_list_widget">
		<?php
		while ( $loop->have_posts() ) : $loop->the_post();
		woocommerce_get_template_part( 'content', 'product-list-sidebar' );
		endwhile;
		?>
			</ul>
		</div>
		<!-- /.widget -->
		<?php
		}
		wp_reset_query();
		?>
</aside>
<!-- /.col-md-3 -->