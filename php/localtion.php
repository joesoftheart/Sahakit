<?php
header("content-type: text/html; charset=utf-8");
header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");

include "connect.php";
conndb();

$data = $_GET['data'];
$val = $_GET['val'];


if ($data=='province') {
    echo "<select class='form-control' name='province' required=\"required\" onChange=\"dochange('amphur', this.value)\">";
    echo "<option value=''>- เลือกจังหวัด -</option>\n";
    $result=mysql_query("select * from provinces order by PROVINCE_NAME");
    while($row = mysql_fetch_array($result)){
        echo "<option value='$row[PROVINCE_ID]' >$row[PROVINCE_NAME]</option>" ;
    }
} else if ($data=='amphur') {
    echo "<select class='form-control' name='amphur' required=\"required\" onChange=\"dochange('district', this.value)\">";
    echo "<option value='0'>- เลือกอำเภอ -</option>\n";
    $result=mysql_query("SELECT * FROM amphures WHERE PROVINCE_ID= '$val' ORDER BY AMPHUR_NAME");
    while($row = mysql_fetch_array($result)){
        echo "<option value=\"$row[AMPHUR_ID]\" >$row[AMPHUR_NAME]</option> " ;
    }
} else if ($data=='district') {
    echo "<select class='form-control'  required=\"required\" name='district'>\n";
    echo "<option value='0'>- เลือกตำบล -</option>\n";
    $result=mysql_query("SELECT * FROM districts WHERE AMPHUR_ID= '$val' ORDER BY DISTRICT_NAME");
    while($row = mysql_fetch_array($result)){
        echo "<option value=\"$row[DISTRICT_ID]\" >$row[DISTRICT_NAME]</option> \n" ;
    }
}
echo "</select>\n";

echo mysql_error();
closedb();
?>