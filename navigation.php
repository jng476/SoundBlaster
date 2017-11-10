<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">SoundBlaster</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>         			
			<li class="dropdown">
				<a class="nav-link" data-toggle="dropdown" href="searchTable.php">Shop &#9660
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="searchTable.php">All</a></li>
					<li><a href="searchTable.php?id=&supplier=&category=1&name=&brand=&price=">Earphones</a></li>
					<li><a href="searchTable.php?id=&supplier=&category=2&name=&brand=&price=">Headphones</a></li>
					<li><a href="searchTable.php?id=&supplier=&category=3&name=&brand=&price=">Stereo Speakers</a></li>
					<li><a href="searchTable.php?id=&supplier=&category=4&name=&brand=&price=">Bluetooth Speakers</a></li>
					<li><a href="searchTable.php?id=&supplier=&category=5&name=&brand=&price=">LED Cube Speakers</a></li>
					<li><a href="searchTable.php?id=&supplier=&category=6&name=&brand=&price=">Boombox Speakers</a></li>
					<li><a href="searchTable.php?id=&supplier=&category=7&name=&brand=&price=">Multi-Room Systems</a></li>
					<li><a href="searchTable.php?id=&supplier=&category=8&name=&brand=&price=">Subwoofers</a></li>
					<li><a href="searchTable.php?id=&supplier=&category=9&name=&brand=&price=">Radios</a></li>
					<li><a href="searchTable.php?id=&supplier=&category=10&name=&brand=&price=">Record Players</a></li>
				</ul>
			</li>
			
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact_us.php">Contact</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="viewBasket.php">My Basket</a>
            </li>
			<?php if(!isset($_SESSION['login'])){ ?>
			<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
			<?php } else{ ?>
			<li class="dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">Account &#9660
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="viewOrder.php">Orders</a></li>
					<li><a href="#">Setting</a></li>
					<li><a href="logout.php">Logout</a></li>
					
				</ul>
			</li>

			<?php } ?>
          </ul>
        </div>
      </div>
</nav>
