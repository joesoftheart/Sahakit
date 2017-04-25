<?php
session_start();
include '../php/config.php';
include"../php/database.class_company.php";

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
    <script src="../script/script_company.js"></script>

</head>
<body>
<?php include 'menu_admin.php'?>
        <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <ol class="breadcrumb">
                    <li><a href="profile_admin.php">Home</a></li>
                    <li class="active">แก้ไขข้อมูลบริษัท</a></li>
                </ol>
            </div>
            <div class="panel-default">
                    <div class="panel-heading">
                        ตาราง ลบ / แก้ไข / บริษัท
                        </div>
                        <div class="panel-body">

            <div class="col-md-6">

            </div>

            <div class="col-md-6">
                <div class="pull-right">
                    <!-- form สำหรับค้นหาข้อมูล -->
                    <form class="form-inline" method="POST" action="admin_company.php">
                        <div class="form-group">
                            <a href="admin_company.php"> <img src="../img/player-07-512.png" width="25px" height="25px"></a>
                            <input type="text" class="form-control" name="search_user" placeholder="พิมพ์ชื่อที่ต้องการค้นหา">
                        </div>
                        <button type="submit" class="btn  btn-warning" >ค้นหา</button>
                    </form>
                </div>
            </div>

            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th width="5%">ลำดับ</th>
                    <th width="7%">ไอดี</th>
                    <th width="10%">รหัสผ่าน</th>
                    <th width="15%">ชื่อบริษัท</th>
                    <th width="10%">เบอร์โทร</th>
                    <th width="20%">ที่อยู่</th>
                    <th width="20%">อีเมล์</th>
                    <th width="5%">แก้ไข</th>
                    <th width="5%">ลบ</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $i = 1;
                if(!empty($get_user)){
                    foreach($get_user as $user){
                        ?>
                        <tr>
                            <td><?php echo $user["cid"]?></td>
                            <td><?php echo $user['username']?></td>
                            <td><?php echo $user['passwd']?></td>
                            <td><?php echo $user['c_name']?></td>
                            <td><?php echo $user['c_tela']?></td>
                            <td><?php echo $user['c_address']?></td>
                            <td><?php echo $user['c_email']?></td>
                            <td><button class="btn  btn-warning btn-xs" data-toggle="modal" data-target="#edit_user" onclick="return show_edit_user(<?=$user['cid']?>);">แก้ไข</button></td>
                            <td><button class="btn  btn-danger btn-xs" onclick="return delete_user(<?=$user['cid']?>)">ลบ</button></td>
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
                <button type="button" class="btn btn-primary" onclick="return edit_user_form();">บันทึก</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
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
