<?php session_start();
include '../php/config.php';


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
                <li><a href="admin_teacher.php"><i class=" fa fa-cog  fa-fw"></i> แก้ไขข้อมูลอาจารย์</a> </li>
                <li><a href="admin_company.php"><i class=" fa fa-cog  fa-fw"></i> แก้ไขข้อมูลบริษัท</a> </li>
                <li><a href="#"><i class=" fa fa-cog  fa-fw"></i> แก้ไขข้อมูลบันทึกคะแนน</a> </li>
                <li><a href="newsupdate.php"><i class="glyphicon glyphicon-list-alt"></i> อัพเดทข่าวสาร</a></li>
                <li class="active"><a href="admin_upload.php" class="fa fa-upload "> อัพโหลด</a> </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

<div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <h4 class="page-header">
                อัพโหลดไฟล์
            </h4>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1" >
                <div class="panel panel-default">

                    <!-- /.panel-heading -->

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th> นักศึกษา </th>
                                <th> อาจารย์ </th>
                                <th> บริษัท </th>
                            </tr>
                            <tr>
                                <td>
                                    <form name="form1" method="post" action="../php/uploadstudent.php"
                                          enctype="multipart/form-data">
                                        <input type="file" name="filUpload"><br>
                                        <input name="btnSubmit" type="submit" class="btn btn-success " value="อัพโหลด">
                                    </form>
                                </td>
                                <td>
                                    <form name="form1" method="post" action="../php/uploadtecher.php" enctype="multipart/form-data">
                                        <input type="file" name="filUpload"><br>
                                        <input name="btnSubmit" type="submit" class="btn btn-success "
                                               value="อัพโหลด">
                                    </form>
                                </td>
                                <td>
                                    <form name="form1" method="post" action="../php/uploadcompany.php" enctype="multipart/form-data">
                                        <input type="file" name="filUpload"><br>
                                        <input name="btnSubmit"
                                               type="submit" class="btn btn-success "
                                               value="อัพโหลด">
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    <?php
    $strSQL = "SELECT * FROM files_student";
    $objQuery = mysqli_query($link, $strSQL) or die ("Error Query [" . $strSQL . "]");

    $strSQL_1 = "SELECT * FROM files_teacher";
    $objQuery_1 = mysqli_query($link, $strSQL_1) or die ("Error Query [" . $strSQL_1 . "]");

    $strSQL_2 = "SELECT * FROM files_company";
    $objQuery_2 = mysqli_query($link, $strSQL_2) or die ("Error Query [" . $strSQL_2 . "]");
    ?>

    <div class="row">
        <div class="col-md-10 col-md-offset-1" >
            <div class="panel panel-success">

                <!-- /.panel-heading -->

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>นักศึกษา</th>
                            <th>อาจารย์</th>
                            <th>บริษัท</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <?php
                            while ($objResult = mysqli_fetch_array($objQuery)) {
                                ?>
                                <td > <a href="../myfile/student/<?php echo $objResult["filestudent"]; ?>"
                                                         download  >
                                        <?= $objResult["filestudent"]; ?></a> <a href="../php/delete_file_upload.php?id=<?= $objResult['id'] ?>">ลบไฟล์</a> </td>
                                <?php
                            }
                            ?>


                            <?php while ($objResult_1 = mysqli_fetch_array($objQuery_1)) { ?>
                                <td ><a href="../myfile/teacher/<?php echo $objResult_1["filesteacher"]; ?>"
                                                        download ><?= $objResult_1["filesteacher"]; ?></a>  ลบไฟล์2</td>
                                <?php
                            }
                            ?>

                            <?php while ($objResult_2 = mysqli_fetch_array($objQuery_2)) { ?>
                                <td ><a href="../myfile/company/<?= $objResult_2["filescompany"]; ?>"
                                                        download >
                                        <?= $objResult_2["filescompany"]; ?></a>  ลบไฟล์3</td>
                                <?php
                            }
                            ?>

                        </tr>
                        </tbody>

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
