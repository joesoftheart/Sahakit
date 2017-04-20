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
                        <p>
                                    วิสัยทัศน์ ( VISION)<br>
                                    สำนักงานสหกิจศึกษา มุ่งเน้นเป็นสหกิจ 100 % เป็นศูนย์กลางเน้นทำเป็นในการพัฒนาทักษะ เห็นอณาคตการปฏิบัติงานชัดเจนจริงของนักศึกษาสหกิจศึกษา และสร้างความร่วมมือกับสถานประกอบการ<br>
                                    <br>
                                    พันธกิจ (MISSION)<br>
                                    1.บริหารจัดการระบบสหกิจศึกษาอย่างมีประสิทธิภาพ<br>
                                    2.สร้างเครือข่ายความร่วมมือกับสถานประกอบการ<br>
                                    3.สนับสนุนและส่งเสริมนักศึกษาที่เข้าร่วมระบบสหกิจศึกษาให้เป็นที่ยอมรับของสถานประกอบการ<br>
                                    4.อนุรักษ์และร่วมรักษาสิ่งแวดล้อมทั้งในมหาวิทยาลัยและสถานประกอบการ</p>
                                <p>
                                    &nbsp;</p>
                                <p>
                                    ยุทธศาสตร์ ( Strategic )</p>
                                <p>
                                    1.การให้ความรู้ความเข้าใจเกี่ยวกับงานสหกิจศึกษากับนักศึกษาสหกิจศึกษาสถานประกอบการ และบุคลากรในมหาวิทยาลัยเทคโนโยลีราชมงคลกรุงเทพ</p>
                                <p>
                                    2.การเผยแพร่ข้อมูลเกี่ยวกับสหกิจศึกษาให้กับนักศึกษาสหกิจศึกษาสถานประกอบการและบุคลากรในมหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ</p>
                                <p>
                                    3.&nbsp;การจัดทำฐานข้อมูลของสถานประกอบการ</p>
                                <p>
                                    4.&nbsp;การปรับปรุงข้อมูลให้ทันสมัยอยู่เสมอ</p>
                                <p>
                                    5.&nbsp;สร้างความสำพันธ์ที่ดีกับสถานประกอบการเป็นอย่างต่อเนื่อง</p>
                                <p>
                                    6. การสนับสนุนและร่วมพัฒนาหลักสูตรสหกิจศึกษาให้ทันสมัย</p>
                                <p>
                                    7. การให้สถานประกอบการมีส่วนร่วมในการปฐมนิเทศนักศึกษาสหกิจศึกษาก่อนออกปฏิบัติงานสหกิจศึกษา</p>
                                <p>
                                    8.&nbsp;การสร้างแรงจูงใจในการปฏิบัติงานของนักศึกษาสหกิจศึกษา</p>
                                <p>
                                    9. การจัดแสดงผลการปฏิบัติงานของสหกิจศึกษา</p>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
