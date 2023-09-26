<?php
$platforms = get_field('platforms');
$id = get_the_id();

if ( have_rows('platforms') ) :
    echo '<div class="accordion accordion-flush text-start" id="accordionPodcast' . $id . '">';
        while ( have_rows('platforms') ): the_row(); 

            $spotify_link = get_sub_field('spotify_link');
            $apple_link = get_sub_field('apple_link');

            $apple = '';
            $spotify = '';
            if ( $spotify_link ) {
                $apple = '<a href="' . $spotify_link . '" class="d-block podcast-link py-1" target="_blank"><i class="fa-brands fa-spotify"></i> <span class="link-text">Listen on Spotify</span></a>';
            }

            if ( $apple_link ) {
                $spotify = '<a href="' . $apple_link . '" class="d-block podcast-link py-1" target="_blank" ><i class="fa-light fa-podcast"></i> <span class="link-text">Listen on Apple</span></a>';
            }

            echo '<div class="accordion-item position-absolute bottom-0 end-0 border-0">';
                echo '<button class="accordion-button collapsed bg-primary p-2 z-10" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne' . $id . '" aria-expanded="false" aria-controls="collapseOne' . $id . '"><i class="fa-light fa-headphones-simple text-white pe-2 ps-1"></i></button>';
            echo '</div><!-- .acordion-item -->';

            echo '<div id="collapseOne' . $id . '" class="accordion-collapse collapse position-absolute bottom-0 w-100" aria-labelledby="headingOne" data-bs-parent="#accordionPodcast' . $id . '"><div class="accordion-body border-top border-gray-darker small px-3 pt-3 pb-6">';
                echo $apple;
                echo $spotify;
            echo '</div></div>';

        endwhile;
    echo '</div>';
endif;
?>