<?php


function cpt_promos() {

	$labels = array(
		'name'                  => _x( 'promos', 'promos General Name', 'apuestanweb-lang' ),
		'singular_name'         => _x( 'promos', 'promos Singular Name', 'apuestanweb-lang' ),
		'menu_name'             => __( 'promos', 'apuestanweb-lang' ),
		'name_admin_bar'        => __( 'promos', 'apuestanweb-lang' ),
		'archives'              => __( 'Item Archives', 'apuestanweb-lang' ),
		'attributes'            => __( 'Item Attributes', 'apuestanweb-lang' ),
		'parent_item_colon'     => __( 'Parent Item:', 'apuestanweb-lang' ),
		'all_items'             => __( 'All Items', 'apuestanweb-lang' ),
		'add_new_item'          => __( 'Add New Item', 'apuestanweb-lang' ),
		'add_new'               => __( 'Add New', 'apuestanweb-lang' ),
		'new_item'              => __( 'New Item', 'apuestanweb-lang' ),
		'edit_item'             => __( 'Edit Item', 'apuestanweb-lang' ),
		'update_item'           => __( 'Update Item', 'apuestanweb-lang' ),
		'view_item'             => __( 'View Item', 'apuestanweb-lang' ),
		'view_items'            => __( 'View Items', 'apuestanweb-lang' ),
		'search_items'          => __( 'Search Item', 'apuestanweb-lang' ),
		'not_found'             => __( 'Not found', 'apuestanweb-lang' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'apuestanweb-lang' ),
		'featured_image'        => __( 'Featured Image', 'apuestanweb-lang' ),
		'set_featured_image'    => __( 'Set featured image', 'apuestanweb-lang' ),
		'remove_featured_image' => __( 'Remove featured image', 'apuestanweb-lang' ),
		'use_featured_image'    => __( 'Use as featured image', 'apuestanweb-lang' ),
		'insert_into_item'      => __( 'Insert into item', 'apuestanweb-lang' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'apuestanweb-lang' ),
		'items_list'            => __( 'Items list', 'apuestanweb-lang' ),
		'items_list_navigation' => __( 'Items list navigation', 'apuestanweb-lang' ),
		'filter_items_list'     => __( 'Filter items list', 'apuestanweb-lang' ),
	);
	$args = array(
		'label'                 => __( 'promos', 'apuestanweb-lang' ),
		'description'           => __( 'promos Description', 'apuestanweb-lang' ),
		'labels'                => $labels,
		'supports'              => array('title', 'thumbnail'),
		'taxonomies'            => [],
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => false,
		'show_in_menu'          => false,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
	);
	register_post_type( 'promos', $args );

}
add_action( 'init', 'cpt_promos');
//segunda view de promo
function cpt_banners() {

	$labels = array(
		'name'                  => _x( 'banners', 'banners General Name', 'apuestanweb-lang' ),
		'singular_name'         => _x( 'banners', 'banners Singular Name', 'apuestanweb-lang' ),
		'menu_name'             => __( 'banners', 'apuestanweb-lang' ),
		'name_admin_bar'        => __( 'banners', 'apuestanweb-lang' ),
		'archives'              => __( 'Item Archives', 'apuestanweb-lang' ),
		'attributes'            => __( 'Item Attributes', 'apuestanweb-lang' ),
		'parent_item_colon'     => __( 'Parent Item:', 'apuestanweb-lang' ),
		'all_items'             => __( 'All Items', 'apuestanweb-lang' ),
		'add_new_item'          => __( 'Add New Item', 'apuestanweb-lang' ),
		'add_new'               => __( 'Add New', 'apuestanweb-lang' ),
		'new_item'              => __( 'New Item', 'apuestanweb-lang' ),
		'edit_item'             => __( 'Edit Item', 'apuestanweb-lang' ),
		'update_item'           => __( 'Update Item', 'apuestanweb-lang' ),
		'view_item'             => __( 'View Item', 'apuestanweb-lang' ),
		'view_items'            => __( 'View Items', 'apuestanweb-lang' ),
		'search_items'          => __( 'Search Item', 'apuestanweb-lang' ),
		'not_found'             => __( 'Not found', 'apuestanweb-lang' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'apuestanweb-lang' ),
		'featured_image'        => __( 'Featured Image', 'apuestanweb-lang' ),
		'set_featured_image'    => __( 'Set featured image', 'apuestanweb-lang' ),
		'remove_featured_image' => __( 'Remove featured image', 'apuestanweb-lang' ),
		'use_featured_image'    => __( 'Use as featured image', 'apuestanweb-lang' ),
		'insert_into_item'      => __( 'Insert into item', 'apuestanweb-lang' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'apuestanweb-lang' ),
		'items_list'            => __( 'Items list', 'apuestanweb-lang' ),
		'items_list_navigation' => __( 'Items list navigation', 'apuestanweb-lang' ),
		'filter_items_list'     => __( 'Filter items list', 'apuestanweb-lang' ),
	);
	$args = array(
		'label'                 => __( 'banners', 'apuestanweb-lang' ),
		'description'           => __( 'banners Description', 'apuestanweb-lang' ),
		'labels'                => $labels,
		'supports'              => array('title', 'thumbnail','excerpt'),
		'taxonomies'            => [],
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => false,
		'show_in_menu'          => false,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
	);
	register_post_type( 'banners', $args );

}
add_action( 'init', 'cpt_banners');