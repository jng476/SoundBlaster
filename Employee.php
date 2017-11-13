<?php 
// https://zeno.computing.dundee.ac.uk/2017-ac32006/joshng/viewSupplier.php?supplierID=1 
// link above for the get. 
include 'connect.php';
if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
}
$query = "SELECT * FROM staff WHERE BranchID = ".$_GET['branchID'];
$stmt = $mysql->prepare($query);
$stmt->execute();

?> 

<html>
	<head>
		 <title>Employees</title>		
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
						<h2><u> Employees </u></h2>
						</br>
						<table id="basketTable">
						<thead>
						<td>Staff ID</td>
						<td>DepartmentId</td>
						<td>AddressID</td>
						<td>Frist Name</td>
						<td>Last Name Name</td>
						</thead>
		
						<tbody?>
						<?php foreach($stmt->fetchAll() as $result): ?>
							<tr>
							<td><?php echo $result['ID']; ?></td>
							<td><?php echo $result['DepartmentID']; ?></td>
							<td><?php echo $result['AddressID']; ?></td>
							<td><?php echo $result['FirstName']; ?></td>
							<td><?php echo $result['LastName']; ?></td>
							<td><a href="EditStaff.php?ID=<?php echo $result['ID']; ?>"> Update </a></td>
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