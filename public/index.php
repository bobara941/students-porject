<?php

define("AP_SITE", realpath(dirname(__FILE__)));

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../src/system/DB.php';
require_once '../src/models/Student.php';

$mydb = new DB();

if($_GET['action'] == 'students-list') {
	$StudentModel = new Student($mydb);

	$mas = $StudentModel->getAllStudents();

	include AP_SITE.'/../src/views/students-list.tpl';
}
else {
	
}



