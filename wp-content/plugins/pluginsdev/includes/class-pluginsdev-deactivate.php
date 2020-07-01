<?php

/**
 * This is activation hook after activate  of plugin .
 *
 * @package pluginsdev
 */


class Pluginsdev_Deactivate {
	/**
	 * This function will activation for the plugins
	 *
	 * @return void
	 */
	public static function deactivate() {
			flush_rewrite_rules();
	}
}
