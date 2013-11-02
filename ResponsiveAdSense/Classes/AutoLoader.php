<?php
/**
 * Project: ResponsiveAdSense.
 * User: Sabbacus
 * Date: 2013-11-02
 * Time: 14:26
 * To change this template use File | Settings | File Templates.
 */

class AutoLoader {
	public static function register($class) {
		$path = array();
		$class = $class.".php";
		$path[] = "Classes/$class";
		$path[] = $_SERVER["DOCUMENT_ROOT"]."/ResponsiveAdSense/Classes/".$class;

		foreach($path as $dirPath) {
			if (file_exists($dirPath)) {
				require_once $dirPath;
				return true;
			} else {
				#echo "No such class in $dirPath<br>";
			}
		}
		return false;
	}
} 