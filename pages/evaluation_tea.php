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
                        <table cellspacing="0" cellpadding="1" width="710">
                            <tbody><tr>
                                <td><strong>การประเมินผลนักศึกษาสหกิจศึกษา สำหรับคณาจารย์&nbsp;</strong></td>
                            </tr>

                            <tr>
                                <td class="news">
                                    <p><strong>การให้ระดับคะแนนตัวอักษรจะเป็นระบบ S (Satisfactory – เป็นที่พอใจ = ผ่าน) และ U (Unsatisfactory – ไม่เป็นที่พอใจ = ไม่ผ่าน) ทั้งนี้มีกระบวนการที่ใช้ในการประเมินผลดังนี้</strong><br>

                                    </p><ol>
                                        <li>นักศึกษาเข้าร่วมการปฐมนิเทศ อบรม สัมมนา และกิจกรรมเตรียมความพร้อมสหกิจศึกษาที่กำหนดไว้โดยครบถ้วน นักศึกษาที่ขาดกิจกรรมที่กำหนดจะต้องชดเชยกิจกรรมโดยการศึกษาวิดีทัศน์พร้อมทั้งเขียนรายงาน&nbsp; และศูนย์จะประกาศชื่อผู้ไม่มีสิทธิ์ไปปฏิบัติงานเพราะขาดกิจกรรม 1 สัปดาห์ก่อนปิดภาคการศึกษา</li>
                                        <li>ได้รับผลการประเมินความสามารถในการปฏิบัติงานและรายงานวิชาการในระดับ S จากพนักงานที่ปรึกษา</li>
                                        <li>ได้รับผลการประเมินรายงานวิชาการในระดับ S จากคณาจารย์นิเทศ</li>
                                        <li>เข้าร่วมกิจกรรมหลังกลับจากปฏิบัติงานครบถ้วนได้แก่ การประชุม การสัมภาษณ์ สัมมนา และส่งแบบสอบถาม</li>
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
