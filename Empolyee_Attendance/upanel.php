<?php
	session_start();
	include 'config/db.php';
	if (empty($_SESSION["employee_name"])) {
		header('Location: index.php');
	}
	$employee_name = $_SESSION["employee_name"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Panel</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		.clear{overflow: hidden;}
		.header {background: #2874A6  ;}
		.header h2 {
			width: 100%;
			height: 0px;
			font-size: 20px;
			margin:0;
			color: white;
			text-align: center;

		}
		.mainmenu ul {
			margin:0; padding: 0; list-style: none;float: right;
		}
		.mainmenu ul li {
			display: block;float: left;
		}
		.mainmenu ul li a {
			color: white;
			display: block;
			padding: 5px 25px;
			background: #212F3C;
			margin-left: 20px;
			margin-right: 10px;
			text-decoration: none;
		}
		.mainmenu ul a:hover{
			background: #117A65;
		}
		.leftsidebar{
			background: black ;
			color: gray;
			width: 300px;
			float: left;
		}
		.sidebar  ul{
			margin:0; padding: 0; list-style: none;
		}
		.sidebar  ul li{
			padding: 20px;
		}
		.sidebar  ul li a{
			text-decoration: none;
			padding:5px 50px;
			color: gray;
			display: block;
		}
		.sidebar  ul li a:hover{
			background: #117A65;
			color: white;
		}
		.footer{background: #2874A6 ;
			width: 100%;
			height: 75px;
			font-size: 40px;
			margin:0;
			color: white;
			text-align: center;
		}
		.userlogo{
			border-radius: 50px;
		}

	</style>
</head>
<body>
	<header class="header clear">
		<center><img src="Image/userIcon.png" class="userlogo"></center>
		<h2>User Panel</h2>
		<div class="mainmenu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</header>
	<section class="contentsection clear">
		<aside class="leftsidebar clear">
			<div class="sidebar">
			<ul>
				<li><a href="">Dashboard</a></li>
				<li><a href="">View Profile</a></li>
				<li><a href="">Edit Profile</a></li>
				<li><a href="">Give Attendance</a></li>
				<li><a href="">View All Attendance</a></li>
				<li><a href="">View All Attendance</a></li>
				
			</ul>	
		</div>
		</aside>	
	</section>
	<footer class ="footer clear">
		<h3>Thanks</h3>
	</footer>
</body>
</html>
