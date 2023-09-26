<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wesley_Donehue
 */
$size = 'card-image';

//Featured Image
$featured_image = get_the_post_thumbnail_url(get_the_ID(), $size);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<?php
	if ( $featured_image ) {
		echo '<div class="card-image-wrap position-relative d-inline-block">';
			get_template_part('template-parts/card', 'image');
		echo '</div>';
	}
	?>
	
	<div class="card-body px-0">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title card-title text-uppercase h5 mb-0 py-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php
					wesley_posted_on();
					wesley_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<footer class="entry-footer">
			<?php wesley_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .card-body-->
</article><!-- #post-<?php the_ID(); ?> -->
