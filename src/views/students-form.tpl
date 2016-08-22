<!DOCTYPE html>
<html>
<head>
		<title>My First Project</title>
		<link rel="stylesheet" href="../../public/css/mystyle.css">
		<script src="../public/js/jquery.min.js"></script>
		<!-- Javascript validation -->
		<script src="../../public/js/validateForm.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
<body>

<form action="../public/index.php?action=<?php echo $act;?>" method="post" name="myForm">
		<input type="hidden" name="formSubmit" value="1">
		<div class="form-group">
			<label for="ime">Име:</label>
			<input type="text" class="form-control" name="ime" id="ime" value="<?php if (isset($_POST['ime'])) {echo $_POST['ime'];} else {echo $std['ime'];} ?>">
		</div>
		<div class="form-group">
			<label for="lastName">Фамилия:</label>
			<input type="text" class="form-control" name="fam" id="fam" value="<?php if (isset($_POST['fam'])) {echo $_POST['fam'];} else {echo $std['fam'];}?>">
		</div>
		<div class="form-group">
			<label for="fakNom">Факултетен номер: (дължина 6 символа само цифри)</label>
			<input type="text" class="form-control" name="fn" id="fn" value="<?php if(isset($_POST['fn'])) {echo $_POST['fn'];} else {echo $std['fak_nom'];} ?>">
		</div>
		<div class="form-group">
			<label for="Specialty">Специалност:</label>
			<input type="text" class="form-control" name="spec" id="spec" value="<?php if (isset($_POST['spec'])) {echo $_POST['spec'];} else {echo $std['spec'];} ?>">
		</div>
		<div class="form-group">
			<label for="Course">Курс:</label>
			<input type="text" class="form-control" name="kurs" id="kurs" value="<?php if (isset($_POST['kurs'])) {echo $_POST['kurs'];} else {echo $std['course'];} ?>">
		</div>
		<div class="form-group">
			<label for="Group">Група:</label>
			<input type="text" class="form-control" name="grupa" id="grupa" value="<?php if (isset($_POST['grupa'])) {echo $_POST['grupa'];} else {echo $std['grupa'];}?>">
		</div>

		<button type="submit" id="sbt" class="btn btn-default">Напред</button>
</form>

</body>

</html>