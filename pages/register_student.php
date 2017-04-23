<?php
session_start();
include '../php/connect.php';
conndb();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="../img/favicon.ico" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>สมัครสมาชิก</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../vendor/jquery/jquery-1.11.2.min.js"></script>


    <script type="text/javascript">
        function isThaichar(str,obj){
            var orgi_text="A B C D E F G H I J K L M N O P Q R S T U V W X Y Z a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 7 8 9";
            var str_length=str.length;
            var str_length_end=str_length-1;
            var isThai=true;
            var Char_At="";
            for(i=0;i<str_length;i++){
                Char_At=str.charAt(i);
                if(orgi_text.indexOf(Char_At)==-1){
                    isThai=false;
                }
            }
            if(str_length>=1){
                if(isThai==false){
                    obj.value=str.substr(0,str_length_end);
                }
            }
            return isThai; // ถ้าเป็น true แสดงว่าเป็นภาษาไทยทั้งหมด
        }
    </script>



    <script language="javascript">
        function IsNumeric(sText,obj)
        {
            var ValidChars = "0123456789.";
            var IsNumber=true;
            var Char;
            for (i = 0; i < sText.length && IsNumber == true; i++)
            {
                Char = sText.charAt(i);
                if (ValidChars.indexOf(Char) == -1)
                {
                    IsNumber = false;
                }
            }
            if(IsNumber==false){

                obj.value=sText.substr(0,sText.length-1);
            }
        }
    </script>



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
<div class="container">
        <div  style="margin-top: 5%">
            <form id="form1" action="../php/getform_student.php" method="post" enctype="multipart/form-data">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <h4 class=" text-center">แบบฟอร์มกรอกสมัครสมาชิก สำหรับนักศึกษา</h4>
                    </div>
                    <div class="panel-body">
                        <!-- แบบฟอร์มสำรับ นักศึกษา -->
                        <div class="row">
                            <div class="col-md-4">
                                <label>ชื่อผู้ใช้</label>
                                <input type="text" name="username"  class="form-control"
                                       maxlength="24" required="required" id="data_text" size="40" onkeyup="isThaichar(this.value,this)">
                            </div>
                            <div class="col-md-4">
                                <label>รหัสผ่าน</label>
                                <input type="password" name="passwd" id="password" class="form-control" minlength="8" maxlength="18"
                                       required="required">

                                <span id="pass_status"></span>
                            </div>
                            <div class="col-md-4">
                                <label>ยืนยันรหัสผ่าน</label>
                                <input type="password" id="confirm_password" name="conpasswd" class="form-control" minlength="8" maxlength="18"
                                       required="required">
                                <br>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label>รหัสนักศึกษา</label>
                            <input type="text" name="number_id" required="required" minlength="10" maxlength="10"
                                   class="form-control " id="mynumber"
                                   onKeyUp="IsNumeric(this.value,this)">
                            <br>
                        </div>
                        <div class="col-md-2">
                            <label>คำนำหน้า</label>
                            <select name="frist_name" class="form-control" required="required">
                                <option value="">- เลือกคำนำหน้า -</option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="น.ส.">นางสาว</option>

                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>ชื่อ</label>
                            <input type="text" name="fn_st"  maxlength="25"
                                   class="form-control" required="required">
                        </div>
                        <div class="col-md-4">
                            <label>นามสกุล</label>
                            <input type="text" name="ln_st"  maxlength="25"
                                   class="form-control" required="required">
                        </div>
                        <br><br><br><br>

                        <div class="col-md-2">
                            <label>บ้านเลขที่</label>
                            <input type="text" name="house_no" class="form-control" required="required" id="mynumber"
                                   onKeyUp="IsNumeric(this.value,this)">
                        </div>
                        <div class="col-md-2">
                            <label>หมู่ที่</label>
                            <input type="text" name="village_no" class="form-control" required="required" id="mynumber"
                                   onKeyUp="IsNumeric(this.value,this)">
                        </div>
                        <div class="col-md-2">
                            <label>จังหวัด </label>
                            <span id="province">
                                   <select class="form-control" name="province" required="required">
                                      <option value=''>- เลือกจังหวัด -</option>
                                   </select>
                                </span>
                        </div>
                        <div class="col-md-2 ">
                            <label>อำเภอ </label>
                            <span id="amphur">
                                    <select class="form-control" name="amphur" required="required">
                                        <option value=''>- เลือกอำเภอ -</option>
                                    </select>
                                </span>
                        </div>
                        <div class="col-md-2 ">
                            <label>ตำบล </label>
                            <span id="district">
                    <select class="form-control" name="district" required="required">
                        <option value=''>- เลือกตำบล -</option>
                    </select>
                         </span>
                        </div>
                        <div class="col-md-2">
                            <label>รหัสไปรษณีย์</label>
                            <input type="text" name="postal_code" class="form-control" maxlength="5" id="mynumber"
                                   onKeyUp="IsNumeric(this.value,this)">
                        </div>
                        <br><br><br><br>
                        <div class="row">
                            <div class="col-md-3">
                                <label>เบอร์โทรติดต่อ</label>
                                <input type="tel" name="telaphone"  class="form-control"
                                       minlength="10" maxlength="10" required="required" id="mynumber"
                                       onKeyUp="IsNumeric(this.value,this)" />
                            </div>
                            <div class="col-md-3">
                                <label>อีเมลผู้ใช้</label>
                                <input class="form-control" placeholder="Email" id="email" name="email" type="email"
                                       required="required"
                                       value="" onBlur="checkEmail()">
                                <span id="email-availability-status"></span>
                            </div>
                            <div class="col-md-3">
                                <label>อายุ</label>
                                <select name="age" class="form-control">
                                    <option value="18" selected="selected">18 ปี</option>
                                    <option value="19">19 ปี</option>
                                    <option value="20">20 ปี</option>
                                    <option value="21">21 ปี</option>
                                    <option value="22">22 ปี</option>
                                    <option value="23">23 ปี</option>
                                    <option value="24">24 ปี</option>
                                    <option value="25">25 ปี</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-md-4"  style="margin-top: 20px" >
                            <label for="exampleInputFile">รูปภาพประจำตัว</label>
                            <input type="file" name="filetoload" id="fileimg"  required="required"
                                   onblur="checkimg()">
                            <span class="img-availability-status"></span>
                        </div>
                        <div class="col-md-6 col-md-4" style="margin-top: 20px" >
                            <label for="resume">อัพโหลด เรซูเม่</label>
                            <input type="file" name="resume_upload" required="required">
                        </div>

                        <input type="hidden" name="status" value="นักศึกษา">
                        <input type="hidden" name="tid" value="0">
                        <div class="col-md-12 col-md-offset-4" style="margin-top:4%" align="center">
                            <button type="submit" value="Upload Image" class="btn  btn-primary"
                                    data-toggle="tooltip" data-placement="top" title="สมัครสมาชิก" onclick="JavaScript:return conpasswd()"> สมัครสมาชิก
                            </button>
                            <a href="index.php" class="btn  btn-danger "><i
                                    class="glyphicon glyphicon-home"></i> หน้าแรก</a>
                        </div>
                    </div>
                    <!-- /.col-md-4 -->
                </div>
                <!-- แบบฟอร์มสำรับ นักศึกษา -->

            </form>
        </div>
    </div>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){

            $(document.body).on("keyup","#password",function(){
                $.get("get.php",{
                    password:$(this).val()
                },function(data){
                    $("#pass_status").html(data);
                });

            });
        });
    </script>


<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>

</body>
</html>
