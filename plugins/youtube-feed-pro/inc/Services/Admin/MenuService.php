<?php

namespace SmashBalloon\YouTubeFeed\Services\Admin;

use Smashballoon\Customizer\Container;
use Smashballoon\Customizer\Feed_Builder;
use Smashballoon\Stubs\Services\ServiceProvider;
use SmashBalloon\YouTubeFeed\Admin\SBY_Notifications;

class MenuService extends ServiceProvider {

	/**
	 * @var mixed|Feed_Builder
	 */
	private $builder;

	/**
	 * @var SBY_Notifications
	 */
  private $notifications;

	public function __construct(SBY_Notifications $notifications) {
		$this->builder = Container::getInstance()->get(Feed_Builder::class);
        $this->notifications = $notifications;
	}

	public function register() {
		add_action('admin_menu', [$this, 'register_menus']);
	}

	public function register_menus() {
		$cap = current_user_can( 'manage_options' ) ? 'manage_options' : 'manage_youtube_feed_options';

		add_menu_page(
			__('YouTube Feed', 'feed-for-youtube'),
			__('YouTube Feed', 'feed-for-youtube') . $this->alert_html(),
			$cap,
			SBY_MENU_SLUG,
			null,
			'dashicons-video-alt3',
			99
		);

		add_submenu_page(
			SBY_MENU_SLUG,
			__( 'All Feeds', 'youtube-feed' ),
			__( 'All Feeds', 'youtube-feed' ),
			$cap,
			SBY_MENU_SLUG,
			array( $this->builder, 'feed_builder' ),
			0
		);
	}

	private function alert_html() {
		$notice = '';
		$notice_bubble = '';

		$notifications = $this->notifications->get();

		if ( empty( $notice ) && ! empty( $notifications ) && is_array( $notifications ) ) {
			$notice_bubble = ' <span class="sby-notice-alert"><span>' . count( $notifications ) . '</span></span>';
		}

		return $notice_bubble . $notice;
	}
}
