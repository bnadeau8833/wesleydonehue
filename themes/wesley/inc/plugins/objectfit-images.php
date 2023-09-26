<?php
/**
 * Object Fit Images - Cross browser support for object-fit:cover
 */
function opjectFit_images() {
    wp_register_script( 'object-fit-images', get_template_directory_uri() . '/assets/js/plugins/ofi.min.js', array('jquery'),  true );
}

add_action( 'wp_enqueue_scripts', 'opjectFit_images' );