<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/mystyle.css">
</head>
<body>

	<input type="text" name="search_text" id="search_text" placeholder="Търсене по име">
	<div id="showall">
		<a href="index.php?action=show-all-students">Преглед на всички студенти</a>
	</div>
	<!-- DISPLAYS RETURNED AJAX DATA -->
	<div id="result"></div>
	<script src="../public/js/jquery.min.js"></script>
	<script src="../public/js/AJAXStudents.js"></script>
	<script src="../../public/js/deleteConfirmation.js"></script>
</body>
</html>
