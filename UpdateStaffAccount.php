<?php

include 'connect.php';

$permissions = array(
    "staff"=>3
);
include 'check-authorisation.php'; 
$ID = "";
$Department = $_POST['Department'];
$BranchID = $_POST['BranchID'];
$IsManager = $_POST['IsManager'];
if(!isset($_POST['ID'])){
	$ID = $ID.$_GET['ID'];
	
}else{
	$ID = $ID.$POST['ID'];
	
}
$query = "SET SQL_SAFE_UPDATES = 0;
UPDATE staff
SET DepartmentID = :Department, BranchID = :BranchID, IsManager = :IsManager
WHERE ID = ".$ID;

$stmt = $mysql->prepare($query);
$stmt->bindParam(':Department', $Department);
$stmt->bindParam(':BranchID', $BranchID);
$stmt->bindParam(':IsManager', $IsManager);
$stmt->execute();
header("Location: Employee.php?branchID=".$_POST['BranchID']);
die();

?>