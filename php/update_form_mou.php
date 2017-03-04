<?php
session_start();
include 'config.php';

?>
<meta charset="utf-8">
<?php
$cid        = $_REQUEST['cid'];
$leader     = $_REQUEST['leader'];
$rank_leader = $_REQUEST['rank_leader'];
$date_mou = $_REQUEST['date_mou'];
$time_mou = $_REQUEST['time_mou'];



$sql = "UPDATE company SET leader='$leader',rank_leader='$rank_leader',date_mou='$date_mou',time_mou='$time_mou' WHERE cid = $cid";
 mysqli_query($link,$sql) or die(mysqli_error($sql));





$link -> close();
?>

<script>window.location='../pages/index.php'</script>

