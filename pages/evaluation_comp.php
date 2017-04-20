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
                                <td valign="top" colspan="2"><strong>การประเมินผลให้นักศึกษาสหกิจศึกษา โดยสถานประกอบการ</strong></td>
                            </tr>

                            <tr>
                                <td valign="top" colspan="2" class="news">นักศึกษาจะนำซอง Supervisor มอบให้กับพนักงานที่ปรึกษา โดยในซองนั้นจะบรรจุแบบประเมินผล 2 ชุด ดังนี้</td>
                            </tr>

                            <tr>
                                <td valign="top" colspan="2" class="news">
                                    <ol>
                                        <li><strong>แบบประเมินผลการปฏิบัติงาน</strong></a></li>
                                        พนักงานที่ปรึกษาจะเป็นผู้ประเมินผลการปฏิบัติงานนักศึกษาตามแบบฟอร์มที่มหาวิทยาลัยกำหนด&nbsp;<em><u>อย่างช้าที่สุดภายในสัปดาห์สุดท้ายของการปฏิบัติงานของนักศึกษา&nbsp;</u></em>โดยอาจจะชี้แจงผลการประเมินให้นักศึกษาทราบ<br><br>
                                        <li><strong>แบบประเมินผลรายงานวิชาการ</a></strong></li>

                                        ขอให้พนักงานที่ปรึกษาตรวจแก้ไขรายงานให้นักศึกษาแล้วทำการประเมินผลเนื้อหาและการเขียนรายงาน ทั้งนี้นักศึกษาต้องแก้ไขรายงาน จัดทำรายงานให้สมบูรณ์และนำส่งให้มหาวิทยาลัย&nbsp;<br> </ol>

                                    <strong>**การส่งแบบประเมินการปฏิบัติงานและแบบประเมินผลรายงานกลับยังศูนย์สหกิจศึกษาและพัฒนาอาชีพ**</strong><p></p>
                                    </td>
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
