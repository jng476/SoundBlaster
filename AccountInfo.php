<?php 
// https://zeno.computing.dundee.ac.uk/2017-ac32006/joshng/viewSupplier.php?supplierID=1 
include 'connect.php';
if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
}
if($_SESSION['user_type'] == "customer"){
$query = "USE 17ac3d07;
SELECT customer.*, address.LINE1, address.LINE2, address.PostCode, address.Country, address.City, GROUP_CONCAT(address.LINE1, address.LINE2) AS Address FROM customer 
JOIN useraccount on useraccount.customerid = customer.id
INNER JOIN address on address.ID = customer.AddressID 
where username = :Username";
}else{
	$query = "USE 17ac3d07;
	SELECT staff.*, address.LINE1, address.LINE2, address.PostCode, address.Country, address.City, GROUP_CONCAT(address.LINE1, address.LINE2) AS Address FROM staff
JOIN useraccount on useraccount.staffid = staff.id
INNER JOIN address on address.ID = staff.AddressID 
where username = :Username";
}
$stmt = $mysql->prepare($query);
$stmt->bindParam(':Username', $_SESSION['username']);
$stmt->execute();
?> 
<!DOCTYPE html>
<html>
	<head>
		 <title>User Accounts</title>		
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
						<h2><u> User Accounts </u></h2>
						</br>
						<table id="basketTable">
						<thead>
  <?php foreach($stmt->fetchAll() as $result): ?>
  <tr>
   <?php if(!isset($_GET['edit'])){ ?>
    <td>FirstName: <?php echo $result['FirstName']?></td>
   <?php } ?>
   <?php if(isset($_GET['edit'])){ ?>
    <form method="post" action="UpdateAccount.php">
    <td>FirstName: <input type="text" class="form-control" name="FirstName" value="<?php echo $result['FirstName']?>"> </td>
   <?php } ?>
  </tr>
  <tr>
	<?php if(!isset($_GET['edit'])){ ?>
    <td>LastName: <?php echo $result['LastName']?></td>
	<?php } ?>
	<?php if(isset($_GET['edit'])){ ?>
    <td>LastName: <input type="text" class="form-control" name="LastName" value="<?php echo $result['LastName']?>"> </td>
   <?php } ?>
  </tr>
  <tr>
	<?php if(!isset($_GET['edit'])){ ?>
    <td>Address: <?php echo $result['Address']?></td>
	<?php } ?>
	<?php if(isset($_GET['edit'])){ ?>
    <td>Address LINE1: <input type="text" class="form-control" name="Line1" value="<?php echo $result['LINE1']?>"> </td>
  </tr>
  <tr>  
	<td>Address LINE2: <input type="text" class="form-control" name="Line2" value="<?php echo $result['LINE2']?>"> </td>
	
   <?php } ?>
  </tr>
  <tr>
	<?php if(!isset($_GET['edit'])){ ?>
    <td>PostCode: <?php echo $result['PostCode']?></td>
	<?php } ?>
	<?php if(isset($_GET['edit'])){ ?>
    <td>PostCode: <input type="text" class="form-control" name="PostCode" value="<?php echo $result['PostCode']?>"> </td>
   <?php } ?>
  </tr>
  <tr>
  <tr>
	<?php if(!isset($_GET['edit'])){ ?>
    <td>City: <?php echo $result['City']?></td>
	<?php } ?>
	<?php if(isset($_GET['edit'])){ ?>
    <td>City: <input type="text" class="form-control" name="City" value="<?php echo $result['City']?>"> </td>
   <?php } ?>
  </tr>
  <tr>
  <tr>
	<?php if(!isset($_GET['edit'])){ ?>
    <td>Country: <?php echo $result['Country']?></td>
	<?php } ?>
	<?php if(isset($_GET['edit'])){ ?>
    <td>Country: <input type="text" class="form-control" name="Country" value="<?php echo $result['Country']?>"> </td>
   <?php } ?>
  </tr>
  <tr>
  <tr>
  <?php if($_SESSION['user_type'] == "customer"){ ?>
	<?php if(!isset($_GET['edit'])){ ?>
    <td>Email: <?php echo $result['Email']?></td>
	<?php } ?>
	<?php if(isset($_GET['edit'])){ ?>
    <td>Email: <input type="text" class="form-control" name="Email" value="<?php echo $result['Email']?>"> </td>
  <?php } } ?>
  </tr>
  <tr>
	<?php if(!isset($_GET['edit'])){ ?>
	<td><a href="AccountInfo.php?edit=Yes"> Edit Account Info </a></td>
	<?php } ?>
	<?php if(isset($_GET['edit'])){ ?>
	<td><input type="submit" value="Update"><a href="AccountInfo.php?"> Cancel </a></td>
    </form>
	<?php } ?>
  </tr>
  <?php endforeach; ?>
</table>
</table>

</body>
</html>
