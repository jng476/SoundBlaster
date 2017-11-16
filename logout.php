<?php	
session_start();
session_unset();
setcookie(session_name(),'',0,'/');
session_destroy();
header("Location: login.php");
exit();
?>