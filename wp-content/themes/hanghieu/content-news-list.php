<div <?php post_class(array('items','clearfix')); ?>>
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
			<?php the_tags('<div class="tags">Tags:',' ','</div>'); ?>
		<p class="as-post">
			<span>
				<?php
					$num_comments = get_comments_number();
					if ( $num_comments == 0 ) {
						$comments = __('0 bình luận');
					} elseif ( $num_comments > 1 ) {
						$comments = $num_comments . __(' bình luận');
					} else {
						$comments = __('1 bình luận');
					}
					echo $comments;
				?>
			</span>
			<span><?php the_terms( $post->ID, 'category_info', 'Danh mục: ', ' / ' ); ?></span>
		</p>
	</div>
</div>