<?php


// error_reporting(E_ALL);
// ini_set("display_errors", 1);


// Using for including templates
define("AP_SITE", realpath(dirname(__FILE__)));


// Global variable used for sorting
$current_sort_order = 'ASC';

// AUTOLOADING
require_once '../src/Bootstrap.php';

$mydb = new DB();
$StudentModel = new Student($mydb);


switch($_GET['action']) {
	// DELETE
	case 'delete':
		if (isset($_GET['id'])) {
			$StudentModel->deleteStudent($_GET['id']);
			header("Location: /public/index.php?action=show-all-students");
		}
	break;
	// UPDATE STUDENT
	case 'update':

		if (isset($_GET['id'])) {	
			$stdId = $_GET['id'];	// Getting student ID for latter use in SQL queries
		}

		// Sets action for the students-form template
		$act = "update&id=".$_GET["id"];

		$std = $StudentModel->getStudent();
		
		include AP_SITE.'/../src/views/students-form.tpl';

		// If the form is submitted
		if ($_POST['formSubmit']) {
			
			$result = $StudentModel->updateStudent();

			if ($result['code'] == 'ok') {
				header("Location: /public/index.php?action=show-all-students");
			}
			else {
				echo $result['message'];
			}
		}
	break;
	// ADD STUDENT
	case 'insert':

		// Sets action for the students-form template
		$act = "insert";

		include AP_SITE.'/../src/views/students-form.tpl';

		// If the form is submitted
		if ($_POST['formSubmit']) {

			$result = $StudentModel->addStudent();

			if ($result['code'] == 'ok') {
				header("Location: /public/index.php?action=show-all-students");
			}
			else {
				echo $result['message'];
			}
		}
	break;
	// SORTING THE TABLE
	case 'sort':
		if (isset($_GET['sort'])) {
			$sort = $_GET['sort'];	// Getting the sort type
		}
	
		// Setting the sort order
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

		$allStudents = $StudentModel->getAllSortedStudents($sort, $current_sort_order);

		include AP_SITE.'/../src/views/students-list.tpl';
	break;
	// DISPLAYS ALL STUDENTS IN TABLE
	case 'show-all-students':

		$allStudents = $StudentModel->getAllStudents();

		include AP_SITE.'/../src/views/students-list.tpl';

	break;
	// AJAX CALL TO DB
	case 'search-submit':

		$allStudents = $StudentModel->getSearchedStudents();

		if (is_array($allStudents) && !empty($allStudents)) {
			include AP_SITE.'/../src/views/students-list.tpl';
		}
		else {
			echo 'Студентът не е намерен';
		}

	break;
	default:
		include AP_SITE.'/../src/views/students-search-ajax.tpl';
	break;
}



