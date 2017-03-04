<meta charset="UTF-8">

<?php
include 'config.php';

$idpost = $_REQUEST['idpost'];
$cid = $_REQUEST['cid'];
$detail_work = $_REQUEST['detail_work'];
$web = $_REQUEST['web'];
$rank = $_REQUEST['rank'];
$num_stu = $_REQUEST['num_stu'];
$detail = $_REQUEST['detail'];
$property = $_REQUEST['property'];
$map_work = $_REQUEST['map_work'];
$gold = $_REQUEST['gold'];
$dmt = $_REQUEST['dmt'];

$sql_edit = "UPDATE post_company SET  detail_work = '$detail_work' , web = '$web' , rank = '$rank' , num_stu = '$num_stu' , detail = '$detail' , property = '$property' , map_work = '$map_work',gold = '$gold' , dmt = '$dmt' WHERE idpost = '$idpost' ";
mysqli_query($link,$sql_edit) or die($sql_edit);

echo  "<script type='text/javascript'>window.location='../pages/work_post_edit.php'</script>";
?>