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

class Router
{
	use Singleton;
	
	/**
	 * 静态成品变量 保存全局实例
	 */
	private static  $_instance = NULL;
	
	public $app = 'index';
	public $name_space = 'App';
	public $controller = 'index';
	public $task = 'index';
	public $params = [];
	
	private function __construct ()
	{
		$this->app = checkData ($_GET['app']) ? $_GET['app'] : $this->app ;
		$this->controller = $_GET['com'] ? $_GET['com'] : $this->controller;
		$this->task = $_GET['task'] ? $_GET['task'] : $this->task;
		$this->name_space = 'App\\'.$this->app.'\\Controller\\';
		$this->params = [];
	}
	
	public static function getInstance ()
	{
		if (is_null(self::$_instance)) { self::$_instance = new router(); }
		return self::$_instance;
	}
	
	public function router ()
	{
		$class_file =  APP_PATH.$this->app.DS.'controller'.DS.$this->controller.'Controller.'.EXT;
		if (file_exists ($class_file))
		{
			$class = $this->name_space.ucfirst ($this->controller.'Controller');
			if (class_exists ($class) )
			{
				$reflectClass = new \ReflectionClass($class);
				$instance = $reflectClass->newInstance ();
				if (method_exists ($class, $this->task))
				{
					try {
						$reflectMethod = $reflectClass->getMethod ($this->task);
						$reflectMethod->invokeArgs ($instance, $this->params);
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