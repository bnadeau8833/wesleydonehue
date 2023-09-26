<?php
function awesome_add_theme_css() {
    ob_start();

    //Nav logo width
    $navbar_logo_width = get_theme_mod( 'awesome_nav_logo_width' );
    $nav_logo_width = '300';
    if ( $navbar_logo_width ) {
        $nav_logo_width = $navbar_logo_width;
    }
    ?>

	img.custom-logo {
		width: <?php echo $nav_logo_width; ?>px;
	}
    <?php
    //Footer logo width
    $footer_logo_width = get_theme_mod( 'awesome_footer_logo_width' );
    $foot_logo_width = '150';
    if ( $footer_logo_width ) {
        $foot_logo_width = $footer_logo_width;
    }
    ?>

	img.footer-logo {
		width: <?php echo $foot_logo_width; ?>px;
	}

    <?php

    $css = ob_get_clean();
    return $css;
}

add_action( 'wp_enqueue_scripts', 'awesome_add_theme_css' );