<?php
session_start();
include '../php/config.php';
include"../php/database.class_teacher.php";

//new database
$db = new Database();
$db->connect();
if(isset($_POST['search_user'])){
    //get search user
    $get_user = $db->search_user($_POST['search_user']);

}else{
    //call method getUser
    $get_user = $db->get_all_user();
} ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sahakit</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../script/script_teacher.js"></script>

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
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-nav navbar-right" style="margin-right: 1%">

            <li><a href="../php/logout.php"><i class="glyphicon glyphicon-off"></i> ลงชื่อออก</a>
            </li>
        </ul>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li><a href="profile_admin.php" class="fa fa-user"> บริษัทสมัครเข้าโครงการ</a> </li>
                <li><a href="admin_student.php"><i class=" fa fa-cog  fa-fw"></i> แก้ไขข้อมูลนักศึกษา</a> </li>
                <li class="active"><a href="admin_teacher.php"><i class=" fa fa-cog fa-spin fa-fw"></i> แก้ไขข้อมูลอาจารย์</a> </li>
                <li><a href="admin_company.php"><i class=" fa fa-cog  fa-fw"></i> แก้ไขข้อมูลบริษัท</a> </li>
                <li><a href="#"><i class=" fa fa-cog  fa-fw"></i> แก้ไขข้อมูลบันทึกคะแนน</a> </li>
                <li><a href="newsupdate.php"><i class="glyphicon glyphicon-list-alt"></i> อัพเดทข่าวสาร</a></li>
                <li><a href="admin_upload.php" class="fa fa-upload "> อัพโหลด</a> </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel-default">
                    <div class="panel-heading">
                        ตาราง เพิ่ม / ลบ / แก้ไข / อาจารย์
                    </div>
                    <div class="panel-body">

                <div class="col-md-12">
            <div class="col-md-6">
                <button class="btn btn-info" data-toggle="modal" data-target="#add_user">เพิ่มข้อมูล</button>
            </div>

            <div class="col-md-6">
                <div class="pull-right">
                    <!-- form สำหรับค้นหาข้อมูล -->
                    <form class="form-inline" method="POST" action="admin_teacher.php">
                        <div class="form-group">
                          <a href="admin_teacher.php"> <img src="../img/player-07-512.png" width="25px" height="25px"></a>
                            <input type="text" class="form-control" name="search_user" placeholder="พิมพ์ชื่อที่ต้องการค้นหา">
                        </div>
                        <input type="submit" value="ค้นหา">
                    </form>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="10%">ลำดับ</th>
                    <th width="10%">ไอดี</th>
                    <th width="10%">รหัสผ่าน</th>
                    <th>คำนำหน้า</th>
                    <th width="15%">ชื่อ</th>
                    <th width="15%">สกุล</th>
                    <th width="30%">ที่อยู่</th>
                    <th width="10%">เบอร์โทร</th>
                    <th width="20%">อีเมล์</th>
                    <th width="15%">แก้ไข</th>
                    <th width="15%">ลบ</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $i = 1;
                if(!empty($get_user)){
                    foreach($get_user as $user){
                        ?>
                        <tr>
                            <td><?php echo $user["tid"]?></td>
                            <td><?php echo $user['username']?></td>
                            <td><?php echo $user['passwd']?></td>
                            <td><?php echo $user['frist_name'] ?></td>
                            <td><?php echo $user['fn_te']?></td>
                            <td><?php echo $user['ln_te']?></td>
                            <td><?php echo $user['address']?></td>
                            <td><?php echo $user['telaphone'] ?></td>
                            <td><?php echo $user['email']?></td>
                            <td><button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit_user" onclick="return show_edit_user(<?=$user['tid']?>);">แก้ไข</button></td>
                            <td><button class="btn btn-danger btn-xs" onclick="return delete_user(<?=$user['tid']?>)">ลบ</button></td>
                        </tr>

                        <?php
                        $i++;
                    }
                }else{
                    echo "<tr><td colspan='5'>ไม่พบข้อมูล</td></tr>";
                }
                ?>
                </tbody>

            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูล</h4>
            </div>
            <div class="modal-body">
                <form id="add_user_form">
                    <div class="form-group">
                        <label >ไอดี</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label >รหัสผ่าน</label>
                        <input type="text" class="form-control" name="passwd">
                    </div>
                    <div class="form-group">
                        <label >คำนำหน้า</label>
                        <input type="text" class="form-control" name="frist_name"  placeholder="คำนำหน้า">
                    </div>
                    <div class="form-group">
                        <label >ชื่อ</label>
                        <input type="text" class="form-control" name="fn_te"  placeholder="ระบุ ชื่อ">
                    </div>
                    <div class="form-group">
                        <label >สกุล</label>
                        <input type="text" class="form-control" name="ln_te"  placeholder="ระบุ สกุล">
                    </div>
                    <div class="form-group">
                        <label >ที่อยู่</label>
                        <input type="text" class="form-control" name="address"  placeholder="ระบุ ที่อยู่">
                    </div>
                    <div class="form-group">
                        <label >เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" name="telaphone"  placeholder="ระบุ เบอร์โทรศัพท์">
                    </div>
                    <div class="form-group">
                        <label >อีเมล์</label>
                        <input type="text" class="form-control" name="email"  placeholder="ระบุ อีเมล์">
                    </div>

                        <input type="hidden" class="form-control" name="status" value="อาจารย์" >

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="return add_user_form();">ยืนยัน</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
            </div>
            <div class="modal-body">
                <div id="edit_form"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="return edit_user_form();">ยืนยัน</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
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
