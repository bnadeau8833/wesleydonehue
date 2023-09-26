<?php
$id = get_the_id();
$book_number = get_field('book_number');

if ( $book_number ) {
    echo '<span class="book-number font-header h3 text-secondary">Book #' . $book_number . '</span>';
}
?>