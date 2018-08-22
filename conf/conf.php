<?php
/**
 * -------------------------
 *   config
 * -------------------------
 * User: shulu
 * Date: 2018/5/3
 * Time: 13:58
 */


return [

	'index' => APP_PATH.'index',
	
	'backend' => APP_PATH.'admin',
	
	'mysql' => [
		'dbms' => 'mysql',   //数据库类型
		'host' => '192.168.99.100',   //数据库主机名
		'db_name' => 'sarcasm',   //使用的数据库
		'user' => 'root',
		'pass' => '123456'
	],
	
	'redis' => [
		'host' => '192.168.99.100',
		'port' => '6379',
		'auth' => ''
	]
];