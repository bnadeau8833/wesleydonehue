<?php
//Section classes
$section_classes    = get_sub_field('featured_feed_classes_section_classes');
$classes            = $section_classes['classes'];
$make_class_id      = $section_classes['make_class_id'];

$extra_classes = '';
if ( $classes && !$make_class_id) {
    $extra_classes = ' ' . $classes . '';
}

$section_id = '';
if ( $classes && $make_class_id ) {
    $section_id     = ' id="' . $classes . '"';
    $extra_classes  = '';
}

$animate_fade_right = ' data-aos="fade-right"';
$animate_fade_left = ' data-aos="fade-left"';

echo '<section' . $section_id . ' class="featured-feed flex-section position-relative overflow-hidden bg-secondary ' . $extra_classes . '">';
    //Section Start
    if ( have_rows('featured_feed_settings') ) : while ( have_rows('featured_feed_settings') ) : the_row();
        get_template_part('flex/section', 'start');
    endwhile; endif;

        //Header
        if ( have_rows('featured_feed_header') ) : while ( have_rows('featured_feed_header') ) : the_row(); 
            get_template_part('template-parts/partials/section', 'header');
        endwhile;  endif;

        $featured_feed_repeater = get_sub_field('featured_feed_repeater');

        if ( have_rows('featured_feed_repeater') ) :

            while ( have_rows('featured_feed_repeater') ) : the_row();

                $the_post_type = get_sub_field('post_type');

                $post_type = 'post';
                if ( $the_post_type ) {
                    $post_type = $the_post_type;
                }

                $posts = get_posts(array(
                    'numberposts' => 1,
                    'post_type' => $post_type
                ));

                $size = 'card-image';
                if ( 'reviews' === $the_post_type ) {
                    $size = 'medium';
                }

                if ( $posts ) :
                    foreach ( $posts as $post ) :

                        //Post Type Items
                        $awesome_post_object    = get_post_type_object( get_post_type($post) );
                        $awesome_post_link      = get_post_type_archive_link( $post_type );
                        $post_type_slug         = $awesome_post_object->name;
                        $post_type_name         = $awesome_post_object->label;

                        //Post Items
                        $title          = get_the_title();
                        $permalink      = get_the_permalink();
                        $external_link  = get_field('external_link');
                        $target         = '';

                        if ( $external_link ) {
                            $link   = $external_link;
                            $target = ' target="_blank"';
                        } else {
                            $link   = $permalink;
                        }

                        $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), $size );
                        $publication = '';
                        if ( 'press' === $the_post_type ) {
                            $default_featured   = wp_get_attachment_image_src(get_field('default_press_image', 'option'), 'medium');
                            $publication        = get_field( 'press_publication' );
                            $press_image        = wp_get_attachment_image_src(get_field('publication_logo', $publication), 'logo-image');
                            $publication_name   = $publication->name;

                            if ( !$featured_image && $press_image ) {
                                $featured_image = $press_image;
                            }
                        }

                        $post_link_text = 'Full Story';
                        if ( 'reviews' === $the_post_type ) {
                            $post_link_text     = 'Full Review';
                            $default_featured   = wp_get_attachment_image_src(get_field('default_book_review_image', 'option'), 'medium');
                        }

                        if ( 'episodes' === $the_post_type ) {
                            $post_link_text     = 'Full Review';
                            $default_featured   = wp_get_attachment_image_src(get_field('default_podcast_image', 'option'), 'medium');
                        }

                        if ( 'post' === $post_type ) {
                            $post_type_name     = 'Blog';
                            $default_featured   = wp_get_attachment_image_src(get_field('default_post_image', 'option'), 'medium');
                        }

                        $image = '';
                        if ( $featured_image ) {
                            $image = $featured_image;
                        } elseif ( $default_featured && !$featured_image ) {
                            $image = $default_featured;
                        }

                        echo '<div class="row g-0 position-relative">';
                            echo '<div class="col-md-6 bg-secondary bg-full full-left">';
                                echo '<div class="post-text inner px-3 px-md-0 py-7 pe-md-8 border-bottom border-primary h-100 d-flex flex-column justify-content-center"' . $animate_fade_right . '>';

                                    $view_all_text = 'View all';
                                    $view_all_permalink = $awesome_post_link;

                                    $override_view_all = get_sub_field('override_view_all_link');
                                    $view_all_link = get_sub_field('view_all_link');
                                    
                                    if ( $override_view_all && $view_all_link ) {
                                        $override_text = $view_all_link['override_link_text'];

                                        if ( $override_text ) {
                                            $view_all_text = $override_text;
                                        }

                                        $override_link = $view_all_link['override_link'];

                                        if ( $override_link ) {
                                            $view_all_permalink = $override_link;
                                        }
                                    }

                                    echo '<header class="post-header d-flex align-items-center justify-content-between mb-4">';
                                        echo '<h1 class="h5 text-uppercase mb-0">' . $post_type_name . '</h1>';
                                        echo '<a href="' . $view_all_permalink . '" class="view-all small" rel="bookmark">' . $view_all_text . '</a>';
                                    echo '</header>';

                                    echo '<h2 class="post-title h3 text-white">';
                                        if ( 'post' === $post_type ) {
                                            echo '<span class="text-primary d-block smaller">';
                                                get_template_part('template-parts/partials/short', 'title');
                                            echo '</span>';
                                        }

                                        if ( 'reviews' === $post_type ) {
                                            echo '<span class="text-primary d-block smaller">';
                                                get_template_part('template-parts/partials/star', 'rating');
                                            echo '</span>';
                                        }
                            
                                        if ( 'episodes' === $post_type ) {
                                            echo '<span class="text-primary d-block smaller">';
                                                get_template_part('template-parts/partials/episode');
                                            echo '</span>';
                                        }

                                        echo '<a href="' . $link . '"' . $target . ' class="full-story" rel="bookmark">' . $title . '</a>';
                                    echo '</h2>';

                                    if ( 'episodes' === $the_post_type ) {
                                        if ( have_rows('platforms') ) :
                                            while ( have_rows('platforms') ): the_row(); 
                                                $spotify_link   = get_sub_field('spotify_link');
                                                $apple_link     = get_sub_field('apple_link');

                                                $spotify = '';
                                                if ( $spotify_link ) {
                                                    $spotify = '<a href="' . $spotify_link . '" class="podcast-link spotify btn btn-lg btn-outline-light font-body me-2 small" rel="bookmark" target="_blank"><i class="fa-brands fa-spotify"></i> Listen on Spotify</a>';
                                                }

                                                $apple = '';
                                                if ( $apple_link ) {
                                                    $apple = '<a href="' . $apple_link . '" class="podcast-link apple btn btn-lg btn-outline-light font-body me-2 small" rel="bookmark" target="_blank"><i class="fa-brands fa-spotify"></i> Listen on Apple</a>';
                                                }

                                                echo '<div class="d-grid d-sm-block d-md-grid d-lg-block gap-2">';
                                                    echo $spotify;
                                                    echo $apple;
                                                echo '</div>';

                                        endwhile;
                                    endif;

                                    } else {
                                        echo '<a href="' . $link . '"' . $target . ' class="full-story link-gray-darker text-uppercase font-header" rel="bookmark">' . $post_link_text . '</a>';
                                    }
                                echo ' </div><!-- .post-text -->';
                            echo '</div><!-- .col-md -->';

                            if ( !empty( $image ) ) :

                                $image_bg_start = '';
                                $image_bg_end = '';
                                $img_white = '';
                                if ( 'press' === $the_post_type ) {
                                    $image_bg_start = '<div style="min-height: 225px;" class="img-wrap bg-black text-center d-inline-flex justify-content-center align-items-center mb-2 px-4">';
                                    $image_bg_end = '</div>';
                                    
                                }

                                if ( 'press' === $the_post_type && $featured_image ) {
                                    $img_white = ' img-white';
                                }

                                echo ' <div class="col-md-6 bg-beige bg-full full-right text-center order-first order-md-last">';
                                    echo '<div class="img-wrap inner border-bottom border-primary h-100 p-4 px-md-5 py-md-7 border-bottom border-primary d-flex flex-column justify-content-center"' . $animate_fade_left . '>';
                                        echo '<a href="' . $link . '"' . $target . ' class="full-story" rel="bookmark">';
                                            echo $image_bg_start;
                                            echo '<img style="max-height: 250px;" src="' . $image[0] . '" class="img-fluid' . $img_white . '" alt="' . $title . '" />';
                                            echo $image_bg_end;
                                        echo '</a>';
                                    echo '</div>';
                                echo ' </div><!-- .col-md -->';
                            endif;
                        echo ' </div><!-- .row -->';

                    endforeach;
                endif;

                wp_reset_postdata();

            endwhile;
        endif;

        
        //Buttons
        if ( have_rows('featured_feed_buttons') ) : while ( have_rows('featured_feed_buttons') ) : the_row(); 
            get_template_part('template-parts/partials/buttons');
        endwhile; endif;

    echo '</div><!-- .col-md --></div><!-- .row --></div><!-- .container -->';
echo '</section>';
?>
