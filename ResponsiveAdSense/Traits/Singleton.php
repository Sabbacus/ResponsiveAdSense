<?php
/**
 * Singleton patter in php
 **/
trait Singleton {
	protected static $instance = null;

	/**
	 * protected so no one else can instance it
	 **/
	protected function __construct(){

	}

	/**
	 * call this method to get instance
	 **/
	public static function getInstance(){
		if (static::$instance === null){
			static::$instance = new static();
		}
		return static::$instance;
	}

	/**
	 * protected to prevent cloning
	 **/
	protected function __clone(){

	}

	public function __wakeup() {
		throw new Exception("Cannot unserialize singleton");
	}
}