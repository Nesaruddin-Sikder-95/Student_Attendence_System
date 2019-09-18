<?php
date_default_timezone_set("Asia/Dhaka");
session_start();

include 'config/db.php';
include 'assets/support_files/employee_action.php';
if (empty($_SESSION["employee_name"])) {
		header('Location: index.php');
	}
	$user_id = $_SESSION["employee_name"];

$office_start_time=date('10:0:0a');
$sql="select * from e_login where username='$user_id'";
$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_assoc($result))
{
	
	 $user_name=$row['name'];
	//after log in  code starts here//	        	  
	 $late=late_calculation();  
	 $e_id=$row['username'];
	 insert($user_name,$user_id,$late,$db);
    
}
if(isset($_POST['submit']))
{
	session_start();
	session_unset();
	session_destroy();
	setlog_out_time($db,$user_id);
  	header ("Location:index.php");
}
?>
    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Employee</title>
        <!--<link href="assets/css/employee_style.css" rel="stylesheet" type="text/css">-->
        <link rel="icon" href="Images/userIcon.png">
        <style>

* {
    margin: 0px;
    padding: 0px;
}


body{
background:white;	
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
		.mainmenue{float: right;
			margin-right:30px;
		}
		input[type=submit] {
		    width: 100%;
		    background-color: black;
		    color: white;
		    padding: 10px 15px;
		    margin: 5px 0;
		    border: none;
		    border-radius: 2px;
		    cursor: pointer;
			}
			input[type=submit]:hover {
		    background-color: #45a049;
}


.main_section{
    width: 100%;
    height: 700px;
   
    
}
.main_section_container{
    width: 90%;
    height: auto;
    margin: auto;
    background-color: ;
}
.user_info{
    width: 100%;
    height: 35px;
    background-color:;
	color:#1B2631;
    
}
.user_info h2{
      float:left;
      font-size:30px;
      font-style:italic;
      font-style:bold;	
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

    	<header class="header clear">
		<h2>Attendance Sheet</h2>
		<div class="mainmenue">
			<form method="post" action="">
                 <input type="submit" value="Log out" name="submit">
            </form>
		</div>
	</header>
       
        <div class="main_section">
            <div class="main_section_container">
                <div class="user_info">
                <h2>Welcome <?php echo $user_name;?></h2>
                </div>
                <div class="user_attendance">
    <table id="customers">
  <tr>
    <th>Date</th>
    <th>LogInTime</th>
    <th>logOutTime</th>
    <th>LateTime(Minutes)</th>
    <th>Status</th>
  </tr>
  <?php  show_employee($user_id,$db);?>
 
 
</table>

    <table id="customers">
    <?php echo attendance_result($db,$user_id); ?>
   </table>
                </div>
            </div>
        </div>
    </body>

    </html>