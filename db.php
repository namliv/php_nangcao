<?php 
$servername = 'localhost';
$dbname = 'php_1702';
$dbusername = 'root';
$dbpwd = '';
     //tao ket noi csdl
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpwd);
    // set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully"; 
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}

?>