<?php
// https://zeno.computing.dundee.ac.uk/2017-ac32006/joshng/viewSupplier.php?supplierID=1
include 'connect.php';
if($_SESSION['login']!="Logged in"){
    header("Location: login.php");
    die();
}
$query = "USE 17ac3d07; SELECT customer_order.ID, address.Line1, address.line2, customer_order.status, customer_order.date, ROUND(SUM(orderline.price), 2) AS price, customer_order.trackingID  FROM customer_order
JOIN orderline ON customer_order.ID = orderline.OrderID
JOIN address ON customer_order.AddressID = address.id
where customerid = (SELECT useraccount.customerid from useraccount where username = :Username)
GROUP BY customer_order.ID";
$stmt = $mysql->prepare($query);
$stmt->bindParam(':Username', $_SESSION['username']);
$stmt->execute();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Orders</title>
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
                    <table id="orderTable">
                        <thead>
                            <h2><u> Orders </u></h2>
                </br>
                <table id="basketTable">
                    <thead>
                        <td>ID</td>
                        <td>AddresLine1</td>
                        <td>AddresLine2</td>
                        <td>Status</td>
                        <td>Date</td>
                        <td>Price</td>
                        <td>TrackingID</td>
                    </thead>
                    <tbody?>
                        <?php foreach($stmt->fetchAll() as $result): ?>
                            <tr>
                                <td><?php echo $result['ID']; ?></td>
                                <td><?php echo $result['Line1']; ?></td>
                                <td><?php echo $result['line2']; ?></td>
                                <td><?php echo $result['status']; ?></td>
                                <td><?php echo $result['date']; ?></td>
                                <td><?php echo $result['price']; ?></td>
                                <td><?php echo $result['trackingID']; ?></td>
                                <td> <a class="nav-link" href="ProductsInOrder.php?ID=<?php echo $result['ID']; ?>">View Products </a> </td>
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
