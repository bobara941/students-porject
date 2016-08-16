<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="jquery.min.js"></script>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!--  -->
		<script src="myscript.js"></script>
		<style type="text/css">
			.container #search_text {
				margin-left: 430px;
				width: 400px;
				font-size: 20px;
			}
			#tst th a {
				text-decoration: none;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<input type="text" name="search_text" id="search_text" placeholder="Търсене по име">
			<br>
			<div id="result"></div>
		</div>
		<div class="tbl">
			<table id="tst" border="1px solid black" style="text-align:center;width:70%">
				<tr>
					<th><a href="index.php?sort=ime">Име: <i class="fa fa-caret-down"></a></th>
					<th><a href="index.php?sort=fam">Фамилия: <i class="fa fa-caret-down"></a></th>
					<th><a href="index.php?sort=fak_nom">Факултетен номер: <i class="fa fa-caret-down"></a></th>
					<th><a href="index.php?sort=spec">Специалност: <i class="fa fa-caret-down"></a></th>
					<th><a href="index.php?sort=course">Курс: <i class="fa fa-caret-down"></a></th>
					<th><a href="index.php?sort=grupa">Група: <i class="fa fa-caret-down"></a></th>
				</tr>
				</form>

				<?php

					//Opening database connection
					include 'db_connection.php';

					$sql = "SELECT * FROM students";
					// Checking how to sort
					if (isset($_GET['sort']) && $_GET['sort'] == 'ime') {
						$sql .= " ORDER BY ime $desc";
					}
					elseif ($_GET['sort'] == 'fam') {
						$sql .= " ORDER BY fam ASC";
					}
					elseif ($_GET['sort'] == 'fak_nom') {
						$sql .= " ORDER BY fak_nom ASC";
					}
					elseif ($_GET['sort'] == 'spec') {
						$sql .= " ORDER BY spec ASC";
					}
					elseif ($_GET['sort'] == 'course') {
						$sql .= " ORDER BY course ASC";
					}
					elseif ($_GET['sort'] == 'grupa') {
						$sql .= " ORDER BY grupa ASC";
					}

					$result = $dbc->query($sql);

					while($row = $result->fetch_assoc()) {
						?>
						<tr>
							<td><?php echo $row['ime'] ?></td>
							<td><?php echo $row['fam'] ?></td>
							<td><?php echo $row['fak_nom'] ?></td>
							<td><?php echo $row['spec'] ?></td>
							<td><?php echo $row['course'] ?></td>
							<td><?php echo $row['grupa'] ?></td>
							<td><a href="javascript:confirmDelete('delete.php?id=<?php echo $row[fak_nom]?>')">Изтриване</a></td>
							<td><a href="update_db.php?id=<?php echo $row[fak_nom]?>">Промяна</a></td>
						</tr>
						<br>

						<?php
					}
					// Closing database connection
					$dbc->close();
					?>
			</table>
		</div>
	</body>
</html>

<br><br><br>

<!--  -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.bla {
			margin-left: 500px;
		}
	</style>
</head>
<body>
	<a href="insert.php" class="bla">Добавяне на нов студент</a>
</body>
</html>
