<?php
$home_id = get_option( 'page_for_posts' );

//Index template flexible content
if ( is_home() && have_rows( 'flexible_content_sections', $home_id ) ) {
    echo '<div class="flex-sections-wrap">';
        // loop through all the rows of flexible content
        while ( have_rows( 'flexible_content_sections', $home_id ) ) : the_row();
            get_template_part( 'flex/flex', 'sections' );
        endwhile; // close the loop of flexible content
    echo '</div>';
}

if ( is_archive() ) {
    //Archive templates flexible content
    $post_type = get_queried_object();
    $post_type_slug = $post_type->rewrite['slug'];
    $underline_slug = str_replace('-', '_', ($post_type_slug));

    if ( have_rows( 'flexible_content_sections', 'options2_' . $underline_slug . '' ) ) {
        echo '<div class="flex-sections-wrap">';
            while ( have_rows( 'flexible_content_sections', 'options2_' . $underline_slug . '' ) ) : the_row();
                get_template_part( 'flex/flex', 'sections' );
            endwhile;
        echo '</div>';
    }
}

if ( have_rows('flexible_content_sections') ) {
    echo '<div class="flex-sections-wrap">';
        while ( have_rows('flexible_content_sections') ) : the_row();
            get_template_part('flex/flex', 'sections');
        endwhile;
    echo '</div>';
}
?>