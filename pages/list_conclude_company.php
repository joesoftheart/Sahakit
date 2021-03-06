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


    <title>สหกิจศึกษา</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/jquery/jquery-ui.css" rel="stylesheet">
    <link href="../vendor/jquery/jquery-ui.theme.css" rel="stylesheet">
    <link href="../vendor/jquery/jquery-ui.structure.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">




    <script src="../vendor/jquery/jquery.js"></script>
    <script src="../vendor/jquery/jquery-ui.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../vendor/js/function.js"></script>



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

        $status = $_SESSION['status'];
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];

        $sql_all = "SELECT * FROM company INNER JOIN register_work ON register_work.cid = $cid 
                                                 INNER JOIN student ON register_work.sid = student.sid
                                                 WHERE company.c_status_join = 1";
        $query_all = mysqli_query($link, $sql_all) or die(mysqli_error($sql_all));
        $result = mysqli_fetch_array($query_all);

    $sql3 = "SELECT * FROM company WHERE cid= $cid AND c_status_join = 1";
    $qquery = mysqli_query($link,$sql3);
    $result = mysqli_fetch_array($qquery);

    ?>
</head>
<body>
<?php include 'menu_company.php'?>
<div id="page-wrapper">
    <form action="../php/get_note.php" method="post" >
    <table style="margin-top: 5px;margin-left: 50px;font-size:15px;width:90%;" class="table" >
        <tr>
            <th>ชื่อนักศึกษา</th>
            <th>สัปดาห์ที่</th>
            <th>วันที่เริ่ม</th>
            <th>วันที่สิ้นสุด</th>
            <th>ลักษณะงานที่ปฎิบัติ/หมายเหตุ</th>
            <th></th>
        </tr>
        <?PHP
        $sql_list = "SELECT * FROM conclude  WHERE cid = $cid";
        $sql_listquery = mysqli_query($link,$sql_list)or die(mysqli_errror($link));
        ?>



      <?php  while($row=mysqli_fetch_array($sql_listquery)){
          $sql_student ="SELECT * FROM execute INNER JOIN student ON student.sid = execute.uid";
          $query_student = mysqli_query($link,$sql_student);
          $row_student = mysqli_fetch_array($query_student);?>
        <tr style="cursor: pointer;" onclick="window.open('conclude_show_company.php?id=<?PHP echo $row["id"] ?>','_blank')" >
            <td><?PHP echo $row_student['fn_st'] ?> <?PHP echo $row_student['ln_st'] ?></td>
            <td><?PHP echo $row["week"] ?></td>
            <td><?PHP echo $row["date_start"] ?></td>
            <td><?PHP echo $row["date_end"] ?></td>
            <td><?PHP echo $row["job_work"] ?></td>
            <td><?PHP $check1 = $row["status"];  if($check1 == 0 ) { ?>
                    <font color="red">ยังไม่ตรวจ</font>
                <?php } else{ ?>
                    <font color="green">ตรวจสอบแล้ว </font>
                <?php }  ?></td>
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