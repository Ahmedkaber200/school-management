<?php
include 'session.php';
include("conn.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM classes WHERE id=$id");
header("Location:class_view.php");
?>