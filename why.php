<?php
	session_start();
	include_once("api.php");
	if(isset($_SESSION['login'])){
		if($_SESSION['login'] == true){
			header('location:../home.php');
			exit();
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