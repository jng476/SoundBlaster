<?php 
// https://zeno.computing.dundee.ac.uk/2017-ac32006/joshng/viewSupplier.php?supplierID=1 
// link above for the get. 
include 'connect.php';
if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
}
$query = "SELECT customer.*, GROUP_CONCAT(address.Line1, address.Line2) AS Address FROM customer
JOIN address ON address.ID = customer.AddressID WHERE customer.ID = ".$_GET['ID'];
$stmt = $mysql->prepare($query);
$stmt->execute();

?> 

<html>
	<head>
		 <title> User Accounts</title>		
		<?php include 'scripts.html'?>
		<link rel="stylesheet" type="text/css" href="style.css" />
		
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
					<table style="width:100%">
					<thead>
						<h2><u>  </u></h2>
						</br>
						<table id="">
						<thead>
						<td>FirstName</td>
						<td>LastName</td>
						<td>Address</td>
						<td>Email</td>
						
						</thead>
		
						<tbody?>
						<?php foreach($stmt->fetchAll() as $result): ?>
							<tr>
							<td><?php echo $result['ID']; ?></td>
							<td><?php echo $result['FirstName']; ?></td>
							<td><?php echo $result['LastName']; ?></td>
							<td><?php echo $result['Address']; ?></td>
							<td><?php echo $result['Email']; ?></td>
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