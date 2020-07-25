<?php
include "dbconnect.php";

	$search = $_POST["search"];

	$sql = "SELECT * FROM animal INNER JOIN pet_location ON pet_location.location_id=animal.fk_location_id
        WHERE `name` LIKE '%$search%' 
        OR age LIKE '%$search%' 
        OR `description` LIKE '%$search%' 
        OR `type` LIKE '%$search%' 
        OR `hobby` LIKE '%$search%' 
        OR `city` LIKE '%$search%' 
        OR `code` LIKE '%$search%' 
        OR `street` LIKE '%$search%' 
        ";

	$result = mysqli_query($conn, $sql);

	if($result->num_rows == 0){
		echo "No result";
	}elseif($result->num_rows == 1){
		$row = $result->fetch_assoc();
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
	}else {
		$rows = $result->fetch_all(MYSQLI_ASSOC);
		foreach ($rows as $row) {
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
	}

?>