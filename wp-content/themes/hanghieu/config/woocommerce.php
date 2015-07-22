<?php
// WOO Config

function hhs_before_minicart()
{
$output = '<div class="icon-mini-cart">';
$output .='<a href="'.WC()->cart->get_cart_url().'" target="_blank" title="'.__('Xem giỏ hàng','hanghieu').'">';
$output .='<i class="fa fa-shopping-cart"></i>';
$output .='</a>';
$output .='<span class="num">'.sizeof( WC()->cart->get_cart() ).'</span>';
$output .='</div>';
$output .='<!-- /.icon-mini-cart -->';
$output .='<div class="mini-cart-product-list hide">';
echo $output;
}
function hhs_after_minicart()
{
$output ='</div>';
$output .='<!-- /.mini-cart -->';
echo $output;
}
add_action('woocommerce_after_mini_cart','hhs_after_minicart');
add_action('woocommerce_before_mini_cart','hhs_before_minicart');
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
function custom_woo_thumb()
{
global $product;
    ?>
    <div class="thumb">
      <?php echo woocommerce_get_product_thumbnail(); ?>
      <div class="icon-more">
         <div class="icon icon-animate-left">
            <i class="fa fa-link"></i>
         </div>
         <div class="icon icon-animate-right">
            <?php
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
   <?php
}
add_action('woocommerce_before_shop_loop_item_title','custom_woo_thumb',12);
function cs_wc_loop_add_to_cart_scripts() {
    if ( is_shop() || is_product_category() || is_product_tag() || is_product() ) : ?>
<script>
    jQuery( document ).ready( function( $ ) {
        $( document ).on( 'change', '.quantity .qty', function() {
            $( this ).parent( '.quantity' ).next( '.add_to_cart_button' ).attr( 'data-quantity', $( this ).val() );
        });
    });
</script>

    <?php endif;
}
add_action( 'wp_footer', 'cs_wc_loop_add_to_cart_scripts' );
function show_post_count()
{
    global $wp_query;
    $total    = $wp_query->found_posts;
    return $total;
}
function hhs_brand()
{
  global $product;
  $pa_brand = get_the_terms( $product->id, 'pa_brand');

      foreach ( $pa_brand as $pa_brand ) {
      	echo '<a class="hhs_brand" href="'.get_term_link( $pa_brand->term_id,'pa_brand').'" title="'.$pa_brand->name.'">'.$pa_brand->name.'</a>';
        }
}
// Custom woocommerce_before_shop_loop
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
add_action('woocommerce_before_main_content','hhs_wrap_single',10);
add_action('woocommerce_after_main_content','hhs_wrap_single_end',10);
function hhs_wrap_single()
{
  global $post;
  $terms = wp_get_post_terms( $post->ID,'product_cat');
  $terms_num = count($terms);
  ?>
  <article id="main-content">
    <div class="breacrumb">
      <div class="container">
          <a href="<?php echo home_url(); ?>" title="Trang chủ">Trang chủ</a>
          <?php
          if($terms){
            $i=0;
            foreach($terms as $terms)
            {
                if($i < $terms_num)
                {
                  echo '<span>//</span>';
                }
                ?>
                <a href="#"><?php echo $terms->name; ?></a>
                <?php
              }
              $i++;
          }
          ?>
      </div>
    </div>
  <?php
}
function hhs_wrap_single_end()
{
  echo '</article>';
}
function hss_html_before_single()
{
  ?>
  <div class="details-section">
      <div class="container">
        <div class="row">
  <?php
}
function hss_html_after_single()
{
  ?>
  </div>
</div>
</div>
  <?php
}
add_action('woocommerce_before_single_product','hss_html_before_single');
add_action('woocommerce_after_single_product','hss_html_after_single');
function rc_woocommerce_recently_viewed_products() {
    // Get shortcode parameters
    $per_page = 15;
    global $woocommerce;
    $viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
    $viewed_products = array_filter( array_map( 'absint', $viewed_products ) );
   if ( empty( $viewed_products ) )
        return '';
    if( !isset( $per_page ) ? $number = 5 : $number = $per_page )
    $query_args = array(
                    'posts_per_page' => $number,
                    'no_found_rows'  => 1,
                    'post_status'    => 'publish',
                    'post_type'      => 'product',
                    'post__in'       => $viewed_products,
                    'orderby'        => 'rand'
                    );
    $query_args['meta_query'] = array();
    $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
    $r = new WP_Query($query_args);
    if ( $r->have_posts() ) {
        if($r->found_posts() > 5) {
          ?>
          <script type="text/javascript">
            $(document).ready(function(){
                $('.last-view-items').bxSlider({
                controls:true,
                auto:false,
                pager:false,
                minSlides:5,
                maxSlides:15,
                slideMargin: 0,
                slideWidth:184,
                nextText:'<i class="fa fa-caret-right"></i>',
                prevText:'<i class="fa fa-caret-left"></i>',
                nextSelector:'.controls-view',
                prevSelector:'.controls-view'
              });
            });
          </script>
          <?php
        }
        echo '<ul class="last-view-items clearfix">';
        // Start the loop
        while ( $r->have_posts()) {
            $r->the_post();
            global $product;
            ?>
            <li class="clearfix">
              <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(array(111,73)); ?>
                <p class="title"><?php the_title(); ?></p>
              </a>
            </li>
            <?php
        }
        echo '</ul>';
    }
}
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

  $tabs['description']['title'] = __( 'Chi tiết sản phẩm' );   // Rename the description tab
  $tabs['description']['callback'] = 'hhs_chitietsp';
  unset( $tabs['reviews'] );
  $tabs['comments']['title'] = __('Bình luận').' ( ' .get_comments_number() . ' ) ';
  $tabs['comments']['callback'] = 'hhs_fbcomments';
  $tabs['brand']['title'] = __('Thương hiệu');
  $tabs['brand']['callback'] = 'hhs_detail_brand';
  $tabs['chinhsach']['title'] = __('Chính sách đổi hàng');
  $tabs['chinhsach']['callback'] = 'hhs_detail_chinhsach';
  $tabs['vanchuyen']['title'] = __('Thông tin vận chuyển');
  $tabs['vanchuyen']['callback'] = 'hhs_detail_vanchuyen';
  $tabs['description']['priority'] = 5;      // Description second
  $tabs['comments']['priority'] = 10;
  $tabs['brand']['priority'] = 15;
  $tabs['chinhsach']['priority'] = 20;
  $tabs['vanchuyen']['priority'] = 25;
  //$tabs['additional_information']['title'] = __( 'Thông tin sản phẩm' );  // Rename the additional information tab
  return $tabs;
}
function hhs_chitietsp()
{
  $chitiet = get_the_content();
  if($chitiet != '')
  {
    echo wpautop($chitiet);;
  }
  else
  {
    echo 'Chi tiết sản phẩm đang được cập nhật';
  }
}
function hhs_fbcomments()
{
  comments_template();
}
function hhs_detail_brand()
{
  global $product;
  $pa_brand = get_the_terms( $product->id, 'pa_brand');
  ?>
  <div class="brand-details">
  <?php if(!empty($pa_brand)) {
    foreach($pa_brand as $pa_brand){
      ?>
      <h3 class="title-brand"><?php echo '<a class="hhs_brand" href="'.get_term_link( $pa_brand->term_id,'pa_brand').'" title="'.$pa_brand->name.'">'.$pa_brand->name.'</a>'; ?></h3>
      <!-- /.title-brand -->
      <hr class="clearfix" />
      <div class="brand-content">
        <?php echo wpautop($pa_brand->description); ?>
      </div>
      <!-- /.brand-content -->
      <?php
    }
  } ?>
  </div>
  <!-- /.brand-details -->
  <?php
}
function hhs_detail_chinhsach()
{
  echo 'Content is updating';
}
function hhs_detail_vanchuyen()
{
  echo 'Content is updating';
}
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
  unset( $enqueue_styles['woocommerce-general'] );  // Remove the gloss
  unset( $enqueue_styles['woocommerce-layout'] );   // Remove the layout
  //unset( $enqueue_styles['woocommerce-smallscreen'] );  // Remove the smallscreen optimisation
  return $enqueue_styles;
}
function product_percent()
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
  echo '<span class="new-text">Mới!</span>';
 }
 echo '<span class="sales-percent">'.round($percent,0).'%</span>';
}
add_action('woocommerce_before_shop_loop_item_title','product_percent');
// Search Theo danh mục
function advanced_search_query($query) {

    if($query->is_search()) {
        if (isset($_GET['product_cat']) && !empty($_GET['product_cat']) && $_GET['product_cat'] != -1) {
            $query->set('tax_query', array(array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array($_GET['product_cat']) )
            ));
        }
        return $query;
    }
}
add_action('pre_get_posts', 'advanced_search_query', 1000);

