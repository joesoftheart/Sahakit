<meta charset="UTF-8">
<?php


function convertdate($monthcon){
    switch ($monthcon){
        case 'มกราคม' :
            return  $monthcon = 01;
            break;
        case 'กุมภาพันธ์' :
            return $monthcon = 02;
            break;
        case 'มีนาคม' :
            return $monthcon = 03;
            break;
        case 'เมษายน' :
            return $monthcon = 04;
            break;
        case 'พฤษภาคม' :
            return $monthcon = 05;
            break;
        case 'มิถุนายน' :
            return $monthcon = 06;
            break;
        case 'กรกฎาคม' :
            return $monthcon = 07;
            break;
        case 'สิงหาคม' :
            return  $monthcon = 08;
            break;
        case 'กันยายน' :
            return  $monthcon = 09;
            break;
        case 'ตุลาคม' :
            return  $monthcon = 10;
            break;
        case 'พฤศจิกายน' :
            return  $monthcon = 11;
            break;
        case 'ธันวาคม' :
            return  $monthcon = 12;
            break;


    }
}

include 'config.php';
   $user_id =  $_POST["user_id"];
    $cid = $_POST['cid'];
    $tid = $_POST['tid'];
   $type = $_POST["type"];
   $week_number = $_POST["week_number"];
   $date_thai = $_POST["date_thai"];
   $start_minute = $_POST["start_minute"];
   $start_secound = $_POST["start_secound"];
   $end_minute = $_POST["end_minute"];
   $end_secound = $_POST["end_secound"];
   $job_work = $_POST["job_work"];
   $problem = $_POST["problem"];
   $work_fix = $_POST["work_fix"];
   $note = $_POST["note"];
   $save_note = $_POST["save_note"];
   //echo $date_thai;
   $date_raw = explode("-",$date_thai);
   $mount = convertdate($date_raw[1]);
   $date_now = ($date_raw[2]-543)."-".$mount."-".$date_raw[0];





    $start = date_create($date_now.$start_minute.":".$start_secound);
    $end = date_create($date_now.$end_minute.":".$end_secound);
    $diff=date_diff($end,$start);

    $date = $diff->format("%d%");
    $hour = $diff->format("%h%");
    $minute = $diff->format("%i%");


$exe = "SELECT id FROM execute  order by id desc limit 1";
$queryexe = mysqli_query($link,$exe);
$isexe = mysqli_fetch_array($queryexe);



$sql = "UPDATE execute SET cid ='$cid',tid ='$tid',type = '$type',date = '$date_thai',week ='$week_number',start_minute ='$start_minute',start_secound = '$start_secound',end_minute ='$end_minute',end_secound ='$end_secound',job_work='$job_work',problem='$problem',work_fix='$work_fix',note='$note',save_note='$save_note',hour_amount='$hour',minute_amount='$minute',status_work ='ทำรายงานแล้ว' WHERE id = '".$isexe['id']."' ";
   $result = mysqli_query($link,$sql)or die(mysqli_error($link));

echo "<script type='text/javascript'>window.location='../pages/list_note.php'</script>";


?>