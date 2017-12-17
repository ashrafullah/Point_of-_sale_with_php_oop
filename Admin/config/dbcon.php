<?php
// onnine connect
// $con = mysqli_connect("localhost","imranweb","#w7vD!0d32Nz$","imranweb_petrol");

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
session_start();

define('PROJECT_NAME', 'POINT OF SALE');
define('DB_DRIVER', "mysql");
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "imran_pos");
define("TITLE", "POINT OF SALE");
// must end with a slash
 define('SITE_URL','http://localhost/POS_WITH_OOP_LICT_BDJOBS/');

$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
  $dbcon = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}
?>