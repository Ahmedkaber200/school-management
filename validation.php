<?php
function name()
{
    //checking name
    include("conn1.php");
    if(isset($_POST['Submit'])) {
    if(empty($_POST['addclass'])){
    $msg_name = "Name is required";
    echo $msg_name;
    }
    else{
    $name_subject = $_POST['addclass'];
    $name_pattern = '/^[a-zA-Z]*$/';
    if(!preg_match($name_pattern, $name_subject)){
        $msg2_name = "Only alphabets";
        echo $msg2_name;
    }
    else{
    $result = mysqli_query($mysqli, "INSERT INTO classes(name) VALUE
    ('$name_subject')");
    }
    }
}
}
?>