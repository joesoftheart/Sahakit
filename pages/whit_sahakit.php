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
                        <p>สหกิจศึกษาคืออะไร<br>&nbsp;&nbsp;&nbsp;&nbsp; ในสภาวะการณ์ปัจจุบันใน ตลาดแรงงานมีการแข่งขันและลักษณะของบัณฑิตที่ตลาดแรงงานมีความต้องการได้พัฒนาไป ความต้องการของสถานประกอบการที่ต้องการให้มีในตัวบัณฑิต ได้แก่ การเป็นผู้ที่ไว้วางใจได้ในด้านการงาน ความคิดริเริ่ม ระเบียบวินัย จริยธรรม ศีลธรรม การสื่อสารข้อมูล การเป็นผู้นำ เป็นต้น สิ่งที่ท้าทายสำหรับบัณฑิตในปัจจุบัน คือ การได้มีโอกาสสร้างความเข้าใจและคุ้นเคยกับโลกแห่งความจริงของการทำงานและ การเรียนรู้ เพื่อให้ได้มาซึ่งทักษะของงานอาชีพและทักษะด้าน พัฒนาตนเอง นอกเหนือไปจากทักษะด้านวิชาการ ทักษะเหล่านี้จะเรียนรู้และพัฒนาได้โดยเร็วเมื่อนักศึกษาได้มีโอกาสไป ปฏิบัติงานจริง ในสถานประกอบการต่างๆ</p>
                                <p>หลักการและเหตุผล<br>&nbsp;&nbsp;&nbsp;&nbsp; สหกิจศึกษา (Cooperative Education) เป็นแผนการศึกษาโดยมีจุดมุ่งหมายให้นักศึกษาได้มีประสบการณ์ปฏิบัติงานจริง ในสถานประกอบการอย่างมีประสิทธิภาพ โดยเน้นให้นักศึกษาได้นำเอาวิชาการทั้งทางภาคทฤษฎีและปฏิบัติต่างๆ ที่ได้ศึกษามาแล้ว นำไปปฏิบัติในสถานประกอบการให้ได้ผลดี ทำให้นักศึกษาสามารถเรียนรู้ประสบการณ์จากการไปปฏิบัติงาน และทำให้นักศึกษามีคุณภาพตรงตามวัตถุประสงค์ที่สถานประกอบการต้องการมากที่ สุด เพื่อเป็นการส่งเสริมความสัมพันธ์และความร่วมมืออันดีระหว่างมหาวิทยาลัย เทคโนโลยีราชมงคลกรุงเทพ กับสถานประกอบการที่นักศึกษาได้ไปปฏิบัติงาน อีกทั้งเป็นการเผยแพร่เกียรติคุณ ของมหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพที่มุ่งเน้นผลิตบัณฑิตนักปฏิบัติการ ต่อบุคคลและหน่วยงานต่างๆ ที่อยู่ภายนอก</p>
                                <p>ปรัชญา "มหาวิทยาลัยชีวิต เริ่มต้นที่สหกิจศึกษา "</p>
                                <p>ภารกิจหลัก<br>&nbsp;&nbsp;&nbsp;&nbsp; คัดเลือกนักศึกษาและจัดหาสถานประกอบการเพื่อให้นักศึกษาออกไปปฏิบัติงาน ณ สถานประกอบการ</p>
                                <p>วัตถุประสงค์<br>&nbsp;&nbsp;&nbsp;&nbsp; 1. เพื่อเปิดโอกาสให้นักศึกษาได้รับประสบการณ์ตรงเกี่ยวกับการ ทำงานจริงในสถานประกอบการ<br>&nbsp;&nbsp;&nbsp;&nbsp; 2. ศึกษาเรียนรู้เรื่องการจัดและบริหารงานในสถานประกอบการ อย่างละเอียด<br>&nbsp;&nbsp;&nbsp;&nbsp; 3. ได้พบเห็นปัญหาต่างๆ ที่แท้จริงของสถานประกอบการและ คิดค้นวิธีแก้ปัญหาเฉพาะหน้า <br>&nbsp;&nbsp;&nbsp;&nbsp; 4. ศึกษาเกี่ยวกับบุคลากรส่วนต่างๆ ของผู้ร่วมปฏิบัติงานสถานประกอบการทั้งด้านบุคลิกภาพ</p>
                                <p>หน้าที่ความรับผิดชอบการทำงานร่วมกันและการปฏิบัติงานเฉพาะทาง<br>&nbsp;&nbsp;&nbsp;&nbsp; 5. รู้จักปรับตัวให้เข้ากับสังคมในสถานประกอบการ การเป็นผู้นำและเป็นผู้ตามที่เหมาะสม<br>&nbsp;&nbsp;&nbsp;&nbsp; 6. เพื่อส่งเสริมความสัมพันธ์อันดีระหว่างมหาวิทยาลัย กับ สถาน ประกอบการที่นักศึกษาไปปฏิบัติงาน</p>
                                <p>สหกิจศึกษา<br>&nbsp;&nbsp;&nbsp;&nbsp; 7. เพื่อเผยแพร่ชื่อเสียงของมหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพต่อบุคคลและ สถาบันต่างๆที่อยู่</p>
                                <p>ภายนอก</p>
                                <p>หลักสูตรที่เข้าร่วมสหกิจศึกษา<br>&nbsp;&nbsp;&nbsp;&nbsp; มหาวิทยาลัย เทคโนโลยีราชมงคลกรุงเทพได้จัดระบบการศึกษาเพื่อเป็น ระบบทวิภาค โดยใน 1 ปีการศึกษา จะประกอบด้วย 2 ภาคการศึกษา (1 ภาคการศึกษามีระยะเวลา 17 สัปดาห์) และ 1 ภาคการศึกษาสหกิจศึกษามีระยะเวลาเท่ากับ 17 สัปดาห์</p>
                                <p>หลักสูตรสหกิจศึกษามีลักษณะดังนี้<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1. เป็นหลักสูตรบังคับสำหรับนักศึกษาหลักสูตรวิศวกรรมศาสตร์และหลักสูตรอื่นๆ ที่เข้าร่วมสหกิจศึกษา โดยที่สาขาวิชาต้นสังกัดของนักศึกษาจะเป็นผู้รับผิดชอบ คัดเลือกนักศึกษาที่มีคุณสมบัติครบถ้วนเข้าร่วมสหกิจศึกษา<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. จัดภาคการศึกษาสหกิจศึกษาไว้ในภาคการศึกษาที่ 2 ของปีที่ 3 ( ภาคสมทบ) และภาคการศึกษาที่ 1 ของปีที่ 4 ( ภาคปกติ)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3. ภาคการศึกษาสหกิจศึกษามีค่าเท่ากับ 6 หน่วยกิต การประเมินผลเป็น S และ U<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4. กำหนดให้นักศึกษาจะต้องไปปฏิบัติงานอย่างน้อย 1 ภาคการศึกษา โดยจะต้องมีระยะเวลาการปฏิบัติงานตามที่กำหนด ทั้งนี้ไม่ต่ำกว่า 17 สัปดาห์</p>
                                <p>หน่วยงานและบุคลากรที่รับผิดชอบ<br>&nbsp;&nbsp;&nbsp;&nbsp; มหาวิทยาลัย เทคโนโลยีราชมงคลกรุงเทพ ได้จัดตั้งหน่วยงานที่เรียกว่า สำนักงานสหกิจศึกษา (Office of Cooperative Education : OCE) ภายใต้การกำกับของอธิการบดี เพื่อทำหน้าที่พัฒนารูปแบบระบบการศึกษาแบบสหกิจศึกษาให้เหมาะสม และ รับผิดชอบการประสานงาน ระหว่างนักศึกษา คณาจารย์และสถานประกอบการ ในการเตรียมความพร้อมนักศึกษาสำหรับการปฏิบัติงาน ณ สถานประกอบการ</p>
                                <p>1. เจ้าหน้าที่สหกิจศึกษา (OCE Coordinator)<br>&nbsp;&nbsp;&nbsp;&nbsp; บุคลากร ที่สังกัดสำนักงานสหกิจศึกษาเป็นผู้รับผิดชอบในการจัดเก็บข้อมูล ประสานงานและอำนวยความสะดวกแก่สถานประกอบการ อาจารย์ที่ปรึกษาสหกิจศึกษา และนักศึกษาสหกิจศึกษา ในส่วนที่เกี่ยวข้องกับสหกิจศึกษา ในฝ่ายต่างๆ<br>2. อาจารย์ที่ปรึกษาสหกิจศึกษา (OCE Advisor)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ทำหน้าที่เป็นผู้ประสานงานด้านสหกิจศึกษาภายในสาขาวิชา ดังนี้ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; • ชี้แจงสถานการณ์ที่นักศึกษาจะต้องประสบและเสนอแนะวิธีการแก้ปัญหาที่อาจจะเกิดขึ้นใน</p>
                                <p>สถานประกอบการ<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; • นิเทศงาน อย่างน้อย 2 ครั้งต่อนักศึกษา 1 คน <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; • ให้คำปรึกษาแก่สถานประกอบการเพื่อช่วยแก้ปัญหาในการทำงาน ผ่านการปฏิบัติงานของ</p>
                                <p>นักศึกษาสหกิจศึกษา<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; • พบปะร่วมปรึกษากับพนักงานที่ปรึกษา และผู้บริหารสถานประกอบการที่นักศึกษาฝึกงาน</p>
                                <p>เพื่อรับฟังความคิดเห็น และข้อเสนอแนะต่างๆ <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; • สร้างความสัมพันธ์อันดีต่อคณะผู้บริหาร และผู้ร่วมงานในสถานประกอบการที่ไปนิเทศนัก</p>
                                <p>ศึกษาสหกิจศึกษา<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; • เข้าร่วมในการปฐมนิเทศ ปัจฉิมนิเทศ และกิจกรรมที่สำนักงานสหกิจศึกษาจัดขึ้น<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; • พิจารณาผลการปฏิบัติงานสหกิจศึกษา เพื่อประเมินผลการออกปฏิบัติงานสหกิจศึกษา ของนักศึกษาสหกิจศึกษาตามวันและเวลาที่กำหนด</p>
                                <p>ลักษณะงานสหกิจศึกษา ( ในส่วนของนักศึกษาที่ไปปฏิบัติการในสถานประกอบการ)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1. เสมือนหนึ่งเป็นพนักงานชั่วคราว<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. มีหน้าที่รับผิดชอบแน่นอน ( งานมีคุณภาพ)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3. ทำงานเต็มเวลา (Full Time)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4. ระยะเวลาการปฏิบัติงานเต็ม 1 ภาคการศึกษา ( ประมาณ 17 สัปดาห์)</p>
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
