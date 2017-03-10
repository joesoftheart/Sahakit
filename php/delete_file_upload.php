<?php
include 'config.php';

$id = $_REQUEST['id'];


 $sql = "DELETE FROM files_student WHERE id = $id";

echo "<script type='test/javascript>window.location='../pages/admin_upload.php'</script>";

?>