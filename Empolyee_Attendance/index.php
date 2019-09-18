<?php
	session_start();
	include 'config/db.php';
	if (isset($_POST["Login"])) {
		//echo "Submit hitted";
		$roll = $_POST["roll"];
		$name = $_POST["username"];
		$pass = $_POST["password"];
		if ($roll == "Admin") {
			$admin = "select * from admin;";
			$result = mysqli_query($db,$admin);
			while ($row = mysqli_fetch_assoc($result)) {
				if ($row["username"] ==$name && $row["password"] ==$pass) {
					$_SESSION["admin_name"] = $name;
					header('Location: attendance.php');
				}
			}
		} else if ($roll == "Teacher") {
			$user = "select * from e_login;";
			$result = mysqli_query($db,$user);
			while ($row = mysqli_fetch_assoc($result)) {
				if ($row["username"] ==$name && $row["password"] ==$pass) {
					$_SESSION["employee_name"] = $name;
					//header('Location: employee-profile.php');
					header('Location: employee.php');
				}
			}
		}
		
	}
		
?>
<!DOCTYPE html>

<html>
<head>
	<title>Teacher Attendance System</title>
	<link rel="icon" href="Images/userIcon.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		*{padding: 0; margin: 0;}
		body{background-image: url("Images/backgroundImage.jpg");}
		#myHeader {
    		color: #0080ff;
    		border: 1px solid #ccc;
     		background-color: #ccc;
    		border-radius: 1px;
    		width: 40%;
    		padding: 20px;
    		margin: auto;
    		text-align: center;
   			margin-top: 20px;

	} 
	#form{
		background-color: #32526E;;
		margin: auto;
    	width: 20%;
    	padding: 50px;
    	margin-top: 45px;
	}
	input[type=text],[type=password], select {
	    width: 100%;
	    padding: 12px 20px;
	    margin: 5px 0 22px 0;
	    display: inline-block;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    box-sizing: border-box;
	}
		input[type=submit] {
		    width: 100%;
		    background-color: #4CAF50;
		    color: white;
		    padding: 14px 20px;
		    margin: 8px 0;
		    border: none;
		    border-radius: 4px;
		    cursor: pointer;
			}
			input[type=submit]:hover {
		    background-color: #45a049;
		}

	</style>
</head>
<body>
	<h1 id="myHeader">Teacher Attendance System</h1>
	<form id ="form"  method="post" action="">
		<b>Username</b> </br>
		<input type="text" name="username" placeholder="username..." required></br>
		<b>Password</b> </br>
		<input type="password" name="password" placeholder="password..." required></br>
		<b>Select Your Option</b> </br>
		<select name="roll">
			<option hidden>Sign In As</option>
			<option>Teacher</option>
			<option>Admin</option>
		</select></br>
		<input type="submit" name="Login" value= "Login">	
	</form>
</body>
</html>