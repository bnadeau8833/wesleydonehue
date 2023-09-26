<?php
function cptui_register_my_cpts() {
	
}

add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Publications.
	 */

	$labels = [
		"name" => __( "Publications", "wesley" ),
		"singular_name" => __( "Publication", "wesley" ),
	];

	
	$args = [
		"label" => __( "Publications", "wesley" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'publication', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => true,
		"rest_base" => "publication",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "publication", [ "press" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
