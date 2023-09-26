<?php
$toggle         = 'offcanvas';
$toggle         = 'collapse';
$aria_expanded  = '';
$aria_expanded  = ' aria-expanded="false" ';
$aria_label     = ' aria-label="Toggle navigation"';

echo '<button class="navbar-toggler border-0" type="button" data-bs-toggle="' . $toggle . '" data-bs-target="#primaryNavbar" aria-controls="primaryNavbar"' . $aria_expanded . '' . $aria_label . '><i class="bi bi-three-dots"></i></button>';
?>