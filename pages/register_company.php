<?php
session_start();
include '../php/connect.php';
conndb();
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

    <script type="text/javascript">
        function isThaichar(str,obj){
            var orgi_text="A B C D E F G H I J K L M N O P Q R S T U V W X Y Z a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 7 8 9  ";
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

    <script type="text/javascript">
        function eng(str,obj){
            var orgi_text="A B C D E F G H I J K L M N O P Q R S T U V W X Y Z a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 7 8 9 @ _ . ";
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
        #demo{
            color: #D60202;
        }
        #demo2{
            color: #2FC332;
        }
    </style>
    <!-- CheckEmail -->


</head>
<body>

<div style="margin-top: 5%">
<div class="container">
    <form id="form3" action="../pages/mou.php" method="get" enctype="multipart/form-data">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <h3 class=" text-center">แบบฟอร์มกรอกสมัครสมาชิก สำหรับสถานประกอบการ</h3>
                </div>
                <div class="panel-body">
                    <!-- แบบฟอร์มสำรับสถานประกอบการ -->
                        <div class="row">
                            <div class="col-md-4">
                                <label>ชือผู้ใช้</label>
                                <input type="text" name="username"  id="data_text" size="40" onkeyup="isThaichar(this.value,this)"
                                       class="form-control"
                                       maxlength="24" required />
                            </div>
                            <div class="col-md-4 ">
                                <label>รหัสผ่าน</label>
                                <input type="password" name="passwd" id="password" class="form-control" minlength="8"
                                       maxlength="18"
                                       required="required">
                                <span id="pass_status"></span>
                            </div>
                            <div class="col-md-4 ">
                                <label>ยืนยันรหัสผ่าน</label>
                                <input type="password" name="conpasswd" id="confirm_password" class="form-control" minlength="8"
                                       maxlength="18"
                                       required="required">
                                <span id="demo"></span>


                            </div>
                        </div>
                        <br>

                            <div class="col-md-4 ">
                                <label>ชื่อบริษัท</label>
                                <input type="text" name="c_name" placeholder="" maxlength="70"
                                       class="form-control"
                                       required="required"/>
                            </div>
                            <div class="col-md-4">
                                <label>เบอร์โทรติดต่อ</label>
                                <input type="tel" name="c_tela" placeholder="" class="form-control"
                                       minlength="10"
                                       maxlength="10" id="mynumber"
                                       onKeyUp="IsNumeric(this.value,this)" required="required"/>
                            </div>
                            <div class="col-md-4 ">
                                <label>ที่อยู่บริษัท</label>
                                <textarea name="c_address" class="form-control" rows="3"></textarea>
                            </div>


                        <div class="row">
                            <div class="col-md-4 ">
                                <label>อีเมลผู้ใช้</label>
                                <input class="form-control"  id="email" name="c_email" type="email"
                                       required="required" onkeyup="eng(this.value,this)"
                                       value="" onBlur="checkEmail()">
                                <span id="email-availability-status"></span>
                            </div>

                        </div>

                            <input type="hidden" name="status" value="สถานประกอบการ">
                            <input type="hidden" name="c_status_join" value="0">


                        <div class="col-md-12 col-md-offset-9" style="margin-top: 3%">
                            <button type="submit" class="btn  btn-primary"> ลงทะเบียน </button>
                            <a href="index.php" class="btn btn-danger ">
                                ย้อนกลับ</a>
                        </div>


                </div>
                <!-- /.col-md-4 -->
            </div>
        </div>

        <!-- แบบฟอร์มสำรับสถานประกอบการ -->
    </form>
</div>


    <script>
        $("#user").keypress(function(event){
            var ew = event.which;
            if(ew == 32)
                return true;
            if(48 <= ew && ew <= 57)
                return true;
            if(65 <= ew && ew <= 90)
                return true;
            if(97 <= ew && ew <= 122)
                return true;
            return false;
        });

    </script>


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


