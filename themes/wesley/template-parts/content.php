<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wesley_Donehue
 */

$post_id	= get_the_id();
$title		= get_the_title();
$permalink	= get_the_permalink();

$size = 'full';

$animate_zoom_in = ' data-aos="zoom-in"';
$animate_fade_up = ' data-aos="fade-up"';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white position-relative'); ?>>
	<?php
	echo '<div class="banner-wrap position-relative overflow-hidden">';
	
		echo '<div class="container-lg px-0 inner">';
		
			echo '<header class="entry-header text-center py-4 py-sm-5 py-md-6"' . $animate_zoom_in . '>';
				if ( is_singular() ) {
					?>

					<h1 class="entry-title mb-0 text-secondary h2"><?php get_template_part('template-parts/partials/short', 'title'); ?><?php echo $title; ?></h1>

					<?php
				} else {
					?>

					<h2 class="entry-title mb-0 text-secondary h3"><a href="<?php echo $permalink; ?>" rel="bookmark"></a></h2>
					
					<?php
				}

				if ( 'post' === get_post_type() ) :
					echo '<div class="entry-meta">';
						wesley_posted_on();
					echo '</div><!-- .entry-meta -->';
				endif;
			echo '</header><!-- .entry-header -->';
		echo '</div><!-- .container -->';

		echo '<div class="bg-beige">';

			wesley_post_thumbnail();

			echo '<div class="container-lg text-center">';
				$icon_image = wp_get_attachment_image_src(get_field('post_icon_image', 'option'), 'medium');
				
				if ( $icon_image ) {
					echo '<img' . $animate_zoom_in . ' class="img-fluid img-icon my-3" src="' . $icon_image[0] . '" alt="" />';
				}

				get_template_part('template-parts/partials/spotify', 'embed');

				echo '<div class="entry-content px-5"' . $animate_fade_up . '>';
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wesley' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wesley' ),
							'after'  => '</div>',
						)
					);
				echo '</div><!-- .entry-content -->';

				echo '<footer class="entry-footer"' . $animate_zoom_in . '>';
					wesley_entry_footer();
				echo '</footer><!-- .entry-footer -->';

				//Social Share
				get_template_part('template-parts/partials/social', 'share');

			echo '</div><!-- .container -->';
		echo '</div><!-- .beige-bg -->';
	?>
</article><!-- #post-<?php the_ID(); ?> -->
