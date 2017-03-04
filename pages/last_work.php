<?php
session_start();

include '../php/config.php';
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>สหกิจศึกษา</title>


    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <?php
    $status = null;


    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];


        $sql = "SELECT * FROM register_work , company,student
                          WHERE register_work.cid = company.cid
                            AND register_work.sid = student.sid
                              AND register_work.status_work = 3
                              AND register_work.cid = $cid";
        $query = mysqli_query($link, $sql);

    }
    ?>


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
            <a class="navbar-brand" href="index.php"><font color="black"> <i class="fa fa-home"></i>หน้าแรก </font> </a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
                        class="fa fa-user"></i> <?= $c_name ?> <b class="caret"></b> </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="profile_company.php"><i class="glyphicon glyphicon-user"></i> โปรไฟล์</a></li>
                    <li><a href="editprofile_company.php"><i class="glyphicon glyphicon-edit"></i> เปลี่ยนรหัสผ่าน</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="../php/logout.php"><i class="glyphicon glyphicon-off"></i> ลงชื่อออก</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#"><i class="fa fa-book"></i> คู่มือ สถานประกอบการ <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="flot.html">ขั้นตอนการรับนักศึกษา</a></li>
                            <li><a href="flot.html">คู่มือสถานประกอบการ</a></li>
                            <li><a href="flot.html">การประเมินผลนักศึกษา</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-bullhorn"></i> ประกาศรับสมัครนักศึกษาฝึกงาน <i class="fa arrow"></i>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="work_post.php">ประกาศรับฝึกงาน</a></li>
                            <li><a href="work_post_edit.php">รายการโพสย้อนหลัง</a></li>
                        </ul>
                    </li>

                    <li><a href="#">รายชื่อนักศึกษาฝึกงาน <span class="fa arrow"></span> </a>
                        <ul class="nav nav-second-level">
                            <li><a href="name_student_join.php">รายชื่อนักศึกษาที่สมัครงานเข้ามา</a></li>
                            <li><a href="now_student_work.php">รายชื่อนักศึกษาที่กำลังฝึกงาน</a></li>
                        </ul>
                    </li>
                    <li><a href="progress.php"><i class="fa fa-list-alt  "></i> ตรวจสอบความก้าวหน้า</a></li>
                    <li><a href="last_work.php">รายชื่อนักศึกษาที่ผ่านการฝึกงาน</a></li>


                </ul>
            </div>
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header">
                <?= $c_name ?>
            </h1>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            รายชื่อนักศึกษาที่ผ่านการฝึกงาน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover"
                                   id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>เพศ</th>
                                    <th>ฝึกงานตำแหน่ง</th>
                                    <th>เข้ามาฝึกงานเมื่อ</th>
                                    <th>ใบรองรับการฝึกงาน</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?= $row['idst']; ?></td>
                                        <td><?= $row['fn_st']; ?>  <?= $row['ln_st']; ?></td>
                                        <td><?= $row['gender']; ?></td>
                                        <td class="center"><?= $row['rank']; ?></td>
                                        <td class="center"><?= $row['dmt']; ?></td>
                                        <td>นี่ไงใบฝึกงานเสด</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

</body>

</html>