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


class SMysql extends Pdo
{
	private static $_instance = null;
	
	private $_sql = null;
	
	public function __construct ($conf = 'mysql')
	{
		parent::__construct ($conf);
	}
	
	public static function getInstance ()
	{
		if (is_null(self::$_instance)) { self::$_instance = new self(); }
		return self::$_instance;
	}
	
	public function query ($val = [])
	{
		// TODO: Implement query() method.
		try{
			$prepare_statement = self::$db->prepare ($this->_sql);
			$result = $prepare_statement->execute ($val);
			return $result;
		}catch (\PDOException $e)
		{
			die('PDO Error '.$e->getMessage (). "<br/>");
		}
		
	}
	
	public function select ($fields = '')
	{
		// TODO: Implement select() method.
		$this->_sql = "SELECT {$fields}";
		return $this;
	}
	
	public function from ($table_name = '')
	{
		$this->_sql .= " FROM {$table_name}";
		return $this;
	}
	
	public function where ($wheres = '')
	{
		$this->_sql .= " WHERE {$wheres}";
		return $this;
	}
	
	public function return_sql ()
	{
		return $this->_sql;
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