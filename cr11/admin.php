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
if(isset($_SESSION["superadmin"])){
  header("Location: superadmin.php");
  exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['userEmail' ]; ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body >
  <div class="d-flex justify-content-between align-items-center p-3" style="background-color:rgba(162,202,78, 0.8);">
            <div class="d-flex flex-column">
                    <h1 class="display-4 p-3 m-0"><span>😺</span>Adopt-a-pet</h1>
            </div>
            <div class="d-flex flex-row bd-highlight justify-content-end align-items-end">
                <h5 class="mr-3 mt-3 text-dark">Hi <?php echo $userRow['userName' ]; ?><span>😺</span></h5>
                <a href="logout.php?logout"><button type="button" class="btn bg-success text-white mt-3 mr-3">Sing out</button>
                  </a>
            </div>
  </div>
  <div class="container-fluid" style="background:linear-gradient(rgba(162,202,78, 0.8), white);">
    <div class="d-flex flex-row bd-highlight align-items-center justify-content-end"> 
   
      <div class="text-right bd-highlight">
	      <a href="insert.php"><button type="button" class="btn bg-success text-white mb-3 mt-3 mr-3">Add new pet</button></a>
      </div>
    </div>
		 

           <?php
      $resAnim = "SELECT * FROM animal
	  INNER JOIN pet_location ON pet_location.location_id=animal.fk_location_id";

      $result = mysqli_query($conn, $resAnim);
      // fetch the next row (as long as there are any) into $row
      while ($row = mysqli_fetch_assoc($result)) {

echo '
<table class="table table-striped table-dark">
<thead>
  <tr>
	<th scope="col">#</th>
	<th scope="col">Name</th>
	<th scope="col">Age</th>
	<th scope="col">Description</th>
	<th scope="col">Type</th>
  <th scope="col">Hobby</th>
  <th scope="col">Status</th>
	<th scope="col">City</th>
	<th scope="col">Code</th>
	<th scope="col">Street</th>
  </tr>
</thead>
<tbody>
  <tr>
	<th scope="row"><img class="card-img-top" src="'.$row["img"].'" style="width:15vw; height:10vw;"></th>
	<td>'.$row["name"].'</td>
	<td>'.$row["age"].'</td>
	<td>'.$row["description"].'</td>
	<td>'.$row["type"].'</td>
  <td>'.$row["hobby"].'</td>
  <td>'.$row["status"].'</td>
	<td>'.$row["city"].'</td>
	<td>'.$row["code"].'</td>
	<td>'.$row["street"].'</td>
	
	<td>
		<form action ="actions/delete.php" class="w-50 text-center" method="post">
			<input type="hidden" name= "animal_id" value="' . $row["animal_id"] . '" />
			<button type="submit" class="btn btn-outline-danger text-white">DELETE</button>
		</form>
	</td>
	<td>
        <form action ="update.php" class="w-50 text-center" method="post">
            <input type="hidden" name= "animal_id" value="' . $row["animal_id"] . '" />
            <button type="submit" class="btn btn-outline-success text-white">UPDATE</button>
		</form>	
	</td>		
	
  </tr>
  
</tbody>
</table>
';
      }
      // Free result set
      mysqli_free_result($result);
      // Close connection
      mysqli_close($conn);
      ?>
		
    </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>