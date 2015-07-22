<aside class="col-md-3">
	<?php $blog = new WP_Query(array('showposts'=>5,'post_type'=>'news_info'));?>
	<?php if($blog->have_posts()): ?>
	<div class="widget widget-blog">
		<h3 class="widget-title">BÀI VIẾT MỚI NHẤT</h3>
		<ul>
			<?php while($blog->have_posts()):$blog->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile;  wp_reset_postdata(); ?>
		</ul>
	</div>
<?php endif; ?>
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('blog-widgets')) : else : echo __('Vui lòng thêm Extension cho Sidebar Blog','hanghieu'); ?>
	<?php endif; ?>
	<?php
		$args = array(
		'post_type' => 'product',
		'posts_per_page' => 5,
		'meta_key' => 'total_sales',
		'orderby' => 'meta_value_num',
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