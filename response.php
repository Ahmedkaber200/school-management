<?php
include_once("conn.php");
if (!empty($_POST["id"])) {
    $id = $_POST['id'];
    $query = "select * from city where country_id=$id";
    $result = mysqli_query($mysqli, $query);
    if ($result->num_rows > 0) {  
        echo '<option value="">Select City</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value=' . $row['id'] . '>' . $row['city'] . '</option>';
        } 
    }   

    
} elseif (!empty($_POST['sid'])) {

    $id = $_POST['sid'];
    $query1 = "select * from town where city_id=$id";
    $result1 = mysqli_query($mysqli, $query1);
    if ($result1->num_rows > 0) {
        echo '<option value="">Select Town</option>';
        while ($row = mysqli_fetch_assoc($result1)) {
            echo '<option value="' . $row['id'] . '">' . $row['town'] . '</option>';
        }
    }
}