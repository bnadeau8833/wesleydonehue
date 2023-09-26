<?php
//Section classes
$section_classes = get_sub_field('general_content_classes_section_classes');
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

$content_blocks = get_sub_field('general_content_blocks');

$animate_general = ' data-aos="fade-up"';

echo '<section' . $section_id . ' class="general-content flex-section position-relative' . $extra_classes . '"' . $animate_general . '>';
    //Section Start
    if ( have_rows('general_content_settings') ) : while ( have_rows('general_content_settings') ) : the_row();
        get_template_part('flex/section', 'start');
    endwhile; endif;

        //Header
        if ( have_rows('general_content_header') ) : while ( have_rows('general_content_header') ) : the_row(); 
            get_template_part('template-parts/partials/section', 'header');
        endwhile;  endif;

        if ( have_rows('general_content_blocks') ) :
            echo '<div class="row align-items-center">';
                while ( have_rows('general_content_blocks') ): the_row(); 
                    $content_block = get_sub_field('content_block');

                    echo '<div class="col-md">';
                        echo '<div class="content-wrap">';
                            echo $content_block;
                        echo '</div><!-- .content-wrap -->';
                    echo '</div><!-- .col-md -->';
                endwhile;
            echo '</div><!-- .row -->';
        endif;

        //Buttons
        if ( have_rows('general_content_buttons') ) : while ( have_rows('general_content_buttons') ) : the_row(); 
            get_template_part('template-parts/partials/buttons');
        endwhile; endif;

    echo '</div><!-- .col-md --></div><!-- .row --></div><!-- .container -->';
echo '</section>';
?>
