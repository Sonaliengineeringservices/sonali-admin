<?php

//Note: This file should be included first in every php page.
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('BASE_PATH', dirname(dirname(__FILE__)));
//define('APP_FOLDER', 'simpleadmin');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));

require_once BASE_PATH . '/lib/MysqliDb/MysqliDb.php';
require_once BASE_PATH . '/helpers/helpers.php';

/*
|--------------------------------------------------------------------------
| DATABASE CONFIGURATION
|--------------------------------------------------------------------------
 */

define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "root");
define('DB_NAME', "corephpadmin");

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

// define('DB_HOST', "e56945399602593.db.45399602.d89.hostedresource.net:3311");
// define('DB_USER', "e56945399602593");
// define('DB_PASSWORD', "E.GY2O!5z3Li");
// define('DB_NAME', "e56945399602593");


/**
 * Get instance of DB object
 */
function getDbInstance() {
	$conn = new MysqliDb(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('error connecting to database');
		echo $conn;
	}
	
	echo 'connection!';
	return $conn;
	

}