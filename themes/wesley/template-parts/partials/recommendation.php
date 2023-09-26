<?php
$recommendation_text = get_field('recommendation_text', 'options');
$rec_text = '';
if ( $recommendation_text ) {
    $rec_text = $recommendation_text;
}

$recommend = get_field('recommend');

if ( 'no' === $recommend ) {
    $text = ' Doesn\'t Recommend';
} else {
    $text = ' Recommends';
}

if ( $recommend ) {
    echo '<p class="recommendation text-primary text-uppercase mb-0">' . $rec_text . '' . $text . '</p>';
}
?>