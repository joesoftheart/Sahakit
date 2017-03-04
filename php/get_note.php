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






$sql = "INSERT INTO execute (uid,type,date,week,start_minute,start_secound,end_minute,end_secound,job_work,problem,work_fix,note,save_note,date_now,hour_amount,minute_amount)
VALUES ('$user_id','$type','$date_thai','$week_number','$start_minute','$start_secound','$end_minute','$end_secound','$job_work','$problem','$work_fix','$note','$save_note','$date_now','$hour','$minute') ";
   $result = mysqli_query($link,$sql)or die(mysqli_error($link));
?>