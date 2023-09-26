<?php
if ( have_rows('purchase_links') ) :
    echo '<div class="text-center pt-4">';
        echo '<ul class="list-unstyled ms-0 mb-2">';
            while ( have_rows('purchase_links') ) : the_row();
                $icon = get_sub_field('icon');
                $url = get_sub_field('url');
                $link_text = get_sub_field('link_text');

                $text = '';
                if ( $link_text ) {
                    $text = $link_text;
                } else {
                    $text = $url;
                }

                $icon_html = '';
                if ( $icon ) {
                    $icon_html = $icon;
                }
                echo '<li class="">' . $icon_html . ' <a href="' . $url . '" target="_blank" rel="bookmark" class="purchase-link">' . $text . '</a></li>';

            endwhile;
        echo '</ul>';
    echo '</div>';
endif;
?>