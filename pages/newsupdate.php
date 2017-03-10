<?php include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');
?>
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
                <li ><a href="admin_teacher.php"><i class=" fa fa-cog fa-spin fa-fw"></i> แก้ไขข้อมูลอาจารย์</a> </li>
                <li><a href="admin_company.php"><i class=" fa fa-cog  fa-fw"></i> แก้ไขข้อมูลบริษัท</a> </li>
                <li><a href="#"><i class=" fa fa-cog  fa-fw"></i> แก้ไขข้อมูลบันทึกคะแนน</a> </li>
                <li class="active"><a href="newsupdate.php"><i class="glyphicon glyphicon-list-alt"></i> อัพเดทข่าวสาร</a></li>
                <li><a href="admin_upload.php" class="fa fa fa-upload "> อัพโหลด</a> </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>


<font face="TH Sarabun New" size="5">

        <div class="col-md-6 col-md-offset-3 " style="margin-top: 20px">
            <form action="../php/newsupload.php" method="post" enctype="multipart/form-data">
                <div class="panel panel-info">
                    <div class="panel panel-heading">
                        อัพเดทข่าวสาร
                        </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>หัวเรื่องข่าว</label>
                                <input type="text" name="headnews" class="form-control" required="required">
                            </div>
                            </div>
                        <br>
                            <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>เนื้อเรื่องข่าว</label> <br>
                                <textarea name="substance" class="form-control" required="required"  rows="5"> </textarea>
                            </div>
                                <input type="hidden" name="dmt" value="<?php echo thaidate('j F Y เวลา H:i:s'); ?> ">
                                </div>
                        <br>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit"  class="btn  btn-info pull-right "><font
                                            size="4"><strong>ประกาศ</strong> </font></button>
                                </div>
                            </div>
                        </div>
                        </div>
            </form>
        </div>

</font>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>