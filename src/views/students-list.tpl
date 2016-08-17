<table border="1px solid black" style="text-align:center;width:70%">
<tr>
	<th>Име:</th>
	<th>Фамилия</th>
	<th>Факултетен номер:</th>
	<th>Специалност:</th>
	<th>Курс:</th>
	<th>Група:</th>
<?php for ($i = 0; $i < count($mas); $i++) { ?>
	<tr>
			<td><?=$mas[$i]['ime']?></td>
			<td><?=$mas[$i]['fam']?></td>
			<td><?=$mas[$i]['fak_nom']?></td>
			<td><?=$mas[$i]['spec']?></td>
			<td><?=$mas[$i]['course']?></td>
			<td><?=$mas[$i]['grupa']?></td>
			<td><a href='?id=<?=$mas[$i]['fak_nom']?>'>Promqna</a></td>
	<tr>
<?php } ?>

</table>