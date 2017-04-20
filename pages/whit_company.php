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
                        <p>การรับนักศึกษาสหกิจเข้าปฏิบัติงาน</p>
                                <p>• คัดเลือกนักศึกษาโดยพิจารณาจากเอกสารสมัครและสัมภาษณ์</p>
                                <p>• ปฐมนิเทศนักศึกษา เพื่อให้รู้จักองค์กร โครงสร้างองค์กร ผลิตภัณฑ์ ความคาดหวังและข้อปฏิบัติ ต่าง ๆ ขององค์กร</p>
                                <p>• ส่งนักศึกษาเข้ารับการปฏิบัติงาน ณ ต้นสังกัด โดยนำนักศึกษาไปพบกับผู้บังคับบัญชา / พี่เลี้ยงต้นสังกัด เพื่อแนะนำสถานที่ทำงาน ลักษณะงานและความรับผิดชอบให้แก่นักศึกษา พร้อมทั้ง มอบเอกสารต่อไปนี้ให้กับพนักงานพี่เลี้ยง</p>
                                <p>• นักศึกษาปฏิบัติงานตามที่ได้รับมอบหมาย โดยมีพี่เลี้ยงคอยดูแลให้คำแนะนำและให้ความช่วยเหลือตลอดระยะเวลาการปฏิบัติงาน</p>
                                <p>ประโยชน์ที่ทางสถานประกอบการจะได้รับ</p>
                                <p>• ลดการจ้างงานและค่าตอบแทนลง โดยให้นักศึกษาสหกิจซึ่งมีความรู้ด้านวิชาการเพียงพอ ระดับหนึ่ง เข้าปฏิบัติงานทดแทนพนักงานที่ขาดไป หรือเป็นผู้ช่วยพนักงานและให้ค่าตอบแทนที่พอเหมาะกับลักษณะงาน ทั้งนี้ให้เป็นไปตามนโยบายของสถานประกอบการนั้น ๆ</p>
                                <p>• มีนักศึกษาที่มีความกระตือรือร้นและมีความพร้อมทางวิชาการช่วยปฏิบัติ งานอย่างต่อเนื่อง ในระยะเวลาที่ยาวขึ้นกว่าการฝึกงานปกติ คือ 17 สัปดาห์ หรือประมาณ 4 เดือน</p>
                                <p>• พนักงานประจำจะมีเวลามากขึ้น ที่จะไปปฏิบัติงานในหน้าที่อื่นที่มีความยากและซับซ้อนยิ่งขึ้น</p>
                                <p>• คณาจารย์กับนักศึกษาจะได้มีส่วนช่วยในการแก้ปัญหาให้กับสถานประกอบการ ซึ่งเป็นการลดภาระภาย</p>
                                <p>ในองค์กร</p>
                                <p>• เกิดความร่วมมือกันทางวิชาการระหว่างผู้บริหารสถานประกอบการกับคณาจารย์ของทาง</p>
                                <p>มหาวิทยาลัยอย่างต่อเนื่องตลอดไป</p>
                                <p>• เป็นวิธีการหนึ่งในการสรรหาพนักงานประจำที่มีความรู้ความสามารถตรงกับ ตำแหน่งงาน โดยอาจลดเวลาในการสอนงานและเวลาในการทดลองงานลงได้</p>
                                <p>• สถานประกอบการเป็นที่รู้จักมากขึ้นในด้านการให้ความร่วมมือด้านงานบริการกับมหาวิทยาลัย</p>
                                <p>• เป็นการสร้างความสัมพันธ์ที่ดีกับสถานประกอบการและเสริมภาพลักษณ์ที่ดีของ องค์กร ในด้านการส่งเสริม สนับสนุนการศึกษาและช่วยพัฒนาบัณฑิตของชาติ</p>
                                <p>• สิทธิที่จะได้รับยกเว้นภาษีเงินได้เป็นกรณีพิเศษ ตาม พ.ร.บ. ส่งเสริมการพัฒนาฝีมือแรงงาน พ.ศ. 2545</p>
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