// remove pa_
add_action('woocommerce_register_taxonomy', 'remove_pa_register_taxonomy');
function remove_pa_register_taxonomy() {
  global $remove_pa_attribute_labels;
  $remove_pa_attributes_labels = array();

  if ( $attribute_taxonomies = wc_get_attribute_taxonomies() ) {
    foreach ( $attribute_taxonomies as $tax ) {
      if ( $name = wc_attribute_taxonomy_name( $tax->attribute_name ) ) {
        $remove_pa_attribute_labels[ $tax->attribute_label ] = $tax->attribute_name;
        add_filter('woocommerce_taxonomy_args_'.$name, 'remove_pa_taxonomy_args');
      }
    }
  }
}

function remove_pa_taxonomy_args($taxonomy_data) {
  global $remove_pa_attribute_labels;

  if (isset($taxonomy_data['rewrite']) && is_array($taxonomy_data['rewrite']) && empty($taxonomy_data['rewrite']['slug'])) {
    $taxonomy_data['rewrite']['slug'] = $remove_pa_attribute_labels[ $taxonomy_data['labels']['name'] ];
  }
  return $taxonomy_data;
}
function load_more_product()
{
    $offset = $_POST["offset"];
    $cat = $_POST['category_id'];
    $per_page = $_POST['per_page'];
    $loop = new WP_Query(
            array(
              'posts_per_page' => $per_page,
              'offset'=>$offset,
              'post_type' => 'product',
              'tax_query'=>array(
                    array(
                        'taxonomy' => 'product_cat',
                          'field'    => 'term_id',
                          'terms'    =>$cat
                      )
                  )
              )
            );
    if($loop->have_posts()):while($loop->have_posts()):$loop->the_post();
    ?>
    <?php wc_get_template_part( 'content', 'ajax-load' ); ?>
<?php
    endwhile;endif;wp_reset_postdata();
    die("");
}
add_action('wp_ajax_nopriv_load_more_product','load_more_product');
add_action('wp_ajax_load_more_product','load_more_product');

