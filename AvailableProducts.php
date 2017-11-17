<?php 
include 'connect.php';
if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
}
$query = "SELECT* FROM product";
$stmt = $mysql->prepare($query);
$stmt->execute();

?> 

<html>
	<head>
		 <title>Available Products</title>		
		<?php include 'scripts.html'?>

		
	</head>
	<body>
		
				
				
		<div id="container">
						
			<div id="nav">
 				<?php include 'navigation.php'; ?>
			</div>
			
			
			<div id="content">
				
				
				<div id="main">
					</br>
					</br>
					
					<div id="bubbleText">
					<table>
					<thead>
						<h2><u> Products </u></h2>
						</br>
						<table id="BasketTable">
						<thead>
						<td>Product ID</td>
						<td>Supplier ID</td>
						<td>Category ID</td>
						<td>Product Name</td>
						<td>Description</td>
						<td>Brand</td>
						<td>Suppliers Price</td>
						<td>Online Price</td>
						<td>Available</td>
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
							<td><?php echo "&pound;".$result['SupplierCost']; ?></td>
							<td><?php echo "&pound;".$result['OnlinePrice']; ?></td>
							<td><?php echo $result['Available']; ?></td>
							<td><a href="UpdateProducts.php?ID=<?php echo $result['ID']; ?>"> Update Product </a></td>
							</tr>
						<?php endforeach; ?>
						 <tr> 
						 <form method="post" action="UpdateProducts.php" >
						 <td><input type="submit" value="AddProduct" /></td>
						 </tr>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		</br>
		</br>
		</br>
		<div id="footer">
				Created in 2017 by Team 7
		</div>
	</body>
	</html>