<?php
if($_SESSION['login']!="Logged in"){
    header("Location: login.php");
}

foreach ($permissions as $permission => $level) {
    if (!key_exists($permission, $_SESSION['permissions']) || $_SESSION['permissions'][$permission] < $level){
        header("Location: access-denied.php");
    }
}

?>