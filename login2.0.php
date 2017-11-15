<?php

include 'connect.php';

$prepared = $mysql->prepare('SELECT * FROM useraccount where username= :username AND password = :password');
$prepared->bindParam(':username', $_POST['username']);
$prepared->bindParam(':password', $_POST['password']);
$prepared->execute();

if ($prepared->rowCount() != 0) {
    $_SESSION['login'] = "Logged in";
    $_SESSION['username']=$_POST['username'];
    $_SESSION['permissions'] = array();
    $prepPermissions = $mysql->prepare('select p.`Name`, uap.`AccessLevel` from useraccountpermission as uap join permission as p on uap.PermissionID = p.ID join useraccount as ua on uap.UserAccountID = ua.ID where ua.username=:username;');
    $prepPermissions->bindParam(':username', $_POST['username']);
    $prepPermissions->execute();
    $permissionResult = $prepPermissions ->fetchAll(PDO::FETCH_ASSOC);

    foreach($permissionResult as $row) {
        $_SESSION['permissions'][$row['Name']] = $row['AccessLevel'];
    }

    $prepGroupPermissions=$mysql->prepare('select p.`Name`, ugp.`AccessLevel` from permission as p join usergrouppermission as ugp on p.ID = ugp.PermissionID join usergroupaccount as uga on uga.UserGroupID=ugp.UserGroupID join useraccount as ua on uga.UserAccountID = ua.ID where ua.username=:username;');
    $prepGroupPermissions->bindParam(':username', $_POST['username']);
    $prepGroupPermissions->execute();
    $prepGroupResult = $prepGroupPermissions -> fetchAll(PDO::FETCH_ASSOC);


    foreach($prepGroupResult as $row)  {
        if(!key_exists($_SESSION, $row['Name']) || $row['AccessLevel'] > $_SESSION['permissions']['Name'])
            $_SESSION['permissions'][$row['Name']] = $row['AccessLevel'];
    }
    header("Location: index.php");
}
else {
    echo "Incorrect username or password";
    $_SESSION['login'] = "incorrect username or password";
    #header("Location: login.php");
}

?>
