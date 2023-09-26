<?php
$direction = '';
$nav_extras = '';
$nav_type = 'collapse navbar-collapse';

echo '<nav class="navbar navbar-light navbar-expand-lg">';
  echo '<div class="container-lg border-bottom border-dark pt-2 pb-3">';
    get_template_part('template-parts/navbar/brand');

    if ( has_nav_menu( 'menu-primary' ) ) :
      get_template_part('template-parts/navbar/toggler');

      echo '<div class="' . $nav_type . '' . $direction . '" id="primaryNavbar"' . $nav_extras . '>';
          get_template_part('template-parts/menus/menu', 'primary');
      echo '</div>';
    endif;
  echo '</div><!-- .container -->';
echo '</nav>';
?>