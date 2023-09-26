<?php
//Section classes
$section_classes = get_sub_field('text_media_classes_section_classes');
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

$animate_media_image = ' data-aos="flip-left" data-aos-duration="1500" data-aos-delay="200"';
$animate_media_text = ' data-aos="zoom-in"';

echo '<section' . $section_id . ' class="text-media flex-section position-relative' . $extra_classes . '">';
    //Section Start
    if ( have_rows('text_media_settings') ) : while ( have_rows('text_media_settings') ) : the_row();
        get_template_part('flex/section', 'start');
    endwhile; endif;

        echo '<div class="row g-0">';

            $media_type = get_sub_field('text_media_media_type');
            $images = get_sub_field('text_media_images');
            $video = get_sub_field('text_media_video');
            $image_shadow = get_sub_field('text_media_image_shadow');
            
            $shadow = '';
            $shadow_size = '';
            if ( $image_shadow === 'sm' || $image_shadow === 'lg' ) {
                $shadow_size = '-' . $image_shadow . '';
            }

            if ( $image_shadow ) {
                $shadow = ' shadow' . $shadow_size . '';
            }

            $image_padding = '';
            if ( 'sm' === $image_shadow ) {
                $image_padding = ' p-3';
            }

            if ( 'normal' === $image_shadow ) {
                $image_padding = ' p-5';
            }

            if ( 'lg' === $image_shadow ) {
                $image_padding = ' p-7';
            }

            $position_mobile = get_sub_field('text_media_position_mobile');
            $mobile = '';
            if ( 'bottom' === $position_mobile ) {
                $mobile = ' order-last';
            }

            $position_desktop = get_sub_field('text_media_position_desktop');
            $desktop = ' order-md-last';
            if ( 'left' === $position_desktop ) {
                $desktop = ' order-md-first';
            }

            $media_columns = get_sub_field('text_media_media_columns');

            $media_cols = '6';

            $text_cols = '6';

            if ( $media_columns ) {
                $media_cols = $media_columns;
                $text_cols = 12 - $media_columns;
            }

            if ( $images || $video && !empty($media_type)) {
                echo '<div' . $animate_media_image . ' class="image-col py-3 py-md-0 col-md-' . $media_cols . ' text-center' . $mobile . '' . $desktop . '">';
            }

            if ( $images ) :
                $count = count( $images );

                $carousel_classes = '';
                if ( $count > 1 ) {
                    $carousel_classes = ' awesome-autoplay post-1 hide-dots hide-arrows';
                }

                echo '<div class="image-wrap' . $carousel_classes . '' . $image_padding . '">';
                    foreach( $images as $image ) :
                        // echo '<img style="max-height: 75vh;" src="' . esc_url($image['sizes']['large']) . '" class="img-fluid text-media-image" alt="' . esc_attr($image['alt']) . '" />';
                        echo '<img src="' . esc_url($image['sizes']['large']) . '" class="img-fluid text-media-image' . $shadow . '" alt="' . esc_attr($image['alt']) . '" />';
                    endforeach;
                echo '</div>';
            endif;

            if ( $images || $video && !empty($media_type)) {
                echo '</div>';
            }

            $text_media_text_position = get_sub_field('text_media_text_position');

            $align = '';
            $justify = '';
            $move_text = '';

            if ( have_rows('text_media_text_position') ) : while ( have_rows('text_media_text_position') ) : the_row();
                $horizontal = get_sub_field('horizontal');
                $vertical = get_sub_field('vertical');

                if ( $vertical ) {
                    $align = ' justify-content-' . $vertical . '';
                }

                if ( $horizontal ) {
                    $justify = ' align-items-' . $horizontal . '';
                }

                if ( $horizontal || $vertical ) {
                    $move_text = ' d-flex flex-column' . $align . '' . $justify . '';
                }

            endwhile;  endif;

            echo '<div' . $animate_media_text . ' class="text-col col-md-' . $text_cols . '' . $move_text . '">';
                echo '<div class="text-col-inner p-5 p-md-4 py-lg-6 px-lg-7 px-xl-10">';

                // echo '<div class="text-col-inner px-2 py-3 p-sm-3 p-md-4 p-xl-5">';

                    //Header
                    if ( have_rows('text_media_header') ) : while ( have_rows('text_media_header') ) : the_row();
                        get_template_part('template-parts/partials/section', 'header');
                    endwhile;  endif;

                    //Buttons
                    if ( have_rows('text_media_buttons') ) : while ( have_rows('text_media_buttons') ) : the_row(); 
                        get_template_part('template-parts/partials/buttons');
                    endwhile; endif;

                echo '</div><!-- .text-col-inner -->';
            echo '</div><!-- .text-col .col -->';
        echo '</div><!-- .row -->';

    echo '</div><!-- .col-md --></div><!-- .row --></div><!-- .container -->';
echo '</section>';
?>
