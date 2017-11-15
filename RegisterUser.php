<?php 

include 'connect.php';

$query = "SELECT username from UserAccount WHERE username = '".$_POST['Username']."'";
$stmt = $mysql->prepare($query);
$stmt->execute();

if($stmt->rowcount() !=0){

	$_SESSION['error'] = "Sorry The Username Provided Has been taken";
	header("Location: Register.php");
	exit();

}

$query = "INSERT INTO Address(Line1, Line2, City, PostCode, Country) VALUES('".$_POST['Line1']."',
'".$_POST['Line2']."', '".$_POST['City']."', '".$_POST['PostCode']."', '".$_POST['Country']."');
INSERT INTO Customer (AddressID, FirstName, LastName, Email) VALUES((SELECT max(id) FROM Address), '".$_POST['FirstName']."', 
'".$_POST['LastName']."', '".$_POST['Email']."'); 
INSERT INTO UserAccount(username, password, CustomerID) VALUES('".$_POST['Username']."', '".$_POST['Password']."', 
(SELECT MAX(id) FROM customer))";
$stmt = $mysql->prepare($query);
$stmt->execute();
header("Location: Login.php");
exit();
?>