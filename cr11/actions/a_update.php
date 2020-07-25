<?php 

require_once '../dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body class="bg-dark">

<?php 

if ($_POST) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $description = $_POST['description'];
    $hobby = $_POST['hobby'];
    $type = $_POST['type'];
    $img = $_POST['img'];
    $status = $_POST['status'];
   $code = $_POST['code'];
   $city = $_POST['city'];
   $street = $_POST['street'];
    
   $animal_id = $_POST['animal_id'];

 

$sql = "UPDATE animal
INNER JOIN pet_location ON pet_location.location_id=animal.fk_location_id
SET `name`='$name', age='$age', `description`='$description', hobby='$hobby', `type`='$type', img='$img', `status`='$status', code='$code', city='$city', street='$street' WHERE animal_id={$animal_id}";


   if($conn->query($sql) === TRUE) {
       echo '
       <div class="container-fluid text-center p-5">
       <h1 class="text-white p-5 m-5">Successfully updated!!</h1>
       <a href="../admin.php"><button class="btn bg-success text-white m-5 p-2 w-25" type="button">Back</button></a>
       </div>
       ' ;
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>