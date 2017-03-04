<meta charset="utf-8" xmlns="http://www.w3.org/1999/html"/>
<?php session_start();
include '../php/config.php';

?>
<?php
$sql = "SELECT * FROM student";
$query = mysqli_query($link, $sql);
$result = mysqli_fetch_array($query);
?>
<style>
    @font-face {
        font-family: 'THSarabun';
        src: url('../vendor/font-thsarabun/THSarabun.eot');
        src: url('../vendor/font-thsarabun/THSarabun.eot?#iefix') format('embedded-opentype'),
        url('../vendor/font-thsarabun/THSarabun.woff2') format('woff2');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'THSarabunPSK';
        src: url('../vendor/font-thsarabun/THSarabunPSK.woff') format('woff'),
        url('../vendor/font-thsarabun/THSarabunPSK.ttf') format('truetype'),
        url('../vendor/font-thsarabun/THSarabunPSK.svg#THSarabunPSK') format('svg');
        font-weight: normal;
        font-style: normal;
    }

    body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
        font-family: 'THSarabunPSK';
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    input[type="text"] {
        border: none;
        border-bottom: dotted #0f0f0f 1px;
        font-family: 'THSarabunPSK';
        display: inline;
        position: relative;
        text-align: center;
        top: -6px;
        font-size: 20px;
        padding-bottom: -5px;
        background: none;
    }

    input[] {
        position: relative;
    }

    .page {
        width: 21cm;
        font-size: 20px;
        min-height: 29.7cm;
        padding: 2cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
        padding: 1cm;
        border: 5px white solid;
        height: 256mm;
        outline: 2cm white solid;
    }

    .page_rotate {
        width: 29.7cm;
        font-size: 18px;
        height: 21cm;
        padding: 2cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage_rotate {
        padding: 0cm;
        padding-top: 20px;;
        border: 5px white solid;
        width: 257mm;
        outline: 2cm white solid;
        height: 170mm;
    }

    @page {
        font-family: 'THSarabun';
        size: A4;
        font-size: 20px;
        margin: 0;
    }

    @media print {
        .page {
            font-family: 'THSarabun';
            font-size: 20px;
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }

        .btn {
            display: none;
        }

        .page_rotate {
            position: relative;
            bottom: -320px;
            font-family: 'THSarabun';
            font-size: 20px;
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
        }

        input[type="text"] {
            border: none;
            border-bottom: dotted #0f0f0f 1px;
            font-family: 'THSarabunPSK';
            display: inline;
            position: relative;
            text-align: center;
            top: -6px;
            font-size: 20px;
            padding-bottom: -5px;
            background: none;
        }

        input[] {
            position: relative;
        }

        .note {
            background: none;
            resize: none;
        }

        .note textarea {
            font-family: 'THSarabun';
            /*background: transparent url(image/underline.png) repeat;*/
            border: none;
            height: 70px;
            width: 500px;
            overflow: hidden;
            line-height: 30px;
            resize: none;
            position: relative;
            top: -0px;
            font-size: 20px;
            overflow: hidden;
        }
    }

    .note {
        background: none;
        resize: none;
    }

    .note textarea {
        font-family: 'THSarabun';
        border: none;
        background: none;
        height: 70px;
        width: 500px;
        overflow: hidden;
        line-height: 30px;
        resize: none;
        position: relative;
        top: -0px;
        font-size: 20px;
        overflow: hidden;
    }
</style>

<link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.css">
<script type="text/javascript" src="../vendor/jquery/jquery.js"></script>
<div class="book">
    <div class="page">
        <div class="subpage">

            <br>
            <div align="center"><h4>
                    ที่อยู่ตามทะเบียนบ้าน บ้านเลขที่<input type="text" name="at_home" data-onload="set_size($(this),50)">
                    หมู่ <input type="text" name="moo" data-onload="set_size($(this),30)">
                    ตำบล/แขวง <input type="text" name="district" data-onload="set_size($(this),80)"><br>
                    ตรอก/ซอย <input type="text" name="alley" data-onload="set_size($(this),80)">
                    ถนน <input type="text" name="road" data-onload="set_size($(this),80)">
                    อำเภอ/เขต <input type="text" name="amphur" data-onload="set_size($(this),80)"><br>
                    จังหวัด <input type="text" name="province" data-onload="set_size($(this),80)">
                    รหัสไปรษณีย์ <input type="text" name="passcode" data-onload="set_size($(this),50)"><br>
                    อีเมล์ : <input type="text" name="email" data-onload="set_size($(this),180)"> <br>
                    โทรศัพท์มือถือ : <input type="text" name="telaphone" data-onload="set_size($(this),120)"><br>
                </h4>
            </div>
            <b> ข้อมูลส่วนตัว </b><br>
            &nbsp;&nbsp;&nbsp;&nbsp; <b>- วัน/เดือน/ปีเกิด &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                &nbsp; : </b>
            <select name="day" id="day">
                <option value=" "> วัน </option>
                <?php for($i=1; $i<=31; $i++) {?>
                    <option value="<?= $i ?>"><?= $i?></option>
                <?php }?>
            </select>

            <select name="month" id="month">
                <option value=" ">เดือน</option>
                <?PHP $month = array("มกราคม ","กุมภาพันธ์ ","มีนาคม ","เมษายน ","พฤษภาคม ","มิถุนายน ","กรกฎาคม ","สิงหาคม ","กันยายน ","ตุลาคม ","พฤศจิกายน ","ธันวาคม ");?>
                <?PHP for($i=0; $i<sizeof($month); $i++) {?>
                    <option value="<?PHP echo $month[$i]?>">
                        <?PHP echo $month[$i]?></option>
                <?PHP }?>
            </select>

            <select name="year" id="year">
                <option value=" ">ปี</option>
                <?PHP for($i=0; $i<=50; $i++) {?>
                    <option value="1"><?PHP echo date("Y")-$i+543?></option>
                <?PHP }?>
            </select>
            <br>

            &nbsp;&nbsp;&nbsp;&nbsp; <b>- อายุ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                : </b><input type="text" name="age" data-onload="set_size($(this),100)"><b> ปี</b><br>
            &nbsp;&nbsp;&nbsp;&nbsp; <b>- สถานภาพทางการสมรส &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</b>  <select name="marital_status">
                <option value="โสต">โสต</option>
                <option value="แต่งงานแล้ว">แต่งงานแล้ว</option>
                <option value="หม้าย">หม้าย</option>
            </select>
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp; <b>- สถานะทางทหาร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                : </b><select name="sloder_status">
                <option value="yes">ผ่านการเกณฑ์ทหารแล้ว</option>
                <option value="no">ยังไม่ผ่านการเกณฑ์ทหาร</option>
            </select> <br>
            &nbsp;&nbsp;&nbsp;&nbsp; <b>- น้ำหนัก &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                :</b> <input type="text" width="weight" data-onload="set_size($(this),100)"> <br>
            &nbsp;&nbsp;&nbsp;&nbsp; <b> - ส่วนสูง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                : </b><input type="text" name="height" data-onload="set_size($(this),100)"> <br>
            <b>จุดมุ่งหมายในการทำงาน</b> <br>
            <textarea name="aim" data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="10"></textarea> <br>
            <b>ประวัติการศึกษา</b> <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> จบระดับชั้นประถามศึกษา &nbsp;&nbsp; จาก <input type="text" name="end1" data-onload="set_size($(this),250)"></b>
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text"name="at_end1" data-onload="set_size($(this),430)"> <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> จบระดับชั้นมัธยมศึกษา &nbsp;&nbsp;&nbsp;&nbsp; จาก <input
                    type="text" name="end2" data-onload="set_size($(this),255)"> </b> <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="at_end2" data-onload="set_size($(this),430)"> <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b> กำลังศึกษาอยู่ระดับปริญญาตรี &nbsp;<input type="text" name="end3" data-onload="set_size($(this),260)">
            </b> <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="at_end3" data-onload="set_size($(this),430)"> <br>
        </div>
    </div>
    <div class="page">
        <div class="subpage">
            <b> ประสบการณ์ทางด้านการศึกษา </b> <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text"  name="education" data-onload="set_size($(this),100)"> <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b> นักศึกษาสาขา <input type="text" name="branch" data-onload="set_size($(this),250)">
            </b><br>
            <textarea  name="study_details" data-onload="set_size($(this),550)" style="margin-top: 5px;"
                       rows="15">รายละเอียดการศึกษา :</textarea> <br> <br>


            <b> ทักษะและความสามารถพิเศษอื่น ๆ </b><br>
            <textarea name="skills" data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="15"></textarea> <br>


        </div>
    </div>
</div>



<script>
    function set_size(input, width) {
        input.css("width", width + "px");
        //alert(width);
    }

    $('[data-onload]').each(function () {
        eval($(this).data('onload'));
    });
</script>



