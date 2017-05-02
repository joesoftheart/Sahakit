<?php
session_start();
include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');
function DateDiff($strDate1,$strDate2)
{
    return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
}
function TimeDiff($strTime1,$strTime2)
{
    return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
}
function DateTimeDiff($strDateTime1,$strDateTime2)
{
    return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
}
?>


<html>

<head>

    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sahakit</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <?PHP
    $status = $_SESSION['status'];
    $fn_te = $_SESSION['fn_te'];
    $ln_te = $_SESSION['ln_te'];
    $tid = $_SESSION['tid'];

    $SQL = "SELECT * FROM teacher WHERE tid ='$tid'";
    $query = mysqli_query($link, $SQL);
    $row = mysqli_fetch_array($query);

    $student = "SELECT * FROM execute 
            JOIN student ON (execute.uid=student.sid) 
            JOIN teacher ON (execute.tid = teacher.tid)
            WHERE status_work   = 'ยังไม่ได้ทำรายงาน' AND teacher.tid = '".$tid."' ";
    $query2 = mysqli_query($link,$student);

    ?>


</head>
<body>
<?php include 'menu_teacher.php'?>

<div id="page-wrapper">
    <div class="col-md-12">
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <td>ชื่อ - นามสกุล</td>
                    <td>ปี / เดือน / วัน</td>
                    <td>สถานะ</td>
                </tr>
            </thead>
            <tbody>
                <?php while($dt = mysqli_fetch_array($query2)){ ?>
                    <tr>
                        <td><?php echo $dt['fn_st'] ?> <?php echo $dt['ln_st'] ?></td>
                        <td><?php echo $dt['date_now'] ?></td>
                        <td><span class="label label-danger">ยังไม่ได้เขียนรายงาน</span></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>


<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>


</body>
</html>