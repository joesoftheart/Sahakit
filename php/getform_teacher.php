<?php
include 'config.php';
session_start();
?>
<meta charset="utf-8">
<?php
$username = $_REQUEST['username'];
$passwd = $_REQUEST['passwd'];
$frist_name = $_REQUEST['frist_name'];
$fn_te = $_REQUEST['fn_te'];
$ln_te = $_REQUEST['ln_te'];
$address = $_REQUEST['address'];
$email = $_REQUEST['email'];
$telaphone = $_REQUEST['telaphone'];
$filetoload =  $_FILES["filetoload"]["name"];
$status = $_REQUEST['status'];

$imageFileType = pathinfo($filetoload ,PATHINFO_EXTENSION);
$imageName = pathinfo($filetoload ,PATHINFO_FILENAME);
$img = $username.".".$imageFileType;


$strSQL = "SELECT * FROM teacher
              WHERE username = '".trim($_REQUEST['username'])."' ";
$objQuery = mysqli_query($link,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if($objResult)
{

    echo'<script>window.location="register.php";</script>';

}
else
{

    $strSQL = "INSERT INTO teacher (username,passwd,frist_name,fn_te,ln_te,address,telaphone,email,filetoload,status) 
            VALUES ('$username',
                    '$passwd',
                    '$frist_name',
                    '$fn_te',
                    '$ln_te',
                    '$address',
                    '$telaphone',
                    '$email',
                    '$img',
                    '$status')";
                        


    $objQuery = mysqli_query($link,$strSQL);



    $target_dir = "../uploads/teacher/";
    $target_file = $target_dir . basename($img);

    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["filetoload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "ขออภัย, ไฟล์รูปนี้มีอยู่แล้ว";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["filetoload"]["size"] >= 1000000) {
        echo "ขออภัย, ไฟลรูปที่อัพมาใหญ่เกินไป.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "PNG" ) {
        echo "ขออภัย, กรุณาใช้ไฟล์นามสกุล JPG, JPEG, PNG เท่านั้น";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "ขออภัย, ไฟล์รูปไม่สามารถอัพโหลดได้.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["filetoload"]["tmp_name"], $target_file)) {
            echo "ไฟล์รูป ". basename( $_FILES["filetoload"]["name"]). " ได้ทำการอัพโหลดแล้ว.";
        } else {
            echo "ขออภัย, มีข้อผิดพลาด ในการอัปโหลด ไฟล์ของคุณ.";
        }
    }



    echo'<script>window.location="../pages/index.php";</script>';


}

$link -> close();
?>


