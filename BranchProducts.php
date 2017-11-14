<?php 
// https://zeno.computing.dundee.ac.uk/2017-ac32006/joshng/viewSupplier.php?supplierID=1 
// link above for the get. 
include 'connect.php';
if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
}
$query = "SELECT * FROM product JOIN branchproduct ON product.ID = branchproduct.ProductID WHERE BranchID= ".$_GET['branchID'];
$stmt = $mysql->prepare($query);
$stmt->execute();

?> 

<html>
	<head>
		 <title>BranchProducts</title>		
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
						<h2><u> Branch Products </u></h2>
						</br>
						<table id="basketTable">
						<thead>
						<td>ID</td>
						<td>SupplierId</td>
						<td>CategoryID'</td>
						<td>Name</td>
						<td>Description</td>
						<td>Brand</td>
						<td>Supplier Cost</td>
						<td>Online Price</td>
						</thead>
		
						<tbody?>
						<?php foreach($stmt->fetchAll() as $result): ?>
							<tr>
							<td><?php echo $result['ProductID']; ?></td>
							<td><?php echo $result['SupplierID']; ?></td>
							<td><?php echo $result['CategoryID']; ?></td>
							<td><?php echo $result['Name']; ?></td>
							<td><?php echo $result['Description']; ?></td>
							<td><?php echo $result['Brand']; ?></td>
							<td><?php echo '&pound;'.$result['SupplierCost']; ?></td>
							<td><?php echo '&pound;'.$result['OnlinePrice']; ?></td>
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