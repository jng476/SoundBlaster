<?php
if($_SESSION['login']!="Logged in"){
    header("Location: login.php");
}
#Checks the permissions array of the parent php file and makes sure the session includes them
if(isset($permission)){
	foreach ($permissions as $permission => $level) {
		if (!key_exists($permission, $_SESSION['permissions']) || $_SESSION['permissions'][$permission] < $level){
			header("Location: access-denied.php");
		}
	}
}

?>