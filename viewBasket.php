<?php 

include 'Basket.php';
include 'connect.php';
$basket = $_SESSION['Basket'];
?> 

<html>
	<head>
  <title>Basket</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php include 'scripts.html'?>
	</head>
	<body>
		<?php include 'navigation.php' ?>
		<div class="container">
		<table>
		<thead>
			<td>Name</td>
			<td>Quantity</td>
			<td>Price</td>
		</thead>
		
		<tbody?>
			<?php for($i=0; $i<$_SESSION['Basket']->index; $i++){ ?>
			<tr>
				<?php $query = "SELECT Name, OnlinePrice FROM product WHERE ID = ".$_SESSION['Basket']->ID[$i];
					  $stmt = $mysql->prepare($query);
					  $stmt->execute();
				?>
				<?php foreach($stmt->fetchAll() as $result): ?>
				<td><?php echo $result['Name']; ?></td>
				<td><?php echo $_SESSION['Basket']->amount[$i]; ?></td>
				<td><?php echo $result['OnlinePrice']; ?></td>
			</tr>
			<?php endforeach; ?>
			<?php } ?>
			</tbody>
			</div>
		</table>
		<form method="post" action="searchTable.php">
				<input type="submit" value="Back">
		</form>
	</body>
</html>
				
			