<?php 
// https://zeno.computing.dundee.ac.uk/2017-ac32006/joshng/viewSupplier.php?supplierID=1 
include 'connect.php';
if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
}
$query = "'".$_SESSION['username']."')
GROUP BY customer_order.ID";
$stmt = $mysql->prepare($query);
$stmt->execute();

?> 

<html>
	<head>
		 <title>User Accounts</title>		
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
<table>
<thead>
						<h2><u> User Accounts </u></h2>
						</br>
						<table id="basketTable">
						<thead>
  
  <tr>
    <td>FirstName<?php echo $result['firstname']?></td>
    
    <th></th>
    <th></th>
  </tr>
  <tr>
  
 
    <td>LastName<?php echo $result['lastname']?></td>
   >
    <td></td>
    <td></td>
  </tr>
  
  <tr>
    <td>Address<?php echo $result['address']?></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Email<?php echo $result['email']?></td>
    <td></td>
    <td></td>
  </tr>
</table>
</table>

</body>
</html>
