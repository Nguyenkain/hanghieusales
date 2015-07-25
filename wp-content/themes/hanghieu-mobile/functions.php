<?php
/**
 * Themes Function File
 */
if (!function_exists('_vnnteam_setup')):
    function _vnnteam_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on _s, use a find and replace
         * to change '_s' to the name of your theme in all the template files
         */
        load_theme_textdomain('hanghieu', get_template_directory() . '/languages');
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        register_nav_menus(array(
            'product-location' => __('Product Menu Location', 'hanghieu')
        ));
        // Enable support for Post Formats.
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link'
        ));
        // Enable support for HTML5 markup.
        add_theme_support('html5', array(
            'comment-list',
            'search-form',
            'comment-form',
            'gallery',
            'caption',
        ));
        add_theme_support( 'woocommerce' );
    }
endif;
add_action('after_setup_theme', '_vnnteam_setup');
add_theme_support('post-thumbnails');
function defaultblog_post_thumbnail($html)
{
    if (empty($html))
        $html = '<img src="' . trailingslashit(get_stylesheet_directory_uri()) . 'img/no-images.jpg' . '" alt="' . get_bloginfo('description') . '" />';
    return $html;
}
/**
Theme Script
*/
function hanghieu_enque_script()
{
    if(!is_admin())
    {
        // wp_enqueue_script('_vinateam-jquery',get_template_directory_uri().'/js/jquery-2.1.3.min.js',array(),'2.1.3',true);
    }
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_enqueue_style('owl-carousel-css',get_template_directory_uri().'/dist/owl-carousel/owl.carousel.css',array(),false);
    wp_enqueue_style('owl-carousel-css-transition',get_template_directory_uri().'/dist/owl-carousel/owl.transitions.css',array(),false);
    wp_enqueue_style('owl-carousel-css-theme',get_template_directory_uri().'/dist/owl-carousel/owl.theme.css',array(),false);
    // Register Styles
	wp_enqueue_style('swiper-css',get_template_directory_uri().'/dist/swiper/swiper.min.css',array(),false);
    wp_enqueue_style('hanghieu-boostrap-style',get_template_directory_uri().'/dist/bs3/css/bootstrap.min.css',array(),false);
    wp_enqueue_style('hanghieu-font-awesome-icon',get_template_directory_uri().'/dist/font-awesome/css/font-awesome.min.css',array(),false);
    wp_enqueue_style('hanghieu-style-old',get_template_directory_uri().'/css/style.css',array(),false);
    wp_enqueue_style('hanghieu-style',get_template_directory_uri().'/css/main.css',array(),false);
    wp_enqueue_style('hanghieu-style-2',get_template_directory_uri().'/css/product.css',array(),false);
    wp_enqueue_style('hanghieu-style-customs',get_template_directory_uri().'/style.css',array(),false);
    // Register Script
    wp_enqueue_script('bx-slider',get_template_directory_uri().'/js/jquery.bxslider.min.js',array('jquery'),false,true);
    wp_enqueue_script('owl-carousel-js',get_template_directory_uri().'/dist/owl-carousel/owl.carousel.min.js',array('jquery'),'2.0',true);
    wp_enqueue_script('hanghieu_bootstrap_script',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'2.0',true);
    wp_enqueue_script('hanghieu_jquery-ui_script',get_template_directory_uri().'/js/jquery-ui.min.js',array('jquery'),false,true);
    wp_enqueue_script('hanghieu_swiper_script',get_template_directory_uri().'/js/swiper.jquery.min.js',array('jquery'),false,true);
    wp_enqueue_script('hanghieu_script',get_template_directory_uri().'/js/hanghieu.js',array('jquery'),'2.0',true);
    wp_enqueue_script('hanghieu_main_script',get_template_directory_uri().'/js/main.js',array('jquery'),false,true);
    wp_localize_script('hanghieu_script','hanghieu_script',array('hanghieu_ajax_url' => admin_url( 'admin-ajax.php' )));
    wp_enqueue_script('hanghieu_script');
}
 add_action('wp_enqueue_scripts','hanghieu_enque_script');
// Sidebar
// Declare sidebar widget zone
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Footer Widgets',
		'id'   => 'footer-widgets',
		'description'   => __('Widget Footer','hanghieu'),
		'before_widget' => '<div class="widget %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	));
}
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Product Widgets',
        'id'   => 'product-widgets',
        'description'   => __('Widget Footer','hanghieu'),
        'before_widget' => '<div class="widget %2$s" id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ));
}
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Blog Widgets',
        'id'   => 'blog-widgets',
        'description'   => __('Widget blog','hanghieu'),
        'before_widget' => '<div class="widget %2$s" id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ));
}
// END Sidebar
// Declare sidebar widget zone
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'HomePage Widgets',
        'id'   => 'homepage-widgets',
        'description'   => __('Widget trang chủ','_vnnteam'),
        'before_widget' => '<div class="widget-home %2$s" id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="title-section">',
        'after_title'   => '</h3>'
    ));
}
function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
// END Sidebar
// Requice Theme
require get_template_directory() .'/inc/BFI_Thumb.php';
require get_template_directory() .'/inc/news_info.php';
require get_template_directory() .'/config/woocommerce.php';
require get_template_directory() .'/widget/show_product_list_widget.php';
require get_template_directory() .'/inc/metabox/config.php';
function big_title($title)
{
    $title_array = explode(' ',$title);
    $i=0;
    $title_return = '';
    foreach($title_array as $title_array)
    {
        if($i == 2)
        {
            $title_return .= '<span>';
        }
        $title_return .= $title_array.' ';
        $i++;
    }
    $title_return .= '</span>';
    echo $title_return;
}
function social_share()
{
    ?>
    <div class="social-share">
        <a href="#"><i class="fa fa-facebook-official"></i></a>
        <a href="#"><i class="fa fa-google-plus-square"></i></a>
        <a href="#"><i class="fa fa-twitter-square"></i></a>
        <a href="#"><i class="fa fa-linkedin-square"></i></a>
    </div>
    <?php
}

function product_percent_2()
{
	$price = get_post_meta( get_the_ID(), '_regular_price', true);
	$sale = get_post_meta( get_the_ID(), '_sale_price', true);
	if(!empty($sale)){
		$percent = $sale/$price;
		$percent = $percent*100;
		$percent = 100 - $percent;
	}
	// Hàng mới hay không
	$new = get_field_object('new',get_the_ID());
	$new = $new['value'];
	$new = intval($new);
	if($new == 1){
		echo '';
	}
	echo '<span class="percent-sale">-'.round($percent,0).'%</span>';
}
add_action('woocommerce_before_shop_loop_item_title','product_percent');