<?php
include_once ('../php/config.php');
$rwid = $_REQUEST['id'];
$sql = "UPDATE register_work SET status_work ='2' WHERE rwid = $rwid";
$query = mysqli_query($link,$sql);

$status['id'] = "{$_POST['id']}";
$status['status'] = $query;
$status['data'] = "ยืนยันเรียบร้อย";

echo json_encode($status);
