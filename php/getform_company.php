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
$filetoload =  $_FILES["filetoload"]["name"];
$status = $_REQUEST['status'];
$c_status_join =$_REQUEST['c_status_join'];
$imageFileType = pathinfo($filetoload ,PATHINFO_EXTENSION); //เก็บนามสกุล
$imageName = pathinfo($filetoload ,PATHINFO_FILENAME);  //เก็บชื่อ
$img = $username.".".$imageFileType;  //ตั้งชื่อ ไฟลภาพใหม่โดยเอาไอดีกับนามสกุลไฟลมาต่อกัน

?>




<?php
//คำสั่งไปเลือกไอดี จากตารางคอมปานีที่ตรงกับ ไอดี $_POST['username'] ที่ส่งมา
$strSQL = "SELECT * FROM company
              WHERE username = '".trim($_POST['username'])."' ";
$objQuery = mysqli_query($link,$strSQL);
$objResult = mysqli_fetch_array($objQuery);

//ถ้ามีชื่อผู้ใช้นี้อยู่จะเข้าทำ if
if($objResult)
{

        echo'<script>window.location="../pages/register_company.php";</script>';

}
else
{
//ใช้คำสั่ง insert เพิ่มข้อมูลลงไปในตาราง company
    $strSQL = "INSERT INTO company (username,passwd,c_name,c_tela,c_address,c_email,filetoload,status,c_status_join) 
            VALUES ('$username',
                    '$passwd',
                    '$c_name',
                    '$c_tela',
                    '$c_address',
                    '$c_email',
                    '$img',
                    '$status',
                    '$c_status_join')";


   mysqli_query($link,$strSQL);



    $target_dir = "../uploads/company/";
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
// Check if file already exists  เช็คชื่อ นามสกุล ว่าเคยมีอยู่หรือป่าว
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

    /*คิวรี่สร้าง session*/

    $sql1 ="SELECT * FROM company ";
    $query = mysqli_query($link,$sql1);
    for($i=0; $result = mysqli_fetch_array($query);$i++) {

        $_SESSION['username'] = $result['username'];
        $_SESSION['filetoload'] = $result['filetoload'];




    }
    /*คิวรี่สร้าง session*/
}

$link -> close();
?>



