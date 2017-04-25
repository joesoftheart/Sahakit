<?php
session_start();
include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');
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
    $tid = $_SESSION['tid'];
    $status = $_SESSION['status'];
    $fn_te = $_SESSION['fn_te'];
    $ln_te = $_SESSION['ln_te'];


    $SQL = "SELECT * FROM student INNER JOIN register_work ON student.sid = register_work.sid
                                  INNER JOIN company ON company.cid = register_work.cid";
    $query = mysqli_query($link, $SQL);



    ?>


</head>
<body>
<?php include 'menu_teacher.php'?>

 <?php $mysql = "SELECT * FROM register_work";
            $query1 = mysqli_query($link,$mysql);
            $check = mysqli_fetch_array($query1);

 ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10" style="margin-top: 5%;margin-left: 10%">
            <div class="panel panel-yellow">
                <div class="panel page-heading" align="center">
                    สถานะขอสมัครงานนักศึกษา
                </div>
                <div class="panel-body">
                    <div class="col-lg-10 table-responsive" style="margin-left: 8%">
                        <table class="table table-hover ">
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">ชื่อนักศึกษา</th>
                                <th>ชื่อบริษัท</th>
                                <th class="text-center">ตำแหน่งงานที่สมัคร</th>
                                <th class="text-center">สถานที่ตั้ง</th>
                                <th class="text-center">สถานะ</th>

                            </tr>
                            <?php  if ($check == null) {?>

                               <tr>
                                   <td class="text-center" colspan="4">ไม่มีข้อมูลการสมัคร</td>
                               </tr>

                               <?php  }   for($i=1;$result = mysqli_fetch_array($query);$i++) {?>
                                <tr>
                                    <td class="text-center"> <?= $i ?></td>
                                    <td class="text-center"><?= $result['fn_st'] ?>  <?= $result['ln_st'] ?></td>
                                    <td><?= $result['c_name'] ?></td>
                                    <td class="text-center"><?= $result['rank'] ?></td>
                                    <td><?= $result['c_address'] ?></td>

                                    <?php if($result['status_work'] == 0) { ?>
                                        <td class="text-center"><font color="orange">ยังไม่มีที่ฝึกงาน</font></td>
                                    <?php } elseif($result['status_work'] == 1) { ?>
                                        <td class="text-center"><font color="#ff4500">สมัครงานรออนุมัติ</font></td>
                                    <?php }elseif($result['status_work'] == 2) { ?>
                                        <td class="text-center"><font color="#ff4500">บริษัทอนุมัติรอนักศึกษายืนยัน</font></td>
                                    <?php }elseif($result['status_work'] == 3){ ?>
                                        <td class="text-center"><font color="green">กำลังฝึกงาน</font></td>
                                    <?php } elseif($result['status_work'] == 4){ ?>
                                    <td class="text-center"><font color="fuchsia">ผ่านการฝึกงาน</font></td>
                                    <?php } ?>

                                </tr>
                            <?php } ?>

                        </table>

                    </div>
                </div>
            </div>
        </div>
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