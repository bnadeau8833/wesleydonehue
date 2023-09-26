<?php
$link_text = 'View All';
$override_link_text = get_sub_field('link_text');

if ( $override_link_text ) {
    $link_text = $override_link_text;
}

if ( have_rows('flex_link') ) :
    while ( have_rows('flex_link') ) : the_row();
        $link_type          = get_sub_field('link_type');
        $post_object_post   = get_sub_field('post_object_post');
        $post_object_page   = get_sub_field('post_object_page');
        $archive            = get_sub_field('archive');
        $taxonomy           = get_sub_field('taxonomy');
        $url                = get_sub_field('url');
        $file               = get_sub_field('file');
        $link               = get_sub_field('link');
        $email              = get_sub_field('email');
        $phone              = get_sub_field('phone');
        $target = '';

        if ( 'post' === $link_type && $post_object_post ) {
            $permalink  = get_permalink( $post_object_post->ID );
            $post_title = esc_html( $post_object_post->post_title );
        }

        if ( 'page' === $link_type && $post_object_page ) {
            $permalink  = get_permalink( $post_object_page->ID );
            $post_title = esc_html( $post_object_page->post_title );
        }

        if ( 'archive' === $link_type && $archive ) {
            $permalink = $archive;
        }

        if ( 'taxonomy' === $link_type && $taxonomy ) {
            $permalink      = esc_url( get_term_link( $taxonomy ) );
            $taxonomy_name  = esc_html( $taxonomy->name );
        }

        if ( 'url' === $link_type && $url ) {
            $permalink = $url;
            $target = ' target="_blank"';
        }

        //File
        if ( 'file' === $link_type && $file ) {
            $file_title = $file['title'];
            $permalink  = $file['url'];
            $target     = ' target="_blank"';
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
            $permalink  = 'tel:' . $phone . '';
            $target     = ' target="_blank"';

            if ( empty($button_text) ) {
                $link_text = $phone;
            }
        }

        if ( !empty( $permalink ) ) {
            echo '<a href="' . $permalink . '" class="header-link"' . $target . '>' . $link_text . '</a>';
        }
    endwhile;
endif;
?>