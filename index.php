<?php 

if(isset($_SESSION['login'])){
	if($_SESSION['login'] == "Logged in"){
			
		header("Location: index.php");
		
	}
}
?> 

<html>
	<head>
		<title>SoundBlaster Store</title>
		<?php include 'scripts.html'?>
	</head>
	<body>
		
				
				
		<div id="container">
						
			<div id="nav">
 				<?php include 'navigation.php'; ?>
			</div>
			
			
			<div id="content">
				
				
				<div id="main">
					
					<br/>
					<br/>
					<h2><u> HOME </u></h2>
					<br/>
					<p> Welcome to the online store of SoundBlaster! <br/>
						Our store offers a range of products for musical playback. We stock a variety of playback options, including headphones, earphones and speakers <br/>  </p>
					<a href="login.php">Log In</a></li>
					<br/>
					<img src="aa.jpg" alt="SOUNDBLASTER Logo" style = "width:250px;height:212px;">
					<br/>
					
					<p> You must be signed in to view our products and make an order!<br/>
					    Existing Customer? You can Login here:
					    <a href="login.php">Click to Log In</a></li><br/>
						New Customer? Sign up here:   
						<a href="register.html">Click to Register</a></li>
						
						 
					</p>
					
					<br/>
					<p> 
						Should you experience problems with this website, please contact the website administrators, Team 7!						
					</p>
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