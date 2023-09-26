<?php
$awesome_post_object = get_post_type_object( get_post_type($post) );

$post_type_name = $awesome_post_object->label;
$related = ci_get_related_posts( get_the_ID(), -1 );

//Hide the section by post type
$hide_related_posts = '';

$hide_related_posts_section = get_field( 'hide_related_posts_section', 'option' );
if ( 'post' === get_post_type() && $hide_related_posts_section ) {
    $hide_related_posts = $hide_related_posts_section;
}

$hide_related_books_section = get_field( 'hide_related_books_section', 'option' );
if ( 'reviews' === get_post_type() && $hide_related_books_section ) {
    $hide_related_posts = $hide_related_books_section;
}

$hide_related_episodes_section = get_field( 'hide_related_episodes_section', 'option' );
if ( 'episodes' === get_post_type() && $hide_related_episodes_section ) {
    $hide_related_posts = $hide_related_episodes_section;
}

if ( $hide_related_posts ) {
    return;
}

//Override the section title by post type
$section_header = 'Related ' . $post_type_name  . '';

$override_related_posts_title = get_field( 'override_related_posts_title', 'option' );
if ( 'post' === get_post_type() && $override_related_posts_title ) {
    $section_header = $override_related_posts_title;
}

$override_related_books_title = get_field( 'override_related_books_title', 'option' );
if ( 'reviews' === get_post_type() && $override_related_books_title ) {
    $section_header = $override_related_books_title;
}

$override_related_episodes_title = get_field( 'override_related_episodes_title', 'option' );
if ( 'episodes' === get_post_type() && $override_related_episodes_title ) {
    $section_header = $override_related_episodes_title;
}

$dots_html = '<div class="awesome-dots position-relative d-inline-flex align-items-center"></div>';
$arrow_prev = '<a class="awesome-arrow slick-arrow-prev"><i class="fa-regular fa-angle-left fa-2xl"></i></a>';
$arrow_next = '<a class="awesome-arrow slick-arrow-next"><i class="fa-regular fa-angle-right fa-2xl"></i></a>';


$absolute = 'position-absolute end-0 top-50 translate-middle-y';

$carousel_controls = '<div class="carousel-controls-wrap">' . $arrow_prev . '' . $dots_html . '' . $arrow_next . '</div>';


$animate_fade_up = ' data-aos="fade-up"';


if ( $related->have_posts() ) :
    echo '<section class="related-posts section-wrap py-6 mt-4 border-top"' . $animate_fade_up . '>';

        echo '<header class="section-header mb-4 text-center position-relative">';
            echo '<h2 class="section-title text-secondary mx-auto">' . $section_header . '</h2>';
        echo '</header>';
            

            echo '<div class="related-posts-wrap">';
                while( $related->have_posts() ): $related->the_post();
                    get_template_part( 'template-parts/card', get_post_type() );
                endwhile;

            echo '</div><!-- .related-posts-wrap -->';
    echo '</section><!-- .related-posts -->';

endif;

wp_reset_postdata();
?>