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
                        <p><span style="font-family: tahoma,arial,helvetica,sans-serif;">อาจารย์ที่ปรึกษาบทบาทและหน้าที่ของอาจารย์ที่ปรึกษาสหกิจศึกษา</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• รับผิดชอบการปฏิบัติงานของนักศึกษาในภาควิชาของตน</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• การนิเทศงาน ณ สถานประกอบการอย่างน้อย 2 ครั้ง</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• ให้คำปรึกษา พิจารณาหัวข้อโครงงานของนักศึกษาร่วมกับพนักงานที่ปรึกษา</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• ประเมินผลการปฏิบัติงานนักศึกษา</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• ประสานงานการจัดกิจกรรมสหกิจศึกษาภายหลังนักศึกษากลับจากสถานประกอบการ</span></p>
                                <p><span style="font-family: tahoma,arial,helvetica,sans-serif;">บทบาทและหน้าที่ของผู้ประสานงานสหกิจศึกษาระดับสาขาวิชา</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• พิจารณาคุณสมบัติทางวิชาการของนักศึกษาก่อนไปปฏิบัติงานสหกิจศึกษา</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• ประสานระหว่างมหาวิทยาลัย (สำนักงานสหกิจศึกษา) ในการรับนโยบายสู่การปฏิบัติ</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• เป็นศูนย์ประสานงานในการจัดหาสถานประกอบการที่จะส่งนักศึกษาสหกิจไปปฏิบัติงาน เป็นศูนย์ข้อมูลของสาขาวิชา</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• เป็น ผู้ช่วยอำนวยความสะดวกแก่อาจารย์ที่ปรึกษาสหกิจของสาขาวิชา ในการที่จะออกไปปฏิบัติงาน ณ สถานประกอบการ รวมทั้งการส่งข่าวสารข้อมูลที่จำเป็นได้อย่างรวดเร็ว</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• เป็นศูนย์รับฟัง ขยายผลและยกย่องเชิดชูผู้มีส่วนในการส่งเสริมสหกิจศึกษาของสาขาวิชา</span></p>
                                <p><span style="font-family: tahoma,arial,helvetica,sans-serif;">บทบาทและหน้าที่ของผู้ประสานงานสหกิจศึกษาระดับคณะ</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• กำหนดแผนงาน เป้าหมายในการจัดส่งนักศึกษาและคณาจารย์เข้าปฏิบัติงานสหกิจศึกษา</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• จัดทำหลักสูตร แผนการเตรียมการสอนของคณะแล้วแต่กรณี เพื่ออำนวยความสะดวกในการจัดสหกิจศึกษาของคณะ</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• ประสานงาน ส่งเสริม สนับสนุนและอำนวยความสะดวกในการจัดสหกิจศึกษา</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• เป็นศูนย์กลางประชาสัมพันธ์ของคณะ</span></p>
                                <p><span style="font-family: tahoma,arial,helvetica,sans-serif;">การนิเทศงานสหกิจศึกษา</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">สำนัก งานสหกิจศึกษา ได้จัดให้มีการนิเทศงานโดยคณาจารย์ที่ปรึกษาสหกิจศึกษาประจำสาขาวิชาที่มี นักศึกษาไปปฏิบัติงาน โดยอาจจะมีเจ้าหน้าที่สหกิจศึกษาหรือคณาจารย์ที่สนใจร่วมเดินทางไปนิเทศ ระหว่างที่นักศึกษาในสังกัดสาขาวิชาปฏิบัติงานสหกิจศึกษา ณ สถานประกอบการ โดยมีวัตถุประสงค์ของการนิเทศงานสหกิจศึกษา ดังนี้</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• เพื่อเป็นการสร้าง ขวัญและกำลังใจแก่นักศึกษาที่กำลังปฏิบัติงานโดยลำพัง ณ สถานประกอบการซึ่งนักศึกษาจะต้องอยู่ห่างไกลครอบครัว เพื่อนและคณาจารย์</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• เพื่อดูแลและติดตามผลการปฏิบัติงานของนักศึกษา ให้เป็นไปตามวัตถุประสงค์ของสหกิจศึกษา</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• เพื่อ ช่วยเหลือนักศึกษาในการแก้ไขปัญหาต่างๆ ที่อาจเกิดขึ้นในระหว่างการปฏิบัติงาน ทั้งปัญหาด้านวิชาการและปัญหาการปรับตัวของนักศึกษาในสภาวะการทำงานจริง</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• เพื่อ ขอรับทราบและแลกเปลี่ยนข้อคิดเห็น เกี่ยวกับแนวความคิดการมาปฏิบัติงานของ นักศึกษาในระบบสหกิจศึกษา ตลอดจนการแลกเปลี่ยนความก้าวหน้าทางวิชาการ ซึ่งกันและกัน</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• เพื่อประเมินผลการดำเนินงานและรวบรวมข้อมูลที่เป็นประโยชน์ต่อมหาวิทยาลัย</span></p>
                                <p><span style="font-family: tahoma,arial,helvetica,sans-serif;">ขั้นตอนการนิเทศงานสหกิจศึกษา ประกอบด้วย</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• เจ้า หน้าที่สำนักงานสหกิจศึกษา จะประสานงานกับอาจารย์ที่ปรึกษาสหกิจศึกษาทุกสาขาวิชาเพื่อกำหนดแผนการนิเทศ งานของสาขาวิชาทั้งภาคการศึกษา โดยใช้แบบฟอร์มการแจ้งการออกนิเทศนักศึกษาสหกิจศึกษา ( นักศึกษาทุกคนที่ไปปฏิบัติงานจะต้องได้รับการนิเทศงานอย่างน้อย 2 ครั้ง ในระหว่างที่ปฏิบัติงาน)</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• อาจารย์ที่ปรึกษาสหกิจศึกษาเดินทางไปนิเทศ งานตามแผนการนิเทศโดยมีหัวข้อนิเทศงาน คือ ตรวจสอบคุณภาพงานและหัวข้อรายงานที่สถานประกอบการมอบหมาย (กรณีสถานประกอบการมีหัวข้อรายงานให้นักศึกษาทำ) ติดตามผลการปฏิบัติงานความก้าวหน้าในการจัดทำรายการของนักศึกษาให้คำปรึกษา และช่วย แก้ไขปัญหาที่อาจจะเกิดขึ้นทั้งทางด้านวิชาการและการพัฒนาตนเองของนักศึกษา</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• ภายหลังเดินทางกลับอาจารย์ที่ปรึกษาประเมินผลการนิเทศงาน ตามแบบบันทึกการนิเทศงานสหกิจศึกษาและส่งมอบคืนสำนักงานสหกิจศึกษา</span></p>
                                <p><span style="font-family: tahoma,arial,helvetica,sans-serif;">ประโยชน์ที่อาจารย์จะได้รับ</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• สามารถพัฒนาหลักสูตรการเรียนการสอนให้สอดคล้องกับภาวการณ์ปัจจุบัน</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• เป็นการเพิ่มศักยภาพของอาจารย์</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• เป็นการเพิ่มประสบการณ์ในภาคปฏิบัติ และได้นำปัญหาที่เกิดขึ้นจริงมาดัดแปลงให้เป็นปัญหาในห้องเรียน</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• สามารถนำประสบการณ์ในการเป็นอาจารย์ปรึกษามาทำงานวิจัยได้</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• สามารถรับเป็นที่ปรึกษาให้กับสถานประกอบการได้</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• อาจารย์มีชื่อเสียงเป็นที่รู้จักมากขึ้น</span><br><span style="font-family: tahoma,arial,helvetica,sans-serif;">• ได้รับค่าตอบแทนจากมหาวิทยาลัย</span></p>
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
