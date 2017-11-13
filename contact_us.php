<?php 

if(isset($_SESSION['login'])){
	if($_SESSION['login'] == "Logged in"){
			
		header("Location: contact_us.php");
		
	}
}
SESSION_START();
?> 

<html>
	<head>
		<title>SoundBlaster Contact</title>
		<?php include 'scripts.html'?>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">

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
					<div id="bubbleText">
					<h2><u> Contact Us </u></h2>
					<br/>
					<p> If you have any queries or complaint you can contact us here: <br/>
						this_email_does_not_exist@hotmail.com <br/>  </p>
					</div>
					<br/>
					<div id="bubbleText">
					<h1>Our Location</h1>
					<br/>
					<div id="mymap" style="text-align:center; margin-left:auto; margin-right: auto ;width:600px;height:600px;background:black;"></div>

					<script>
					function myMap() {
					var mapOptions = {
					center: new google.maps.LatLng(56.4612138, -2.994176),
					zoom: 12,
					mapTypeId: google.maps.MapTypeId.HYBRID
					}
					var map = new google.maps.Map(document.getElementById("mymap"), mapOptions);
					

					}
					</script>

					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJcl5I0h1KDHwmro0L0_omoOepfFvKGgk&callback=myMap"></script>
					</div>
					<br/>
					<div id="bubbleText">
					<p> 
						Should you experience problems with this website, please contact the website administrators, Team 7!						
					</p>
					</div>
					
					
				</div>
			</div>
			
			<div id="footer">
				Created in 2017 by Team 7
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
		</div>
	</body>
</html>