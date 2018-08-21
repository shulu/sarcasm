<?php
/**
 * -------------------------
 *  com_index
 * -------------------------
 * User: shulu
 * Date: 2018/5/3
 * Time: 15:45
 */
namespace App\index\Controller;

use Core\Cache\SRedis;

class IndexController
{
	public function __construct ()
	{
	
	}
	
	public function index ()
	{
		print_r (SRedis::getInstance ()->ping ());
		print_r (SRedis::getInstance ()->set ('sarcasme', 'sarcasme'));
		print_r (SRedis::getInstance ()->get ('sarcasme'));
		#printJson (__METHOD__);
	}
}