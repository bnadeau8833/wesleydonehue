<?php
/**
 * Template part for displaying posts in cards in the centered mode carousel
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wesley_Donehue
 */

$title = get_the_title();
$excerpt = get_the_excerpt();
$permalink = get_the_permalink();
$size = 'card-image';

//Featured Image
$featured_image = get_the_post_thumbnail_url(get_the_ID(), $size);
$default_featured = get_theme_mod('awesome_default_post_image');

$image = '';
if ( $default_featured && !$featured_image ) {
	$image = $default_featured;
}

if ( $featured_image ) {
	$image = $featured_image;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card bg-secondary text-white h-100'); ?>>
	<?php
	echo '<div class="card-image-wrap position-relative">';
		get_template_part('template-parts/card', 'image');
		get_template_part('template-parts/partials/podcast', 'listen');
	echo '</div>';

	echo '<div class="card-body d-flex flex-column px-0">';
		echo '<header class="entry-header">';
			if ( in_array( get_post_type(), array('post', 'press')) ) :
				echo '<div class="entry-meta pb-1">';
					wesley_posted_on();
				echo '</div><!-- .entry-meta -->';
			endif;

			if ( 'reviews' === get_post_type() ) {
				get_template_part('template-parts/partials/star', 'rating');
			}

			if ( 'episodes' === get_post_type() ) {
				get_template_part('template-parts/partials/episode');
			}
			?>

			<h2 class="entry-title card-title text-uppercase h4 mb-0"><?php get_template_part('template-parts/partials/short', 'title'); ?><a class="link-light" href="<?php echo  esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo $title; ?></a></h2>

			<?php
			if ( 'post' === get_post_type() ) :
				echo '<div class="entry-meta pt-1">';
					wesley_posted_by();
				echo '</div><!-- .entry-meta -->';
			endif;

			if ( 'reviews' === get_post_type() ) {
				get_template_part('template-parts/partials/book', 'author');
			}
		echo '</header><!-- .entry-header -->';

		
		echo '<div class="entry-content small">';
			echo $excerpt;
		echo '</div><!-- .entry-content -->';
		

		wesley_entry_footer();

	echo '</div><!-- .card-body -->';
	?>
</article><!-- #post-<?php the_ID(); ?> -->
