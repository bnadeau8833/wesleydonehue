<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wesley_Donehue
 */

get_header();

?>

	<main id="primary" class="site-main bg-beige">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			echo '<div class="container-lg">';

				awesome_post_nav();

				get_template_part('template-parts/loops/related', 'posts');

			echo '</div>';
		endwhile; // End of the loop.
		?>
		
	</main><!-- #main -->

<?php
get_footer();
