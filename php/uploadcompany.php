<?php
include 'config.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <title>อัพโหลด</title>
</head>
<body>
<?php
if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../myfile/company/".$_FILES["filUpload"]["name"]))
{


    $strSQL = "INSERT INTO files_company ";
    $strSQL .="(filescompany) VALUES ('".$_FILES["filUpload"]["name"]."')";
    $objQuery = mysqli_query($link,$strSQL) or die(mysqli_error($link,$strSQL));


    echo "<script>window.location='../pages/admin_upload.php'</script>";
}
?>

</body>
</html>