<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'dbapi.php';
//$imgorder = array("0-7-1507852333-103","0-7-1507862483-101","0-7-1507862483-102","0-7-1507862483-103");
$imgname = $_REQUEST['imgname'];
$userid = $_REQUEST['userid'];
$propid = $_REQUEST['propid'];

Database::initialize();
echo addcover($imgname,$userid,$propid);
$close = Database::$conn->close();

?>