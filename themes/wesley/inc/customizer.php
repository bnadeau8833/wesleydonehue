<?php
/**
 * Wesley Donehue Theme Customizer
 *
 * @package Wesley_Donehue
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

require_once get_template_directory() . '/inc/customizer-controls/sanitization-functions.php';
require_once get_template_directory() . '/inc/customizer-controls/custom-controls.php';

function wesley_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('colors');

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'wesley_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'wesley_customize_partial_blogdescription',
			)
		);
	}

	//Nav logo width
	$wp_customize->add_setting( 'awesome_nav_logo_width', array(
		'default'           => get_theme_mod( 'awesome_nav_logo_width', '200' ),
		'panel'             => 'customizer_branding_panel',
		'sanitize_callback' => 'awesome_sanitize_number',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'awesome_nav_logo_width', array(
		'type'     => 'range-value',
		'section'  => 'title_tagline',
		'priority' => 8,
		'settings' => 'awesome_nav_logo_width',
		'label'    => __( 'Logo Width (pixels)' ),
		'input_attrs' => array(
			'min'    => 0,
			'max'    => 400,
			'step'   => 1,
			'suffix' => 'px',
		),
	) ) );

	/* Header
	--------------------------------------------- */
	$wp_customize->add_section(
		'awesome_header_settings', 
		array(
			'priority'	=> 22,
			'title'		=> __( 'Header/Nav', 'wesley' ),
		) 
	);

	// Navbar Collapse
	$wp_customize->add_setting(
		'awesome_navbar_breakpoint',
		array(
			'capability'	=> 'edit_theme_options',
			'default'		=> 'lg',
		)
	);

	$wp_customize->add_control(
		'awesome_navbar_breakpoint',
		array(
			'type'     => 'select',
			'section'  => 'awesome_header_settings',
			'label'    => __( 'When menu collapses' ),
			'sanitize_callback' => 'awesome_sanitize_select',
			'choices'  => array(
				'never'  => __( 'Never' ),
				'sm'     => __( 'SM (576px)' ),
				'md'     => __( 'MD (768px)' ),
				'lg'     => __( 'LG (992px)' ),
				'xl'     => __( 'XL (1200px)' ),
				'xxl'    => __( 'XXL (1400px)' ),
				'always' => __( 'Always' ),
			),
		)
	);

	// Navbar Container Fluid
	$wp_customize->add_setting( 'awesome_navbar_container_fluid', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_navbar_container_fluid', array(
		'label'		=> esc_html__( 'Container full width','wesley' ),
		'section'	=> 'awesome_header_settings',
		'settings'	=> 'awesome_navbar_container_fluid',
		'type'		=> 'toggle',
	) ) );

	// Mobile nav background color
	$wp_customize->add_setting(
		'awesome_navbar_bg_color_mobile',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'awesome_sanitize_select',
			'default'           => 'white',
		)
	);

	$wp_customize->add_control(
		'awesome_navbar_bg_color_mobile',

		array(
			'type'    => 'select',
			'section' => 'awesome_header_settings',
			'label'   => __( 'Mobile BG color' ),
			'choices' => array(
				'primary'     => __( 'Navy' ),
				'secondary'   => __( 'Light Blue' ),
				'dark'        => __( 'Black' ),
				'light'       => __( 'Grey' ),
				'white'       => __( 'White' ),
			),
		)
	);

	/* Cards
	--------------------------------------------- */
	$wp_customize->add_panel(
		'awesome_card_settings', 
		array(
			'priority'	=> 22,
			'title'		=> __( 'Cards', 'wesley' ),
		) 
	);

	//Post Cards
	$wp_customize->add_section(
		'awesome_post_card_settings',
		array(
			'title'    => __( 'Post', 'challenger3' ),
			'priority' => 20,
			'panel'    => 'awesome_card_settings'
		)
	);

	//Post Hide Date
	$wp_customize->add_setting( 'awesome_post_hide_date', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_post_hide_date', array(
		'label'		=> esc_html__( 'Hide Date','wesley' ),
		'section'	=> 'awesome_post_card_settings',
		'settings'	=> 'awesome_post_hide_date',
		'type'		=> 'toggle',
	) ) );

	//Post Hide Author
	$wp_customize->add_setting( 'awesome_post_hide_author', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_post_hide_author', array(
		'label'		=> esc_html__( 'Hide Author','wesley' ),
		'section'	=> 'awesome_post_card_settings',
		'settings'	=> 'awesome_post_hide_author',
		'type'		=> 'toggle',
	) ) );

	//Post Hide Taxonomies
	$wp_customize->add_setting( 'awesome_post_hide_taxonomies', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_post_hide_taxonomies', array(
		'label'		=> esc_html__( 'Hide Taxonomies','wesley' ),
		'section'	=> 'awesome_post_card_settings',
		'settings'	=> 'awesome_post_hide_taxonomies',
		'type'		=> 'toggle',
	) ) );

	//Post Hide Excerpt
	$wp_customize->add_setting( 'awesome_hide_post_excerpt', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_hide_post_excerpt', array(
		'label'		=> esc_html__( 'Hide Excerpt','wesley' ),
		'section'	=> 'awesome_post_card_settings',
		'settings'	=> 'awesome_hide_post_excerpt',
		'type'		=> 'toggle',
	) ) );

	//Post Excerpt Length
	$wp_customize->add_setting(
		'awesome_post_excerpt_length',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => '20',
			'sanitize_callback' => 'awesome_sanitize_number',
		)
	);

	$wp_customize->add_control(
		'awesome_post_excerpt_length',
		array(
			'type'        => 'number',
			'section'     => 'awesome_post_card_settings',
			'label'       => __( 'Post Excerpt Length' ),
			'input_attrs' => array(
				'min' => 1,
				'max' => 200
			)
		)
	);

	//Book Reviews Cards
	$wp_customize->add_section(
		'awesome_book_review_card_settings',
		array(
			'title'    => __( 'Books', 'challenger3' ),
			'priority' => 20,
			'panel'    => 'awesome_card_settings'
		)
	);

	//Hide Book Rating
	$wp_customize->add_setting( 'awesome_hide_book_rating', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_hide_book_rating', array(
		'label'		=> esc_html__( 'Hide Star Rating','wesley' ),
		'section'	=> 'awesome_book_review_card_settings',
		'settings'	=> 'awesome_hide_book_rating',
		'type'		=> 'toggle',
	) ) );

	//Hide Book Author
	$wp_customize->add_setting( 'awesome_hide_book_author', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_hide_book_author', array(
		'label'		=> esc_html__( 'Hide Book Author','wesley' ),
		'section'	=> 'awesome_book_review_card_settings',
		'settings'	=> 'awesome_hide_book_author',
		'type'		=> 'toggle',
	) ) );

	//Hide Book Recommendation
	$wp_customize->add_setting( 'awesome_hide_book_recommendation', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_hide_book_recommendation', array(
		'label'		=> esc_html__( 'Hide Recommendation','wesley' ),
		'section'	=> 'awesome_book_review_card_settings',
		'settings'	=> 'awesome_hide_book_recommendation',
		'type'		=> 'toggle',
	) ) );

	//Hide Book Excerpt
	$wp_customize->add_setting( 'awesome_hide_book_excerpt', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_hide_book_excerpt', array(
		'label'		=> esc_html__( 'Hide Book Excerpt','wesley' ),
		'section'	=> 'awesome_book_review_card_settings',
		'settings'	=> 'awesome_hide_book_excerpt',
		'type'		=> 'toggle',
	) ) );
	
	//Book Excerpt Length
	$wp_customize->add_setting(
		'awesome_book_excerpt_length',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => '20',
			'sanitize_callback' => 'awesome_sanitize_number',
		)
	);

	$wp_customize->add_control(
		'awesome_book_excerpt_length',
		array(
			'type'        => 'number',
			'section'     => 'awesome_book_review_card_settings',
			'label'       => __( 'Book Review Excerpt Length' ),
			'input_attrs' => array(
				'min' => 1,
				'max' => 200
			)
		)
	);

	//Podcast Episode Cards
	$wp_customize->add_section(
		'awesome_podcast_card_settings',
		array(
			'title'    => __( 'Podcast', 'challenger3' ),
			'priority' => 20,
			'panel'    => 'awesome_card_settings'
		)
	);

	//Hide Podcast Listen Now
	$wp_customize->add_setting( 'awesome_hide_episode_listen', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_hide_episode_listen', array(
		'label'		=> esc_html__( 'Hide Episode Listen Links','wesley' ),
		'section'	=> 'awesome_podcast_card_settings',
		'settings'	=> 'awesome_hide_episode_listen',
		'type'		=> 'toggle',
	) ) );

	//Hide Episode Number
	$wp_customize->add_setting( 'awesome_hide_episode_number', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_hide_episode_number', array(
		'label'		=> esc_html__( 'Hide Episode Number','wesley' ),
		'section'	=> 'awesome_podcast_card_settings',
		'settings'	=> 'awesome_hide_episode_number',
		'type'		=> 'toggle',
	) ) );

	//Hide Podcast Taxonomies
	$wp_customize->add_setting( 'awesome_hide_episode_taxonomies', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_hide_episode_taxonomies', array(
		'label'		=> esc_html__( 'Hide Episode Taxonomies','wesley' ),
		'section'	=> 'awesome_podcast_card_settings',
		'settings'	=> 'awesome_hide_episode_taxonomies',
		'type'		=> 'toggle',
	) ) );

	//Hide Podcast Excerpt
	$wp_customize->add_setting( 'awesome_hide_episode_excerpt', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_hide_episode_excerpt', array(
		'label'		=> esc_html__( 'Hide Episode Excerpt','wesley' ),
		'section'	=> 'awesome_podcast_card_settings',
		'settings'	=> 'awesome_hide_episode_excerpt',
		'type'		=> 'toggle',
	) ) );

	//Podcast Excerpt Length
	$wp_customize->add_setting(
		'awesome_episode_excerpt_length',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => '20',
			'sanitize_callback' => 'awesome_sanitize_number',
		)
	);

	$wp_customize->add_control(
		'awesome_episode_excerpt_length',
		array(
			'type'        => 'number',
			'section'     => 'awesome_podcast_card_settings',
			'label'       => __( 'Episode Excerpt Length' ),
			'input_attrs' => array(
				'min' => 1,
				'max' => 200
			)
		)
	);


	/* Footer
	--------------------------------------------- */
	$wp_customize->add_section(
		'awesome_footer',
		array(
			'title'       => __('Footer', 'wesley'),
			'description' => '',
			'priority'    => 40,
		)
	);

	// Footer logo
	$wp_customize->add_setting('awesome_footer_logo');

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'awesome_footer_logo',
			array(
				'label'    => 'Footer Logo',
				'section'  => 'awesome_footer',
				'settings' => 'awesome_footer_logo',
			)
		)
	);

	//Footer logo width
	$wp_customize->add_setting( 'awesome_footer_logo_width', array(
		'default'           => get_theme_mod( 'awesome_footer_logo_width', '225' ),
		'panel'             => 'customizer_branding_panel',
		'sanitize_callback' => 'awesome_sanitize_number',
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( new Customizer_Range_Value_Control( $wp_customize, 'awesome_footer_logo_width', array(
		'type'     => 'range-value',
		'section'  => 'awesome_footer',
		'settings' => 'awesome_footer_logo_width',
		'label'    => __( 'Logo Width (pixels)' ),
		'input_attrs' => array(
			'min'    => 0,
			'max'    => 400,
			'step'   => 1,
			'suffix' => 'px',
		),
	) ) );

	// Footer Form Title
	$wp_customize->add_setting(
		'awesome_footer_form_title',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => '',
			'sanitize_callback' => 'awesome_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'awesome_footer_form_title',
		array(
			'type'    => 'text',
			'section' => 'awesome_footer',
			'label'   => __( 'Form Title' ),
		)
	);

	// Footer Form ID
	$wp_customize->add_setting(
		'awesome_footer_form_id',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => '',
			'sanitize_callback' => 'awesome_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'awesome_footer_form_id',
		array(
			'type'    => 'text',
			'section' => 'awesome_footer',
			'label'   => __( 'Form ID' ),
		)
	);


	// Hide Site Info
	$wp_customize->add_setting( 'awesome_hide_site_title', array(
		'sanitize_callback'	=> 'awesome_sanitize_checkbox',
		'default'			=> false
	) );

	$wp_customize->add_control( new Customizer_Toggle_Control( $wp_customize, 'awesome_hide_site_title', array(
		'label'		=> esc_html__( 'Hide site title/year','wesley' ),
		'section'	=> 'awesome_footer',
		'settings'	=> 'awesome_hide_site_title',
		'type'		=> 'toggle',
	) ) );
}
add_action( 'customize_register', 'wesley_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wesley_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wesley_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wesley_customize_preview_js() {
	wp_enqueue_script( 'wesley-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'wesley_customize_preview_js' );
