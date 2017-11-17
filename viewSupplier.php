<?php 
// https://zeno.computing.dundee.ac.uk/2017-ac32006/joshng/viewSupplier.php?supplierID=1 
// link above for the get. 
include 'connect.php';
$permissions = array(
    "product"=>1
);
include 'check-authorisation.php';
$query = "USE 17ac3d07; SELECT Name, Description, SupplierCost FROM Product WHERE SupplierID = ".$_GET['supplierID'];
$stmt = $mysql->prepare($query);
$stmt->execute();

?> 
<!DOCTYPE html>
<html>
	<head>
		 <title>Products</title>		
		<?php include 'scripts.html'?>
	</head>
	<body>
 				<?php include 'navigation.php'; ?>
		<div id="container">
			<div id="content">
				<div id="main">
		</br>
		</br>
					<div id="bubbleText">
					<table>
					<thead>
						<h2><u> Products </u></h2>
						</br>
						<table id="basketTable">
						<thead>
						<td>Name</td>
						<td>Description</td>
						<td>Supplier Price</td>
						</thead>
						<tbody>
						<?php foreach($stmt->fetchAll() as $result): ?>
							<tr>
							<td><?php echo $result['Name']; ?></td>
							<td><?php echo $result['Description']; ?></td>
							<td><?php echo "&pound;".$result['SupplierCost']; ?></td>
							</tr>
						<?php endforeach; ?>
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
