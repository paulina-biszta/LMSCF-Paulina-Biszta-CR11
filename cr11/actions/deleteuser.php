<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    


<?php
include '../dbconnect.php';


  $id = $_POST['id'];
  $sql = "DELETE FROM users WHERE userId = {$id}";


if (mysqli_query($conn, $sql)) {



  echo '<div class="container-fluid text-center p-5">
  <h1 class="text-dark p-5 m-5">Successfully deleted!!</h1>
  <a href="../admin.php"><button class="btn bg-success text-white m-5 p-2 w-25" type="button">Back</button></a>
  </div>
  
  ';
  header( "refresh:2; url=../superadmin.php" ); 
  
} else {
  echo "<h1>error for: </h1>" .
    "<p>"  . $sql . "</p>" .
    mysqli_error($conn);
}
mysqli_close($conn);

?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>