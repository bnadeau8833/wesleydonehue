<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Wesley_Donehue
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container-lg pb-5">
			<?php
			if ( have_posts() ) :
			
				echo '<div class="row">';

					$posts_col = '-10';

					if ( 'post' === get_post_type() ) {
						echo '<div class="col-md-2">';
							get_template_part('template-parts/loops/taxonomies', 'collapse');
						echo '</div>';
					} else {
						$posts_col = '';
					}

					echo '<div class="col-md' . $posts_col . '">';
						echo '<div class="row gx-5 gx-lg-7 gx-xl-11 gy-4">';

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/

								$content = 'card';
								if ( 'press' === get_post_type() ) {
									$content = 'content';
									$columns = 'col-sm-6 col-md-4 col-lg-3';
								} 
								elseif ( 'post' === get_post_type() ) {
									$columns = 'col-lg-6';
								} else {
									$columns = 'col-sm-6 col-md-4';
								}

								echo '<div class="' . $columns . '">';
										get_template_part( 'template-parts/' . $content . '', get_post_type() );
								echo '</div>';
							endwhile;

							else :

							get_template_part( 'template-parts/content', 'none' );

						echo '</div><!-- .row --->';
					echo '</div><!-- .col-md-10 --->';
				echo '</div><!-- .row --->';
			endif;

			the_posts_pagination();
			
			?>
		</div><!-- .container -->
	</main><!-- #main -->

<?php
get_footer();
