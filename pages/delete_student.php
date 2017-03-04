<?php
session_start();
include '../php/config.php';
$sid = $_REQUEST['id'];


$sql = "UPDATE student SET tid = '0' WHERE sid = $sid";
$query = mysqli_query($link,$sql) or die(mysqli_error($sql));





$link ->close();
?>

<script>window.location='../pages/data_student.php'</script>
