<?php
$name='';
$user_name='';
$password='';

if(isset($_POST['submit']))
{
  	$name=$_POST['name'];
	$user_name=$_POST['user'];
	$password=$_POST['pass'];

	$sql_n = "SELECT * FROM e_login WHERE  name = '$name'";
	$sql_u = "SELECT * FROM e_login WHERE username = '$user_name'";
	$res_n = mysqli_query($db,$sql_n) or die(mysqli_error($db));
	$res_u = mysqli_query($db,$sql_u) or die(mysqli_error($db));

	if (mysqli_num_rows($res_n)>0) {
		$name_error= "Sorry... Name already taken";
	}
	else if (mysqli_num_rows($res_u)>0) {
		$username_error= "Sorry... Username already taken";
	}
	else{
	$sql="INSERT INTO `e_login`(`name`, `username`, `password`) VALUES ('$name','$user_name','$password')";
	$result = mysqli_query($db,$sql) or die(mysqli_error($db));
	$tmp="Employee Added Successfully <br>Username : ".$user_name."<br>Password : ".$password;
	mysqli_close($db);
}
}
?>

