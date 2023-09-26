<?php
//get the home page id
$home_id = get_option( 'page_for_posts' );
// get the current taxonomy term
$term = get_queried_object();
$cpt = get_post_type_object(get_post_type());

$the_title = get_the_title();
$description = '';

$hide_banner = get_field('hide_banner');

if ( $hide_banner ) {
    return;
}

//Featured Image
$size = 'large';
$featured_image = get_the_post_thumbnail_url(get_the_ID(), $size);

//index template
if ( is_home() || is_front_page() ) {
    $the_title = single_post_title( '', false );
    $image = '';
    $featured_image = '';
}

//archives
if ( is_archive() ) {
    $the_title = get_the_archive_title( '', false );
    $description = '<div class="description lead">' . get_the_archive_description( '', false ) . '</div>';
    $image = '';
    $featured_image = '';
}

if ( $featured_image ) {
    $image = $featured_image;
}

$box_start = '';
$box_end = '';
$img_white = '';
$img_align = ' text-center';

if ( is_search() ) {

}

$page_type = 'entry-';
if ( is_page() ) {
    $page_type = 'page-';
}

//Title override
$title = $the_title;
$override_page_title = get_field('override_page_title');
if ( $override_page_title ) {
    $title = $override_page_title;
}

//Sub title/Blurb
$sub_title = get_field('sub_title');
$add_blurb = get_field('add_blurb');
$blurb = get_field('blurb');

$text_white = '';

if ( $add_blurb && $blurb ) {
    $description = '<div class="description lead' . $text_white . '">' . $blurb . '</div>';
}

$flip_image_text = get_field('flip_image_text');
$order_first = ' order-first order-lg-last';
if ( $flip_image_text ) {
    $order_first = ' order-first';
}

$the_post_type = get_field('post_type');
$post_type = 'post';
if ( $the_post_type ) {
    $post_type = $the_post_type;
}

$page_title_white = '';
$video_overlay = '';
if ( 'episodes' === $the_post_type ) {
    $video_overlay = ' overlay-secondary';
    $page_title_white = ' text-white';
}

$animate_image = ' data-aos="flip-left"';
$animate_text = ' data-aos="fade-up"';


echo '<section class="page-banner py-5 inner position-relative' . $video_overlay . '">';
    echo '<div class="container-lg">';
        echo '<div class="row">';
            echo '<div class="col-lg text-col text-center text-lg-start py-4 py-lg-0"' . $animate_text . '>';
                echo '<header class="' . $page_type . 'header banner inner">';
                    echo '<h1 class="entry-title text-uppercase mb-2' . $page_title_white . '">' . $title . '</h1>';

                    if ( $sub_title ) {
                        echo '<h2 class="sub-title text-secondary">' . $sub_title . '</h2>';
                    }

                    echo $description;
                echo '</header><!-- .entry-header -->';

                //Buttons
                if ( have_rows('banner_buttons') ) : while ( have_rows('banner_buttons') ) : the_row(); 
                    get_template_part('template-parts/partials/buttons');
                endwhile; endif;
            echo '</div><!-- .col-lg .text-col -->';

            if ( $featured_image ) {
                echo '<div class="col-lg image-col' . $order_first . '' . $img_align . '"' . $animate_image . '>';
                    echo $box_start;
                        echo '<img src="' . $image . '" class="img-fluid' . $img_white . '" alt="' . $title . '" />';
                    echo $box_end;
                echo '</div><!-- .col-md .image-col -->';
            }
        echo '</div><!-- .row -->';
        
        //Flexible Content Modules Above page content
        if ( is_page_template( 'page-templates/content-template.php' ) ) {
            get_template_part('template-parts/loops/flexible', 'content');
        }
    echo '</div>';

    get_template_part('template-parts/partials/featured', 'post');

    if ( 'episodes' === $the_post_type ) {
        get_template_part('template-parts/partials/podcast', 'video');
    }
echo '</section>';
?>