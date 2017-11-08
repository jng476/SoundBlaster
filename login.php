<?php
session_start();
$error = "";
if(isset($_SESSION['login'])){
    if($_SESSION['login'] == "Logged in"){
        header("Location: searchTable.php");
        exit();
    }
	else{
		$error = $_SESSION['login'];
		unset($_SESSION['login']);
		session_destroy();
	}
}

?>

<html>
    <head>
        <title>SoundBlaster Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
		<?php include 'scripts.html'?>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		
				
				
		<div id="container">
						
			<div id="nav">
 				<?php include 'navigation.php'; ?>
			</div>
			
			
			<div id="content">
				
				
				<div id="main">
				</br>
				</br>
				<div id="bubbleText">
				<h2>Login</h2>
				<form method="post" action="login2.0.php">
				<div class="form-group">
=======
        <?php include 'scripts.html'?>
    </head>
    <body>
        <?php include 'navigation.php' ?>
        <div class="container">
            <h2>Login</h2>
            <form method="post" action="login2.0.php">
                <div class="form-group">
>>>>>>> origin/master
                    <label for "username">Username</label>
                    <input type="text" calss="form-control" size="35" name="username"><br/>
                </div>
                <div class="form-group">
                    <label for "password">Password</label>
                    <input type="password" class="form-control" size="35" name="password"><br/>
                </div>
                <input type="submit" value="Login">
                    <td> <?php echo "<font color='red'>".$error."</font>"; ?> </td>
            </form>
        </div>
    </body>
</html>
