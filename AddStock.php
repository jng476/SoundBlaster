<?php 
include 'connect.php';
$permissions = array(
    "product"=>3
);
include 'check-authorisation.php';
$query = "SELECT product.ID FROM product ORDER BY product.ID";
$stmt = $mysql->prepare($query);
$stmt->execute();

?> 

<html>
	<head>
		 <title>Add Product To Stock</title>		
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
						<h2><u> Added Item </u></h2>
						</br>
						<table id="AddItem"
						</thead>
						
						<tbody>
						<form method="post" action="UpdateStock.php?BranchID=<?php echo $_GET['BranchID'];?>" >
						<tr> 
						<td>Product ID<select name="ProductID" >
						 <?php  foreach($stmt->fetchAll() as $result): ?>
						 <option value="<?php echo $result['ID']; ?>" name="ProductID" > <?php echo $result['ID']; ?> </option>
						 <?php endforeach; ?>
						</select>
						</td>
						</tr>
						<tr>
						<td>Store Price <input type="number" name="StorePrice" min="0" /></td>
						</tr>
						<tr>
						<td>Stock <input type="number" name="Stock" min="0" /></td>
						</tr>
						<tr>
						<td><input type="submit" value="Add Product"/></td>
						</form>
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