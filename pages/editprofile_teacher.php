<?php session_start();
include '../php/config.php';
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sahakit</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <?php
    $tid = $_SESSION['tid'];

    $sql = "SELECT * FROM teacher WHERE tid = $tid";
    $query = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($query);
    ?>


</head>
<body>
<div class="container">
    <form action="../php/getedit_teacher.php" method="post" enctype="multipart/form-data">
        <div class="col-md-12" style="margin-top: 5%">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <h4 class=" text-center">แบบฟอร์มแก้ไขข้อมูลอาจารย์</h4>
                </div>
                <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 ">
                                <label>ชื่อผู้ใช้</label>
                                <input type="text" class="form-control" value="<?= $result['username'] ?>"
                                       disabled="disabled">
                            </div>
                            <div class="col-md-4 ">
                                <label>รหัสผ่าน</label>
                                <input type="text" name="passwd" class="form-control" value="<?= $result['passwd'] ?>"
                                       maxlength="18" required="required">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>คำนำหน้า</label>
                                <input type="text" name="frist_name" value="<?= $result['frist_name'] ?>"
                                       class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>ชื่อ</label>
                                <input type="text" name="fn_te" placeholder="ชื่อจริง" maxlength="25"
                                       class="form-control" value="<?= $result['fn_te'] ?> "
                                       required="required"/>
                            </div>
                            <div class="col-md-4">
                                <label>นามสกุล</label>
                                <input type="text" name="ln_te" placeholder="นามสกุล" maxlength="25"
                                       class="form-control" value="<?= $result['ln_te'] ?> " required="required"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>อีเมลผู้ใช้</label>
                                <input type="email" name="email" required="required" value="<?= $result['email'] ?> "
                                       class="form-control">
                            </div>

                            <div class="col-md-4 ">
                                <label>เบอร์โทรติดต่อ</label>
                                <input type="text" name="telaphone"
                                       class="form-control" minlength="10"
                                       maxlength="10" value="<?= $result['telaphone'] ?> " required="required"/>
                            </div>

                            <div class="col-md-4 ">
                                <label>ที่อยู่</label>
                                <textarea name="address" class="form-control"
                                          rows="5"> <?= $result['address'] ?> </textarea>
                            </div>
                            <input type="hidden" name="tid" value="<?= $result['tid'] ?>">
                        </div>

                        <br><br><br><br>
                        <div class="row>" style="margin-top: 1%">
                            <div class="col-md-1 col-md-offset-10">
                               <input type="submit" class="btn btn-warning" value="แก้ไข">
                            </div>
                            <div class="col-md-1 ">
                                <a href="profile_teacher.php" class="btn  btn-danger ">
                                    ย้อนกลับ</a>
                            </div>
                        </div>
                    </form>
                </div>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>