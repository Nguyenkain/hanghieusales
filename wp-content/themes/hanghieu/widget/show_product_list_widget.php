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
                    <div class="row row-no-padding">
                        <div class="heading-section clearfix">
                            <?php if(!empty($title)) { echo $before_title.'<span class="'.$icon_class.'"></span>'.$title.$after_title; } ?>
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
                            $product_list_cat = get_categories($args_product_cat);
                           // print_r($product_list_cat);
                            ?>
                            <?php if(!empty($product_list_cat)) {
                                ?>
                                <ul class="menu-heading">
                                    <?php foreach($product_list_cat as $product_list_cat) {
                                        ?>
                                        <li><a target="_blank" href="<?php echo get_term_link( $product_list_cat,'product_cat'); ?> " cat-term="<?php echo $product_list_cat->term_id; ?>"><?php echo $product_list_cat->name; ?></a></li>
                                        <?php
                                    } ?>
                                </ul>
                                <?php
                            } ?>
                        </div>
                        <div class="content-section clearfix">
                            <?php $product_widget_featured = new WP_Query(array(
                                'post_type'=>'product',
                                'showposts'=>4,
                                'meta_key' => '_featured',
                                'meta_value' => 'yes',
                                'tax_query'=>array(
                                        array(
                                                'taxonomy' => 'product_cat',
                                                'field'    => 'term_id',
                                                'terms'    =>$cat,
                                            )
                                    )
                                ));
                            ?>
                        <?php  if($product_widget_featured->have_posts()): ?>
                        <div class="col-md-7">
                            <ul class="items-slider">
                                <?php while($product_widget_featured->have_posts()):$product_widget_featured->the_post(); ?>
                                <li>
                                    <div class="items-big">
                                        <div class="thumb">
                                            <?php the_post_thumbnail(array(463,488),array('class'=>'img-responsive')); ?>
                                        </div>
                                        <div class="info">
                                            <h3 class="title-product">
                                                <?php big_title(get_the_title()); ?>
                                            </h3>
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
                                                    $price_html = '<p class="price-block">'.$price.'</p>';
                                            }
                                            echo $price_html;
                                        ?>
                                            <a href="<?php the_permalink(); ?>" class="action btn btn-black btn-buy">Mua ngay</a>
                                        </div>
                                    </div>
                                    <!-- /.items-big -->
                                </li>
                            <?php endwhile; wp_reset_postdata(); ?>
                            </ul>
                            <div class="big-direction"></div>
                            <!-- /.big-direction -->
                        </div>
                    <?php endif; ?>
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
                        <div class="col-md-5">
                            <?php while($product_widget_cat->have_posts()):$product_widget_cat->the_post(); ?>
                            <div class="col-md-6">
                                <div class="item-product-normal">
                                    <div class="thumb">
                                        <?php the_post_thumbnail(array(236,330,'bfi_thumb'=>true),array('class'=>'img-responsive')); ?>
                                        <div class="icon-more">
                                            <div class="icon icon-animate-left">
                                                <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
                                            </div>
                                            <div class="icon icon-animate-right">
                                                <?php
                                                $product = new WC_Product(get_the_ID());
                                                echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                                                sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s">%s</a>',
                                                    esc_url( $product->add_to_cart_url() ),
                                                    esc_attr( $product->id ),
                                                    esc_attr( $product->get_sku() ),
                                                    esc_attr( isset( $quantity ) ? $quantity : 1 ),
                                                    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                                                    esc_attr( $product->product_type ),
                                                    '<i class="fa fa-shopping-cart"></i>'
                                                ),
                                            $product );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h4><?php hhs_brand(); ?></h4>
                                        <p><?php the_title(); ?></p>
                                         <?php
                                            $price = get_post_meta( get_the_ID(), '_regular_price', true);
                                            $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                                            if($sale)
                                            {
                                                $price_html ='<p class="price-old">'.number_format($price,0,'.','.').' VNĐ</p>';
                                                $price_html .= '<p class="price">'.number_format($sale,0,'.','.').' VNĐ</p>';
                                            }
                                            else
                                            {
                                                    $price_html = '<p class="price-block">'.$price.'</p>';
                                            }
                                            echo $price_html;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                        <?php endif; ?>
                        </div>
                        <!-- /.content-section -->
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
            <label for="<?php echo $this->get_field_id('slide_position'); ?>">
                <?php _e('Slider Position:'); ?> </label>
            <select name="<?php echo $this->get_field_name('slide_position'); ?>" id="<?php echo $this->get_field_id('slide_position'); ?>">
                <option value="left" <?php if($slide_position == 'left') { echo 'selected="selected"'; } ?>> -- <?php _e('Trái','hanghieu'); ?> -- </option>
                <option value="right" <?php if($slide_position == 'right') { echo 'selected="selected"'; } ?>> -- <?php _e('Phải','hanghieu'); ?> -- </option>
                <option value="center" <?php if($slide_position == 'center') { echo 'selected="selected"'; } ?>> -- <?php _e('Chính giữa','hanghieu'); ?> -- </option>
            </select>
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