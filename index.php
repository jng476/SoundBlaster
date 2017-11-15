<?php 
SESSION_START();
?>
<html>
	<head>
		<title>SoundBlaster Store</title>
		<?php include 'scripts.html'?>
	</head>
	<body>			
		<div id="container">
			<div id="content">
				<div id="nav">
 				<?php include 'navigation.php'; ?>
			</div>		
				<div id="main">
					<br/>
					<br/>
					<div id="bubbleText">
					<h2><u> HOME </u></h2>
					<br/>
					<p> Welcome to the online store of SoundBlaster! <br/>
						Our store offers a range of products for musical playback. We stock a variety of playback options, including headphones, earphones and speakers <br/>  </p>
					</div>
					
					<div id="bubbleText">
					<h2><u>NEWS</u></h2>
					<br/>
					<p>Another clickbait title!!</p>
					
					<iframe width="420" height="345" src="https://www.youtube.com/embed/lEjwyYOFwZg">
					</iframe>
					
					<br/>
					<br/>
					<p>Are these Bluetooth Speakers? You Wont believe your eyes!!!</p>
					
					<iframe width="420" height="345" src="https://www.youtube.com/embed/ZBDjYzY_6-k">
					</iframe>
					</div>
					
					<div id="bubbleText">
					<?php if(!ISSET($_SESSION['login'])){ ?>
					
					<p> You must be signed in to view our products and make an order!<br/>
					    Existing Customer? You can Login here:
					    <a href="login.php">Click to Log In</a></li><br/>
						New Customer? Sign up here:   
						<a href="register.php">Click to Register</a></li>
					</p>
					<?php } ?>
					<br/>
					<p> 
						Should you experience problems with this website, please contact the website administrators, Team 7!						
					</p>
					</div>
					<br/>
					<br/>
				</div>
			</div>
			<div id="footer">
				Created in 2017 by Team 7
			</div>
		</div>
	</body>
</html>