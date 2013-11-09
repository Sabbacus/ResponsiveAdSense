<?php
/*
 * Singleton design pattern for PHP 5.3 and above
 * */
class Singleton {
	private static $instances = array();
	protected static $instance;

	/**
	 * protected so no one else can instance it
	 **/
	protected function __construct() {

	}

	public static function getInstance() {
		$cls = get_called_class(); // late-static-bound class name
		if (!isset(self::$instances[$cls])) {
			self::$instances[$cls] = new static;
		}
		return self::$instances[$cls];
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