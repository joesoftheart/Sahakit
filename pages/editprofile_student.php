<?php
session_start();
include '../php/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../img/favicon.ico">
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
        $sid = $_SESSION["sid"];
        $fn_st = $_SESSION['fn_st'];
        $ln_st = $_SESSION['ln_st'];
        $number_id = $_SESSION['number_id'];

#วนลูป
        $sql = "SELECT * FROM student INNER JOIN register_work ON register_work.sid = $sid
                                        INNER JOIN company ON register_work.cid = company.cid";
        $query = mysqli_query($link, $sql) or die(mysqli_error($sql));

#โชว์ ค่าต่างๆ
        $sql1 = "SELECT * FROM student INNER JOIN register_work ON register_work.sid = $sid
                                        INNER JOIN company ON register_work.cid = company.cid";
        $objquery = mysqli_query($link, $sql1) or die(mysqli_error($sql1));
        $result = mysqli_fetch_array($objquery);

        $tid = $result['tid'];
        $status_work = $result['status_work'];

        $sql3 = "SELECT * FROM student,teacher
                        WHERE student.tid = teacher.tid";
        $query2 = mysqli_query($link, $sql3);
        $row_tea = mysqli_fetch_array($query2);

        $sql_sum = "SELECT SUM(hour_amount) AS clock FROM execute  WHERE uid = $sid";
        $query_sum = mysqli_query($link, $sql_sum);
        $row_sum = mysqli_fetch_array($query_sum);

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
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li><?= $status ?> </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $fn_st ?>  <?= $ln_st ?> <i
                        class="fa fa-user"></i> <b class="caret"></b> </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="profile_student.php"><i class="glyphicon glyphicon-user"></i> Profiles</a></li>
                    <li><a href="editprofile_student.php"><i class="glyphicon glyphicon-edit"></i> เปลี่ยนรหัสผ่าน</a>
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
                        <a href="#">นักศึกษา <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="manual_student.php">คู่มือสหกิจศึกษา</a></li>
                            <li><a href="#">แนวปฏิบัติสหกิจศึกษา <i class="fa arrow"></i> </a>
                                <ul class="nav nav-third-level">
                                    <li><a href="property_stu.php">คุณสมบัตินักศึกษา</a></li>
                                    <li><a href="visit_stu.php">ขั้นตอนการนิเทศงาน</a></li>
                                    <li><a href="seminar.php">การสัมมนาวิชาการ</a></li>
                                    <li><a href="seminar.php">การสัมมนาวิชาการ</a></li>
                                    <li><a href="evaluation_ca.php">การประเมินผล</a></li>

                                </ul>
                            </li>
                            <li><a href="tecnic_student.php">เทคนิคการเลือกสถานประกอบการ</a></li>
                        </ul>
                    </li>

                    <?php if ($row_tea['tid'] == 0) { ?>
                        111111
                    <?php } elseif ($result['tid'] != null && $result['status_work'] == 2) { ?>

                    <?php } elseif ($result['status_work'] == 3) { ?>

                    <?php } else { ?>
                        <li class="active"><a href="timeline.php"><i class="fa fa-search "></i>ค้นหาบริษัทฝึกงาน </a>
                        </li>
                    <?php } ?>

                    <?php if ($result['status_work'] == 2) { ?>
                        <li><a href="#"> ฝึกงาน <i class="fa arrow"></i></a>
                            <ul class="nav nav-second-level">
                                <li><a href="add_conclude_form.php">บันทึกการฝึกงานประจำวัน</a></li>
                                <li><a href="list_conclude.php">ดูประวัติบันทึกประจำวัน </a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($result['status_work'] == 3) { ?>
                        <li><a href="#"><i class="fa fa-list-ol  "></i> เกรดฝึกงาน / คะแนน</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-wrapper">
        <form action="../php/getedit_student.php" method="post" enctype="multipart/form-data">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-6 col-md-offset-2" style="margin-top: 5%">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">
                                <h4>แก้ไขรหัสผ่าน</h4>
                            </div>
                            <div class="panel-body">

                                <input type="hidden" name="username" value="<?= $username ?>">

                                    <div class="col-md-12" style="margin-top: 1%">
                                        <label>พาสเวิร์ดเก่า</label>
                                        <input type="text" name="oldpasswd" class="form-control">
                                    </div>


                                    <div class="col-md-12 " style="margin-top: 1%">
                                        <label>พาสเวิร์ดใหม่</label>
                                        <input type="text" name="passwd" class="form-control" maxlength="18"
                                               minlength="8">
                                    </div>


                                    <div class="col-md-12" style="margin-top: 1%">
                                        <label>ยืนยันพาสเวิร์ด</label>
                                        <input type="text" name="repasswd" class="form-control" maxlength="18"
                                               minlength="8">
                                    </div>


                                <div class="row">
                                    <div class="col-md-6 col-md-offset-9" style="margin-top: 3%">
                                        <button type="submit" class="btn btn-outline btn-primary"> ยืนยัน</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>
    </div>

</div>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>
<script>
    function update(id) {
        $.ajax({
            type: "POST",
            url: "../php/update_student.php",
            data: "id=" + id,
            success: function (data) {

                window.location.reload();

            }

        });
    }
</script>
</body>
</html>