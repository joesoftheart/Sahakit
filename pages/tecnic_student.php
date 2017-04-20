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
                        <font color="red">สร้างเมื่อ วันพฤหัสบดี, 10 พฤศจิกายน 2559 20:28</font><br>
                        <table width="710"  class="news">
                            <tbody>
                            <tr>
                                <td colspan="3"><p><strong>ขั้นตอนที่ 1 : นักศึกษาต้องรู้จักตนเอง</strong></p></td>
                            </tr>
                            <tr>
                                <td width="10">&nbsp;</td>
                                <td width="10" valign="top"></td>
                                <td width="962"> รู้จักลักษณะงานที่สนใจและถนัด &nbsp;ตรงกับความสามารถของตนเอง เช่น ระดับความรู้ทางวิชาการ &nbsp;ผลการเรียน &nbsp;มีความชำนาญในงานด้านใด &nbsp; มีบุคลิกภาพและสุขภาพที่จะสามารถปฏิบัติงานนั้นได้
                                    <div></div></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td valign="top"></td>
                                <td>คุณสมบัติพิเศษประจำตัว เช่น ความสามารถในการพูด/เขียน/อ่าน ภาษาอังกฤษหรือภาษาอื่นที่สถานประกอบการต้องการ &nbsp;เป็นนักกิจกรรม &nbsp;มีความสามารถในการเขียน/ใช้โปรแกรมต่างๆ</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3"><p><strong>ขั้นตอนที่ 2&nbsp; : นักศึกษาต้องรู้จักสถานประกอบการ</strong></p></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td valign="top"></td>
                                <td>รู้ข้อมูลเบื้องต้นของสถานประกอบการที่ตนเองสนใจ เช่น &nbsp;สถานประกอบการมีชื่อเสียงในด้านใด &nbsp;ที่ตั้ง &nbsp;จังหวัด &nbsp;ประเภทธุรกิจ เป็นต้น</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td valign="top"></td>
                                <td>ลักษณะงานที่สถานประกอบการเสนอมาสอดคล้องกับความสามารถและความสนใจของตนเองหรือไม่ &nbsp;โดยลักษณะงานคุณภาพควรเป็นโครงงาน &nbsp;หรืองานประจำที่สอดคล้องกับสาขาวิชามีความเหมาะสมหรือมีค่าตอบแทน สวัสดิการที่สถานประกอบการจัดไว้ให้&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>ขั้นตอนที่ 3&nbsp;:</strong>&nbsp;เมื่อนักศึกษาได้ศึกษาข้อมูลที่เกี่ยวข้องแล้ว ให้ตัดสินใจเลือกสถานประกอบการที่ตรงกับตนเองมากที่สุด แล้วจัดเตรียมชุดใบสมัครงานสหกิจศึกษาพร้อมเอกสารหลักฐานส่งศูนย์สหกิจศึกษาฯ ตามวัน เวลาที่กำหนด</td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3"><p><strong>หมายเหตุ</strong><strong>&nbsp;:</strong>&nbsp;&nbsp; นักศึกษาสามารถแนะนำสถานประกอบการที่ไม่มีประกาศรับสมัครงานในภาคการศึกษาสหกิจศึกษาของตนเองได้ &nbsp;โดยแจ้งข้อมูลสถานประอบการพร้อมชื่อบุคคลและหมายเลขโทรศัพท์ที่ติดต่อ (ถ้ามี) ให้กับฝ่ายพัฒนางานสหกิจศึกษา ศูนย์สหกิจศึกษาและพัฒนาอาชีพ &nbsp;เพื่อประสานงานต่อไป เพื่อป้องกันการสับสนของข้อมูลจะไม่อนุญาตให้นักศึกษาติดต่อสถานประกอบการเอง</p></td>
                            </tr>
                            </tbody>
                        </table>


                            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
