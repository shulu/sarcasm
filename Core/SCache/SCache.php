<?php
/**
 * -------------------------
 *
 * -------------------------
 * User: shulu
 * Date: 2018/8/21
 * Time: 10:23
 */

namespace Core\SCache;


abstract class SCache
{
	abstract public function get ();
	
	abstract public function set ();
}