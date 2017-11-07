<?php 

if(isset($_SESSION['login'])){
	if($_SESSION['login'] == "Logged in"){
			
		header("Location: contact_us.php");
		
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
 				<?php include 'navigation.php';  echo 'blah' ?>
			</div>
			
			
			<div id="content">
				
				
				<div id="main">
					
					<br/>
					<br/>
					<h2><u> Contact Us </u></h2>
					<br/>
					<p> If you have any queries or complaint you can contact us here: <br/>
						this_email_does_not_exist@hotmail.com <br/>  </p>
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