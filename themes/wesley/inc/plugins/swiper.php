<?php
/**
 * Swiper JS
 */
function swiperJS() {
  //Swiper
	wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css' );
	wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', true );
}

add_action( 'wp_enqueue_scripts', 'swiperJS' );