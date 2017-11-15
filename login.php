<?php
session_start();
$error = "";
if(isset($_SESSION['login'])){
    if($_SESSION['login'] == "Logged in"){
        header("Location: index.php");
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
        <?php include 'scripts.html'?>

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
                                            <label for="usr">Username</label>
                                            <input id="usr" type="text" class="form-control" size="35" name="username"><br/>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" size="35" name="password"><br/>
                                        </div>
                                        <input type="submit" value="Login">
                                        <td> <?php echo "<font color='red'>".$error."</font>"; ?> </td>
										</form>
										<form method="post" action="Register.php">
										<input type="submit" value="Register">
										</form>
                                </div>
                </div>
            </div>
    </body>
</html>
