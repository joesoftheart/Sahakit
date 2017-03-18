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

<style>
    .jj {

        display: block;
        width: 138px;
        height: 138px;
        background-image: url("../img/jaja.png");
        text-align: center;

        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        padding-top: 80px;
        background-repeat: repeat-y;
    }

    td.padding1 {padding: 0.2cm}
    td.padding2 {padding: 0.5cm 2.5cm}

</style>


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
    $strSQL = "SELECT * FROM files_student";
    $objQuery = mysqli_query($link, $strSQL) or die ("Error Query [" . $strSQL . "]");

    $strSQL_1 = "SELECT * FROM files_teacher";
    $objQuery_1 = mysqli_query($link, $strSQL_1) or die ("Error Query [" . $strSQL_1 . "]");

    $strSQL_2 = "SELECT * FROM files_company";
    $objQuery_2 = mysqli_query($link, $strSQL_2) or die ("Error Query [" . $strSQL_2 . "]");
    ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-default">
                    <h4 class="page-header">
                        ดาวน์โหลดไฟล์เอกสาร
                    </h4>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                                    <table >
                                        <tr>
                                            <th >สำหรับนักศึกษา</th>
                                        </tr>

                                        <tr>
                                            <?php
                                            while ($objResult = mysqli_fetch_array($objQuery)) {
                                                ?>
                                                <td class="padding1"> <a href="../myfile/student/<?php echo $objResult["filestudent"]; ?>"
                                                        download class="jj" >
                                                        <?= $objResult["filestudent"]; ?></a>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>

                                        </table>
                                <br><br>
                                <table>
                                    <tr>
                                        <th>อาจารย์</th>
                                    </tr>
                                        <tr>
                                        <?php while ($objResult_1 = mysqli_fetch_array($objQuery_1)) { ?>
                                            <td class="padding1"><a href="../myfile/techer/<?php echo $objResult_1["filesteacher"]; ?>"
                                                   download class="jj"><?= $objResult_1["filesteacher"]; ?></a></td>
                                            <?php
                                        }
                                        ?>
                                            </tr>
                                    </table>
                                <br><br>
                                <table>
                                    <tr>
                                        <th>บริษัท</th>
                                    </tr>
                                    <tr>
                                        <?php while ($objResult_2 = mysqli_fetch_array($objQuery_2)) { ?>
                                            <td class="padding1"><a href="../myfile/company/<?= $objResult_2["filescompany"]; ?>"
                                                   download class="jj">
                                                    <?= $objResult_2["filescompany"]; ?></a></td>
                                            <?php
                                        }
                                        ?>
                                        </tr>

                                    </table>
                                    <?php
                                    mysqli_close($link);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- /.table-responsive -->

    </div>
    <!-- /.panel -->
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

<script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>
