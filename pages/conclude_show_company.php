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

    <title>สหกิจศึกษา</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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


    <?php
    $status = null;

    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];

        $sql1 = "SELECT * FROM register_work,company,student
                          WHERE register_work.cid = company.cid AND register_work.sid = student.sid";
        $objquery = mysqli_query($link, $sql1) or die(mysqli_error($sql1));
        $result = mysqli_fetch_array($objquery);


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
                    <?php $check = $result['c_status_join'];
                    if ($check == 1) { ?>
                        <li><a href="#"><i class="fa fa-bullhorn"></i> ประกาศรับสมัครนักศึกษาฝึกงาน <i
                                    class="fa arrow"></i>
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
                        <li><a href="evaluation_for_company_1.php">ประเมินนักศึกษา</a></li>
                    <?php } else { ?>

                    <?php } ?>
                </ul>
            </div>
    </nav>
</div>
<div id="page-wrapper">
    <div id="crop">
        <div class="book">
            <?PHP
            $sql_list = "SELECT * FROM conclude WHERE id= " . $_GET['id'] . " ";
            $sql_listquery = mysqli_query($link, $sql_list) or die(mysqli_errror($link));
            while ($row = mysqli_fetch_array($sql_listquery)) {
            $date_list_start = $row["date_start_now"];
            $date_list_end = $row["date_start_end"];
            $hour_amount = "";

            //echo $row["date"];
            $sql_list_not = "SELECT * FROM execute WHERE date_now BETWEEN '$date_list_start' AND '$date_list_end'   ";
            //echo $sql_list_not;
            $sql_list_not_query = mysqli_query($link, $sql_list_not) or die(mysqli_errror($link));
            while ($row_note = mysqli_fetch_array($sql_list_not_query)) {
            $date_note = explode("-", $row_note["date"]);
            $hour_amount += $row_note["hour_amount"];
            ?>
            <div class="page">
                <div class="subpage">

                    สัปดาห์ที่ <input type="text" data-onload="set_size($(this),70)"
                                      value="<?PHP echo $row_note["week"] ?>" style="margin-top: -5px;" readonly>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <font size="5"><b>บันทึกการปฎิบัติประจำวัน</b></font> <br>
                    <div style="border: solid 1px">
                        วันที่<input type="text" data-onload="set_size($(this),25)" value="<?PHP echo $date_note[0] ?>"
                                     style="margin-top: 5px;" readonly>/
                        <input type="text" data-onload="set_size($(this),70)" value="<?PHP echo $date_note[1] ?>"
                               style="margin-top: 5px;" readonly>/
                        <input type="text" data-onload="set_size($(this),35)" value="<?PHP echo $date_note[2] ?>"
                               style="margin-top: 5px;" readonly>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เวลาเริ่มปฎิบัติงาน
                        <input type="text" data-onload="set_size($(this),35)"
                               value="<?PHP echo $row_note["start_minute"] ?>:<?PHP echo $row_note["start_secound"] ?>"
                               style="margin-top: 5px;" readonly>น. เวลาเลิกปฎิบัติงาน
                        <input type="text" data-onload="set_size($(this),35)"
                               value="<?PHP echo $row_note["end_minute"] ?>:<?PHP echo $row_note["end_secound"] ?>"
                               style="margin-top: 5px;" readonly>น. <br>
                        ลักษณะงานที่ปฎิบัติ <br>
                        <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                            <?PHP echo $row_note["job_work"] ?>
                            </textarea>
                        ปัญหาที่พบ <br>
                        <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                                <?PHP echo $row_note["problem"] ?>
                            </textarea>
                        แนวทางการแก้ไขปัญหา <br>
                        <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                                <?PHP echo $row_note["work_fix"] ?>
                            </textarea>
                        หมายเหต <br>
                        <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="5" readonly>
                                <?PHP echo $row_note["note"] ?>
                            </textarea>

                    </div>
                </div>
            </div>

            <div class="page">
                <div class="subpage">
                    <div align="center"> บันทึกเพิ่มเติม</div>
                    <div style="border: solid 1px">

                            <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="15" readonly>
                                <?PHP echo $row_note["save_note"] ?>
                            </textarea>


                    </div>
                    <br><br><br><br>
                    <div align="center">
                        <font size="5"><b>รวมจำนวนชั่วโมงที่ปฏิบัติงานสหกิจศึกษาทั้งหมดในสัปดาห์นี้ &nbsp;&nbsp;&nbsp;
                                เท่ากับ <input type="text" data-onload="set_size($(this),45)"
                                               value="<?PHP echo $hour_amount; ?>" style="margin-top: 5px;" readonly> ชั่วโมง</b></font>
                    </div>
                    <form action="../php/update_conclude_company.php" method="post" enctype="multipart/form-data">
                    <div style="border: solid 1px">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <font style="5"><u><b>ข้อเสนอแนะจากพนักงานที่ปรึกษา /
                                    ผู้ควบคุมการปฏิบัติงานสหกิจศึกษา</b></u></font>
                        <textarea name="offer"  data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="4" required> <?= $row['offer'] ?> </textarea>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ลงชื่อ <input type="text" name="name_leder" value="<?= $row['name_leder'] ?>" data-onload="set_size($(this),150)"
                                  style="margin-top: 5px;" required> พนักงานที่ปรึกษา / ผู้ควบคุมการปฏิบัติงาน <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    (<input type="text" value="<?= $row['name_leder'] ?>" data-onload="set_size($(this),150)"
                            style="margin-top: 5px;" required>)<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ตำแหน่ง <input type="text" name="rank_leder" value="<?= $row['rank_leder'] ?>" data-onload="set_size($(this),175)"
                                   style="margin-top: 5px;" required>


                    <br><br><br><br>
                    <div class="text-right">
                    <button type="submit" class="btn btn-success" value="ยืนยัน"> ยืนยัน </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?PHP
        }
        ?>


    </div>
    <?PHP
    }
    ?>


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