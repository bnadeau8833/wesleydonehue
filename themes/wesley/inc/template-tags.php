<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Wesley_Donehue
 */


if ( ! function_exists( 'awesome_post_nav' ) ) :
	/**
	 * Post Navigation with featured images for books and podcasts
	 */
	function awesome_post_nav() {
		$post_type = get_post_type();
		$obj = get_post_type_object($post_type);
		$post_name = $obj->labels->singular_name;

		$size = 'logo-image';

		$next_post = get_next_post();
		$prev_post = get_previous_post();
		
		//Previous
		$prev_title = get_the_title($prev_post);
		$prev_featured = get_the_post_thumbnail_url($prev_post, $size);

		//Next
		$next_title = get_the_title($next_post);
		$next_featured = get_the_post_thumbnail_url($next_post, $size);

		$previous = '';
		if ( $prev_featured ) {
			$previous = '<img src="' . $prev_featured .  '" class="img-fluid img-featured mb-1" alt="' . $prev_title . '">';
		}

		$next = '';
		if ( $next_featured ) {
			$next = '<img src="' . $next_featured .  '" class="img-fluid img-featured mb-1" alt="' . $next_title . '">';
		}

		the_post_navigation(
			array(
				'prev_text' => '' . $previous . '<span class="text-wrap ps-2"><span class="nav-subtitle">' . esc_html__( 'Previous ' . $post_name . ':', 'wesley' ) . '</span><span class="nav-title fs-5 d-block">%title</span></span>',
				'next_text' => '' . $next . '<div class="text-wrap ps-2 ps-sm-0 pe-sm-2"><span class="nav-subtitle">' . esc_html__( 'Next ' . $post_name . ':', 'wesley' ) . '</span><span class="nav-title fs-5 d-block ms-sm-auto">%title</span></div>',
			)
		);
	}
endif;


if ( ! function_exists( 'awesome_page_title' ) ) :
	/**
	 * Page Title
	 */
	function awesome_page_title() {
		if (is_home()) {
			if (get_option('page_for_posts', true)) {
				// Static page home
				$title = get_the_title(get_option('page_for_posts', true));
			} else {
				// Blog posts home
				$title = __('Latest posts', 'wesley');
			}
		} elseif (is_category()) {
			// Category archive
			$title = single_cat_title('', false);
		} elseif (is_archive()) {
			// Other archives
			$title = post_type_archive_title();
		} elseif (is_search()) {
			// Search results
			if (trim(get_search_query()) === '') {
				$title = __('No search query entered', 'wesley');
			} else {
				$title = sprintf(__('Search results for &ldquo;%s&rdquo;', 'wesley'), '<mark>' . trim(get_search_query()) . '</mark>');
			}
		} elseif (is_404()) {
			// 404
			$title = __('Page not found', 'wesley');
		} elseif (is_singular()) {
			// Single post
			$title = single_post_title('', false);
		} else {
			// Anything else
			$title = get_the_title();
		}
		// Expose my own hook just in case
		return apply_filters('wesley_title', $title);
	}
endif;

if ( ! function_exists( 'wesley_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function wesley_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			// esc_html_x( 'Posted on %s', 'post date', 'wesley' ),
			esc_html_x( '%s', 'post date', 'wesley' ),

			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'wesley_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function wesley_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'wesley' ),
			// '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'

			'<span class="author vcard">' . esc_html( get_the_author() ) . '</span>'
		);

		echo '<span class="byline d-block"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'wesley_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function wesley_entry_footer() {
		// Hide category and tag text for pages.
		// if ( 'post' === get_post_type() ) {
		if ( in_array( get_post_type(), array('post', 'episodes')) ) {
		
			echo '<footer class="entry-footer pt-3">';
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ' ', 'wesley' ) );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					// printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'wesley' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

					printf( '<span class="cat-links d-block"><i class="fa-solid fa-folder text-gray fa-fw"></i> ' . esc_html__( '%1$s', 'wesley' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'wesley' ) );
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links d-block pt-1"><i class="fa-solid fa-tag text-gray fa-fw"></i> ' . esc_html__( '%1$s', 'wesley' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			echo '</footer>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'wesley' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'wesley_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function wesley_post_thumbnail() {
		global $post;
		$post_id = get_the_id();
		$youtube_link = get_field('youtube_link');
		$embed_link = str_replace('watch?v=', 'embed/', $youtube_link);

		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() && !$youtube_link ) {
			return;
		}

		if ( is_singular() ) {

			echo '<div class="post-thumbnail text-center mb-2 inner">';
				
				if ( $youtube_link ) {

					echo '<div class="ratio ratio-16x9">';
						echo '<iframe class="card-img-top" src="' . $embed_link . '?rel=0" title="YouTube video" allowfullscreen></iframe>';
					echo '</div>';

				} elseif ( 'episodes' === get_post_type() ) {

					the_post_thumbnail(
						'medium',
						array(
							'class' => 'img-fluid'
						),
					);
				}
				else {

					the_post_thumbnail(
						'card-image',
						array(
							'class' => 'img-fluid'
						),
					);
				}
			echo '</div><!-- .post-thumbnail -->';

		} else {

			$permalink = get_the_permalink();
			$external_link = get_field('external_link');
			$target = '';
			
			if ( $external_link ) {
				$permalink = $external_link;
				$target = ' target="_blank"';
			}
			
			?>
			<a class="post-thumbnail bg-beige-partial mb-4 inner" href="<?php echo $permalink; ?>"<?php echo $target; ?> aria-hidden="true" tabindex="-1">
				<?php
				
				if ( $youtube_link ) {

					echo '<div class="ratio ratio-16x9">';
						echo '<iframe class="card-img-top" src="' . $embed_link . '?rel=0" title="YouTube video" allowfullscreen></iframe>';
					echo '</div>';

				} else {
			
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				}
				?>
			</a>

			<?php
		} // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
