<?php
if ( have_rows('flexible_content_sections', 'option') ) {
    echo '<div class="footer-flex flex-sections-wrap">';
        while ( have_rows('flexible_content_sections', 'option') ) : the_row();
            get_template_part('flex/flex', 'sections');
        endwhile;
    echo '</div>';
}
?>