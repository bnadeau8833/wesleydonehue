<?php


define( 'SBY_DBVERSION', '1.4' );

// Upload folder name for local image files for posts
define( 'SBY_UPLOADS_NAME', 'sby-local-media' );

// Name of the database table that contains instagram posts
define( 'SBY_ITEMS', 'sby_items' );

// Name of the database table that contains feed ids and the ids of posts
define( 'SBY_ITEMS_FEEDS', 'sby_items_feeds' );
// Name of the database table that contains feed ids and the ids of posts

define( 'SBY_CPT', 'sby_videos' );

// Plugin Folder Path.
define( 'SBY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
// Plugin Folder URL.
define( 'SBY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SBY_MINIMUM_WALL_VERSION', '1.0' );
define( 'SBY_FEED_LOCATOR', 'sby_feed_locator' );

define( 'CUSTOMIZER_ABSPATH', __DIR__ . '/vendor/smashballoon/customizer/' );
define( 'CUSTOMIZER_PLUGIN_URL', plugin_dir_url( __DIR__ . '/vendor/smashballoon/customizer/bootstrap.php' ) );

// composer autoload
include 'vendor/autoload.php';

//Load .env variables
if(class_exists('Dotenv\Dotenv')) {
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->safeLoad();
}