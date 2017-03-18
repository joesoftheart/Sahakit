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
            <ul class="nav navbar-top-links navbar-left">
                <li><a href="index.php">ระเบียบและข้อบังคับ</a></li>
                <li><a href="company_join.php">บริษัทที่เข้าร่วมสหกิจ</a></li>
                <li><a href="index.php">ถามและตอบ FAQ</a></li>
                <li><a href="dowload.php">ดาวน์โหลด </a></li>
            </ul>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <?php
            if (!isset($_SESSION['login'])) { ?>
                <li><a href="register.php"><i class="fa fa-user-plus"></i> ลงทะเบียนบริษัทใหม่</a></li>
                <li><a href="login.html"><i class="fa fa-sign-in"> </i> เข้าสู่ระบบ</a></li>
            <?php } else { ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
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
                            <li><a href="editprofile_teacher.php"><i class="glyphicon glyphicon-edit"></i> เปลี่ยนรหัสผ่าน</a></li>
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

                    <li><a href="#">บุคลากร <span class="fa arrow"></span> </a>
                        <ul class="nav nav-second-level">
                            <li><a href="whit_vision.php">กรรมการบริหาร</a></li>
                            <li><a href="whit_vision.php">อาจารย์ประสานงานประจำสาขาวิชา</a></li>
                            <li><a href="whit_vision.php">เจ้าหน้าที่</a></li>
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
                                    <li><a href="evaluation_ca.php">การประเมินผล</a> </li>
                                </ul>
                            </li>
                            <li><a href="tecnic_student.php">เทคนิคการเลือกสถานประกอบการ</a></li>
                        </ul>
                    </li>
                    <li><a href="#">คณาอาจารย์ <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li><a href="visit_tea.php">ขั้นตอนการนิเทศงาน</a></li>
                            <li><a href="whit_vision.php">แนวปฏิบัติสหกิจศึกษา</a></li>
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
    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- .panel-heading -->
                    <div class="panel-body">
                        <font color="red">สร้างเมื่อ วันพฤหัสบดี, 10 พฤศจิกายน 2559 20:28</font><br>
                        <table width="710"  class="news">
                            <tbody>
                            <tr>
                                <td colspan="3"><p><strong>ขั้นตอนที่ 1 : นักศึกษาต้องรู้จักตนเอง</strong></p></td>
                            </tr>
                            <tr>
                                <td width="10">&nbsp;</td>
                                <td width="10" valign="top"></td>
                                <td width="962"> รู้จักลักษณะงานที่สนใจและถนัด &nbsp;ตรงกับความสามารถของตนเอง เช่น ระดับความรู้ทางวิชาการ &nbsp;ผลการเรียน &nbsp;มีความชำนาญในงานด้านใด &nbsp; มีบุคลิกภาพและสุขภาพที่จะสามารถปฏิบัติงานนั้นได้
                                    <div></div></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td valign="top"></td>
                                <td>คุณสมบัติพิเศษประจำตัว เช่น ความสามารถในการพูด/เขียน/อ่าน ภาษาอังกฤษหรือภาษาอื่นที่สถานประกอบการต้องการ &nbsp;เป็นนักกิจกรรม &nbsp;มีความสามารถในการเขียน/ใช้โปรแกรมต่างๆ</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3"><p><strong>ขั้นตอนที่ 2&nbsp; : นักศึกษาต้องรู้จักสถานประกอบการ</strong></p></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td valign="top"></td>
                                <td>รู้ข้อมูลเบื้องต้นของสถานประกอบการที่ตนเองสนใจ เช่น &nbsp;สถานประกอบการมีชื่อเสียงในด้านใด &nbsp;ที่ตั้ง &nbsp;จังหวัด &nbsp;ประเภทธุรกิจ เป็นต้น</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td valign="top"></td>
                                <td>ลักษณะงานที่สถานประกอบการเสนอมาสอดคล้องกับความสามารถและความสนใจของตนเองหรือไม่ &nbsp;โดยลักษณะงานคุณภาพควรเป็นโครงงาน &nbsp;หรืองานประจำที่สอดคล้องกับสาขาวิชามีความเหมาะสมหรือมีค่าตอบแทน สวัสดิการที่สถานประกอบการจัดไว้ให้&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>ขั้นตอนที่ 3&nbsp;:</strong>&nbsp;เมื่อนักศึกษาได้ศึกษาข้อมูลที่เกี่ยวข้องแล้ว ให้ตัดสินใจเลือกสถานประกอบการที่ตรงกับตนเองมากที่สุด แล้วจัดเตรียมชุดใบสมัครงานสหกิจศึกษาพร้อมเอกสารหลักฐานส่งศูนย์สหกิจศึกษาฯ ตามวัน เวลาที่กำหนด</td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3"><p><strong>หมายเหตุ</strong><strong>&nbsp;:</strong>&nbsp;&nbsp; นักศึกษาสามารถแนะนำสถานประกอบการที่ไม่มีประกาศรับสมัครงานในภาคการศึกษาสหกิจศึกษาของตนเองได้ &nbsp;โดยแจ้งข้อมูลสถานประอบการพร้อมชื่อบุคคลและหมายเลขโทรศัพท์ที่ติดต่อ (ถ้ามี) ให้กับฝ่ายพัฒนางานสหกิจศึกษา ศูนย์สหกิจศึกษาและพัฒนาอาชีพ &nbsp;เพื่อประสานงานต่อไป เพื่อป้องกันการสับสนของข้อมูลจะไม่อนุญาตให้นักศึกษาติดต่อสถานประกอบการเอง</p></td>
                            </tr>
                            </tbody>
                        </table>


                            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
