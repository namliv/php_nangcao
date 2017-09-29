<?php 

//Lấy dữ liệu từ form
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

require_once 'db.php';

// Kiêm tra email đã tồn tại hay chưa
$sql = "SELECT * FROM users where id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':id', $id);
$stmt->execute();
$user = $stmt->fetch();
if($user == false){
	echo "<h1>Thanh vien ko ton tai</h1><a href='index.php'>Tro Ve Trang Chu</a>";
	die;
}
// sua dữ liệu vào db
$sql = "update users set 
name = :name, email = :email
";
$fileName = null;
if($avatar['size'] > 0){
	//dat ten anh
	$fileName = 'uploads/' . uniqid() . "-" . $avatar['name'];
	//luu anh tren server tra ve true thi luu thanh cong
	if(move_uploaded_file($avatar['tmp_name'], $fileName)){
		$sql .= ", avatar =: fileName";		
	}else{
		$fileName = null;
	}
}
$sql .= " where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':name', $name);
$stmt->bindValue(':email', $email);
if($fileName != null){
	$stmt->bindValue(':fileName', $fileName);
}
$stmt->bindValue(':id',$id);
$stmt->execute();
header('location:index.php');
?>