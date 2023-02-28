<?php
include_once("conn.php");
if (!empty($_POST["id"])) {
    $id = $_POST['id'];
    // print_r($id);
    
    $query = "SELECT DISTINCT cs.c_id, cs.s_id, c.name, cr.name,cr.id FROM class_students cs
                INNER JOIN classes c ON cs.c_id = c.id INNER JOIN users cr ON cr.id = cs.s_id WHERE c.id = $id";

    $result = mysqli_query($mysqli, $query);
    if ($result->num_rows > 0) {  
        // print_r($result);
        echo '<option value="">Select Courses</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value=' . $row['id'] . '>' . $row['name'] . '</option>';
        } 
    }      
}
?>