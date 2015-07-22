		<?php if(! empty( $_COOKIE['woocommerce_recently_viewed'] ))
		{
			?>
			<div class="section last-views">
				<div class="container">
					<div class="row row-no-padding" style="margin-left:-15px;margin-right:-15px;">
						<div class="col-md-1">
							<div class="hd-last">
								Sản phẩm bạn vừa xem
							</div>
						</div>
						<div class="col-md-11">
							<?php rc_woocommerce_recently_viewed_products(); ?>
							<div class="controls-view">
								
							</div>
							<!-- /.controls-view -->
						</div>
					</div>
				</div>
			</div>
			<!-- /.section last-views -->
			<?php
		}
		?>
		<div class="section tag-cloud">
			<div class="container">
					<span>Tags:</span>
					<?php
						$terms = get_terms( 'product_tag' );
						 if ( ! empty( $terms ) ){
						     foreach ( $terms as $term ) {
						     	$link = get_term_link($term,'product_tag');
						       echo '<a href="'.$link.'">' . $term->name . '</a>';
						     }
						 }
					?>
			</div>
			<!-- /.container -->
		</div>
		<div class="section privacy">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="items">
							<h4 class="title-items"><span><i class="fa fa-shopping-cart"></i>&nbsp;</span>Hướng dẫn mua hàng</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, commodi repudiandae laudantium fugiat dignissimos...</p>
							<a href="#" class="more-privacy">Xem thêm &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="items">
							<h4 class="title-items"><span><i class="fa fa-shopping-cart"></i>&nbsp;</span>Hướng dẫn mua hàng</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, commodi repudiandae laudantium fugiat dignissimos...</p>
							<a href="#" class="more-privacy">Xem thêm &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="items">
							<h4 class="title-items"><span><i class="fa fa-shopping-cart"></i>&nbsp;</span>Hướng dẫn mua hàng</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, commodi repudiandae laudantium fugiat dignissimos...</p>
							<a href="#" class="more-privacy">Xem thêm &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="items">
							<h4 class="title-items"><span><i class="fa fa-shopping-cart"></i></span>Hướng dẫn mua hàng</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, commodi repudiandae laudantium fugiat dignissimos...</p>
							<a href="#" class="more-privacy">Xem thêm &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /.section privacy -->
		<div class="section secton-newslester">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<form class="form-inline" role="form">
						  <div class="form-group">
						    <label for="email">nhận tin khuyễn mãi</label>
						    <input type="email" class="form-control" id="email" placeholder="Enter email">
						  </div>
						  <button type="submit" class="btn btn-default"><i class="fa fa-send"></i></button>
						</form>
					</div>
					<!-- /.pull-left -->
					<div class="col-md-6">
						<div class="social-icon">
							<ul>
								<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /.section secton-newslester -->