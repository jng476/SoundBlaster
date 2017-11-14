<?php

include 'connect.php';
if($_SESSION['login']!="Logged in"){
    header("Location: login.php");
    die();
}

$query = "SELECT product.ID, product.Name, product.Description, product.Brand, product.OnlinePrice, category.name AS Cat FROM product
INNER JOIN category on category.ID = product.categoryID $where";
$stmt = $mysql->prepare($query);
$stmt->execute(); ?>

	
<html>
<head>
		<title>SoundBlaster</title>
		<?php include 'scripts.html'?>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">

</head>
<body>

			<div id="nav">
                <?php include 'navigation.php'; ?>
            </div>
  <div id="bubbleTextDark">
  <div id="main">
  
										
							<img id="item-display" src="img/<?php echo $result['ID']; ?>.jpg"; style="width:100px;height:100px;" class="thumb"></img>						
										
				
					
				
					<div class="product-title"><?php echo $result['product.Name']; ?></div>
					<div class="product-desc">The Corsair Gaming Series GS600 is the ideal price/performance choice for mid-spec gaming PC</div>
					<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
					<hr>
					<div class="product-price">$ 1234.00</div>
					<div class="product-stock">In Stock</div>
					<hr>
					<div class="btn-group cart">
						<button type="button" class="btn btn-success">
							Add to cart 
						</button>
					</div>
					<div class="btn-group wishlist">
						<button type="button" class="btn btn-danger">
							Return to Shop
						</button>
					</div>
					</div>
				
				
		<div id="main">		
			<div class="col-md-12 product-info">
					<ul id="myTab" class="nav nav-tabs nav_tabs">
						
						<li class="active" ><a href="#service-one" data-toggle="tab">DESCRIPTION    </a></li>
						
						
					</ul>
				<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="service-one">
						 
							<section class="container product-info">
								

								<h3>Corsair Gaming Series GS600 Features:</h3>
								<li>It supports the latest ATX12V v2.3 standard and is backward compatible with ATX12V 2.2 and ATX12V 2.01 systems</li>
								
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
