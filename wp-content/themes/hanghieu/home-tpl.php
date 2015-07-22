<?php
/**
Template Name: Home Page
*/
get_header();
?>
	<article id="main-content">
		<div class="section">
			<div class="container">
				<div class="row row-no-padding">
					<div class="col-md-3">
							<?php
							   /**
								* Displays a navigation menu
								* @param array $home_args_menu Arguments
								*/
								$home_args_menu = array(
									'theme_location' => 'product-location',
									'menu' => '',
									'container' => '',
									'container_class' => '',
									'container_id' => '',
									'menu_class' => 'menu',
									'menu_id' => '',
									'echo' => true,
									'fallback_cb' => 'wp_page_menu',
									'before' => '',
									'after' => '',
									'link_before' => '',
									'link_after' => '',
									'items_wrap' => '<ul id = "main-menu" class ="%2$s">%3$s</ul>',
									'depth' => 0,
									'walker' => ''
								);
								wp_nav_menu( $home_args_menu );
							?>
					</div>
					<div class="col-md-6" id="main-slider">
						<ul id="top-slider">
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
					        <li>
					        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					        		<?php the_post_thumbnail(array(560,333,'bfi_thumb'=>true),array('class'=>'img-responsive')); ?>
					        	</a>
					        </li>
					        <?php
					    endwhile;
					endif;
					wp_reset_query();
?>
						</ul>
					</div>
					<?php
					$args2 = array(
					    'post_type' => 'product',
					    'meta_key' => '_featured',
					    'meta_value' => 'yes',
					    'posts_per_page' => 2,
					    'offset'=>5
					);
					$featured_query2 = new WP_Query( $args2 );
					if ($featured_query2->have_posts()) :
						echo '<div class="col-md-3 margin-10">';
					    while ($featured_query2->have_posts()) :
					        $featured_query2->the_post();
					        ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<div class="product-item">
										<?php the_post_thumbnail(array(260,165)); ?>
										<?php
								            $price = get_post_meta( get_the_ID(), '_regular_price', true);
								            $sale = get_post_meta( get_the_ID(), '_sale_price', true);
								            if($sale)
								            {
								                $price_html = '<p class="price">'.number_format($sale,0,'.','.').' VNĐ</p>';
								                $price_html .='<p class="price-old">'.number_format($price,0,'.','.').' VNĐ</p>';
								            }
								            else
								            {
								                    $price_html = '<p class="price">'.$price.'</p>';
								            }
								        ?>
								        <?php product_percent(); ?>
										<div class="info-product absolute center-position gray-bg">
											<?php echo $price_html; ?>
										</div>
									</div>
								</a>
					        <?php
					    endwhile;
					    echo '</div>';
					endif;
					wp_reset_query();
					?>
				</div>
				<!-- /.row row-no-padding -->
			</div>
			<!-- /.contaner -->
		</div>
		<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('homepage-widgets')) : else : echo __('Vui lòng thêm Extension cho homePage','hanghieu'); ?>
        <?php endif; ?>
        		<section class="section blog">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="box box-gray">
							<div class="heading-blog">
								<h3><?php _e('Tin tức','hanghieu'); ?></h3>
							</div>
							<?php $blog = new WP_Query(array('showposts'=>5,'post_type'=>'news_info'));
							?>
							<?php if($blog->have_posts()): ?>
							<div class="content-blog">
								<?php $i=1; while($blog->have_posts()):$blog->the_post(); ?>
								<?php if($i==1) {
									?>
									<div class="left-widget">
										<div class="thumb">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_post_thumbnail(array(280,354,'bfi_thumb'=>true),array('class'=>'img-responsive')); ?>
											</a>
										</div>
										<div class="info">
											<h3><?php the_title(); ?></h3>
											<p><i class="fa fa-calendar"></i>&nbsp;<?php the_time('d m Y'); ?></p>
										</div>
									</div>
									<?php
								}
								if($i == 2 )
								{
									?>
									<div class="right-widget">
										<ul>
									<?php
								} ?>
										<?php if($i != 1) {
											?>
											<li>
												<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
												<p><i class="fa fa-calendar"></i>&nbsp;<?php the_time('d m Y'); ?></p>
											</li>
											<?php
										} ?>
								<?php if($i>1 && $i == $blog->post_count) {
									?>
									</ul>
								</div>
									<?php
								} ?>
							<?php $i++; endwhile; wp_reset_postdata(); ?>
							</div>
						<?php endif; ?>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box">
							<div class="heading-blog">
								<h3><?php _e('Nổi bật','hanghieu'); ?></h3>
							</div>
							<?php $noibat = new WP_Query(array('showposts'=>5,'post_type'=>'news_info','tax_query'=>array(
								array(
										'taxonomy'=>'category_info',
										'field'    => 'term_id',
										'terms'    =>1330,
									)
								)));
							?>
							<?php if($noibat->have_posts()): ?>
							<div class="content-blog">
								<?php $j=1; while($noibat->have_posts()):$noibat->the_post(); ?>
								<?php if($j==1) {
									?>
									<div class="top-widget">
										<div class="thumb">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_post_thumbnail(array(350,195,'bfi_thumb'=>true),array('class'=>'img-responsive')); ?>
											</a>
										</div>
										<div class="info">
											<h3><?php the_title(); ?></h3>
											<!-- <p><i class="fa fa-calendar"></i>&nbsp;<?php the_time('d m Y'); ?></p> -->
										</div>
									</div>
									<?php
								}
								?>
								<?php
								if($j == 2 )
								{
									?>
									<div class="as-widget">
										<ul>
									<?php
								} ?>
										<?php if($j != 1) {
											?>
											<li>
												<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
											</li>
											<?php
										} ?>
									<?php if($j>1 && $j == $noibat->post_count) {
									?>
									</ul>
								</div>
								<?php
								} ?>
								<?php $j++; endwhile; wp_reset_postdata(); ?>
							</div>
						<?php endif; ?>
						</div>
					</div>
					<div class="col-md-2 content-ads">
						<a href="#">
							<img class="img-responsive"  src="<?php echo get_template_directory_uri(); ?>/images/ads.png" alt="">
						</a>
					</div>
				</div>
			</div>
		</section>
        <?php get_template_part('aside','footer'); ?>
	</article>
<?php
get_footer();
?>