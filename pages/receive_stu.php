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
                        <table width="710" border="0" class="news">


                            <tbody><tr>
                                <td width="93%"><ol>
                                        <li>ศูนย์สหกิจศึกษาและพัฒนาอาชีพจะจัดส่งหนังสือสำรวจความต้องการรับนักศึกษาสหกิจศึกษา  และ&nbsp;แบบแจ้งรายละเอียดงานสหกิจศึกษา&nbsp;ให้กับสถานประกอบการ  เพื่อสถานประกอบการสำรวจความต้องการรับนักศึกษาสหกิจศึกษาในแต่ละสาขาวิชา  ก่อนส่งแจ้งรายละเอียดงานพร้อมจำนวนตำแหน่งงานที่ต้องการกลับมาที่ศูนย์สหกิจศึกษาและพัฒนาอาชีพ  ในช่องทางที่สถานประกอบการสะดวก (ไปรษณีย์ โทรสาร อีเมล์)</li>
                                        <li>ศูนย์สหกิจศึกษาและพัฒนาอาชีพ  บันทึกข้อมูลความต้องการรับนักศึกษาสหกิจศึกษาจากสถานประกอบการในฐานข้อมูลพร้อมทั้งประกาศงานที่สถานประกอบการเปิดรับสมัครงานสหกิจศึกษา  ให้นักศึกษาทราบบนระบบออนไลน์ของศูนย์สหกิจศึกษาและพัฒนาอาชีพ </li>
                                        <li>นักศึกษาแจ้งชื่อสถานประกอบการที่ต้องการสมัครงานสหกิจศึกษา  เพื่อเป็นข้อมูลในกระบวนการ Matching (สาขาวิชาพิจารณาความเหมาะสมในการเลือกสถานประกอบการของนักศึกษา)</li>
                                        <li>นักศึกษายื่นจดหมายสมัครงานสหกิจศึกษาพร้อมเอกสารหลักฐาน  ที่ตนสนใจผ่านศูนย์สหกิจศึกษาและพัฒนาอาชีพ </li>
                                        <li>ศูนย์สหกิจศึกษาและพัฒนาอาชีพจัดส่งจดหมายสมัครงานพร้อมเอกสารหลักฐานของนักศึกษาสหกิจศึกษาให้สถานประกอบการพิจารณาคัดเลือก  ซึ่งสถานประกอบการจะแจ้งผลการคัดเลือก โดยส่ง<a href="http://coop.sut.ac.th/files/FM4-1-13.pdf" target="_blank">แบบแจ้งรายชื่อนักศึกษาที่ผ่านการคัดเลือก</a>&nbsp;กลับมายังศูนย์สหกิจศึกษา  ทั้งนี้สถานประกอบการอาจนัดหมายสัมภาษณ์นักศึกษาผ่านช่องทางต่าง ๆ  กับศูนย์สหกิจศึกษา หรือโทรศัพท์สัมภาษณ์นักศึกษาเป็นการเบื้องต้นได้</li>
                                        <li>ศูนย์สหกิจศึกษาและพัฒนาอาชีพประกาศผลให้นักศึกษาทราบบนระบบออนไลน์ </li>
                                        <li>ศูนย์สหกิจศึกษาและพัฒนาอาชีพจะจัดส่งหนังสือส่งตัวนักศึกษาต่อสถานประกอบการเพื่อยืนยันการเข้าปฎิบัติงานสหกิจศึกษา </li>
                                        <li>นักศึกษาจะติดต่อสถานประกอบการเพื่อนัดหมายเข้ารายงานตัว  หลังจากทราบผลการคัดเลือกแล้ว </li>
                                    </ol></td>
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
