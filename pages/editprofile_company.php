<?php session_start();
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
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <?php


    $status = null;


    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];
        $username = $_SESSION['username'];

        $sql3 = "SELECT * FROM company WHERE c_status_join = 1";
        $qquery = mysqli_query($link, $sql3);
        $result = mysqli_fetch_array($qquery);


    }
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
            <a class="navbar-brand" href="index.php"><font color="black"> <i class="fa fa-home"></i>หน้าแรก </font> </a>
        </div>
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

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#">สถานประกอบการ <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="receive_stu.php">ขั้นตอนการรับนักศึกษา</a></li>
                            <li><a href="manual_company.php">คู่มือสถานประกอบการ</a></li>
                            <li><a href="visit_comp.php">วัตถุประสงค์ของการนิเทศงาน</a></li>
                            <li><a href="evaluation_comp.php">การประเมินผลนักศึกษา</a></li>
                        </ul>
                    </li>
                    <?php $ss = $result['c_status_join']; if ($ss == 1) {?>
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
                                <li><a href="evaluation_for_company.php">ประเมินนักศึกษา</a> </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-list-alt  "></i> ตรวจสอบความก้าวหน้า</a>
                            <ul class="nav nav-second-level">
                                <li><a href="list_note.php">ดูประวัติสมุดบันทึกประจำวัน</a> </li>
                                <li><a href="list_conclude.php">ดูสมุดบันทึกการฝึกงาน</a> </li>
                            </ul>
                        </li>
                        <li><a href="last_work.php">รายชื่อนักศึกษาที่ผ่านการฝึกงาน</a></li>
                    <?php }else{ ?>

                    <?php } ?>
                </ul>
            </div>
    </nav>

        <form action="../php/getedit_company.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                    <div class="panel panel-red">
                        <div class="panel-heading text-center">
                            <h4>แก้ไขรหัสผ่าน</h4>
                        </div>
                        <div class="panel-body">

                            <input type="hidden" name="username" value="<?= $username ?>">
                            <div class="row">
                                <div class="col-md-12 col-md-10 col-md-offset-1">
                                    <label>พาสเวิร์ดเก่า</label>
                                    <input type="text" name="oldpasswd" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12 col-md-10 col-md-offset-1">
                                    <label>พาสเวิร์ดใหม่</label>
                                    <input type="text" name="passwd" class="form-control" maxlength="18" minlength="8">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12 col-md-10 col-md-offset-1">
                                    <label>ยืนยันพาสเวิร์ด</label>
                                    <input type="text" name="repasswd" class="form-control" maxlength="18"
                                           minlength="8">
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-6 col-lg-offset-9">
                                    <button type="submit" class="btn btn-outline btn-primary">
                                                ยืนยัน</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
        </form>
    </div><!-- แบบฟอร์มสำรับสถานประกอบการ -->



    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>