<li <?php post_class(array('clearfix')); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	   <div class="small-thumb">
	      <?php the_post_thumbnail(array(76,76,'bfi_thumb'=>true),array('class'=>'img-responsive')); ?>
	   </div>
	   <!-- /.small-thumb -->
	   <div class="small-desc">
	      <?php hhs_brand(); ?>
	      <h3 class="title-product"><?php the_title(); ?></h3>
	      <?php
	            $price = get_post_meta( get_the_ID(), '_regular_price', true);
	            $sale = get_post_meta( get_the_ID(), '_sale_price', true);
	            if($sale)
	            {
	                $price_html = '<ins>'.number_format($sale,0,'.','.').' VNĐ</ins>';
	                $price_html .='<span class="amount">'.number_format($price,0,'.','.').' VNĐ</span>';
	            }
	            else
	            {
	                    $price_html = '<p class="price">'.$price.'</p>';
	            }
	            echo $price_html;
	        ?>
	   </div>
	   <!-- /.small-desc -->
	</a>
	</li>