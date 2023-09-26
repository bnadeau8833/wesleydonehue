<?php
wp_nav_menu(
  array(
    'theme_location' => 'menu-primary',
    'container'      => false,
    'menu_class'     => 'menu-primary navbar-nav ms-auto text-center mb-0 ms-0',
    'fallback_cb'    => '__return_false',
    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'          => 2,
    'walker'         => new WP_Bootstrap_Navwalker()
  )
);
?>