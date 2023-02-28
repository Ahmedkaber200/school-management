<?php
    $conn = mysqli_connect('localhost', 'root', '', 'management');
    {	
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact =$_POST['contact'];
    $password =$_POST['password'];
    $address =$_POST['address'];
    $city =$_POST['city'];
    $country =$_POST['country'];
    $result = '';

    // if($role != 'admin')
    // {
    //     header("Location: auth/login.php");
    // }

    $result = mysqli_query($conn, "INSERT INTO users(name,email,contact,password,address,city,country) VALUE
    ('$name','$email','$contact','$password','$address','$city','$country')");
    }
    ?>