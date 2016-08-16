<?php

	// Open database connection
	include 'db_connection.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM students WHERE fak_nom='$id'";

	if($dbc->query($sql) == TRUE) {
		echo 'Студента е изтрит успешно';
		header("Location: index.php");
	}
	else {
		echo "Грешка при изтриване на студента: " . $dbc->error;
	}

	// Closing the database connection
	$dbc->close();

	
	