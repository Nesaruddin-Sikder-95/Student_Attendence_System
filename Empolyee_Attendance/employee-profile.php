<?php
	session_start();
	include 'config/db.php';
	if (empty($_SESSION["employee_name"])) {
		header('Location: index.php');
	}
	$employee_name = $_SESSION["employee_name"];
	//echo "Welcome " . $employee_name;
	$user = "SELECT * FROM e_information WHERE username='$employee_name'";
	$result = mysqli_query($db, $user);
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row["name"];
		$email = $row["e_mail"];
		$phone = $row["phone"];
		$designation = $row["designation"];
		$job = $row["job_status"];
		$join = $row["join_date"];
		$resign = $row["resign_date"];
		$image = $row["image"];

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $name; ?></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<a href="logout.php">Log Out!</a>
	<h1> Name: <?php echo $name; ?></h1>
	<h3> E-mail: <?php echo $email; ?></h3>
	<h3> Phone: <?php echo $phone; ?></h3>
	<h3> Designation: <?php echo $designation; ?></h3>
	<h3> Job Status: <?php echo $job; ?></h3>
	<h3> Joining Date: <?php echo $join; ?></h3>
	<h3> Ending Date: <?php echo $resign; ?></h3>
</body>
</html>