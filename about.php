<?php 

if(isset($_SESSION['login'])){
	if($_SESSION['login'] == "Logged in"){
			
		header("Location: about.php");
		
	}
}
?> 

<html>
	<head>
		<title>SoundBlaster About</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
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
					<h2><u> About Us </u></h2>
					<br/>
					<p> This website was created as part of an assignment to produce a working database with a front-end <br/>
						Team 7 Comprises of Josh Ng, Martin Learmont, Satyajeet Sen and Cameron O'Brien<br/>  </p>
					<img src="aa.jpg" alt="SOUNDBLASTER Logo" style = "width:250px;height:212px;">
					<br/>
					
					
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