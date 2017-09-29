<?php 

//Lấy dữ liệu từ form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$avatar = $_POST['avatar'];

require_once 'db.php';

// Kiêm tra email đã tồn tại hay chưa
$sql = "SELECT * FROM users where email = :email";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$user = $stmt->fetch();
if($user != false){
	echo "<h1>Email đã  ton tai</h1><a href='index.php'>Tro Ve Trang Chu</a>";
	die;
}
// thêm dữ liệu vào db
$sql = "insert into users(name,email,password) values (:name,:email,:password)";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':name', $name);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', md5($password));

$stmt->execute();
header('location:index.php');
?>