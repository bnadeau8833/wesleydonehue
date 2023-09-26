<?php
/**
 * AOS Animation
 */
function aos_animate() {
	wp_enqueue_style( 'aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css' );
	wp_enqueue_script( 'aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', true );
}

add_action('wp_enqueue_scripts', 'aos_animate');