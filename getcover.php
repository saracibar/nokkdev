<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'dbapi.php';
$userid = $_REQUEST['userid'];
$propid = $_REQUEST['propid'];

Database::initialize();
echo getcover($userid,$propid);
$close = Database::$conn->close();

?>