<?php
//Enable Carousel
$enable_carousel = get_sub_field('podcast_enable_carousel');

$carousel = '';
if ( $enable_carousel ) {
  $carousel = ' episodes-carousel';
  $slick_arrows = '';
}

//Number of episodes
$number_of_episodes = get_sub_field('number_of_episodes');
$number = '3';
if ( $number_of_episodes ) {
  $number = $number_of_episodes;
}

$slick_arrows = '';
$slick_dots = '<div class="awesome-dots d-flex align-items-start position-relative w-50"></div>';
$slick_dots = '';

$args = array(
  'post_type'      => 'episodes',
  'posts_per_page' => $number,
);

$loop = new WP_Query($args);

echo '<div class="episodes position-relative d-flex flex-column-reverse">';

  echo '<ul class="list-unstyled episodes ms-0 mb-0' . $carousel . '">';
    while ( $loop->have_posts() ) :
      $loop->the_post();

      get_template_part('template-parts/partials/episode', 'list');

    endwhile;
  echo '</ul>';

  wp_reset_postdata();

  if ( $enable_carousel ) :
    echo '<div class="w-100 d-flex align-items-start pb-2 mt-n2 mx-n2">';
      echo '<a class="awesome-arrow slick-prev-episode px-2 link-secondary"><i class="fa-regular fa-angle-up fa-2xl"></i></a><a class="awesome-arrow link-secondary slick-next-episode px-2"><i class="fa-regular fa-angle-down fa-2xl"></i></a>';
    echo '</div>';
  endif;

echo '</div>';
?>