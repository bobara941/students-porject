<?php
	include 'header.php';
?>

<form action="insert.php" method="post">
		<input type="hidden" name="formSubmit" value="1">
		<div class="form-group">
			<label for="ime">Име:</label>
			<input type="text" class="form-control" name="ime" id="ime" value="<?php echo $_POST['ime']; ?>">
		</div>
		<div class="form-group">
			<label for="lastName">Фамилия:</label>
			<input type="text" class="form-control" name="fam" id="fam" value="<?php echo $_POST['fam']; ?>">
		</div>
		<div class="form-group">
			<label for="fakNom">Факултетен номер: (дължина 6 символа само цифри)</label>
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

		<button type="submit" class="btn btn-default">Добавяне</button>
	</form>

<?php
	
	// Input validation
	include 'check_input.php';

	$firstName = check_input($_POST['ime']);
	$lastName = check_input($_POST['fam']);
	$fakNom = check_input(intval($_POST['fn']));
	$specialty = check_input($_POST['spec']);
	$course = check_input(intval($_POST['kurs']));
	$group = check_input($_POST['grupa']);

	include 'db_connection.php';

	if($_POST['formSubmit']) {

		include 'validation.php';
		
		$result = validateStudent($firstName, $lastName, $fakNom, $specialty, $course, $group);

		if($result['code'] == 'ok') {
			// Prepare the statement
			$stmt = $dbc->prepare("INSERT INTO `students` (`fak_nom`, `ime`, `fam`, `spec`, `course`, `grupa`) VALUES (?, ?, ?, ?, ?, ?)");
			$stmt->bind_param('isssis', $fakNom, $firstName, $lastName, $specialty, $course, $group);
			
			if(!$stmt->execute()) {
				printf("Error: %s\n", $dbc->error);
			}
			else {
				header("Location: index.php");
				echo 'Студентът е добавен' . '<br><br>';
				echo "Име: " . $firstName . '<br>';
				echo "Фамилия: " . $lastName . '<br>';
				echo "Факултетен номер: " . $fakNom . '<br>';
				echo "Специалност: " . $specialty . '<br>';
				echo "Курс: " . $course . '<br>';
				echo "Група: " . $group . '<br>';
			}

			// Closing the database connection
			$dbc->close();
		}
		else {
			echo $result['message'];
		}
	}
	
	include 'footer.php';

	include 'nazad.html';

	