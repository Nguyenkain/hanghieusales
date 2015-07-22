<?php get_header();
?>
<article id="main-content">
<div class="breacrumb">
	<div class="container">
			<a href="<?php echo home_url(); ?>">Trang chủ</a>
			<span>//</span>
			<a href="javascript://"><?php single_cat_title(); ?></a>
	</div>
</div>
<div class="section">
	<div class="container">
		<div class="row">
			<?php get_sidebar(); ?>
			<div class="col-md-9">
				<div>
					<?php if (have_posts()): ?>
					<?php woocommerce_content(); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
</div>
<?php get_template_part('content','footer'); ?>
</article>
<?php get_footer(); ?>