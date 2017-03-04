<?php
session_start();
include '../php/config.php';

?>
<meta charset="utf-8">
<?php
$id = $_REQUEST['id'];
$detail_work = $_REQUEST['detail_work'];
$web = $_REQUEST['web'];
$rank = $_REQUEST['rank'];
$num_stu = $_REQUEST['num_stu'];
$detail = $_REQUEST['detail'];
$property = $_REQUEST['property'];
$map_work =  $_REQUEST['map_work'];
$gold = $_REQUEST['gold'];
$dmt = $_REQUEST['dmt'];


$sql = "UPDATE post_company SET detail_work='$detail_work',web='$web',rank='$rank',num_stu='$num_stu',detail='$detail',property='$property',map_work='$map_work',gold='$gold',dmt='$dmt' WHERE idpost = '014'";
$query = mysqli_query($link,$sql);




echo "<script>window.location='../pages/profile_company.php';</script>";


$link->close();
?>


