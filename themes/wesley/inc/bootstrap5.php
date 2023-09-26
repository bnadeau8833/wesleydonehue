<?php
/**
 * Bootstrap 5.1.3 with navwalker
 * 
 * Uncomment the css if you aren't using SASS
 */
/**/
function wp_bootstrap_5_scripts() {
	wp_enqueue_style( 'open-iconic-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css', '1.8.3' );
	// wp_enqueue_style( 'bootstrap-5-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css', '5.2.0' );

	wp_enqueue_script( 'popper','https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js', '2.11.5', true );
	wp_enqueue_script( 'bootstrap-5-js-bundle','https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', '5.2.0', array( 'jquery' ),'',true );
	wp_enqueue_script( 'masonry', 'https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js', '4.2.2' );
}

add_action( 'wp_enqueue_scripts', 'wp_bootstrap_5_scripts' );

// Register Custom Bootstrap Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
	// file exists... require it.
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
?>