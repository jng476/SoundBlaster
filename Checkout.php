<?php 
// generateRandomString From https://stackoverflow.com/questions/4356289/php-random-string-generator Not our function
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
include 'Basket.php';
include 'connect.php';
if(!isset($_SESSION['Basket'])){
	
	header("Location: index.php");
	exit();
	
}
$TrackingId = generateRandomString();
if($_SESSION['login']!="Logged in"){
	header("Location: login.php");
	die();
}
$query = "INSERT INTO customer_order(addressID, CustomerID, status, date, TrackingId)
SELECT customer.addressID, customerID, 'pending', CURDATE(), :TrackingId from useraccount 
JOIN customer on customerID = customer.ID
Where useraccount.username = :username";
$stmt = $mysql->prepare($query);
$stmt->bindParam(':TrackingId', $TrackingId);
$stmt->bindParam(':username', $_SESSION['username']);
$stmt->execute();
for($i =0; $i<$_SESSION['Basket']->index; $i++){
	
	$query = "INSERT into orderline(OrderID, ProductID, price, quantity)
	SELECT MAX(customer_order.id), ".$_SESSION['Basket']->ID[$i].", ROUND(OnlinePrice*".$_SESSION['Basket']->amount[$i].", 2), ".$_SESSION['Basket']->amount[$i]."
	FROM product, customer_order WHERE product.ID = ".$_SESSION['Basket']->ID[$i];
	$stmt = $mysql->prepare($query);
	$stmt->execute();
}
unset($_SESSION['Basket']);
header("Location: index.php");
exit();
?> 