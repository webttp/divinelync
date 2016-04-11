<?php
require "config.php";
if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query = $conn->query("SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
        echo '<option value="">Select city</option >';
        while($row = mysqli_fetch_object($query)){ 
            echo '<option value="'.$row->city_id.'">'.$row->city_name.'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>