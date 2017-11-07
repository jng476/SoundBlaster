<?php

//do change basket to id and amount in basket page get the name, price. 
include 'Basket.php';
SESSION_START();

if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
} 
var_dump($_POST);
foreach($_POST['amount'] as $name => $amount){

	list($ID) = sscanf($name, "[%d]");
	
	if($amount !=""){
		$ID = $name;
		$real_amount = $amount;
		if(isset($_SESSION['Basket'])){
			$_SESSION['Basket']->add($ID, $real_amount);
		}else{
			$_SESSION['Basket'] = new Basket($ID, $real_amount);
		}
	}

}

	header("Location: viewBasket.php");
	die();

?>