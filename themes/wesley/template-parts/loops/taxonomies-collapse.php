<?php
$post_type = get_post_type();
$taxonomies = get_object_taxonomies( $post_type, 'objects' );

if (!empty($taxonomies)) :
    echo '<div class="taxonomies-wrapper sticky-top bg-white">';
        echo '<div class="position-relative">';

        // echo '<div class="position-relative d-flex align-items-start justify-content-between flex-md-column align-items-md-start">';
            echo '<p class="category pr-1 text-uppercase fw-bolder mb-0">Topics</p>';
                // echo '<div class="topics-wrap w-25"><p class="category pr-1 text-uppercase fw-bolder mb-0">Topics</p></div>';

                echo '<div class="tax-btns-wrap d-flex flex-md-column w-100 ms-auto">';

                $i = 1;

                foreach ( $taxonomies as $taxonomy ) :
                    $aria_expanded = 'false';
                    $show = '';

                    if ( 1 === $i ) {
                        $show = ' show';
                        $aria_expanded = 'true';
                    }

                    $terms = get_terms(array(
                        'taxonomy' => $taxonomy->name,
                        'hide_empty' => true,
                    ));

                    if (!empty($terms)) :
                        // echo '<div class="tax-wrap ms-auto">';
                        echo '<div class="tax-wrap tax-' . $taxonomy->name . '">';

                            echo '<button class="btn-toggle bg-transparent d-flex text-secondary font-body px-0 d-flex align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $taxonomy->name . '" aria-expanded="' . $aria_expanded . '" aria-controls="collapse' . $taxonomy->name . '">' . $taxonomy->label . '</button>';
            
                            echo '<div class="collapse' . $show . '" id="collapse' . $taxonomy->name . '">';
                                echo '<div class="card card-body py-0">';
                                    echo '<ul class="list-unstyled small mb-0">';
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
                                echo '</div><!-- .card.card-body -->';
                            echo '</div><!-- .collapse -->';
                        echo '</div>';
                    endif;
                
                    $i++;

                endforeach;

            echo '</div>';
        echo '</div>';
    echo '</div>';
endif;
?>