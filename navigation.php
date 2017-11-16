<?php
include "connect.php";
$cats = $mysql->prepare('SELECT ID, Name FROM category;');
$cats->execute();
$categories = $cats->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['searchName']))    
{
	// redirect if fulfilled
	header("Location:searchTable.php?id=&category=&name=".$_GET['searchName']."&brand=&price=");
}
?>	
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">SoundBlaster</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>         			
			<li class="dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Shop<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="searchTable.php">All</a></li>
    <?php foreach($categories as $category)
    echo '<li><a class="nav-link" href="searchTable.php?id=&supplier=&category='.$category['ID'].'&name=&brand=&price=">'.ucfirst($category['Name']).'</a></li>'; ?>
				</ul>
			</li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact_us.php">Contact</a>
            </li>
    <?php if(!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'staff'){
echo '<li class="nav-item">
              <a class="nav-link" href="viewBasket.php">My Basket</a>
            </li>
                     '; } ?>

<li class="dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Admin
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="Branches.php">Branches</a></li>
					<br/>
					<li><a class="nav-link" href="Supplier.php">Suppliers</a></li>				
				</ul>
			</li>
			<?php if(!isset($_SESSION['login'])){ ?>
			<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
			<?php } else{ ?>
			<li class="dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Account
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
                <li><a class="nav-link" href="AccountInfo.php">Account Details</a></li>
    <?php if(!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'staff'){
                                                  echo '<li><a href="viewOrder.php">Orders</a></li>'; } ?>
					<li><a class="nav-link" href="logout.php">Logout</a></li>
					
				</ul>
			</li>
			<?php } ?>
			<li class="nav-item">
					<form class="navbar-form navbar-left">
					<div class="input-group">
					<input type="text" class="form-control" name="searchName" method="get" placeholder="Search">
					<div class="input-group-btn">
					<button class="btn btn-default" type="submit">
					<i class="glyphicon glyphicon-search"></i>
					</button>
					</div>
					</div>
					</form> 
			</li>
			</ul>
        </div>
      </div>

</nav>
