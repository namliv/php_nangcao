<?php 
     //lay id tu url
$id = isset($_GET['id']) ==  true ? $_GET['id'] : null;

     //kiem tra id co hop le ko
if($id == null){
	echo '<h1>Sai Duong dan</h1><a href="index.php">Tro ve trang chu</a>';
}
     //lay thong tin user tu id
require_once 'db.php';

$sql = "SELECT * FROM users where id = $id";

$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetch();
if($user == false){
	echo "<h1>Nguoi dung ko ton tai</h1><a href='index.php'>Tro Ve Trang Chu</a>";
	die;
}
?>
<!-- //hien thi form voi dlieu co san tu csdl -->
<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
</head>
<body>
	<form action="save-update-user.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
		<input type="hidden" name="id" value="<?= $user['id'] ?>">
		<div>
			<input type="text" name="name" value="<?= $user['name'] ?>" placeholder="Name">
		</div>
		<div>
			<input type="text" name="email" value="<?= $user['email'] ?>" placeholder="Email">
		</div>
		<div>
			<label>Avatar</label>
			<?php 
			if($user['avatar'] != null){
				?>
				<br>
				<img src="<?= $user['avatar'] ?>" width="100">
				<br>
				<?php } ?>
				<input type="file" name="avatar" value="" placeholder="">
			</div>	
			<div>
				<button type="submit">Add User</button>
			</div>
		</form>
	</body>
	</html>