<?php

include 'connect.php';
if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
} 

$where = "WHERE ";
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	if($_GET['id'] != ''){
	$where = $where."id = ".$_GET['id']." AND ";
	}
	if($_GET['supplier'] != ''){
		
		$where = $where." SupplierID = ".$_GET['supplier']." AND ";
	}
	if($_GET['category'] != ''){
		
		$where = $where." CategoryID = ".$_GET['category']." AND ";
	}
	if($_GET['name'] != ''){
		
		$where = $where." Name LIKE '%".$_GET['name']."%' AND ";
	}
	if($_GET['brand'] != ''){
		
		$where = $where." Brand = ".$_GET['brand']." AND ";
	}
	if($_GET['price'] != ''){
		
		$where = $where." OnlinePrice <= ".$_GET['price']." AND ";
	}
	
	
	
}

$where = $where."TRUE = TRUE ";

if (isset($_GET['priceSort'])){
	if($_POST['priceSort'] == 'Yes'){
		
		$where = $where."ORDER BY OnlinePrice";
		
	}
	
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
			<form method="get" action="searchTable.php">
				<div class="form-group">
				<label for "id">ID</label>
				<input type="text" class="form-control" size="10" name="id"><br/>
				<label for "supplier">SupplierID</label>
				<input type="text" class="form-control" size="10" name="supplier"><br/>
				<label for "category">CategoryID</label>
				<input type="text" class="form-control" size="10" name="category"><br/>
				<label for "name">Name</label>
				<input type="text" class="form-control" size="10" name="name"><br/>
				<label for "brand">Brand</label>
				<input type="text" class="form-control" size="10" name="brand"><br/>
				<label for "price">Max Price</label>
				<input type="text" class="form-control" size="10" name="price"><br/>
				<label for "priceSort">Sort by Price</label>
				<input type="checkbox" name="priceSort" value="Yes"><br/>
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
			<td>SupID</td>
			<td>CatID</td>
			<td>Name</td>
			<td>Des</td>
			<td>Brand</td>
			<td>Price</td>
			<td>Amount</td>
		</thead>
		
		<tbody>
		<form method="post" action="addBasket.php">
			<?php  foreach($stmt->fetchAll() as $result): ?>
			<tr>
				<td><?php echo $result['ID']; ?></td>
				<td><?php echo $result['SupplierID']; ?></td>
				<td><?php echo $result['CategoryID']; ?></td>
				<td><?php echo $result['Name']; ?></td>
				<td><?php echo $result['Description']; ?></td>
				<td><?php echo $result['Brand']; ?></td>
				<td><?php echo $result['OnlinePrice']; ?></td>
				<td><input type="text" class="form-control" size="10" name="amount[<?php echo $result['ID'] ?>]"><br/></td>
				<td><input type="submit" value="Add To Basket"></td>
			</tr>
			<?php endforeach; ?>
		</form>
		</tbody>
		</div>
	</table>
	</body>
</html>