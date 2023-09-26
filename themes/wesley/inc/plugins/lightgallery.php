<?php
/**
 * LightGallery
 */
function lightGallery() {
    wp_enqueue_style( 'lightGalleryCSS', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/css/lightgallery-bundle.min.css');
    wp_enqueue_script( 'lightGalleryScripts', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/lightgallery.min.js');

    wp_enqueue_script( 'lightGalleryThumbnail', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0-beta.4/plugins/thumbnail/lg-thumbnail.min.js');

    wp_enqueue_style( 'lightGalleryThumbnailCSS', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/css/lg-thumbnail.min.css');

    wp_enqueue_script( 'lightGalleryZoom', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0-beta.4/plugins/zoom/lg-zoom.min.js');
    wp_enqueue_style( 'lightGalleryZoomCSS', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0/css/lg-zoom.min.css');
    
    wp_enqueue_script( 'lightGalleryVideo', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0-beta.4/plugins/video/lg-video.min.js');
    wp_enqueue_script( 'lightGalleryShare', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0-beta.4/plugins/share/lg-share.min.js');
    wp_enqueue_script( 'lightGalleryHash', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.3.0-beta.4/plugins/hash/lg-hash.min.js');
    wp_enqueue_script( 'lightgallery-scripts', get_stylesheet_directory_uri() . '/assets/js/lightgallery-scripts.js', array ( 'jquery' ), 1.1, true);
}

add_action( 'wp_enqueue_scripts', 'lightGallery' );