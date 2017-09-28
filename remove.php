<?php 


$id = isset($_GET['id']) == true ? $_GET['id'] : null;

if($id == null){
	echo "<h1>Sai Duong Dan</h1><a href='index.php'>Tro Ve Trang Chu</a>";
	die;
}

//ktra id co ton tai trong csdl hay ko
require_once 'db.php';

$sql = "SELECT * FROM user where id = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetch();
var_dump($user);





?>