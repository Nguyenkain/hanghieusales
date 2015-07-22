<?php get_header();
the_post();
?>
<article id="main-content">
<div class="breacrumb">
	<div class="container">
			<a href="<?php echo home_url(); ?>">Trang chủ</a>
			<span>//</span>
			<a href="javascript://">Thương hiệu</a>
	</div>
</div>
<div class="brand-section">
	<div class="container">
		<?php
		$args_ = array(
			'post_type'=>'lshowcase',
			'showposts'=>-1
			);
		$logo = new WP_Query($args_);
		if($logo->have_posts()):while($logo->have_posts()):$logo->the_post();
		?>
		<a href="<?php echo get_post_meta(get_the_ID(),'urllink',true); ?>"><?php the_post_thumbnail('full',array('class'=>'img-responsive logo')); ?></a>
	<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
</div>
<?php get_template_part('content','footer'); ?>
</article>
<?php get_footer(); ?>