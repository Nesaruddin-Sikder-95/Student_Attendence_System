<!doctype html>
<html>
<?php
  include 'config/db.php';
  include 'assets/support_files/add.php';

?>
<head>
<meta charset="utf-8">
<title>Admin</title>
<link rel="icon" href="Images/adminIcon.png">
<style>
*{padding: 0; margin: 0;}
body{background-image: url("Images/backgroundImage.jpg");}
#myHeader {
    		color: #0080ff;
    		border: 1px solid #ccc;
     		background-color: #ccc;
    		border-radius: 1px;
    		width: 100%;
    		padding: 20px;
    		margin: auto;
    		text-align: center;
	} 
.add_employee{
   width:160px;
   height:40px;
   background:black;
   text-align:center;
   border-radius:25px;
   position:fixed;
   margin-top:40px;
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
	 line-height:10px;	
	}
	body {
    font-family: Arial, Helvetica, sans-serif;
    
}

* {
    box-sizing: border-box;
}
h2{text-align:center;margin-top:10px;margin-buttom:10px;}
/* Add padding to containers */
.container {
	
	margin:auto;
	width:50%;
    padding: 16px;
    background-color: #32526E;
	
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    background: white;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: white;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid white;
    margin-bottom: 25px;
}
.form_error span{
	color:#DB3D5A;
	font-size:18px;
}
.form_error input{
	border:1px solid #DB3D5A;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

</style>
</head>

<body>

 <div class="add_employee">
       <a href="attendance.php">Back to Attandence</a>
 </div>
 <div class="myHeader">
		<h1 id="myHeader">Employee Attendance System</h1>
 </div>

 <h2><?php if(isset($tmp))echo $tmp; ?></h2>
   <form action="" method="post" target="">
  <div class="container">
    <h1>Employee Registration Form</h1>
    <hr>

    <label for="email"><b>Full Name</b></label>
    <div
    	<?php if (isset($name_error)):?> 
    		class ="form_error"
    	<?php endif?>
    >	
    <input type="text" placeholder="Full Name" name="name" value="<?php echo $name;?>" required>
    <?php if (isset($name_error)):?> 
    		<span><?php echo $name_error;?></span>
    <?php endif?>
</div>
    <label for="psw"><b>User name</b></label>
    <div
    	<?php if (isset($username_error)):?> 
    		class ="form_error"
    	<?php endif?>
    >	
    <input type="text" placeholder="Enter Username" name="user" value="<?php echo $user_name;?>" required>
    <?php if (isset($username_error)):?> 
    		<span><?php echo $username_error;?></span>
    <?php endif?>
</div>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>
    <hr>

    <button type="submit" class="registerbtn" name="submit">Submit</button>
  </div>
</form>
</body>
</html>