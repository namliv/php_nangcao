<?php 


$id = isset($_GET['id']) == true ? $_GET['id'] : null;

if($id == null){
	echo "<h1>Sai Duong Dan</h1><a href='index.php'>Tro Ve Trang Chu</a>";
	die;
}

//ktra id co ton tai trong csdl hay ko
require_once 'db.php';

$sql = "SELECT * FROM users where id = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetch();
if($user == false){
	echo "<h1>Nguoi dung ko ton tai</h1><a href='index.php'>Tro Ve Trang Chu</a>";
	die;
}

$sql = "delete from users where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':id' , $id);
$stmt->execute();

header('location:index.php');





?>