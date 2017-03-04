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
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
                            <tbody>
                            <tr>
                                <td valign="top" colspan="2" class="news"><strong>การนิเทศงานของคณาจารย์</strong>
                                    <ul>
                                        <li>เจ้าหน้าที่สหกิจศึกษาจะประสานงานกับประธานคณาจารย์นิเทศทุกสาขาวิชา เพื่อกำหนดแผนการนิเทศงานของสาขาวิชาทั้งภาคการศึกษา โดยคณาจารย์ในสาขาวิชาจะร่วมกันวางแผนนิเทศสหกิจศึกษากับเจ้าหน้าที่สหกิจศึกษา ซึ่งจะนิเทศระหว่างสัปดาห์ที่ 5-12 ของการปฏิบัติงานของนักศึกษา เพื่อให้คำแนะนำและคำปรึกษาแก่นักศึกษาทั้งในเรื่องการปฏิบัติงานและการปฏิบัติตนในสถานประกอบการ โดยนักศึกษาทุกคนที่ไปปฏิบัติงานจะต้องได้รับการนิเทศงานอย่างน้อย 1 ครั้งในระหว่างที่ปฏิบัติงาน</li>
                                        <li>กำหนดให้มีการนิเทศสถานประกอบการ 2 แห่งต่อหนึ่งวัน เว้นแต่สถานประกอบการอยู่ใกล้กันมากอาจให้นิเทศมากกว่า 2 แห่ง หรือในกรณีที่สถานประกอบการที่อยู่ไกลจากจังหวัดนครราชสีมาที่ใช้เวลาเดินทางไปกลับมากกว่า 6 ชั่วโมง และกรณีที่คงเหลือสถานประกอบการเพียงแห่งเดียวให้คณาจารย์นิเทศเพียงสถานประกอบการเดียวได้</li>
                                        <li>เจ้าหน้าที่สหกิจศึกษาประสานงานกับสถานประกอบการ เพื่อนัดหมายวันและเวลาที่คณาจารย์นิเทศจะเดินทางไปนิเทศนักศึกษา ณ สถานประกอบการ</li>
                                        <li>เจ้าหน้าที่สหกิจศึกษารวบรวมแฟ้มประวัตินักศึกษาพร้อมรายละเอียดสถานประกอบการส่งมอบให้อาจารย์ที่ปรึกษาก่อนวันเดินทาง 1-2 วันทำการ<br>
                                            คณาจารย์นิเทศเดินทางไปนิเทศงานตามกำหนดนัดหมาย โดยมีหัวข้อการนิเทศงานคือ ตรวจสอบคุณภาพงานและหัวข้อรายงานที่สถานประกอบการมอบหมาย ติดตามผลการปฏิบัติงานและความก้าวหน้าในการจัดทำรายงานของนักศึกษา ให้คำปรึกษาและช่วยแก้ไขปัญหาที่อาจจะเกิดขึ้นทั้งด้านวิชาการและการพัฒนาตนเองของนักศึกษา ถ้าคณาจารย์นิเทศพบว่าสถานประกอบการยังไม่เข้าใจในหลักการสหกิจศึกษา ขอได้โปรดกรุณาชี้แจงให้สถานประกอบการเข้าใจ และแจ้งปัญหานี้ให้ศูนย์ฯ ทราบด้วย</li>
                                        <li>นักศึกษาควรทราบกำหนดการไปนิเทศของอาจารย์เพื่อรอพบคณาจารย์นิเทศ ถ้านักศึกษามีการเดินทางหรือเปลี่ยนสถานที่ทำงานในวันดังกล่าว หรือมีเหตุเจ็บป่วยหรืออื่น ๆ ที่ไม่สามารถมาปฏิบัติงานได้ให้นักศึกษาติดต่อศูนย์ หรืออาจารย์โดยด่วนเพื่อเปลี่ยนแปลงการนัดหมายใหม่</li>
                                        <li>ในการนิเทศ อาจารย์จะได้พบกับนักศึกษาและพนักงานที่ปรึกษา โดยจะมีการประชุมเพื่อพุดคุยกับแต่ละฝ่ายโดยลำพังก่อนแล้วจึงประชุมพร้อมกันอีกครั้งเพื่อร่วมกันแก้ไขปัญหาที่เกิดขึ้น<strong>โดยที่อาจารย์ควรใช้เวลาในการพบปะกับบุคคลทั้งสองไม่น้อยกว่า 1 ชั่วโมง</strong></li>
                                        <li>ถ้ามีโอกาสทางศูนย์ อาจนัดให้อาจารย์ได้พบกับผู้บริหารของสถานประกอบการเพื่อแลกเปลี่ยนความคิดเห็นและประชาสัมพันธ์มหาวิทยาลัยด้วยก็ได้</li>
                                        <li>ภายหลังการเดินทางกลับ อาจารย์ที่ปรึกษาจะประเมินผลการนิเทศงาน ประเมินคุณภาพของสถานประกอบการและนักศึกษา ตามแบบประเมินผลและส่งมอบคืนศูนย์</li>
                                    </ul></td>
                            </tr>
                            </tbody>
                        </table>
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