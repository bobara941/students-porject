<?php

	include 'header.php';

?>

	<div id="content">
			<form action="update_db.php" method="POST">
			<input type="hidden" name="formSubmit" value="1">
				<div class="form-group">
					<label for="Ime">Име:</label>
					<input type="text" class="form-control" name="ime" id="ime" value="<?php echo $row['ime']; ?>">
				</div>
				<div class="form-group">
					<label for="lastName">Фамилия:</label>
					<input type="text" class="form-control" name="fam" id="fam" value="<?php echo $row['fam']; ?>">
				</div>
				<div class="form-group">
					<label for="fakNom">Факултетен номер:</label>
					<input type="text" class="form-control" name="fn" id="fn" value="<?php echo $_POST['fn']; ?>">
				</div>
				<div class="form-group">
					<label for="Specialty">Специалност:</label>
					<input type="text" class="form-control" name="spec" id="spec" value="<?php echo $_POST['spec']; ?>">
				</div>
				<div class="form-group">
					<label for="Course">Курс:</label>
					<input type="text" class="form-control" name="kurs" id="kurs" value="<?php echo $_POST['kurs']; ?>">
				</div>
				<div class="form-group">
					<label for="Group">Група:</label>
					<input type="text" class="form-control" name="grupa" id="grupa" value="<?php echo $_POST['grupa']; ?>">
				</div>

				<input type="submit" id="frm" value="Промени">
			</form>
		</div>

<?php

	// Close HTML
	include 'footer.php';

	include 'check_input.php';

		$id = $_GET['id'];
		$firstName = check_input($_POST['ime']);
		$lastName = check_input($_POST['fam']);
		$fakNom = check_input(intval($_POST['fn']));
		$specialty = check_input($_POST['spec']);
		$course = check_input(intval($_POST['kurs']));
		$group = check_input($_POST['grupa']);

		// Opening database connection
		include 'db_connection.php';

		// Checking if the form is submitted
		if ($_POST['formSubmit']) {

			include 'validation.php';

			// Validating the result
			$result = validateStudent($firstName, $lastName, $fakNom, $specialty, $course, $group);

			if($result['code'] == 'ok') {
				$query = "UPDATE students SET fak_nom='$fakNom', ime='$firstName', fam='$lastName', spec='$specialty', course='$course', grupa='$group' WHERE fak_nom='$id'";

				$result2 = $dbc->query($query) or die ("Query Failed: " . mysqli_error($dbc));

				//TODO

				if ($result2) {
					header("Location: index.php");
				} else {
					echo 'Грешка при промяната на студента';
				}

				// Closing the database connection
				$dbc->close();
			}
			else {
				echo $result['message'];
			}

		}

		include 'nazad.html';