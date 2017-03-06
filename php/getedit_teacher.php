<meta charset="UTF-8">

<?php
include 'config.php';

$passwd = $_REQUEST['passwd'];
$frist_name = $_REQUEST['frist_name'];
$fn_te = $_REQUEST['fn_te'];
$ln_te = $_REQUEST['ln_te'];
$email = $_REQUEST['email'];
$telaphone = $_REQUEST['telaphone'];
$address = $_REQUEST['address'];
$tid = $_REQUEST['tid'];




$sql_edit = "UPDATE teacher SET  passwd = '$passwd' , frist_name = '$frist_name' , fn_te = '$fn_te' , ln_te = '$ln_te' , email = '$email' , telaphone = '$telaphone' , address = '$address' WHERE tid = '$tid'";
mysqli_query($link,$sql_edit);


echo  "<script type='text/javascript'>window.location='../pages/edit_profile_teacher_sucess.php'</script>";
?>
