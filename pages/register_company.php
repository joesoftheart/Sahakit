<?php
session_start();
include '../php/connect.php';
conndb();
?>

<!DOCTYPE html>
<html>


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







    <!-- จังหวัด-->
    <script language=Javascript>
        function Inint_AJAX() {
            try {
                return new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
            } //IE
            try {
                return new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            } //IE
            try {
                return new XMLHttpRequest();
            } catch (e) {
            } //Native Javascript
            alert("XMLHttpRequest not supported");
            return null;
        }
        ;

        function dochange(src, val) {
            var req = Inint_AJAX();
            req.onreadystatechange = function () {
                if (req.readyState == 4) {
                    if (req.status == 200) {
                        document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
                    }
                }
            };
            req.open("GET", "../php/localtion.php?data=" + src + "&val=" + val); //สร้าง connection
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
            req.send(null); //ส่งค่า
        }

        window.onLoad = dochange('province', -1);
    </script>
    <!-- จังหวัด-->

    <!-- CheckEmail -->
    <script>
        function checkEmail() {
            //$("#loaderIcon").show();
            jQuery.ajax({
                url: "../php/check_email.php",
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function (data) {
                    $("#email-availability-status").html(data);
                    //$("#loaderIcon").hide();
                }

            });
        }
    </script>

    <style>
        .status-available {
            color: #2FC332;
        }

        .status-not-available {
            color: #D60202;
        }

        .img-availability-status {
            color: #2FC332;
        }

    </style>
    <!-- CheckEmail -->

    <!-- Checkimg -->
    <script>
        function checkimg() {
            var img = $('#fileimg').val();
            var sizeimg = document.getElementById('fileimg').files[0].size;
            console.log(img);
            if (img.lastIndexOf("jpg") === img.length - 3 || img.lastIndexOf("png") === img.length - 3 || img.lastIndexOf("PNG") === img.length - 3) {
                // check image size ไม่เกิน 2 MB
                if (sizeimg <= 1000000) {
                    var img_size = (sizeimg / (1024 * 1024)).toFixed(2);
                    console.log(img_size + " MB ");
                    $(".img-availability-status").html('อัพรูปสำเร็จ');

                }
            }

        }
    </script>
    <!-- Checkimg -->


</head>
<body>

<div class="f3 " style="margin-top: 2%">
    <form id="form3" action="../pages/mou.php" method="get" enctype="multipart/form-data">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <h3 class=" text-center">แบบฟอร์มกรอกสมัครสมาชิก สำหรับสถานประกอบการ</h3>
                </div>
                <div class="panel-body">
                    <!-- แบบฟอร์มสำรับสถานประกอบการ -->
                    <form style="display: none;">
                        <div class="row">
                            <div class="col-md-4 col-md-4">
                                <label>ชือผู้ใช้</label>
                                <input type="text" name="username" placeholder="กรอกไอดีของท่าน"
                                       class="form-control"
                                       maxlength="10" required="required">
                            </div>
                            <div class="col-md-4 col-md-4">
                                <label>รหัสผ่าน</label>
                                <input type="password" name="passwd" class="form-control"
                                       maxlength="18"
                                       required="required">
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label>ยืนยันรหัสผ่าน</label>
                                <input type="password" name="conpasswd" class="form-control"
                                       maxlength="18"
                                       required="required">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4 col-md-4 form-group">
                                <label>ชื่อบริษัท</label>
                                <input type="text" name="c_name" placeholder="" maxlength="70"
                                       class="form-control"
                                       required="required"/>
                            </div>
                            <div class="col-md-4 col-md-4">
                                <label>เบอร์โทรติดต่อ</label>
                                <input type="text" name="c_tela" placeholder="" class="form-control"
                                       minlength="10"
                                       maxlength="10" required="required"/>
                            </div>
                            <div class="col-md-4 col-md-4">
                                <label>ที่อยู่บริษัท</label>
                                <textarea name="c_address" class="form-control" rows="3"></textarea>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4 col-md-4 form-group">
                                <label>อีเมลผู้ใช้</label>
                                <input type="text" name="c_email" placeholder="pond_pond@hotmail.com"
                                       class="form-control"
                                       required="required">
                            </div>

                        </div>

                            <input type="hidden" name="status" value="สถานประกอบการ">
                            <input type="hidden" name="c_status_join" value="0">

                        <br><br><br><br>
                        <div class="col-md-6 col-lg-offset-5">
                            <button type="submit" value="Upload Image" class="btn btn-outline btn-primary"
                                    data-toggle="tooltip"
                                    data-placement="top" title="สมัครสมาชิก"> ลงทะเบียน
                            </button>
                            <a href="index.php" class="btn btn-outline btn-danger "><i
                                    class="glyphicon glyphicon-home"></i>
                                หน้าแรก</a>
                        </div>

                    </form>
                </div>
                <!-- /.col-lg-4 -->
            </div>
        </div>

        <!-- แบบฟอร์มสำรับสถานประกอบการ -->
    </form>

<br><br>
</body>

</html>

