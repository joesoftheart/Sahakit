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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

    <script>
        $(document).ready(function(){

            // hide #back-top first
            $("#back-top").hide();

            // fade in #back-top
            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 100) {
                        $('#back-top').fadeIn();
                    } else {
                        $('#back-top').fadeOut();
                    }
                });

                // scroll body to 0px on click
                $('#back-top a').click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
            });

        });
    </script>

    <style>

        .credits {
            border-bottom: solid 1px #eee;
            padding-bottom: 10px;
            margin: 0 0 30px;
        }
        #pagewrap {
            margin: 0 auto;
            width: 600px;
            padding-left: 150px;
            position: relative;
        }

        /*
        Back to top button
        */
        #back-top {
            position: fixed;
            bottom: 30px;
            margin-left: -150px;
        }
        #back-top a {
            width: 108px;
            display: block;
            text-align: center;
            font: 11px/100% Arial, Helvetica, sans-serif;
            text-transform: uppercase;
            text-decoration: none;
            color: #bbb;
            /* background color transition */
            -webkit-transition: 1s;
            -moz-transition: 1s;
            transition: 1s;
        }
        #back-top a:hover {
            color: #000;
        }
        /* arrow icon (span tag) */
        #back-top span {
            width: 108px;
            height: 108px;
            display: block;
            margin-bottom: 7px;
            background: #ddd url(../img/up-arrow.png) no-repeat center center;
            /* rounded corners */
            -webkit-border-radius: 15px;
            -moz-border-radius: 15px;
            border-radius: 15px;
            /* background color transition */
            -webkit-transition: 1s;
            -moz-transition: 1s;
            transition: 1s;
        }
        #back-top a:hover span {
            background-color: #777;
        }
    </style>
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

        $sql1 = "SELECT * FROM company INNER JOIN register_work ON register_work.cid = $cid
                                        INNER JOIN student ON register_work.cid = student.sid";
        $objquery = mysqli_query($link, $sql1) or die(mysqli_error($sql1));
        $result = mysqli_fetch_array($objquery);


    }
    ?>

</head>
<body id="top">
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
                        class="fa fa-user"></i>  <b class="caret"></b> </a>
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
                    <?php $check = $result['c_status_join']; if ($check == 1) {?>
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
                                <li><a href="list_note_company.php">ดูบันทึกรายวัน</a> </li>
                                <li><a href="list_conclude_company.php">ดูบันทึกรายสัปดาห์</a></li>
                            </ul>
                        </li>
                        <li><a href="evaluation_for_company_1.php">ประเมินนักศึกษา</a> </li>
                    <?php } ?>
                </ul>
            </div>
    </nav>
