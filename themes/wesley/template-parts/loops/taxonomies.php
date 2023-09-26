<?php
$post_type = get_post_type();
$taxonomies = get_object_taxonomies( $post_type, 'objects' );

if (!empty($taxonomies)) :
    echo '<div class="taxonomies-wrapper sticky-top bg-white">';
        echo '<p class="category pr-1 text-uppercase fw-bolder mb-2">Topics</p>';

        foreach ( $taxonomies as $taxonomy ) :

            $terms = get_terms(array(
                'taxonomy' => $taxonomy->name,
                'hide_empty' => false,
            ));

            if (!empty($terms)) :
                echo '<span class="tax-label d-block small fw-bolder">' . $taxonomy->label . '</span>';

                echo '<ul class="categories-list ms-0 list-unstyled small">';


                    foreach ( $terms as $term ) :
                        $term_link = get_term_link( $term );
                        // $term_id = get_the_id( $term );
                        $term_id = $term->term_id;

                        if ( is_wp_error( $term_link ) ) {
                            continue;
                        }

                        if ( !empty($term) ) {
                            echo '<li><a class="tax-link" href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
                        }
                    endforeach;
                echo '</ul>';
            endif;

        endforeach;

    echo '</div>';
endif;
?>
