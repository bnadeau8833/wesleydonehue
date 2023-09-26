<?php
//group field
$flex_buttons = get_sub_field('flex_buttons');

if ( have_rows('flex_buttons') ) :

    while ( have_rows('flex_buttons') ) : the_row();

        //Button Options (group field)
        if ( have_rows('button_options') ) :

            while ( have_rows('button_options') ) : the_row();

                $btn_margin_top = get_sub_field('margin_top');
                $btn_direction = get_sub_field('direction');
                $direction = ' d-grid gap-2 d-sm-block';
                // $direction = ' d-flex';


                if ( 'vertical' === $btn_direction ) {
                    $direction = ' d-grid gap-2';
                    // $direction = '  d-flex flex-column align-items-start';
                }

                $button_margin = abs($btn_margin_top);
                $margin_top = '';
                $negative = '';
                if ( '0' > $btn_margin_top ) {
                    $negative = 'n';
                }
                if ( $btn_margin_top ) {
                    $margin_top = ' mt-sm-' . $negative . '' . $button_margin . '';
                }

                $btn_align = get_sub_field('align');
                $align = '';
                if ( $btn_align ) {
                    $align = ' justify-content-sm-' . $btn_align . '';
                }
            
            endwhile;

        endif;

        if ( have_rows('button_repeater') ) :
            
            echo '<div class="buttons-wrapper' . $direction . ' mx-n1">';

                while ( have_rows('button_repeater') ) : the_row();
                    $unique_id = get_sub_field( 'unique_id' );
                    $button_text = get_sub_field('button_text');
                    $button_style = get_sub_field('button_style');
                    $link_text = 'Read More';
                    if ( $button_text ) {
                        $link_text = $button_text;
                    }

                    $btn_style = ' link-secondary';
                    if ( $button_style ) {
                        $btn_style = ' btn-' . $button_style . '';
                    }

                    $flex_link = get_sub_field('flex_link');
                    $permalink = '#';
                    $target = '';

                    if ( have_rows('flex_link') ) :
                        // $i = 0;

                        while ( have_rows('flex_link') ) : the_row();
                            // $i++;

                            $link_type = get_sub_field('link_type');
                            $post_object_post = get_sub_field('post_object_post');
                            $post_object_page = get_sub_field('post_object_page');
                            $archive = get_sub_field('archive');
                            $taxonomy = get_sub_field('taxonomy');
                            $url = get_sub_field('url');
                            $file = get_sub_field('file');
                            $link = get_sub_field('link');
                            $email = get_sub_field('email');
                            $phone = get_sub_field('phone');
                            $list_links = get_sub_field('list_links');

                            if ( 'post' === $link_type && $post_object_post ) {
                                $permalink = get_permalink( $post_object_post->ID );
                                $post_title = esc_html( $post_object_post->post_title );
                            }

                            if ( 'page' === $link_type && $post_object_page ) {
                                $permalink = get_permalink( $post_object_page->ID );
                                $post_title = esc_html( $post_object_page->post_title );
                            }
                
                            if ( 'archive' === $link_type && $archive ) {
                                $permalink = $archive;
                            }
                
                            if ( 'taxonomy' === $link_type && $taxonomy ) {
                                $permalink = esc_url( get_term_link( $taxonomy ) );
                                $taxonomy_name = esc_html( $taxonomy->name );
                            }
                
                            if ( 'url' === $link_type && $url ) {
                                $permalink = $url;
                                $target = ' target="_blank"';
                            }
                
                            //File
                            if ( 'file' === $link_type && $file ) {
                                $file_title = $file['title'];
                                $permalink = $file['url'];
                                $target = ' target="_blank"';
                            }
                
                            //Link
                            if ( 'link' === $link_type && $link ) {
                                $link_url       = $link['url'];
                                $permalink      = esc_url( $link_url );
                                $link_title     = $link['title'];
                                $link_target    = $link['target'] ? $link['target'] : '_self';
                                $target         = ' target="' . esc_attr( $link_target ) . '"';
                
                                if ( empty($the_link_text) && $link_title ) {
                                    $link_text = $link_title;
                                }
                            }
                
                            //Email
                            if ( 'email' === $link_type && $email ) {
                                $permalink = 'mailto:' . $email . '';
                                $target = ' target="_blank"';
                
                                if ( empty($button_text) ) {
                                    $link_text = $email;
                                }
                            }
                
                            //Phone
                            if ( 'phone' === $link_type && $phone ) {
                                $permalink = 'tel:' . $phone . '';
                                $target = ' target="_blank"';
                
                                if ( empty($button_text) ) {
                                    $link_text = $phone;
                                }
                            }

                            $collapse_links = '';
                            $data_bs_toggle = '';
                            $role = '';
                            $area_expanded = '';
                            $dropdown_start = '';
                            $dropdown_end = '';
                            $dropdown_toggle = '';
                            $id = '';
                            $width_100 = '';

                            //List Links
                            if ( 'list-links' === $link_type && $list_links ) {
                                $permalink = '#';
                                $dropdown_toggle = ' dropdown-toggle';
                                $dropdown_start = '<div class="dropdown d-inline-block">';
                                $dropdown_end = '</div>';
                                $area_expanded = ' aria-expanded="false"';
                                $data_bs_toggle = ' data-bs-toggle="dropdown"';
                                $role = ' role="button"';
                                $width_100 = ' w-100';

                                $id = ' id="dropdown-' . $unique_id . '"';

                                if ( empty($button_text) ) {
                                    $link_text = $phone;
                                }
                            }

                        endwhile;

                    endif;

                    echo $dropdown_start;

                        echo '<a class="btn btn-lg' . $btn_style . '' . $dropdown_toggle . '' . $width_100 . ' m-1" href="' . $permalink . '"' . $role . '' . $id . '' . $data_bs_toggle . '' . $area_expanded . '' . $target . '>' . $link_text . '</a>';

                        if ( 'list-links' === $link_type && $list_links ) :

                            echo '<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdown-' . $unique_id . '">';
                                
                                foreach ( $list_links as $link ) :

                                    $link_icon = $link['icon'];
                                    $link_url = $link['url'];
                                    $link_text = $link['text'];

                                    $icon_space = '';

                                    if ( $link_icon ) {
                                        $icon_space = ' ps-1';
                                    }

                                    $text = 'Read more';
                                    if ( $link_text ) {
                                        $text = $link_text;
                                    }

                                    echo '<li><a class="dropdown-item" href="' . $link_url . '" target="_blank">' . $link_icon . '<span class="link-text text-light' . $icon_space . '">' . $text . '</span></a></li>';
                                
                                endforeach;

                            echo '</ul>';

                        endif;

                    echo $dropdown_end;

                endwhile;

            echo '</div>';

        endif;

    endwhile;

endif;
?>