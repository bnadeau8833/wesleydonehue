<?php
/**
 * Flexible Content Labels
 */
add_filter('acf/fields/flexible_content/layout_title/name=flexible_content_sections', 'my_acf_fields_flexible_content_layout_title', 10, 4);

function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {

	// Remove layout name from title.
	$title = '';
	$label = '';

	//General Content
	if ( have_rows('general_content_section_label') ) : while ( have_rows('general_content_section_label') ) : the_row();
		$section_label = get_sub_field('section_label');
		if ( $section_label ) {
			$label = ' - ' . $section_label . '';
		}

		$title .= '<i class="fa-solid fa-pen-to-square"></i> <b>General Content</b><span class="flex-note">' . esc_html($label) . '</span>';
	endwhile; endif;

	//Post Feed
	if ( have_rows('post_feed_section_label') ) : while ( have_rows('post_feed_section_label') ) : the_row();
		$section_label = get_sub_field('section_label');
		if ( $section_label ) {
			$label = ' - ' . $section_label . '';
		}

		$title .= '<i class="fa-solid fa-signs-post"></i> <b>Post Feed</b><span class="flex-note">' . esc_html($label) . '</span>';
	endwhile; endif;

	//Press
	if ( have_rows('press_section_label') ) : while ( have_rows('press_section_label') ) : the_row();
		$section_label = get_sub_field('section_label');
		if ( $section_label ) {
			$label = ' - ' . $section_label . '';
		}

		$title .= '<i class="fa-solid fa-newspaper"></i> <b>Press</b><span class="flex-note">' . esc_html($label) . '</span>';
	endwhile; endif;

	//Social Media
	if ( have_rows('social_media_section_label') ) : while ( have_rows('social_media_section_label') ) : the_row();
		$section_label = get_sub_field('section_label');
		if ( $section_label ) {
			$label = ' - ' . $section_label . '';
		}

		$title .= '<i class="fa-solid fa-hashtag"></i> <b>Social Media</b><span class="flex-note">' . esc_html($label) . '</span>';
	endwhile; endif;

	//Podcast
	if ( have_rows('podcast_section_label') ) : while ( have_rows('podcast_section_label') ) : the_row();
		$section_label = get_sub_field('section_label');
		if ( $section_label ) {
			$label = ' - ' . $section_label . '';
		}

		$title .= '<i class="fa-solid fa-podcast"></i> <b>Podcast</b><span class="flex-note">' . esc_html($label) . '</span>';
	endwhile; endif;

	//Featured Feed
	if ( have_rows('featured_feed_section_label') ) : while ( have_rows('featured_feed_section_label') ) : the_row();
		$section_label = get_sub_field('section_label');
		if ( $section_label ) {
			$label = ' - ' . $section_label . '';
		}

		$title .= '<i class="fa-solid fa-address-card"></i> <b>Featured Feed</b><span class="flex-note">' . esc_html($label) . '</span>';
	endwhile; endif;

	//Text/Media
	if ( have_rows('text_media_section_label') ) : while ( have_rows('text_media_section_label') ) : the_row();
		$section_label = get_sub_field('section_label');
		if ( $section_label ) {
			$label = ' - ' . $section_label . '';
		}

		$title .= '<i class="fa-solid fa-photo-film"></i><i class="fa-solid fa-align-left"></i> <b>Text/Media</b><span class="flex-note">' . esc_html($label) . '</span>';
	endwhile; endif;

	//Gallery
	if ( have_rows('gallery_section_label') ) : while ( have_rows('gallery_section_label') ) : the_row();
		$section_label = get_sub_field('section_label');
		if ( $section_label ) {
			$label = ' - ' . $section_label . '';
		}

		$title .= '<i class="fa-solid fa-images"></i> <b>Image Gallery</b><span class="flex-note">' . esc_html($label) . '</span>';
	endwhile; endif;

	return $title;
}

/**
 * Enqueue Font Awesome and bootstrap icons
 */
function wordpress_dashboard_styles() {
	wp_enqueue_script( 'font-awesome-6', 'https://kit.fontawesome.com/ef5186c81a.js' );
	wp_enqueue_style( 'open-iconic-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css', '1.8.2' );
}

