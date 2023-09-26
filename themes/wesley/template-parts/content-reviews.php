<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wesley_Donehue
 */

$post_id = get_the_id();
$title      = get_the_title();

$size = 'medium';
$featured_image = get_the_post_thumbnail_url(get_the_ID(), $size);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white'); ?>>
	<?php
    echo '<div class="banner-wrap position-relative">';
        echo '<div class="container-lg">';
                echo '<header class="entry-header text-center py-4 py-sm-5 py-md-6">';
                    if ( is_singular() ) :
                        the_title( '<h1 class="entry-title h1 mb-0 text-secondary">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title h1 mb-0 text-secondary"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;

                    get_template_part('template-parts/partials/book', 'author');

                echo '</header><!-- .entry-header -->';
        echo '</div><!-- .container -->';
    echo '</div><!-- .banner-wrap -->';

    echo '<div class="bg-beige">';
        if ( !empty($featured_image) ) {
            echo '<div class="text-center bg-beige-partial">';
                echo '<img src="' . $featured_image . '" class="img-fluid mx-auto" alt="' . $title . '" />';
            echo '</div>';

            get_template_part('template-parts/partials/book', 'links');
        }

        echo '<div class="container-lg text-centerx">';
            echo '<div class="text-center">';
                $icon_image = wp_get_attachment_image_src(get_field('book_review_icon_image', 'option'), 'medium');
                if ( $icon_image ) {
                    echo '<img class="img-fluid img-icon my-4" src="' . $icon_image[0] . '" alt="" />';
                }

                $review_title = get_field('review_title', 'option');
                if ( $review_title ) {
                    echo '<h2 class="review-title text-secondary h3">' . $review_title . '</h2>';
                }
            echo '</div><!-- .text-center -->';

            echo '<div class="entry-content">';
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wesley' ),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post( get_the_title() )
                    )
                );

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wesley' ),
                        'after'  => '</div>',
                    )
                );
            echo '</div><!-- .entry-content -->';

            echo '<div class="text-center">';
                //Stars Rating
                get_template_part('template-parts/partials/star', 'rating');

                //Recommendation
                get_template_part('template-parts/partials/recommendation');
            echo '</div>';
        echo '</div><!-- .container -->';
    echo '</div><!-- .beige-bg -->';
    ?>
</article><!-- #post-<?php the_ID(); ?> -->
