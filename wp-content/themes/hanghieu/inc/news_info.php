<?php
/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function new_info_post_type() {

	$labels = array(
		'name'                => __( 'News', 'hanghieu' ),
		'singular_name'       => __( 'News', 'hanghieu' ),
		'add_new'             => _x( 'Add New', 'hanghieu', 'hanghieu' ),
		'add_new_item'        => __( 'Add New', 'hanghieu' ),
		'edit_item'           => __( 'Edit News', 'hanghieu' ),
		'new_item'            => __( 'New News', 'hanghieu' ),
		'view_item'           => __( 'View News', 'hanghieu' ),
		'search_items'        => __( 'Search News', 'hanghieu' ),
		'not_found'           => __( 'No News found', 'hanghieu' ),
		'not_found_in_trash'  => __( 'No News found in Trash', 'hanghieu' ),
		'parent_item_colon'   => __( 'Parent News:', 'hanghieu' ),
		'menu_name'           => __( 'News', 'hanghieu' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array('post_tag','category_info'),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor', 'author', 'thumbnail',
			'excerpt','custom-fields', 'trackbacks', 'comments',
			'revisions', 'page-attributes', 'post-formats'
			)
	);

	register_post_type( 'news_info', $args );
}
add_action( 'init', 'new_info_post_type' );
/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function category_info() {

	$labels = array(
		'name'					=> _x( 'Category', 'Taxonomy Category', 'hanghieu' ),
		'singular_name'			=> _x( 'Category', 'Taxonomy Category', 'hanghieu' ),
		'search_items'			=> __( 'Search Category', 'hanghieu' ),
		'popular_items'			=> __( 'Popular Category', 'hanghieu' ),
		'all_items'				=> __( 'All Category', 'hanghieu' ),
		'parent_item'			=> __( 'Parent Category', 'hanghieu' ),
		'parent_item_colon'		=> __( 'Parent Category', 'hanghieu' ),
		'edit_item'				=> __( 'Edit Category', 'hanghieu' ),
		'update_item'			=> __( 'Update Category', 'hanghieu' ),
		'add_new_item'			=> __( 'Add New Category', 'hanghieu' ),
		'new_item_name'			=> __( 'New Category Name', 'hanghieu' ),
		'add_or_remove_items'	=> __( 'Add or remove Category', 'hanghieu' ),
		'choose_from_most_used'	=> __( 'Choose from most used hanghieu', 'hanghieu' ),
		'menu_name'				=> __( 'Category', 'hanghieu' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => true,
		'hierarchical'      => false,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'category_info', array( 'news_info' ), $args );
}

add_action( 'init', 'category_info' );
