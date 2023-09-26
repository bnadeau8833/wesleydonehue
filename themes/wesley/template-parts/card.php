<?php
/**
 * Template part for displaying posts in cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wesley_Donehue
 */

global $post;
$awesome_id = get_the_id();
$awesome_post_type = get_post_type();


$id			= get_the_id();
$title		= get_the_title();
$excerpt 	= get_the_excerpt();
$word_count = '20';

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

$hide_date = '';
$hide_author = '';
$hide_excerpt = '';
$hide_taxonomies = '';

//Post
$hide_post_excerpt = get_theme_mod('awesome_hide_post_excerpt');
$post_hide_date = get_theme_mod('awesome_post_hide_date');
$post_hide_author = get_theme_mod('awesome_post_hide_author');
$post_hide_taxonomies = get_theme_mod('awesome_post_hide_taxonomies');
$post_excerpt_length = get_theme_mod('awesome_post_excerpt_length');

if ( 'post' === get_post_type() && $hide_post_excerpt ) {
	$hide_excerpt = $hide_post_excerpt;
}

if ( 'post' === get_post_type() && $post_hide_date ) {
	$hide_date = $post_hide_date;
}

if ( 'post' === get_post_type() && $post_hide_author ) {
	$hide_author = $post_hide_author;
}

if ( 'post' === get_post_type() && $post_hide_taxonomies ) {
	$hide_taxonomies = $post_hide_taxonomies;
}

if ( 'post' === get_post_type() && $post_excerpt_length ) {
	$word_count = $post_excerpt_length;
}

//Book Reviews
$hide_book_rating = get_theme_mod('awesome_hide_book_rating');
$hide_book_author = get_theme_mod('awesome_hide_book_author');
$hide_book_excerpt = get_theme_mod('awesome_hide_book_excerpt');
$hide_book_recommendation = get_theme_mod('awesome_hide_book_recommendation');
$book_excerpt_length = get_theme_mod('awesome_book_excerpt_length');

if ( 'reviews' === $awesome_post_type && $hide_book_excerpt ) {
	$hide_excerpt = $hide_book_excerpt;
}

if ( 'reviews' === $awesome_post_type && $book_excerpt_length ) {
	$word_count = $book_excerpt_length;
}

//Podcast Episodes
$hide_episode_number = get_theme_mod('awesome_hide_episode_number');
$hide_episode_taxonomies = get_theme_mod('awesome_hide_episode_taxonomies');
$hide_episode_excerpt = get_theme_mod('awesome_hide_episode_excerpt');
$episode_excerpt_length = get_theme_mod('awesome_episode_excerpt_length');
$hide_episode_listen = get_theme_mod('awesome_hide_episode_listen');

if ( 'episodes' === get_post_type() && $hide_episode_taxonomies ) {
	$hide_taxonomies = $hide_episode_taxonomies;
}

if ( 'episodes' === get_post_type() && $hide_episode_excerpt ) {
	$hide_excerpt = $hide_episode_excerpt;
}

if ( 'episodes' === get_post_type() && $episode_excerpt_length ) {
	$word_count = $episode_excerpt_length;
}

$excerpt = excerpt('' . $word_count . '');



$external_link = get_field('external_link');
$target = '';
if ( $external_link ) {
	$permalink = $external_link;
	$target = ' target="_blank"';
}

$animate_fade_up = ' data-aos="fade-up"';
?>

<article<?php echo $animate_fade_up; ?> id="post-<?php the_ID(); ?>" <?php post_class('card bg-transparent h-100'); ?>>
	<?php
	$youtube_link	= get_field('youtube_link');
	$embed_link		= str_replace('watch?v=', 'embed/', $youtube_link);
	
	if ( $youtube_link ) {
		echo '<div class="ratio ratio-16x9">';
			echo '<iframe class="card-img-top" src="' . $embed_link . '?rel=0" title="YouTube video" allowfullscreen></iframe>';
		echo '</div>';
	} else {
		echo '<div class="card-image-wrap position-relative d-inline-block">';

			get_template_part('template-parts/card', 'image');
			
			if ( !$hide_episode_listen ) {
				get_template_part('template-parts/partials/podcast', 'listen');
			}
		echo '</div>';
	}

	echo '<div class="card-body d-flex flex-column align-items-start px-0 position-relative">';
		echo '<header class="entry-header w-100">';
			if ( in_array( get_post_type(), array('post', 'press') ) && !$hide_date ) :
				echo '<div class="entry-meta">';
					wesley_posted_on();
				echo '</div><!-- .entry-meta -->';
			endif;

			if ( 'reviews' === get_post_type() && !$hide_book_rating ) {
				get_template_part('template-parts/partials/star', 'rating');
			}

			if ( 'episodes' === get_post_type() && !$hide_episode_number ) {
				get_template_part('template-parts/partials/episode');
			}
			?>

			<h2 class="entry-title card-title text-uppercase h3 mb-0 py-1"><?php //get_template_part('template-parts/partials/episode'); ?><?php get_template_part('template-parts/partials/short', 'title'); ?><a href="<?php echo $permalink; ?>" class="card-link stretched-link"  rel="bookmark"<?php echo $target; ?>><?php echo $title; ?></a></h2>

			<?php
			if ( 'post' === get_post_type() && !$hide_author ) :
				setup_postdata( $post );
				
				echo '<div class="entry-meta">';
					wesley_posted_by();
				echo '</div><!-- .entry-meta -->';

			endif;

			if ( 'reviews' === get_post_type()  && !$hide_book_author ) {
				get_template_part('template-parts/partials/book', 'author');
			}
		echo '</header><!-- .entry-header -->';

		if ( is_page_template( 'page-templates/content-template.php' ) || !$hide_excerpt ) :
			echo '<div class="entry-content">';
				echo $excerpt;
			echo '</div><!-- .entry-content -->';
		endif;

		//Recommendation
		if ( 'reviews' === get_post_type() && !$hide_book_recommendation ) :
			get_template_part('template-parts/partials/recommendation');
		endif;

		if ( !$hide_taxonomies ) {
			wesley_entry_footer();
		}
	echo '</div><!-- .card-body -->';
	?>
</article><!-- #post-<?php the_ID(); ?> -->
