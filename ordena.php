<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'dbapi.php';
//$imgorder = array("0-7-1507852333-103","0-7-1507862483-101","0-7-1507862483-102","0-7-1507862483-103");
$imgorder = $_REQUEST['orden'];

Database::initialize();
echo acomoda($imgorder);
$close = Database::$conn->close();

?>