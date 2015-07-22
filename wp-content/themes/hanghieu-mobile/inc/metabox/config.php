<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'hanghieu_meabox' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function hanghieu_meabox( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_hanghieu';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$meta_boxes['hanghieu_metabox_page'] = array(
		'id'         => 'hanghieu_fbt',
		'title'      => __( 'Frequently Bought Together Setting', 'hanghieu' ),
		'pages'      => array( 'product'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
			array(
				'name'       => __( 'Giá giảm khi chọn hết sản phẩm bán kèm', 'hanghieu' ),
				'desc'       => __( 'Vui lòng nhập số phần trăm giảm', 'hanghieu' ),
				'id'         => $prefix . 'percent_fbt',
				'type'       => 'text'
			),
			array(
				'name'       => __( 'ID các sản phẩm bán kèm', 'hanghieu' ),
				'desc'       => __( 'Nhập sản phẩm ngăn cách nhau bằng dấu phẩy', 'hanghieu' ),
				'id'         => $prefix . 'list_fbt',
				'type'       => 'text'
			),
		),
	);
	return $meta_boxes;
}

add_action( 'init', 'hanghieu_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function hanghieu_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
