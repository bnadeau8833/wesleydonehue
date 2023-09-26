<?php
//Section classes
$section_classes = get_sub_field('gallery_classes_section_classes');
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

$content_blocks = get_sub_field('gallery_blocks');

$animate_gallery = ' data-aos="fade-up"';

echo '<section' . $section_id . ' class="image-gallery flex-section position-relative' . $extra_classes . '">';
  //Section Start
  if ( have_rows('gallery_settings') ) : while ( have_rows('gallery_settings') ) : the_row();
      get_template_part('flex/section', 'start');
  endwhile; endif;

    //Header
    if ( have_rows('gallery_header') ) : while ( have_rows('gallery_header') ) : the_row();
      get_template_part('template-parts/partials/section', 'header');
    endwhile;  endif;

    //number field
    $columns = '2';
    $gallery_columns = get_sub_field('gallery_columns');

    if ( $gallery_columns ) {
      $columns = $gallery_columns;
    }

    //group field
    $gallery_carousel = get_sub_field('gallery_carousel');

    $row_classes = 'row align-items-center';

    if ( have_rows('gallery_carousel') ) :
      while ( have_rows('gallery_carousel') ) : the_row(); 
          $activate_carousel = get_sub_field('activate_carousel');
          $hide_dots = get_sub_field('hide_dots');
          $hide_arrows = get_sub_field('hide_arrows');
          $centered_mode = get_sub_field('centered_mode');

          $dots = ' show';
          if ( $hide_dots ) {
            $dots = 'hide';
          }

          $arrows = ' show';
          if ( $hide_arrows ) {
            $arrows = 'hide';
          }

          $centered = '';
          if ( $centered_mode ) {
            $centered = ' centered-mode';
          }
          
          $row_classes = ' awesome-slider post-' . $columns . ' ' . $dots . '-dots ' . $arrows . '-arrows' . $centered . '';

      endwhile;
    endif;

    //gallery ids field
    $gallery_images = get_sub_field('gallery_images');

    $size = 'large'; // (thumbnail, medium, large, full or custom size)
      
      if ( $gallery_images ) :
        echo '<div class="' . $row_classes . '"' . $animate_gallery . '>';
          foreach ( $gallery_images as $image_id ) :
            //Image URL acf field
            $image_url = get_field('image_url', $image_id);
            $link_start = '';
            $link_end = '';

            if ( $image_url ) {
              $link_start = '<a href="' . $image_url . '" class="image-link" target="_blank">';
              $link_end = '</a>';
            }

            // $image = wp_get_attachment_image( $image_id, $size );

            echo '<div class="col-sm text-center py-2">';
              echo $link_start;
                // echo '<img src="' . $image . '" class="mx-auto img-fluid" alt="Title" />';
                echo wp_get_attachment_image( $image_id, $size );
              echo $link_end;
            echo '</div>';
          endforeach;
        echo '</div><!-- .row -->';

        $arrow_prev = '<a class="awesome-arrow slick-arrow-prev"><i class="fa-regular fa-angle-left fs-2"></i></a>';
        $arrow_next = '<a class="awesome-arrow slick-arrow-next"><i class="fa-regular fa-angle-right fs-2"></i></a>';
        $dots_html = '<div class="awesome-dots d-flex pb-1"></div>';

        echo '<div class="carousel-controls-wrap d-flex align-items-center justify-content-center">';
            // echo $arrow_prev;
                echo $dots_html;
            // echo $arrow_next;
        echo '</div>';
      endif;

      

      //Buttons
      if ( have_rows('gallery_buttons') ) : while ( have_rows('gallery_buttons') ) : the_row(); 
        get_template_part('template-parts/partials/buttons');
      endwhile; endif;

    echo '</div><!-- .col-md --></div><!-- .row --></div><!-- .container -->';
echo '</section>';
?>
