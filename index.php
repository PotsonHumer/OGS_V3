<?php
	session_start();
	
	define('ROOT_PATH', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
	include_once ROOT_PATH.'core.php';

	error_reporting(E_WARNING | E_ERROR);
	set_error_handler(array('CORE','errorHandle'));

	new CORE;
?>