<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['superadmin']) && !isset($_SESSION['user'])) {
// echo $_SESSION['admin'] ;
 header("Location: index.php");
 exit;
}
if(isset($_SESSION["user"])){
    header("Location: home.php");
    exit;
}
if(isset($_SESSION["admin"])){
    header("Location: admin.php");
    exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['superadmin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="d-flex justify-content-between align-items-center p-3" style="background-color:rgba(162,202,78, 0.8);">
            <div class="d-flex flex-column">
                    <h1 class="display-4 p-3 m-0"><span>😺</span>SUPER ADMIN DASHBOARD</h1>
            </div>
            <div class="d-flex flex-row bd-highlight justify-content-end align-items-end">
                <h5 class="mr-3 mt-3 text-dark">Hi <?php echo $userRow['userName' ]; ?><span>😺</span></h5>
                <a href="logout.php?logout"><button type="button" class="btn bg-success text-white mt-3 mr-3">Sing out</button>
                  </a>
            </div>
  </div>

<br>
<div class="container">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">USER ID</th>
      <th scope="col">NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">STATUS</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>  

  <tbody>


  <?php 
  

  $sql = "SELECT * FROM users WHERE status='admin' OR status='user' ";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
  
    echo '
    
    <tr>
      <th scope="row">'.$row["userId"].'</th>
      <th scope="row">'.$row["userName"].'</th>
      <th scope="row">'.$row["userEmail"].'</th>
      <th scope="row">'.$row["status"].'</th>
      
            
      </th>
      <th scope="row"> <form action ="actions/deleteuser.php" method="post">
      <input type="hidden" name="id" value="' . $row["userId"] . '" />
      <button type="submit"  class="btn btn-outline-danger text-dark">Delete</button>
      </form>
      
      </th>
     
     
    </tr>
    ';
  }


  ?>
  </tbody>
</table>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>