<?php
/**
Template Name:FullWidth
*/
get_header();
?>
<article id="main-content">
<div class="breacrumb">
	<div class="container">
			<a href="<?php echo home_url(); ?>">Trang chủ</a>
			<span>//</span>
			<a href="javascript://"><?php the_title(); ?></a>
	</div>
</div>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div>
					<?php if(have_posts()):while(have_posts()):the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
</div>
<?php get_template_part('content','footer'); ?>
</article>
<?php get_footer(); ?>
?>