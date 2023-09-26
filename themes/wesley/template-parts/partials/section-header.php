<?php
if ( have_rows('section_header') ) :
    while ( have_rows('section_header') ) : the_row();

        $header_text_align = get_sub_field('text_align');
        $text_align = ' text-start';

        if ( $header_text_align ) {
            $text_align = ' text-' . $header_text_align . '';
        }

        $title_html = '';
        $sub_title_html = '';
        $blurb_html = '';

        //Title(group field)
        $the_title = get_sub_field('the_title');

        if ( $the_title ) {
            //Title Color(select field)
            $title_color = $the_title['text_color'];
            $color = '';
            if ( $title_color ) {
                $color = ' text-' . $title_color . '';
            }

            //Title Size(select field)
            $title_size = $the_title['size'];
            $size = ' h2';
            if ( $title_size ) {
                $size = ' ' . $title_size . '';
            }

            //Title (text field)
            $title = $the_title['text'];
            if ( $title ) {
                $title_html = '<h1 class="section-title position-relative mb-2' . $size . '' . $color . '">' . $title . '</h1>';
            }
        }

        //Add Blurb(true/false) & Blurb(WYSWIYG)
        $add_blurb = get_sub_field('add_blurb');
        $blurb = get_sub_field('blurb');
        if ( $add_blurb && $blurb ) {
            $blurb_html = '<div class="description lead">' . $blurb . '</div>';
        }


    if ( !empty($title_html) || !empty($blurb_html) ) {
        echo '<header class="section-header mb-3 inner' . $text_align . '">';
            //Sub Title(group field)
            $sub_title = get_sub_field('sub_title');
            if ( $sub_title ) :
                //Sub Title Color(select field)
                $sub_title_color = $sub_title['text_color'];
                $color = ' text-secondary';
                if ( $sub_title_color ) {
                    $color = ' text-' . $sub_title_color . '';
                }

                //Sub Title Size(select field)
                $sub_title_size = $sub_title['size'];
                $size = ' h4';
                if ( $sub_title_size ) {
                    $size = ' ' . $sub_title_size . '';
                }

                //Header Link
                $sub_header_classes = '';
                if ( have_rows('header_link') ) : while ( have_rows('header_link') ) : the_row();
                    //adding flex classes if a link is present
                    $sub_header_classes = ' d-flex align-items-center justify-content-between ';
                endwhile; endif;

                //Sub Title (text field)
                $sub_text = '';
                $text = $sub_title['text'];
                if ( $text ) {
                    $sub_text = '<h2 class="sub-title h3 mb-0' . $color . '' . $size . '">' . $text . '</h2>';
                }

                echo '<div class="sub-header-wrap mb-2' . $sub_header_classes . '">';
                    echo $sub_text;
                    
                    if ( have_rows('header_link') ) : while ( have_rows('header_link') ) : the_row();
                        get_template_part('template-parts/partials/header', 'link');
                    endwhile; endif;
                echo '</div><!-- .sub-header-wrap -->';
            endif;

            // echo $sub_title_html;

            echo $title_html;

            if ( !empty($blurb_html) ) {
                echo $blurb_html;
            }
        echo '</header>';
    }
    endwhile;
endif;