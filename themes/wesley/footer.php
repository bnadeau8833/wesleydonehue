<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wesley_Donehue
 */

$id 		= get_the_id();
$site_title = get_bloginfo( 'name' );

echo '<footer id="colophon" class="site-footer pt-6 pb-5">';
	echo '<div class="container-lg">';
		echo '<div class="row">';
			echo '<div class="logo-col col-md-3 text-center text-md-start py-3 py-md-0">';
				//Logo
				$awesome_footer_logo = get_theme_mod('awesome_footer_logo');
				
				if ( $awesome_footer_logo ) :
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $awesome_footer_logo; ?>" class="footer-logo img-fluid" alt="<?php echo $site_title; ?>" /></a>
					<?php
				endif;
			echo '</div><!-- .col .logo-col -->';
				
			echo '<div class="menu-col col-md-8 col-lg-7 ms-auto">';
				if ( has_nav_menu( 'menu-footer' ) ) :
					get_template_part('template-parts/menus/menu', 'footer');
				endif;

				$footer_form_id 	= get_theme_mod('awesome_footer_form_id');
				$footer_form_title	= get_theme_mod('awesome_footer_form_title');

				if ( $footer_form_id || $footer_form_title ) :
					echo '<div class="pt-6 px-sm-4 px-md-8 px-lg-10">';
						if ( $footer_form_title ) {
							echo '<p class="form-title h3 text-center text-secondary mb-2">' . $footer_form_title . '</p>';
						}
						
						if ( $footer_form_id ) {
							echo gravity_form( $footer_form_id, false, false, false, '', true, 12 );
						}
					echo '</div>';
				endif;
				
			echo '</div><!-- .menu-col .col-md-9 -->';

			$awesome_hide_site_title = get_theme_mod('awesome_hide_site_title');
			if ( !$awesome_hide_site_title ) {
				echo '<div class="col-12 col-md-4 py-3 py-md-0 mt-md-n5 text-center text-md-start">';
					echo '<span class="title-copyright small mt-auto">' . $site_title . ' <span class="text-gray-darker">&copy;</span> ' . date("Y") . '</span>';
				echo '</div>';
			}

		echo '</div><!-- .row -->';
	echo '</div><!-- .container -->';
echo '</footer><!-- #colophon -->';
?>

</div><!-- #page -->

<?php wp_footer(); ?>

<script>
jQuery(function() {
	AOS.init({
		offset: 100,
		duration: 800,
		easing: "ease-in-out",
		once: true,
});

window.addEventListener('load', AOS.refresh); });
</script>

</body>
</html>
