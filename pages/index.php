<?php session_start();
include '../php/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sahakit System</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


  

    <?php
    $status = null;

    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
    }

    ?>
</head>

<body >

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
             <ul class="nav navbar-top-links navbar-left">
            <li><a href="index.php">ระเบียบและข้อบังคับ</a></li>
            <li><a href="company_join.php">บริษัทที่เข้าร่วมสหกิจ</a></li>
            <li><a href="Webboard.php">ถามและตอบ FAQ</a></li>
            <li><a href="dowload.php">ดาวน์โหลด </a></li>
        </ul>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <?php
            if (!isset($_SESSION['login'])) { ?>
                <li><a href="register.php"><i class="fa fa-user-plus"></i> สมัครสมาชิก/ลงทะเบียนนักศึกษา</a></li>
                <li><a href="register_company.php"><i class="fa fa-user-plus"></i> ลงทะเบียนบริษัทใหม่ </a> </li>
                <li><a href="login.html"><i class="fa fa-sign-in"> </i> เข้าสู่ระบบ</a></li>
            <?php } else { ?>
                <li><?= $status ?> </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-user"></i> <b class="caret"></b> </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php
                        if ($status == "นักศึกษา") { ?>
                            <li><a href="profile_student.php"><i class="glyphicon glyphicon-user"></i> โปรไฟล์</a></li>
                            <li><a href="editprofile_student.php"><i class="glyphicon glyphicon-edit"></i> เปลี่ยนรหัสผ่าน</a></li>
                            <?php
                        } else {
                        }
                        if ($status == "อาจารย์") { ?>
                            <li><a href="profile_teacher.php"><i class="glyphicon glyphicon-user"></i> โปรไฟล์</a></li>
                            <li><a href="editprofile_teacher.php"><i class="glyphicon glyphicon-edit"></i> แก้ไขโปรไฟล์</a></li>
                            <?php
                        } else {
                        }
                        if ($status == "สถานประกอบการ") { ?>
                            <li><a href="profile_company.php"><i class="glyphicon glyphicon-user"></i> โปรไฟล์</a></li>
                            <li><a href="editprofile_company.php"><i class="glyphicon glyphicon-edit"></i> เปลี่ยนรหัสผ่าน</a></li>
                            <?php
                        } else {
                        }
                        if ($status == "BOSS") { ?>
                            <li><a href="profile_admin.php">โปรไฟล์</a></li>
                            <?php
                        } else {
                        } ?>
                        <li><a href="../php/logout.php"><i class="glyphicon glyphicon-off"></i> ลงชื่อออก</a></li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li><a href="#">เกี่ยวกับสหกิจศึกษา <span class="fa arrow"></span> </a>
                        <ul class="nav nav-second-level">
                            <li><a href="whit_sahakit.php">อะไรคือสหกิจศึกษา</a></li>
                            <li><a href="whit_company.php">เกี่ยวกับสถานประกอบการ</a></li>
                            <li><a href="whit_student.php">เกี่ยวกับนักศึกษา</a></li>
                            <li><a href="whit_techer.php">เกี่ยวกับอาจารย์</a></li>
                            <li><a href="whit_vision.php">วิสัยทัศน์และพันธกิจ</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="#">นักศึกษา <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="manual_student.php">คู่มือสหกิจศึกษา</a></li>
                            <li><a href="#">แนวปฏิบัติสหกิจศึกษา <i class="fa arrow"></i> </a>
                                <ul class="nav nav-third-level">
                                        <li><a href="property_stu.php">คุณสมบัตินักศึกษา</a> </li>
                                    <li><a href="visit_stu.php">ขั้นตอนการนิเทศงาน</a> </li>
                                    <li><a href="seminar.php">การสัมมนาวิชาการ</a> </li>
                                    <li><a href="seminar.php">การสัมมนาวิชาการ</a> </li>
                                    <li><a href="evaluation_ca.php">การประเมินผล</a> </li>
                                </ul>
                            </li>
                            <li><a href="tecnic_student.php">เทคนิคการเลือกสถานประกอบการ</a></li>
                        </ul>
                    </li>
                    <li><a href="#">คณาอาจารย์ <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li><a href="visit_tea.php">ขั้นตอนการนิเทศงาน</a></li>
                            <li><a href="evaluation_tea.php">ผลการประเมินนักศึกษา</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">สถานประกอบการ <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="receive_stu.php">ขั้นตอนการรับนักศึกษา</a></li>
                            <li><a href="manual_company.php">คู่มือสถานประกอบการ</a></li>
                            <li><a href="visit_comp.php">วัตถุประสงค์ของการนิเทศงาน</a></li>
                            <li><a href="evaluation_comp.php">การประเมินผลนักศึกษา</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    $sql1 = "SELECT *  FROM news WHERE  id >(SELECT max(id) FROM news)-2";
    $query1 = mysqli_query($link, $sql1);
    ?>
    <div id="page-wrapper">
        <br>
        <div class="row">
            <div class="col-lg-12">
                <img class="thumbnail img-responsive" src="../img/index.png">
                <h3 class="page-header">
                    สหกิจศึกษายินดีต้อนรับ
                </h3>
            <?php while ($row1 = mysqli_fetch_array($query1)) { ?>
                <div class="col-md-4 ">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <?= $row1['headnews'] ?>
                        </div>
                        <div class="panel-body">
                            <p><?= $row1['substance'] ?> </p>
                            <p>
                                <small>ประกาศ ณ วันที่ <?= $row1['dmt'] ?></small>
                            </p>
                            <a href="#" class="btn btn-outline btn-info">อ่านต่อ</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
                </div>
            </div>
        <?php
        $sql = "SELECT * FROM student ";
        $query = mysqli_query($link, $sql);

        ?>
        <div class="col-lg-12">
            <h3 class="page-header">
                รายชื่อผลงานนักศึกษา
            </h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">

                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>สาขา</th>
                            </tr>
                            </thead>
                            <?php $i=1; while ($row = mysqli_fetch_array($query)) { ?>
                            <tbody>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['fn_st'] ?></td>
                                <td><?= $row['ln_st'] ?></td>
                                <td>วิทยาการคอมพิวเตอร์</td>
                            </tr>
                            </tbody>
                            <?php } $i++; ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-pie-chart"></div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->



        </div>
    </div>
    <footer class="panel-footer">
        <div class="container">
            <p class="text-muted"><i class="fa fa-copyright"></i> Copy right form Rajabhat Bansomdejchaopraya University</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/flot/excanvas.min.js"></script>
    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../data/flot-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>
