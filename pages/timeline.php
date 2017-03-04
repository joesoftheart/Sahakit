<?php
session_start();
include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');
?>


<head xmlns="http://www.w3.org/1999/html">
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
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <?php
    $sid = $_SESSION['sid'];
    $status1 = $_SESSION['status'];
        $perpage = 4;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start = ($page - 1) * $perpage;

        $sql = "SELECT * FROM post_company
                INNER JOIN company
                 ON post_company.cid=company.cid limit {$start} , {$perpage} ";
        $query = mysqli_query($link, $sql);


        $sql3 = "SELECT * FROM student WHERE sid = $sid";
        $query3 = mysqli_query($link, $sql3);
        $row3 = mysqli_fetch_array($query3);

    $status = $row3['status'];
    ?>
</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
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
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <?php
            if (!isset($_SESSION['login'])) { ?>
                <li><a href="register.php"><i class="fa fa-user-plus"></i> ลงทะเบียนบริษัทใหม่</a></li>
                <li><a href="login.html"><i class="fa fa-sign-in"> </i> เข้าสู่ระบบ</a></li>
            <?php } else { ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i
                        class="fa fa-user fa-md"></i> <?= $row3['fn_st'] ?> <b class="caret"></b> </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="../pages/profile_student.php"><i class="glyphicon glyphicon-user"></i> Profiles</a></li>
                    <li><a href="editprofile_student.php"><i class="glyphicon glyphicon-edit"></i> แก้ไขโปรไฟล์</a></li>
                    <li class="divider"></li>
                    <li><a href="../php/logout.php"><i class="glyphicon glyphicon-off"></i> ลงชื่อออก</a>
                    </li>
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
        <br>
        <?php while ($row = mysqli_fetch_array($query)) { ?>

            <div class="col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading right"><?= $row['c_name'] ?> :
                        <small><i class="text-muted">ลงประกาศ ณ <?= $row['dmt'] ?> </i></small>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-2" style="height: auto">
                            <i class="fa fa-briefcase fa-5x" aria-hidden="true"></i>
                        </div>
                        <div class="caption">
                            <h5 class="col-md-offset-2"><strong>รายละเอียดงาน : </strong><?= $row['detail'] ?></h5>
                            <h5 class="col-md-offset-2"><strong>ตำแหน่ง :</strong> <?= $row['rank'] ?></h5>
                            <h6 class="col-md-offset-2"><img src="../img/png4/placeholder-3.png" width="15px"
                                                             height="15px"><strong>สถานที่ทำงาน
                                    :</strong> <?= $row['map_work'] ?></h6>
                            <h6 class="col-md-offset-2"><img src="../img/png6/price-tag-4.png" width="15px"
                                                             height="15px"><strong>สวัสดิการ</strong> <?= $row['gold'] ?>
                            </h6>
                            <div class="pull-right">
                                <?php
                                if (!isset($_SESSION['login'])) { ?>
                                    <font style="color: red"><small> **หมายเหต***ท่านที่ต้องการดูรายละเอียดหรือสมัครงานกรุณาล็อกอินด้วยครับ** </small></font>
                                <?php } if($status1 == 'นักศึกษา'){ ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#myModall<?= $row['idpost'] ?>">สมัครฝึกงาน
                                    </button>
                              <?php  }else{

                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="myModall<?= $row['idpost'] ?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../php/getform_work.php" method="post" enctype="multipart/form-data">
                                        <div class=" text-center">
                                            <h1><?= $row['company_name'] ?></h1>
                                            <input type="hidden" name="cid" value="<?= $row['cid'] ?>">
                                            <input type="hidden" name="sid" value="<?= $row3['sid'] ?>">
                                            <input type="hidden" name="rank" value="<?= $row['rank'] ?>">
                                            <input type="hidden" name="status_work" value="0">
                                            <input type="hidden" name="status_student" value="0">
                                            <input type="hidden" name="dmt"
                                                   value="<?php echo thaidate('วันที่ j เดือน F  Y เวลา H:i:s'); ?> ">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <label>รายละเอียดงาน</label>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['detail'] ?> </p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <label>สถานที่ปฏิบัติงาน</label>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['map_work'] ?></p>
                                                </div>
                                                <div class="col-md-5 col-md-offset-1">
                                                    <label>รายละเอียดงาน</label>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['detail'] ?> </p>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-5 col-md-offset-1">
                                                    <label>อัตรา</label>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['num_stu'] ?></p>
                                                </div>
                                                <div class="col-md-5 col-md-offset-1">
                                                    <label>สวัสดิการ</label> <br>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['gold'] ?></p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <label>ตำแหน่ง</label>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"><?= $row['rank'] ?></p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <label>คุณสมบัติผู้สมัคร</label>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['property'] ?></p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <label>วิธีการสมัคร</label>
                                                    <p><img src="../img/checked.png" width="15px" height="15px">เพิ่มมมมมมมมมมมมมม
                                                    </p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <label>ติดต่อ</label>
                                                    <p><img src="../img/checked.png" width="15px" height="15px">เพิ่มมมมมมมมมมมมมมมมมมม
                                                    </p>
                                                </div>
                                            </div>

                                            <br><br><br>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-5">
                                                    <input type="submit" name="submit" value="ยืนยันการสมัคร"
                                                           class="btn btn-primary ">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }

        $sql2 = "SELECT * FROM post_company
                INNER JOIN company
                 ON post_company.cid=company.cid";
        $query2 = mysqli_query($link, $sql2);
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
        ?>
        <div class="col-md-offset-9">
            <ul class="pagination col-md-">
                <li>
                    <a href="timeline.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                    <li><a href="timeline.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <li>
                    <a href="timeline.php?page=<?php echo $total_page; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
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




