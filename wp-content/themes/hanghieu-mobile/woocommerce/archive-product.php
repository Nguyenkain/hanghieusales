<?php get_header();
?>
<div class="content">
	<div class="container">
		<div class="row breadcrumb-area">
			<div class="col-xs-12 breadcrumb-col">
				<ol class="breadcrumb">
					<li><a href="#">TRANG CHỦ</a></li>
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<li class="active"><?php woocommerce_page_title(); ?></li>
					<?php endif; ?>
				</ol>
				<span class="category-title"><?php woocommerce_page_title(); ?></span><span
					class="number-product"> / <?php echo show_post_count(); ?> <?php _e( 'sản phẩm', 'hanghieu' ); ?></span>
			</div>
		</div>

		<?php
		if ( is_product_category() ) {
			global $wp_query;
			$cat          = $wp_query->get_queried_object();
			$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image        = wp_get_attachment_url( $thumbnail_id );
			if ( $image ) {
				?>

				<div class="row slide">
					<img class="img-responsive" src="<?php echo $image; ?>" alt="<?php woocommerce_page_title(); ?>">
				</div>
				<!-- /.featured-image -->
				<?php
			}
		}
		?>

		<!--Filter form-->
		<form action="<?php echo 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" method="get">
			<div class="row filter-combo-box">
				<div class="col-xs-3 filter-box">
					<select id="category">
						<?php
						$args_search     = array(
							'type'         => 'product',
							'orderby'      => 'name',
							'order'        => 'ASC',
							'hide_empty'   => 1,
							'hierarchical' => 1,
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
						<option value="0">Tất cả danh mục</option>
						<?php if ( ! empty( $category_search ) ) {
							foreach ( $category_search as $search ) {
								$args_search2     = array(
									'type'         => 'product',
									'parent'       => $search->term_id,
									'orderby'      => 'name',
									'order'        => 'ASC',
									'hide_empty'   => 1,
									'hierarchical' => 1,
									'taxonomy'     => 'product_cat',
									'pad_counts'   => false
								);
								$category_search2 = get_categories( $args_search2 );
								?>
								<option <?php if ( $cat == $search->slug ) {
									echo 'selected="selected"';
								} ?> value="<?php echo $search->slug; ?>"><?php echo $search->name; ?></option>
								<?php if ( ! empty( $category_search2 ) ) {
									foreach ( $category_search2 as $category_search2 ) {
										?>
										<option <?php if ( $cat == $category_search2->slug ) {
											echo 'selected="selected"';
										} ?> value="<?php echo $category_search2->slug; ?>">
											-- <?php echo $category_search2->name; ?></option>
										<?php
									}
								} ?>
								<?php
							}
						} ?>
					</select>
				</div>
				<div class="col-xs-3 filter-box">
					<select name="pa_brand" id="brand">
						<option value="0">-- Thương hiệu --</option>
						<?php $thuonghieu = get_terms( 'pa_brand' );
						if ( ! empty( $thuonghieu ) ) {
							foreach ( $thuonghieu as $thuonghieu ) {
								?>
								<option value="<?php echo $thuonghieu->slug; ?>">-- <?php echo $thuonghieu->name; ?>
									--
								</option>
								<?php
							}
						}
						?>
					</select>
				</div>
				<div class="col-xs-3 filter-box">
					<select id="price">
						<option>Mức giá</option>
					</select>
				</div>
				<div class="col-xs-3 filter-box">
					<select id="size">
						<option>Kích thước</option>
					</select>
				</div>
			</div>
		</form>
		<!--./Filter form-->

		<!--Product list-->
		<?php if ( have_posts() ) : ?>
			<div class="row sample">
				<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
				?>
				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php wc_get_template_part( 'content', 'product' ); ?>
				<?php endwhile; // end of the loop. ?>

			</div>
			<?php
			/**
			 * woocommerce_after_shop_loop hook
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array(
			'before' => woocommerce_product_loop_start( false ),
			'after'  => woocommerce_product_loop_end( false )
		) )
		) : ?>
			<?php wc_get_template( 'loop/no-products-found.php' ); ?>
		<?php endif; ?>
	</div>
</div>
<!--./Product list-->
<?php get_footer(); ?>
