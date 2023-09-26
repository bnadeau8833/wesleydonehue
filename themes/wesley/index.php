<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wesley_Donehue
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			echo '<div class="container-lg">';
				echo '<div class="row">';

					echo '<div class="col-md-2">';
						get_template_part('template-parts/loops/taxonomies', 'collapse');
					echo '</div>';

					echo '<div class="col-md-10">';

						echo '<div class="row g-5">';
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/

								echo '<div class="col-md-6">';
									get_template_part( 'template-parts/card', get_post_type() );
								echo '</div>';
							endwhile;

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
						echo '</div><!-- .row -->';

						the_posts_pagination();

					echo '</div><!-- .col-md-10 -->';
				echo '</div><!-- .row -->';
			echo '</div><!-- .container -->';
			?>

	</main><!-- #main -->

<?php
get_footer();
