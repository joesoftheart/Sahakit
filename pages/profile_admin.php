<?php
session_start();
include '../php/config.php';

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sahakit</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../script/script_teacher.js"></script>

</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-nav navbar-right" style="margin-right: 1%">

            <li><a href="../php/logout.php"><i class="glyphicon glyphicon-off"></i> ลงชื่อออก</a>
            </li>
        </ul>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active"><a href="profile_admin.php" class="fa fa-user"> บริษัทสมัครเข้าโครงการ</a></li>
                <li><a href="admin_student.php"><i class=" fa fa-cog  fa-fw"></i> แก้ไขข้อมูลนักศึกษา</a></li>
                <li><a href="admin_teacher.php"><i class=" fa fa-cog  fa-fw"></i> แก้ไขข้อมูลอาจารย์</a></li>
                <li><a href="admin_company.php"><i class=" fa fa-cog  fa-fw"></i> แก้ไขข้อมูลบริษัท</a></li>
                <li><a href="#"><i class=" fa fa-cog  fa-fw"></i> แก้ไขข้อมูลบันทึกคะแนน</a></li>
                <li><a href="newsupdate.php"><i class="glyphicon glyphicon-list-alt"></i> อัพเดทข่าวสาร</a></li>
                <li><a href="admin_upload.php" class="fa fa-upload "> อัพโหลด</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <?php

    $sql = "SELECT * FROM company WHERE c_status_join = 0";
    $query = mysqli_query($link, $sql);


    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-danger" style="margin-top: 5%">

                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive ">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อบริษัท</th>
                                    <th>ชื่อผู้ลงนาม</th>
                                    <th>ตำแหน่ง</th>
                                    <th>วันที่ลงนาม</th>
                                    <th>เวลาลงนาม</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <?php while ($row = mysqli_fetch_array($query)) { ?>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td><?= $row['c_name'] ?></td>
                                        <td><?= $row['leader'] ?></td>
                                        <td><?= $row['rank_leader'] ?></td>
                                        <td>วันที่ <?= $row['d_mou'] ?> เดือน <?= $row['d_mou'] ?>
                                            พ.ศ. <?= $row['d_mou'] ?></td>
                                        <td><?= $row['time_mou'] ?></td>
                                        <td><a href="../php/update_status.php?id=<?= $row['cid'] ?>"> ยอมรับ</a></td>
                                    </tr>

                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
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