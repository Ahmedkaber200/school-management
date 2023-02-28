<?php
    $email = $_SESSION['email'];
    $result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE email = '$email'");
    if($res = mysqli_fetch_array($result)){
        $role = $res['role'];
    }
    if($role != 'admin')
    {
        header("Location: auth/login.php");
    }
    ?>