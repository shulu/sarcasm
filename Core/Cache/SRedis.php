<?php
/**
 * -------------------------
 *
 * -------------------------
 * User: shulu
 * Date: 2018/8/21
 * Time: 10:24
 */

namespace Core\Cache;


class SRedis extends Cache
{
	private static $redis = null;
	private static $_instance = null;
	
	private function __construct ()
	{
		$conf =  getConf ('redis');
		self::$redis = new \Redis();
		self::$redis->connect ($conf['host'], $conf['port']);
	}
	
	public static function getInstance ()
	{
		if (is_null(self::$_instance)) { self::$_instance = new self(); }
		return self::$_instance;
	}
	
	public function ping ()
	{
		return self::$redis->ping();
	}
	
	public function get ($key = '')
	{
		// TODO: Implement get() method.
		return self::$redis->get ($key);
	}
	
	public function set ($key = '', $val = '')
	{
		// TODO: Implement set() method.
		return self::$redis->set ($key, $val);
	}
	
}