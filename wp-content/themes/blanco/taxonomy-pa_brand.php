<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
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
    <?php if($mobile_sidebar == 'top'): ?>
        <?php if($product_sidebar) : ?>
        	<div id="products-sidebar" class="main-products-sidebar above-content">
        		<?php if ( is_active_sidebar( 'product-widget-area' ) ) : ?>
        			<?php dynamic_sidebar( 'product-widget-area' ); ?>
                <?php else: ?>
                    <?php etheme_get_wc_categories_menu() ?>
        		<?php endif; ?>	
            </div>
    	<?php endif; ?>	
    <?php endif; ?>
	<div id="default_products_page_container" class="<?php if(!$product_sidebar) echo 'no-sidebar'; else echo 'with-sidebar'?>">
    <?php
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        if(!$cat->term_id){
            $image = etheme_get_option('product_bage_banner');
        }else{
            $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );
        }
        if($image && $image !=''){
            ?> <img class="cat-banner" src="<?php echo $image ?>" /> <?php
        }
        
     ?>
     	<?php do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( is_tax() ) : ?>
			<?php do_action( 'woocommerce_taxonomy_archive_description' ); ?>
		<?php elseif ( ! empty( $shop_page ) && is_object( $shop_page ) ) : ?>
			<?php do_action( 'woocommerce_product_archive_description', $shop_page ); ?>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>

            <div class="toolbar">
                <?php do_action('woocommerce_before_shop_loop'); ?>
                <div class="clear"></div>
            </div>
            
            <div class="products-categoies">
				<?php woocommerce_product_subcategories(); ?>
		      <div class="clear"></div>
            </div>
                <div id="products-grid" class="products_grid rows-count<?php echo $product_per_row ?>">
    				<?php while ( have_posts() ) : the_post(); ?>
    		
    					<?php woocommerce_get_template_part( 'content', 'product' ); ?>
    		
    				<?php endwhile; // end of the loop. ?>
				</div>
    		<div class="clear"></div>
    
            <div class="toolbar bottom">
            	<?php do_action('woocommerce_after_shop_loop'); ?>
                <div class="clear"></div>
            </div>
    		
		<?php else : ?>
		
			<?php if ( ! woocommerce_product_subcategories( array( 'before' => '<ul class="products">', 'after' => '</ul>' ) ) ) : ?>
					
				<p class="error"><?php _e( 'No products found which match your selection.', ETHEME_DOMAIN ); ?></p>
					
			<?php endif; ?>
		
		<?php endif; ?>
		


        </div><script type="text/javascript">imageTooltip(jQuery('.imageTooltip'))</script>
    <?php if($mobile_sidebar == 'bottom'): ?>
        <?php if($product_sidebar) : ?>
     <div id="products-sidebar" class="main-products-sidebar">

                <?php etheme_get_wc_categories_menu() ?>

                <?php if ( is_active_sidebar( 'product-widget-area' ) ) : ?>

                    <?php dynamic_sidebar( 'product-widget-area' ); ?>

                <?php endif; ?> 

                <div class="block fillter_widget cats acc_enabled">

                    <div class="block-content">

                        <div class="block-head">Tìm kiếm sản phẩm</div>

                        <?php $brand_data = get_categories(array('taxonomy'=>'pa_brand','type'=>'product')); ?>

                        <?php if(!empty($brand_data)):  ?>

                        <span>Thương Hiệu : </span>

                            <select id="brand_fillter">

                            <option <?php if('0' == $get_brand) { echo 'selected="selected"'; } ?> value="0">Tất Cả</option>

                            <?php foreach ($brand_data as $brand): $get_brand = $_GET['pa_brand']; ?>

                                <option <?php if($brand->slug == $get_brand) { echo 'selected="selected"'; } ?> value="<?php echo $brand->slug; ?>"><?php echo $brand->name; ?></option>

                            <?php endforeach; ?>

                            </select>

                            <script src="<?php echo get_template_directory_uri().'/js/jqueryui/js/jquery-ui-1.9.2.custom.min.js' ?>"></script>

                            <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri().'/js/jqueryui/css/ui-lightness/jquery-ui-1.9.2.custom.min.css' ?>" />

                        <span>Giá Sản Phẩm : </span>

                        <input type="text" id="amount" style="border:0; color:#333;width:100%;" />

                        <div id="slider-range"></div>

                        <button class="btn btn-success">Tìm</button>

                         <script>

                function formatcu(n) {

    return n.toFixed(0).replace(/./g, function(c, i, a) {

        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;

    });

}

                            $(function() {

                            $( "#slider-range" ).slider({

                            range: true,

                            min: 0,

                            max: 5000000,

                            values: [ <?php if(isset($_GET['min_price'])) { echo $_GET['min_price']; } else { echo '100000'; } ?>, <?php if(isset($_GET['max_price'])) { echo $_GET['max_price']; } else { echo '500000'; } ?> ],

                            slide: function( event, ui ) {

                            $( "#amount" ).val(formatcu(ui.values[ 0 ]) + "VNĐ-" + formatcu(ui.values[ 1 ])+"VNĐ") ;

                            }

                            });

                            $( "#amount" ).val(formatcu($( "#slider-range" ).slider( "values", 0 ))+ " VNĐ - "+ formatcu($( "#slider-range" ).slider( "values", 1 ))+" VNĐ");

                            });

                            $('.btn-success').click(function(){

                                var amount =  $( "#amount" ).val().split('-');

                                var minprice = amount[0].trim().replace(/,|VNĐ/g, "");

                                var maxprice = amount[1].trim().replace(/,|VNĐ/g, "");

                                var brand = $('#brand_fillter').val();

                                var brand_query = '';

                                if(brand != 0)

                                {

                                    brand_query = 'pa_brand='+brand;

                                }

                                var kvp = document.URL.split("?");

                                var url = kvp[0]+"?"+brand_query+"&min_price="+minprice+"&max_price="+maxprice;

                                window.location.assign(url);

                            });

                         </script>

                         <style>

                         #woocommerce_price_filter-2{display:none!important;}

                         .ui-slider-horizontal{height:8px;}

                         .ui-slider .ui-slider-handle { height:16px;}

                         .ui-widget-header{background:#ED412F;}

                         .fillter_widget span{font-weight:normal;font-size:12px;}

                         .btn-success{border:1px solid #0BBBA4;background:#0BBBA4;color:#fff;text-transform: uppercase;cursor: pointer;}

                         </style>

                        <?php  endif; ?>

                    </div>

                </div>

            </div>

        <?php endif; ?> 

    <?php endif; ?> 
    <div class="clear"></div>
</section><!-- #container -->
<?php get_footer('shop'); ?>