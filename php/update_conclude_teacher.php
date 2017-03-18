<?php

include 'config.php';

$id = $_REQUEST['id'];


$sql = "UPDATE conclude SET status_teacher='1' WHERE id='$id'";

mysqli_query($link,$sql);

echo "<script type='text/javascript'>window.location='../pages/conclude_show_teacher.php?id=$id'</script>";




?>