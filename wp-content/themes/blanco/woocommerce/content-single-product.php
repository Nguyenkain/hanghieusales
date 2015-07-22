<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


do_action('woocommerce_before_single_product');
$product_layout = etheme_get_option('product_layout');
?>

<div class="clear"></div>
<div id="product-page" class="product_layout_<?php echo $product_layout; ?> product ">

    <?php do_action('woocommerce_before_single_product_summary'); ?>
    <div class="product-shop productcol summary">
        <?php do_action('woocommerce_single_product_summary'); ?>
        <!-- <?php echo thuoctinh('brand') ?> -->
        <div class="share"  >
            <p> CHIA SẺ : </p>
            <ul>
                <li>
                    <a href="<?php echo get_permalink(); ?>"><div class="facebook"> </div></a>
                </li>
                <li>
                    <a href="https://twitter.com/home?status="><div class="twitter"> </div></a>
                </li>
                <li>
                    <a href="https://plus.google.com.vn/share?url="><div class="google"> </div></a>
                </li>
                <li>
                    <a href="#"><div class="mail"> </div></a>
                </li>
            </ul>
        </div>

        <!--        <div class="cms__product__usp__call">
                    <p class="titlecall1">BẠN CẦN TRỢ GIÚP?</p>
        <p class="titlecall2" >HÃY LIÊN HỆ : 090 268 9449 (24/7) – 08. 6 291 25 28</p>
        <p class="titlecall3" style="font-size:11px;color:black">Thời gian làm việc:<br>Từ 9h đến 19h các ngày trong tuần.
        </p>
                </div> <br />-->

    </div><!-- .summary -->
    <div class="product-sidebar">
        <?php if (etheme_get_option('right_banners') && etheme_get_option('right_banners') != '') : ?>
            <?php etheme_option('right_banners'); ?>
        <?php else: ?>
            <?php dynamic_sidebar('product-single-widget-area'); ?>
            <?php wp_reset_query(); ?>
        <?php endif; ?>	

    </div>
    <div class="clear"></div> 
    <?php woocommerce_get_template('single-product/tabs.php'); ?>
    <div class="clear" style="height: 20px;"></div>
    <?php do_action('woocommerce_after_single_product_summary'); ?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action('woocommerce_after_single_product'); ?>