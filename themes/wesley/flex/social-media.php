<?php
//Section classes
$section_classes = get_sub_field('social_media_classes_section_classes');
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

$animate = ' data-aos="fade-up"';

echo '<section' . $section_id . ' class="social-media flex-section position-relative' . $extra_classes . '"' . $animate . '>';
    //Section Start
    if ( have_rows('social_media_settings') ) : while ( have_rows('social_media_settings') ) : the_row();
        get_template_part('flex/section', 'start');
    endwhile; endif;

        //Header
        if ( have_rows('social_media_header') ) : while ( have_rows('social_media_header') ) : the_row(); 
            get_template_part('template-parts/partials/section', 'header');
        endwhile;  endif;

        if ( has_nav_menu( 'menu-social' ) ) :
            echo '<div class="menu-wrap pt-4">';
                get_template_part('template-parts/menus/menu', 'social');
            echo '</div>';
        endif;


        //Buttons
        if ( have_rows('social_media_buttons') ) : while ( have_rows('social_media_buttons') ) : the_row(); 
            get_template_part('template-parts/partials/buttons');
        endwhile; endif;

    echo '</div><!-- .col-md --></div><!-- .row --></div><!-- .container -->';
echo '</section>';
?>
