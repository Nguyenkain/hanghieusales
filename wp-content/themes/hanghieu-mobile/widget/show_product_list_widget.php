<?php
class Show_Product_By_Parent_Cat extends WP_Widget {

    //Khởi tạo contructor của 1 lớp
    function Show_Product_By_Parent_Cat(){
        parent::WP_Widget('Show_Product_By_Parent_Category',
            '***** HHS - Hiện thị list sản phẩm theo danh mục *****',
            array('description' => 'Hiện thị list sản phẩm theo danh mục'));
    }
    function widget( $args, $instance ) {
        extract($args);
        extract($instance);
        global $product;
        $title = apply_filters( 'widget_title',
            empty($instance['title']) ? '' : $instance['title'],
            $instance, $this->id_base);
            ?>
            <section class="section section-product">
                <div class="container">
	                <div class="row category">
		                <div class="col-xs-3 category-name">
			                <img src="<?php echo get_template_directory_uri()?>/img/<?php echo (!empty($icon_class)) ? $icon_class : 'category-woman' ?>.png" class="img-responsive">
			                <?php if(!empty($title)) { echo '<span>'.$title.'</span>'; } ?>
		                </div>
		                <div class="col-xs-9 type-list">
			                <?php
			                //echo $cat;
			                $args_product_cat = array(
				                'type'                     => 'product',
				                'child_of'                 => 1,
				                'parent'                   => $cat,
				                'orderby'                  => 'name',
				                'order'                    => 'ASC',
				                'hide_empty'               => 1,
				                'hierarchical'             => 1,
				                'exclude'                  => '',
				                'include'                  => '',
				                'number'                   => '',
				                'taxonomy'                 => 'product_cat',
				                'pad_counts'               => false
			                );
			                $product_list_cats = get_categories($args_product_cat);
			                // print_r($product_list_cat);
			                ?>
			                <?php if(!empty($product_list_cats)) {
				                ?>
				                <ul class="type-list-ul">
					                <?php foreach($product_list_cats as $i => $product_list_cat) {
						                if($i > 3){
							                break;
						                } else {
							                ?>
							                <li class="type-list-item"><a href="<?php echo get_term_link( $product_list_cat, 'product_cat' ); ?> " cat-term="<?php echo $product_list_cat->term_id; ?>"><?php echo $product_list_cat->name; ?></a>
							                </li>
						                <?php
						                }
					                }
					                ?>
					                <?php if(count($product_list_cats) > 4) { ?>
						                <li class="type-list-item more">
							                <button type="button" class="btn dropdown-toggle more-btn"
							                        data-toggle="dropdown"
							                        aria-haspopup="true" aria-expanded="false">
								                <span class="more-title">SẢN PHẨM KHÁC</span>
								                <span class="caret"></span>
								                <span class="sr-only">Toggle Dropdown</span>
							                </button>
							                <ul class="dropdown-menu">
								                <?php foreach($product_list_cats as $i => $product_list_cat) {
									                if($i > 3 ){?>
										                <li><a href="<?php echo get_term_link( $product_list_cat, 'product_cat' ); ?> " cat-term="<?php echo $product_list_cat->term_id; ?>"><?php echo $product_list_cat->name; ?></a>
										                </li>
	                                            <?php
									                }
								                } ?>
							                </ul>
						                </li>
					                <?php
					                }
					                ?>
				                </ul>
			                <?php
			                } ?>
		                </div>
	                </div>

                    <?php $product_widget_cat = new WP_Query(array(
                                'post_type'=>'product',
                                'showposts'=>2,
                                'tax_query'=>array(
                                        array(
                                                'taxonomy' => 'product_cat',
                                                'field'    => 'term_id',
                                                'terms'    =>$cat,
                                            )
                                    )
                                ));
                            ?>
                        <?php  if($product_widget_cat->have_posts()): ?>
                        <div class="row sample">
	                        <?php while($product_widget_cat->have_posts()):$product_widget_cat->the_post(); ?>
	                        <div class="col-xs-6 sample-item">
		                        <div class="thumbnail">
			                        <a href="<?php the_permalink(); ?>">
				                        <?php product_percent_2() ?>
				                        <span class="sale-title">SALE</span>
				                        <span class="new-title">NEW</span>
				                        <?php the_post_thumbnail(array(236,330,'bfi_thumb'=>true),array('class'=>'img-responsive')); ?>
			                        </a>

			                        <div class="caption clearfix">
				                        <a href="<?php the_permalink(); ?>"><span class="caption-title"><?php hhs_brand(); ?></span></a>
				                        <hr/>
				                        <?php
				                        $product = new WC_Product(get_the_ID());
				                        ?>
				                        <p class="caption-description"><?php echo get_the_title().$product->get_sku(); ?></p>

				                        <div class="caption-price">
					                        <?php
					                        $price = get_post_meta( get_the_ID(), '_regular_price', true);
					                        $sale = get_post_meta( get_the_ID(), '_sale_price', true);
					                        ?>
					                        <div class="price-info">
						                        <?php echo '<p class="old-price">'.number_format($price,0,'.','.').' VNĐ</p>'?>
						                        <?php echo '<p class="new-price">'.number_format($sale,0,'.','.').' VNĐ</p>'?>
					                        </div>
					                        <div class="cart">
						                        <a href="<?php echo esc_url( $product->add_to_cart_url());?>"><img src="<?php echo get_template_directory_uri()?>/img/product-cart.png"></a>
					                        </div>
				                        </div>
			                        </div>
		                        </div>
	                        </div>
	                        <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- /.row row-no-padding -->
                </div>
            </section>
            <!-- /.section section-product -->
        <?php
    }
    function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    if ( current_user_can('unfiltered_html') )
        $instance['show_post'] =  $new_instance['show_post'];
    else
        $instance['show_post'] = stripslashes(
            wp_filter_post_kses( addslashes($new_instance['show_post']) )
        );
    if ( current_user_can('unfiltered_html') )
        $instance['cat'] =  $new_instance['cat'];
    else
        $instance['cat'] = stripslashes(
            wp_filter_post_kses( addslashes($new_instance['cat']) )
        );
     $instance['slide_position'] = stripslashes(
            wp_filter_post_kses( addslashes($new_instance['slide_position']) )
            );
     $instance['slide_active'] = stripslashes(
            wp_filter_post_kses( addslashes($new_instance['slide_active']) )
            );
     $instance['icon_class'] = stripslashes(
            wp_filter_post_kses( addslashes($new_instance['icon_class']) )
            );
    return $instance;
}
function form( $instance ) {
        $instance = wp_parse_args( (array) $instance,
            array( 'title' => '', 'show_post' => 5,'cat'=>'') );
        $title = strip_tags($instance['title']);
        $cat = $instance['cat'];
        $show_post = format_to_edit($instance['show_post']);
        $slide_position = format_to_edit($instance['slide_position']);
        $slide_active = format_to_edit($instance['slide_active']);
        $icon_class = format_to_edit($instance['icon_class']);
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php _e('Tiêu đề:'); ?> </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                name="<?php echo $this->get_field_name('title'); ?>" type="text"
                value="<?php echo  esc_attr($title);?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('slide_active'); ?>">
                <?php _e('Slider Active:'); ?> </label>
            <input type="checkbox" <?php if($slide_active == 1) { echo 'checked="checked"'; } ?> value="1" name="<?php echo $this->get_field_name('slide_active'); ?>" id="<?php echo $this->get_field_id('slide_active'); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('show_post') ?>"><?php _e('Số bài hiển thị:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('show_post'); ?>" name="<?php echo $this->get_field_name('show_post'); ?>" type="text" value="<?php echo  esc_attr($show_post);?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('icon_class') ?>"><?php _e('Icon Class:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('icon_class'); ?>" name="<?php echo $this->get_field_name('icon_class'); ?>" type="text" value="<?php echo  esc_attr($icon_class);?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('cat') ?>"><?php _e('Danh mục:'); ?></label>
            <select id="<?php echo $this->get_field_id('cat') ?>" name="<?php echo $this->get_field_name('cat'); ?>">
            <?php
                $args = array(
                    'type'                     => 'product',
                    'child_of'                 => 0,
                    'parent'                   => 0,
                    'orderby'                  => 'name',
                    'order'                    => 'ASC',
                    'hide_empty'               => 1,
                    'hierarchical'             => 1,
                    'exclude'                  => '',
                    'include'                  => '',
                    'number'                   => '',
                    'taxonomy'                 => 'product_cat',
                    'pad_counts'               => false
                );
                $category  = get_categories($args);
                if($category) {
                    foreach ($category as $category)
                        {
             ?>
            <option value="<?php echo $category->cat_ID; ?>" <?php if($category->cat_ID == $cat) { echo 'selected="selected"'; } ?>><?php echo $category->cat_name; ?></option>
            <?php }} else { echo '<option>Chưa được phân loại</option>';}?>
            </select>
        </p>
<?php
    }
}
register_widget('Show_Product_By_Parent_Cat');