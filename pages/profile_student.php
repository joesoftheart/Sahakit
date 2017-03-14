<?php
session_start();
include '../php/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../img/favicon.ico" >
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
        $sid    = $_SESSION["sid"];
        $fn_st  = $_SESSION['fn_st'];
        $ln_st  = $_SESSION['ln_st'];
        $number_id   = $_SESSION['number_id'];


        $sql    = "SELECT * FROM register_work,company
                          WHERE register_work.cid = company.cid AND register_work.sid = $sid";
        $query  = mysqli_query($link, $sql) or die(mysqli_error($sql));


        $sql1   = "SELECT * FROM register_work,company,student
                          WHERE register_work.cid = company.cid AND register_work.sid = student.sid";
        $objquery = mysqli_query($link,$sql1) or die(mysqli_error($sql1));
        $result = mysqli_fetch_array($objquery);

        $tid    = $result['tid'];
        $status_work = $result['status_work'];
        $sql2   = "SELECT * FROM register_work WHERE status_work = 2 AND sid = $sid";
        $Query  = mysqli_query($link,$sql2);
        $num    = mysqli_num_rows($Query);

        $sql3 = "SELECT * FROM student,teacher
                        WHERE student.tid = teacher.tid";
        $query2 = mysqli_query($link,$sql3);
        $Result = mysqli_fetch_array($query2);

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

                    <?php if ($Result['tid'] == 0 ){ ?>

                        <?php }else{ ?>
                        <li class="active"><a href="timeline.php"><i class="fa fa-search "></i>ค้นหาบริษัทฝึกงาน </a></li>
                   <?php } ?>

                    <?php  if ($result['status_work'] == 2) { ?>
                        <li><a href="#"> ฝึกงาน <i class="fa arrow"></i></a>
                            <ul class="nav nav-second-level">

                                <li><a href="add_conclude_form.php">บันทึกการฝึกงานประจำวัน</a></li>
                                <li><a href="list_conclude.php">ดูประวัติบันทึกประจำวัน </a> </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if ($result['status_work'] == 3) {?>
                        <li><a href="#"><i class="fa fa-list-ol  "></i> เกรดฝึกงาน / คะแนน</a></li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                  <font size="4">ข้อมูลพื้นฐาน :</font>   <font size="4"><?= $number_id ?>&nbsp;&nbsp;&nbsp; <?= $fn_st ?>&nbsp;&nbsp; <?= $ln_st ?></font>
                </div>
            </div>
        </div>


        <?php if ($tid == $tid && $num <=0){ ?>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        นักศึกษา : ตารางสถานะ
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-hover table-striped">
                                <tr>
                                    <th width="10%" class="text-center">ลำดับ</th>
                                    <th width="30%" class="text-center">ชื่อบริษัท</th>
                                    <th width="20%" class="text-center">ตำแหน่งงาน</th>
                                    <th width="20%" class="text-center">สถานะ</th>
                                    <th width="15%" class="text-center">ยอมรับ</th>
                                </tr>
                                    <?php for ($i=1; $row1=mysqli_fetch_array($query);$i++) {?>
                                        <tr class="text-center">
                                            <td> <?= $i; ?> </td>
                                            <td><?= $row1['c_name'] ?></td>
                                            <td><?= $row1['rank'] ?></td>
                                            <td><?php if ($row1['status_work']==0){?>
                                                <font color="red" >รออนุมัติ</font>
                                               <?php }else{ ?>
                                                   <font color="green">อนุมัติแล้ว</font>
                                               <?php }?>
                                            </td>

                                            <td>
                                                <?php if ($row1['status_work'] == 0){ ?>
                                                <button class="btn  btn-danger" disabled> ยืนยัน
                                                </button>
                                                <?php }elseif($row1['status_work'] == 1){?>
                                                    <button class="btn  btn-success" onclick="update(<?= $row1['rwid']; ?>)"> ยืนยัน </button>
                                                <?php }else{ ?>
                                                    <button class="btn btn-default" disabled="disabled">เรียบร้อยแล้วค่ะ</button>
                                               <?php }?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <caption>
                                    <p style="color: red">
                                        <small>**** หมายเหต นักศึกษาสามารถทำการยืนยัน
                                            บริษัทที่จะไปฝึกงานได้เพียงบริษัทเดียวเท่านั้น *****
                                        </small>
                                    </p>
                                </caption>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php  }else if($tid == $tid && $num > 0){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-green">

                    <div class="panel-body">
                        <div class="col-md-12 table-responsive">
                            <table class="table">
                <thead >
                <tr>
                    <th colspan="3"  class="text-center"><h4><?= $result['c_name'] ?></h4></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>ชื่อหัวหน้างาน</td>
                    <td><?= $result['leader'] ?></td>
                </tr>
                <tr>
                    <td>ตำแหน่งหัวหน้างาน</td>
                    <td><?= $result['rank_leader'] ?></td>
                </tr>
                <tr>
                    <td>ที่ตั้งบริษัท</td>
                    <td><?= $result['c_address'] ?></td>
                </tr>
                <tr>
                    <td>เบอร์โทรติดต่อ</td>
                    <td><?= $result['c_tela']?></td>
                </tr>
                <tr>
                    <td>ตำแหน่งที่ฝึก</td>
                    <td><?= $result['rank'] ?></td>
                </tr>
                <tr>
                    <td>เวลาเข้างาน - เลิกงาน</td>
                    <td>ยังไม่ระบุวันและเวลา</td>
                </tr>
                <tr>
                    <td>จำนวนวันที่ฝึกแล้ว</td>
                    <td>0 วัน</td>
                </tr>
                </tbody>
            </table>
                            <?php  }  ?>
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