<?php
/**
 * -------------------------
 * router
 * -------------------------
 * User: shulu
 * Date: 2018/5/4
 * Time: 17:10
 */
namespace Core;
use Core\singleton;

class router
{
	use Singleton;
	
	/**
	 * 静态成品变量 保存全局实例
	 */
	private static  $_instance = NULL;
	
	public $app = 'index';
	public $name_space = null;
	public $controller = 'index';
	public $action = 'index';
	
	private function __construct ()
	{
		$this->app = checkData ($_GET['app']) ? $_GET['app'] : $this->app ;
		$this->controller = $_GET['com'] ? $_GET['com'] : $this->controller;
		$this->action = $_GET['action'] ? $_GET['action'] : $this->action;
		$this->name_space = 'App\\'.$this->app.'\\';
	}
	
	public static function getInstance ()
	{
		if (is_null(self::$_instance)) { self::$_instance = new router(); }
		return self::$_instance;
	}
	
	public function router ()
	{
		$class_file =  APP_PATH.$this->app.DS.'controller'.DS.$this->controller.'Controller.'.EXT;
		printJson (file_exists ($class_file));
		$reflectClass = new \ReflectionClass($class_file);
		printJson ($reflectClass);
		if (file_exists ($class_file))
		{
			$class = $this->name_space.$this->controller.'Controller';
			if (class_exists ($class) )
			{
				printJson (method_exists($class, $this->action));
				if (method_exists ($class, $this->action))
				{
					printJson([$class, $this->action]);
					try {
						call_user_func_array ([$class, $this->action], []);
					} catch (\Exception $e){
						echo 'Caught exception: ',  $e->getMessage(), "\n";
					}
				}else{
					trigger_error("function ".$this->action." is not existed.",E_USER_ERROR);
				}
			}else{
				trigger_error("file {$class} is not existed.",E_USER_ERROR);
			}
		}else{
			trigger_error("file {$class_file} is not existed.",E_USER_ERROR);
		}
	}
}