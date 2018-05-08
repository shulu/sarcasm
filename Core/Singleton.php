<?php
/**
 * -------------------------
 *  singleton
 * -------------------------
 * User: shulu
 * Date: 2018/5/8
 * Time: 11:20
 */
namespace Core;

trait singleton
{
	
	public function __clone() {
		trigger_error('Cloning '.__CLASS__.' is not allowed.',E_USER_ERROR);
	}
	
	public function __wakeup() {
		trigger_error('Unserializing '.__CLASS__.' is not allowed.',E_USER_ERROR);
	}
	
}