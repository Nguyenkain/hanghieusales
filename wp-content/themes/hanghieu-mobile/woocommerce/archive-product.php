<?php get_header();
?>
<article id="main-content">
	<div class="breacrumb">
		<div class="container">
			<a href="<?php echo home_url(); ?>" title="Trang chủ">Trang chủ</a>
			<span>//</span>
			<a href="javascript://">Tags</a>
		</div>
	</div>
	<div class="container">
		<div class="row tags-page-photo">
			<img class="img-responsive" src="<?php echo get_template_directory_uri()?>/img/tags.png" alt="header">
		</div>

		<div class="row tags-page-info">
			<div class="col-xs-12 tags-page-info-col">
        <span class="tags-page-description">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque interdum vulputate quam in lobortis. Aliquam erat volutpat. Donec sagittis diam nec lorem eleifend, quis feugiat velit consequat. Nunc tempus, nisi viverra tincidunt accumsan, nisi sapien auctor purus, et sodales sem urna placerat elit.
        </span>
				<p class="current-tags">TAGS: <span class="tag-keyword">"<?php single_cat_title(); ?>"</span></p>
			</div>
		</div>
		<div class="row sample tags">
			<div class="col-xs-6 sample-item">
				<div class="row category tags">
					<div class="col-xs-4 category-name">
						<span>TIN TỨC</span>
					</div>
					<div class="col-xs-8 type-list"></div>
				</div>
				<div class="news-container">
					<?php
					$term_tags = get_queried_object();
					$args_sp = array(
						'post_type'=>'news_info',
						'tax_query'=>array(
							array(
								'taxonomy' => 'post_tag',
								'field'    => 'slug',
								'terms'    =>$term_tags->slug
							)
						)
					);
					$tintuc = new WP_Query($args_sp);
					if($tintuc->have_posts()):
						?>
					<?php while($tintuc->have_posts()):$tintuc->the_post(); ?>
					<article class="row archive">

						<div class="featured-thumb col-xs-12">
							<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail(array(271,169,'bfi_thumb'=>true),array('class' => 'img-responsive')); ?>
							</a>
						</div>
						<div class="col-xs-12 entry-container">
							<header class="entry-header">
								<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

								<div class="entry-meta">
									<span class="posted-on"><?php the_time('d/m/Y'); ?></span>
								</div>
								<!-- .entry-meta -->
							</header>
							<!-- .entry-header -->

							<div class="entry-content">
								<p><?php the_excerpt(); ?><a class="more" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More</a></p>
							</div>
							<!-- .entry-content -->
						</div>
					</article>
					<?php endwhile; wp_reset_query(); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-xs-6 sample-item">
				<div class="row category tags">
					<div class="col-xs-4 category-name">
						<span>SẢN PHẨM</span>
					</div>
					<div class="col-xs-8 type-list"></div>
				</div>
				<?php if ( have_posts() ) : ?>
					<?php
					?>

						<?php woocommerce_product_subcategories(); ?>

						<?php while ( have_posts() ) : the_post(); ?>
							<div class="thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(array(236,330),array('class'=>'img-responsive main-img')); ?>
								</a>
								<div class="caption">
									<a href="<?php the_permalink(); ?>"><span class="caption-title"><?php hhs_brand_2(); ?></span></a>
									<hr>
									<?php
									$product = new WC_Product(get_the_ID());
									?>
									<p class="caption-description"><?php echo get_the_title().$product->get_sku(); ?></p>
									<div class="caption-price">
										<?php
										$price = get_post_meta( get_the_ID(), '_regular_price', true);
										$sale = get_post_meta( get_the_ID(), '_sale_price', true);
										?>
										<div class="price-info">
											<?php echo '<p class="old-price">'.number_format($price,0,'.','.').' VNĐ</p>'?>
											<?php echo '<p class="new-price">'.number_format($sale,0,'.','.').' VNĐ</p>'?>
										</div>
										<div class="cart">
											<a href="<?php echo esc_url( $product->add_to_cart_url());?>"><img src="<?php echo get_template_directory_uri()?>/img/product-cart.png"></a>
										</div>
									</div>
								</div>
							</div>

						<?php endwhile; // end of the loop. ?>

						<?php
						/**
						 * woocommerce_after_shop_loop hook
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						?>
					<?php
					do_action( 'woocommerce_after_shop_loop' );
					?>

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
					<?php wc_get_template( 'loop/no-products-found.php' ); ?>
				<?php endif; ?>


			</div>
		</div>

	</div>
</article>
<?php get_footer(); ?>