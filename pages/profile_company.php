<?php
session_start();

include '../php/config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>สหกิจศึกษา</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <?php
        $status = $_SESSION['status'];
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];

        $sql3 = "SELECT * FROM company WHERE cid= $cid AND c_status_join = 1";
        $qquery = mysqli_query($link,$sql3);
        $result = mysqli_fetch_array($qquery);

    ?>
</head>
<body>
<?php include 'menu_company.php'?>
<?php
$student = "SELECT * FROM execute
JOIN student ON (execute.uid=student.sid)
JOIN company ON (execute.cid = company.cid)
WHERE status_work   = 'ยังไม่ได้ทำรายงาน' AND company.cid = '".$cid."' ";
$query2 = mysqli_query($link,$student);
?>


<div id="page-wrapper">
    <div class="col-md-12">
        <table class="table table-striped table-condensed">
            <thead>
            <tr>
                <td>ชื่อ</td>
                <td>วัน / เดือน / ปี</td>
                <td>สถานะ</td>
            </tr>
            </thead>
            <tbody>
            <?php while($dt = mysqli_fetch_array($query2)){ ?>
                <tr>
                    <td><?php echo $dt['fn_st'] ?> <?php echo $dt['ln_st'] ?></td>
                    <td><?php echo $dt['date'] ?></td>
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
        <script src="../vendor/raphael/raphael.min.js"></script>
        <script src="../vendor/morrisjs/morris.min.js"></script>
        <script src="../data/morris-data.js"></script>
        <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>