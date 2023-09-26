<?php
/**
* Template Name: Flex
*/

get_header();
// container
$container = '-lg';
?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();
        
        if ( get_the_content() ) :
            echo '<div class="container' . $container . '">';

                get_template_part( 'template-parts/content', 'page' );

            echo '</div>';
        endif;

    endwhile; // End of the loop.

    get_template_part('template-parts/loops/flexible', 'content');
    ?>
</main> <!-- #main -->

<?php
get_footer();