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
                        <table width="710" cellpadding="0" cellspacing="0" border="0">

                            <tbody><tr>
                                <td valign="top" colspan="2"><strong>วัตถุประสงค์ของการนิเทศงาน</strong></td>
                            </tr>

                            <tr>
                                <td valign="top" colspan="2" class="news"><p>ศูนย์สหกิจศึกษาและพัฒนาอาชีพ ได้จัดให้มีการนิเทศงานโดยคณาจารย์นิเทศประจำสาขาวิชา โดยอาจมีเจ้าหน้าที่สหกิจศึกษาร่วมเดินทางไปนิเทศงาน อย่างน้อย 1 ครั้ง ระหว่างที่นักศึกษาปฏิบัติงานสหกิจศึกษา ณ สถานประกอบการ โดยมีวัตถุประสงค์ของการนิเทศงานสหกิจศึกษา ดังนี้</p>
                                    <ul>
                                        <li>เพื่อเป็นการสร้างขวัญและกำลังใจแก่นักศึกษาที่กำลังปฏิบัติงานโดยลำพัง ณ สถานประกอบการ ซึ่งนักศึกษาจะต้องอยู่ห่างไกลครอบครัว เพื่อน และคณาจารย์</li>
                                        <li>เพื่อดูแลและติดตามผลการปฏิบัติงานของนักศึกษา ให้เป็นไปตามวัตถุประสงค์ของสหกิจศึกษา</li>
                                        <li>เพื่อช่วยเหลือนักศึกษาในการแก้ไขปัญหาต่าง ๆ ที่อาจจะเกิดขึ้นในระหว่างการปฏิบัติงาน ทั้งปัญหาด้านวิชาการและปัญหาการปรับตัวของนักศึกษาในสภาวะการทำงานจริง</li>
                                        <li>เพื่อขอรับทราบและแลกเปลี่ยนข้อคิดเห็นเกี่ยวกับแนวคิดการมาปฏิบัติงานของนักศึกษาในระบบสหกิจศึกษา ตลอดจนการแลกเปลี่ยนความก้าวหน้าทางวิชาการซึ่งกันและกัน</li>
                                        <li>เพื่อประเมินผลการดำเนินงานและรวบรวมข้อมูลที่เป็นประโยชน์ต่อมหาวิทยาลัย</li>
                                    </ul></td>
                            </tr>
                            <tr>
                                <td valign="top" colspan="2" class="news1"><p align="left">&nbsp;</p></td>
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
