<?php
include 'config.php';

$sid = $_POST['sid'];
$tid = $_POST['tid'];
$cid = $_POST['cid'];
$no1 = $_POST['no1'];
$no2 = $_POST['no2'];
$no3 = $_POST['no3'];
$no4 = $_POST['no4'];
$no5 = $_POST['no5'];
$evaluator = $_POST['evaluator'];
$d = $_REQUEST['d'];
$m = $_REQUEST['m'];
$y = $_REQUEST['y'];


$sql_evaluator = "INSERT INTO evaluator_teacher (sid,cid,tid,no1,no2,no3,no4,no5,evaluator,d,m,y)
                      VALUE ('$sid','$cid','$tid','$no1','$no2','$no3','$no4','$no5','$evaluator','$d','$m','$y')";
$query = mysqli_query($link,$sql_evaluator);




        $sum = $no1+$no2+$no3+$no4+$no5;
echo $sum;
$sql_sum = "UPDATE grade SET point_teacher ='$sum' WHERE sid = '$sid'";
$query_sum = mysqli_query($link,$sql_sum);






$sql_grade = "SELECT * FROM grade WHERE sid = '$sid'";
$query_grade = mysqli_query($link,$sql_grade);
$row = mysqli_fetch_array($query_grade);

$point_company = $row['point_company'];
$point_teacher = $row['point_teacher'];

        $grade = $point_company+$point_teacher;
        $total = $grade/2;

$total_grade ="";
if ($total >= 80){ $total_grade ="A"; }
else if (($total>=70)&&($total<=79)) { $total_grade= "B" ; }

else if (($total>=60)&&($total<=69)) { $total_grade= "C" ; }

else if (($total>=50)&&($total<=59)) { $total_grade= "D" ; }

else  { $total_grade= "F" ; }



$sql_total = "UPDATE grade SET grade ='$total_grade' WHERE sid = '$sid'";
$query_total= mysqli_query($link,$sql_total);


echo "<script type='text/javascript'>window.location='../pages/data_student.php'</script>";



?>





