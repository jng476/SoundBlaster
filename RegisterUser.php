<?php

include 'connect.php';

$query = "SELECT username from UserAccount WHERE username = :Username";
$stmt = $mysql->prepare($query);
$stmt->bindParam(':Username', $_POST['Username']);
$stmt->execute();

if($stmt->rowcount() !=0){

    $_SESSION['error'] = "Sorry The Username Provided Has been taken";
    header("Location: Register.php");
    exit();

}
$query = "INSERT INTO Address(Line1, Line2, City, PostCode, Country) VALUES(:Line1, :Line2, :City, :PostCode, :Country);
INSERT INTO Customer (AddressID, FirstName, LastName, Email) VALUES((SELECT max(id) FROM Address),
:FirstName, :LastName, :Email);
INSERT INTO UserAccount(username, password, CustomerID) VALUES(:Username, :Password,
(SELECT MAX(id) FROM customer))";
$stmt2 = $mysql->prepare($query);
$stmt2->bindParam(':Line1', $_POST['Line1']);
$stmt2->bindParam(':Line2', $_POST['Line2']);
$stmt2->bindParam(':City', $_POST['City']);
$stmt2->bindParam(':PostCode', $_POST['PostCode']);
$stmt2->bindParam(':Country', $_POST['Country']);
$stmt2->bindParam(':FirstName', $_POST['FirstName']);
$stmt2->bindParam(':LastName', $_POST['LastName']);
$stmt2->bindParam(':Email', $_POST['Email']);
$stmt2->bindParam(':Username', $_POST['Username']);
$stmt2->bindParam(':Password', $_POST['Password']);
$stmt2->execute();

header("Location: Login.php");
exit();

?>