// CHECKUOT AJAX FUNCTION
function checkout_popup()
{
  $id_product = $_POST['id_product'];
  $qty = $_POST['qty'];
  $product_info = new WC_Product($id_product);
  ?>
  <div id="top-product" class="top-product-pop">
    <div class="thumb-poptup">
      <?php echo get_the_post_thumbnail( $id_product,array(84,84)); ?>
    </div>
    <!-- /.thumb-poptup -->
    <div class="info-product">
      <h3>Sản phẩm bạn mua</h3>
      <p><?php echo $product_info->post_title;  ?></p>
    </div>
    <!-- /.info-product -->
  </div>
  <!-- /#top-product.top-product-pop -->
  <div id="main-form-pop">
    <p>
      Giá thành : <input type="text" value="<?php echo number_format($product_info->get_price());  ?>" readonly />
    </p>
    <p>
      Số lượng : <input type="number" value="<?php echo $qty; ?>">
    </p>
    <p>
      Bạn được giảm : <input type="text" value="0%" readonly />
    </p>
    <hr />
    <h4>Sản phẩm hay được mua kèm</h4>
    <div class="box-muakem">
      <div class="item-muakem">
        <div class="thumb">

        </div>
      </div>
    </div>
    <!-- /.box-muakem -->
  </div>
  <!-- /#main-form-pop -->
  <?php
  die("");
}
add_action('wp_ajax_nopriv_checkout_popup','checkout_popup');
add_action('wp_ajax_checkout_popup','checkout_popup');

