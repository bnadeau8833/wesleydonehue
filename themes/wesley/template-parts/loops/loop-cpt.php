<?php
$args = array(
    'post_type'      => 'cpt',
    'posts_per_page' => -1,
);
$loop = new WP_Query($args);

echo '<div class="widget">';
    echo '<h2 class="widget-title mb-3">Key Issues</h2>';
    echo '<ul class="issues-list">';
        while ( $loop->have_posts() ) {
            $loop->the_post();
            $permalink = get_the_permalink();
            $title = get_the_title();

            echo '<li><a href="' . $permalink . '">' . $title . '</a></li>';

        }
    echo '</ul>';
echo '</div>';