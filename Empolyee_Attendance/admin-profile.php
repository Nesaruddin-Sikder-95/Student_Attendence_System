<?php
	session_start();
	include 'config/db.php';
	if (empty($_SESSION["admin_name"])) {
		header('Location: index.php');
	}
	$admin_name = $_SESSION["admin_name"];
	$admin = "SELECT * FROM admin_information WHERE username='$admin_name'";
	$result = mysqli_query($db, $admin);
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row["name"];
		$email = $row["e_mail"];
		$phone = $row["phone"];
		$designation = $row["designation"];
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
	<h1> Name: <?php echo $name; ?></h1>
	<h3> E-mail: <?php echo $email; ?></h3>
	<h3> Phone: <?php echo $phone; ?></h3>
	<h3> Designation: <?php echo $designation; ?></h3>
</body>
</html>