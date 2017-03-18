<?php include '../php/config.php';
require_once '../class.upload.php-master/src/class.upload.php';
$news_story = $_POST['news_story'];
$fntroductory_message = $_POST['fntroductory_message'];
$featuring_news = $_POST['featuring_news'];
$dmt = $_POST['dmt'];


$strSQL = sprintf ("INSERT INTO news (news_story,fntroductory_message,featuring_news,dmt) 
            VALUES ('$news_story',
                    '$fntroductory_message',
                    '$featuring_news',
                    '$dmt')");

$objQuery = mysqli_query($link,$strSQL);




echo  "<script type='text/javascript'>window.location='../pages/newsupdate.php'</script>";



$link -> close();


?>