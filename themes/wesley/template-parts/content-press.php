<?php
/**
 * Template part for displaying posts in cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wesley_Donehue
 */

$title      = get_the_title();
$permalink  = get_field('external_link');

//Images
$size = 'logo-image';
$featured_image = get_the_post_thumbnail_url(get_the_ID(), $size);

if ( is_single() ) {
    echo '<div class="container-lg">';
}
$animate_fade_up = ' data-aos="fade-up"';
?>

<article<?php echo $animate_fade_up; ?> id="post-<?php the_ID(); ?>" <?php post_class('h-100 position-relative'); ?>>
    <?php
    $image = '';
    $default_press_image = wp_get_attachment_image_src(get_field('default_press_image', 'option'), 'logo-image');
    
    $publication = get_field('press_publication');

    if( $publication ) {
        $logo = wp_get_attachment_image_src(get_field('publication_logo', $publication), 'logo-image');
        $publication_name = $publication->name;

        $img_white = ' img-white';
        if ( $logo && !$featured_image ) {
            $image = $logo[0];
        } elseif ( $featured_image && !empty($logo) ) {
            $image = $featured_image;
        } elseif ( $default_press_image ) {
            $image = $default_press_image[0];
            $img_white = '';
        }
    }

    if ( $featured_image ) {
        $image = $featured_image;
    } elseif ( $publication && !empty($logo) && !$featured_image ) {
        $image = $logo[0];
    }

    if ( !empty($image) ) {
        echo '<div style="min-height: 225px;" class="img-wrap bg-black text-center d-flex justify-content-center align-items-center mb-2 px-4"><img src="' . $image . '" class="img-fluid mx-auto' . $img_white . '" alt="' . $title . '" /></div>';
    }

    echo '<div class="d-flex flex-column">';
        echo '<header class="entry-header">';
            if ( $publication ) {
                echo '<p class="publication mb-1 h6">' . $publication_name . '</p>';
            }
            echo '<h2 class="entry-title card-title text-uppercase h5 mb-0"><a class="link-secondary stretched-link" target="_blank" href="' . $permalink . '" rel="bookmark">' . $title . '</a></h2>';
        echo '</header><!-- .entry-header -->';

        echo '<div class="entry-meta pt-1 small">';
            wesley_posted_on();
        echo '</div><!-- .entry-meta -->';

    echo '</div><!-- .card-body -->';
    ?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
if ( is_single() ) {
    echo '</div>';
}
?>
