<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce;

$product_layout = etheme_get_option('product_layout');
$cloud_zoom = etheme_get_option('cloud_zoom');
$mainHeight = 400;
$imgId = get_post_thumbnail_id();
$crop = (get_option('woocommerce_single_image_crop') == 1) ? true : false;
if($product_layout == 'horizontal') { 
    $mainWidth = 460;
}else if ($product_layout == 'vertical' || $product_layout == 'universal'){
    $mainWidth = 330;
}else{
    $mainWidth = 400;
}

if($cloud_zoom == 1){
    wp_enqueue_style("cloud-zoom",get_template_directory_uri().'/css/cloud-zoom.css');
    wp_enqueue_script('cloud-zoom', get_template_directory_uri().'/js/cloud-zoom.1.0.2.js');
}

?>
<style type="text/css">
    .main-image img {
        height: auto;
    }
</style>
<h1 class="mobile-title"><?php the_title(); ?></h1>
<div class="product-images images <?php if($cloud_zoom == 1){ echo "zoom-enabled"; } ?>">
 
<?php if(get_field('new') == 1){
    ?> <img class="icon-flash" style="z-index:99991" src="<?php echo bloginfo('template_url') ?>/new.png" alt="">
  <?php }else if(get_field('het_hang') == 1){
      ?>
      <img class="icon-flash" style="z-index:99991"  src="<?php echo bloginfo('template_url') ?>/het-hang.png" alt="">
    <?php }
  $price = get_post_meta( get_the_ID(), '_regular_price', true);
  $sale = get_post_meta( get_the_ID(), '_sale_price', true);
  if($sale && $sale < $price){
  echo '<span class="price-sale" style="z-index:99991" >'.number_format( ($price - $sale)/$price*100 ).'</span>';
  }
  
    ?>
 
	<?php etheme_print_stars(); ?>
	<?php if ( has_post_thumbnail() ) : ?>
        <div class="main-image" style="position:relative;">
            <a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" id="zoom1" class="woocommerce-main-image zoom cloud-zoom main-zoom-image" <?php if($cloud_zoom == 1){ ?> cloud-zoom-data="adjustX: 10, adjustY:-4" <?php }else{ ?> rel="lightbox[gallery]" <?php } ?> title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>">
                <!-- <img class="attachment-shop_single wp-post-image" src="<?php //echo etheme_get_image( $imgId, $mainWidth, $mainHeight, $crop ) ?>"  /> -->
                <?php the_post_thumbnail('full',array('class'=>'attachment-shop_single wp-post-image click_image')); ?>
            </a>
        </div>
	<?php else : ?>
	
		<img width="<?= $mainWidth ?>" height="<?= $mainHeight ?>" src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" />
	
	<?php endif; ?>

	<?php do_action('woocommerce_product_thumbnails'); ?>

</div>