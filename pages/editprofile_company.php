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
        $username = $_SESSION['username'];

    $sql3 = "SELECT * FROM company WHERE cid= $cid AND c_status_join = 1";
    $qquery = mysqli_query($link,$sql3);
    $result = mysqli_fetch_array($qquery);

    ?>
</head>
<body>
<?php include 'menu_company.php'?>

<div id="page-wrapper">
        <form action="../php/getedit_company.php" method="post" enctype="multipart/form-data">
            <div class="container ">
                <div class="row" style="margin-top: 5%">
                    <div class="col-md-6 col-md-offset-2">
                    <div class="panel panel-red">
                        <div class="panel-heading text-center">
                            <h4>แก้ไขรหัสผ่าน</h4>
                        </div>
                        <div class="panel-body">

                            <input type="hidden" name="username" value="<?= $username ?>">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <label>พาสเวิร์ดเก่า</label>
                                    <input type="text" name="oldpasswd" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class=" col-md-10 col-md-offset-1">
                                    <label>พาสเวิร์ดใหม่</label>
                                    <input type="text" name="passwd" class="form-control" maxlength="18" minlength="8">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class=" col-md-10 col-md-offset-1">
                                    <label>ยืนยันพาสเวิร์ด</label>
                                    <input type="text" name="repasswd" class="form-control" maxlength="18"
                                           minlength="8">
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-6 col-lg-offset-9">
                                    <button type="submit" class="btn  btn-warning">
                                                ยืนยัน</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></div>
        </form>
    </div><!-- แบบฟอร์มสำรับสถานประกอบการ -->

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