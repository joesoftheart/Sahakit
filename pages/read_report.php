<?php
session_start();
include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');
?>


<html>
<head>

    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sahakit</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <?PHP
$tid = $_SESSION['tid'];

    $SQL = "SELECT * FROM teacher WHERE tid = $tid";
    $query = mysqli_query($link, $SQL);
    $row = mysqli_fetch_array($query);

$sql ="SELECT * FROM student WHERE tid = $tid";
    $objquery = mysqli_query($link,$sql);
    $result = mysqli_fetch_array($objquery);

    echo $result['sid'].$result['tid'];

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
            <a class="navbar-brand" href="index.php"> <i class="fa fa-home"></i> เมนูหลัก </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
                        class="fa fa-user"></i> <?= $row['te_fn'] ?> <b class="caret"></b> </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="../pages/profile_teacher.php"><i class="glyphicon glyphicon-user"></i>โปรไฟล์</a></li>
                    <li><a href="editprofile_teacher.php"><i class="glyphicon glyphicon-edit"></i> แก้ไขโปรไฟล์</a></li>
                    <li class="divider"></li>
                    <li><a href="../php/logout.php"><i class="glyphicon glyphicon-off"></i> ลงชื่อออก</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li><a href="#"><img src="../img/png/user-6.png" width="25px" height="25px"> ข้อมูลนักศึกษา <span
                                class="fa arrow"></span></a></li>
                    <ul class="nav nav-second-level">
                        <li><a href="data_student.php">นักศึกษาในการดูแล</a></li>
                        <li><a href="flot.html">นักศึกษาสหกิจ</a></li>
                        <li><a href="flot.html">สรุปคะแนนการปฏิบัติงาน</a></li>
                    </ul>
                    <li><a href="#"><img src="../img/png/file.png" width="25px" height="25px">
                            การสมัครงานของนักศึกษา</a></li>
                    <li><a href="#">คณาอาจารย์ <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="flot.html">คู่มือสหกิจศึกษา</a></li>
                            <li><a href="flot.html">แนวปฏิบัติสหกิจศึกษา</a></li>
                            <li><a href="flot.html">ผลการประเมินนักศึกษา</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        <?= $row['te_fn'] ?> <?= $row['te_ln'] ?>
                    </h1>
                </div>
                <div class="panel-body">
                แบบประเมินผลการนำเสนอผลสำเร็จของโครงการสหกิจศึกษา
                    </div>
            </div>

        </div>
    </div>


    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>