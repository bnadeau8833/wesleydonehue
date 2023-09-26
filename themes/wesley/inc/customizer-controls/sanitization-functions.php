<?php
/**
 * Sanitization Functions
 *
 * @package Awesome FYI
 * 
 */

function awesome_sanitize_hex_color( $color ) {
    if ( '' === $color ) {
        return '';
    }

    // 3 or 6 hex digits, or the empty string.
    if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
        return $color;
    }

    return NULL;
}

/**
 * Sanitize the Multiple checkbox values.
 *
 * @param string $values Values.
 * @return array Checked values.
 */
function awesome_sanitize_multiple_checkbox( $values ) {

    $multi_values = ! is_array( $values ) ? explode( ',', $values ) : $values;

    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}


function awesome_sanitize_text( $input ) {
    $allowed_html = array(
        'br'     => array(),
        'strong' => array(),
        'em'     => array(),
    );
    return wp_kses( $input, $allowed_html );
}

function awesome_sanitize_url( $url ) {
    return esc_url_raw( $url );
}

function awesome_sanitize_category( $input ){
    $output = intval( $input );
    return $output;
}

function awesome_sanitize_number( $number, $setting ) {
    // Ensure $number is an absolute integer (whole number, zero or greater).
    $number = absint( $number );

    // If the input is an absolute integer, return it; otherwise, return the default
    return ( $number ? $number : $setting->default );
}

function awesome_sanitize_dropdown_pages( $page_id, $setting ) {
    // Ensure $input is an absolute integer.
    $page_id = absint( $page_id );

    // If $page_id is an ID of a published page, return it; otherwise, return the default.
    return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

//checkbox sanitization function
function awesome_sanitize_checkbox( $input ) {
    //returns true if checkbox is checked
    return ( ( isset( $input ) && true == $input ) ? true : false );
}

//file input sanitization function
function awesome_sanitize_image( $file, $setting ) {
 
    //allowed file types
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png'
    );
     
    //check file type from file name
    $file_ext = wp_check_filetype( $file, $mimes );
     
    //if file has a valid mime type return it, otherwise return default
    return ( $file_ext['ext'] ? $file : $setting->default );
}

function awesome_sanitize_select( $input, $setting ) {
    // Ensure input is a slug.
    $input = sanitize_key( $input );

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function awesome_sanitize_choices( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    }
    else {
        return $setting->default;
    }
}

function awesome_sanitize_google_fonts( $input, $setting ) {
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function awesome_sanitize_array( $value ){
    if ( is_array( $value ) ) {
        foreach ( $value as $key => $subvalue ) {
            $value[ $key ] = esc_attr( $subvalue );
        }
        return $value;
    }
    return esc_attr( $value );
}
