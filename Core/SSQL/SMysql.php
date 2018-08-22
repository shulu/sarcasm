<?php
/**
 * -------------------------
 *
 * -------------------------
 * User: shulu
 * Date: 2018/8/21
 * Time: 10:24
 */

namespace Core\SSQL;


class SMysql extends Sql
{
	private static $_instance = null;
	
	public function __construct ($conf = 'mysql')
	{
		parent::__construct ($conf);
	}
	
	public static function getInstance ()
	{
		if (is_null(self::$_instance)) { self::$_instance = new self(); }
		return self::$_instance;
	}
	
	public function query ($sql = '', $val = [])
	{
		// TODO: Implement query() method.
		try{
			$prepare_statement = self::$db->prepare ($sql);
			$result = $prepare_statement->execute ($val);
			return $result;
		}catch (\PDOException $e)
		{
			die('PDO Error '.$e->getMessage (). "<br/>");
		}
		
	}
	
	public function select ()
	{
		// TODO: Implement select() method.
	}
	
	public function insert ()
	{
		// TODO: Implement insert() method.
	}
	
	public function update ()
	{
		// TODO: Implement update() method.
	}
	
	public function delete ()
	{
		// TODO: Implement delete() method.
	}
}