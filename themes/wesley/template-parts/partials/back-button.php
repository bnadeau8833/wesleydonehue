<?php
$the_post_type = get_post_type();
$awesome_post_object = get_post_type_object( get_post_type($post) );
$post_type = get_queried_object();
$link = get_post_type_archive_link( $the_post_type );
$back_btn_text = 'View All ' . $awesome_post_object->label . '';

$hide_back_button = '';
$override_back_button = get_field('override_back_button', 'options');

if ( 'post' === get_post_type()) {
    $hide_back_button = get_field('hide_back_button', 'options');

    if ( $override_back_button ) {
        $link_type = $override_back_button['link_type'];
        $page_link = $override_back_button['page_link'];
        $category = $override_back_button['category'];
        $override_btn_text = $override_back_button['override_btn_text'];
    
        if ( 'page' === $link_type && $page_link  ) {
            $link = $page_link;
        }

        if ( 'category' === $link_type && $category  ) {
            $link = esc_url( get_term_link( $category ) );
        }

        if ( $override_btn_text ) {
            $back_btn_text = $override_btn_text;
        }
    }
} else {
    $hide_back_button = get_field('hide_back_button', 'options2_' . $the_post_type . '');

    $override_back_button = get_field('override_back_button', 'options2_' . $the_post_type . '');

    if ( $override_back_button ) {
        $link_type = $override_back_button['link_type'];
        $page_link = $override_back_button['page_link'];
        $category = $override_back_button['category'];
        $override_btn_text = $override_back_button['override_btn_text'];

        if ( 'page' === $link_type && $page_link  ) {
            $link = $page_link;
        }

        if ( 'category' === $link_type && $category  ) {
            $link = esc_url( get_term_link( $category ) );
        }

        if ( $override_btn_text ) {
            $back_btn_text = $override_btn_text;
        }
    }
}

if ( $hide_back_button ) {
	return;
}

$icon = '<i class="fas fa-chevron-left"></i> ';
$icon = '';
?>

<div class="back-button-wrap py-2 text-center">
    <a class="btn-back btn btn-lg btn-primary" href="<?php echo $link; ?>"><?php echo $icon; ?><?php echo $back_btn_text; ?></a>
</div>
