<?php
/**
 * -------------------------
 *   Core
 * -------------------------
 * User: shulu
 * Date: 2018/5/3
 * Time: 14:07
 */
use Core\Singleton, Core\Router;
define ('EXT', 'php');
define ('DS', DIRECTORY_SEPARATOR);
define ('ROOT_PATH', dirname (realpath (__DIR__)).DS);
define ('APP_PATH', ROOT_PATH.'App'.DS);
define ('CORE_PATH', __DIR__.DS);
define ('CONF_PATH', ROOT_PATH.'conf'.DS);

require_once __DIR__.'/Loader.php';
require_once __DIR__.'/common.php';

spl_autoload_register (['loader', 'autoload'], true, true);

class Core
{
	use Singleton;
	
	public static function Init ()
	{
		Router::getInstance ()->router ();
	}
}