</div>
<div id="page-wrapper">
    <div id="crop">
        <div class="book">
            <?PHP
            $sql_list = "SELECT * FROM conclude WHERE id= ".$_GET['id']." ";
            $sql_listquery = mysqli_query($link,$sql_list)or die(mysqli_errror($link));
            while($row=mysqli_fetch_array($sql_listquery)) {
            $date_list_start = $row["date_start_now"];
            $date_list_end = $row["date_start_end"];
            $hour_amount = "";

            //echo $row["date"];
            $sql_list_not = "SELECT * FROM execute WHERE date_now BETWEEN '$date_list_start' AND '$date_list_end'   ";
            //echo $sql_list_not;
            $sql_list_not_query = mysqli_query($link,$sql_list_not)or die(mysqli_errror($link));
            for($i=1; $row_note=mysqli_fetch_array($sql_list_not_query);$i++ ) {
                $date_note = explode("-",$row_note["date"]);
                $hour_amount += $row_note["hour_amount"];
                ?>
                <div class="page">
                    <div class="subpage">
                        <p class="text-right" style="margin-top: -8%">( <?=  $i ?> )</p><br><br><br><br><br>

                        สัปดาห์ที่ <input type="text" data-onload="set_size($(this),70)" value="<?PHP echo $row_note["week"] ?>" style="margin-top: -5px;" readonly>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <font size="5"><b>บันทึกการปฎิบัติประจำวัน</b></font> <br>
                        <div style="border: solid 1px">
                            วันที่<input type="text" data-onload="set_size($(this),25)" readonly value="<?PHP echo $date_note[0]  ?>" style="margin-top: 5px;">/
                            <input type="text" data-onload="set_size($(this),70)" readonly value="<?PHP echo $date_note[1]  ?>" style="margin-top: 5px;">/
                            <input type="text" data-onload="set_size($(this),35)" readonly value="<?PHP echo $date_note[2]  ?>" style="margin-top: 5px;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เวลาเริ่มปฎิบัติงาน
                            <input type="text" data-onload="set_size($(this),35)" readonly value="<?PHP echo $row_note["start_minute"] ?>:<?PHP echo $row_note["start_secound"] ?>" style="margin-top: 5px;">น. เวลาเลิกปฎิบัติงาน
                            <input type="text" data-onload="set_size($(this),35)" readonly value="<?PHP echo $row_note["end_minute"] ?>:<?PHP echo $row_note["end_secound"] ?>" style="margin-top: 5px;">น.  <br>
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
                            <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="2" readonly>
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
                    </div>

                </div>
                <?PHP
            }
            ?>

            <div class="page">
                <div class="subpage">
                    <div align="center"><font size="5"><b>สรุปผลบันทึกการปฎิบัติงานประจำวัน &nbsp;&nbsp;&nbsp;ในรอบสัปดาห์ที่
                                <input type="text" data-onload="set_size($(this),45)" readonly value="<?PHP echo $row["week"] ?>"
                                       style="margin-top: 5px;"></b></font><br>
                        ระหว่างวันที่
                        <input type="text" data-onload="set_size($(this),150)" readonly value="<?PHP echo $row["date_start"] ?>" style="margin-top: 5px;"> ถึงวันที่ <input type="text" data-onload="set_size($(this),150)" readonly value="<?PHP echo $row["date_end"] ?>" style="margin-top: 5px;">

                    </div>
                    <div style="border: solid 1px">

                        ลักษณะงานที่ปฎิบัติ <br>
                        <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                            <?PHP echo $row["job_work"] ?>
                        </textarea>
                        ปัญหาที่พบ <br>
                        <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                            <?PHP echo $row["problem"] ?>
                        </textarea>
                        แนวทางการแก้ไขปัญหา <br>
                        <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                            <?PHP echo $row["work_fix"] ?>
                        </textarea>
                        หมายเหต <br>
                        <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="2" readonly>
                            <?PHP echo $row["note"] ?>
                        </textarea>

                    </div>
                    <br>
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
                        <textarea name="offer"  data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="4" required="required"> <?= $row['offer'] ?> </textarea>
                    </div><br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ลงชื่อ <input type="text" name="name_leder" value="<?= $row['name_leder'] ?>" data-onload="set_size($(this),150)"
                                  style="margin-top: 5px;" required="required"> พนักงานที่ปรึกษา / ผู้ควบคุมการปฏิบัติงาน <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    (<input type="text" value="<?= $row['name_leder'] ?>" data-onload="set_size($(this),150)"
                            style="margin-top: 5px;" required="required">)<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    ตำแหน่ง <input type="text" name="rank_leder" value="<?= $row['rank_leder'] ?>" data-onload="set_size($(this),175)"
                                   style="margin-top: 5px;" required="required">


                    <br><br><br><br>
                    <div class="text-right">
                    <button type="submit" class="btn btn-success" value="ยืนยัน"> ยืนยัน </button>
                        </div>
                    </form>
                    <p id="back-top">
                        <a href="#top" style="margin-left: 780%"><span></span>Back to Top</a>
                    </p>
                </div>
            </div>
        </div>
        <?PHP
        }
        ?>


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