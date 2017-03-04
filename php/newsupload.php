<?php include '../php/config.php';

$headnews = $_POST['headnews'];
$substance = $_POST['substance'];
$dmt = $_POST['dmt'];


$strSQL = "INSERT INTO news (headnews,substance,dmt) 
            VALUES ('$headnews',
                    '$substance',
                    '$dmt')";


$objQuery = mysqli_query($link,$strSQL) or die(mysqli_error($link));


echo  "<script type='text/javascript'>window.location='../pages/profile_admin.php'</script>";



$link -> close();


?>