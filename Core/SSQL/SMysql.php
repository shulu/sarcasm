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
	
	public $start_transaction = false;
	
	public function __construct ($conf = 'mysql')
	{
		parent::__construct ($conf);
		self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
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
			if ($this->start_transaction) self::$db->beginTransaction ();
			$prepare_statement = self::$db->prepare ($this->_sql);
			$result = $prepare_statement->execute ($val);
			if ($this->start_transaction) self::$db->commit ();
			return $result;
		}catch (\PDOException $e)
		{
			if ($this->start_transaction) self::$db->rollBack ();
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
	
	public function groupBy ($groups = '')
	{
		$this->_sql = " GROUP BY {$groups}";
		return $this;
	}
	
	public function orderBy ($orders = '')
	{
		$this->_sql = " ORDER BY {$orders}";
		return $this;
	}
	
	public function limit ($offset, $page=0)
	{
		$this->_sql = " LIMIT {$page}, {$offset}";
		return $this;
	}
	
	public function having ($having = '')
	{
		$this->_sql = " HAVING {$having}";
		return $this->_sql;
	}
	
	public function return_sql ()
	{
		return $this->_sql;
	}
	
	public function insert ($table_name = '')
	{
		// TODO: Implement insert() method.
		$this->_sql = "INSERT INTO {$table_name}";
	}
	
	public function update ($table_name = '')
	{
		// TODO: Implement update() method.
		$this->_sql = "UPDATE {$table_name} SET";
		return $this;
	}
	
	public function delete ($table_name = '')
	{
		// TODO: Implement delete() method.
		$this->_sql = "DELETE FROM {$table_name}";
		return $this;
	}
	
}