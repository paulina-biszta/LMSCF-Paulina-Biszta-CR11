<?php 
// You can access the values posted by jQuery.ajax
// through the global variable $_POST, like this:
$bar = isset($_POST['bar']) ? $_POST['bar'] : null;

$host= "localhost";
$username="root";
$password="";
$dbname="cr11_paulina_petadoption";

$conn = mysqli_connect($host,$username,$password,$dbname);

if($conn){
        echo "success";
}

$query= "SELECT * FROM animal INNER JOIN pet_location ON pet_location.location_id=animal.fk_location_id";
if(mysqli_query($conn,$query)){
        echo " result";
}
?>


