<?php session_start();
include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');
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

    <title>สหกิจศึกษา</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <script language="javascript">
        function IsNumeric(sText,obj)
        {
            var ValidChars = "0123456789 .";
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

        #crop {
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
            width: 25cm;
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

    <?php
    $status = null;


    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        $fn_te = $_SESSION['fn_te'];
        $ln_te = $_SESSION['ln_te'];
        $sid = $_REQUEST['sid'];



        $sql = "SELECT * FROM register_work , company , student 
                    WHERE register_work.cid = company.cid 
                    AND register_work.sid = '$sid' ";

        $query_work = mysqli_query($link, $sql);
        $row_work = mysqli_fetch_array($query_work);


    }
    ?>
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="profile_teacher.php"> <i class="fa fa-home"></i> หน้าแรก </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li><?= $status ?> </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $fn_te ?>  <?= $ln_te ?> <i
                        class="fa fa-user"></i> <b class="caret"></b> </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="../pages/profile_teacher.php"><i class="glyphicon glyphicon-user"></i>โปรไฟล์</a></li>
                    <li><a href="../pages/editprofile_teacher.php"><i class="glyphicon glyphicon-edit"></i> แก้ไขโปรไฟล์</a></li>
                    <li class="divider"></li>
                    <li><a href="../php/logout.php"><i class="glyphicon glyphicon-off"></i> ลงชื่อออก</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li><a href="#"><img src="../img/png/user-6.png" width="25px" height="25px"> นักศึกษา <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="data_student.php">นักศึกษาในการดูแล</a></li>
                            <li><a href="all_student.php">นักศึกษาสหกิจทั้งหมด</a></li>
                        </ul>
                    </li>
                    <li><a href="do_join_work.php"><img src="../img/png/file.png" width="25px" height="25px"> การสมัครงานนักศึกษา</a> </li>

                </ul>
            </div>
    </nav>

