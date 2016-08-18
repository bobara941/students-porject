<!DOCTYPE html>
<html>
<head>
		<title>My First Project</title>
		<script src="../public/js/jquery.min.js"></script>
		<script src="../public/js/deleteConfirmation.js"></script>
	</head>
<body>
<table border="1px solid black" style="text-align:center;width:70%">
<tr>
	<th>Име:</th>
	<th>Фамилия</th>
	<th>Факултетен номер:</th>
	<th>Специалност:</th>
	<th>Курс:</th>
	<th>Група:</th>
<?php for ($i = 0; $i < count($allStudents); $i++) { ?>
	<tr>
			<td><?=$allStudents[$i]['ime']?></td>
			<td><?=$allStudents[$i]['fam']?></td>
			<td><?=$allStudents[$i]['fak_nom']?></td>
			<td><?=$allStudents[$i]['spec']?></td>
			<td><?=$allStudents[$i]['course']?></td>
			<td><?=$allStudents[$i]['grupa']?></td>
			<td><a href=javascript:confirmDelete('?action=delete&id=<?=$allStudents[$i]['fak_nom']?>')>Iztrivane</a></td>
			<td><a href='?action=update&id=<?=$allStudents[$i]['fak_nom']?>'>Promqna</a></td>
	<tr>
<?php } ?>

</table>

<a href="/public/index.php?action=insert">Добавяне на студент</a>

</body>
</html>