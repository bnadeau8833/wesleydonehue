<?php
$permalink = get_the_permalink();
$title = get_the_title();
$size = 'thumbnail';
$featured_image = get_the_post_thumbnail_url(get_the_ID(), $size);
$episode_number = get_field('episode_number');

$episode = '';
if ( $episode_number ) {
  $episode = '<span class="episode-number">Episode ' . $episode_number . '</span> ';
}

$episode_number = get_field('episode_number');
$platforms = get_field('platforms');

if ( have_rows('platforms') ) :
  while ( have_rows('platforms') ): the_row(); 

    $spotify_link = get_sub_field('spotify_link');
    $spotify = '';
    if ( $spotify_link ) {
      $spotify = '<a href="' . $spotify_link . '" class="episode-link link-secondary" target="_blank" rel="bookmark"><i class="fa-brands fa-spotify"></i> Spotify</a>';
    }

    $apple_link = get_sub_field('apple_link');
    $apple = '';
    if ( $apple_link ) {
      $apple = '<a href="' . $apple_link . '" class="episode-link link-secondary" target="_blank" rel="bookmark"><i class="fa-solid fa-podcast"></i> Apple</a>';
    }
  endwhile;
endif;

$img_cover = '';

echo '<div class="episode-wrap font-header border-bottom border-gray-darker d-flex align-items-center py-3">';
  echo '<div class="text-wrap">';
    echo '<span class="episode-title".' . $episode . '' . $title . '</span>';
    echo '<div class="links-wrap small pt-1">' . $spotify . '' . $apple . '</div>';
  echo '</div>';
echo '</div>';
?>