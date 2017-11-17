<?php
$permissions = array(
    "product"=>3
);
include 'check-authorisation.php';
include 'connect.php';
$stmt = $mysql->prepare("DELETE FROM ".$_POST['table']." WHERE ID = :id");
$stmt->bindValue(':id', $_POST['id']);
if ($stmt->execute())
    echo "YASS";
else
    echo "NASS ".$stmt->queryString;
echo "ID = ".$_POST['id'];
?>