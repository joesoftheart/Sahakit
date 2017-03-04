<meta charset="utf-8">
<?php
$username = $_REQUEST['username'];
$passwd = $_REQUEST['passwd'];
$admin_name = $_REQUEST['admin_name'];
$status = $_REQUEST['status']
?>


<?php
session_start(); ?>

<?php

$strSQL = "SELECT * FROM admin
              WHERE username = '".trim($_POST['username'])."' ";
$objQuery = mysqli_query($strSQL);
$objResult = mysqli_fetch_array($objQuery);
if($objResult) {
    echo "<script type='text/javascript'>alert('มีผู้ใช้นี้แล้ว');</script>";
    echo'<script>window.location="register.php";</script>';

}
else {

    $strSQL = "INSERT INTO student (username,passwd,admin_name,status) 
            VALUES ('$username',
                    '$passwd',
                    '$admin_name'
                    '$status'";



    $objQuery = mysqli_query($strSQL);



echo "<script type='text/javascript'>alert('สมัครสมาชิกเสร็จสิ้น');</script>";



}

mysqli_close();
?>