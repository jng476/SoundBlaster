<?php 
// https://zeno.computing.dundee.ac.uk/2017-ac32006/joshng/viewSupplier.php?supplierID=1 
include 'connect.php';
if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
}
$query = "SELECT staff.* FROM staff ";
if(isset($_GET['ID'])){
$query = $query."where staff.ID = ".$_GET['ID'];
}
$stmt = $mysql->prepare($query);
$stmt->execute();
?> 

<html>
	<head>
		 <title>Edit Employee</title>		
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
						<h2><u> Edit Employee </u></h2>
						</br>
						<table id="basketTable">
						<thead>
  <tr>
   
    <form method="post" action="UpdateAccount.php">
	<?php if(isset($_GET['ID'])){ 
	 foreach($stmt->fetchAll() as $result): ?>
    <td>ID: <?php echo $result['ID']; ?> </td>
  </tr>
  <tr> 
  <td>FirstName: <?php echo $result['FirstName']; ?> </td>
  </tr>
  <tr>
    <td>LastName: <?php echo $result['LastName']?> </td>
  </tr>
	<?php endforeach; }else{ ?>
	<td>Staff ID: <select name="Department"> 
		<?php foreach($stmt->fetchAll() as $result): ?>
		<option value=<?php echo $result['ID']; ?>><?php echo $result['ID']; ?></option>
		<?php endforeach;
	}		?>
	
  <tr>
    <td>Department: <select name="Department" <?php if(isset($_GET['ID'])){ ?> value= <?php echo $result['departmentID']; } ?> >
                                    <option value=1>Human Resources</option>
                                    <option value=2>PayRoll</option>
                                    <option value=3>Sales</option>
                                    <option value=4>IT</option>
                                    <option value=5>Purchasing</option>
                                    <option value=6>Public Relations</option>
                                    <option value=7>Customer Service</option>
                                    <option value=8>Branch Staff</option>
                                </select></td>
  </tr>
  <tr>
	<td>Branch ID: <select name="BranchID" <?php if(isset($_GET['ID'])){ ?> value = <?php echo $result['BranchID']; }?> >
									<?php for($i=1; $i<21; $i++){ ?>
									<option value=<?php echo $i; ?> > <?php echo $i; ?> </option>
									<?php } ?>
									</select></td>
  </tr>
  <td>Is Manager: <select name="IsManager" <?php if(isset($_GET['ID'])){ ?> value = <?php echo $result['IsManager']; }?> >
                                    <option value=0 >No</option>
                                    <option value=1>Yes</option>
                                </select></td>
  </tr>
  <tr>
	<td><input type="submit" value="Update"><a href="Branches.php?"> Cancel </a></td>
    </form>
  </tr>
</table>
</table>

</body>
</html>