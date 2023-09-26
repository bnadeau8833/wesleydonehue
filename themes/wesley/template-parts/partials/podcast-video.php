<?php
$background_video = get_field('podcast_background_video', 'option');
$video_poster = get_field('podcast_video_poster', 'option');

$poster = '';

if ( $video_poster ) {
  $poster = '  poster="' . $video_poster . '"';
}


$overlay = ' overlay-secondary';
$overlay = '';

if ( $background_video ) :
  echo '<div class="bg-video-wrap text-white h-100 w-100 py-10 position-absolute top-50 start-50 translate-middle' . $overlay . '">';
    echo '<video id="background-video" autoplay loop muted' . $poster . '>';
      echo '<source src="' . $background_video . '" type="video/mp4">';
    echo '</video>';
  echo '</div>';
endif;

?>
