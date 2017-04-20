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

        $status = $_SESSION['status'];
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];

    $sql3 = "SELECT * FROM company WHERE cid= $cid AND c_status_join = 1";
    $qquery = mysqli_query($link,$sql3);
    $result = mysqli_fetch_array($qquery);

    ?>
</head>
<body>
<?php include 'menu_company.php'?>

    <div id="page-wrapper">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 " style="margin-top: 3%">
            <form action="../php/gteform_workpost.php" method="post" enctype="multipart/form-data">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        <h4>ประกาศรับสมัครงาน</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="hidden" name="cid" value="<?= $cid ?>">
                                <label>รายละเอียดบริษัท</label>
                                <input type="text" name="detail_work" class="form-control" required="required">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>เว็บไซต์</label>
                                <input type="text" name="web" class="form-control" required="required">
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-4 col-md-offset-2">
                                <label>ต้องการนักศึกษาตำแหน่ง</label>
                                <select name="rank" class="form-control" id="selectBox" onchange="changeFunc()">
                                    <option value="System Engineer">System Engineer</option>
                                    <option value="System Administrator">System Administrator</option>
                                    <option value="Network Engineer">Network Engineer</option>
                                    <option value="Network Administrator">Network Administrator</option>
                                    <option value="IT Administrator">IT Administrator</option>
                                    <option value="IT Security">IT Security</option>
                                    <option value="Network Security">Network Security</option>
                                    <option value="Internet Security Manager">Internet Security Manager</option>
                                    <option value="IT Network Infrastructure">IT Network Infrastructure</option>
                                    <option value="Network Operation">Network Operation</option>
                                    <option value="Internet Security Systems Engineer">Internet Security Systems Engineer</option>
                                    <option value="Linux Administrator">Linux Administrator</option>
                                    <option value="Programmer">Programmer</option>
                                    <option value="Systems Analyst">Systems Analyst</option>
                                    <option value="Business Analyst">Business Analyst</option>
                                    <option value="Senior System Analyst">Senior System Analyst</option>
                                    <option value="System Analyst AS/400">System Analyst AS/400</option>
                                    <option value="Other">Other</option>
                                </select>


                            </div>

                            <div class="col-md-2 other hide"><label>Other :</label><input name="rank2"  class="form-control" type="text" id="input_ot" /></div>






                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>ต้องการนักศึกษา</label>
                                <select name="num_stu" class="form-control" >
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
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>รายละเอียดงาน</label>
                                <textarea name="detail" class="form-control" rows="3" required="required"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>คุณสมบัติที่ต้องการ</label>
                                <textarea name="property" class="form-control" rows="3" required="required"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>สถานที่ปฏิบัติงาน</label>
                                <textarea name="map_work" class="form-control" rows="3" required="required"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <label>ข้อเสนอพิเศษ อย่างเช่น เบี้ยเลี้ยง,ค่าเดินทาง</label>
                                <input type="text" name="gold" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <p><?php echo thaidate('วัน l ที่ j เดือน F พ.ศ. Y เวลา H:i:s'); ?></p>
                                <input type="hidden" name="dmt" value="<?php echo thaidate('วัน l ที่ j เดือน F พ.ศ. Y เวลา H:i:s'); ?> ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2" style="margin-top: 3%">
                                <button type="submit"  class="btn  btn-info pull-right ">
                                      <strong>ประกาศ</strong> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

    <script>
        function changeFunc() {
            var selectBox = document.getElementById("selectBox");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            if (selectedValue.toString() == "Other") {
                alert(selectedValue)
                $('.other').removeClass('hide');

            }
        }
    </script>
</body>
</html>