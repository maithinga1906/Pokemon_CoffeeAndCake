<?php
	require "conect.php";

	if (isset($_POST["signup"])) {
		$username = $_POST["username"];
		$phone = $_POST["phone"];
		$address = $_POST["address"];
		$fullname = $_POST["fullname"];
		$password = $_POST["password"];
		$confirm = $_POST["repassword"];

		if ($password == $confirm) {
			$sql1 =  "INSERT INTO users(fullName, username, pass) VALUES ('".$fullname."', '".$username."','".$password."');";
			$db->query($sql1);
			$sql2 = "INSERT INTO customer(fullname, phone, address) VALUES ('".$fullname."', '".$phone."','".$address."');";
			$db->query($sql2);
			header("location: index.php");
		}else{
			echo "<center><h1 style ='color: white'>Mật khẩu không khớp</h1></center>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<style type="text/css">
		body{
			background-image: url("nen.jpg");
			background-size: cover;
			justify-content: center;
			align-items: center;
			font-family: verdana;
			opacity: 0.7;
			transform: translate(2%, 9%);
		}
		.main{
			justify-content: center;
			background-color: #000;
			color: white;
			border: 1px solid #0f0d0e;
			width: 30%;
			margin-left: 35%;
		}
		input{
			height: 30px;
			width: 80%;
			border: 0px;
			border-bottom: 1px solid white;
			background-color: #000000;
			color: white;
		}
		.name{
			align-items: center; 
			justify-content: center;
			margin: 0px;
		}
		button{
			background-color: #008000;
			border-color: #008000;
			border: 1px solid #008000;
			width: 85%;
			height: 30px;
			margin-bottom: 20px;
		}
		button:hover {
			background-color: #cc0000;
			border: 1px solid #cc0000;
		}
		a{
			color: white;
		}
		.signup{
			margin-bottom: 20px;
		}
		a:hover{
			color: pink;
		}
	</style>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>
<body>
	<form class="main" method="post">
		<center>
			<h1>SIGN UP</h1>
		</center>
		<div style="margin-left: 45px;">
			<div class="fullname">
				<p>Fullname</p>
					<div>
						<i class="fas fa-user"></i>
						<input type="text" name="fullname" placeholder="  fullname">
					</div>
			</div>
			<br>
			<div class="phone">
				<p>Phone</p>
					<div>
						<i class="fas fa-phone"></i>
						<input type="text" name="phone" placeholder="  fullname">
					</div>
			</div>
			<br>
			<div class="address">
				<p>Address</p>
					<div>
						<i class="fas fa-map-marker-alt"></i>
						<input type="text" name="address" placeholder="  fullname">
					</div>
			</div>
			<br>
			<div class="user">
				
				<p>Username</p>
				<div>
					<i class="fas fa-user"></i>
					<input type="text" name="username" placeholder="  username">
				</div>
			</div>
			<br>
			<div class="pass">
				<p>Password</p>
				<div>
					<i class="fas fa-lock"></i>
					<input type="password" name="password" placeholder="  password">
				</div>
			</div>
			<br>
			<div class="pass">
				<p>Confirm password</p>
				<div>
					<i class="fas fa-unlock"></i>
					<input type="password" name="repassword" placeholder="Confirm password">
				</div>
			</div>
			<br>
			<button name="signup">REGISTER</button>
			<br>
		</div>
	</form>
</body>
</html>