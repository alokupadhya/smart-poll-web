<?php
	session_start();
	include_once("api.php");
	if($_SESSION['login'] != true){
		header('location:index.php');
		exit();
	}
	$udetail = getUserDetail($_SESSION['username']);
	$name = explode(" ",$udetail[0]['fullname']);
	$email = $udetail[0]['email'];
	$id = $udetail[0]['uID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Smartpolling | Web</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="res/bs/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="res/css/custom.css"></link>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="header row">
			<div class="col-lg-5 col-md-5 col-sm-5"><i class="glyphicon glyphicon-user"></i>&nbsp;<b><?php echo $name[0];?></b></div>
			<div class="col-lg-7 col-md-7 col-sm-7 logout-btn text-right">
				<a href="logout.php"><i class="glyphicon glyphicon-off"></i> Logout</a>
			</div>
		</div>
		<div class="main">	
			<div class="well well-sm"><a href="home.php" style="text-decoration: none;">Home</a>	/	Account Setting</div>
			<form class="acc-form">
				<label>Change your profile name</label><br>
				<input class="accin" type="text" name="name" placeholder="New name">
				<button class="btn btn-primary">Change</button>
			</form><hr>
			<form class="acc-form">
				<label>Change your password</label><br>
				<input class="accin" type="password" name="pass" placeholder="New password">
				<input class="accin" type="password" name="pass" placeholder="Old password">
				<button class="btn btn-primary">Change</button>
			</form>		
		</div>
		<?php 
			include('footer.php');
		?>
	</div>
	<script type="text/javascript" src="res/bs/js/jquery.min.js"></script>
	<script type="text/javascript" src="res/bs/js/bootstrap.min.js"></script>
</body>
</html>