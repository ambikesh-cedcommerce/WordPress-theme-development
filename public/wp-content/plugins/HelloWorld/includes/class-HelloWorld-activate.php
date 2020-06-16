<?php

/**
 * This is activation hook after activate  of plugin .
 *
 * @package pluginsdev
 */


class HelloWorld_Activate {
	/**
	 * This function will activation for the plugins
	 *
	 * @return void
	 */
	public static function activate() {

			flush_rewrite_rules();
	}
}
