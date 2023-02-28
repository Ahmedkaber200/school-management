<?php
include_once("conn.php");
if (!empty($_POST["id"])) {
    $id = $_POST['id'];
    
    $query = "SELECT DISTINCT ccp.cours_id, ccp.class_id, c.name, cr.name, cr.id FROM class_courses_pivot ccp INNER JOIN
    classes c ON ccp.class_id = c.id INNER JOIN courses cr ON cr.id = ccp.cours_id WHERE c.id = $id";
    
    $result = mysqli_query($mysqli, $query);
    if ($result->num_rows > 0) {  
        echo '<option value="">Select Courses</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value=' . $row['id'] . '>' . $row['name'] . '</option>';
        } 
    }      
}
?>