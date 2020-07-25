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


$resAnim = mysqli_query($conn, "SELECT * FROM animal
INNER JOIN pet_location ON pet_location.location_id=animal.fk_location_id WHERE age < 8");

?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userEmail' ]; ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="bg-light" >

<div class="jumbotron jumbotron-fluid m-0" style="background-color:rgba(162,202,78, 0.8);">
  <div class="container">
    <h1 class="display-4"><span>😺</span>Adopt-a-pet</h1>
    <p class="lead">All those cuties are waiting just for you to take them home.</p>
  </div>
</div>
<div class="d-flex flex-row bd-highlight align-items-center justify-content-end bg-dark p-2">
  <div class="text-right bd-highlight">
  <h5 class=" text-white mr-3 mb-0">Hi <?php echo $userRow['userName' ]; ?><span>😺</span></h5>
  </div>
	<div class="bd-highlight">
    <a href="logout.php?logout"><button type="button" class="btn text-white mr-3" style="background-color:rgba(162,202,78, 0.8);">Sing out</button></a>
	</div>
</div>

<div style="background-color:rgba(162,202,78, 0.8);">
<nav class="nav nav-pills nav-justified">
  <a class="nav-item nav-link text-dark" href="home.php">All Cats</a>
  <a class="nav-item nav-link text-dark" href="general.php">Kittens & Adults</a>
  <a class="nav-item nav-link text-dark" href="senior.php">Seniors</a>
</nav>
</div>
         
		   <div class="container-fluid">

    <div class="row m-5 justify-content-between">

           <?php 
  
while ($row = mysqli_fetch_assoc($resAnim)) {

  echo '
  
<div class="card col-3 m-3 p-0 text-light" style="background-color:rgba(162,202,78, 0.8);">
    <img class="card-img-top" src="'.$row["img"].'" style="width:100%; height:15vw;">
    <div class="card-body">
      <h5 class="card-title ">'.$row["name"].'</h5>
      <p class="card-text">Age: '.$row["age"].'</p>
      <p class="card-text">Description: '.$row["description"].'</p>
      <p class="card-text">Type: '.$row["type"].'</p>
      <p class="card-text">Hobby: '.$row["hobby"].'</p>
      <p class="card-text">City: '.$row["city"].'</p>
      <p class="card-text">Zip Code: '.$row["code"].'</p>
      <p class="card-text">Street: '.$row["street"].'</p>
    </div>
</div>
  
  ';
}
?>
	</div>
</div>
       		

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>