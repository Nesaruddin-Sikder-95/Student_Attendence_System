<?php
session_start();
if (empty($_SESSION["admin_name"])) {
		header('Location: index.php');
	}
	$admin_name = $_SESSION["admin_name"];
date_default_timezone_set("Asia/Dhaka");
include 'config/db.php';
include 'assets/support_files/admin_action.php';
  $current_date=date("d:m:y");
  $row=todays_date($db);//todays date checks if exits
  if($row==0)
  {
	   insert($db);
	 
  }
  
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<!--<link href="assets/css/admin_style.css" rel="stylesheet" type="text/css">-->
<link rel="icon" href="Images/adminIcon.png">
<style>
/* CSS Document */

* {
    margin: 0px;
    padding: 0px;
}

body{
background:white;
	}
.add_employee{
   width:150px;
   height:40px;
   background:black;
   text-align:center;
   border-radius:25px;
   position:fixed;
   margin-top:25px;
   margin-right:25%;
   transition:all .1s ease-in-out 0s;
	}
.add_employee:hover{
   	width:170px;
   	background:#45a049;
	}
.add_employee a{
     text-decoration:none;
	 color:white;
	 line-height:30px;	
	}
.clear{overflow: hidden;}
		.header {background: #2874A6  ;}
		.header h2 {
			width: 100%;
			height: 30px;
			font-size: 30px;
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
			background: black;
			margin-left: 20px;
			margin-right: 10px;
			text-decoration: none;
		}
		.mainmenu ul a:hover{
			background: #45a049;
		}

.main{
   width:100%;
   
	}
.main_container{
   width:90%;
   height:auto;
   margin:auto;	
	}

.user_attendance{
    
    width: 100%;
    height:auto;
    text-align:center;
	color:#4195ED;
}

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 100%;
	margin-top:20px;
}

#customers td, #customers th {
    border: 1px solid black;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #34495E;}
#customers tr:nth-child(odd){background-color: #34495E;}
#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #45a049;
    color: black;
}
</style>
</head>

<body>
   <div class="add_employee">
       <a href="add_employee.php">Add Teacher</a>
   </div>
    <header class="header clear">
		<h2>Teacher Attendance System</h2>
		<div class="mainmenu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</header>
  <div class="main">
    <div class="main_container">
    <div class="user_attendance">
    <table id="customers">
  <tr>
    <th>Date</th>
    <th>Name</th>
    <th>Username</th>
    <th>LogIn Time</th>
    <th>logOutTime</th>
    <th>LateTime(Minutes)</th>
    <th>Status</th>
  </tr>
  <?php  show_employee($db);?>
 
</table>

    </div> 
 </div>
  
</div>
  
</body>
</html>