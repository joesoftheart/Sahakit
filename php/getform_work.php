<?php include 'config.php';
?>
<meta charset="utf-8">
<?php
$cid = $_REQUEST['cid'];
$sid = $_REQUEST['sid'];
$rank = $_REQUEST['rank'];
$map_work = $_POST['map_work'];
$dmt = $_REQUEST['dmt'];

?>

<?php
$strSQL = "UPDATE register_work SET cid ='$cid',rank='$rank',map_work='$map_work',dmt='$dmt' WHERE sid =$sid ";


$objQuery = mysqli_query($link,$strSQL) or die(mysqli_error($link));


echo  "<script type='text/javascript'>window.location='../pages/timeline.php'</script>";



$link -> close();
?>


