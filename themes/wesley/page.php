<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wesley_Donehue
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		echo '<div class="container-lg">';
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
		echo '</div><!-- .container -->';

		$id = get_the_id();
		$show_footer_modules = get_field('show_footer_modules', $id);
		if ( $show_footer_modules ) {
			get_template_part('template-parts/loops/flex', 'footer');
		}
		?>

	</main><!-- #main -->

<?php
get_footer();
