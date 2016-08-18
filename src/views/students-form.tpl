<!DOCTYPE html>
<html>
<head>
		<title>My First Project</title>
		<script src="../public/js/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
<body>
<form action="../public/index.php?action=inserted" method="post">
		<input type="hidden" name="formSubmit" value="1">
		<div class="form-group">
			<label for="ime">Име:</label>
			<input type="text" class="form-control" name="ime" id="ime">
		</div>
		<div class="form-group">
			<label for="lastName">Фамилия:</label>
			<input type="text" class="form-control" name="fam" id="fam">
		</div>
		<div class="form-group">
			<label for="fakNom">Факултетен номер: (дължина 6 символа само цифри)</label>
			<input type="text" class="form-control" name="fn" id="fn">
		</div>
		<div class="form-group">
			<label for="Specialty">Специалност:</label>
			<input type="text" class="form-control" name="spec" id="spec">
		</div>
		<div class="form-group">
			<label for="Course">Курс:</label>
			<input type="text" class="form-control" name="kurs" id="kurs">
		</div>
		<div class="form-group">
			<label for="Group">Група:</label>
			<input type="text" class="form-control" name="grupa" id="grupa">
		</div>

		<button type="submit" class="btn btn-default">Добавяне</button>
</form>
</body>
</html>