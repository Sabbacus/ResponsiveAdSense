<?php

class AutoLoader {
	static private $traits = false;
	static private $lateStaticBinding = false;

	const CLASS_DIR 	= "Classes/";
	const TRAITS_DIR 	= "Traits/";

	public static function classes($class) {
		$path 	= array();
		$class 	= $class.".php";

		$path[] = self::CLASS_DIR.$class;
		$path[] = RESPONSIVE_ADSENSE_PATH.self::CLASS_DIR.$class;

		return self::checkDir($path);
	}

	public static function classes_php52($class) {
		$path 	= array();
		$dir 	= self::CLASS_DIR."php52/";
		$class 	= $class.".php";

		$path[] = $dir.$class;
		$path[] = RESPONSIVE_ADSENSE_PATH.$dir.$class;

		return self::checkDir($path);
	}

	public static function classes_php53($class) {
		$path 	= array();
		$dir 	= self::CLASS_DIR."php53/";
		$class 	= $class.".php";

		$path[] = $dir.$class;
		$path[] = RESPONSIVE_ADSENSE_PATH.$dir.$class;

		return self::checkDir($path);
	}

	public static function classes_php54($class) {
		$path 	= array();
		$dir 	= self::CLASS_DIR."php54/";
		$class 	= $class.".php";

		$path[] = $dir.$class;
		$path[] = RESPONSIVE_ADSENSE_PATH.$dir.$class;

		return self::checkDir($path);
	}

	private static function checkDir($paths) {
		foreach($paths as $dirPath) {
			if (file_exists($dirPath)) {
				require_once $dirPath;
				return true;
			} else {
				#echo "No such class/trait in $dirPath<br>";
			}
		}
		return false;
	}

	public static function traits($trait) {
		$path 	= array();
		$trait 	= $trait.".php";

		$path[] = self::TRAITS_DIR.$trait;
		$path[] = RESPONSIVE_ADSENSE_PATH.self::TRAITS_DIR.$trait;

		return self::checkDir($path);
	}

	public static function setAutoLoaders() {
		// Fallback for lazy people.
		if (!defined("RESPONSIVE_ADSENSE_CONFIG_LOADED") && file_exists("../config.php")) {
			require_once "../config.php";
		}
		$phpVer = phpversion();

		if (version_compare($phpVer, "5.4.0") >= 0) {
			self::$traits = true;
			self::$lateStaticBinding = true;
		} elseif (version_compare($phpVer, "5.3.0") >= 0) {
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