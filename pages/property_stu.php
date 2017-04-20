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
                        <table cellspacing="0" cellpadding="1" width="60%">
                            <tbody>
                            <tr>
                                <td><strong>คุณสมบัตินักศึกษา</strong></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
                                        <tbody>
                                        <tr>
                                            <td valign="top" colspan="2" class="news">
                                                <ol>
                                                    <li>สอบผ่านรายวิชาเตรียมสหกิจศึกษา</li>
                                                    <li>มีระดับคะแนนเฉลี่ยสะสมไม่ต่ำกว่า ๒.๐๐ นับถึงภาคการศึกษาสุดท้าย
                                                        ก่อนทำการสมัครงานสหกิจศึกษา
                                                    </li>
                                                    <li>ผ่านเงื่อนไขทางวิชาการที่สาขาวิชากำหนด</li>
                                                    <li>ไม่อยู่ระหว่างถูกพักการศึกษาในภาคการศึกษาสหกิจศึกษา</li>
                                                    <li>ไม่เคยต้องโทษวินัยนักศึกษาตั้งแต่ระดับพักการศึกษาขึ้นไป&nbsp;
                                                        เว้นแต่&nbsp;&nbsp;&nbsp;
                                                        จะได้รับความเห็นชอบจากสาขาวิชาและได้รับการรับรองความประพฤติจากผู้ปกครองเป็นลายลักษณ์อักษรก่อน<br>
                                                    </li>
                                                    <li>ไม่เป็นโรคที่เป็นอุปสรรคต่อการปฏิบัติงานในสถานประกอบการ</li>
                                                </ol>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" colspan="2" class="news">&nbsp;</td>
                                        </tr>
                                        </tbody>
                                    </table>
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
