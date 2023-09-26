<?php
/**
* Template Name: Content
*/

get_header();

$container = '-lg';

$the_post_type = get_field('post_type');
$post_type = 'post';
if ( $the_post_type ) {
    $post_type = $the_post_type;
}


$animate_carousel = ' data-aos="zoom-in-up"';
// $animate_carousel = '';
?>

<main id="primary" class="site-main page-for-<?php echo $post_type; ?>">
    <?php
    echo '<div class="bg-video-wrap position-relative overflow-hidden">';
        while ( have_posts() ) :
            the_post();
            
            if ( get_the_content() ) :
                echo '<div class="container' . $container . ' inner">';

                    get_template_part( 'template-parts/content', 'page' );

                echo '</div>';
            endif;

        endwhile; // End of the loop.
    echo '</div><!-- .bg-video-wrap .position-relative-->';


    $dots_html = '<div class="awesome-dots position-relative d-inline-flex align-items-center"></div>';
    $arrow_prev = '<a class="awesome-arrow slick-arrow-prev"><i class="fa-regular fa-angle-left fa-2xl"></i></a>';
    $arrow_next = '<a class="awesome-arrow slick-arrow-next"><i class="fa-regular fa-angle-right fa-2xl"></i></a>';

    $posts = get_posts(array(
        'numberposts' => 7,
        'post_type' => $post_type,
        'offset'    => 1
    ));
        
    if ( $posts ) {
        echo '<div class="content-slider-wrap bg-secondary inner">';
            echo '<div class="container-lg px-xxl-5">';
                if ( 'episodes' === $post_type ) {
                    $image = get_field('podcast_logo', 'options');
                    $size = 'logo-image';

                    if( $image ) {
                        echo '<div class="logo-wrap text-center py-3">';
                            echo wp_get_attachment_image( $image, $size );
                        echo '</div>';
                    }
                }

                echo '<div class="awesome-slider centered-mode show-dots show-arrows text-center"' . $animate_carousel . '>';
                    foreach ($posts as $post) {
                        $content = 'card';
                        get_template_part( 'template-parts/' . $content . '', get_post_type() );
                    }
                echo '</div>';

                echo '<div class="carousel-controls-wrap col-md-6 mx-auto d-flex align-items-center justify-content-center mb-4">';
                    echo $arrow_prev;
                        echo $dots_html;
                    echo $arrow_next;
                echo '</div>';

                get_template_part( 'template-parts/partials/back', 'button' );
                
            echo '</div><!-- .container -->';
        echo '</div><!-- .content-slider -->';
    }
    wp_reset_postdata();

    $id = get_the_id();
    $show_footer_modules = get_field('show_footer_modules', $id);
    if ( $show_footer_modules ) {
        get_template_part('template-parts/loops/flex', 'footer');
    }

    ?>
</main> <!-- #main -->

<?php
get_footer();