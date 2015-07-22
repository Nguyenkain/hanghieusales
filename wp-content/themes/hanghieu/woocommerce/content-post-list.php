<div class="items clearfix">
<div class="thumb">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php the_post_thumbnail(array(271,169,'bfi_thumb'=>true)); ?>
	</a>
</div>
<div class="desc-post">
	<h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
	<p class="date"><?php the_time('d m Y'); ?></p>
	<div class="excerpt">
		<?php the_excerpt(); ?>
	</div>
	<div class="tags">
		Tags:   <?php the_tags('',' ',''); ?>
	</div>
	<p class="as-post">
		<span>0 bình luận</span>
		<span>Danh mục  <?php the_category(); ?></span>
	</p>
</div>
</div>