<?php
	session_start();
	require_once 'dbconnect.php';

	if(isset($_POST["submit"])){
		$carId = $_GET["id"];
		$userId = $_SESSION["user"];
		$booking_date_start = $_POST["booking_date_start"];
		$booking_date_end = $_POST["booking_date_end"];

		$sql = "INSERT INTO booking (booking_date_start, booking_date_end, fk_user_id, fk_car_id) VALUES ('$booking_date_start','$booking_date_end',$userId,$carId)";

		$sql2 = "UPDATE `car` SET `available`='no' WHERE car_id = $carId";

		if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
			echo "Booking success <br> <a href='home.php'>Back to home page</a><br>";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<input type="date" name="booking_date_start">
		<input type="date" name="booking_date_end">
		<input type="submit" name="submit">

	</form>
</body>
</html>