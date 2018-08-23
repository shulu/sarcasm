<?php
/**
 * -------------------------
 *  Sql.php
 * -------------------------
 * User: shulu
 * Date: 2018/8/22
 * Time: 10:03
 */

namespace Core\SSQL;


abstract class Pdo
{
	protected static $db = null;
	
	protected static $_lastInsertId = null;

	protected function __construct ($conf = 'mysql')
	{
		$conf = getConf ($conf);
		$dsn = "{$conf['dbms']}:host={$conf['host']};dbname={$conf['db_name']}";
		try{
			self::$db = new \PDO($dsn, $conf['user'], $conf['pass'], [\PDO::ATTR_PERSISTENT => true]);
		} catch (\PDOException $e)
		{
			die ("Error!: " . $e->getMessage() . "<br/>");
		}
	}
	
	abstract function query();
	
	abstract function insert();
	
	abstract function select();
	
	abstract function update();
	
	abstract function delete();
	
	public static function lastInsertId()
	{
		self::$_lastInsertId = self::$db->lastInsertId ();
		return self::$_lastInsertId;
	}
	
	public static function returnError()
	{
		$err_code = self::$db->errorCode ();
		$err_info = json_encode (self::$db->errorInfo ());
		return "Error Code: {$err_code} Error Info: {$err_info}";
	}
}