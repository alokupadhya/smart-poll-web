<?php
	session_start();
	include_once("api.php");
	if(isset($_SESSION['login'])){
		if($_SESSION['login'] == true){
			header('location:home.php');
			exit();
		}
	}
	if(isset($_POST['login'])){
		if(checkUser($_POST['user'],md5($_POST['pass'])) == true){
			$_SESSION['username'] = $_POST['user'];
			$_SESSION['login'] = true;
			header('location:home.php');
			exit();
		}
		else{
			$ERROR_MSG = "Wrong username or password";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mobpolling | Web</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="res/bs/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="res/css/custom.css"></link>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<?php 
			include('header.php');
		?>
		<div class="main row">
			<div class="col-lg-7 text-center">
				<img src="res/img/logo.png" width="250" height="250"><br>
				<h4><b>tried, <span style='color:#165669;'>Smart</span>Polling ?</b></h4>
			</div>
			<div class="col-lg-5">
				<form class="form-login text-center" action="" method="post">
					<h3><i class="glyphicon glyphicon-user"></i><b>User Login</b></h3><br>
					<input type="text" name="user" placeholder="Email Id"><br>
					<input type="password" name="pass" placeholder="Password">
					<input type="submit" name="login" value="Login"><br>
					<span>Create account<a href="register.php"> click here</a></span>
					<?php
						if(isset($ERROR_MSG)){
							echo "<div class='alert alert-danger text-center' style='margin-top: 10px;'>";
				  			echo "<strong>Error!</strong> ".$ERROR_MSG."</div>";
						}
					?>
				</form>
			</div>
		</div>
		<?php 
			include('footer.php');
		?>
	</div>
	<script type="text/javascript" src="res/bs/js/jquery.min.js"></script>
	<script type="text/javascript" src="res/bs/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="res/btn-cstm.js"></script>
</body>
</html>