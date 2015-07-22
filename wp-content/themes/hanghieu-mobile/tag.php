<?php get_header();?>
<article id="main-content">
<div class="breacrumb">
	<div class="container">
			<a href="<?php echo home_url(); ?>" title="Trang chủ">Trang chủ</a>
			<span>//</span>
			<a href="javascript://">Tags</a>
	</div>
</div>
<div class="news-section">
	<div class="container">
		<div class="row">
			<h1 class="title-cat" style="margin-bottom:20px;">Tags : <?php single_cat_title(); ?></h1>
			<?php
			$term_tags = get_queried_object();
			$args_sp = array(
				'post_type'=>'product',
				'tax_query'=>array(
						array(
								'taxonomy' => 'product_tag',
		                        'field'    => 'slug',
		                        'terms'    =>$term_tags->slug
							)
					)
				);
			$sanpham = new WP_Query($args_sp);
			if($sanpham->have_posts()):
			?>
			<section class="section product-list-4cl clearfix">
				<div class="heading">
					<div class="heading-section clearfix">
						<h2 class="title-section">Sản phẩm</h2>
					</div>
				</div>
				<div class="row">
					<?php while($sanpham->have_posts()):$sanpham->the_post(); ?>
					<?php wc_get_template_part( 'content', 'product-carousel' ); ?>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</section>
			<!-- /.section product-grid -->
		<?php endif; ?>
		<!-- Content Post -->
		<?php
		global $wp_query;
		$args_ = array_merge( $wp_query->query_vars, array( 'post_type' => 'news_info' ) );
		query_posts( $args_ );
		?>
		<?php
		if(have_posts()):
		?>
		<section class="section clearfix">
			<div class="heading">
				<div class="heading-section clearfix">
					<h2 class="title-section">Tin tức</h2>
				</div>
			</div>
			<div class="news-list newtag-section">
				<?php while(have_posts()):the_post(); ?>
				<?php get_template_part( 'content', 'news-list' ); ?>
				<?php endwhile; wp_reset_query(); ?>
			</div>
		</section>
		<?php endif; ?>
		</div>
		<!-- /.row -->
	</div>
</div>
<?php get_template_part('aside','footer'); ?>
</article>
<?php get_footer(); ?>