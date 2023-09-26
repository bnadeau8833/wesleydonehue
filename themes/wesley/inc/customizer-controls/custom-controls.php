<?php
/**
 * Register Custom Controls
 */
if ( ! function_exists( 'awesome_register_custom_controls' ) ) :

    function awesome_register_custom_controls( $wp_customize ) {
        // Load our custom control.
        require_once get_template_directory() . '/inc/customizer-controls/range/class-range-control.php';
        require_once get_template_directory() . '/inc/customizer-controls/toggle/class-toggle-control.php';
        require_once get_template_directory() . '/inc/customizer-controls/radioimg/class-radio-image-control.php';
        require_once get_template_directory() . '/inc/customizer-controls/multicheck/class-multi-check-control.php';

        // Register the control type.
        $wp_customize->register_control_type( 'Customizer_Range_Value_Control' );
        $wp_customize->register_control_type( 'Customizer_Toggle_Control' );
        $wp_customize->register_control_type( 'Customizer_Radio_Image_Control' );
        $wp_customize->register_control_type( 'Customizer_Multi_Check_Control' );
    }

endif;

add_action( 'customize_register', 'awesome_register_custom_controls' );