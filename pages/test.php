<?php
include '../php/config.php';


$sql ="SELECT  COUNT(*) ,status_work FROM register_work GROUP BY status_work";
$query = mysqli_query($link,$sql);


echo  print_r($query);