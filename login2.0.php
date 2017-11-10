<?php	

$host = "silva.computing.dundee.ac.uk";
$username = "17ac3u07";
$password = "cba123";
$database = "17ac3d07";
//will change to getting the user name and password 
session_start();

try{
    global $mysql;
	$mysql = new PDO("mysql:host=".$host.";dbname=".$database, $username, $password);
    #$mysql->exec('USE 17ac3d07');
    $result=$mysql->query('SELECT * FROM useraccount where username="'.$_POST['username'].'"')->fetch(PDO::FETCH_ASSOC);
    
    if ($result['password'] == $_POST['password']) {
    $_SESSION['login'] = "Logged in";
    $_SESSION['username']=$_POST['username'];

    header("Location: searchTable.php");
    }
    else {
        echo "Incorrect username or password";
        $_SESSION['login'] = "incorrect username or password";
        header("Location: login.php");
    }
} catch (PDOException $e){
	// Could not connect
	
  	$_SESSION['login'] = "incorrect username or password";
	echo "Database Connection Error!";
	var_dump($e);
	header("Location: login.php");
	die();
}
?>
