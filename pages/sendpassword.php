
<html>
<head>
    <title>sahakit System</title>
    <meta charset="utf-8">
</head>
<body>
<?php
mysqli_connect("localhost","root","");
mysqli_select_db("sahakit");
$strSQL = "SELECT * FROM student WHERE username = '".trim($_POST['username'])."' 
	OR email = '".trim($_POST['email'])."' ";
$objQuery = mysqli_query($link,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if(!$objResult)
{
    echo "ไม่มีข้อมูลของผู้ใช้ หรือ อีเมล์ของผู้ใช้";
}
else
{
    echo "ทำการส่งรหัสผ่านเรียบร้อย.<br>อีเมลผู้ใช้ : ".$objResult["email"];


    $strTo = $objResult["email"];
    $strSubject = "ชื่อผู้ใช้ ข้อมูลบัญชี และรหัสผ่าน ของคุณ.";
    $strHeader = "Content-type: text/html; charset=UTF-8\n"; // or UTF-8 //
    $strHeader .= "From: pond_pond15@hotmail.com\nReply-To: pond_pond15@hotmail.com";
    $strMessage = "";
    $strMessage .= "สวัสดี : ".$objResult["fname"]."<br>";
    $strMessage .= "ชื่อผู้ใช้ : ".$objResult["username"]."<br>";
    $strMessage .= "รหัสผ่าน : ".$objResult["passwd"]."<br>";
    $strMessage .= "=================================<br>";
    $strMessage .= "ปังปอนด์<br>";
    $flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);

}
mysqli->close();
?>
</body>
</html>
