<?php
session_start();
include '../php/config.php';
?>
<!DOCTYPE html>
<html>

<head>

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

        $sql_student0 = "SELECT * FROM company INNER JOIN register_work ON register_work.cid = $cid 
                                                 INNER JOIN student ON register_work.sid = student.sid
                                                 INNER JOIN post_company ON post_company.cid = $cid
                                                 WHERE register_work.status_work = 0";
        $query_student0= mysqli_query($link, $sql_student0);

        $sql_student1 = "SELECT * FROM company INNER JOIN register_work ON register_work.cid = $cid 
                                                 INNER JOIN student ON register_work.sid = student.sid
                                                 INNER JOIN post_company ON post_company.cid = $cid
                                                 WHERE register_work.status_work = 1";
        $query_student1= mysqli_query($link, $sql_student1);




        $sql_status = "SELECT * FROM company WHERE c_status_join = 1";
        $query_status = mysqli_query($link,$sql_status);
        $result_status = mysqli_fetch_array($query_status);

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
                        class="fa fa-user"></i>  <b class="caret"></b> </a>
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
                    <?php $check = $result_status['c_status_join']; if ($check == 1) {?>
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
                        <li><a href="evaluation_for_company_1.php">ประเมินนักศึกษา</a> </li>
                    <?php }else{ ?>

                    <?php } ?>
                </ul>
            </div>
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" >
                <div class="panel panel-red" style="margin-top: 10%">
                    <div class="panel-heading">
                        รายชื่อ " นักศึกษา " ที่สมัครฝึกงาน
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table table-responsive">
                                    <table class="table table table-hover table-bordered ">
                                        <tr>
                                            <th class="text-center">ลำดับ</th>
                                            <th class="text-center">ชื่อนักศึกษา</th>
                                            <th class="text-center">ตำแหน่ง</th>
                                            <th class="text-center">ข้อมูลส่วนตัว</th>
                                            <th class="text-center">ดู เรซูเม่</th>
                                            <th class="text-center">สมัครมาวันที่</th>
                                            <th class="text-center">ยอมรับ</th>
                                        </tr>
                                        <?php  for ($i=1; $row = mysqli_fetch_array($query_student0); $i++) { ?>
                                            <tr>
                                                <td class="text-center"><?= $i; ?></td>
                                                <td class="text-center"><?= $row['fn_st'] ?> <?= $row['ln_st'] ?></td>
                                                <td class="text-center"><?= $row['rank'] ?></td>
                                                <td class="text-center"><a href="#" data-toggle="modal"
                                                       data-target="#myModal1<?= $row['sid'] ?>">ดูประวัติส่วนตัว</a>
                                                </td>
                                                <td class="text-center"> <a href="../myfile/resume/student/<?= $row["resume_upload"]; ?>" download  >
                                                        <?= $row["resume_upload"]; ?></a>
                                                    </td>
                                                <td class="text-center"><?= $row['dmt'] ?></td>
                                                <td class="text-center">
                                                    <?php if ($row['status_work'] == 0) {?>
                                                    <button class="btn btn-outline btn-success"
                                                            onclick="update('<?= $row['rwid'] ?>')">อนุมัติ</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>



                                            <div id="myModal1<?= $row['sid'] ?>" class="modal fade" role="dialog">
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
                                                                            <h1><?= $row['fn_st'] ?> <?= $row['ln_st'] ?></h1>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>รหัสนักศึกษา</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"> <?= $row['number_id'] ?>
                                                                                    </p>
                                                                                </div>



                                                                                <div class="col-md-5 col-md-offset-1">
                                                                                    <label>คณะ</label>
                                                                                    <p>วิทยาศาสตร์และเทคโนโลยี</p>
                                                                                </div>
                                                                                <div class="col-md-5 col-md-offset-1">
                                                                                    <label>สาขา</label>
                                                                                    <p>วิทยาการคอมพิวเตอร์ </p>
                                                                                </div>


                                                                                <div class="col-md-5 col-md-offset-1">
                                                                                    <label>ที่อยู่ </label>
                                                                                    <p><?= $row['house_no'] ?> <?= $row['village_no'] ?> <?= $row['province'] ?> </p>
                                                                                </div>


                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>ตำแหน่ง</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"><?= $row['rank'] ?>
                                                                                    </p>
                                                                                </div>

                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>คุณสมบัติผู้สมัคร</label>
                                                                                    <p><img src="../img/checked.png" width="15px"
                                                                                            height="15px"> <?= $row['property'] ?></p>
                                                                                </div>


                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>วิธีการสมัคร</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"> </p>
                                                                                </div>



                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>ติดต่อ</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"> <?= $row['c_tela'] ?> </p>
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



                                            <?php }  ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6" style="margin-top: 5%">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        รายชื่อ " นักศึกษา " รอการอนุมัติ
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table table-responsive">
                                    <table class="table table-hover  table-bordered ">
                                        <tr>
                                            <th width="9%">ลำดับ</th>
                                            <th width="18%">ชื่อนักศึกษา</th>
                                            <th width="15%">ตำแหน่ง</th>
                                            <th width="15%">ข้อมูลส่วนตัว</th>
                                            <th width="15%">สถานะ</th>

                                        </tr>
                                        <?php  for ($j=1; $row1 = mysqli_fetch_array($query_student1); $j++){ ?>
                                                <tr id="data">
                                                    <td> <?= $j ?></td>
                                                    <td><?= $row1['fn_st'] ?> <?= $row1['ln_st'] ?></td>
                                                    <td><?= $row1['rank'] ?></td>
                                                    <td><a href="#" data-toggle="modal"
                                                           data-target="#myModal2<?= $row1['sid'] ?>">ดูประวัติส่วนตัว</a>
                                                    </td>
                                                    <td><font color="#b8860b">รออนุมัติ</font> </td>
                                                </tr>



                                            <div id="myModal2<?= $row1['sid'] ?>" class="modal fade" role="dialog">
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
                                                                            <h1><?= $row1['fn_st'] ?> <?= $row1['ln_st'] ?></h1>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>รหัสนักศึกษา</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"> <?= $row1['number_id'] ?>
                                                                                    </p>
                                                                                </div>



                                                                                <div class="col-md-5 col-md-offset-1">
                                                                                    <label>คณะ</label>
                                                                                    <p>วิทยาศาสตร์และเทคโนโลยี</p>
                                                                                </div>
                                                                                <div class="col-md-5 col-md-offset-1">
                                                                                    <label>สาขา</label>
                                                                                    <p>วิทยาการคอมพิวเตอร์ </p>
                                                                                </div>


                                                                                <div class="col-md-5 col-md-offset-1">
                                                                                    <label>ที่อยู่ </label>
                                                                                    <p><?= $row1['house_no'] ?> <?= $row1['village_no'] ?> <?= $row1['province'] ?> </p>
                                                                                </div>


                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>ตำแหน่ง</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"><?= $row1['rank'] ?>
                                                                                    </p>
                                                                                </div>

                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>คุณสมบัติผู้สมัคร</label>
                                                                                    <p><img src="../img/checked.png" width="15px"
                                                                                            height="15px"> <?= $row1['property'] ?></p>
                                                                                </div>


                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>วิธีการสมัคร</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"> </p>
                                                                                </div>



                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>ติดต่อ</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"> <?= $row1['c_tela'] ?> </p>
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
                                            <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
        </div>





<!-- jQuery -->
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
            url: "../php/update_company.php",
            data: "id=" + id,
            success: function (data) {
                window.location.reload();
            }
        });
        return false;
    }
</script>
</body>

</html>