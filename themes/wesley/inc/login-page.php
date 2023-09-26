<?php
/**
 * Custom Login Page from Options page
 */

//Customizer logo
$navbar_logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'medium' );

add_action( 'login_head', 'wpdev_filter_login_head', 100 );

function wpdev_filter_login_head() {
	$navbar_logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'medium' );
	$width = '';
	$height = '';

	if ( $navbar_logo ) :
		$display_logo = $navbar_logo[0];
		$height = $navbar_logo[2];
		$width = $navbar_logo[1];
	endif;

	
	if ( have_rows('login_page', 'option') ) : while ( have_rows('login_page', 'option') ) : the_row();
		if ( have_rows('logo') ) : while ( have_rows('logo') ) : the_row();
			$image = get_sub_field('image');
			$override_width = get_sub_field('width');

			if ( $image ) {
				// Thumbnail size attributes.
				$size = 'medium';
				$display_logo = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
			}

			if ( $override_width ) {
				$width = $override_width;
			}
		
			$img_ratio = $width / 300;
			$img_height = $height * $img_ratio;

		endwhile; endif;

		

		$links_color = get_sub_field('links_color', 'option');
		$btn_color = get_sub_field('btn_color', 'option');

		if ( have_rows('flex_background', 'option') ) : while ( have_rows('flex_background', 'option') ) : the_row();
			$bg_image = get_sub_field('bg_image');
			$bg_color = get_sub_field('bg_color');
			$bg_size = get_sub_field('bg_size');
			$bg_repeat = get_sub_field('bg_repeat');
			$bg_attachment = get_sub_field('bg_attachment');
			?>
			<style>
				<?php
				if ( $bg_color || $bg_image ) :
					?>
					body {
						<?php if ( $bg_color ) : ?>
							background: <?php echo $bg_color; ?>;
						<?php endif; ?>
					
						<?php if ( $bg_image ) : ?>
							background-image: url(<?php echo $bg_image; ?>);
							background-repeat: <?php echo $repeat_class; ?>;
							background-position: <?php echo $login_x; ?> <?php echo $login_y; ?>;
							background-size: <?php echo $bg_size; ?>;
						<?php endif; ?>
					}
					<?php
				endif;

				//Background color
				if ( $bg_color ) :
					?>
					#login {
						position: relative;
					}
					body:before {
						content: '';
						height: 100%;
						width: 100%;
						position: absolute;
						top: 0;
						left: 0;
						background-color: <?php echo $bg_color; ?>;
					}
					<?php
				endif;
				?>

			</style>
			
			<?php
		endwhile; endif;

		
		if ( have_rows('login_form', 'option') ) : while ( have_rows('login_form', 'option') ) : the_row();
			$form_background = get_sub_field('form_background');
			$form_padding = get_sub_field('form_padding');
			$form_border = get_sub_field('form_border');
			$form_text_color = get_sub_field('form_text_color');
		endwhile; endif;
		?>

		<style>
			.login h1 a {
				background-image: url(<?php echo esc_url($display_logo); ?>);
				-webkit-background-size: <?php echo $width; ?>px;
				background-size: <?php echo $width; ?>px;
				height: <?php echo $img_height; ?>px;
				width: <?php echo $width; ?>px;
			}

			<?php
			if ( $links_color ) :
				?>
				.login #backtoblog a,
				.login #nav a,
				.login a {
					color: <?php echo $links_color; ?>;
				}
				<?php
			endif;

			if ( $btn_color ) :
				?>
				.login input#wp-submit {
					background-color: <?php echo $btn_color; ?>;
					border-color: <?php echo $btn_color; ?>;
				}
				<?php
			endif;

			if ( $bg_color || $bg_image ) :
				?>
				body {
					<?php if ( $bg_color ) : ?>
						background: <?php echo $bg_color; ?>;
					<?php endif; ?>
					
					<?php if ( $bg_image ) : ?>
						background-image: url(<?php echo $bg_image; ?>);
						background-repeat: <?php echo $repeat_class; ?>;
						background-position: <?php echo $login_x; ?> <?php echo $login_y; ?>;
						<?php echo $size_class; ?>
					<?php endif; ?>
				}
				<?php
			endif;
			?>
		</style>
		<?php
	endwhile; endif;
}

//Make link homepage instead of Wordpress.org
function new_wp_login_url() {
	return home_url();
}
add_filter('login_headerurl', 'new_wp_login_url');