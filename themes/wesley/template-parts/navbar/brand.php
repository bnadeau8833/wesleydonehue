<?php
echo '<div class="navbar-brand">';
    the_custom_logo();

    if ( is_front_page() && is_home() ) :
        ?>
        <h1 class="site-title h4 mb-0"><a class="text-decoration-none" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php
    else :
        ?>
        <p class="site-title h4 mb-0"><a class="text-decoration-none" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php
    endif;

    $wesley_description = get_bloginfo( 'description', 'display' );
    
    if ( $wesley_description || is_customize_preview() ) :
        ?>
        <p class="site-description mb-0 small"><?php echo $wesley_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
    <?php endif;
echo '</div><!-- .navbar-brand -->';
?>