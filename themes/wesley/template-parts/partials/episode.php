<?php
$episode_number = get_field('episode_number');

if ( $episode_number ) {
    echo '<span class="episode font-header">Episode: ' . $episode_number . '</span> ';
}
?>