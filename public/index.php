<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

// TODO
define("AP_SITE", realpath(dirname(__FILE__)));

/*function validateStudent($firstName, $lastName, $fakNom, $specialty, $course, $group) {
	try {
		if (empty($firstName)) {
			throw new Exception('Моля въведете Име.');
		}
		if (empty($lastName)) {
			throw new Exception('Моля въведете Фамилия.');
		}
		if (empty($fakNom)) {
			throw new Exception('Моля въведете Факултетен номер.');
		}
		if (strlen($fakNom) > 6 || strlen($fakNom) < 6) {
			throw new Exception('Факултетния номер трябва да бъде дълъг 6 цифри');
		}
		if (empty($specialty)) {
			throw new Exception('Моля въведете Специалност.');
		}
		if(empty($course)) {
			throw new Exception('Моля въведете Курс.');
		}
		if(empty($group)) {
			throw new Exception('Моля въведете Група.');
		}

		return [
			'code' => 'ok',
			'message' => 'success'
		];
	}
	catch(Exception $e) {
		return [
			'code' => 'error',
			'message' => $e->getMessage()
		];
	}
}*/


require_once '../src/system/DB.php';
require_once '../src/models/Student.php';

$mydb = new DB();
$StudentModel = new Student($mydb);

/*if($_GET['action'] == 'students-list') {

	$allStudents = $StudentModel->getAllStudents();

	include AP_SITE.'/../src/views/students-list.tpl';
}*/
// DELETE
if ($_GET['action'] == 'delete' && isset($_GET['id'])) {
	$StudentModel->deleteStudent($_GET['id']);
	header("Location: /public/index.php");
}
if ($_GET['action'] == 'insert') {
	include AP_SITE.'/../src/views/students-form.tpl';
}
if ($_GET['action'] == 'inserted') {
	if ($_POST['formSubmit']) {
		$firstName = $_POST['ime'];
		$lastName = $_POST['fam'];
		$fakNom = intval($_POST['fn']);
		$specialty = $_POST['spec'];
		$course = intval($_POST['kurs']);
		$group = $_POST['grupa'];

		// Insert the student into DB
		$StudentModel->addStudent($fakNom, $firstName, $lastName, $specialty, $course, $group);
		header("Location: /public/index.php");
	}
}
// TODO
/*if ($_GET['action'] == 'update' && isset($_GET['id'])) {
	$id = $_GET['id'];
	include AP_SITE.'/../src/views/students-form.tpl';
	if ($_POST['formSubmit']) {
		$firstName = $_POST['ime'];
		$lastName = $_POST['fam'];
		$fakNom = intval($_POST['fn']);
		$specialty = $_POST['spec'];
		$course = intval($_POST['kurs']);
		$group = $_POST['grupa'];

		// Insert the student into DB
		$StudentModel->updateStudent($fakNom, $firstName, $lastName, $specialty, $course, $group, $id);
		header("Location: /public/index.php");
	}
}*/
else {
	if (!isset($_GET['action'])) {
		$allStudents = $StudentModel->getAllStudents();

		include AP_SITE.'/../src/views/students-list.tpl';
	}	
}



