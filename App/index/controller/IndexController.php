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

use Core\SCache\SRedis;
use Core\SSQL\SMysql;

class IndexController
{
	public function index ()
	{
		printJson ( SMysql::getInstance ()->query ());
		printJson ( SRedis::getInstance ()->ping ());
		printJson (__METHOD__);
	}
}