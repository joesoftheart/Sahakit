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
                        <a href="./timeline.php">หางาน / ฝึกงาน </a>
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
                        <p>คุณสมบัตินักศึกษาสหกิจศึกษา<br>• มีสถานะเทียบเท่าชั้นปีที่ 3 หรือ 4 ในภาคการเรียนที่แผนการเรียนกำหนดไว้</p>
                                <p>- หลักสูตร 4 ปี (ปกติ) ชั้นปีที่ 4 ภาคการเรียนที่ 1</p>
                                <p>- หลักสูตร 3 ปี (เทียบโอน) ชั้นปีที่ 3 ภาคการเรียนที่ 1</p>
                                <p>- หลักสูตร 3½ ปี (สมทบ) ชั้นปีที่ 3 ภาคการเรียนที่ 2</p>
                                <p>- หรือพิจารณาตามความเหมาะสมของแต่ละคณะ</p>
                                <p>• มีผลการเรียนเฉลี่ยสะสมจนถึงภาคการศึกษาก่อนสมัครเข้าโครงการไม่น้อยกว่า 2.00<br>• สอบผ่านรายวิชาพื้นฐานที่สาขาวิชากำหนดเป็นวิชาเงื่อนไขของสหกิจศึกษาจึงจะได้รับการพิจารณาให้ลงทะเบียนรายวิชาสหกิจศึกษาได้<br>• เป็นผู้มีความประพฤติเรียบร้อย ไม่เคยผิดระเบียบวินัยนักศึกษา<br>• มีวุฒิภาวะและสามารถพัฒนาตนเองได้ดี</p>
                                <p>• ไม่เป็นโรคที่เป็นอุปสรรคต่อการปฏิบัติงานสหกิจศึกษาในสถานประกอบการ</p>
                                <p><br>การเตรียมความพร้อมก่อนออกปฏิบัติงาน &nbsp;<br>โครงการ สหกิจศึกษาจะจัดให้มีการอบรมนักศึกษาในภาคการศึกษาก่อนไปปฏิบัติงาน เพื่อเป็นการเตรียมให้นักศึกษามีความพร้อมสูงสุดก่อนที่จะไปปฏิบัติงาน โดยมีหัวข้อที่จะอบรม เช่น ความคาดหวังของสถานประกอบการต่อนักศึกษาฝึกงาน การเตรียมความพร้อมก่อนฝึกงาน การเขียนรายงาน เป็นต้น นักศึกษาจะต้องเข้ารับการอบรม และปฏิบัติตามเงื่อนไขที่โครงการกำหนด มิฉะนั้นจะไม่รับพิจารณาไปปฏิบัติงานและต้องออกจากการเป็นนักศึกษาหลักสูตร สหกิจศึกษาโดยปริยาย</p>
                                <p>หน้าที่ของนักศึกษาสหกิจศึกษา</p>
                                <p>1&nbsp; ต้องเข้าร่วมปฐมนิเทศสหกิจศึกษา เพื่อเป็นการเตรียมความพร้อมก่อนไปปฏิบัติงานสหกิจศึกษา</p>
                                <p>2&nbsp; ติดต่อส่งเอกสาร ติดตามข่าวสารการจัดกิจกรรม และประสานงานกับเจ้าหน้าที่ของสำนักงานสหกิจศึกษา ตลอดเวลาที่ปฏิบัติงาน ณ สถานประกอบการ</p>
                                <p>3&nbsp; หมั่นฝึกฝนและเพิ่มพูนความรู้ทางวิชาการอย่างต่อเนื่องก่อนไปปฏิบัติงานสหกิจศึกษา</p>
                                <p>4&nbsp; ต้องไปรายงานตัวภายในวันและเวลาที่กำหนด พร้อมด้วยหนังสือส่งตัว</p>
                                <p>5&nbsp; ตั้งใจปฏิบัติงานที่ได้รับมอบหมายจากสถานประกอบการอย่างเต็มกำลังความสามารถ</p>
                                <p>6&nbsp; อยู่ในระเบียบวินัยหรือข้อบังคับของสถานประกอบการ</p>
                                <p>7&nbsp; หาก มีปัญหาในการปฎิบัติงาน หรือมีเหตุทะเลาะวิวาทในสถานประกอบการทุกกรณี ต้องรีบติดต่ออาจารย์ที่ปรึกษาสหกิจศึกษา หรือเจ้าหน้าที่สหกิจศึกษาโดยทันที</p>
                                <p>ประโยชน์ที่นักศึกษาจะได้รับ<br>• เป็นการเรียนรู้วิชาชีพจากประสบการณ์ตรงในสถานที่ทำงานจริงแตกต่างไปจากการเรียนในห้องเรียน<br>• เกิด การเรียนรู้และพัฒนาตนเอง การทำงานร่วมกับผู้อื่น ความรับผิดชอบ และมีความมั่นใจในตนเองมากขึ้น ซึ่งเป็นคุณสมบัติที่พึงประสงค์ของสถานประกอบการ<br>• เป็นการนำความรู้ที่เรียนในมหาวิทยาลัยไปใช้ในการปฏิบัติงาน แสวงหานวัตกรรมสิ่งประดิษฐ์ การแก้ปัญหาในวิชาชีพ<br>• เป็นการพัฒนาสมรรถนะในการปฏิบัติงานวิชาชีพ สร้างทักษะความชำนาญ สามารถปฏิบัติงานได้ทันทีโดยไม่ต้องไปฝึกงานอีก<br>• เป็นการเปิดโอกาสให้นักศึกษาได้แสวงหาความรู้ ความสามารถ บุคลิกลักษณะของตนเอง<br>• ส่งผลให้ผลการเรียนดีขึ้นภายหลังการปฏิบัติงาน เนื่องด้วยมีความเข้าใจในเนื้อหาวิชามากขึ้นจากประสบการณ์ การปฏิบัติจริง<br>• เกิดทักษะในการสื่อสารข้อมูล ( Communication Skills)<br>• สามารถเลือกสายอาชีพได้ถูกต้อง เนื่องจากได้รับทราบความถนัดของตนเองมากขึ้น</p>
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
