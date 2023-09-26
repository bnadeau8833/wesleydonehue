<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Wesley_Donehue
 */

get_header();

$title_404 = get_field('title_404', 'option');
$sub_title_404 = get_field('sub_title_404', 'option');
$content_404 = get_field('content_404', 'option');

$image_404 = wp_get_attachment_image_src(get_field('image_404', 'option'), 'large');
?>

	<main id="primary" class="site-main">
		<div class="container-lg">
			<section class="error-404 not-found text-center py-6 py-sm-8 py-md-10">
				<?php
				if ( $image_404 ) {
					echo '<img src="' . $image_404[0] . '" class="img-fluid img-404 mb-5" alt="' . get_the_title(get_field('image_404', 'option')) . '" />';
				}
				?>
				<header class="page-header">
					<?php
					$title = 'Oops! You Are Under Fire';
					if ( $title_404 ) {
						$title = $title_404;
					}


					echo '<h1 class="page-title mb-0 h2">' . $title . '</h1>';

					$sub_title = 'Let\'s Help You Put That Out';

					if ( $sub_title_404 ) {
						$sub_title = $sub_title_404;
					}

					echo '<h2 class="text-secondary h3 mb-0">' . $sub_title . '</h2>';
					?>
				</header><!-- .page-header -->

				<div class="page-content">
					<?php
					if ( $content_404 ) {
						echo $content_404;
					}
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-lg btn-primary my-4">Return Home</a>

					<?php
					// get_search_form();
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div><!-- .container -->
	</main><!-- #main -->

<?php

get_template_part('template-parts/loops/flex', 'footer');

get_footer();