</div>
<div id="page-wrapper">
    <div id="crop">
        <div class="book">
            <div class="page">
                <div class="subpage">
                    <br>

                    <div align="center">
                        <div style="margin-top: 5px"><font
                                size="5"><u><b>แบบประเมินผลการนำเสนอผลสำเร็จของโครงงานสหกิจศึกษา</b></u></font></div>
                        <br>
                    </div>
                    <form action="../php/update_evaluation_for_teacher.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="cid" value="<?= $row_work['cid'] ?>"/>
                        <input type="hidden" name="sid" value="<?= $row_work['sid'] ?>"/>
                        <input type="hidden" name="tid" value="<?= $row_work['tid'] ?>"/>
                        สถานประกอบการ <input type="text"  data-onload="set_size($(this),500)"
                                                      value="<?= $row_work['c_name'] ?> " readonly="readonly"
                                                      style="margin-top: 5px;"> <br>
                        นักศึกษา <input type="text"  value=" <?= $row_work['fn_st'] ?> <?= $row_work['ln_st'] ?>"
                                            data-onload="set_size($(this),500)"
                                            style="margin-top: 5px;">



                        <br><br>


                        <font size="4"><b>ผลสำเร็จของงาน / Work Achievement</b></font>
                        <table border="1" width="100%">
                            <thead>
                            <tr>
                                <th class="text-center">หัวข้อประเมิน / Items</th>
                                <th class="text-center"> คะแนนเต็ม </th>
                                <th class="text-center"> คะแนนที่ได้</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><b> &nbsp;1.	ความครอบคลุมของเนื้อหา  และบทสรุป </b><br>
                                    &nbsp;&nbsp;&nbsp; - พิจารณาสมมติฐานของหัวข้อโครงงาน <br>
                                    &nbsp;&nbsp;&nbsp; - ความถูกต้องของเนื้อหา<br>
                                    &nbsp;&nbsp;&nbsp; - มีขั้นตอนการทดลองเก็บ    ข้อมูล วิเคราะห์ <br>
                                    &nbsp;&nbsp;&nbsp; - สรุปผลตามวิธีการหรือเครื่องมือที่เลือกใช้ และโรงงานสามารถนำ <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ผลลัพธ์ไปประยุกต์ใช้ได้จริง

                                </td>
                                <td class="text-center"> 40 </td>
                                <td class="text-center"><textarea name="no1" data-onload="set_size($(this),100)"
                                              style="margin-top: 5px;"
                                              rows="3" required="required"   maxlength="2" id="mynumber"
                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                            </tr>
                            <tr>
                                <td><b> &nbsp; 2. ความสามารถในการนำเสนอ และการใช้สื่อ  </b><br>
                                    &nbsp; &nbsp; -	มีสื่อและวิธีการนำเสนอที่เหมาะสม มีการใช้ความคิด มีความเข้าใจ

                                </td>
                                <td class="text-center"> 20 </td>
                                <td class="text-center"><textarea name="no2" data-onload="set_size($(this),100)"
                                                                  style="margin-top: 5px;"
                                                                  rows="1" required="required"   maxlength="2" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                            </tr>
                            <tr>
                                <td><b> &nbsp; 3. ความสามารถในการตอบคำถาม</b> <br>
                                    &nbsp;&nbsp;&nbsp; -	มีการใช้ความคิด มีความเข้าใจ ตอบคำถามได้ถูกต้องตามหลักวิชาการ
                                </td>
                                <td class="text-center"> 20 </td>
                                <td class="text-center"><textarea name="no3" data-onload="set_size($(this),100)"
                                                                  style="margin-top: 5px;"
                                                                  rows="1" required="required"   maxlength="2" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                            </tr>
                            <tr>
                                <td><b> &nbsp; 4. การรักษาเวลา </b></td>
                                <td class="text-center"> 10 </td>
                                <td class="text-center"><textarea name="no4" data-onload="set_size($(this),100)"
                                                                  style="margin-top: 5px;"
                                                                  rows="1" required="required"   maxlength="2" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                            </tr>
                            <tr>
                                <td><b> &nbsp; 5. บุคลิกภาพโดยทั่วไป </b> <br>  </td>
                                <td class="text-center"> 10 </td>
                                <td class="text-center"><textarea name="no5" data-onload="set_size($(this),100)"
                                                                  style="margin-top: 5px;"
                                                                  rows="1" required="required"   maxlength="2" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                            </tr>
                            <tr bgcolor="#7fffd4">
                                <td class="text-center"><b>รวม </b> </td>
                                <td class="text-center"><b>100 </b> </td>
                                <td class="text-center"> </td>
                            </tr>
                            </tbody>
                        </table>
                        <br><br><br>
                        <p align="right">
                            ลงชื่อ  <input type="text" name="evaluator"
                                                                   data-onload="set_size($(this),150)"
                                                                   style="margin-top: 5px;" required="required" >
                            <br></p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        (<input type="text" data-onload="set_size($(this),150)" style="margin-top: 5px;"
                                required="required" >)
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



                        <input type="text" name="d" value="<?php echo thaidate('j'); ?>" readonly="readonly"
                               data-onload="set_size($(this),25)" style="margin-top: 5px;">/
                        <input type="text" name="m" value="<?php echo thaidate('F'); ?>" readonly="readonly"
                               data-onload="set_size($(this),60)" style="margin-top: 5px;">/
                        <input type="text" name="y" value="<?php echo thaidate('Y'); ?>" readonly="readonly"
                               data-onload="set_size($(this),40)" style="margin-top: 5px;">
                        <br><br><br><br><br>

                        <div class="text-right">
                            <button type="submit" class="btn btn-success"><font size="4">ประเมิน</font></button>
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
<script>
    function set_size(input, width) {
        input.css("width", width + "px");
        //alert(width);
    }

    $('[data-onload]').each(function () {
        eval($(this).data('onload'));
    });
</script>
</body>
</html>