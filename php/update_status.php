<?php
include 'config.php';

$cid = $_REQUEST['id'];




$sql = "UPDATE company SET c_status_join = '1' WHERE cid = '$cid'";


$query = mysqli_query($link,$sql);


  echo "<script type='text/javascript'>window.location='../pages/profile_admin.php'</script>";

?>