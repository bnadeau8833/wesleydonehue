<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Wesley_Donehue
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container-lg">
			<?php if ( have_posts() ) : ?>

				<header class="page-header py-6">
					<h1 class="page-title h2">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'wesley' ), '<span class="px-1 border-bottom border-4 border-primary text-secondary">' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->

				<?php

				echo '<div class="row g-5">';
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */

						echo '<div class="col-sm-6 col-md-4">';
							get_template_part( 'template-parts/content', 'search' );
						echo '</div>';
					endwhile;

					the_posts_pagination();

				else :
					echo '<div class="col-12">';
						get_template_part( 'template-parts/content', 'none' );
					echo '</div>';
				endif;
			echo '</div><!-- .row -->';
			?>
		</div><!-- .container -->
	</main><!-- #main -->

<?php
get_footer();
