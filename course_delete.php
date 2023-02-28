<?php
include 'session.php';
include("conn.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM courses WHERE id=$id");
header("Location:course_view.php");
?>