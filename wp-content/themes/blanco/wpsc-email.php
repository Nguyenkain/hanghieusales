<?php 
add_shortcode('product_cat', 'product_cat');
function product_cat($atts, $content=null){
    global $wpdb;
    if ( !class_exists('WP_eCommerce') && !class_exists('Woocommerce') ) return false;
    
    extract(shortcode_atts(array( 
        'image_width' => 220, 
        'image_height' => 220,
        'limit' => 20,
        'cat' => '0',
        'title' => __('Product category', ETHEME_DOMAIN)
    ), $atts)); 
    
    $key = '_etheme_new_label';
    
    $post_type = 'wpsc-product';
    if(class_exists('Woocommerce')) {
        $args = apply_filters('woocommerce_related_products_args', array(
            'post_type'             => 'product',
            'no_found_rows'         => 1,
            'product_cat' => $cat,
            'posts_per_page'        => $limit
        ) );
    }
    ob_start();
    etheme_create_slider($args,$title);
    $output = ob_get_contents();
    ob_end_clean();
    
    return $output;
}

?>