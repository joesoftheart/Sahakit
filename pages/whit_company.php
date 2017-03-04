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
                        <p>การรับนักศึกษาสหกิจเข้าปฏิบัติงาน</p>
                                <p>• คัดเลือกนักศึกษาโดยพิจารณาจากเอกสารสมัครและสัมภาษณ์</p>
                                <p>• ปฐมนิเทศนักศึกษา เพื่อให้รู้จักองค์กร โครงสร้างองค์กร ผลิตภัณฑ์ ความคาดหวังและข้อปฏิบัติ ต่าง ๆ ขององค์กร</p>
                                <p>• ส่งนักศึกษาเข้ารับการปฏิบัติงาน ณ ต้นสังกัด โดยนำนักศึกษาไปพบกับผู้บังคับบัญชา / พี่เลี้ยงต้นสังกัด เพื่อแนะนำสถานที่ทำงาน ลักษณะงานและความรับผิดชอบให้แก่นักศึกษา พร้อมทั้ง มอบเอกสารต่อไปนี้ให้กับพนักงานพี่เลี้ยง</p>
                                <p>• นักศึกษาปฏิบัติงานตามที่ได้รับมอบหมาย โดยมีพี่เลี้ยงคอยดูแลให้คำแนะนำและให้ความช่วยเหลือตลอดระยะเวลาการปฏิบัติงาน</p>
                                <p>ประโยชน์ที่ทางสถานประกอบการจะได้รับ</p>
                                <p>• ลดการจ้างงานและค่าตอบแทนลง โดยให้นักศึกษาสหกิจซึ่งมีความรู้ด้านวิชาการเพียงพอ ระดับหนึ่ง เข้าปฏิบัติงานทดแทนพนักงานที่ขาดไป หรือเป็นผู้ช่วยพนักงานและให้ค่าตอบแทนที่พอเหมาะกับลักษณะงาน ทั้งนี้ให้เป็นไปตามนโยบายของสถานประกอบการนั้น ๆ</p>
                                <p>• มีนักศึกษาที่มีความกระตือรือร้นและมีความพร้อมทางวิชาการช่วยปฏิบัติ งานอย่างต่อเนื่อง ในระยะเวลาที่ยาวขึ้นกว่าการฝึกงานปกติ คือ 17 สัปดาห์ หรือประมาณ 4 เดือน</p>
                                <p>• พนักงานประจำจะมีเวลามากขึ้น ที่จะไปปฏิบัติงานในหน้าที่อื่นที่มีความยากและซับซ้อนยิ่งขึ้น</p>
                                <p>• คณาจารย์กับนักศึกษาจะได้มีส่วนช่วยในการแก้ปัญหาให้กับสถานประกอบการ ซึ่งเป็นการลดภาระภาย</p>
                                <p>ในองค์กร</p>
                                <p>• เกิดความร่วมมือกันทางวิชาการระหว่างผู้บริหารสถานประกอบการกับคณาจารย์ของทาง</p>
                                <p>มหาวิทยาลัยอย่างต่อเนื่องตลอดไป</p>
                                <p>• เป็นวิธีการหนึ่งในการสรรหาพนักงานประจำที่มีความรู้ความสามารถตรงกับ ตำแหน่งงาน โดยอาจลดเวลาในการสอนงานและเวลาในการทดลองงานลงได้</p>
                                <p>• สถานประกอบการเป็นที่รู้จักมากขึ้นในด้านการให้ความร่วมมือด้านงานบริการกับมหาวิทยาลัย</p>
                                <p>• เป็นการสร้างความสัมพันธ์ที่ดีกับสถานประกอบการและเสริมภาพลักษณ์ที่ดีของ องค์กร ในด้านการส่งเสริม สนับสนุนการศึกษาและช่วยพัฒนาบัณฑิตของชาติ</p>
                                <p>• สิทธิที่จะได้รับยกเว้นภาษีเงินได้เป็นกรณีพิเศษ ตาม พ.ร.บ. ส่งเสริมการพัฒนาฝีมือแรงงาน พ.ศ. 2545</p>
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
