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
                    <p>นักศึกษาสหกิจศึกษา <br><br>
                        คุณสมบัตินักศึกษาสหกิจศึกษาภาควิชา/สาขาวิชาจะเป็นผู้คัดเลือกนักศึกษาที่มีคุณสมบัติดังนี้<br>
                        -นักศึกษาผ่านการศึกษาในมหาวิทยาลัยมาแล้วโดยมีจำนวนหน่วยกิตไม่น้อยกว่ากึ่งหนึ่ง<br>
                        ของจำนวนหน่วยกิตตามหลักสูตรนั้น<br>
                        -มีระดับคะแนนเฉลี่ยสะสมไม่ต่ำกว่า2.00ในระดับปริญญาตรีและ3.00ในระดับบัณฑิตศึกษา<br>
                        -ต้องผ่านการพิจารณาคุณสมบัติโดยภาควิชา/สาขาวิชาต้นสังกัดของนักศึกษาตามเกณฑ์ที่คณะ/วิทยาลัยกำหนด<br>
                        -มีความพร้อมทางด้านร่างกายที่ไม่เป็นอุปสรรคต่อการปฏิบัติงานในสถานประกอบการ<br>
                        -มีความประพฤติเรียบร้อยไม่เคยหรืออยู่ระหว่างถูกพักการศึกษา<br><br>
                        2.1.2 หน้าที่ของนักศึกษาสหกิจศึกษา<br><br>
                        -ติดตามข่าวสารการจัดหางานและประสานกับเจ้าหน้าที่สหกิจศึกษาตลอดเวลา<br>
                        -เข้ารับการปฐมนิเทศฝึกอบรมครบถ้วนตามที่หน่วยงานสหกิจศึกษาประจำคณะ/วิทยาลัยกำหนด<br>
                        -ไปรายงานตัวภายในวันและเวลาที่กำหนดพร้อมด้วยหนังสือส่งตัวบัตรประจำตัวนักศึกษาและรับคำแนะนำจากสถานประกอบการ<br>
                        -ตั้งใจปฏิบัติงานที่ได้รับมอบหมายจากพนักงานที่ปรึกษาอย่างเต็มกำลังความสามารถ<br>
                        -ปฏิบัติตนอยู่ในระเบียบวินัยและข้อบังคับของสถานประกอบการอย่างเคร่งครัด<br>
                        -ประสานงานกับหน่วยงานสหกิจศึกษาประจำคณะ/วิทยาลัยเพื่อติดต่อส่งเอกสารตามกำหนดเวลาและให้ข่าวสารการปฏิบัติงานของตนเองกับหน่วยงานสหกิจศึกษาประจำคณะ/วิทยาลัยตลอดระยะเวลาที่ปฏิบัติงานณสถานประกอบการ<br>
                        -หากมีปัญหาในการปฏิบัติงานต้องรีบติดต่ออาจารย์นิเทศ/อาจารย์ที่ปรึกษาสหกิจศึกษาหรือเจ้าหน้าที่สหกิจศึกษาโดยทันที<br>
                        -หมั่นค้นคว้าและเพิ่มพูนความรู้ทางวิชาการอย่างต่อเนื่องก่อนไปปฏิบัติงานสหกิจศึกษา<br>
                         ประโยชน์ที่นักศึกษาจะได้รับจากการปฏิบัติงานสหกิจศึกษา<br>
                        -ได้รับประสบการณ์ตรงตามสาขาวิชาชีพที่เรียนเพิ่มเติมจากการเรียนในห้องเรียน<br>
                        -เกิดการเรียนรู้และพัฒนาตนเองรู้จักทำงานร่วมกับผู้อื่นมีความรับผิดชอบมีความมั่นใจในตนเองมากขึ้นซึ่งเป็นคุณสมบัติที่พึงประสงค์ของสถานประกอบการ<br>
                        -ได้พบกับปัญหาต่างๆที่แท้จริงในการทำงานและคิดค้นวิธีการแก้ปัญหาเฉพาะหน้าได้อย่างถูกต้อง<br>
                        -ส่งผลให้มีผลการเรียนดีขึ้นภายหลังการปฏิบัติงานจริงในสถานประกอบการอันเนื่องจากประสบการณ์ที่เชื่อมโยงให้เกิดความเข้าใจในเนื้อหาวิชามากขึ้น<br>
                        -เกิดทักษะการสื่อสารข้อมูลการทำงานภายในสถานประกอบการ(CommunicationSkill)<br>
                        -สามารถเลือกสายอาชีพได้ถูกต้องเนื่องจากได้ทราบความถนัดของตนเองมากขึ้น<br>
                        -สำเร็จการศึกษาเป็นบัณฑิตที่มีศักยภาพในการทำงานและมีโอกาสได้รับการเสนองานก่อนที่สำเร็จการศึกษา<br>
                    </p>
                    </div>
                </div>
            </div>
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