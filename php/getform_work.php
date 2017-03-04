<?php include 'config.php';
?>
<meta charset="utf-8">
<?php
$cid = $_REQUEST['cid'];
$sid = $_REQUEST['sid'];
$rank = $_REQUEST['rank'];
$status_work = $_REQUEST['status_work'];
$dmt = $_REQUEST['dmt'];

?>

<?php
$strSQL = "INSERT INTO register_work (sid,cid,rank,status_work,dmt) 
            VALUES ('$sid',
                    '$cid',
                    '$rank',
                    '$status_work',
                    '$dmt')";


$objQuery = mysqli_query($link,$strSQL) or die(mysqli_error($link));


echo  "<script type='text/javascript'>window.location='../pages/timeline.php'</script>";



$link -> close();
?>


