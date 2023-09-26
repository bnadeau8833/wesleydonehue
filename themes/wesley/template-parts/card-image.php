<?php
$title = get_the_title();
$awesome_post_slug = get_post_type();

$permalink = get_the_permalink();
$size = 'card-image';
if ( 'reviews' === get_post_type() ) {
	$size = 'medium';
}

if ( 'episodes' === get_post_type() ) {
	$size = 'large';
}

$img_cover = ' img-cover';
$img_cover = '';

$image = '';
$default_featured = '';

$featured_image = get_the_post_thumbnail_url(get_the_ID(), $size);

if ( 'post' === $awesome_post_slug ) {
	$default_featured = wp_get_attachment_image_src(get_field('default_post_image', 'option'), $size);
}

if ( 'episodes' === $awesome_post_slug ) {
	$default_featured = wp_get_attachment_image_src(get_field('default_podcast_image', 'option'), $size);
}

if ( 'reviews' === $awesome_post_slug ) {
	$default_featured = wp_get_attachment_image_src(get_field('default_book_review_image', 'option'), $size);
}

if ( !$featured_image && $default_featured ) {
	$image = $default_featured[0];
}

if ( $featured_image ) {
	$image = $featured_image;
} elseif ( !$featured_image && $default_featured ) {
	$image = $default_featured[0];
}

/* Can't remember why this conditional was here but couldnt' figure out if it was in use anywhere, saving for the time being just incase
if ( !is_tax('publication') ) {
    echo '<a href="' . $permalink . '" class="img-link">' . $image . '</a>';
}
*/

$external_link = get_field('external_link');
$target = '';

if ( $external_link ) {
	$permalink = $external_link;
	$target = ' target="_blank"';
}

if ( $featured_image || $default_featured ) {
	echo '<img src="' . $image . '" class="img-fluid mx-auto' . $img_cover . '" alt="' . $title . '" />';
}
?>