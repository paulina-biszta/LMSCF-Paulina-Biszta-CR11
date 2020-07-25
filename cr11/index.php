<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user' ])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }

 // if there's no error, continue to login
 if (!$error) {
 
  $password = hash( 'sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='$email'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
 echo $row['status'];
  if( $count == 1 && $row['userPass' ]==$password ) {
   if($row["status"] == 'user'){
    $_SESSION['user'] = $row['userId'];
    header( "Location: home.php");
   }else if($row['status']== 'admin'){

    $_SESSION['admin'] = $row['userId']; 
    //$_SESSION["admin"] == $row["userId"];
     header("Location: admin.php");
   }else {
    $_SESSION['superadmin'] = $row['userId']; 
    //$_SESSION["superadmin"] == $row["userId"];
     header("Location: superadmin.php");
   }
  
  } else {
   $errMSG = "Incorrect Credentials, Try again..." ;
  }
 
 }

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="d-flex justify-content-between align-items-center" style="background-color:rgba(162,202,78, 0.8);">
      <div class="d-flex flex-column">
              <h1 class="display-4 p-3 m-0"><span>😺</span>Adopt-a-pet</h1>
      </div>
      <div class="d-flex flex-column align-items-center pr-4 pt-2">
      <?php
  if ( isset($errMSG) ) {
echo  $errMSG; ?>
             
               <?php
  }
  ?>
    <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
              <input  type="email" name="email"  class="form-control w-100 m-1" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40" />
              <span class="text-danger"><?php  echo $emailError; ?></span >
              <input  type="password" name="pass"  class="form-control w-100 m-1" placeholder ="Your Password" maxlength="15"  />
              <span  class="text-danger"><?php  echo $passError; ?></span>
              <button class="btn btn-success w-100 ml-1 mr-1 mb-3" type="submit" name= "btn-login">Sign In</button>
      </div>
</div>
    <div class="container-fluid m-0 p-0">
    <div id="carouselExampleControls" class="carousel slide p-0 m-0" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/cat2.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
    <h1 class="display-4 p-2" style="background-color:rgba(162,202,78, 0.6);" ><span>😺</span>Join us!</h1>
    <button class="lead btn text-white w-50 ml-2" style="background-color:rgba(162,202,78, 0.8);"><a class="text-white" href="register.php">SING UP HERE...</a></button>
  
</div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/cat1.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
    <h1 class="display-4 p-2" style="background-color:rgba(162,202,78, 0.6);"><span>😺</span>Join us!</h1>
    <button class="lead btn text-white w-50 ml-2" style="background-color:rgba(162,202,78, 0.8);"><a class="text-white" href="register.php">SING UP HERE...</a></button>
  
</div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/cat3.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    <h1 class="display-4 p-2" style="background-color:rgba(162,202,78, 0.6);"><span>😺</span>Join us!</h1>
    <button class="lead btn text-white w-50 ml-2" style="background-color:rgba(162,202,78, 0.8);"><a class="text-white" href="register.php">SING UP HERE...</a></button>
  
</div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
         
   </form>
   </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>