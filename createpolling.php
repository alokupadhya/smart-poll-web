<?php
	session_start();
	include_once("api.php");
	if($_SESSION['login']!= true){
		header('location:index.php');
		exit();
	}
	$udetail = getUserDetail($_SESSION['username']);
	$name = explode(" ",$udetail[0]['fullname']);
	$email = $udetail[0]['email'];
	$id = $udetail[0]['uID'];

	if(isset($_GET['submit_polling'])){
		$day = (int)date('d');
		$month = (int)date('m'); 
		$year = (int)date('y');
		$status = 1;
		$pcode = getCode();

		//Create Secrate code
		if(empty($_GET['p_name'])){
			$ERROR_MSG_PRES = "Presentation name feild is empty.";
		}
		else if(empty($_GET['qus'])){
			$ERROR_MSG_PRES = "Question feild is empty.";
		}
		else{
			$pres = savePresentation($_GET['qus'],$id,$day,$month,$year,$status,$_GET['p_name'],$pcode);
			if($pres==true){
				$pid = getPid();
				// $pid[0]['LAST_INSERT_ID()']
				$iter = (int)$_GET['default'];
				for($i = 1; $i<=$iter ; $i++ ){
					$value = "option".$i;
					if(empty($_GET[$value])){
						$ERROR_MSG_PRES = $value." feild is empty.";
						header("location:createpolling.php");
						exit();
					}
					else{
						$res_op = saveOptions($_GET[$value],$pid[0]['LAST_INSERT_ID()']);
					}
				}
				header("location:presentation.php?a=".$pid[0]['LAST_INSERT_ID()']);
				exit();
			}
			else {
				echo "Connection Problem";
			}
		}
	}
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
		</div><br>
		<div class="well well-sm"><a href="home.php" style="text-decoration: none;">Home</a>	/	Make a Poll</div>
		<div class="main" style="padding: 20px 50px 50px 50px!important;">
			<span style="font-size: 20px;"><i class="fa fa-bar-chart"></i>&nbsp<b>Make a Polling</b></span>
			<br><br><br>
			<form class="poll" method='get' action="">
				<input type="text" name="p_name" placeholder="Presentation Name" required="">
				<textarea name="qus" placeholder="Your Question..." rows="3" cols="150" required=""></textarea><br>
				<input type="text" name="option1" placeholder="option1" required=""><br>
				<input type="text" name="option2" placeholder="option2" required=""><br>
				<div id="addmoreoption">
					<input type="text" name="default" value="2" hidden="">
				</div>
				<br>
				<input type="submit" class="btn" name="submit_polling" value="Make Polling"><br><br>
			</form>
			<button onclick="addOption()" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Add More Option</button><i>(Max option is 9)</i>
		</div>
		<?php 
			include('footer.php');
		?>
	</div>
	<script type="text/javascript" src="res/bs/js/jquery.min.js"></script>
	<script type="text/javascript" src="res/bs/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		var count = 0;
		var name = [3456789]
		function addOption(){
			count += 1;
			setOption(count);
		}
		function removeOption(){
			count -= 1;
			setOption(count);
		}
		function setOption(c){
			var options = "";
			for(var i = 0 ; i < c ; i++){
				if(c<8){
					options += "<input type='text' name='option"+name[i]+"' placeholder='option"+name[i]+"' required=''>&nbsp;&nbsp;<i class='glyphicon glyphicon-remove' onclick='removeOption()'></i><br>";
				}
				else{
					return;
				}
			}
			newc = c+2
			options +="<input type='text' name='default' value='"+newc+"' hidden=''>"
			document.getElementById("addmoreoption").innerHTML = options;
		}
	</script>
</body>
</html>