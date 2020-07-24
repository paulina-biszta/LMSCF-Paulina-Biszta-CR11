<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);


$resCar = mysqli_query($conn, "SELECT * FROM car WHERE available = 'yes'");

?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userEmail' ]; ?></title>
</head>
<body >
           Hi <?php echo $userRow['userEmail' ]; ?>
           
           <a  href="logout.php?logout">Sign Out</a><br><hr>

           <?php
           if($resCar->num_rows == 0 ){
			echo "No result";
		}elseif($resCar->num_rows == 1){
			$row = $resCar->fetch_assoc();
			echo $row["model"]. " ". $row["type"]." ".$row["color"]. " ".$row["available"];
		}else {
			$rows = $resCar->fetch_all(MYSQLI_ASSOC);
			foreach ($rows as $value) {
				echo $value["car_id"]. " ----- " .$value["model"]. " ". $value["type"]." ".$value["color"]. " ".$value["available"]." <a href='booking.php?id=".$value["car_id"]."'>Booking Now</a><br>";
			}
		}

 		?>
		
       		

 
</body>
</html>
<?php ob_end_flush(); ?>