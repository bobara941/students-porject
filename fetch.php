<?php
	
	// Opening database connection
	include 'db_connection.php';

	$output = '';
	$sql = "SELECT * FROM students WHERE ime LIKE '%".$_POST["search"]."%' OR fam LIKE '%".$_POST["search"]."%'";
	$result = mysqli_query($dbc, $sql);
	if (mysqli_num_rows($result) > 0) {
		$output .= '<h4 align="center">Резултат от търсенето</h4>';
		$output .= '<table border="1px solid black" style="text-align:center;width:70%">';
		$output .= '<tr><th>Име</th><th>Фамилия</th><th>Факултетен номер</th><th>Специалност</th><th>Курс</th><th>Група</th></tr>';
		while ($row = mysqli_fetch_array($result)) {
			$output .= '<tr>
			<td>' . $row['ime'] . '</td>
			<td>'. $row['fam'] .'</td>
			<td>'. $row['fak_nom'] .'</td>
			<td>' . $row['spec'] . '</td>
			<td>' . $row['course'] . '</td>
			<td>' . $row['grupa'] . '</td>
			</tr>';
		}
		echo $output;
	}
	else {
		echo 'Студентът не е намерен';
	}

	// Close the database connection
	$dbc->close();