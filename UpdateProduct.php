<?php

include 'connect.php';

$permissions = array(
    "product"=>3
);
include 'check-authorisation.php';

$ID = "";
$Supplier = $_POST['Supplier'];
$Category = $_POST['Category'];
$Name = $_POST['Name'];
$Brand = $_POST['Brand'];
$Description = $_POST['Description'];
$SupplierPrice = $_POST['SupplierPrice'];
$OnlinePrice = $_POST['OnlinePrice'];
$Available = $_POST['Available'];
if(isset($_GET['ID'])){
	$ID = $ID.$_GET['ID'];
	$query = "SET SQL_SAFE_UPDATES = 0;
UPDATE product
SET SupplierID = ".$Supplier.", CategoryID = ".$Category.", Description = :Description, Name = :Name, Brand = :Brand, SupplierCost = ".$SupplierPrice.", OnlinePrice = ".$OnlinePrice.", Available = :Available
WHERE ID = ".$ID;
}else{
$query = "USE 17ac3d07; INSERT INTO product(SupplierID, Description, CategoryID, Name, Brand, SupplierCost, OnlinePrice, Available)
VALUES(".$Supplier.", :Description, ".$Category.", :Name, :Brand, ". $SupplierPrice.", ".$OnlinePrice.", :Available)";
}
$stmt = $mysql->prepare($query);
$stmt->bindParam(':Name', $Name);
$stmt->bindParam(':Brand', $Brand);
$stmt->bindParam(':Available', $Available);
$stmt->bindParam(':Description', $Description);
$stmt->execute();
echo $ID;
header("Location: AvailableProducts.php");
die();

?>