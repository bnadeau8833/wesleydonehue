<?php
//Section classes
$section_classes = get_sub_field('podcast_classes_section_classes');
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

$animate_media = ' data-aos="fade-left"';
$animate_podcast = ' data-aos="fade-right"';

echo '<section' . $section_id . ' class="podcast flex-section position-relative' . $extra_classes . '">';
    //Section Start
    if ( have_rows('podcast_settings') ) : while ( have_rows('podcast_settings') ) : the_row();
        get_template_part('flex/section', 'start');
    endwhile; endif;

        $size = 'logo-image';
        $podcast_logo = wp_get_attachment_image_src(get_field('podcast_logo', 'option'), $size);

        echo '<div class="row g-0">';

            echo '<div class="col-md-6"' . $animate_podcast . '>';
                echo '<div class="text-inner p-4 p-md-5 p-lg-7">';
                    //Header
                    if ( have_rows('podcast_header') ) : while ( have_rows('podcast_header') ) : the_row(); 
                        get_template_part('template-parts/partials/section', 'header');
                    endwhile;  endif;

                    get_template_part('template-parts/loops/latest', 'episodes');

                echo '</div>';
            echo '</div><!-- .col -->';

            echo '<div class="col-md-6 bg-secondary position-relative order-first order-md-last"' . $animate_media . '>';
                echo '<div class="media-inner text-center h-100 py-8 py-md-10 d-flex align-items-center justify-content-center">';
                    //Podcast Background Video from Options page
                    get_template_part('template-parts/partials/podcast', 'video');

                    if ( $podcast_logo ) {
                        echo '<img src="' . $podcast_logo[0] . '" class="img-fluid img-white" alt="Under Fire Podcast" />';
                    }
                echo '</div><!-- .media-inner -->';
            echo '</div><!-- .col -->';

        echo '</div><!-- .row -->';
        
        //Buttons
        if ( have_rows('podcast_buttons') ) : while ( have_rows('podcast_buttons') ) : the_row(); 
            get_template_part('template-parts/partials/buttons');
        endwhile; endif;

    echo '</div><!-- .col-md --></div><!-- .row --></div><!-- .container -->';
echo '</section>';
?>
