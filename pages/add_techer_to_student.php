<?php
include '../php/config.php';
$id = $_REQUEST['idtecher'];

$value = explode('.',$id);
//value ตำแหน่ง 0 = อาจารย์ 1= นักเรียน
#echo $value[0] .'<br>'.$value[1];

$sql = "UPDATE student SET tid = '$value[0]'  WHERE sid = '$value[1]'";
    mysqli_query($link,$sql) or die(mysqli_error($sql));




$link -> close();
?>
<script>window.location='./data_student.php'</script>



