<?php

use SmashBalloon\YouTubeFeed\Pro\SBY_Parse_Pro;
use SmashBalloon\YouTubeFeed\Pro\SBY_Settings_Pro;
use SmashBalloon\YouTubeFeed\SBY_Parse;
use SmashBalloon\YouTubeFeed\SBY_Display_Elements;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function sby_json_encode( $thing ) {
	if ( function_exists( 'wp_json_encode' ) ) {
		return wp_json_encode( $thing );
	} else {
		return json_encode( $thing );
	}
}

function sby_clear_cache() {
	//Delete all transients
	global $wpdb;
	$table_name = $wpdb->prefix . "options";
	$wpdb->query( "
        DELETE
        FROM $table_name
        WHERE `option_name` LIKE ('%\_transient\_sby\_%')
        " );
	$wpdb->query( "
        DELETE
        FROM $table_name
        WHERE `option_name` LIKE ('%\_transient\_timeout\_sby\_%')
        " );
	$wpdb->query( "
        DELETE
        FROM $table_name
        WHERE `option_name` LIKE ('%\_transient\_&sby\_%')
        " );
	$wpdb->query( "
        DELETE
        FROM $table_name
        WHERE `option_name` LIKE ('%\_transient\_timeout\_&sby\_%')
        " );
	$wpdb->query( "
        DELETE
        FROM $table_name
        WHERE `option_name` LIKE ('%\_transient\_\$sby\_%')
        " );
	$wpdb->query( "
        DELETE
        FROM $table_name
        WHERE `option_name` LIKE ('%\_transient\_timeout\_\$sby\_%')
        " );

	sby_clear_page_caches();
}
add_action( 'sby_settings_after_configure_save', 'sby_clear_cache' );

/**
 * When certain events occur, page caches need to
 * clear or errors occur or changes will not be seen
 */
function sby_clear_page_caches() {
	if ( isset( $GLOBALS['wp_fastest_cache'] ) && method_exists( $GLOBALS['wp_fastest_cache'], 'deleteCache' ) ){
		/* Clear WP fastest cache*/
		$GLOBALS['wp_fastest_cache']->deleteCache();
	}

	if ( function_exists( 'wp_cache_clear_cache' ) ) {
		wp_cache_clear_cache();
	}

	if ( class_exists('W3_Plugin_TotalCacheAdmin') ) {
		$plugin_totalcacheadmin = & w3_instance('W3_Plugin_TotalCacheAdmin');

		$plugin_totalcacheadmin->flush_all();
	}

	if ( function_exists( 'rocket_clean_domain' ) ) {
		rocket_clean_domain();
	}

	if ( class_exists( 'autoptimizeCache' ) ) {
		/* Clear autoptimize */
		autoptimizeCache::clearall();
	}
}



function sby_update_or_connect_account( $args ) {
	global $sby_settings;
	$account_id = $args['channel_id'];
	$sby_settings['connected_accounts'][ $account_id ] = array(
		'access_token' => $args['access_token'],
		'refresh_token' => $args['refresh_token'],
		'channel_id' => $args['channel_id'],
		'username' => $args['username'],
		'is_valid' => true,
		'last_checked' => time(),
		'profile_picture' => $args['profile_picture'],
		'privacy' => $args['privacy'],
		'expires' => $args['expires']
	);

	update_option( 'sby_settings', $sby_settings );

	return $sby_settings['connected_accounts'][ $account_id ];
}

function sby_get_first_connected_account() {
	global $sby_settings;
	$an_account = array();

	if ( ! empty( $sby_settings['api_key'] ) ) {
		$an_account = array(
			'access_token' => '',
			'refresh_token' => '',
			'channel_id' => '',
			'username' => '',
			'is_valid' => true,
			'last_checked' => '',
			'profile_picture' => '',
			'privacy' => '',
			'expires' => '2574196927',
			'api_key' => $sby_settings['api_key']
		);
	} else {
		$connected_accounts = $sby_settings['connected_accounts'];
		foreach ( $connected_accounts as $account ) {
			if ( empty( $an_account ) ) {
				$an_account = $account;
			}
		}
	}

	if ( empty( $an_account ) ) {
		$an_account = array( 'rss_only' => true );
	}

	return $an_account;
}

function sby_get_feed_template_part( $part, $settings = array() ) {
	$file = '';

	$using_custom_templates_in_theme = apply_filters( 'sby_use_theme_templates', $settings['customtemplates'] );
	$generic_path = trailingslashit( SBY_PLUGIN_DIR ) . 'templates/';

	if ( $using_custom_templates_in_theme ) {
		$custom_header_template = locate_template( 'sby/header.php', false, false );
		$custom_header_generic_template = locate_template( 'sby/header-generic.php', false, false );
		$custom_player_template = locate_template( 'sby/player.php', false, false );
		$custom_item_template = locate_template( 'sby/item.php', false, false );
		$custom_footer_template = locate_template( 'sby/footer.php', false, false );
		$custom_feed_template = locate_template( 'sby/feed.php', false, false );
		$custom_info_template = locate_template( 'sby/info.php', false, false );
		$custom_cta_template = locate_template( 'sby/cta.php', false, false );
		$custom_shortcode_template = locate_template( 'sby/shortcode-content.php', false, false );
		$form_template = locate_template( 'sby/form.php', false, false );
		$results_template = locate_template( 'sby/results.php', false, false );
		$result_template = locate_template( 'sby/result.php', false, false );
	} else {
		$custom_header_template = false;
		$custom_header_generic_template = false;
		$custom_player_template = false;
		$custom_item_template = false;
		$custom_footer_template = false;
		$custom_feed_template = false;
		$custom_info_template = false;
		$custom_cta_template = false;
		$custom_shortcode_template = false;
		$form_template = false;
		$results_template = false;
		$result_template = false;
	}

	if ( $part === 'header' ) {
		if ( isset( $settings['generic_header'] ) ) {
			if ( $custom_header_generic_template ) {
				$file = $custom_header_generic_template;
			} else {
				$file = $generic_path . 'header-generic.php';
			}
		} else {
			if ( $custom_header_template ) {
				$file = $custom_header_template;
			} else {
				$file = $generic_path . 'header.php';
			}
		}
	} elseif ( $part === 'header-text' ) {
		$file = $generic_path . 'header-text.php';
	} elseif ( $part === 'header-generic' ) {
		if ( $custom_header_generic_template ) {
			$file = $custom_header_generic_template;
		} else {
			$file = $generic_path . 'header-generic.php';
		}
	} elseif ( $part === 'player' ) {
		if ( $custom_player_template ) {
			$file = $custom_player_template;
		} else {
			$file = $generic_path . 'player.php';
		}
	} elseif ( $part === 'item' ) {
		if ( $custom_item_template ) {
			$file = $custom_item_template;
		} else {
			$file = $generic_path . 'item.php';
		}
	} elseif ( $part === 'footer' ) {
		if ( $custom_footer_template ) {
			$file = $custom_footer_template;
		} else {
			$file = $generic_path . 'footer.php';
		}
	} elseif ( $part === 'feed' ) {
		if ( $custom_feed_template ) {
			$file = $custom_feed_template;
		} else {
			$file = $generic_path . 'feed.php';
		}
	} elseif ( $part === 'info' ) {
		if ( $custom_info_template ) {
			$file = $custom_info_template;
		} else {
			$file = $generic_path . 'info.php';
		}
	} elseif ( $part === 'cta' ) {
		if ( $custom_cta_template ) {
			$file = $custom_cta_template;
		} else {
			$file = $generic_path . 'cta.php';
		}
	} elseif ( $part === 'shortcode-content' ) {
		if ( $custom_shortcode_template ) {
			$file = $custom_shortcode_template;
		} else {
			$file = $generic_path . 'single/shortcode-content.php';
		}
	} elseif ( $part === 'form' ) {
		if ( $form_template ) {
			$file = $form_template;
		} else {
			$file = $generic_path . 'search/form.php';
		}
	} elseif ( $part === 'results' ) {
		if ( $results_template ) {
			$file = $results_template;
		} else {
			$file = $generic_path . 'search/results.php';
		}
	} elseif ( $part === 'result' ) {
		if ( $result_template ) {
			$file = $result_template;
		} else {
			$file = $generic_path . 'search/result.php';
		}
	}

	return $file;
}

/**
 * Get the settings in the database with defaults
 *
 * @return array
 */
function sby_get_database_settings() {
	global $sby_settings;

	$defaults = sby_settings_defaults();

	if ( $sby_settings === null ) {
		$sby_settings = get_option('sby_settings', []);
	}

	return array_merge( $defaults, $sby_settings );
}

function sby_get_channel_id_from_channel_name( $channel_name ) {
	$channel_ids = get_option( 'sby_channel_ids', array() );

	if ( isset( $channel_ids[ strtolower( $channel_name ) ] ) ) {
		return $channel_ids[ strtolower( $channel_name ) ];
	}

	return false;
}

function sby_set_channel_id_from_channel_name( $channel_name, $channel_id ) {
	$channel_ids = get_option( 'sby_channel_ids', array() );

	$channel_ids[ strtolower( $channel_name ) ] = $channel_id;

	update_option( 'sby_channel_ids', $channel_ids, false );
}

function sby_icon( $icon, $class = '' ) {
	$class = ! empty( $class ) ? ' ' . trim( $class ) : '';
	if ( $icon === SBY_SLUG ) {
		return '<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-youtube fa-w-18'.$class.'"><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" class=""></path></svg>';
	} else {
		return '<i aria-hidden="true" role="img" class="fab fa-youtube"></i>';
	}
}

/**
 * Print custom palette color styles for the front end
 * 
 * @since 2.0
 */
function sby_maybe_palette_styles( $feed_id, $posts, $settings ) {
	if ( sby_doing_customizer( $settings ) ) {
		return;
	}
	$feed_container = '#sb_youtube_' . esc_attr( preg_replace( "/[^A-Za-z0-9 ]/", '', $feed_id ) );

	$custom_palette_class = trim(SBY_Display_Elements::get_palette_class( $settings ));
	if ( SBY_Display_Elements::palette_type( $settings ) !== 'custom' ) {
	    return;
    }

	$feed_selector = '.' . $custom_palette_class;
	$header_selector = '.' . trim(SBY_Display_Elements::get_palette_class( $settings, '_header' ));
	$custom_colors = array(
		'bg1' => $settings['custombgcolor1'],
        'text1' => $settings['customtextcolor1'],
        'text2' => $settings['customtextcolor2'],
        'link1' => $settings['customlinkcolor1'],
        'button1' => $settings['custombuttoncolor1'],
        'button2' => $settings['custombuttoncolor2']
    );
	?>
	<style type="text/css">
	<?php if ( ! empty( $custom_colors['bg1'] ) ) : ?>
		<?php echo $feed_container ?>.sb_youtube.sby_palette_custom {
			background: <?php echo esc_html( $custom_colors['bg1'] ); ?>;
		}
    <?php endif; ?>
	<?php if ( ! empty( $custom_colors['text1'] ) ) : ?>
		<?php echo $feed_container ?>.sb_youtube.sby_palette_custom .sby_video_title{
			color: <?php echo esc_html( $custom_colors['text1'] ); ?>;
		}
    <?php endif; ?>
	<?php if ( ! empty( $custom_colors['text2'] ) ) : ?>
		<?php echo $feed_container ?>.sb_youtube.sby_palette_custom .sby_info .sby_meta{
			color: <?php echo esc_html( $custom_colors['text2'] ); ?>;
		}
    <?php endif; ?>
	<?php if ( ! empty( $custom_colors['link1'] ) ) : ?>
		<?php echo $feed_container ?>.sb_youtube.sby_palette_custom .sb_youtube_header .sby_header_text .sby_bio,
		<?php echo $feed_container ?>.sb_youtube.sby_palette_custom .sb_youtube_header .sby_header_text h3,
		<?php echo $feed_container ?>.sb_youtube.sby_palette_custom .sb_youtube_header .sby_header_text .sby_subscribers{
			color: <?php echo esc_html( $custom_colors['link1'] ); ?>;
		}
    <?php endif; ?>
	<?php if ( ! empty( $custom_colors['button1'] ) ) : ?>
		<?php echo $feed_container ?>.sb_youtube.sby_palette_custom .sby_follow_btn a {
			background: <?php echo esc_html( $custom_colors['button1'] ); ?>;
		}
    <?php endif; ?>
	<?php if ( ! empty( $custom_colors['button2'] ) ) : ?>
		<?php echo $feed_container ?>.sb_youtube.sby_palette_custom .sby_footer .sby_load_btn {
			background: <?php echo esc_html( $custom_colors['button2'] ); ?>;
		}
    <?php endif; ?>
    </style>
	<?php
}
add_action( 'sby_after_feed', 'sby_maybe_palette_styles', 1, 3 );

/**
 * Get feed styles to display on the feed front end
 * 
 * @since 2.0
 */
function sby_custom_feed_styles( $feed_id, $posts, $settings ) {
	$feed_selector = '#sb_youtube_' . esc_attr( preg_replace( "/[^A-Za-z0-9 ]/", '', $feed_id ) );
	if ( sby_doing_customizer( $settings ) ) {
		return;
	}
	
	echo '<style type="text/css">';

	if ( isset( $settings['buttonhovercolor'] ) && !empty( $settings['buttonhovercolor'] ) ) {
		echo $feed_selector . ' .sby_load_btn:hover { background: ' . $settings['buttonhovercolor'] . ' !important}';
	}
	if ( isset( $settings['customheadertextcolor'] ) && !empty( $settings['customheadertextcolor'] ) ) {
		echo $feed_selector . ' .sby-header-type-text { color: ' . $settings['customheadertextcolor'] . ' !important}';
	}
	if ( isset( $settings['descriptiontextsize'] ) && !empty( $settings['descriptiontextsize'] ) ) {
		echo $feed_selector . ' .sby_caption_wrap .sby_caption { font-size: ' . $settings['descriptiontextsize'] . ' !important}';
	}
	if ( isset( $settings['subscribehovercolor'] ) && !empty( $settings['subscribehovercolor'] ) ) {
		echo $feed_selector . ' .sby_follow_btn a:hover { box-shadow:inset 0 0 10px 20px ' . $settings['subscribehovercolor'] . ' !important}';
	}
	if ( isset( $settings['boxedbgcolor'] ) && !empty( $settings['boxedbgcolor'] ) ) {
		echo $feed_selector . '[data-videostyle=boxed] .sby_items_wrap .sby_item .sby_inner_item { background-color: ' . $settings['boxedbgcolor'] . ' !important}';
	}
	if ( isset( $settings['videocardstyle'] ) && $settings['videocardstyle'] == 'boxed' && ( isset( $settings['boxborderradius'] ) && !empty( $settings['boxborderradius'] ) ) ) {
		echo $feed_selector . '[data-videostyle=boxed] .sby_items_wrap .sby_item .sby_inner_item { border-radius: ' . $settings['boxborderradius'] . 'px!important}';
		echo $feed_selector . sprintf(' .sby_video_thumbnail { border-radius: %spx %spx 0 0 !important}', $settings['boxborderradius'], $settings['boxborderradius']);
	}
	if ( isset( $settings['videodescriptioncolor'] ) && !empty( $settings['videodescriptioncolor'] ) ) {
		echo $feed_selector . ' .sby_item_caption_wrap { color: ' . $settings['videodescriptioncolor'] . ' !important}';
	}

	echo '</style>';
}

add_action( 'sby_after_feed', 'sby_custom_feed_styles', 1, 3 );

/**
 * @param $a
 * @param $b
 *
 * @return false|int
 */
function sby_date_sort( $a, $b ) {
	$time_stamp_a = SBY_Parse::get_timestamp( $a );
	$time_stamp_b = SBY_Parse::get_timestamp( $b );

	if ( isset( $time_stamp_a ) ) {
		return $time_stamp_b - $time_stamp_a;
	} else {
		return rand ( -1, 1 );
	}
}

function sby_scheduled_start_sort( $a, $b ) {
	$time_stamp_a = SBY_Parse_Pro::get_actual_start_timestamp( $a );
	$time_stamp_b = SBY_Parse_Pro::get_actual_start_timestamp( $b );

	$flag_a = false;
	$flag_b = false;
	if ( empty( $time_stamp_a ) ) { // if hasn't started
		$time_stamp_a = SBY_Parse_Pro::get_scheduled_start_timestamp( $a );
		if ( ! empty( $time_stamp_a ) ) { // if it's still scheduled to play
			if ( $time_stamp_a > time() - 1 * DAY_IN_SECONDS ) { // if its isn't a day passed the scheduled stream time
				$time_stamp_a = $time_stamp_a + 30 * DAY_IN_SECONDS; // try to make it the first in line since it's upcoming
				$flag_a = true;
			}
		}
	} else { // has already started
		$actual_end_timestamp_a = SBY_Parse_Pro::get_actual_end_timestamp( $a ); // get the time it ended

		if ( $actual_end_timestamp_a === 0 ) { // started but hasn't ended! show it first, it's streaming now
			$time_stamp_a = $time_stamp_a + 1000 * DAY_IN_SECONDS;
		}
	}

	if ( empty( $time_stamp_b ) ) {
		$time_stamp_b = SBY_Parse_Pro::get_scheduled_start_timestamp( $b );
		if ( ! empty( $time_stamp_b ) ) {
			if ( $time_stamp_b > time() - 1 * DAY_IN_SECONDS ) {
				$time_stamp_b = $time_stamp_b + 30 * DAY_IN_SECONDS;
				$flag_b = true;
			}

		}
	} else {
		$actual_end_timestamp_b = SBY_Parse_Pro::get_actual_end_timestamp( $b );

		if ( $actual_end_timestamp_b === 0 ) {
			$time_stamp_b = $time_stamp_b + 1000 * DAY_IN_SECONDS;
		}
	}

	if ( empty( $time_stamp_a ) ) {
		$time_stamp_a = SBY_Parse_Pro::get_timestamp( $a );
	}
	if ( empty( $time_stamp_b ) ) {
		$time_stamp_b = SBY_Parse_Pro::get_timestamp( $b );
	}

	if ( $flag_a && $flag_b ) { //reverse the order if comparing two upcoming
		return $time_stamp_a - $time_stamp_b;
	}

	return $time_stamp_b - $time_stamp_a;
}

/**
 * @param $a
 * @param $b
 *
 * @return false|int
 */
function sby_rand_sort( $a, $b ) {
	return rand ( -1, 1 );
}

/**
 * Converts a hex code to RGB so opacity can be
 * applied more easily
 *
 * @param $hex
 *
 * @return string
 */
function sby_hextorgb( $hex ) {
	// allows someone to use rgb in shortcode
	if ( strpos( $hex, ',' ) !== false ) {
		return $hex;
	}

	$hex = str_replace( '#', '', $hex );

	if ( strlen( $hex ) === 3 ) {
		$r = hexdec( substr( $hex,0,1 ).substr( $hex,0,1 ) );
		$g = hexdec( substr( $hex,1,1 ).substr( $hex,1,1 ) );
		$b = hexdec( substr( $hex,2,1 ).substr( $hex,2,1 ) );
	} else {
		$r = hexdec( substr( $hex,0,2 ) );
		$g = hexdec( substr( $hex,2,2 ) );
		$b = hexdec( substr( $hex,4,2 ) );
	}
	$rgb = array( $r, $g, $b );

	return implode( ',', $rgb ); // returns the rgb values separated by commas
}

function sby_get_utc_offset() {
	return get_option( 'gmt_offset', 0 ) * HOUR_IN_SECONDS;
}

function sby_is_pro_version() {
	return defined( 'SBY_PLUGIN_EDD_NAME' );
}

function sby_strip_after_hash( $string ) {
	$string_array = explode( '#', $string );
	$finished_string = $string_array[0];

	return $finished_string;
}

function sby_esc_html_with_br( $text ) {
	return str_replace( array( '&lt;br /&gt;', '&lt;br&gt;' ), '<br>', esc_html( nl2br( $text ) ) );
}

function sby_esc_attr_with_br( $text ) {
	return str_replace( array( '&lt;br /&gt;', '&lt;br&gt;' ), '&lt;br /&gt;', esc_attr( nl2br( $text ) ) );
}

function sby_maybe_shorten_text( $string, $feed_settings ) {

	$limit = isset( $feed_settings['textlength'] ) ? $feed_settings['textlength'] : 120;

	if ( strlen( $string ) <= $limit ) {
		return $string;
	}

	$string = str_replace( '<br />', "\n\r", $string );

	$parts = preg_split( '/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE );
	$parts_count = count( $parts );

	$length = 0;
	$last_part = 0;
	for ( ; $last_part < $parts_count; ++$last_part ) {
		$length += strlen( $parts[ $last_part ] );
		if ( $length > $limit ) { break; }
	}

	$last_part = $last_part !== 0 ? $last_part - 1 : 0;
	$parts[ $last_part ] = $parts[ $last_part ] . '...';

	$return_parts = array_slice( $parts, 0, $last_part + 1 );

	$return = implode( ' ', $return_parts );

	return $return;
}

function sby_doing_openssl() {
	return extension_loaded( 'openssl' );
}

function sby_doing_customizer( $settings ) {
    return ! empty( $settings['customizer'] ) && $settings['customizer'] == true;
}

/**
 * YouTube Currect User Capability Check
 *
 * @since 2.0
 */
function sby_current_user_can( $cap ) {
	if ( $cap === 'manage_youtube_feed_options' ) {
		$cap = current_user_can( 'manage_youtube_feed_options' ) ? 'manage_youtube_feed_options' : 'manage_options';
	}
	$cap = apply_filters( 'sby_settings_pages_capability', $cap );

	return current_user_can( $cap );
}

/**
 * Set the customizer feeds table 
 * 
 * @since 2.0
 */
function sb_customizer_feeds_table() {
	global $wpdb;

	return $wpdb->prefix . 'sby_feeds';
}
add_action('sb_customizer_feeds_table', 'sb_customizer_feeds_table');

function sby_get_account_and_feed_info() {
	$yt_atts = array();
	$yt_database_settings = sby_get_database_settings();

	$youtube_feed_settings = new SBY_Settings_Pro( $yt_atts, $yt_database_settings );

	$youtube_feed_settings->set_feed_type_and_terms();
	$yt_feed_type_and_terms = $youtube_feed_settings->get_feed_type_and_terms();

	$type_and_terms = array();
	$terms_array = array();
	foreach ( $yt_feed_type_and_terms as $key => $values ) {
		if ( empty( $type_and_terms['type'] ) ) {
			$type_and_terms['type'] = $key;
			$type_and_terms['term_label'] = '';
			foreach ( $values as $value ) {
				$terms_array[] = $value['term'];
			}
		}

	}

	$type_and_terms['terms'] =  $terms_array;

	$return['type_and_terms'] = $type_and_terms;
	$return['connected_accounts'] = sby_get_first_connected_account();
	if ( isset( $return['connected_accounts']['api_key'] ) ) {
		$return['available_types'] = array(
			'channels' => array(
				'label' => 'Channel',
				'shortcode' => 'channel',
				'term_shortcode' => 'channel',
				'input' => 'text',
				'instructions' => __( 'Any channel ID', 'youtube-feed' )
			),
			'playlist' => array(
				'label' => 'Playlist',
				'shortcode' => 'playlist',
				'term_shortcode' => 'playlist',
				'input' => 'text',
				'instructions' => __( 'Any playlist ID', 'youtube-feed' )
			),
			'favorites' => array(
				'label' => 'Favorites',
				'shortcode' => 'favorites',
				'term_shortcode' => 'channel',
				'input' => 'text',
				'instructions' => __( 'Any channel ID', 'youtube-feed' )
			),
			'search' => array(
				'label' => 'Search',
				'shortcode' => 'search',
				'term_shortcode' => 'search',
				'input' => 'text',
				'instructions' => __( 'A search term', 'youtube-feed' )
			),
			'livestream' => array(
				'label' => 'Live Stream',
				'shortcode' => 'livestream',
				'term_shortcode' => 'channel',
				'input' => 'text',
				'instructions' => __( 'Any channel ID', 'youtube-feed' )
			),
			'single' => array(
				'label' => 'Single',
				'shortcode' => 'single',
				'term_shortcode' => 'single',
				'input' => 'text',
				'instructions' => __( 'Video IDs (separated by comma)', 'youtube-feed' )
			),
		);
	} else {
		$return['available_types'] = array(
			'channels' => array(
				'label' => 'Channel',
				'shortcode' => 'channel',
				'term_shortcode' => 'channel',
				'input' => 'text',
				'instructions' => __( 'Any channel ID', 'youtube-feed' )
			),
			'feed' => array(
				'label' => 'Feeds',
				'shortcode' => 'feed',
				'term_shortcode' => 'feed',
				'input' => 'text',
				'instructions' => __( 'Feed ID', 'youtube-feed' )
			)
		);
	}

	$return['settings'] = array(
		'type' => 'type'
	);

	$channel_ids_names = array();

	global $sby_settings;
	$connected_accounts = $sby_settings['connected_accounts'];

	foreach ( $connected_accounts as $connected_account ) {
		if ( ! empty( $connected_account['username'] ) && ! empty( $connected_account['channel_id'] ) ) {
			$channel_ids_names[ $connected_account['channel_id'] ] = $connected_account['username'];
		}
	}

	$return['channel_ids_names'] = $channel_ids_names;
	return $return;
}