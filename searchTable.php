<?php

include 'connect.php';
if($_SESSION['login']!="Logged in"){
    header("Location: login.php");
    die();
}

$where = "WHERE ";
if (isset($_GET['id'])){
    if($_GET['id'] != ''){
        $where = $where."id = ".$_GET['id']." AND ";
    }
    if($_GET['supplier'] != ''){

        $where = $where." SupplierID = ".$_GET['supplier']." AND ";
    }
    if($_GET['category'] != ''){

        $where = $where." CategoryID = ".$_GET['category']." AND ";
    }
    if($_GET['name'] != ''){

        $where = $where." Name LIKE '%".$_GET['name']."%' AND ";
    }
    if($_GET['brand'] != ''){

        $where = $where." Brand LIKE '%".$_GET['brand']."%' AND ";
    }
    if($_GET['price'] != ''){

        $where = $where." OnlinePrice <= ".$_GET['price']." AND ";
    }



}

$where = $where."TRUE = TRUE ";

if (isset($_GET['priceSort'])){
    if($_GET['priceSort'] == 'Yes'){

        $where = $where."ORDER BY OnlinePrice";

    }

}

$query = "SELECT * FROM product $where";
$stmt = $mysql->prepare($query);
$stmt->execute();


?>

<html>
    <head>
        <title>Search Table</title>
        <meta charset="utf-8">
        <?php include 'scripts.html'?>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>


        <div class="container">

            <div id="nav">
                <?php include 'navigation.php'; ?>
            </div>

                        </br>
                        <h2>Search</h2>
                        <form method="get" action="searchTable.php">
                            <div class="form-group">
                                <label for "id">ID</label>
                                <input type="text" class="form-control" size="10" name="id"><br/>
                                <label for "supplier">SupplierID</label>
                                <input type="text" class="form-control" size="10" name="supplier"><br/>
                                <label for "category">CategoryID</label>
                                <input type="text" class="form-control" size="10" name="category"><br/>
                                <label for "name">Name</label>
                                <input type="text" class="form-control" size="10" name="name"><br/>
                                <label for "brand">Brand</label>
                                <input type="text" class="form-control" size="10" name="brand"><br/>
                                <label for "price">Max Price</label>
                                <input type="text" class="form-control" size="10" name="price"><br/>
                                <label for "priceSort">Sort by Price</label>
                                <input type="checkbox" name="priceSort" value="Yes"><br/>
                            </div>
                            <input type="submit" value="Search">
                        </form>
        </div>

        <div class="container">

            <table>
                <thead>
                    <td>ID</td>
                    <td>SupID</td>
                    <td>CatID</td>
                    <td>Name</td>
                    <td>Des</td>
                    <td>Brand</td>
                    <td>Price</td>
                    <td>Amount</td>
                </thead>

                <tbody>
                    <form method="post" action="addBasket.php">
                        <?php  foreach($stmt->fetchAll() as $result): ?>
                            <tr>
                                <td><?php echo $result['ID']; ?></td>
                                <td><?php echo $result['SupplierID']; ?></td>
                                <td><?php echo $result['CategoryID']; ?></td>
                                <td><?php echo $result['Name']; ?></td>
                                <td><?php echo $result['Description']; ?></td>
                                <td><?php echo $result['Brand']; ?></td>
                                <td><?php echo "£".$result['OnlinePrice']; ?></td>
                                <td><select name="amount[<?php echo $result['ID'] ?>]">
                                    <option value=""> </option>
                                    <option value=1>1</option>
                                    <option value=2>2</option>
                                    <option value=3>3</option>
                                    <option value=4>4</option>
                                    <option value=5>5</option>
                                    <option value=6>6</option>
                                    <option value=7>7</option>
                                    <option value=8>8</option>
                                    <option value=9>9</option>
                                </select></td>
                            </tr>
                        <?php endforeach; ?>
                        <td><input type="submit" value="Add To Basket"></td>
                    </form>
                </tbody>
            </table>
        </div>

    </body>
</html>
