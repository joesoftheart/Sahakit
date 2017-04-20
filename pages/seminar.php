<?php session_start();
include '../php/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sahakit System</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">




    <?php
    $status = null;

    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
    }

    ?>
</head>

<body>
<?php include 'menu_index.php'?>

    <div id="page-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- .panel-heading -->
                    <div class="panel-body">
                        <table width="80%" cellpadding="0" cellspacing="0" border="0">

                            <tbody><tr>
                                <td valign="top" colspan="2"><strong>การสัมมนาวิชาการ พร้อมส่งรายงานวิชาการ</strong></td>
                            </tr>

                            <tr>
                                <td valign="top" colspan="2" class="news"><strong>เข้ารับการสัมภาษณ์โดยอาจารย์ที่ปรึกษาสหกิจศึกษาประจำสาขาวิชา&nbsp;</strong><br>
                                    โดยอาจารย์จะสัมภาษณ์นักศึกษาทันทีที่กลับจากการปฏิบัติงาน เพื่อสอบถามปัญหา ให้คำปรึกษาหารือ ข้อเสนอแนะและแนวคิดที่ถูกต้องในการพัฒนาตนเองของนักศึกษา&nbsp;<strong>พร้อมทั้งส่งรายงานทางวิชาการแก่อาจารย์ที่ปรึกษาสหกิจศึกษาและทำการแก้ไขให้สมบูรณ์ตามระยะเวลาที่อาจารย์ที่ปรึกษากำหนด</strong>&nbsp;<br>
                                    <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ร่วมสัมมนาแลกเปลี่ยนความคิดเห็นระหว่างนักศึกษา</strong><br>
                                    เพื่อพัฒนาความสามารถในการนำเสนอและถ่ายทอดประสบการณ์ ซึ่งเป็นสาระสำคัญของสหกิจศึกษา โครงการฯ จึงจัดให้นักศึกษาที่กลับจากสถานประกอบการร่วมสัมมนาแลกเปลี่ยนความคิดเห็นระหว่างนักศึกษากันเองภายใต้การกำกับดูแลของอาจารย์ที่ปรึกษาสหกิจศึกษาประจำสาขาวิชา โดยอาจารย์จะเป็นผู้ประเมินผลการนำเสนอ โดยมีหัวข้อการประเมินดังต่อไปนี้&nbsp;<br>
                                    - วิธีการนำเสนอ 30 คะแนน&nbsp;<br>
                                    - ความน่าสนใจของเนื้อหา 20 คะแนน<br>
                                    - การจัดเตรียมสื่อ 20 คะแนน&nbsp;<br>
                                    - บุคลิกภาพ 20 คะแนน<br>
                                    - การตอบคำถาม 5 คะแนน<br>
                                    - การรักษาเวลา 5 คะแนน&nbsp;</td>
                            </tr>
                            <tr>
                                <td valign="top" colspan="2" class="news1"><p align="left">
                                        <strong>** รวม 100 คะแนน หาร 5 เท่ากับ 20 คะแนน ในส่วนของการนำเสนอโครงงาน</strong></p></td>
                            </tr>

                            </tbody></table>
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

</body>

</html>
