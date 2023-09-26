<?php
$short_title = get_field('short_title');

if ( $short_title ) {
    echo '<span class="short-title font-header d-block mb-0">' . $short_title . '</span>';
}
?>