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
    $fn_te = $_SESSION['fn_te'];
    $SQL = "SELECT * FROM register_work , company,student  
                          WHERE register_work.cid = company.cid 
                            AND register_work.sid = student.sid  
                             AND register_work.status_work
                              AND register_work.cid";
    $query = mysqli_query($link, $SQL);



    ?>


</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <i class="fa fa-home"></i> หน้าแรก </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
                        class="fa fa-user"></i> <?= $fn_te ?> <b class="caret"></b> </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="../pages/profile_teacher.php"><i class="glyphicon glyphicon-user"></i>โปรไฟล์</a></li>
                    <li><a href="../pages/editprofile_teacher.php"><i class="glyphicon glyphicon-edit"></i> แก้ไขโปรไฟล์</a></li>
                    <li class="divider"></li>
                    <li><a href="../php/logout.php"><i class="glyphicon glyphicon-off"></i> ลงชื่อออก</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li><a href="#"><img src="../img/png/user-6.png" width="25px" height="25px"> นักศึกษา <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="data_student.php">นักศึกษาในการดูแล</a></li>
                            <li><a href="all_student.php">นักศึกษาสหกิจทั้งหมด</a></li>
                        </ul>
                    </li>
                    <li><a href="do_join_work.php"><img src="../img/png/file.png" width="25px" height="25px"> สรุปคะแนนการปฏิบัติงาน</a> </li>

                </ul>
            </div>
    </nav>
</div>
<?php $mysql = "SELECT * FROM register_work";
$query1 = mysqli_query($link,$mysql);
$check = mysqli_fetch_array($query1);

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12" style="margin-top: 5%">
            <div class="panel panel-yellow">
                <div class="panel-body">
                    <div class="col-md-12 table-responsive" >
                        <table class="table table-hover table-bordered ">
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">รูปประจำตัว</th>
                                <th class="text-center">รหัสนักศึกษา</th>
                                <th class="text-center">ชื่อนักศึกษา</th>
                                <th class="text-center">เบอร์โทร</th>
                                <th class="text-center">ชื่อบริษัท</th>
                                <th class="text-center">ตำแหน่งงานที่สมัคร</th>
                                <th class="text-center">สถานที่ตั้ง</th>

                            </tr>
                            <?php  if ($check == null) { ?>

                                <tr>
                                    <td class="text-center" colspan="4">ไม่มีข้อมูลการสมัคร</td>
                                </tr>

                            <?php  }   for($i=1;$result = mysqli_fetch_array($query);$i++) {?>
                                <tr>
                                    <td class="text-center"> <?= $i ?></td>
                                    <td class="text-center"> <img src="../uploads/student/<?=$result['filetoload']?>" width="50px" height="50px" /> </td>
                                    <td class="text-center"><?= $result['number_id'] ?></td>
                                    <td class="text-center"><?= $result['fn_st'] ?>  <?= $result['ln_st'] ?></td>
                                    <td class="text-center"><?= $result['telaphone'] ?></td>
                                    <td><?= $result['c_name'] ?></td>
                                    <td class="text-center"><?= $result['rank'] ?></td>
                                    <td><?= $result['c_address'] ?></td>

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