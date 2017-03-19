<?php session_start();
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
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];



        $sql = "SELECT * FROM register_work 
                      INNER JOIN company ON register_work.cid = company.cid 
                      INNER JOIN student ON register_work.sid = student.sid 
                      AND register_work.cid = $cid ";
        $query = mysqli_query($link, $sql);


        $sql_sum = "SELECT SUM(hour_amount) AS clock FROM execute  WHERE cid = $cid";
        $query_sum = mysqli_query($link,$sql_sum);
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
            <a class="navbar-brand" href="index.php"><font color="black"> <i class="fa fa-home"></i>หน้าแรก </font> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li><?= $status ?></li>
            <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?= $c_name ?> <i
                        class="fa fa-user"></i> <b class="caret"></b> </a>
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
                        <a href="#"><i class="fa fa-book"></i> คู่มือ สถานประกอบการ <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="receive_stu.php">ขั้นตอนการรับนักศึกษา</a></li>
                            <li><a href="manual_company.php">คู่มือสถานประกอบการ</a></li>
                            <li><a href="visit_comp.php">วัตถุประสงค์ของการนิเทศงาน</a></li>
                            <li><a href="evaluation_comp.php">การประเมินผลนักศึกษา</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-bullhorn"></i> ประกาศรับสมัครนักศึกษาฝึกงาน <i class="fa arrow"></i>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="work_post.php">ประกาศรับฝึกงาน</a></li>
                            <li><a href="work_post_edit.php">รายการโพสย้อนหลัง</a></li>
                        </ul>
                    </li>

                    <li><a href="#">นักศึกษาฝึกงาน <span class="fa arrow"></span> </a>
                        <ul class="nav nav-second-level">
                            <li><a href="name_student_join.php">รายชื่อนักศึกษาที่สมัครงานเข้ามา</a></li>
                            <li><a href="now_student_work.php">รายชื่อนักศึกษาที่กำลังฝึกงาน</a></li>

                            <li><a href="last_work.php">รายชื่อนักศึกษาที่ผ่านการฝึกงาน</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-list-alt  "></i> ตรวจสอบความก้าวหน้า</a>
                        <ul class="nav nav-second-level">
                            <li><a href="list_note_company.php">ดูบันทึกรายวัน</a> </li>
                            <li><a href="list_conclude_company.php">ดูบันทึกรายสัปดาห์</a></li>
                        </ul>
                    </li>
                    <li><a href="evaluation_for_company_1.php">ประเมินนักศึกษา</a></li>
                </ul>
            </div>
    </nav>
</div>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 5%">
            <div class="panel panel-yellow">
                <div class="panel-body">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>รูปประจำตัว</th>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อนักศึกษา</th>
                                <th class="right"></th>
                            </tr>
                            <?php  for ($i = 1; $result = mysqli_fetch_array($query); $i++) { ?>

                                <?php if ($result['status_work'] == '3') { ?>

                                    <tr>
                                        <td><img src="../uploads/student/<?= $result['filetoload'] ?>" width="50px"
                                                 height="50px"/></td>
                                        <td><?= $result['number_id'] ?></td>
                                        <td><?= $result['fn_st'] ?>  <?= $result['ln_st'] ?></td>
                                        <td><a href="#"
                                               class="btn btn-danger" disabled="disable">ประเมินแล้ว</a></td>
                                    </tr>
                                <?php } elseif ($result['status_work'] == '2') { ?>
                                    <tr>
                                        <td><img src="../uploads/student/<?= $result['filetoload'] ?>" width="50px"
                                                 height="50px"/></td>
                                        <td><?= $result['number_id'] ?></td>
                                        <td><?= $result['fn_st'] ?>  <?= $result['ln_st'] ?></td>
                                        <?php if ($row_sum['clock'] >= '100' ){ ?>
                                        <td><a href="evaluation_for_company.php?sid=<?= $result['sid'] ?>"
                                               class="btn btn-success">ประเมิน</a></td>
                                        <?php }else{ ?>
                                            <td><a href="#"
                                                   class="btn btn-danger" disabled="disable">ประเมิน</a></td>
                                       <?php } ?>
                                    </tr>
                                <?php }
                            }?>
                        </table>
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