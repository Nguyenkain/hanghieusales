<?php get_header();
?>
<article id="main-content">
<div class="breacrumb">
	<div class="container">
		<a href="#">Trang chủ</a>
			<span>//</span>
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
			<?php endif; ?>
		/<span><?php echo show_post_count(); ?> <?php _e('sản phẩm','hanghieu'); ?></span>
	</div>
</div>
<div class="section">
	<div class="container">
		<div class="row">
			<?php get_sidebar('product'); ?>
			<div class="col-md-9">
				<?php
					if ( is_product_category() ){
				    global $wp_query;
				    $cat = $wp_query->get_queried_object();
				    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
				    $image = wp_get_attachment_url( $thumbnail_id );
				    if ( $image ) {
					    ?>
					    <div class="featured-image">
							<img src="<?php echo $image; ?>" alt="<?php woocommerce_page_title(); ?>">
						</div>
						<!-- /.featured-image -->
					    <?php
					}
				}
				?>
				<?php if ( have_posts() ) : ?>
				<?php
				?>
				<div class="product-grid">
					<header class="header-grid clearfix">
						<?php
							/**
							* woocommerce_before_shop_loop hook
							*
							* @hooked woocommerce_result_count - 20
							* @hooked woocommerce_catalog_ordering - 30
							*/
							do_action( 'woocommerce_before_shop_loop' );
						?>
					</header>
				<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>

				<?php
				/**
				* woocommerce_after_shop_loop hook
				*
				* @hooked woocommerce_pagination - 10
				*/
				?>
				</div>
				<?php
				do_action( 'woocommerce_after_shop_loop' );
				?>

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
				<?php wc_get_template( 'loop/no-products-found.php' ); ?>
				<?php endif; ?>
			</div>
		</div>
		<!-- /.row -->
	</div>
</div>
<?php get_template_part('aside','footer'); ?>
</article>
<?php get_footer(); ?>