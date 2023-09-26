<?php

namespace SmashBalloon\YouTubeFeed\Data;

use SmashBalloon\YouTubeFeed\Vendor\DI\Container;

class DataFactory {
	public function create($class) {
		return ( new Container() )->get($class);
	}
}