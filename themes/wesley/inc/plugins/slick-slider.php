<?php
/**
 * Slick Slider
 *
 * Uncomment if you want slick theme css
 */
function slick_slider() {
	wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
	wp_enqueue_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css' );
	wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/assets/js/slick-min.js', array ( 'jquery' ), 1.1, true );
}

add_action('wp_enqueue_scripts', 'slick_slider');