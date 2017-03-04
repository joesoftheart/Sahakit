<?php
include '../php/config.php';

?>
<meta charset="utf-8">
<?php
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

?>


<?php

$strSQL = "INSERT INTO post_company (cid,detail_work,web,rank,num_stu,detail,property,map_work,gold,dmt) 
            VALUES ('$cid',
                    '$detail_work',
                    '$web',
                    '$rank',
                    '$num_stu',
                    '$detail',
                    '$property',
                    '$map_work',
                    '$gold',
                    '$dmt')";


$objQuery = mysqli_query($link, $strSQL) or die (mysqli_error($link));

echo "<script>window.location='../pages/profile_company.php';</script>";


$link->close();
?>


