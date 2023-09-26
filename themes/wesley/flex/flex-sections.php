<?php
//General Content
if ( get_row_layout() == 'general_content_section' ) :
    get_template_part('flex/general', 'content');

//Press
elseif ( get_row_layout() == 'press_section' ) :
    get_template_part('flex/press');

//Podcast
elseif ( get_row_layout() == 'podcast_section' ) :
    get_template_part('flex/podcast');

//Featured Feed
elseif ( get_row_layout() == 'featured_feed_section' ) :
    get_template_part('flex/featured', 'feed');

//Social Media
elseif ( get_row_layout() == 'social_media_section' ) :
    get_template_part('flex/social', 'media');

//Text/Media
elseif ( get_row_layout() == 'text_media_section' ) :
    get_template_part('flex/text', 'media');

//Gallery
elseif ( get_row_layout() == 'gallery_section' ) :
    get_template_part('flex/gallery');

//Post Feed
elseif ( get_row_layout() == 'post_feed_section' ) :
    get_template_part('flex/post', 'feed');

endif;
?>