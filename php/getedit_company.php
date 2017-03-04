<meta charset="UTF-8">

<?php
include 'config.php';

$username = $_POST['username'];
$oldpasswd 	= trim($_POST["oldpasswd"]);
$newpasswd 	= trim($_POST["passwd"]);
$repasswd 	= trim($_POST["repasswd"]);


$sql = "SELECT * FROM company WHERE username='$username' AND passwd ='$oldpasswd'";
$result = mysqli_query($link,$sql);
$num = mysqli_num_rows($result);

if ($num==0)
    die("<script>alert('พาสเวิร์ดเก่าไม่ตรงกัน');history.back();</script>");

    if ($newpasswd != $repasswd) die("<script>alert('รหัสผ่านไม่เหมือนกัน');history.back();</script>");

        $passwd = ($newpasswd);

        $sql = "UPDATE company SET
                    passwd='$passwd'
                    WHERE username='$username'
                    ";
        $result = mysqli_query($link,$sql) or die("Err : $sql");

        echo "<script>alert('เปลี่ยนรหัสผ่านเรียบร้อย');</script>";
            echo "<script>window.location='profile_company.php';</script>";
?>
