<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

global $product, $woocommerce_loop;
$versionvalues = get_the_terms($product->id, 'pa_brand');

foreach ($versionvalues as $versionvalue) {
    $brandpr = $versionvalue->slug;
}
$terms = get_the_terms($post->ID, 'product_cat');
foreach ($terms as $term) {
    if ($term->parent !== 0) {
        $related = ($term->slug);
    }
}
//$brandpr = $product->get_attribute('slug','pa_brand');
$catArray = wp_get_post_terms(get_the_ID(), 'product_cat');
//$related = $catArray[count($catArray) - 3]->slug;
//if (sizeof($related) == 0)
//    return;
$args = apply_filters('woocommerce_related_products_args', array(
    'post_type' => 'product',
    'ignore_sticky_posts' => 1,
    'no_found_rows' => 1,
    'posts_per_page' => 10,
    'orderby' => 'date',
    'pa_brand' => $brandpr,
    'product_cat' => $related
        ));

$products = new WP_Query($args);

$rand = rand(1000, 99999);
$woocommerce_loop['columns'] = $columns;
$related_count = 0;
if ($products->have_posts()) :
    ?>

    <div class="product-slider related">
        <h4 class="slider-title"><?php _e('Có Thể Bạn Sẽ Thích', ETHEME_DOMAIN); ?></h4>
        <div class="clear"></div>
        <div class="carousel">
            <div class="slider">
                <?php
                while ($products->have_posts()) : $products->the_post();
                    $related_count++;
                    ?>
                    <div class="slide product-slide">
                        <?php woocommerce_get_template_part('content', 'product'); ?>
                    </div> 
                <?php endwhile; // end of the loop.    ?>
            </div>
        </div>
        <?php if ($related_count > 4): ?>
            <div class="prev related-arrow arrow<?php echo $rand ?>" style="cursor: pointer; ">&nbsp;</div>
            <div class="next related-arrow arrow<?php echo $rand ?>" style="cursor: pointer; ">&nbsp;</div>
        <?php endif; ?>

    </div><!-- product-slider -->     
    <?php if ($related_count > 4): ?>
        <script type="text/javascript">
            jQuery('.arrow<?php echo $rand ?>.prev').addClass('disabled');
            jQuery('.carousel').iosSlider({
                desktopClickDrag: true,
                snapToChildren: true,
                infiniteSlider: false,
                navNextSelector: '.arrow<?php echo $rand ?>.next',
                navPrevSelector: '.arrow<?php echo $rand ?>.prev',
                lastSlideOffset: 3,
                onFirstSlideComplete: function () {
                    jQuery('.arrow<?php echo $rand ?>.prev').addClass('disabled');
                },
                onLastSlideComplete: function () {
                    jQuery('.arrow<?php echo $rand ?>.next').addClass('disabled');
                },
                onSlideChange: function () {
                    jQuery('.arrow<?php echo $rand ?>.prev').removeClass('disabled');
                    jQuery('.arrow<?php echo $rand ?>.next').removeClass('disabled');
                }
            });
        </script>
    <?php endif; ?>

    <?php
endif;

wp_reset_query();
