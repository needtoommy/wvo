<?php session_start(); ?>


<!DOCTYPE html>
<html>

<head>
	<title>ระบบสวัสดิการสงเคราะห์ทหารผ่านศึก</title>
	<link rel="stylesheet" type="text/css" href="css2/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400&display=swap" rel="stylesheet">
</head>

<style>
	body {
		font-family: 'Prompt', sans-serif;
	}
	
	#btn {
		font-family: 'Prompt', sans-serif;
	}
</style>

<body>
	<img class="wave" src="img2/wave.png">
	<div class="container">
		<div class="img">
			<img src="img2/log2.svg">
		</div>
		<div class="login-content">
			<!--<form action="index.html">-->
			<form name="formlogin" action="chklogin.php" method="POST" id="login" class="form-horizontal">
				<img src="img2/wvo.png">
				<h1 class="title">ระบบสวัสดิการสงเคราะห์ทหารผ่านศึก</h1>


				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>


					<div class="div">
						<!--<h5>Username</h5>-->
						<input type="text" name="m_username" class="form-control" required placeholder="Username" />
						<!--	<input type="text" class="input"> -->
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<!--<h5>Password</h5>-->
						<input type="password" name="m_password" class="form-control" required placeholder="Password" />
						<!--	<input type="password" class="input"> -->
					</div>
				</div>
				<a href="#">Forgot Password?</a>
				<button type="submit" class="btn btn-primary" id="btn">เข้าสู่ระบบ</button>
				<!--<input type="submit" class="btn" value="Login">-->
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js2/main.js"></script>
</body>

</html>