// AJAX SEACH
function ajax_search()
{
  $q = $_POST['q'];
  $cat = $_POST['cat'];
  global $wp_query;
  if($cat != 0)
  {
    $args_query = array(
        'post_type'=>'product',
        'showposts'=>12,
        'tax_query'=>array(
            array(
              'taxonomy' => 'product_cat',
              'field'    => 'slug',
              'terms'    => $cat,
            ),
          ),
        's'=>$q
      );
  }
  else
  {
    $args_query = array(
        'post_type'=>'product',
        'showposts'=>12,
        's'=>$q
      );
  }
  $args_s = array_merge( $wp_query->query_vars,$args_query);
  query_posts( $args_s );
  if(have_posts()):while(have_posts()):the_post();
  ?>
  <div class="item-box-search clearfix">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      <div class="thumb">
        <?php the_post_thumbnail(array(45,45)); ?>
      </div>
      <!-- /.thumb -->
      <div class="info">
        <p><?php the_title(); ?></p>
      </div>
      <!-- /.info -->
    </a>
  </div>
  <!-- /.item-box-search -->
  <?php
  endwhile; wp_reset_query(); else: echo 'Không có sản phẩm nào phù hợp với từ khóa!'; endif;
  die(" ");
}
add_action('wp_ajax_nopriv_ajax_search','ajax_search');
add_action('wp_ajax_ajax_search','ajax_search');

// woocommerce_before_cart
function header_text_cart()
{
  ?>
  <div class="check-out-step clearfix">
          <div class="step-1 active step">
            <i class="fa fa-check"></i>
            <p>Giỏ hàng</p>
          </div>
          <div class="step-2 step">
            <span>2</span>
            <p>Đăng nhập/Đăng ký</p>
          </div>
          <div class="step-3 step">
            <span>3</span>
            <p>Thông tin & Thanh toán</p>
          </div>
          <div class="step-4 step">
            <span>4</span>
            <p>Xác nhận thành công</p>
          </div>
        </div>
        <!-- /.check-out-step -->
  <?php
}
add_action('woocommerce_before_cart','header_text_cart');
/**
 * Add new register fields for WooCommerce registration.
 *
 * @return string Register fields HTML.
 */
function wooc_extra_register_fields() {
  ?>
  <h3 class="other-info">Thông tin khác</h3>
<div class="inline-form clearfix">
  <div class="gender-wrap">
    <label class="title-input">Giới tính :</label>
    <input type="radio" checked name="gender" id="male"><label for="male">Nam</label>
    <input type="radio"   name="gender" id="female"><label for="female">Nữ</label>
  </div>
  <div class="picker-wrap">
    <label class="title-input">Ngày sinh :</label>
    <input type="text" id="date-picker" name="date_of_birth" class="form-control">
    <i class="fa fa-calendar"></i>
  </div>
</div>
 <div class="form-group">
  <label for="display_name">Họ tên</label>
  <input type="text" id="display_name" class="form-control" name="display_name" />
</div>
<div class="inline-form">
  <label for="emailnews">Mục bắt buộc</label>
  <input type="checkbox" name="" id="emailnews">
  <label for="emailnews">Đăng ký nhận bản tin qua email</label>
</div>
  <?php
}
add_action( 'register_form', 'wooc_extra_register_fields' );
function wooc_save_extra_register_fields( $customer_id ) {
  if(!is_wp_error($customer_id))
    {
        add_user_meta( $user_id,'sex',$sex);
        add_user_meta( $user_id,'date_of_birth',$_POST['date_of_birth']);
    }
  if ( isset( $_POST['display_name'] ) ) {
    // WordPress default last name field.
    update_user_meta( $customer_id, 'display_name', sanitize_text_field( $_POST['display_name'] ) );
    //update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
  }
}

add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );

function ajax_add_all_cart()
{
  $id = $_POST['id'];
  $id_arr = explode(',',$id);
  unset($id_arr[0]);
  $cart_ajax = new WC_Cart();
  foreach($id_arr as $id_arr)
  {
    $cart_ajax->add_to_cart($id_arr);
  }
  echo 'Sản phẩm của bạn đã được thêm vào giỏ thành công <a href="'.WC()->cart->get_cart_url().'">Xem giỏ hàng</a>';
  die("");
}
add_action('wp_ajax_nopriv_ajax_add_all_cart','ajax_add_all_cart');
add_action('wp_ajax_ajax_add_all_cart','ajax_add_all_cart');