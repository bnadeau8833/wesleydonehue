<?php
$title = get_the_title();
$link = get_the_permalink();
$content = get_the_content();
$excerpt = get_the_excerpt();
// $twitter_message = get_field('twitter_message');
$app_id = get_sub_field('facebook_app_id', 'option');

if ( is_home() ) {
    $title = single_post_title( '', false );
}

if ( is_archive() ) {
    $title = get_the_archive_title( '', false );
}

$hide_social_share = get_field('hide_social_share', 'option');
$social_share_title = get_field('social_share_title', 'option');

$animate_fade_up = ' data-aos="fade-up"';

if ( !$hide_social_share ) :

    echo '<div class="text-center d-flex flex-column justify-content-center pt-5"' . $animate_fade_up . '>';
        if ( $social_share_title ) {
            echo '<h3 class="text-secondary h4">' . $social_share_title . '</h3>';
        }
        ?>

        <ul class="list-inline fs-4 social a2a_kit a2a_kit_size_32 a2a_default_style share-btn-wrapper mb-0 ms-0" data-a2a-title="<?php echo $title; ?>" data-a2a-url="<?php echo $link; ?>">
            <li class="list-inline-item"><a class="btn-share a2a_button_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li class="list-inline-item"><a class="btn-share a2a_button_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li class="list-inline-item"><a class="btn-share a2a_dd" href="https://www.addtoany.com/share"><i class="fa fa-plus-square" aria-hidden="true"></i></a></li>
        </ul>

        <?php
    echo '</div>';
endif;
?>

<script>
var a2a_config = a2a_config || {};
a2a_config.templates = a2a_config.templates || {};

a2a_config.templates.twitter = {
    text: "${title} - <?php echo $twitter_message ?> ${link}"
};

a2a_config.templates.facebook = {
    app_id: "<?php echo $app_id ?>"
};

a2a_config.templates.email = {
    subject: "Check this out: ${title}",
    body: "Click the link:\n${link}",
};
</script>