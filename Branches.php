<?php 
// https://zeno.computing.dundee.ac.uk/2017-ac32006/joshng/viewSupplier.php?supplierID=1 
include 'connect.php';

$permissions = array(
    "branch"=>"0"
);
include 'check_authorisation.php';
$query = "SELECT * FROM branch";
$stmt = $mysql->prepare($query);
$stmt->execute();

?> 

<html>
	<head>
		 <title>Branches</title>		
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
						<h2><u> Branches </u></h2>
						</br>
						<table id="basketTable">
						<thead>
						<td>ID</td>
						<td>Name</td>
						<td>Phone</td>
						<td>Email</td>
						</thead>
		
						<tbody?>
						<?php foreach($stmt->fetchAll() as $result): ?>
							<tr>
							<td><?php echo $result['ID']; ?></td>
							<td><?php echo $result['AddressID']; ?></td>
							<td><?php echo $result['Phone']; ?></td>
							<td> <a class="nav-link" href="https://zeno.computing.dundee.ac.uk/2017-ac32006/joshng/Employee.php?branchID=<?php echo $result['ID']; ?>">View Staff </a></td>
							<td> <a class="nav-link" href="https://zeno.computing.dundee.ac.uk/2017-ac32006/joshng/BranchProducts.php?branchID=<?php echo $result['ID']; ?>">View Products </a> </td>
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