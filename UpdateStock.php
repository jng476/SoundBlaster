<?php

include 'connect.php';

$permissions = array(
    "product"=>3
);
include 'check-authorisation.php';
if(isset($_POST['ProductID'])){
	$query="INSERT INTO BranchProduct(BranchID, ProductId, Stock, StorePrice) VALUES(".$_GET['BranchID'].", 
	".$_POST['ProductID'].", ".$_POST['Stock'].", ".$_POST['StorePrice'].")";
	$stmt=$mysql->prepare($query);
	$stmt->execute();
}else{
var_dump($_POST);
foreach($_POST['Stock'] as $name => $amount){

	list($ID) = sscanf($name, "[%d]");
	
	if($amount !=""){
		$ID = $name;
		if($amount != 0){
			$query="UPDATE BranchProduct SET Stock=".$amount." WHERE BranchID = ".$_GET['BranchID']." AND ProductID = ".$ID;
		}else{
			$query="DELETE FROM BranchProduct WHERE BranchID = ".$_GET['BranchID']." AND ProductID = ".$ID;
		}
		
		$stmt=$mysql->prepare($query);
		$stmt->execute();
	}

}
}
header("Location: BranchProducts.php?branchID=".$_GET['BranchID']);
die();
?>