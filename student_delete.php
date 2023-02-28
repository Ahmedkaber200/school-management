<?php
include 'session.php';
include("conn.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM teacher WHERE id=$id");
header("Location:teacher_view.php");
?>