add_action('admin_init', 'wordpress_dashboard_styles');


/**
 * Paste As Text by default in the editor
 */
add_filter('tiny_mce_before_init', 'ag_tinymce_paste_as_text');

function ag_tinymce_paste_as_text( $init ) {
	$init['paste_as_text'] = true;
	return $init;
}

/**
 * Move Yoast to the bottom of posts/pages
 */
function yoasttobottom() {
 return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

/**
 * Hide Labels with class hide-label (used for groups that are repetitive to keep backend readability)
 */
add_action('admin_head', 'hide_nav_label_class');

function hide_nav_label_class() {
	echo '<style>
		.acf-field.hide-label > .acf-label {
			display: none;
		}

		.acf-field.hide-field {
			display: none;
		}
		
		.postbox-header i.fab.fa-fort-awesome {
			margin-right: auto;
			margin-left: 4px;
		}
		
		.acf-image-select label input {
			display: none;
		}

		.acf-image-select label p {
			margin: 0;
			font-weight: bold;
			text-align: center;
		}

		.acf-image-select label img {
`			border: solid 5px #ddd;
		}

		.acf-image-select label.selected img {
			border: solid 6px #444;
		}

		.acf-image-select li {
			display: inline-block;
			list-style: none;
			max-width: 25%;
		}

		.postbox-header .hndle {
			justify-content: flex-start;
		}

		.postbox-header .hndle i {
			margin-right: 0.25rem;
		}

		.embed-container { 
			position: relative; 
			padding-bottom: 56.25%;
			overflow: hidden;
			max-width: 100%;
			height: auto;
		} 
	
		.embed-container iframe,
		.embed-container object,
		.embed-container embed { 
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		}

		.acf-fc-layout-handle.ui-sortable-handle i {
			color: #EA4E3D;
		}

		.acf-fc-layout-handle.ui-sortable-handle .flex-note {
			color: #999;
			font-size: 90%;
		}

		.acf-tab-button i  {
			color: #000000;
		}

		.active .acf-tab-button i  {
			color: #EA4E3D;
		}


	</style>';
}

/**
 * Adding icons to menu items
 */
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
	// loop
	foreach ( $items as &$item ) {
		// vars
		$add_icon		= get_field('add_icon', $item);
		$icon			= get_field('icon', $item);

		$icon_size		= get_field('icon_size', $item);
		$size			= '2';
		if ( $add_icon && $icon_size ) {
			$size =  $icon_size;
		}

		$icon_color		= get_field('icon_color', $item);
		$color = '';
		if ( $add_icon && $icon_color ) {
			$color = ' style="color: ' . $icon_color . ';"';
		}

		$hide_label		= get_field('hide_label', $item);
		$icon_classes	= '';

		if ( $add_icon ) {
			$item->classes[] = 'menu-item-has-icon';
		}

		$icon_classes = $icon;

		// append icon
		if ( $icon && $add_icon ) {
			if ( $hide_label ) {
				$item->title = '<span class="fa-stack fa-' . $size . 'x"><i class="fa-solid fa-circle fa-stack-2x text-white"></i><i class="' . $icon_classes . '" title="' . $item->title . '"' . $color . '></i></span>';
			}
			else {
				$item->title = '<div class="d-flex flex-column align-items-center text-center"><span class="fa-stack fa-' . $size . 'x"><i class="fa-solid fa-circle fa-stack-2x text-white"></i><i class="'.$icon_classes.' fa-stack-1x"' . $color . '></i></span> <span class="item-title text-gray-darker small">'.$item->title . '</span></div>';
			}
		}
	}
	
	// return
	return $items;
}

/**
 * Add quick-collapse feature to ACF Flexible Content fields
 */
add_action('acf/input/admin_head', function() {
	?>
	<script type="text/javascript">
		(function($) {
			$(document).ready(function() {
				var collapseButtonClass = 'collapse-all';

				// Add a clickable link to the label line of flexible content fields
				$('.acf-field-flexible-content > .acf-label')
					.append('<a class="' + collapseButtonClass + '" style="position: absolute; top: 0; right: 0; cursor: pointer;">Collapse All</a>');

				// Simulate a click on each flexible content item's "collapse" button when clicking the new link
				$('.' + collapseButtonClass).on('click', function() {
					$('.acf-flexible-content .layout:not(.-collapsed) .acf-fc-layout-controls .-collapse').click();
				});
			});
		})(jQuery);
	</script>
	<?php
});

//Remove prefix from page titles
function awesome_archive_title_remove_prefix( $title ) {
	$title_pieces = explode( ': ', $title );
	if( count( $title_pieces ) > 1 ) {
		unset( $title_pieces[0] );
		$title = join( ': ', $title_pieces );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'awesome_archive_title_remove_prefix' );


/**
 * Remove Post Format Taxonomy from site
 */
function wpsnipp_remove_default_taxonomies() {
    global $pagenow;

    register_taxonomy( 'post_format', array() );
    $tax = array('post_format',);

    if ( $pagenow == 'edit-tags.php' && in_array($_GET['taxonomy'],$tax) ){
    	wp_die('Invalid taxonomy');
    }
}

add_action('init', 'wpsnipp_remove_default_taxonomies');


/**
 * Excerpt Custom Length & Page Support
 */
function excerpt( $limit ) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

	return $excerpt;
}

add_post_type_support( 'page', 'excerpt' );

/**
 * Populate ACF Fields named post_type with Post Types
 */
function acf_load_post_types_post_feed( $field ) {

	// reset choices
	$field['choices'] = array();

	// Get post types
	$args = array(
		'public'   => true
	);

	$post_types = get_post_types( $args, 'objects' );

	foreach ( $post_types  as $post_type ) {
		$value = $post_type->name;
		$the_label = $post_type->label;
		$the_icon = $post_type->menu_icon;

		$icon = '';
		if ( $the_icon ) {
			$icon = '<i class="dashicons ' . $the_icon . '"></i>';
		}

		$label = '' . $icon . ' ' . $the_label . '';

		if ( $post_type->name !== 'attachment' ) {
			// append to choices
			$field['choices'][ $value ] = $label;
		}
	}

	// return the field
	return $field;
}

add_filter('acf/load_field/name=post_type', 'acf_load_post_types_post_feed');

/**
 * Populate ACF Fields named categories with Categories
 */
add_filter( 'acf/load_field/name=categories', function( $field ) {
	// Get all taxonomy terms
	$post_categories = get_terms( array(
		'taxonomy' => 'category',
		'hide_empty' => false
	) );

	// Add each term to the choices array.
	// Example: $field['choices']['review'] = Review
	foreach ( $post_categories as $post_cat ) {
		$field['choices'][$post_cat->slug] = $post_cat->name;
	}

	return $field;
} );


/**
 * Related Post Query
 */
function ci_get_related_posts( $post_id, $related_count, $args = array() ) {
	$args = wp_parse_args( (array) $args, array(
		'orderby' => 'rand',
		'return'  => 'query', // Valid values are: 'query' (WP_Query object), 'array' (the arguments array)
	) );

	$related_args = array(
		'post_type'      => get_post_type( $post_id ),
		'posts_per_page' => 3,
		'post_status'    => 'publish',
		'post__not_in'   => array( $post_id ),
		'orderby'        => $args['orderby'],
		'ignore_sticky_posts' => 1,
		'tax_query'      => array()
	);

	$post       = get_post( $post_id );
	$taxonomies = get_object_taxonomies( $post, 'names' );

	foreach ( $taxonomies as $taxonomy ) {
		$terms = get_the_terms( $post_id, $taxonomy );
		if ( empty( $terms ) ) {
			continue;
		}
		$term_list                   = wp_list_pluck( $terms, 'slug' );
		$related_args['tax_query'][] = array(
			'taxonomy' => $taxonomy,
			'field'    => 'slug',
			'terms'    => $term_list
		);
	}

	if ( count( $related_args['tax_query'] ) > 1 ) {
		$related_args['tax_query']['relation'] = 'OR';
	}

	if ( $args['return'] == 'query' ) {
		return new WP_Query( $related_args );
	} else {
		return $related_args;
	}
}