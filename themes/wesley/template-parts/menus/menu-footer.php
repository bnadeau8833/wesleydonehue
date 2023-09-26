<?php
wp_nav_menu(
  array(
    'theme_location' => 'menu-footer',
    'container'      => false,
    'menu_class'     => 'menu-footer nav text-center d-flex justify-content-around border-bottom border-dark ms-0',
    'fallback_cb'    => '__return_false',
    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'          => 2,
    'walker'         => new WP_Bootstrap_Navwalker()
  )
);
?>