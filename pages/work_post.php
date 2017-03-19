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
    $status = null;


    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];

        $sql3 = "SELECT * FROM company WHERE c_status_join = 1";
        $qquery = mysqli_query($link, $sql3);
        $result = mysqli_fetch_array($qquery);




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
                    <?php $check = $result['c_status_join']; if ($check == 1) {?>
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
    <div class="row">
        <div class="col-md-10 col-md-offset-1 " style="margin-top: 3%">
            <form action="../php/gteform_workpost.php" method="post" enctype="multipart/form-data">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        <h4>ประกาศรับสมัครงาน</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="hidden" name="cid" value="<?= $cid ?>">
                                <label>รายละเอียดบริษัท</label>
                                <input type="text" name="detail_work" class="form-control" required="required">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>เว็บไซต์</label>
                                <input type="text" name="web" class="form-control" required="required">
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-4 col-md-offset-2">
                                <label>ต้องการนักศึกษาตำแหน่ง</label>
                                <select name="rank" class="form-control" id="selectBox" onchange="changeFunc()">
                                    <option value="System Engineer">System Engineer</option>
                                    <option value="System Administrator">System Administrator</option>
                                    <option value="Network Engineer">Network Engineer</option>
                                    <option value="Network Administrator">Network Administrator</option>
                                    <option value="IT Administrator">IT Administrator</option>
                                    <option value="IT Security">IT Security</option>
                                    <option value="Network Security">Network Security</option>
                                    <option value="Internet Security Manager">Internet Security Manager</option>
                                    <option value="IT Network Infrastructure">IT Network Infrastructure</option>
                                    <option value="Network Operation">Network Operation</option>
                                    <option value="Internet Security Systems Engineer">Internet Security Systems Engineer</option>
                                    <option value="Linux Administrator">Linux Administrator</option>
                                    <option value="Programmer">Programmer</option>
                                    <option value="Systems Analyst">Systems Analyst</option>
                                    <option value="Business Analyst">Business Analyst</option>
                                    <option value="Senior System Analyst">Senior System Analyst</option>
                                    <option value="System Analyst AS/400">System Analyst AS/400</option>
                                    <option value="Other">Other</option>
                                </select>


                            </div>

                            <div class="col-md-2 other hide"><label>Other :</label><input name="rank2"  class="form-control" type="text" id="input_ot" /></div>






                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>ต้องการนักศึกษา</label>
                                <select name="num_stu" class="form-control" >
                                    <option value="1">1 อัตรา</option>
                                    <option value="2">2 อัตรา</option>
                                    <option value="3">3 อัตรา</option>
                                    <option value="4">4 อัตรา</option>
                                    <option value="5">5 อัตรา</option>
                                    <option value="6">6 อัตรา</option>
                                    <option value="7">7 อัตรา</option>
                                    <option value="8">8 อัตรา</option>
                                    <option value="9">9 อัตรา</option>
                                    <option value="10">10 อัตรา</option>
                                    <option value="ต้องการนักศึกษาจำนวนมาก">ต้องการนักศึกษาจำนวนมาก</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>รายละเอียดงาน</label>
                                <textarea name="detail" class="form-control" rows="3" required="required"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>คุณสมบัติที่ต้องการ</label>
                                <textarea name="property" class="form-control" rows="3" required="required"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>สถานที่ปฏิบัติงาน</label>
                                <textarea name="map_work" class="form-control" rows="3" required="required"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>ข้อเสนอพิเศษ อย่างเช่น เบี้ยเลี้ยง,ค่าเดินทาง</label>
                                <input type="text" name="gold" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <p><?php echo thaidate('วัน l ที่ j เดือน F พ.ศ. Y เวลา H:i:s'); ?></p>
                                <input type="hidden" name="dmt" value="<?php echo thaidate('วัน l ที่ j เดือน F พ.ศ. Y เวลา H:i:s'); ?> ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2" style="margin-top: 3%">
                                <button type="submit"  class="btn  btn-info pull-right ">
                                      <strong>ประกาศ</strong> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

    <script>
        function changeFunc() {
            var selectBox = document.getElementById("selectBox");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            if (selectedValue.toString() == "Other") {
                alert(selectedValue)
                $('.other').removeClass('hide');

            }
        }
    </script>
</body>
</html>