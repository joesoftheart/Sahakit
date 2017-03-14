<?php session_start();
error_reporting("E_ALL & ~E_NOTICE");
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
    <script src="../vendor/jquery/jquery.js"></script>
    <script src="../vendor/jquery/jquery-ui.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../vendor/js/function.js"></script>

    <title>สหกิจศึกษา</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/jquery/jquery-ui.css" rel="stylesheet">
    <link href="../vendor/jquery/jquery-ui.theme.css" rel="stylesheet">
    <link href="../vendor/jquery/jquery-ui.structure.css" rel="stylesheet">
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

        .crop {
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
            font-family: 'THSarabunPSK';
        }

        .ui-datepicker td span, .ui-datepicker td a{
            color: #ffffff;
        }
        .ui-datepicker th{
            color: #ffffff;
        }
        .ui-datepicker .ui-datepicker-next{
            background: url("../image/button.png");
            background-position: -176px -18px;
            cursor: pointer;
        }
        .ui-datepicker .ui-datepicker-prev{
            background: url("../image/button.png");
            background-position: -24px -18px;
            cursor: pointer;
        }
        .ui-datepicker-trigger{
            background: url("../image/calendar.png");
            background-size: 100% 100%;
            width: 40px;
            opacity: 0.2;
            border: none;
            color:#333332;
        }
        .ui-datepicker-trigger:hover{
            opacity: 1;
        }

        .ui-datepicker-month,.ui-datepicker-year{
            color: #000;
            font-family: 'THSarabunPSK';
        }

        .ui-datepicker{
            background: #3f85c3;
        }
        .ui-state-default{
            font-size:10px;
        }

        .ui-datepicker .ui-datepicker-header{
            background: #3f85c3 !important;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        input[type="text"] {
            border: none;
           /* border-bottom: dotted #0f0f0f 1px; */
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
        .ui-datepicker-trigger > img{
            width:20px;
        }
    </style>


    <?php
    $status = null;

    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        $sid = $_SESSION["sid"];
        $fn_st = $_SESSION['fn_st'];
        $ln_st = $_SESSION['ln_st'];
        $idst = $_SESSION['idst'];

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
                                <li><a href="list_note_company.php">ดูประวัติสมุดบันทึกประจำวัน</a> </li>
                                <li><a href="list_conclude_company.php">ดูสมุดบันทึกการฝึกงาน</a> </li>
                            </ul>
                        </li>
                        <li><a href="evaluation_for_company_1.php">ประเมินนักศึกษา</a> </li>
                    <?php }else{ ?>

                    <?php } ?>
                </ul>
            </div>
    </nav>
</div>
<div id="page-wrapper">
    <form action="../php/get_note.php" method="post" >
    <table style="margin-top: 5px;margin-left: 50px;font-size:15px;width:90%;" class="table" >
        <tr>
            <th>สัปดาห์ที่</th>
            <th>สถานะ</th>
            <th>วันที่</th>
            <th>เข้างาน</th>
            <th>ออกงาน</th>
            <th>ลักษณะงานที่ปฎิบัติ/หมายเหตุ</th>
            <th>สถานะ</th>
        </tr>
        <?PHP
        $sql_list = "SELECT * FROM execute WHERE uid= ".$sid." ";
        $sql_listquery = mysqli_query($link,$sql_list)or die(mysqli_errror($link));
        while($row=mysqli_fetch_array($sql_listquery)){
        ?>
        <tr style="cursor: pointer;" onclick="window.open('note_show.php?id=<?PHP echo $row["id"] ?>','_blank')" >
            <td><?PHP echo $row["week"] ?></td>
            <td><?PHP if($row["type"] == 0 ) { echo "ปฎิบัติงาน"; }else  { echo "ลางาน"; } ?></td>
            <td><?PHP echo $row["date"] ?></td>
            <td><?PHP echo $row["start_minute"] ?>:<?PHP echo $row["start_secound"] ?></td>
            <td><?PHP echo $row["end_minute"] ?>:<?PHP echo $row["end_secound"] ?></td>
            <td><?PHP echo $row["job_work"] ?></td>
            <td><?PHP if($row["status"] == 0 ) { echo "รอตรวจ"; } else{ echo "ตรวจสอบแล้ว"; }  ?></td>
        </tr>
        <?PHP
        }
        ?>
    </table>
    </form>
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
</body>
</html>