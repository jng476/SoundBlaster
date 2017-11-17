<?php
$permissions = array(
    "group" => 1
);
include 'check-authorisation.php';
include 'connect.php';
?>
<!doctype html>
<html>
    <head>
        <title>Groups</title>
        <?php include 'scripts.html' ?>
    </head>
    <body>
        <?php
        include "navigation.php";
        $prettyName="User Group";
        $query="SELECT * FROM usergroup as ug";
        $table="usergroup";
        $tablePermission="group";
        $create_page="create_group.php";
        include "generic_table.php";?>
    </body>
</html>
