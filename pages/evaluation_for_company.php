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
            var ValidChars = "12345.";
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
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];
        $sid = $_REQUEST['sid'];


        $sql = "SELECT * FROM register_work , company , student 
                    WHERE register_work.cid = company.cid 
                    AND register_work.sid = student.sid 
                    AND register_work.sid = $sid";

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
            <a class="navbar-brand" href="index.php"><font color="black"> <i class="fa fa-home"></i>หน้าแรก </font> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li><?= $status ?></li>
            <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?= $c_name ?> <i
                        class="fa fa-user"></i> <b class="caret"></b> </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="profile_company.php"><i class="glyphicon glyphicon-user"></i> โปรไฟล์</a></li>
                    <li><a href="editprofile_company.php"><i class="glyphicon glyphicon-edit"></i> เปลี่ยนรหัสผ่าน</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="../php/logout.php"><i class="glyphicon glyphicon-off"></i> ลงชื่อออก</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="#"><i class="fa fa-book"></i> คู่มือ สถานประกอบการ <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="receive_stu.php">ขั้นตอนการรับนักศึกษา</a></li>
                            <li><a href="manual_company.php">คู่มือสถานประกอบการ</a></li>
                            <li><a href="visit_comp.php">วัตถุประสงค์ของการนิเทศงาน</a></li>
                            <li><a href="evaluation_comp.php">การประเมินผลนักศึกษา</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-bullhorn"></i> ประกาศรับสมัครนักศึกษาฝึกงาน <i class="fa arrow"></i>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="work_post.php">ประกาศรับฝึกงาน</a></li>
                            <li><a href="work_post_edit.php">รายการโพสย้อนหลัง</a></li>
                        </ul>
                    </li>

                    <li><a href="#">นักศึกษาฝึกงาน <span class="fa arrow"></span> </a>
                        <ul class="nav nav-second-level">
                            <li><a href="name_student_join.php">รายชื่อนักศึกษาที่สมัครงานเข้ามา</a></li>
                            <li><a href="now_student_work.php">รายชื่อนักศึกษาที่กำลังฝึกงาน</a></li>

                            <li><a href="last_work.php">รายชื่อนักศึกษาที่ผ่านการฝึกงาน</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-list-alt  "></i> ตรวจสอบความก้าวหน้า</a>
                        <ul class="nav nav-second-level">
                            <li><a href="list_conclude_company.php">ดูสมุดบันทึกประจำวัน</a></li>
                        </ul>
                    </li>
                    <li><a href="evaluation_for_company_1.php">ประเมินนักศึกษา</a> </li>

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
                                size="5"><u><b>แบบประเมินผลการปฏิบัติงานสหกิจศึกษา</b></u></font></div>
                        <br>
                    </div>
                    <font size="4"><b>(ผู้ให้ข้อมูล : <u>สถานประกอบการ</u>)</b></font> <br> <br>
                    <font size="3"><b><u>คำชี้แจง</u></b></font> <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.
                    ผู้ให้ข้อมูลในแบบประเมินนี้ต้องเป็นพนักงานที่ปรึกษา (Job supervisor)
                    ของนักศึกษาสหกิจศึกษาหรือบุคคลที่ได้รับมอบหมายให้ทำหน้าที่แทน <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. เมื่อประเมินผลเรียบร้อยแล้ว
                    โปรดปิดผนึกและลงลายมือชื่อกำกับเอกสารสำคัญฉบับนี้ด้วย และให้นักศึกษานำส่งที่งานสหกิจศึกษา <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3. โปรดให้คะแนนในช่อง <img src="../img/table.PNG"
                                                                                          height="20px">
                    ในแต่ละหัวข้อการประเมิน (5 = มากที่สุด 4 = มาก 3 = ปานกลาง
                    2 = น้อย 1 = น้อยที่สุด) หากไม่มีข้อมูลให้ใส่เครื่องหมาย - และโปรดให้ความคิดเห็นเพิ่มเติม (ถ้ามี)
                    <br><br> <br>
                    <form action="../php/update_evaluation_for_company.php" method="post" enctype="multipart/form-data">
                        <font size="4"> <b>ข้อมูลทั่วไป / Work Term Information</b> </font> <br>
                        <input type="hidden" name="sid" value="<?= $sid ?>">
                        <input type="hidden" name="cid" value="<?= $cid ?>">
                        ชื่อ - สกุล (นักศึกษา) <input type="text" name="fn_st" data-onload="set_size($(this),150)"
                                                      value="<?= $row_work['fn_st'] ?>" readonly="readonly"
                                                      style="margin-top: 5px;"><input type="text" name="ln_st"
                                                                                      data-onload="set_size($(this),150)"
                                                                                      value="<?= $row_work['ln_st'] ?>"
                                                                                      readonly="readonly"
                                                                                      style="margin-top: 5px;">
                        รหัสนักศึกษา <input type="text" name="number_id" value="<?= $row_work['number_id'] ?>"
                                            readonly="readonly" data-onload="set_size($(this),200)"
                                            style="margin-top: 5px;">
                        <br>
                        สาขาวิชา <input type="text" value="วิทยาการคอมพิวเตอร์" data-onload="set_size($(this),300)"
                                        readonly="readonly" style="margin-top: 5px;"> คณะ
                        <input type="text" value="วิทยาศาสตร์และเทคโนโลยี" data-onload="set_size($(this),305)"
                               readonly="readonly" style="margin-top: 5px;"> <br>
                        ชื่อสถานประกอบการ <input type="text" name="c_name" value="<?= $row_work['c_name'] ?>"
                                                 readonly="readonly" data-onload="set_size($(this),574)"
                                                 style="margin-top: 5px;"> <br>
                        ชื่อ - นามสกุลผู้ประเมิน <input type="text" name="name_leader" required="required"
                                                        data-onload="set_size($(this),300)"
                                                        style="margin-top: 5px;">
                        ตำแหน่ง <input type="text" name="rank_leader" required="required"
                                       data-onload="set_size($(this),210)"
                                       style="margin-top: 5px;">
                        <br><br>


                        <font size="4"><b>ผลสำเร็จของงาน / Work Achievement</b></font>
                        <table border="1" width="100%">
                            <thead>
                            <tr>
                                <th colspan="2" class="text-center">หัวข้อประเมิน / Items</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><b> &nbsp;1.ปริมาณงาน (Quantity of Work) </b><br>
                                    &nbsp; &nbsp;
                                    ปริมาณงานที่ปฏิบัติสำเร็จตามหน้าที่หรือตามที่ได้รับมอบหมายภายในระยะเวลาที่ <br>
                                    &nbsp; &nbsp;&nbsp; &nbsp; กำหนดและเทียบกับนักศึกษาทั่ว ๆ ไป
                                </td>
                                <td class="text-center"><textarea name="no1" data-onload="set_size($(this),100)"
                                                                  style="margin-top: 5px;"
                                                                  rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                            </tr>
                            <tr>
                                <td><b> &nbsp;2. คุณภาพงาน (Quantity of Work) </b><br>
                                    &nbsp; &nbsp; ทำงานได้ถูกต้องครบถ้วนสมบูรณ์ มีความปราณีตเรียบร้อย มีความรอบคอบ
                                    ไม่เกิด <br>
                                    &nbsp; &nbsp;&nbsp; &nbsp; ปัญหา ติดตามมา งานไม่ค้างคา
                                    ทำงานเสร็จทันเวลาหรือก่อนเวลาที่กำหนด
                                </td>
                                <td class="text-center"><textarea name="no2" data-onload="set_size($(this),100)"
                                                                  style="margin-top: 5px;"
                                                                  rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>

            <div class="page">
                <div class="subpage">
                    <p align="center"> -2- </p>
                    <font size="4"><b>ความรู้ความสามารถ / Knowledge and Ability </b></font>
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">หัวข้อประเมิน / Items</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><b> &nbsp;3. ความรู้ความสามารถทางวิชาการ (Academic Ability) </b><br>
                                &nbsp; &nbsp;
                                นักศึกษามีความรู้ทางวิชาการเพียงพอที่จะทำงานตามที่ได้รับมอบหมาย <br>
                                &nbsp; &nbsp;&nbsp; &nbsp; (ในระดับที่นักศึกษาจะปฏิบัติได้)
                            </td>
                            <td class="text-center"><textarea name="no3" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b> &nbsp;4. ความสามารถในการเรียนรู้และประยุกต์วิชาการ (Ability to Learn and Apply
                                    Knowledge)</b><br>
                                &nbsp; &nbsp; ความรวดเร็วในการเรียนรู้ เข้าใจข้อมูล ข่าวสาร และวิธีการทำงาน
                                ตลอดจนการนำ <br>
                                &nbsp;&nbsp;&nbsp; ความรู้ไปประยุกต์ใช้งาน
                            </td>
                            <td class="text-center"><textarea name="no4" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b> &nbsp;5. ความรู้ความชำนาญในการปฏิบัติงาน (Practical Ability)</b><br>
                                &nbsp; &nbsp; เช่น การปฏิบัติงานในภาคสนาม ในห้องปฏิบัติการ
                            </td>
                            <td class="text-center"><textarea name="no5" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b> &nbsp;6. วิจารญาณและการตัดสินใจ (Judgement and Decision Making)</b><br>
                                &nbsp; &nbsp; ตัดสินใจได้ดี ถูกต้อง รวดเร็ว มีการวิเคราะห์ข้อมูลและปัญหาต่าง ๆ
                                อย่างรอบคอบ ก่อนการ <br>
                                &nbsp;&nbsp;&nbsp; ตัดสินใจ สามารถแก้ปัญหาเฉพาะหน้า
                                สามารถไว้วางใจให้ตัดสินใจได้ด้วยตนเอง

                            </td>
                            <td class="text-center"><textarea name="no6" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;7. การจัดการและวางแผน (Organization and Planning)</b><br>
                                &nbsp; &nbsp; สามารถจัดการและวางแผนการทำงานให้เสร็จตามเป้าหมาย

                            </td>
                            <td class="text-center"><textarea name="no7" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;8. ทักษะการสื่อสาร (Communication Skills)</b><br>
                                &nbsp; ความสามารถในการติดต่อสื่อสาร การพูด การเขียน การนำเสนอ (Presentation) <br>
                                &nbsp; &nbsp;สามารถสื่อให้เข้าใจได้ง่าย เรียบร้อย ชัดเจน ถูกต้อง รัดกุม
                                มีลำดับขั้นตอนที่ดี ไม่ก่อให้เกิด <br>
                                &nbsp; &nbsp;ความสับสนต่อการทำงาน รู้จักสอบถาม
                                รู้จักชี้แจงผลการปฏิบัติงานและข้อขัดข้องให้ทราบ

                            </td>
                            <td class="text-center"><textarea name="no8" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;9. การพัฒนาด้านภาษาและวัฒนธรรมต่างประเทศ (Foreign Language and Cultural
                                    Development)</b><br>
                                &nbsp; &nbsp; เช่น ภาษาอังกฤษ การทำงานกับชาวต่างชาติ (ประเมินเฉพาะสถานประกอบการที่มี
                                <br>
                                &nbsp;&nbsp;&nbsp;ชาวต่างชาติหรือที่ใช้ภาษาต่างประเทศในการติดต่อสื่อสาร)

                            </td>
                            <td class="text-center"><textarea name="no9" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;10. ความเหมาะสมต่อตำแหน่งงานที่ได้รับมอบหมาย (Suitability for
                                    JobPosition)</b><br>
                                &nbsp; &nbsp; สามารถพัฒนาตนเองให้ปฏิบัติงานตาม Job position และ Job description
                                ที่มอบหมายได้อย่าง <br>
                                &nbsp; &nbsp; เหมาะสมหรือตำแหน่งงานนี้เหมาะสมกับนักศึกษาคนนี้หรือไม่เพียงใด
                            </td>
                            <td class="text-center"><textarea name="no10" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <font size="4"><b>ความรู้ความสามารถ / Knowledge and Ability </b></font>
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">หัวข้อประเมิน / Items</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><b>&nbsp;11. ความรับผิดชอบและเป็นผู้ที่ไว้วางใจได้ (Responsibility and
                                    Dependability)</b><br>
                                &nbsp; &nbsp; ดำเนินงานให้สำเร็จลุล่วงโดยคำนึงถึงเป้าหมายและความสำเร็จของงานเป็นหลัก
                                ยอมรับผล <br>
                                &nbsp; &nbsp; ที่เกิดจากการทำงานอย่างมีเหตุผล สามารถปล่อยให้ทำงาน (กรณีงานประจำ)
                                ได้โดยไม่ต้อง <br>
                                &nbsp; &nbsp; ควบคุมขั้นตอนในการทำงานตลอดเวลา
                                สามารถไว้วางใจได้และรับผิดชอบงานที่มากกว่างาน <br>
                                &nbsp; &nbsp; ประจำ สามารถไว้วางใจได้แทบทุกสถานการณ์หรือในสถานการณ์ปกติเท่านั้น
                            </td>
                            <td class="text-center"><textarea name="no11" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="page">
                <div class="subpage">
                    <p align="center"> -3- </p>
                    <table border="1" width="100%">
                        <tbody>
                        <tr>
                            <td><b>&nbsp;12. ความสนใจ อุตสาหะในการทำงาน (Interest in Work)</b><br>
                                &nbsp; &nbsp; ความสนใจและความกระตือรือร้นในการทำงาน มีความอุตสาหะ ความพยายาม
                                ความตั้งใจที่<br>
                                &nbsp; &nbsp; จะทำงานได้สำเร็จ ความมานะบากบั่น ไม่ย่อท้อต่ออุปสรรคและปัญหา <br>

                            </td>
                            <td class="text-center"><textarea name="no12" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;13. ความสามารถเริ่มต้นทำงานได้ด้วยตนเอง (Initiative or Self
                                    Starter)</b><br>
                                &nbsp; &nbsp; เมื่อได้รับคำชี้แนะ สามารถเริ่มทำงานได้เอง โดยไม่ต้องรอคำสั่ง
                                (กรณีงานประจำ) <br>
                                &nbsp; &nbsp; เสนอตัวเข้าช่วยงานแทบทุกอย่างมาขอรับงานใหม่ ๆ ไปทำ
                                ไม่ปล่อยเวลาว่างให้ล่วงเลยไป <br>
                                &nbsp; &nbsp; โดยเปล่าประโยชน์
                            </td>
                            <td class="text-center"><textarea name="no13" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;14. การตอบสนองต่อการสั่งการ (Response to Supervision)</b><br>
                                &nbsp; &nbsp; ยินดีรับคำสั่ง คำแนะนำ คำวิจารณ์ ไม่แสดงความอึดอัดใจ
                                เมื่อได้รับคำติเตือนและวิจารณ์ <br>
                                &nbsp; &nbsp; ความรวดเร็วในการปฏิบัติตามคำสั่ง การปรับตัวปฏิบัติตามคำแนะนำ
                                ข้อเสนอแนะและวิจารณ์

                            </td>
                            <td class="text-center"><textarea name="no14" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <font size="4"><b>ลักษณะส่วนบุคคล / Personality</b></font>
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">หัวข้อประเมิน / Items</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><b>&nbsp;15. บุคลิกภาพและการวางตัว (Personality)</b><br>
                                &nbsp; &nbsp; มีบุคลิกภาพและวางตัวได้เหมาะสม เช่น ทัศนคติ วุฒิภาวะ
                                ความอ่อนน้อมถ่อมตน<br>
                                &nbsp; &nbsp; การแต่งกาย กิริยาวาจา การตรงต่อเวลา และอื่น ๆ
                            </td>
                            <td class="text-center"><textarea name="no15" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;16. มนุษยสัมพันธ์ (Interpersonal Skills)</b><br>
                                &nbsp; &nbsp; สามารถร่วมงานกับผู้อื่น การทำงานเป็นทีม สร้างมนุษยสัมพันธ์ได้ดี
                                เป็นที่รักใคร่ <br>
                                &nbsp; &nbsp; ชอบพอของเพื่อนร่วมงาน เป็นผู้ที่ช่วยก่อให้เกิดความร่วมมือประสานงาน
                            </td>
                            <td class="text-center"><textarea name="no16" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>

                        <tr>
                            <td><b>&nbsp;17. ความมีระเบียบวินัย ปฏิบัติตามวัฒนธรรมขององค์กร <br>
                                    &nbsp; &nbsp;&nbsp;  (Discipline and Adaptability to Formal Organization)
                                </b><br>
                                &nbsp; &nbsp; ความสนใจเรียนรู้ ศึกษา กฏระเบียบ นโยบายต่าง ๆ และปฏิบัติตามโดยเต็มใจ
                                การปฏิบัติตาม <br>
                                &nbsp; &nbsp; ระเบียบบริหารงานบุคคล (การเข้างาน ลางาน
                                ปฏิบัติตามกฎการรักษาความปลอดภัยใน <br>
                                &nbsp; &nbsp; โรงงาน การควบคุมคุณภาพ 5 ส และอื่น ๆ)
                            </td>
                            <td class="text-center"><textarea name="no17" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;18. คุณธรรมและจริยธรรม (Ethics and Morality)</b><br>
                                &nbsp; &nbsp; มีความซื่อสัตย์ สุจริต มีจิตใจสะอาด รู้จักเสียสละ ไม่เห็นแก่ตัว
                                เอื้อเฟื้อช่วยเหลือผู้อื่น <br>

                            </td>
                            <td class="text-center"><textarea name="no18" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;19. ความมั่นใจในตนเอง (self confidence) </b><br>
                                &nbsp; &nbsp;มีความสามารถแก้ปัญหา รับมือกับปัญหาต่าง ๆ เผชิญหน้ากับความท้าทาย หรืออุปสรรคต่างๆ <br>
                                &nbsp; &nbsp;ในชีวิตได้ เชื่อมั่นในความคิด และความสามารถของตัวเอง สามารถเลือกวิธีการตัดสินใจที่ถูกต้อง มีความรู้สึกที่ดี <br>
                                &nbsp; &nbsp;ให้กับตนเอง ไว้วางใจตนเองว่ามีความสามารถ มีพลัง มีประสิทธิภาพ และพึ่งพาตนเองได้ เป็นต้น
                            </td>
                            <td class="text-center"><textarea name="no19" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>&nbsp;20. ความเป็นผู้นํา (Leadership) </b><br>
                                &nbsp; &nbsp;มีความสามารถทําให้คนอื่นให้ความร่วมมือ สามารถชักจูง โน้มน้าว ชี้แนะ แนะนํา ให้บุคคลอื่น <br>
                                &nbsp; &nbsp;ร่วมทํางานจนบรรลุวัตถุประสงค์เป็นศูนย์กลางหรือศูนย์รวม สามารถสอดแทรกแนวความคิดให้เป็น <br>
                                &nbsp; &nbsp;ที่ยอมรับ เป็นต้น
                            </td>
                            <td class="text-center"><textarea name="no20" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="page">
                <div class="subpage">
                    <p align="center"> -4- </p>
                    <b>21.โปรดให้ข้อคิดเห็นที่เป็นประโยชน์แก่นักศึกษา / Please give comments on the student</b>
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                            <th width="25%" height="10%" class="text-center">จุดเด่นของนักศึกษา / Strengh</th>
                            <th width="25%" height=" 10%" class="text-center">ข้อควรปรับปรุงของนักศึกษา / Needed
                                Improvement
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">  <textarea name="no21_1" data-onload="set_size($(this),350)"
                                                                style="margin-top: 5px;"
                                                                rows="3" required="required" ></textarea></td>
                            <td class="text-center"> <textarea name="no21_2" data-onload="set_size($(this),350)"
                                                               style="margin-top: 5px;"
                                                               rows="3" required="required" ></textarea></td>
                        </tr>

                        </tbody>
                    </table>
                    <br>
                    <b>
                        หากนักศึกษาผู้นี้สำเร็จการศึกษาแล้ว ท่านจะรับเข้าทำงานในสถานประกอบการนี้หรือไม่
                        (หากมีโอกาสเลือก)
                        Once this student graduates, will you be interested to offer him/her a job?</b> <br>
                    (&nbsp; <input type="radio" name="get_work" value="yes"> &nbsp;) รับ / yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    (&nbsp; <input type="radio" name="get_work" value="notsure"> &nbsp;)ไม่แน่ใจ / Not sure &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    (&nbsp;<input type="radio" name="get_work" value="no"> &nbsp;)ไม่รับ / No

                    <br><br>
                    <b> 22. ข้อคิดเห็นเพิ่มเติม / Other comments</b> <br>
                    <textarea name="comment" data-onload="set_size($(this),600)" style="margin-top: 5px;"
                              rows="5"></textarea>
                    <br><br><br>
                    <p align="right">
                        ลงชื่อ / Evaluator ‘s Signature <input type="text" name="evaluator"
                                                               data-onload="set_size($(this),150)"
                                                               style="margin-top: 5px;" required="required" >
                        พนักงานที่ปรึกษา <br></p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    (<input type="text" data-onload="set_size($(this),150)" style="margin-top: 5px;"
                            required="required" >)
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;


                    <input type="text" name="d" value="<?php echo thaidate('j'); ?>" readonly="readonly"
                           data-onload="set_size($(this),25)" style="margin-top: 5px;">/
                    <input type="text" name="m" value="<?php echo thaidate('F'); ?>" readonly="readonly"
                           data-onload="set_size($(this),60)" style="margin-top: 5px;">/
                    <input type="text" name="y" value="<?php echo thaidate('Y'); ?>" readonly="readonly"
                           data-onload="set_size($(this),40)" style="margin-top: 5px;">
                    <br><br><br><br><br><br><br><br>

                    <div class="text-right">
                        <button type="submit" class="btn btn-success"><font size="4">ประเมิน</font></button>
                    </div>
                    </form>
                </div>
            </div>
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