<?php
$stars = get_field('stars');

switch ($stars) {
    case '1':
        $star_rating = '<i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-gray pe-1"></i><i class="bi bi-star-fill text-gray pe-1"></i><i class="bi bi-star-fill text-gray pe-1"></i><i class="bi bi-star-fill text-gray pe-1"></i>';
        break;

    case '2':
        $star_rating = '<i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-gray pe-1"></i><i class="bi bi-star-fill text-gray pe-1"></i><i class="bi bi-star-fill text-gray pe-1"></i>';
        break;

    case '3':
        $star_rating = '<i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-gray pe-1"></i><i class="bi bi-star-fill text-gray pe-1"></i>';
        break;

    case '4':
        $star_rating = '<i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-gray pe-1"></i>';
        break;

    case '5':
        $star_rating = '<i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-primary pe-1"></i><i class="bi bi-star-fill text-primary pe-1"></i>';
        break;

    default:
        $star_rating = '';
        break;
}

if ( $stars ) {
    echo '<div class="stars-wrap text-grey pb-1">' . $star_rating . '</div>';
}
?>