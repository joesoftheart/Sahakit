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
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <?PHP


    $SQL = "SELECT * FROM teacher";
    $query = mysqli_query($link, $SQL);
    $row = mysqli_fetch_array($query);


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

                    <li><a href="#"><img src="../img/png/user-6.png" width="25px" height="25px"> ข้อมูลนักศึกษา <span class="fa arrow"></span></a> </li>
                    <ul class="nav nav-second-level">
                        <li><a href="data_student.php">นักศึกษาในการดูแล</a></li>
                        <li><a href="flot.html">นักศึกษาสหกิจ</a></li>
                        <li><a href="flot.html">สรุปคะแนนการปฏิบัติงาน</a></li>
                    </ul>
                    <li><a href="#"><img src="../img/png/file.png" width="25px" height="25px"> การสมัครงานของนักศึกษา</a> </li>
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
            </div>

            <?php
                             $tid_techer = $row['tid'];

                             $sql_2 = "SELECT * FROM student  WHERE student.tid = $tid_techer";
                             $query_2 = mysqli_query($link, $sql_2); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                test
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                       <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>ชื่อนักศึกษา</th>
                                                    <th>ดูความก้าวหน้า</th>
                                                    <th>ลบนักศึกษา</th>
                                                </tr>
                                                </thead>
                                                
                                    <?php  for ($i = 1; $row_2 = mysqli_fetch_array($query_2); $i++) { ?>
                                                    <tbody>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td><?= $row_2['fname_st'] ?> <?= $row_2['lname_st'] ?></td>
                                                        <!--<td><?/*= $row_2['company_name'] */?></td>
                                                        <td><?/*= $row_2['rank'] */?></td>
                                                        <td><?/*= $row_2['address'] */?></td>-->
                                                        <td><a href="#<?= $row_2['sid'] ?>"> <img
                                                                    src="../img/png2/notepad-8.png" width="30px"
                                                                    height="30px"></a></td>
                                                        <td><a href=""> <img src="../img/png/garbage-1.png" width="30px"
                                                                             height="30px"></a></td>
                                                    </tr>
                                                    </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer ">
                                <a href=""><img src="../img/png2/user-40.png" width="30px" height="30px"> เพิ่มนักศึกษา
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $sql_1 = "SELECT * FROM student WHERE tid =0 ";
                $query_1 = mysqli_query($link, $sql_1);

                ?>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                ตารางเพิ่มนักศึกษา ของอาจารย์ นิเทศก์
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-9">
                                </div>
                                <div class="col-lg-offset-3 ">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search..."  ; onkeyup="search_value(this.value)"  >
                                    <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            </span>
                                </div>
                                </div>

                               <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อนักศึกษา</th>
                                        <th>รหัสนักศึกษา</th>
                                        <th>status</th>
                                        <th>เพิ่ม</th>
                                    </tr>
</thead>

                                
                                        <?php
                                        for ($j=1; $row_1 = mysqli_fetch_array($query_1);$j++) { ?>
                                        <tr>
                                            <td> <?= $j; ?></td>
                                            <td><?= $row_1['fname_st'] ?> <?= $row_1['lname_st'] ?></td>
                                            <td><?php echo $row_1['idst'] ?></td>
                                            <td><?= $row_1['status'] ?></td>
                                            <td>
                                                <a href="add_techer_to_student.php?idtecher=<?= $row['tid'] ?>.<?= $row_1['sid'] ?>">
                                                    <img src="../img/png/add-1.png" width="30px" height="30px"></a></td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
 <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>
  <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>