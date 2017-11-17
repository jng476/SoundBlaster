<?php

include 'connect.php';
if($_SESSION['login']!="Logged in"){
    header("Location: login.php");
    die();
}

$where = "WHERE ";
if (isset($_GET['id'])){
    if($_GET['id'] != ''){
        $where = $where."product.id = ".$_GET['id']." AND ";
    }
    if($_GET['category'] != ''){

        $where = $where." category.ID = ".$_GET['category']." AND ";
    }
    if($_GET['name'] != ''){

        $where = $where." product.Name LIKE '%".$_GET['name']."%' AND ";
    }
    if($_GET['brand'] != ''){

        $where = $where." product.Brand LIKE '%".$_GET['brand']."%' AND ";
    }
    if($_GET['price'] != ''){

        $where = $where." product.OnlinePrice <= ".$_GET['price']." AND ";
    }



}

$where = $where."Available = 'Yes' ";

if (isset($_GET['priceSort'])){
    if($_GET['priceSort'] == 'Yes'){

        $where = $where."ORDER BY product.OnlinePrice";
    }
}

$query = "SELECT product.ID, product.Name, product.Description, product.Brand, product.OnlinePrice, category.name AS Cat FROM product
INNER JOIN category on category.ID = product.categoryID $where";
$stmt = $mysql->prepare($query);
$result=$stmt->execute(); ?>
<!doctype html>
<html>
    <head>
        <title>Search Table</title>
        <?php include 'scripts.html'?>
    </head>
    <body>
        <?php include 'navigation.php'; ?>
        <div class="container">
            <div id="bubbleText">
                <h2>Search</h2>
                </br>
                <button data-toggle="collapse" data-target="#demo" >Refine Search</button>
            </div>
            <div id="demo" class="collapse">
                <div id="bubbleText">
                    <form method="get" action="searchTable.php" id="searchForm">
                        <div class="form-group">
                            <label for "id">ID</label>
                            <input type="text" class="form-control" name="id"><br/>
                            <label for "category">Category</label>
                            <select name="category" class ="form-control">
                                <option value=""> </option>
                                <option value=1>earphones</option>
                                <option value=2>headphones</option>
                                <option value=3>speakers</option>
                                <option value=4>Bluetooth speaker</option>
                                <option value=5>LED cube speaker</option>
                                <option value=6>BoomBox speaker</option>
                                <option value=7>Multiroom Speaker</option>
                                <option value=8>Subwoofer</option>
                                <option value=9>Radio</option>
                                <option value=10>Record Player</option>
                            </select><br/>
                            <label for "name">Name</label>
                            <input type="text" class="form-control" size="10" name="name"><br/>
                            <label for "brand">Brand</label>
                            <input type="text" class="form-control" size="10" name="brand"><br/>
                            <label for "price">Max Price</label>
                            <input type="text" class="form-control" size="10" name="price"><br/>
                            <label for "priceSort">Sort by Price</label>
                            <input type="checkbox" name="priceSort" value="Yes" ><br/>
                        </div>
                        <input type="submit" value="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="bubbleText">
                <table id="resultTable"  align="centre">
                    <thead>
                        <td>Photo</td>
                        <td>ID</td>
                        <td>Cat</td>
                        <td>Name</td>
                        <td>Des</td>
                        <td>Brand</td>
                        <td>Price</td>
                        <td>Amount</td>
                        <td>More...</td>
                    </thead>
                    <tbody>
                        <form method="post" action="addBasket.php">
                            <?php $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($results as $result): ?>
                                <tr>
                                    <td>
                                        <a href="singleProduct.php?id=<?php echo $result['ID']; ?>&category=&name=&brand=&price=<?php echo $result['OnlinePrice']; ?>">
                                            <img src="img/<?php echo $result['ID']; ?>.jpg"; style="width:100px;height:100px;" class="thumb">
                                        </a>
                                    </td>
                                    <td>
                                        <div id="differentlinks">
                                            <a href="singleProduct.php?id=<?php echo $result['ID']; ?>&category=&name=&brand=&price=">
                                                <?php echo $result['ID']; ?>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo $result['Cat']; ?>
                                    </td>
                                    <td>
                                        <a href="singleProduct.php?id=<?php echo $result['ID']; ?>&category=&name=&brand=&price=">
                                            <?php echo $result['Name']; ?>
                                        </a>
                                    </td>
                                    <td>

                                        <?php echo $result['Description']; ?>

                                    </td>
                                    <td>
                                        <a href="searchtable.php?id=&category=&name=&brand=<?php echo $result['Brand']; ?>&price=">
                                            <?php echo $result['Brand']; ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="searchTable.php?id=<?php echo $result['ID']; ?>&category=&name=&brand=&price=<?php echo $result['OnlinePrice']; ?>">
                                            <?php echo "&pound;".$result['OnlinePrice']; ?>
                                        </a>
                                    </td>
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
                                    <td>
                                        <a href="singleProduct.php?id=<?php echo $result['ID']; ?>&category=&name=&brand=&price=">
                                            <p> View Details</p>
                                        </a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                            <td><input type="submit" value="Add To Basket"></td>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
