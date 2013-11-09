<?php

class AutoLoader {
	static private $traits = false;
	static private $lateStaticBinding = false;

	public static function classes($class) {
		$path = array();
		$dir = "Classes/";
		$class = $class.".php";

		$path[] = $dir.$class;
		$path[] = $_SERVER["DOCUMENT_ROOT"]."/ResponsiveAdSense/".$dir.$class;

		return self::checkDir($path);
	}

	public static function classes_php52($class) {
		$path = array();
		$dir = "Classes/php52/";
		$class = $class.".php";

		$path[] = $dir.$class;
		$path[] = $_SERVER["DOCUMENT_ROOT"]."/ResponsiveAdSense/".$dir.$class;

		return self::checkDir($path);
	}

	public static function classes_php53($class) {
		$path = array();
		$dir = "Classes/php53/";
		$class = $class.".php";

		$path[] = $dir.$class;
		$path[] = $_SERVER["DOCUMENT_ROOT"]."/ResponsiveAdSense/".$dir.$class;

		return self::checkDir($path);
	}

	public static function classes_php54($class) {
		$path = array();
		$dir = "Classes/php54/";
		$class = $class.".php";

		$path[] = $dir.$class;
		$path[] = $_SERVER["DOCUMENT_ROOT"]."/ResponsiveAdSense/".$dir.$class;

		return self::checkDir($path);
	}

	private static function checkDir($paths) {
		foreach($paths as $dirPath) {
			if (file_exists($dirPath)) {
				require_once $dirPath;
				return true;
			} else {
				#echo "No such trait in $dirPath<br>";
			}
		}
		return false;
	}

	public static function traits($trait) {
		$path = array();
		$dir = "Traits/";
		$trait = $trait.".php";

		$path[] = $dir.$trait;
		$path[] = $_SERVER["DOCUMENT_ROOT"]."/ResponsiveAdSense/".$dir.$trait;

		return self::checkDir($path);
	}

	public static function setAutoLoaders() {
		$phpVer = phpversion();

		if (version_compare($phpVer, "5.4.0") >= 0) {
			self::$traits = true;
			self::$lateStaticBinding = true;
		} elseif (version_compare($phpVer, "5.3.0")) {
			self::$lateStaticBinding = true;
		}

		spl_autoload_register('AutoLoader::classes');

		if (self::$traits) {
			spl_autoload_register('AutoLoader::traits');
			spl_autoload_register('AutoLoader::classes_php54');
		} elseif (self::$lateStaticBinding) {
			spl_autoload_register('AutoLoader::classes_php53');
		} else {
			spl_autoload_register('AutoLoader::classes_php52');
		}
	}
}