<?php
$dots_html = '<div class="awesome-dots position-relative d-inline-flex align-items-center"></div>';
$arrow_prev = '<a class="awesome-arrow slick-arrow-prev"><i class="fa-regular fa-angle-left fa-2xl"></i></a>';
$arrow_next = '<a class="awesome-arrow slick-arrow-next"><i class="fa-regular fa-angle-right fa-2xl"></i></a>';

echo '<div class="carousel-controls-wrap col-md-6 mx-auto d-flex align-items-center justify-content-center">';
    echo $arrow_prev;
        echo $dots_html;
    echo $arrow_next;
echo '</div>';
?>