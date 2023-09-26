<?php

namespace SmashBalloon\YouTubeFeed\Customizer;

use Smashballoon\Stubs\Services\ServiceProvider;
use SmashBalloon\YouTubeFeed\Helpers\Util;

class Customizer_Compatibility extends ServiceProvider {

	public function register() {
		add_action('admin_enqueue_scripts', [$this, 'register_scripts']);
		add_action('customizer_enqueue_scripts', [$this, 'enqueue_scripts'], 0);
	}

	public function register_scripts() {
		$asset_url = trailingslashit( SBY_PLUGIN_URL ) . 'js/customizer.min.js';

		if(!Util::isProduction()) {
			$asset_url = 'http://localhost:9005/customizer.min.js';
		}

		wp_register_script('sby_builder_extension', $asset_url, [], SBYVER);
	}

	public function enqueue_scripts() {
		wp_enqueue_script('sby_builder_extension');
	}
}