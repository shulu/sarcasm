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
		$this->task = $_GET['task'] ? $_GET['task'] : $this->task;
		$this->name_space = 'Application\\'.$this->app.'\\';
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
				#printJson (method_exists($class, $this->task));
				if (method_exists ($class, $this->task))
				{
					#printJson([$class, $this->task]);
					try {
						call_user_func ([$class, $this->task]);
					} catch (\Exception $e){
						echo 'Caught exception: ',  $e->getMessage(), "\n";
					}
				}else{
					trigger_error("function ".$this->task." is not existed.",E_USER_ERROR);
				}
			}else{
				trigger_error("Class {$class} is not existed.",E_USER_ERROR);
			}
		}else{
			trigger_error("file {$class_file} is not existed.",E_USER_ERROR);
		}
	}
}