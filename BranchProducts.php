<?php
include 'connect.php';
$permissions = array(
    "product"=>1
);
$query = "SELECT product.*, branchproduct.Stock FROM product
JOIN branchproduct ON product.ID = branchproduct.ProductID WHERE BranchID= :branchID";
$stmt = $mysql->prepare($query);
$stmt->bindParam(':branchID', $_GET['branchID']);
$stmt->execute();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>BranchProducts</title>
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
                            <h2><u> Branch Products </u></h2>
                </br>
                <table id="basketTable">
                    <thead>
                        <td>ID</td>
                        <td>SupplierId</td>
                        <td>CategoryID</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Brand</td>
                        <td>Supplier Cost</td>
                        <td>Online Price</td>
                        <td>Stock</td>
                    </thead>
                    <tbody?>
                        <?php foreach($stmt->fetchAll() as $result): ?>
                            <tr>
                                <td><?php echo $result['ID']; ?></td>
                                <td><?php echo $result['SupplierID']; ?></td>
                                <td><?php echo $result['CategoryID']; ?></td>
                                <td><?php echo $result['Name']; ?></td>
                                <td><?php echo $result['Description']; ?></td>
                                <td><?php echo $result['Brand']; ?></td>
                                <td><?php echo '&pound;'.$result['SupplierCost']; ?></td>
                                <td><?php echo '&pound;'.$result['OnlinePrice']; ?></td>
                                <form method='POST' action="UpdateStock.php?BranchID=<?php echo $_GET['branchID']; ?>">
                                    <td><input type="number" name="Stock[<?php echo $result['ID'] ?>]" min="0" value=<?php echo $result['Stock'] ?>></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td><input type="submit" value="UpdateStock"</td>
                                </form>
                                <form method="post" action="AddStock.php?BranchID=<?php echo $_GET['branchID']; ?>">
                                    <td><input type="submit" value="AddStock"</td>
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
