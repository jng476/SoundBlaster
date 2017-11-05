<?php

include 'connect.php';
if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
}
$where = "WHERE ";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if($_POST['id'] != ''){
	$where = $where."id = ".$_POST['id']." AND ";
	}
	if($_POST['supplier'] != ''){
		
		$where = $where." SupplierID = ".$_POST['supplier']." AND ";
	}
	if($_POST['category'] != ''){
		
		$where = $where." CategoryID = ".$_POST['category']." AND ";
	}
	if($_POST['name'] != ''){
		
		$where = $where." Name = ".$_POST['name']." AND ";
	}
	if($_POST['brand'] != ''){
		
		$where = $where." Brand = ".$_POST['brand']." AND ";
	}
	if($_POST['price'] != ''){
		
		$where = $where." OnlinePrice = ".$_POST['price']." AND ";
	}
	
	$where = $where."TRUE";
} else {
	$where = $where."TRUE = TRUE";
	
}
$query = "SELECT * FROM product $where";
$stmt = $mysql->prepare($query);
$stmt->execute();


?>

<html>
	<head>
  <title>Search Table</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<h2>Search</h2>
			<form method="post" action="searchTable.php">
				<div class="form-group">
				<label for "id">ID</label>
				<input type="text" calss="form-control" size="35" name="id"><br/>
				<label for "supplier">SupplierID</label>
				<input type="text" calss="form-control" size="35" name="supplier"><br/>
				<label for "category">CategoryID</label>
				<input type="text" calss="form-control" size="35" name="category"><br/>
				<label for "name">Name</label>
				<input type="text" calss="form-control" size="35" name="name"><br/>
				<label for "brand">Brand</label>
				<input type="text" calss="form-control" size="35" name="brand"><br/>
				<label for "price">Price</label>
				<input type="text" calss="form-control" size="35" name="price"><br/>
			</div>
				<input type="submit" value="Search">
			</form>
			<form method="post" action="logout.php">
				<input type="submit" value="Logout">
			</form>
		</div>
		<div class="container">
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
			<?php  foreach($stmt->fetchAll() as $result): ?>
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
		</div>
	</table>
	</body>
</html>