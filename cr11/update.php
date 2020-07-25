<?php 

require_once 'dbconnect.php';

if ($_POST['animal_id']) {
   $animal_id = $_POST['animal_id'];

   $sql = "SELECT * FROM animal INNER JOIN pet_location ON pet_location.location_id=animal.fk_location_id  
   WHERE animal_id={$animal_id}";

   $result = $conn->query($sql);

   $data = $result->fetch_assoc();

   $conn->close();

?>

<!DOCTYPE html>
<html>
<head>
   <title >Update</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
   <div class="container-fluid bg-success text-white p-4">
        <div class="row justify-content-center">
            <div class="col-6 justify-content-center mt-3 bg-dark p-4 rounded">
                <h1 class="mb-4 text-center">UPDATE!</h1>
                <form action="actions/a_update.php" method="POST">
                    <div class="row">
                        <div class="form-group col">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name'] ?>">
                          
                        </div>
                        <div class="form-group col">    
                            <label for="age">Age</label>
                            <input type="text" class="form-control" id="age" name="age" value="<?php echo $data['age'] ?>">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="<?php echo $data['description'] ?>">
                           
                        </div>
                        <div class="form-group col">
                            <label for="hobby">Hobby</label>
                            <input type="hobby" class="form-control" id="hobby" name="hobby" value="<?php echo $data['hobby'] ?>">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="img">Image</label>
                            <input type="text" class="form-control" id="img" name="img" value="<?php echo $data['img'] ?>">
                        </div>
                        <div class="form-group col">
                            <label for="code">Zip Code</label>
                            <input type="text" class="form-control" id="code" name="code" value="<?php echo $data['code'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $data['city'] ?>">
                        </div>
                        <div class="form-group col">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" id="street" name="street" value="<?php echo $data['street'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="type">Type</label><br>
                            <input type="radio" id="kitten" name="type" value="kitten">
                            <label for="kitten">Kitten</label><br>
                            <input type="radio" id="adult" name="type" value="adult">
                            <label for="adult">Adult</label><br>
                            
                        </div>
                        <div class="form-group col">
                            <label for="status">Status</label><br>
                            <input type="radio" name="status" value="waiting for a new home">
                            <label for="waiting for a new home">Waiting for a new home</label><br>
                            <input type="radio" name="status" value="has just found a new home">
                            <label for="has just found a new home">Has just found a new home</label><br>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <input type= "hidden" name= "animal_id" value= "<?php echo $data['animal_id']?>" />
                        <button class="btn bg-success text-white text-center"  type= "submit">Save Changes</button >
                        <a href= "index.php"><button class="btn bg-success text-white w-100 mt-3 text-center" type="button" >Back</button ></a>
                    </div>
                    </div>
                   
                    
                </form >
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body >
</html >

<?php
}
?>