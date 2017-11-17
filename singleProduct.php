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
$where = $where."TRUE = TRUE ";

if (isset($_GET['priceSort'])){
    if($_GET['priceSort'] == 'Yes'){
        $where = $where."ORDER BY product.OnlinePrice";
    }
}
$query = "USE 17ac3d07; SELECT product.ID, product.Name, product.Description, product.Brand, product.OnlinePrice, category.name AS Cat FROM product
INNER JOIN category on category.ID = product.categoryID $where";
$stmt = $mysql->prepare($query);
$stmt->execute(); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>SoundBlaster</title>
        <?php include 'scripts.html'?>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
    </head>
    <body>
        <?php include 'navigation.php'; ?>
        <div id="bubbleTextDark">
            <div id="main">
                <?php  foreach($stmt->fetchAll() as $result); ?>
                <img id="item-display" src="img/<?php echo $result['ID']; ?>.jpg"; style="width:300px;height:300px;" class="thumb"></img>
                <div class="product-title"> <?php echo $result['Name']; ?> </div>
                <div class="product-desc"><?php echo $result['Brand']; ?></div>
                <div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
                <hr>
                <div class="product-price"><?php echo "&pound;".$result['OnlinePrice']; ?></div>
                <div class="product-stock">In Stock</div>
                <form method="post" action="addBasket.php">
                    <select name="amount[<?php echo $result['ID'] ?>]">
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
                    </select>
                    <hr>
                    <div class="btn-group cart">
                        <input type="submit" value= "Add To Basket" class="btn btn-success">
                </form>
                    </div>
                    <div class="btn-group wishlist">
                        <a href="searchTable.php">
                            <button type="button" class="btn btn-danger">
                                Return to Shop
                            </button>
                        </a>
                    </div>
            </div>
            <div id="main">
                <div class="col-md-12 product-info">
                    <ul id="myTab" class="nav nav-tabs nav_tabs">

                        <li class="active" ><a href="#service-one" data-toggle="tab">DESCRIPTION    </a></li>
                        <li class="active" ><a href="#service-two" data-toggle="tab">REVIEWS    </a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="service-one">
                            <section class="container product-info">
                                <h3><?php echo $result['Name'] ?> Features:</h3>
                                <li><?php echo $result['Description'] ?></li>
                            </section>
                        </div>
                        <div class="tab-pane fade in active" id="service-two">
                            <section class="container product-info">
                                <h3><?php echo $result['Name'] ?> Reviews:</h3>
                                <br/>
                                <!-- begin wwww.htmlcommentbox.com -->
                                <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">Comment Form</a> is loading comments...</div>
                                <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
                                <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1510671764459");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
                                <!-- end www.htmlcommentbox.com -->
                            </section>
                        </div>
                        <div class="tab-pane fade" id="service-two">
                        </div>
                        <div class="tab-pane fade" id="service-three">
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        </div>
        </div>
    </body>
</html>
