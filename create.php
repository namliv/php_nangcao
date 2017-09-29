<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
</head>
<body>
	<form action="save-user.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<div>
			<input type="text" name="name" value="" placeholder="Name">
		</div>
		<div>
			<input type="text" name="email" value="" placeholder="Email">
		</div>
		<div>
			<input type="password" name="password" value="" placeholder="Password">
		</div>
		<div>
			<label>Avatar</label>
			<input type="file" name="avatar" value="" placeholder="">
		</div>	
		<div>
			<button type="submit">Add User</button>
		</div>
	</form>
</body>
</html>