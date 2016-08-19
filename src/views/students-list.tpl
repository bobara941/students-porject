<!DOCTYPE html>
<html>
	<head>
		<title>My First Project</title>
		<script src="../public/js/jquery.min.js"></script>
		<script src="../public/js/deleteConfirmation.js"></script>
		<link rel="stylesheet" href="css/font-awesome.min.css">
	</head>
<body>
<table border="1px solid black" style="text-align:center;width:70%">
<tr>
	<th><a href="../public/index.php?action=sort&sort=ime&sort_order=<?php echo $sort_order;?>">Име<?php if ($_GET['sort'] == 'ime') {?><i class="fa fa-caret-<?=$sort_css_class?>"></i><?php } ?></a></th>
	<th><a href="../public/index.php?action=sort&sort=fam&sort_order=<?php echo $sort_order;?>">Фамилия<i class="fa fa-caret-down"></a></th>
	<th><a href="../public/index.php?action=sort&sort=fak_nom&sort_order=<?php echo $sort_order;?>">Факултетен номер<i class="fa fa-caret-down"></th>
	<th><a href="../public/index.php?action=sort&sort=spec&sort_order=<?php echo $sort_order;?>">Специалност<i class="fa fa-caret-down"></th>
	<th><a href="../public/index.php?action=sort&sort=course&sort_order=<?php echo $sort_order;?>">Курс<i class="fa fa-caret-down"></th>
	<th><a href="../public/index.php?action=sort&sort=grupa&sort_order=<?php echo $sort_order;?>">Група<i class="fa fa-caret-down"></th>
<?php for ($i = 0; $i < count($allStudents); $i++) { ?>
	<tr>
			<td><?=$allStudents[$i]['ime']?></td>
			<td><?=$allStudents[$i]['fam']?></td>
			<td><?=$allStudents[$i]['fak_nom']?></td>
			<td><?=$allStudents[$i]['spec']?></td>
			<td><?=$allStudents[$i]['course']?></td>
			<td><?=$allStudents[$i]['grupa']?></td>
			<td><a href=javascript:confirmDelete('?action=delete&id=<?=$allStudents[$i]['fak_nom']?>')>Изтриване</a></td>
			<td><a href='?action=update&id=<?=$allStudents[$i]['fak_nom']?>'>Промяна</a></td>
	<tr>
<?php } ?>

</table>

<a href="/public/index.php?action=insert">Добавяне на студент</a>

</body>
</html>