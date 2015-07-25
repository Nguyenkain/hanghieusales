<?php
/**
Template Name: Home Page
*/
get_header();
?>
	<article id="main-content">
		<div class="section">
			<div class="container">
				<div class="row slide">
					<div class="slides">
						<div class="slide-wrapper swiper-wrapper">
							<?php
							/**
							GET SẢN PHẨM NỔI BẬT ĐỂ LÀM SLIDER CREATE MẠNH QUYỀN 16/06/2015
							 */
							$args = array(
								'post_type' => 'product',
								'meta_key' => '_featured',
								'meta_value' => 'yes',
								'posts_per_page' => 7
							);
							$featured_query = new WP_Query( $args );
							if ($featured_query->have_posts()) :
								while ($featured_query->have_posts()) :
									$featured_query->the_post();
									?>
									<div class="swiper-slide">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_post_thumbnail(array(560,333,'bfi_thumb'=>true),array('class'=>'img-responsive')); ?>
										</a>
									</div>
								<?php
								endwhile;
							endif;
							wp_reset_query();
							?>
						</div>
						<!-- Add Pagination -->
						<div class="swiper-pagination"></div>
					</div>
				</div>
				<!--end slide-->

					<?php
					$args2 = array(
						'post_type' => 'product',
						'meta_key' => '_featured',
						'meta_value' => 'yes',
						'posts_per_page' => 3,
						'offset'=>5
					);
					$featured_query2 = new WP_Query( $args2 );
					if ($featured_query2->have_posts()) :
						echo '<div class="row top-product-list">';
						while ($featured_query2->have_posts()) :
							$featured_query2->the_post();
							?>
							<div class="col-xs-4 top-product-item">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php product_percent_2() ?>
									<?php
									$price = get_post_meta( get_the_ID(), '_regular_price', true);
									$sale = get_post_meta( get_the_ID(), '_sale_price', true);
									if($sale)
									{
										$price_html = '<span class="price-info"><b>'.number_format($sale,0,'.','.').' VNĐ</b><br/><span class="old-price">'.number_format($price,0,'.','.').' VNĐ</span></span>';
									}
									else
									{
										$price_html = '<span class="price-info"><b>'.number_format($price,0,'.','.').' VNĐ</b></span>';
									}
									?>
									<?php echo $price_html; ?>
									<?php the_post_thumbnail(array(260,165),array('class'=>'img-responsive')); ?>
								</a>
							</div>
						<?php
						endwhile;
						echo '</div>';
					endif;
					wp_reset_query();
					?>
				<!--end product top-->
			</div>
			<!-- /.contaner -->
		</div>

        <section class="section blog">
			<div class="container">
				<div class="row new">
					<div class="col-xs-8 new-content">
						<div class="row new-content-header">
							<div class="col-xs-3 new-content-header-title"><span>TIN TỨC</span></div>
							<div class="col-xs-9 new-content-header-child">
								<hr/>
							</div>
						</div>
						<hr class="top-hr"/>
						<div class="row child-row">
							<?php $blog = new WP_Query(array('showposts'=>5,'post_type'=>'news_info'));
							?>
							<?php if($blog->have_posts()): ?>
								<?php $i=1; while($blog->have_posts()):$blog->the_post(); ?>
									<?php if($i==1) {
										?>
										<div class="col-xs-7 new-top">
											<?php the_post_thumbnail(array(280,354,'bfi_thumb'=>true),array('class'=>'img-responsive')); ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<p class="title"><?php the_title(); ?></p>

												<p><i class="fa fa-calendar"></i>&nbsp;<?php the_time('d/m/Y'); ?></p>
											</a>
										</div>
									<?php
									}
									if($i == 2 )
									{
										?>
										<div class="col-xs-5 new-list">
									<?php
									} ?>
									<?php if($i != 1) {
										?>
										<div class="new-item">
											<p class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>

											<p><i class="fa fa-calendar"></i>&nbsp;<?php the_time('d/m/Y'); ?></p>
											<hr/>
										</div>
									<?php
									} ?>
									<?php if($i>1 && $i == $blog->post_count) {
										?>
										</div>
									<?php
									} ?>
									<?php $i++; endwhile; wp_reset_postdata(); ?>
							<?php endif; ?>
							</div>
					</div>
					<div class="col-xs-4 advertising-2">
						<img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/img/adv-2.png">
					</div>
				</div>
			</div>
		</section>
	</article>
<?php
get_footer();
?>