<?php
include '../php/config.php';

$sid = $_POST['sid'];
$tid = $_POST['tid'];
$status_work = $_POST['status_work'];


//value ตำแหน่ง 0 = อาจารย์ 1= นักเรียน
#echo $value[0] .'<br>'.$value[1];

$sql = "UPDATE student SET tid = '$tid'  WHERE sid = '$sid'";
    mysqli_query($link,$sql) or die(mysqli_error($sql));

$sql_register = "INSERT INTO register_work (sid,status_work) 
                      VALUE ('$sid]',
                              '$status_work')";
  mysqli_query($link,$sql_register);



echo "<script>window.location='./data_student.php'</script>";

$link -> close();
?>




