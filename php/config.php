<?php
$link = mysqli_connect('localhost','root','')
or die(mysqli_error($link));
mysqli_select_db($link, 'sahakit');
mysqli_query($link, "SET NAMES UTF8") or die (mysqli_error($link)) ;
?>
