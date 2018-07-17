<?php
/**
 * -------------------------
 *  autoloader
 * -------------------------
 * User: shulu
 * Date: 2018/5/3
 * Time: 16:00
 */


class loader
{
	
	static $class_map = [];
	
	public static function autoload($need_load)
	{
		if (strpos ($need_load, '\\'))
		{
			list($namespace, $class_name) = explode ("\\", $need_load);
			$class_file = ROOT_PATH.$namespace.DS.$class_name.'.'.EXT;
			printJson ($class_file);
		}
		require_once $class_file;
	}
	
	/**
	 * @param array $class_map
	 */
	public static function setClassMap ()
	{
		return;
	}
	
	public static function getClassMap ()
	{
		return;
	}
}