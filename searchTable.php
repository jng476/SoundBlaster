<?php

include 'connect.php';
$table=$_POST['table'];
$query = "SELECT * FROM $table";
$stmt = $mysql->prepare($query);
$stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP</title>
	<style>
		table,
		td{
			border: 1px solid black;
		}
		thead{
			font-weight: 700;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<td>ID</td>
			<td>SupplierID</td>
			<td>CategoryID</td>
			<td>Name</td>
			<td>Description</td>
			<td>Brand</td>
			<td>SupplierCost</td>
			<td>OnlinePrice</td>
		</thead>
		
		<tbody>
			<?php foreach($stmt->fetchAll() as $result): ?>
			<tr>
				<td><?php echo $result['ID']; ?></td>
				<td><?php echo $result['SupplierID']; ?></td>
				<td><?php echo $result['CategoryID']; ?></td>
				<td><?php echo $result['Name']; ?></td>
				<td><?php echo $result['Description']; ?></td>
				<td><?php echo $result['Brand']; ?></td>
				<td><?php echo $result['SupplierCost']; ?></td>
				<td><?php echo $result['OnlinePrice']; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>

	</table>
</body>
</html>