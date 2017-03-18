<?php
include 'config.php';
$id = $_GET['id'];


$sql = "UPDATE execute SET status='1' WHERE id = '$id'";
 mysqli_query($link,$sql);

echo "<script type='text/javascript'>window.location='../pages/note_show_company.php?id=$id'</script>";


?>