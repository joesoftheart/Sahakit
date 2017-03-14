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
   $week_number = $_POST["week_number"];
   $date_start = $_POST["date_start"];
   $date_end = $_POST["date_end"];
   $job_work = $_POST["job_work"];
   $problem = $_POST["problem"];
   $work_fix = $_POST["work_fix"];
   $note = $_POST["note"];
   $save_note = $_POST["save_note"];
   $date_raw_start = explode("-",$date_start);
   $date_raw_end = explode("-",$date_end);

   $mount_start = convertdate($date_raw_start[1]);
   $mount_end = convertdate($date_raw_end[1]);

   $date_now_start = ($date_raw_start[2]-543)."-".$mount_start."-".$date_raw_start[0];
   $date_now_end = ($date_raw_end[2]-543)."-".$mount_end."-".$date_raw_end[0];







$sql = "INSERT INTO conclude (uid,cid,week,date_start,date_end,job_work,problem,work_fix,note,date_start_now,date_start_end)
VALUES ('$user_id','$cid','$week_number','$date_start','$date_end','$job_work','$problem','$work_fix','$note','$date_now_start','$date_now_end') ";
   $result = mysqli_query($link,$sql)or die(mysqli_error($link));

echo "<script type='text/javascript'>window.location='../pages/list_conclude.php'</script>";

?>