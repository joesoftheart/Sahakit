<?php
include 'config.php';

$id = $_REQUEST['id'];


 $sql = "DELETE FROM files_student WHERE id = $id";
$query = mysqli_query($link,$sql);
echo "ลบเรียบร้อย";

echo "<script type='text/javascript'>window.location='../pages/admin_upload.php'</script>";

?>