<?php include 'config.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <title>อัพโหลด</title>
</head>
<body>
<?php
if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"../myfile/student/".$_FILES["filUpload"]["name"]))
{
    echo "<script>window.location='../pages/dowload.php'</script>";

    $strSQL = "INSERT INTO files_student ";
    $strSQL .="(filestudent) VALUES ('".$_FILES["filUpload"]["name"]."')";
    $objQuery = mysqli_query($link,$strSQL);
}
?>

</body>
</html>