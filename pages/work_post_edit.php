<?php
session_start();

include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');


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
    $status = $_SESSION['status'];
    $c_name = $_SESSION['c_name'];
    $cid = $_SESSION['cid'];

    $sql = "SELECT * FROM post_company WHERE cid = $cid";
    $query = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($query);

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
                                <li><a href="list_note_company.php">ดูประวัติสมุดบันทึกประจำวัน</a> </li>
                                <li><a href="list_conclude_company.php">ดูสมุดบันทึกการฝึกงาน</a> </li>
                            </ul>
                        </li>
                        <li><a href="evaluation_for_company_1.php">ประเมินนักศึกษา</a> </li>

                </ul>
            </div>
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="panel panel-info" style="margin-top: 5%">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table table-responsive">
                                <table class="table table table-hover ">
                                    <thead>
                                    <tr>
                                        <th class="text-center">จำนวนโพส</th>
                                        <th class="text-center">รายละเอียด</th>
                                        <th class="text-center">เวลาที่โพส</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $mysql = "SELECT*FROM post_company post INNER JOIN company com ON post.cid = com.cid WHERE post.cid=$cid";
                                    $query_detail = mysqli_query($link, $mysql) or die($mysql);


                                    ?>
                                    <?php for ($i = 1; $row_detail = mysqli_fetch_array($query_detail); $i++) { ?>
                                        <tbody>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td class="text-center"><?= $row_detail['detail_work'] ?></td>
                                            <td class="text-center"><?= $row_detail['dmt'] ?></td>
                                            <td class="text-center">
                                                <a href="#" data-toggle="modal"
                                                   data-target=".bs-example-modal-lg<?= $row_detail['idpost'] ?>">
                                                    <img src="../img/png/search.png" width="30px" heighi="30px"> </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <div class="modal fade bs-example-modal-lg<?= $row_detail['idpost'] ?>"
                                             tabindex="-1" role="dialog"
                                             aria-labelledby="myLargeModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form action="../php/get_work_post_edit.php"
                                                                      method="post"
                                                                      enctype="multipart/form-data">
                                                                    <input type="hidden" name="idpost"
                                                                           value="<?= $row_detail['idpost'] ?>">
                                                                    <input type="hidden" name="cid"
                                                                           value="<?= $cid ?> ">
                                                                    <div class="col-md-8 col-md-offset-2">
                                                                        <label>รายละเอียดบริษัท</label>
                                                                        <input type="text" name="detail_work"
                                                                               class="form-control" required="required"
                                                                               value="<?= $row_detail['detail_work'] ?>">
                                                                    </div>
                                                                    <br>

                                                                    <div class="col-lg-8 col-md-offset-2">
                                                                        <label>เว็บไซต์</label>
                                                                        <input type="text" name="web"
                                                                               class="form-control"
                                                                               required="required"
                                                                               value=" <?= $row_detail['web'] ?>">
                                                                    </div>

                                                                    <br>

                                                                    <div class="col-lg-8 col-md-offset-2">
                                                                        <label>ต้องการนักศึกษาตำแหน่ง</label>
                                                                        <input type="text" name="rank"
                                                                               class="form-control"
                                                                               value="<?= $row_detail['rank'] ?>">
                                                                    </div>

                                                                    <br>

                                                                    <div class="col-lg-8 col-md-offset-2">
                                                                        <label>ต้องการนักศึกษา</label>
                                                                        <select name="num_stu" class="form-control">
                                                                            <option
                                                                                value="1" <?php if ($row_detail['num_stu'] == 1) { ?> selected="selected" <?php } ?>>
                                                                                1 อัตรา
                                                                            </option>
                                                                            <option
                                                                                value="2" <?php if ($row_detail['num_stu'] == 2) { ?> selected="selected" <?php } ?>>
                                                                                2 อัตรา
                                                                            </option>
                                                                            <option
                                                                                value="3" <?php if ($row_detail['num_stu'] == 3) { ?> selected="selected" <?php } ?>>
                                                                                3 อัตรา
                                                                            </option>
                                                                            <option
                                                                                value="4" <?php if ($row_detail['num_stu'] == 4) { ?> selected="selected" <?php } ?>>
                                                                                4 อัตรา
                                                                            </option>
                                                                            <option
                                                                                value="5" <?php if ($row_detail['num_stu'] == 5) { ?> selected="selected" <?php } ?>>
                                                                                5 อัตรา
                                                                            </option>
                                                                            <option
                                                                                value="6" <?php if ($row_detail['num_stu'] == 6) { ?> selected="selected" <?php } ?>>
                                                                                6 อัตรา
                                                                            </option>
                                                                            <option
                                                                                value="7" <?php if ($row_detail['num_stu'] == 7) { ?> selected="selected" <?php } ?>>
                                                                                7 อัตรา
                                                                            </option>
                                                                            <option
                                                                                value="8" <?php if ($row_detail['num_stu'] == 8) { ?> selected="selected" <?php } ?>>
                                                                                8 อัตรา
                                                                            </option>
                                                                            <option
                                                                                value="9" <?php if ($row_detail['num_stu'] == 9) { ?> selected="selected" <?php } ?>>
                                                                                9 อัตรา
                                                                            </option>
                                                                            <option
                                                                                value="10" <?php if ($row_detail['num_stu'] == 10) { ?> selected="selected" <?php } ?>>
                                                                                10 อัตรา
                                                                            </option>
                                                                            <option
                                                                                value="ต้องการนักศึกษาจำนวนมาก" <?php if ($row_detail['num_stu'] == "ต้องการนักศึกษาจำนวนมาก") { ?> selected="selected" <?php } ?>>
                                                                                ต้องการนักศึกษาจำนวนมาก
                                                                            </option>
                                                                        </select>
                                                                    </div>

                                                                    <br>

                                                                    <div class="col-lg-8 col-md-offset-2">
                                                                        <label>รายละเอียดงาน</label>
                                                                        <textarea name="detail" class="form-control"
                                                                                  rows="3"
                                                                                  required="required"><?= $row_detail['detail'] ?></textarea>
                                                                    </div>

                                                                    <br>

                                                                    <div class="col-lg-8 col-md-offset-2">
                                                                        <label>คุณสมบัติที่ต้องการ</label>
                                                                        <textarea name="property" class="form-control"
                                                                                  rows="3"
                                                                                  required="required"><?= $row_detail['property'] ?></textarea>
                                                                    </div>

                                                                    <br>

                                                                    <div class="col-lg-8 col-md-offset-2">
                                                                        <label>สถานที่ปฏิบัติงาน</label>
                                                                        <textarea name="map_work" class="form-control"
                                                                                  rows="3"
                                                                                  required="required"><?= $row_detail['map_work'] ?></textarea>
                                                                    </div>

                                                                    <br>

                                                                    <div class="col-lg-8 col-md-offset-2">
                                                                        <label>ข้อเสนอพิเศษ อย่างเช่น
                                                                            เบี้ยเลี้ยง,ค่าเดินทาง</label>
                                                                        <input type="text" name="gold"
                                                                               class="form-control"
                                                                               value="<?= $row_detail['gold'] ?>">
                                                                    </div>

                                                                    <br>

                                                                    <div class="col-lg-8 col-md-offset-2">
                                                                        <p><?= $row_detail['dmt'] ?></p>
                                                                        <input type="hidden" name="dmt"
                                                                               value="<?php echo thaidate('แก้ไขล่าสุด วัน l ที่ j เดือน F พ.ศ. Y เวลา H:i:s'); ?> ">
                                                                    </div>
                                                                    <div class="col-md-8 col-md-offset-10">
                                                                        <button type="submit" class="btn btn-warning">
                                                                            แก้ไข
                                                                        </button>
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


    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>