<meta charset="UTF-8">

<?php
include 'config.php';

$sid = $_REQUEST['sid'];
$cid = $_REQUEST['cid'];
$fn_st = $_REQUEST['fn_st'];
$ln_st = $_REQUEST['ln_st'];
$number_id = $_REQUEST['number_id'];
$c_name = $_REQUEST['c_name'];
$name_leader = $_REQUEST['name_leader'];
$rank_leader= $_REQUEST['rank_leader'];
$no1 = $_REQUEST['no1'];
$no2 = $_REQUEST['no2'];
$no3 = $_REQUEST['no3'];
$no4 = $_REQUEST['no4'];
$no5 = $_REQUEST['no5'];
$no6 = $_REQUEST['no6'];
$no7 = $_REQUEST['no7'];
$no8 = $_REQUEST['no8'];
$no9 = $_REQUEST['no9'];
$no10 = $_REQUEST['no10'];
$no11 = $_REQUEST['no11'];
$no12 = $_REQUEST['no12'];
$no13 = $_REQUEST['no13'];
$no14 = $_REQUEST['no14'];
$no15 = $_REQUEST['no15'];
$no16 = $_REQUEST['no16'];
$no17 = $_REQUEST['no17'];
$no18 = $_REQUEST['no18'];
$no19 = $_REQUEST['no19'];
$no20 = $_REQUEST['no20'];
$no21_1 = $_REQUEST['no21_1'];
$no21_2 = $_REQUEST['no21_2'];
$get_work = $_REQUEST['get_work'];
$comment = $_REQUEST['comment'];
$evaluator = $_REQUEST['evaluator'];
$d = $_REQUEST['d'];
$m = $_REQUEST['m'];
$y = $_REQUEST['y'];




$sql = "INSERT INTO evaluator_company (sid ,cid,fn_st,ln_st,number_id,c_name,name_leader,rank_leader,no1,no2,no3,no4,no5,no6,no7,no8,no9,no10,no11,no12,no13,no14,no15,no16,no17,no18,no19,no20,no21_1,no21_2,get_work,comment,evaluator,d,m,y) 
              VALUE ('$sid','$cid','$fn_st','$ln_st','$number_id','$c_name','$name_leader','$rank_leader','$no1','$no2','$no3','$no4','$no5','$no6','$no7','$no8','$no9','$no10','$no11','$no12','$no13','$no14','$no15','$no16','$no17','$no18','$no19','$no20','$no21_1','$no21_2','$get_work','$comment','$evaluator','$d','$m','$y')";
$query = mysqli_query($link,$sql) or die(mysqli_error($link));




$sql_status_work = "UPDATE register_work SET status_work='3' WHERE '$sid'";
$query_sql_status = mysqli_query($link,$sql_status_work);




$sum = $no1+$no2+$no3+$no4+$no5+$no6+$no7+$no8+$no9+$no10+$no11+$no12+$no13+$no14+$no15+$no16+$no17+$no18+$no19+$no20;

$sql_sum = "INSERT INTO grade (point_company,sid)
                    VALUE ('$sum','$sid')";
$query_sum = mysqli_query($link,$sql_sum);


echo "<script type='text/javascript'>window.location='../pages/evaluation_for_company_1.php'</script>";



mysqli_close($link);
?>



