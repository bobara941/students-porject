<?php

define("AP_SITE", realpath(dirname(__FILE__)));

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../src/system/DB.php';
require_once '../src/models/Student.php';

$mydb = new DB();

$StudentModel = new Student($mydb);

$mas = $StudentModel->getAllStudents();



/*function __autoload($class_name) {
	$filename = 'class_'.strtoupper($class_name). '.php';
	$file = AP_SITE.'src/system'.$filename;


	if (file_exists($file) == false) {
		return false;
	}

	include ($file);
}


$mydb->query('SELECT * FROM students');

$row = $mydb->resultset();

$rowlen = count($row);*/


echo '<table border="1px solid black" style="text-align:center;width:70%">';
echo '<tr>
	<th>Име:</th>
	<th>Фамилия</th>
	<th>Факултетен номер:</th>
	<th>Специалност:</th>
	<th>Курс:</th>
	<th>Група:</th>';
for ($i = 0; $i < count($mas); $i++) {
	echo "<tr>";
			echo "<td>" . $mas[$i]['ime'] . "</td>";
			echo "<td>". $mas[$i]['fam'] ."</td>";
			echo "<td>". $mas[$i]['fak_nom'] ."</td>";
			echo "<td>" . $mas[$i]['spec'] . "</td>";
			echo "<td>" . $mas[$i]['course'] . "</td>";
			echo "<td>" . $mas[$i]['grupa'] . "</td>";
	echo "<tr>";
}

echo "</table>";