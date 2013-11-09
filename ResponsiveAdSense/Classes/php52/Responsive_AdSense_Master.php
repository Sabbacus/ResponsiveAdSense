<?php
/**
 * Project: ResponsiveAdSense.
 * User: Sabbacus
 * Date: 2013-11-06
 * Time: 23:33
 * To change this template use File | Settings | File Templates.
 */

class Responsive_AdSense_Master {
	protected static $instance;

	/**
	 * protected so no one else can instance it
	 **/
	protected function __construct() {

	}

	public static function getInstance() {
		if (is_null(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * protected to prevent cloning
	 **/
	protected function __clone() {

	}

	public function __wakeup() {
		throw new Exception("Cannot unserialize singleton");
	}
} 