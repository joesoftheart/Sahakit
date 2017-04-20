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
                        <table width=80%" cellpadding="0" cellspacing="0" border="0" >

                            <tbody><tr>
                                <td valign="top" colspan="2"><strong>ขั้นตอนการนิเทศงาน&nbsp;</strong></td>
                            </tr>

                            <tr>
                                <td valign="top" colspan="2" class="news"><ul>
                                        <li>เจ้าหน้าที่สหกิจศึกษาจะประสานงานกับประธานคณาจารย์นิเทศทุกสาขาวิชา เพื่อกำหนดแผนการนิเทศงานของสาขาวิชาทั้งภาคการศึกษา โดยคณาจารย์ในสาขาวิชาจะร่วมกันวางแผนนิเทศสหกิจศึกษากับเจ้าหน้าที่สหกิจศึกษา ซึ่งจะนิเทศระหว่างสัปดาห์ที่ 5-12 ของการปฏิบัติงานของนักศึกษา เพื่อให้คำแนะนำและคำปรึกษาแก่นักศึกษาทั้งในเรื่องการปฏิบัติงานและการปฏิบัติตนในสถานประกอบการ โดยนักศึกษาทุกคนที่ไปปฏิบัติงานจะต้องได้รับการนิเทศงานอย่างน้อย 1 ครั้งในระหว่างที่ปฏิบัติงาน</li>
                                        <li>เจ้าหน้าที่สหกิจศึกษาประสานงานกับสถานประกอบการ เพื่อนัดหมายวันและเวลาที่คณาจารย์นิเทศจะเดินทางไปนิเทศนักศึกษา ณ สถานประกอบการ</li>
                                        <li>นักศึกษาควรทราบกำหนดการไปนิเทศของอาจารย์เพื่อรอพบคณาจารย์นิเทศ ถ้านักศึกษามีการเดินทางหรือเปลี่ยนสถานที่ทำงานในวันดังกล่าว หรือมีเหตุเจ็บป่วยหรืออื่น ๆ ที่ไม่สามารถมาปฏิบัติงานได้ให้นักศึกษาติดต่อศูนย์ หรืออาจารย์โดยด่วนเพื่อเปลี่ยนแปลงการนัดหมายใหม</li>
                                        <li>ขั้นตอนการนิเทศงาน ณ สถานประกอบการ ใช้เวลาในแต่ละขั้นตอนโดยประมาณ 20 นาที</li>
                                        <ol>
                                            <li>อาจารย์นิเทศงานพบ พูดคุย สอบถาม นักศึกษาโดยลำพัง</li>
                                            <li>อาจารย์นิเทศงานพบ พูดคุย สอบถาม Job Supervisor โดยลำพัง</li>
                                            <li>หารือร่วมกันระหว่าง Job Supervisor /อาจารย์/นักศึกษา</li>
                                        </ol>
                                    </ul></td>
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
