<?php

/*
error_reporting(E_ALL);
ini_set("display_errors", 1);
*/

// TODO AUTOLOADING
define("AP_SITE", realpath(dirname(__FILE__)));

// Global variable used for sorting
$current_sort_order = 'ASC';

/*require_once '../src/system/DB.php';
require_once '../src/models/Student.php';*/

// AUTOLOADING
require_once '../src/views/Bootstrap.php';

$mydb = new DB();
$StudentModel = new Student($mydb);

// DELETE
if ($_GET['action'] == 'delete' && isset($_GET['id'])) {
	$StudentModel->deleteStudent($_GET['id']);
	header("Location: /public/index.php");
}

// UPDATE STUDENT
if ($_GET['action'] == 'update') {
	
	if (isset($_GET['id'])) {	// Checking for $_GET value
		$stdId = $_GET['id'];
	}

	// Sets action for the students-form template
	$act = "update&id=".$_GET["id"];

	$std = $StudentModel->getStudent();
	
	include AP_SITE.'/../src/views/students-form.tpl';

	// If the form is submitted
	if ($_POST['formSubmit']) {
		
		$result = $StudentModel->updateStudent();

		if ($result['code'] == 'ok') {
			header("Location: /public/index.php");
		}
		else {
			echo $result['message'];
		}
	}
}

// ADD STUDENT
if ($_GET['action'] == 'insert') {

	// Sets action for the students-form template
	$act = "insert";

	include AP_SITE.'/../src/views/students-form.tpl';

	// If the form is submitted
	if ($_POST['formSubmit']) {

		$result = $StudentModel->addStudent();

		if ($result['code'] == 'ok') {
			header("Location: /public/index.php");
		}
		else {
			echo $result['message'];
		}
	}
}
// SORT
if ($_GET['action'] == 'sort') {

	if (isset($_GET['sort'])) {
		$sort = $_GET['sort'];	// Getting the sort type
	}
	
	// Setting the sort by
	if (isset($_GET['sort_order'])) {
		if ($_GET['sort_order'] == 'DESC') {
			$sort_order = 'ASC';
			$sort_css_class = 'down';
			$current_sort_order = 'DESC';
		}
		else {
			$sort_order = 'DESC';
			$sort_css_class = 'up';
			$current_sort_order = 'ASC';
		}
	}

	$allStudents = $StudentModel->orderStudents($sort, $current_sort_order);

	include AP_SITE.'/../src/views/students-list.tpl';

}

// Show default case
else {
	if (!isset($_GET['action'])) {
		$allStudents = $StudentModel->getAllStudents();

		include AP_SITE.'/../src/views/students-list.tpl';
	}
}



