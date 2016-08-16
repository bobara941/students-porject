<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once '../src/system/DB.php';
$mydb = new DB();

$mydb->query('SELECT * FROM students');

$row = $mydb->resultset();

$rowlen = count($row);


echo '<table border="1px solid black" style="text-align:center;width:70%">';
echo '<tr>
	<th>Име:</th>
	<th>Фамилия</th>
	<th>Факултетен номер:</th>
	<th>Специалност:</th>
	<th>Курс:</th>
	<th>Група:</th>';
for ($i = 0; $i < $rowlen; $i++) {
	echo "<tr>";
			echo "<td>" . $row[$i]['ime'] . "</td>";
			echo "<td>". $row[$i]['fam'] ."</td>";
			echo "<td>". $row[$i]['fak_nom'] ."</td>";
			echo "<td>" . $row[$i]['spec'] . "</td>";
			echo "<td>" . $row[$i]['course'] . "</td>";
			echo "<td>" . $row[$i]['grupa'] . "</td>";
	echo "<tr>";
}

echo "</table>";