<?php
/**
 * -------------------------
 *   Core
 * -------------------------
 * User: shulu
 * Date: 2018/5/3
 * Time: 14:07
 */

define ('EXT', 'php');
define ('DS', DIRECTORY_SEPARATOR);
define ('ROOT_PATH', dirname (realpath (__DIR__)).DS);
define ('CORE_PATH', __DIR__.DS);
define ('CONF_PATH', ROOT_PATH.DS.'conf'.DS);


spl_autoload_register (['loader', 'autoload'], true, true);

class Core
{
	protected $com = null;
	protected $task = null;
	
	public function __construct ()
	{
		$this->com = $_GET['com'];
		$this->task = $_GET['task'];
	}
	
	public Static function Init ()
	{
		$conf = common::getConf ('');
		#var_dump ($conf);
	}
}

