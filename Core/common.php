<?php
/**
 * Created by PhpStorm.
 * User: Msi
 * Date: 2018/6/1 0001
 * Time: 0:55
 */

function checkData($data = [], $type = 1)
{
	switch ($type)
	{
		case 2:
			return (!isset($data) || !empty($data));
			break;
		default:
			return (isset($data)&&$data);
	}
}

function printJson($data)
{
	echo '<br/>';
	print_r (json_encode ($data, JSON_UNESCAPED_SLASHES));
}

function getConf($conf_name = '')
{
	$conf = require CONF_PATH.'conf.php';
	return $conf[$conf_name];
}