
<?php
    include 'connect.php';
        conndb();
    $province_id = $_REQUEST['province'];
    $amphures_id = $_REQUEST['amphur'];
    $district_id = $_REQUEST['district'];

    $sql_1 = "SELECT * FROM provinces WHERE PROVINCE_ID = '$province_id' ";
    $result_1 = mysql_query($sql_1);
    $row_1 = mysql_fetch_array($result_1);
    $province_name = $row_1['PROVINCE_NAME'];

    $sql_2 = "SELECT * FROM amphures WHERE AMPHUR_ID = '$amphures_id' ";
    $result_2 = mysql_query($sql_2);
    $row_2 = mysql_fetch_array($result_2);
    $amphur_name = $row_2['AMPHUR_NAME'];

    $sql_3 = "SELECT * FROM districts WHERE DISTRICT_ID = '$district_id' ";
    $result_3 = mysql_query($sql_3);
    $row_3 = mysql_fetch_array($result_3);
    $district_name = $row_3['DISTRICT_NAME'];

?>
<meta charset="utf-8">
<?php
    $username = $_REQUEST['username'];
    $passwd = $_REQUEST['passwd'];
    $conpasswd = $_REQUEST['conpasswd'];
    $number_id = $_REQUEST['number_id'];
    $frist_name = $_REQUEST['frist_name'];
    $fn_st = $_REQUEST['fn_st'];
    $ln_st = $_REQUEST['ln_st'];
    $house_no = $_REQUEST['house_no'];
    $village_no = $_REQUEST['village_no'];
    $province = $_REQUEST['province'];
    $amphur = $_REQUEST['amphur'];
    $district = $_REQUEST['district'];
    $postal_code = $_REQUEST['postal_code'];
    $age = $_REQUEST['age'];
    $status = $_REQUEST['status'];
    $email = $_REQUEST['email'];
    $telaphone = $_REQUEST['telaphone'];
    $filetoload =  $_FILES["filetoload"]["name"];
    $resume_upload = $_FILES['resume_upload']['name'];
    $tid = $_REQUEST['tid'];

    $imageFileType = pathinfo($filetoload ,PATHINFO_EXTENSION);
    $imageName = pathinfo($filetoload ,PATHINFO_FILENAME);
    $img = $username.".".$imageFileType;
?>


<?php
session_start();
include 'config.php';


$strSQL = "SELECT * FROM student
              WHERE username = '".trim($_POST['username'])."' ";
$objQuery = mysqli_query($link,$strSQL) or die(mysqli_error($strSQL));
$objResult = mysqli_fetch_array($objQuery);
if($objResult)
{

    echo'<script>window.location="../pages/register.php";</script>';

}
else
{

    $strSQL = "INSERT INTO student (username,passwd,frist_name,fn_st,ln_st,number_id,house_no,village_no,province,amphur,district,postal_code,age,status,telaphone,email,filetoload,resume_upload,tid) 
            VALUES ('$username',
                    '$passwd',
                    '$frist_name',
                    '$fn_st',
                    '$ln_st',
                    '$number_id',
                    '$house_no',
                    '$village_no',
                    '$province',
                    '$amphur',
                    '$district',
                    '$postal_code',
                    '$age',
                    '$status',
                    '$telaphone',
                    '$email',
                    '$img',
                    '$resume_upload',
                    '$tid')";



    $objQuery = mysqli_query($link,$strSQL) or die(mysqli_error($strSQL));

    move_uploaded_file($_FILES["resume_upload"]["tmp_name"],"../myfile/resume/student/".$_FILES["resume_upload"]["name"]);

$target_dir = "../uploads/student/";
    $target_file = $target_dir . basename($img);

    $uploadOk = 1;
    $imageFileType1 = pathinfo($target_file,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
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
?>



