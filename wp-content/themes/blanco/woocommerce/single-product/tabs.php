<?php
/**
 * Single Product Tabs
 */
// Get tabs
echo '<img src="http://hanghieusales.com/wp-content/themes/blanco/images/huaden.png" style="margin: 0 auto;display: block;"/>';
echo '<div class="clear"></div>';
global $woocommerce, $post, $product;
$show_attr = ( get_option('woocommerce_enable_dimension_product_attributes') == 'yes' ? true : false );
?>

<ul id="tabs" class="product-tabs">
    <?php if ($post->post_content) : ?>
        <li><a href="#"><?php _e('Chi tiết sản phẩm', ETHEME_DOMAIN); ?></a>
            <section>
                <?php $heading = apply_filters('woocommerce_product_description_heading', __('Product Description', ETHEME_DOMAIN)); ?>

                <h3><?php echo $heading; ?></h3>

                <?php the_content(); ?>
            </section>
        </li>
    <?php endif; ?>

    <?php if ($product->has_attributes() || ( $show_attr && $product->has_dimensions() ) || ( $show_attr && $product->has_weight() )) { ?>
        <li><a href="#"><?php _e('Additional Information', ETHEME_DOMAIN); ?></a>
            <section>
                <?php $heading = apply_filters('woocommerce_product_additional_information_heading', __('Additional Information', ETHEME_DOMAIN)); ?>

                <h3><?php echo $heading; ?></h3>

                <?php $product->list_attributes(); ?>
            </section>
        </li>
    <?php } ?>

    <?php if (comments_open()) { ?>
        <li><a href="#"><?php _e('Bình luận ', ETHEME_DOMAIN); ?><?php echo comments_number(' (0)', ' (1)', ' (%)'); ?></a>
            <section class="is-open" style="display: block;">
                <div class="fb-comments" data-href="<?php echo get_permalink($product->id); ?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
            </section>
        </li>
    <?php } ?>

    <!-- <?php if (etheme_get_custom_field('_etheme_custom_tab1') && etheme_get_custom_field('_etheme_custom_tab1_title')) : ?>
            <li><a href="#"><?php etheme_custom_field('_etheme_custom_tab1_title'); ?></a>
                <section>
        <?php echo do_shortcode(etheme_get_custom_field('_etheme_custom_tab1')) ?>
                </section>
            </li>  
    <?php endif; ?>    
    <?php if (etheme_get_custom_field('_etheme_custom_tab2') && etheme_get_custom_field('_etheme_custom_tab2_title')) : ?>
            <li><a href="#"><?php etheme_custom_field('_etheme_custom_tab2_title'); ?></a>
                <section>
        <?php echo do_shortcode(etheme_get_custom_field('_etheme_custom_tab2')) ?>
                </section>
            </li>  
    <?php endif; ?>    
    
    <?php if (etheme_get_option('custom_tab') && etheme_get_option('custom_tab') != '') : ?>
            <li><a href="#"><?php etheme_option('custom_tab_title'); ?></a>
                <section>
        <?php echo do_shortcode(etheme_get_option('custom_tab')); ?>
                </section>
            </li>  
    <?php endif; ?> -->
    <li>
        <a href="">Thương hiệu</a>
        <section>
            <?php
            echo mota('brand');
            ?>
            <div class="intro">
                
            </div>
        </section>
    </li>
    <li>
        <a href="">Chính sách đổi hàng</a>
        <section>
            <div class="intro">
Với mục đích mang đến cho khách hàng dịch vụ bán hàng qua mạng tốt nhất, <b>HangHieuSales.Com</b> cho phép khách hàng có thể đổi -trả lại sản phẩm đã mua trong vòng 15 ngày kể từ ngày quý khách nhận hàng. </br>
Sau đây là cách thức và những quy định khi Quý khách có yêu cầu gửi trả lại sản phẩm:</br>
<b>Bước 1: </b>Trong vòng 15 ngày kể từ ngày nhận sản phẩm, xin quý khách vui lòng giữ sản phẩm trong trạng thái đóng gói, nhãn mác như ban đầu cùng các giấy tờ có liên quan, bao gồm:</br>
+ Đóng gói kỹ sản phẩm trước khi gửi.</br>
+ Hóa đơn đính kèm khi mua hàng của công ty.</br>
<b>Bước 2: </b> Quý khách gửi trả lại sản phẩm còn nguyên bao bì cùng các giấy tờ đã được nêu tại Bước 1 đến cho chúng tôi (Phí vận chuyển khi đổi hàng – quý khách chịu).</br>
<b>Bước 3: </b> Sau khi đã nhận, kiểm tra và chấp nhận sản phẩm mà Quý khách trả lại, Chúng tôi sẽ liên hệ với quý khách để đổi hàng hoặc hoàn tiền lại cho quý khách.</br>

              
            </div>
        </section>
    </li>
    <li>
        <a href="">Thông tin vận chuyển</a>
        <section>
            <div class="intro">
                 <img class="thumbnail" src="http://hanghieusales.com/wp-content/uploads/2014/11/don-hang.png" style="max-width:100%" alt="">
                
            </div>
        </section>
    </li>
</ul>
<div class="clear"></div>
