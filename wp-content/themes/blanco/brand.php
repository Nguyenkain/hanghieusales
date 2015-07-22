<?php
/**
  * Template Name: Brand
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    get_header('shop');
    do_action('woocommerce_before_main_content'); 
    $product_per_row = etheme_get_option('prodcuts_per_row'); 
    $product_sidebar = etheme_get_option('product_page_sidebar');
    $mobile_sidebar = etheme_get_option('blog_sidebar_mobile');
    if($product_per_row == 5){
        $product_sidebar = false;
    }
?> 
<section id="main" class="columns2-left">
 <div class="brand-list">
                  <?php 
                         $terms = get_terms("pa_brand");
                     foreach ( $terms as $term ) {
                          $archive_link = get_term_link( $term->slug, 'pa_brand');
                         echo '<a href="'.$archive_link.'">'.$term->name.'</a>';
                     
                     }
         
                  ?></div>
    <style>
        

    </style>
   
    <div class="clear"></div>
</section><!-- #container -->
<?php get_footer('shop'); ?>