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

trait router
{
	public $app = 'index';
	public $name_space = null;
	public $controller = null;
	public $action = null;
	
	public function __construct ()
	{
		$this->app = common::checkData ($_GET['app']) ? $_GET['app'] : $this->app ;
		$this->controller = $_GET['com'];
		$this->action = $_GET['action'];
		$this->name_space = 'Application\\'.$this->controller.'\\';
	}
	
	public function router ()
	{
		$class_file =  APP_PATH.$this->app.DS.'controller'.DS.$this->controller.'Controller.'.EXT;
		if (file_exists ($class_file))
		{
			include $class_file;
			$class = $this->name_space.$this->action.'Controller';
			if (class_exists ($class) )
			{
				if (method_exists ($class, $this->action))
				{
					#common::printJson([$class, $this->action]);
					call_user_func ([$class, $this->action]);
				}
			}
		}
	}
}