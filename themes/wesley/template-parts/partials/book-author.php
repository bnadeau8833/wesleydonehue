<?php
$author = get_field('author');

if ( $author ) {
    echo '<p class="author small lh-sm mb-0">By ' . $author . '</p>';
}
?>