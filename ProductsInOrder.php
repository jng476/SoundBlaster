<?php
// https://zeno.computing.dundee.ac.uk/2017-ac32006/joshng/viewSupplier.php?supplierID=1
include 'connect.php';
if($_SESSION['login']!="Logged in"){
    header("Location: login.php");
    die();
}
$query = "SELECT product.Name, product.description, (product.OnlinePrice*orderline.quantity) AS Price, orderline.quantity AS Ammount FROM orderline
JOIN product ON product.ID = orderline.ProductID
where orderline.OrderID = :ID";
$stmt = $mysql->prepare($query);
$stmt->bindParam(':ID', $_GET['ID']);
$stmt->execute();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ordered Items</title>
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
                    <table id= "view_order_table">
                        <thead>
                            <h2><u> Ordered Items </u></h2>
                </br>
                <table id="basketTable">
                    <thead>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Price</td>
						<td>Ammount</td>
                    </thead>

                    <tbody?>
                        <?php foreach($stmt->fetchAll() as $result): ?>
                            <tr>
                                <td><?php echo $result['Name']; ?></td>
                                <td><?php echo $result['description']; ?></td>
                                <td><?php echo "&pound;".$result['Price']; ?></td>
								<td><?php echo $result['Ammount']; ?></td>
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
