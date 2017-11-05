<?php	

$host = "silva.computing.dundee.ac.uk";
//$username = "17ac3u07";
//$password = "cba123";
$database = "17ac3d07";
//will change to getting the user name and password 


try{

	$mysql = new PDO("mysql:host=".$host.";dbname=".$database, $_POST['username'], $_POST['password']);
	
} catch (PDOException $e){
	// Could not connect
	echo "Database Connection Error!";
	var_dump($e);
	header("Location: login.html");
	die();
}

$mysql = new PDO("mysql:host=".$host, $_POST['username'], $_POST['password']);

$mysql->exec('USE 17ac3d07');

header("Location: searchTable.php");
exit();
?>
