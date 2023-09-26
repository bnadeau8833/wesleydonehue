<?php
$section_label = get_sub_field('section_label');

//group field that flex sections clone
$section_settings = get_sub_field('section_settings');

//Text color
$section_text_color = $section_settings['theme_brand_colors'];
$text_color = '';
if ( $section_text_color ) {
    $text_color = ' text-' . $section_text_color . '';
}

//Container select field with bootstrap options
$section_container = $section_settings['container'];
$container = 'container-xl';

if ( $section_container ) {
  $container = 'container-' . $section_container . '';
}

if ( 'xs' === $section_container ) {
    $container = 'container';
}

if ( 'fluid' === $section_container ) {
    $container = 'overflow-hidden';
}

//Content width (change bootstrap column classes)
$section_content_width = $section_settings['content_width'];
$content_width = '';
if ( $section_content_width ) {
  $content_width = '-' . $section_content_width . '';
}

//Padding (group field)
$padding = '';
$section_padding = $section_settings['padding'];
if ( $section_padding ) {
    $top = $section_padding['top'];
    $bottom = $section_padding['bottom'];

    $padding_top = '';
    if ( $top ) {
        $padding_top = 'padding-top: ' . $top . 'rem;';
    }
    $padding_bottom = '';
    if ( $bottom ) {
        $padding_bottom = ' padding-bottom: ' . $bottom . 'rem;';
    }
    $padding = '' . $padding_top . '' . $padding_bottom . '';
}

//Margin (group field)
$margin = '';
$section_margin = $section_settings['margin'];
if ( $section_margin ) {
    $top = $section_margin['top'];
    $bottom = $section_margin['bottom'];

    $margin_top = '';
    if ( $top ) {
        $margin_top = 'margin-top: ' . $top . 'rem;';
    }
    $margin_bottom = '';
    if ( $bottom ) {
        $margin_bottom = ' margin-bottom: ' . $bottom . 'rem;';
    }
    $margin = '' . $margin_top . '' . $margin_bottom . '';
}

//Background (group field)
$section_bg = $section_settings['background'];
$has_bg = '';

//Color
$color_type         = $section_bg['color_type'];
$color_picker       = $section_bg['color_picker'];
$brand_colors       = $section_bg['theme_brand_colors'];
$background_color   = '';
$color_style        = '';
if ( 'theme' === $color_type && $brand_colors ) {
    $background_color = ' bg-' . $brand_colors . '';
}

if ( 'picker' === $color_type && $color_picker ) {
    $color_style = ' background-color: ' . $color_picker . '';
}

$image              = '';
$bg_image           = '';
$background_styles  = '';

//Image
$background_image = $section_bg['background_image'];

if ( $background_image ) {
    $image = $background_image;
}

if ( 'picker' === $color_type && $color_picker || $brand_colors || $background_image ) {
    $has_bg = ' has-bg';
}

if ( $image ) {
    $bg_image = 'background-image:url(' . $image . '); background-size: cover; background-position: center center; ';
}

if ( $bg_image || $padding || $margin || $padding || $color_style ) {
    $background_styles = ' style="' . $bg_image . '' . $padding . '' . $margin . '' . $color_style . '"';
}

echo '<div class="container-wrap overflow-hidden' . $background_color . '' . $has_bg . '' . $text_color . '"' . $background_styles . '>';
    echo '<div class="' . $container . ' section-wrap">';
        echo '<div class="row justify-content-center">';
            echo '<div class="col-md' . $content_width . '">';
            ?>