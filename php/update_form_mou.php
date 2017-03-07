<?php
session_start();
include 'config.php';

?>
<meta charset="utf-8">
<?php
$username = $_REQUEST['username'];
$passwd = $_REQUEST['passwd'];
$c_name = $_REQUEST['c_name'];
$c_address = $_REQUEST['c_address'];
$c_email = $_REQUEST['c_email'];
$c_tela = $_REQUEST['c_tela'];
$status = $_REQUEST['status'];
$c_status_join = $_REQUEST['c_status_join'];
$leader = $_REQUEST['leader'];
$rank_leader = $_REQUEST['rank_leader'];
$d_mou = $_REQUEST['d_mou'];
$m_mou = $_REQUEST['m_mou'];
$y_mou = $_REQUEST['y_mou'];
$time_mou = $_REQUEST['time_mou'];



$sql = "INSERT INTO company (username,passwd,c_name,c_tela,c_address,c_email,status,c_status_join,leader,rank_leader,d_mou,m_mou,y_mou,time_mou) 
            VALUES ('$username',
                    '$passwd',
                    '$c_name',
                    '$c_tela',
                    '$c_address',
                    '$c_email',
                    '$status',
                    '$c_status_join',
                    '$leader',
                    '$rank_leader',
                    '$d_mou',
                    '$m_mou',
                    '$y_mou',
                    '$time_mou')";


 mysqli_query($link,$sql) or die(mysqli_error($sql));





$link -> close();
?>



