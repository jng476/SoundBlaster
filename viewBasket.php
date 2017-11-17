<?php
include 'Basket.php';
include 'connect.php';
if($_SESSION['login']!="Logged in"){
    header("Location: login.php");
    die();
}
if(isset($_SESSION['Basket'])){
    if($_SESSION['Basket']->index == 0){
        unset($_SESSION['Basket']);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Basket</title>
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
                    <h2><u> Basket </u></h2>
                </br>
                <table id="basketTable" style="width:50%" align="centre">
                    <thead>
                        <td>Name</td>
                        <td>Quantity</td>
                        <td>Price(Each)</td>
                        <td>Change Quantity</td>
                    </thead>
                    <tbody?>
                        <form method="post" action="UpdateBasket.php">
                            <?php if(isset($_SESSION['Basket'])){ for($i=0; $i<$_SESSION['Basket']->index; $i++){ ?>
                                <tr>
                                    <?php $query = "SELECT Name, OnlinePrice FROM product WHERE ID = ".$_SESSION['Basket']->ID[$i];
                                    $stmt = $mysql->prepare($query);
                                    $stmt->execute();
                                    ?>
                                    <?php foreach($stmt->fetchAll() as $result): ?>
                                        <td><?php echo $result['Name']; ?></td>
                                        <td><?php echo $_SESSION['Basket']->amount[$i]; ?></td>
                                        <td><?php echo "&pound;". $result['OnlinePrice']; ?></td>
                                        <td><select name="amount[<?php echo $i ?>]">
                                            <option value=""> </option>
                                            <option value=0>0</option>
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
                            <?php } } ?>
                            <tr>
                                <?php if(ISSET($_SESSION['Basket'])){ ?>
                                    <td><input type="submit" value="Update Basket"></td>
                        </form>
                        <form method="post" action="Checkout.php">
                            <td><input type="submit" value="Checkout"></td>
                        </form>
                                <?php }?>
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
