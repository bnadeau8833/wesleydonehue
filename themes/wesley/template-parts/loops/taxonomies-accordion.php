<?php
$post_type = get_post_type();
$taxonomies = get_object_taxonomies( $post_type, 'objects' );

if ( !empty( $taxonomies ) ) :
    echo '<div class="taxonomies-wrapper sticky-top bg-white">';
        echo '<p class="category pr-1 text-uppercase fw-bolder mb-2">Topics</p>';

        $accordion_flush = ' accordion-flush';
        $accordion_flush = '';

        echo '<div class="accordion' . $accordion_flush . '" id="accordionTaxonomies">';
            $i = 1;

            foreach ( $taxonomies as $taxonomy ) :
                $show = '';
                $aria_expanded = 'false';
                $collapsed = ' collapsed';
                $data_bs_parent = ' data-bs-parent="#accordionTaxonomies"';

                if ( 1 === $i ) {
                    $show = ' show';
                    $aria_expanded = 'true';
                    $collapsed = '';
                }

                $taxonomy_slug = $taxonomy->name;
                $taxonomy_name = $taxonomy->label;

                $terms = get_terms(array(
                    'taxonomy' => $taxonomy_slug,
                    'hide_empty' => false,
                ));

                if ( !empty( $terms ) ) :
                    
                    echo '<div class="accordion-item">';
                       
                        echo '<h2 class="accordion-header" id="heading' . $taxonomy_slug . '">';
                            echo '<button class="accordion-button' . $collapsed . ' xp-0 bg-transparent text-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $taxonomy_slug . '" aria-expanded="' . $aria_expanded . '" aria-controls="collapse' . $taxonomy_slug . '">' . $taxonomy_name . '</button>';
                        echo '</h2>';

                        echo '<div id="collapse' . $taxonomy_slug . '" class="accordion-collapse collapse' . $show . '" aria-labelledby="heading' . $taxonomy_slug . '">';
                            echo '<div class="accordion-body xpx-0">';

                                echo '<ul class="categories-list ms-0 list-unstyled small">';

                                    foreach ( $terms as $term ) :

                                        //Set the variables
                                        $term_link = get_term_link( $term );
                                        $term_id = $term->term_id;

                                        if ( is_wp_error( $term_link ) ) {
                                            continue;
                                        }

                                        if ( !empty( $term ) ) {
                                            echo '<li><a class="tax-link" href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
                                        }

                                    endforeach;

                                echo '</ul>';

                            echo '</div><!-- .accordion-body -->';
                        echo '</div><!-- .accordion-collapse -->';
                    echo '</div><!-- .accordion-item -->';

                endif;
                $i++;
            endforeach;

        echo '</div><!-- .accordion -->';
    echo '</div><!-- .taxonomies-wrapper -->';
endif;
/*
?>

<!-- <div class="accordion accordion-flush" id="accordionTaxonomies"> -->
    // <div class="accordion-item">

        <div id="collapse' . $taxonomy_slug . '" class="accordion-collapse collapse show" aria-labelledby="heading' . $taxonomy_slug . '" data-bs-parent="#accordionTaxonomies">
            <div class="accordion-body">
                <ul class="list-unstyled">
                    <li>This is the first item's accordion body.</li>
                    <li>It is shown by default</li>
                    <li>Until the collapse</li>
                    <li>plugin adds</li>
                    <li>the appropriate classes</li>
                    <li>that we use to style each element.</li>
                </ul>
            // </div><!-- .accordion-body -->
        // </div><!-- .accordion-collapse -->
    <!-- </div> -->

    <div class="accordion-item">

        <h2 class="accordion-header" id="headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Item #2</button></h2>
    
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTaxonomies">
            <div class="accordion-body">
                <ul>
                    <li>This is the first item's accordion body.</li>
                    <li>It is shown by default</li>
                    <li>Until the collapse</li>
                    <li>plugin adds</li>
                    <li>the appropriate classes</li>
                    <li>that we use to style each element.</li>
                </ul>
            </div>
        </div>
    </div>
</div><!-- .accordion -->


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

*/
?>
