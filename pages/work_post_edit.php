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
    $cid = $_SESSION['cid'];


    $sql = "SELECT * FROM post_company WHERE cid = $cid";
    $query = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($query);

    ?>
</head>
<body>
<div class="row">
    <div class="col-lg-10 col-lg-offset-1 ">
        <form action="../php/gteform_workpost_edit.php?id=<?= $result['idpost']; ?>" method="post" enctype="multipart/form-data">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <h1>ประกาศรับสมัครงาน</h1>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-1">
                            <label>รายละเอียดบริษัท</label>
                            <textarea name="detail_work" class="form-control" rows="3"  required="required"><?=  $result['detail_work'] ?></textarea>
                        </div>
                        <div class="col-lg-5 ">
                            <label>เว็บไซต์ บริษัท (ถ้ามี)</label>
                            <input type="text" name="web" class="form-control" value="<?= $result['web'] ?>"
                                   required="required">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-1 ">
                            <label>ต้องการนักศึกษาตำแหน่ง</label>
                            <input type="text" name="rank" value="<?= $result['rank'] ?>" class="form-control">
                        </div>
                        <div class="col-lg-5 ">
                            <label>จำนวนนักศึกษา </label>
                            <select name="num_stu" class="form-control">
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
                    </div><br>
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-1 ">
                            <label>รายละเอียดงาน</label>
                            <textarea name="detail" class="form-control" rows="4"
                                      required="required"> <?= $result['detail'] ?></textarea>
                        </div>
                        <div class="col-lg-5 ">
                            <label>คุณสมบัติที่ต้องการ</label>
                            <textarea name="property" class="form-control" rows="4"
                                      required="required"><?= $result['property'] ?></textarea>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-1">
                            <label>สถานที่ปฏิบัติงาน</label>
                            <textarea name="map_work" class="form-control" rows="3"
                                      required="required"><?= $result['map_work'] ?></textarea>
                        </div>
                        <div class="col-lg-5 ">
                            <label>ข้อเสนอพิเศษ อย่างเช่น เบี้ยเลี้ยง,ค่าเดินทาง</label>
                            <input type="text" name="gold" value="<?= $result['gold'] ?>"  class="form-control">
                        </div>
                        <input type="hidden" name="dmt"
                               value="<?php echo thaidate(' วัน l ที่ j เดือน F พ.ศ. Y เวลา H:i:s'); ?> ">
                    </div><br>
                    <div class="row">
                        <div class="col-lg-12 " style="margin-top: 2%">
                           <button type="submit" class="btn btn-outline btn-info pull-right "><font
                                    size="4"><strong>ประกาศ</strong> </font></button>
                        </div>
                    </div>
                </div>
        </form>
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