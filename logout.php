<?php	


session_start();

unset($_SESSION['login']);
unset($_SESSION['username']);
unset($_SESSION['Basket']);
header("Location: login.php");


exit();
?>