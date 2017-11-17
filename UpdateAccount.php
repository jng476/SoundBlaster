<?php

//do change basket to id and amount in basket page get the name, price. 
include 'connect.php';

if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
} 
if($_SESSION['user_type'] == "customer"){
$query = "SET SQL_SAFE_UPDATES = 0;
UPDATE customer
JOIN address ON address.ID = customer.AddressID
JOIN useraccount ON useraccount.customerID = customer.ID
SET FirstName = :FirstName, LastName = :LastName, Email = :Email, 
LINE1 = :Line1, LINE2 = :Line2, PostCode = :PostCode, City = :City, Country = :Country
WHERE useraccount.username = :Username";
}else{
	$query = "SET SQL_SAFE_UPDATES = 0;
UPDATE staff
JOIN address ON address.ID = staff.AddressID
JOIN useraccount ON useraccount.staffID = staff.ID
SET FirstName = :FirstName, LastName = :LastName, 
LINE1 = :Line1, LINE2 = :Line2, PostCode = :PostCode, City = :City, Country = :Country
WHERE useraccount.username = :Username";
}
$stmt = $mysql->prepare($query);
$stmt->bindParam(':Line1', $_POST['Line1']);
$stmt->bindParam(':Line2', $_POST['Line2']);
$stmt->bindParam(':City', $_POST['City']);
$stmt->bindParam(':PostCode', $_POST['PostCode']);
$stmt->bindParam(':Country', $_POST['Country']);
$stmt->bindParam(':FirstName', $_POST['FirstName']);
$stmt->bindParam(':LastName', $_POST['LastName']);
if($_SESSION['user_type'] == "customer"){
$stmt->bindParam(':Email', $_POST['Email']);
}
$stmt->bindParam(':Username', $_SESSION['username']);
$stmt->execute();
header("Location: AccountInfo.php");
die();

?>