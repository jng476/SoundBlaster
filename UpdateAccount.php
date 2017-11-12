<?php

//do change basket to id and amount in basket page get the name, price. 
include 'connect.php';

if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
} 

$query = "SET SQL_SAFE_UPDATES = 0;
UPDATE customer
JOIN address ON address.ID = customer.AddressID
JOIN useraccount ON useraccount.customerID = customer.ID
SET FirstName = '".$_POST['FirstName']."', LastName = '".$_POST['LastName']."', Email = '".$_POST['Email']."', 
LINE1 = '".$_POST['Line1']."', LINE2 = '".$_POST['Line2']."', PostCode = '".$_POST['PostCode']."', City = '".$_POST['City']."', Country = '".$_POST['Country']."'
WHERE useraccount.username = '".$_SESSION['username']."'";

$stmt = $mysql->prepare($query);
$stmt->execute();
header("Location: AccountInfo.php");
die();

?>