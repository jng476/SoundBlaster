<?php 
include 'connect.php';
session_start();
if(isset($_SESSION['login'])){
	if($_SESSION['login'] == "Logged in"){
			
		header("Location: searchTable.php");
		
	}
}

?> 


<html>
	<head>
  <title>Bootstrap Example</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<h2>Login</h2>
			<form method="post" action="login2.0.php">
				<div class="form-group">
				<label for "username">Username</label>
				<input type="text" calss="form-control" size="35" name="username"><br/>
			</div>
			<div class="form-group">
				<label for "password">Password</label>
				<input type="password" class="form-control" size="35" name="password"><br/>
			</div>
				<input type="submit" value="Login">
				<?php if(isset($_SESSION['login'])){ ?>
				<td> <?php echo $_SESSION['login']; session_destroy();} ?> </td>
			</form>
		</div>
	</body>
</html>