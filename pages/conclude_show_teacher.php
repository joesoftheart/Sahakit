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

        $status = $_SESSION['status'];
        $fn_te = $_SESSION['fn_te'];
        $ln_te = $_SESSION['ln_te'];
        $id = $_REQUEST['id'];


        $sql1 = "SELECT * FROM register_work,company,student
                          WHERE register_work.cid = company.cid AND register_work.sid = student.sid
                          AND register_work.sid = $id";
        $objquery = mysqli_query($link, $sql1) or die(mysqli_error($sql1));
        $result = mysqli_fetch_array($objquery);

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
            <a class="navbar-brand" href="index.php"> <i class="fa fa-home"></i> หน้าแรก </a>
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
                    <li><a href="do_join_work.php"><img src="../img/png/file.png" width="25px" height="25px"> สรุปคะแนนการปฏิบัติงาน</a> </li>

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
                        <p class="text-right" style="margin-top: -6%">( <?=  $i ?> )</p>

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
                            <div align="center"> ลักษณะงานที่ปฎิบัติ </div>
                            <textarea  data-onload="set_size($(this),550)"  style="margin-top: 5px;" rows="3" readonly>
                            <?PHP echo $row_note["job_work"] ?>
                            </textarea>
                            <div align="center"> ปัญหาที่พบ </div>
                            <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                                <?PHP echo $row_note["problem"] ?>
                            </textarea>
                            <div align="center"> แนวทางการแก้ไขปัญหา </div>
                            <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                                <?PHP echo $row_note["work_fix"] ?>
                            </textarea>
                            <div align="center"> หมายเหต </div>
                            <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                                <?PHP echo $row_note["note"] ?>
                            </textarea>

                            <div align="center"> บันทึกเพิ่มเติม</div>
                            <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                                <?PHP echo $row_note["save_note"] ?>
                            </textarea>
                        </div>
                    </div>
                </div>
            <?PHP  }
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
                        <div align="center"> ลักษณะงานที่ปฎิบัติ </div>
                        <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                            <?PHP echo $row["job_work"] ?>
                        </textarea>
                        <div align="center"> ปัญหาที่พบ </div>
                        <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                            <?PHP echo $row["problem"] ?>
                        </textarea>
                        <div align="center"> แนวทางการแก้ไขปัญหา </div>
                        <textarea data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="3" readonly>
                            <?PHP echo $row["work_fix"] ?>
                        </textarea>
                        <div align="center"> หมายเหต </div>
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
                            <textarea name="offer"  data-onload="set_size($(this),550)" style="margin-top: 5px;" rows="4" readonly="readonly""> <?= $row['offer'] ?> </textarea>
                        </div><br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ลงชื่อ <input type="text" name="name_leder" value="<?= $row['name_leder'] ?>" data-onload="set_size($(this),150)"
                                      style="margin-top: 5px;" readonly="readonly""> พนักงานที่ปรึกษา / ผู้ควบคุมการปฏิบัติงาน <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        (<input type="text" value="<?= $row['name_leder'] ?>" data-onload="set_size($(this),150)"
                                style="margin-top: 5px;" readonly="readonly"">)<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ตำแหน่ง <input type="text" name="rank_leder" value="<?= $row['rank_leder'] ?>" data-onload="set_size($(this),175)"
                                       style="margin-top: 5px;" readonly="readonly">



                        <br><br><br>
                        <div class="btn" align="center" style="margin-bottom: 20px;">
                            <a href="conclude_show_teacher_print.php?id=<?= $id ?>" class="fa fa-print" data-toggle="tooltip" data-placement="top" title="ปริ้น" style="font-size: 50px;cursor: pointer;margin-left: 220px; margin-right: 200px;" ></a>


                            <a href="list_conclude_teacher.php?id=<?= $row['uid'] ?>" class="btn  btn-primary" > ย้อนกลับ </a>
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