<?php

global $etheme_theme_data;

$etheme_theme_data = wp_get_theme( get_stylesheet_directory() . '/style.css' );

define('ETHEME_DOMAIN', 'blanco');

define('ETHEME_OPTIONS', 'site_basic_options');
include 'core/mota.php';
require_once( get_template_directory() . '/code/init.php' );
 

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {

     unset($fields['billing']['billing_postcode']);

     unset($fields['billing']['billing_state']);

     unset($fields['billing']['billing_address_2']);

     return $fields;

}
function responsive_style()
{
  wp_enqueue_style('responsive-custom',get_template_directory_uri().'/css/responsive.css',array(),false);
  wp_enqueue_style('sticnav-style',get_template_directory_uri().'/sticknav/slicknav.css',array(),false);
  wp_enqueue_script('sticknav-js',get_template_directory_uri().'/sticknav/jquery.slicknav.js',array(),true);
  wp_enqueue_script('wordpresscanvas-isotope');
  
}
add_action('wp_enqueue_scripts','responsive_style');
register_nav_menu('top-page','Menu hiển thị trên cùng của trang' );
function thuoctinh($name) {
         global $post;
               $attribute_name = 'pa_'.$name;//array( 'pa_nhan-hieu', 'pa_kich-co' ,  ); // Insert attribute names here
               //foreach ( $attribute_names as $attribute_name ) {
                    $taxonomy = get_taxonomy( $attribute_name );
                    if ( $taxonomy && ! is_wp_error( $taxonomy ) ) {
                         $terms = wp_get_post_terms( $post->ID, $attribute_name );
                         $terms_array = array();
                       
                         if ( ! empty( $terms ) ) {
                              foreach ( $terms as $term ) {
                                   $archive_link = get_term_link( $term->slug, $attribute_name );
                                   if($attribute_name == "pa_brand"){
                                        if(is_single()){
                                             $full_line = '<a href="' . $archive_link . '">'. $term->name . '</a>';
                                        }   
                                        else
                                        {
                                             $full_line = '<a href="' . $archive_link . '">'. $term->name . '</a>';

                                        }
                                  
                                   }
                                   else {
                                        $full_line = '<a href="' . $archive_link . '">'. $term->name . '</a>';
                                   }
                                   array_push( $terms_array, $full_line );
                              }
                       
                              return implode( $terms_array, ', ' );
                         }
                    }
          //}
     }
if(!function_exists('mota')){
  function mota(){
    echo "Đang cập nhật";
  } 
}



/* Get name menu */
function get_name_menu( $theme_location ) {
  if( ! $theme_location ) return false;
 
  $menu_obj = ag_get_theme_menu( $theme_location );
  if( ! $menu_obj ) return false;
 
  if( ! isset( $menu_obj->name ) ) return false;
 
  return $menu_obj->name;
}
function ag_get_theme_menu( $theme_location ) {
  if( ! $theme_location ) return false;
 
  $theme_locations = get_nav_menu_locations();
  if( ! isset( $theme_locations[$theme_location] ) ) return false;
 
  $menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
  if( ! $menu_obj ) $menu_obj = false;
 
  return $menu_obj;
}


remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'pre_link_description', 'wp_filter_kses' );
remove_filter( 'pre_link_notes', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );
add_filter( 'the_content', 'wpautop' );
remove_filter( 'pre_term_description', 'wpautop' );
remove_filter( 'pre_link_description', 'wpautop' );
remove_filter( 'pre_link_notes', 'wpautop' );
remove_filter( 'term_description', 'wpautop' );
if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
add_filter( 'woocommerce_enqueue_styles', '__return_false' );
} else {
define( 'WOOCOMMERCE_USE_CSS', false );
}



// auto delete transient cache
add_action( 'wp_scheduled_delete', 'azio_delete_expired_db_transients' );

function azio_delete_expired_db_transients() {

    global $wpdb, $_wp_using_ext_object_cache;

    if( $_wp_using_ext_object_cache )
        return;

    $time = isset ( $_SERVER['REQUEST_TIME'] ) ? (int)$_SERVER['REQUEST_TIME'] : time() ;
    $expired = $wpdb->get_col( "SELECT option_name FROM {$wpdb->options} WHERE (option_name LIKE '_transient_timeout%' OR option_name LIKE '_transient_wc%') AND option_value < {$time};" );

    foreach( $expired as $transient ) {

        $key = str_replace('_transient_timeout_', '', $transient);
        delete_transient($key);
    }
}

function post_type_tags_fix($request) {
    if ( isset($request['tag']) && !isset($request['post_type']) )
    $request['post_type'] = 'any';
    return $request;
}
add_filter('request', 'post_type_tags_fix');
add_action( 'init', 'my_deregister_heartbeat', 1 );
function my_deregister_heartbeat() {
    global $pagenow;

    if ( 'post.php' != $pagenow && 'post-new.php' != $pagenow )
        wp_deregister_script('heartbeat');
}
