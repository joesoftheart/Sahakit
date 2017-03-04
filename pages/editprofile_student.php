<?php session_start();
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

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <?php
    $username = $_SESSION['username'];
    ?>

</head>
<body>
<font face="TH Sarabun New" size="5">
<div  style="margin-top: 2%">
    <form action="../php/getedit_student.php" method="post" enctype="multipart/form-data">
        <div class="container col-md-3 col-md-offset-4">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h1>แก้ไขรหัสผ่าน</h1>
                    </div>
                    <div class="panel-body">

                    <input type="hidden" name="username" value="<?=$username?>">
            <div class="row">
                <div class="col-md-12 col-md-10 col-md-offset-1">
                    <label>พาสเวิร์ดเก่า</label>
                        <input type="text" name="oldpasswd" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-md-10 col-md-offset-1">
                    <label>พาสเวิร์ดใหม่</label>
                        <input type="text" name="passwd" class="form-control" maxlength="18" minlength="8">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-md-10 col-md-offset-1">
                    <label>ยืนยันพาสเวิร์ด</label>
                        <input type="text" name="repasswd" class="form-control" maxlength="18" minlength="8">
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-6 col-lg-offset-9">
                    <button type="submit" class="btn btn-outline btn-primary" > <font size="4"><strong>ยืนยัน</strong></font></button>

                </div>
            </div>
        </div>
                </div>
            </div>
</form>

</div>
    </font><!-- แบบฟอร์มสำรับสถานประกอบการ -->
</body>
</html>