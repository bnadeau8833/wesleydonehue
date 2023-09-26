<?php
//Section classes
$section_classes = get_sub_field('post_feed_classes_section_classes');
$classes = $section_classes['classes'];
$make_class_id = $section_classes['make_class_id'];

$extra_classes = '';
if ( $classes && !$make_class_id) {
    $extra_classes = ' ' . $classes . '';
}

$section_id = '';
if ( $classes && $make_class_id ) {
    $section_id = ' id="' . $classes . '"';
    $extra_classes = '';
}

$animate = ' data-aos="zoom-in"';

echo '<section' . $section_id . ' class="post-feed flex-section position-relative' . $extra_classes . '">';
    //Section Start
    if ( have_rows('post_feed_settings') ) : while ( have_rows('post_feed_settings') ) : the_row();
        get_template_part('flex/section', 'start');
    endwhile; endif;

        //Header
        if ( have_rows('post_feed_header') ) : while ( have_rows('post_feed_header') ) : the_row(); 
            get_template_part('template-parts/partials/section', 'header');
        endwhile;  endif;

        // Post Feed Repeater
        if ( have_rows('post_feeds') ) :
            echo '<div class="row gx-9 justify-content-between">';
                while ( have_rows('post_feeds') ) : the_row();
                    $post_type = get_sub_field('post_type');
                    
                    $enable_carousel = get_sub_field('post_feed_enable_carousel');
                    $number_posts = '-1';
                    $order = 'DESC';
                    $order_by = 'date';

                    if ( have_rows('post_feed_options') ) : while ( have_rows('post_feed_options') ) : the_row();
                        $order_by       = get_sub_field('order_by');
                        $order_title    = get_sub_field('order_title');
                        $order_date     = get_sub_field('order_date');
                        $posts_per_page = get_sub_field('posts_per_page');

                        if ( $posts_per_page ) {
                            $number_posts = $posts_per_page;
                        }
                    endwhile; endif;

                    $posts = get_posts(array(
                        'numberposts'    => $number_posts,
                        'post_type'      => $post_type,
                        'orderby'        => $order_by,
                        'order'          => $order,
                    ));

                    //Post Type Items
                    $awesome_post_object = get_post_type_object( $post_type );
                    $awesome_post_link = get_post_type_archive_link( $post_type );
                    $post_type_slug = $awesome_post_object->name;
                    $post_type_name = $awesome_post_object->label;

                    if ( 'post' === $post_type ) {
                        $post_type_name = 'Blog';
                    }

                    $feed_columns = get_sub_field('post_feed_columns');
                    $columns = ' row-cols-1';
                    
                    if ( $feed_columns ) {
                        $columns = ' row-cols-1 row-cols-sm-' . $feed_columns . '';
                    }

                    echo '<div class="col-md-6 col-lg-5 py-md-4"' . $animate . '>';
                        if ( $posts ) :
                            echo '<div class="feed-header d-flex align-items-center justify-content-between mb-2 text-white"><span class="h3 text-white">' . $post_type_name . '</span> <a href="' . $awesome_post_link . '" class="view-all" rel="bookmark">View all</a></div>';

                            echo '<div class="row' . $columns . ' g-5 mobile-carousel">';
                                foreach ( $posts as $post ) :
                                    $content = 'card';
                                    echo '<div class="col text-white text-center text-sm-start">';
                                        get_template_part( 'template-parts/' . $content . '', get_post_type() );
                                    echo '</div>';
                                endforeach;
                            echo '</div><!-- .row -->';
                        
                        endif;
                    echo '</div><!-- .col-->';

                    wp_reset_postdata();
                
                endwhile;
            echo '</div><!-- .row -->';
        endif;

        //Buttons
        if ( have_rows('post_feed_buttons') ) : while ( have_rows('post_feed_buttons') ) : the_row(); 
            get_template_part('template-parts/partials/buttons');
        endwhile; endif;

    echo '</div><!-- .col-md --></div><!-- .row --></div><!-- .container -->';
echo '</section>';
?>
