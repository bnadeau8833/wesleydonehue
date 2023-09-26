<?php
$container = '-lg';
$the_post_type = get_field('post_type');
$post_type = 'post';
if ( $the_post_type ) {
    $post_type = $the_post_type;
}

$btn_style = ' btn-primary';

$text_white = '';
if ( 'episodes' === $the_post_type ) {
    $text_white = ' text-white';
    // $btn_style = ' btn-primary';
}

$featured = get_posts(array(
    'numberposts' => 1,
    'post_type' => $post_type
));


$animate_featured_image = ' data-aos="flip-left" data-aos-duration="1500" data-aos-delay="200"';
$animate_featured_text = ' data-aos="zoom-in"';

if ( $featured && !empty($the_post_type) ) :

    echo '<div class="featured-post pt-5 pb-4 position-relative inner featured-' . $post_type . '">';

        echo '<div class="container' . $container . ' overflow-hidden">';
            foreach ( $featured as $post ) :
                $id = get_the_id();
                $title = get_the_title();
                $permalink = get_the_permalink();
                // $excerpt = get_the_excerpt();
                $word_count = '25';
                $excerpt = excerpt('' . $word_count . '');

                $size = 'card-image';

                if ( 'reviews' === get_post_type() ) {
                    $size = 'medium';
                }

                $featured_image = get_the_post_thumbnail_url(get_the_ID(), $size);
                $default_featured = '';

                if ( 'post' === $the_post_type ) {
                    $default_featured = wp_get_attachment_image_src(get_field('default_post_image', 'option'), $size);
                }

                $img_border = '';
                if ( 'episodes' === $the_post_type ) {
                    $default_featured = wp_get_attachment_image_src(get_field('default_podcast_image', 'option'), $size);
                    $img_border = ' border border-3 border-gray-darker';
                }

                $image = '';
                if ( $default_featured && !$featured_image ) {
                    $image = $default_featured[0];
                }

                if ( $featured_image ) {
                    $image = $featured_image;
                }
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('card bg-transparent h-100 xsmall'); ?>>

                    <?php
                    echo '<div class="row gx-6 px-3 px-md-0">';
                    
                        echo '<div class="col-md py-3">';
                            echo '<header class="entry-header' . $text_white . '"' . $animate_featured_text . '>';
                                if ( 'reviews' === get_post_type() ) {
                                    get_template_part('template-parts/partials/star', 'rating');

                                    get_template_part('template-parts/partials/book', 'number');
                                }

                                $button_text = 'Read More';

                                if ( 'episodes' === $the_post_type ) {
                                    get_template_part('template-parts/partials/episode');

                                    $button_text = 'Listen';
                                }

                                if ( 'post' === $the_post_type ) {
                                    get_template_part('template-parts/partials/short', 'title');
                                }

                                echo '<h1 class="entry-title h2"><a class="title-link" href="' . $permalink . '" rel="bookmark">' .$title . '</a></h1>';

                                echo '<div class="excerpt small">' . $excerpt . '</div>';

                                echo '<a href="' .$permalink . '" class="btn btn-lg' . $btn_style . ' mt-3" rel="bookmark">' . $button_text . '</a>';
                            echo ' </header>';
                        echo '</div><!-- .col-md -->';

                        if ( !empty( $image ) ) {
                            echo '<div class="col-md image-col text-md-center order-first order-md-last">';
                                echo '<div class="card-image-wrap d-inline-block position-relative border border-3 border-gray-darker"' . $animate_featured_image . '>';
                                    get_template_part('template-parts/card', 'image');
                                    get_template_part('template-parts/partials/podcast', 'listen');
                                echo '</div>';
                            echo '</div><!-- .col-md -->';
                        }

                    echo '</div><!-- .row -->';
                    ?>

                </article><!-- #post-<?php the_ID(); ?> -->

                <?php
            endforeach;

            wp_reset_postdata();

        echo '</div><!-- .container -->';
    echo '</div>';
endif;
?>
