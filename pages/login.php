<?php session_start();
include '../php/config.php';
$mylog = null;

if (isset($_SESSION['mylog'])) {
    $mylog = $_SESSION['mylog'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบสหกิจศึกษา เข้าสู่ระบบ</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body background="../img/jennifer.gif">
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-lock  "></i> เข้าสู่ระบบ</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="../php/do_login.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ไอดีผู้ใช้" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="รหัสผ่าน" name="passwd" type="password" value="">
                                </div>
                                <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-block" value="เข้าสู่ระบบ">
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12" style="margin-top: 5%">
                <div class=" panel-primary">
                    <div class="panel-body">
                       <div class="row">
                           <div class="col-md-4">
                           <a href="register_student.php" class="btn btn-block btn-success">ลงทะเบียนนักศึกษา</a>

                           </div>
                           <div class="col-md-4">
                               <a href="register_teacher.php" class="btn btn-block btn-warning">ลงทะเบียนอาจารย์</a>
                           </div>
                           <div class="col-md-4">
                               <a href="register_company.php" class="btn btn-block btn-danger">รับสมัครบริษัทใหม่</a>
                           </div>
                           </div>
                        <br>
                        <div class="row">
                           <div class="col-md-4 col-md-offset-4">
                               <a href="index.php" class="btn btn-block btn-default"><img src="../img/player-07-512.png" width="25px" height="25px">กลับหน้าแรก</a>
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
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>
