<?php get_header();?>
<article id="main-content">
<div class="breacrumb">
	<div class="container">
			<a href="<?php echo home_url(); ?>">Trang chủ</a>
			<span>//</span>
			<a href="javascript://">Tin tức</a>
	</div>
</div>
<div class="news-section">
	<div class="container">
		<div class="row">
			<?php get_sidebar(); ?>
			<div class="col-md-9">
				<h1 class="title-cat">Tin tức</h1>
				<div class="news-list">
				<?php if(have_posts()):while(have_posts()):the_post(); ?>
				<?php get_template_part('content','new-list'); ?>
				<?php endwhile; endif; ?>
					<div class="footer-list clearfix">
						<div class="pull-left">
							<select name="" id="">
								<option value="0">Sắp xếp</option>
							</select>
						</div>
						<div class="pull-right">
							<div class="wp-pagenavi">
							   <span class="pages">Trang 1 / 3</span>
							   <span class="current">1</span>
							   <a class="page larger" href="#">2</a>
							   <a class="page larger" href="#">3</a>
							   <a class="nextpostslink" rel="next" href="#">»</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
</div>
<?php get_sidebar('aside','footer'); ?>
</article>
<?php get_footer(); ?>