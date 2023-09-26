<?php
$title = get_the_title();

$share_link = 'https://open.spotify.com/episode/6A88pinA6HkLnkdvCwjxQ9?si=Wjc9kdU8TB22sYFokxKuXQ';
// $embed_link = 'https://open.spotify.com/embed/episode/6A88pinA6HkLnkdvCwjxQ9?utm_source=generator';
$embed_link = '';

$platforms = get_field('platforms');
if ( $platforms ) {
    $spotify_link = $platforms['spotify_link'];
}

if ( $spotify_link ) {
    $embed_link     = str_replace('episode/', 'embed/episode/', $spotify_link);

    echo '<div class="ratio ratio-21x9">';
        echo '<iframe src="' . $embed_link . '" title="' . $title . '" allowfullscreen></iframe>';
    echo '</div>';

    // echo $embed_link;
}

/*
echo '<div class="p-5 my-4">';
    echo '<div class="text-start mb-3"><span>Spotify Link:</span><br>' . $spotify_link . '</div>';

    echo '<div class="text-start"><span>Embed Link:</span><br>' . $embed_link . '</div>';
echo '</div>'
<iframe src="https://open.spotify.com/embed/episode/6A88pinA6HkLnkdvCwjxQ9?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>

<div class="ratio ratio-16x9">
  <iframe src="" title="YouTube video" allowfullscreen></iframe>
</div>


https://open.spotify.com/embed/episode/6A88pinA6HkLnkdvCwjxQ9?utm_source=generator
https://open.spotify.com/embed/episode6A88pinA6HkLnkdvCwjxQ9?si=zYtSR7uURzOe6VYxEaGEew
*/
?>