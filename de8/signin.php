<?php
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	include('connect.php');
	if(!empty($_POST['submit'])){
		if(isset($_POST['username'])&&isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM user WHERE username = '$username' AND matkhau = '$password'";
			$stmt = $conn->prepare($sql);
			$query = $stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if(!$row){
				echo "Đăng nhập thất bại";
			}
			else{
				$_SESSION['username'] = $username;
				$_SESSION['datetime'] = date("d/m/Y H:i:s");
				header("location:index.php");
			}
		}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Trang Đăng Nhập</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
	<header>QUẢN LÝ VẬN ĐƠN</header>
	<content>
		<div class="container">
			<form method="post">
				<fieldset class="form-group">
					<label for="formGroupExampleInput">Tài khoản</label>
					<input type="text" class="form-control"name="username" placeholder="Nhập tài khoản">
				</fieldset>
				<fieldset class="form-group">
					<label for="formGroupExampleInput2">Mật khẩu</label>
					<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
				</fieldset>
				<fieldset class="form-group">
					<input type="submit" class="form-control" name="submit" value="ĐĂNG NHẬP">
				</fieldset>
			</form>
		</div>
		
	</content>
	<footer>Vũ Khánh Linh-83759</footer>
</body>
</html>
