<?php	

$host = "silva.computing.dundee.ac.uk";
$username = "17ac3u07";
$password = "cba123";
$database = "17ac3d07";
//will change to getting the user name and password 


try{

	$mysql = new PDO("mysql:host=".$host.";dbname=".$database, $username, $password);
	
} catch (PDOException $e){
	// Could not connect
	echo "Database Connection Error!";
	var_dump($e);
	die();
}

$mysql = new PDO("mysql:host=".$host, $username, $password);

$mysql->exec('USE 17ac3d07');

?>
