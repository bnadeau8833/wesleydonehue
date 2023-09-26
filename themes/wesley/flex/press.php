<?php
//Section classes
$section_classes = get_sub_field('press_classes_section_classes');
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

$animate_press = ' data-aos="fade-up"';

echo '<section' . $section_id . ' class="press flex-section position-relative' . $extra_classes . '"' . $animate_press . '>';
    //Section Start
    if ( have_rows('press_settings') ) : while ( have_rows('press_settings') ) : the_row();
        get_template_part('flex/section', 'start');
    endwhile; endif;

       //Header
       if ( have_rows('press_header') ) : while ( have_rows('press_header') ) : the_row(); 
            get_template_part('template-parts/partials/section', 'header');
        endwhile;  endif;

        $columns = get_sub_field('press_columns');
        $cols = '4';
        if ( $columns ) {
            $cols = $columns;
        }

        $white_images = get_sub_field('press_white_images');
        $img_white = '';
        $text_white = '';
        if ( $white_images ) {
            $img_white = ' img-white';
            $text_white = ' text-white';
        }

        $taxonomy = 'publication';
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'hide_empty' => true,
        ]);

        echo '<div class="press-logos xlogos-carousel mb-0 py-3">';
            echo '<div class="swiper-wrapper d-flex align-items-center">';

                foreach ($terms as $term) :
                    echo '<div class="press-wrap text-center swiper-slide flex-center">';

                        //Link
                        $permalink = get_the_permalink();
                        $name = $term->name;

                        //Logo
                        $size = 'logo-image';
                        $logo = wp_get_attachment_image_src(get_field('publication_logo', $term), $size);
                        // $logo = get_field('publication_logo', $term);

                        echo '<a href="' . esc_url( get_term_link( $term ) ) . '">';
                            
                            if ( $logo ) {
                                echo wp_get_attachment_image( $logo, $size );
                                echo '<img src="' . $logo[0] . '" class="img-fluid mx-auto' . $img_white . '" alt="' . $name . '" />';
                            } else {
                                echo '<span class="press-name' . $text_white . '">' . $name . '</span>';
                            }
                        echo '</a>';
                    echo '</div>';
                endforeach;
            echo '</div><!-- .swiper-wrapper -->';

            echo '<div class="swiper-pagination"></div>';

        echo '</div><!-- .press-logos -->';
        
        //Buttons
        if ( have_rows('press_buttons') ) : while ( have_rows('press_buttons') ) : the_row(); 
            get_template_part('template-parts/partials/buttons');
        endwhile; endif;

    echo '</div><!-- .col-md --></div><!-- .row --></div><!-- .container -->';
echo '</section>';
?>

<script>
var swiper = new Swiper(".press-logos", {
    // slidesPerView: "auto",
    slidesPerView: 2,
    centeredSlides: true,
    loop: true,
    spaceBetween: 25,
    autoplay: {
        delay: 2500,
        disableOnInteraction: true,
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },

    breakpoints: {
          576: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 5,
            spaceBetween: 45,
          },
        },
});
</script>
