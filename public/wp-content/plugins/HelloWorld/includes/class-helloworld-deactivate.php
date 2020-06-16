<?php
/**
 * This is doc somment .
 *
 *  @package helloWorld .
 */

/**
 * This is activation hook after activate  of plugin .
 *
 * @package pluginsdev
 */
class HelloWorld_Deactivate {
	/**
	 * This function will activation for the plugins
	 *
	 * @return void
	 */
	public static function deactteiva() {
			flush_rewrite_rules();
	}
}
