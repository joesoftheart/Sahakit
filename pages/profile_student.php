<?php
session_start();
include '../php/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>สหกิจศึกษา</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <?php

    $tid = null;

    if (isset($_SESSION['tid'])) {
        $status = $_SESSION['status'];
        $sid = $_SESSION["sid"];
        $fn_st = $_SESSION['fn_st'];
        $ln_st = $_SESSION['ln_st'];
        $tid = $_SESSION['tid'];
        $number_id = $_SESSION['number_id'];



        $sql = "SELECT * FROM student INNER JOIN register_work ON register_work.sid = $sid
                                        INNER JOIN company ON register_work.cid = company.cid WHERE student.sid = $sid";
        $query = mysqli_query($link, $sql) or die(mysqli_error($sql));



        $sql1 = "SELECT * FROM student INNER JOIN register_work ON register_work.sid = student.sid WHERE student.sid = $sid ";
        $objquery = mysqli_query($link, $sql1) or die(mysqli_error($sql1));
        $result = mysqli_fetch_array($objquery);

        $sql_c = "SELECT * FROM student INNER JOIN register_work ON register_work.sid = $sid
                                        INNER JOIN company ON register_work.cid = company.cid WHERE student.sid = '$sid'";
        $query_c = mysqli_query($link ,$sql_c);
        $result_c = mysqli_fetch_array($query_c);



        $sql3 = "SELECT * FROM student
                        WHERE student.tid = $sid";
        $query2 = mysqli_query($link, $sql3);
        $row_tea = mysqli_fetch_array($query2);

        $sql_sum = "SELECT SUM(hour_amount) AS clock FROM execute  WHERE uid = $sid";
        $query_sum = mysqli_query($link,$sql_sum);
        $row_sum = mysqli_fetch_array($query_sum);

    }
    ?>
</head>
<body>
<?php include 'menu_student.php'?>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <font size="4">ข้อมูลพื้นฐาน :</font> <font size="4"><?= $number_id ?>
                        &nbsp;&nbsp;&nbsp; <?= $fn_st ?>&nbsp;&nbsp; <?= $ln_st ?></font>
                </div>
            </div>
        </div>


        <?php if ($result['status_work'] <= '2'){ ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            นักศึกษา : ตารางสถานะ
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <th width="10%" class="text-center">ลำดับ</th>
                                        <th width="30%" class="text-center">ชื่อบริษัท</th>
                                        <th width="20%" class="text-center">ตำแหน่งงาน</th>
                                        <th width="20%" class="text-center">สถานะ</th>
                                        <th width="15%" class="text-center">ยอมรับ</th>
                                    </tr>
                                    <?php for ($i = 1; $row1 = mysqli_fetch_array($query); $i++) { ?>
                                        <tr class="text-center">
                                            <td> <?= $i; ?> </td>
                                            <td><?= $row1['c_name'] ?></td>
                                            <td><?= $row1['rank'] ?></td>
                                            <td><?php if ($row1['status_work'] == '1') { ?>
                                                    <font color="red">รออนุมัติ</font>
                                                <?php } else { ?>
                                                    <font color="green">อนุมัติแล้ว</font>
                                                <?php } ?>
                                            </td>

                                            <td>
                                                <?php if ($row1['status_work'] == '1') { ?>
                                                    <button class="btn  btn-danger" disabled> ยืนยัน
                                                    </button>
                                                <?php } elseif ($row1['status_work'] == '2') { ?>
                                                    <a href="../php/update_student.php?id=<?= $row1['rwid']; ?>" class="btn  btn-success"> ยืนยัน
                                                    </a>
                                                <?php } else { ?>
                                                    <button class="btn btn-default" disabled="disabled">
                                                        เรียบร้อยแล้วค่ะ
                                                    </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <caption>
                                        <p style="color: red">
                                            <small>**** หมายเหต นักศึกษาสามารถทำการยืนยัน
                                                บริษัทที่จะไปฝึกงานได้เพียงบริษัทเดียวเท่านั้น *****
                                            </small>
                                        </p>
                                    </caption>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php }else if ($result['status_work'] >= '3'){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-green">

                    <div class="panel-body">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="3" class="text-center"><h4><?= $result_c['c_name'] ?></h4></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td width="300px">ชื่อหัวหน้างาน</td>
                                    <td><?= $result_c['leader'] ?></td>
                                </tr>
                                <tr>
                                    <td>ตำแหน่งหัวหน้างาน</td>
                                    <td><?= $result_c['rank_leader'] ?></td>
                                </tr>
                                <tr>
                                    <td>ที่ตั้งบริษัท</td>
                                    <td><?= $result_c['c_address'] ?></td>
                                </tr>
                                <tr>
                                    <td>เบอร์โทรติดต่อ</td>
                                    <td><?= $result_c['c_tela'] ?></td>
                                </tr>
                                <tr>
                                    <td>ตำแหน่งที่ฝึก</td>
                                    <td><?= $result_c['rank'] ?></td>
                                </tr>
                                <tr>
                                    <td>เวลาเข้างาน - เลิกงาน</td>
                                    <td> 8:00 - 17:00 น </td>
                                </tr>
                                <tr>
                                    <td>จำนวนชั่วโมงที่ฝึกแล้ว</td>
                                    <td><?= $row_sum['clock'] ?> ชั่วโมง</td>
                                </tr>
                                <?php if ($result['status_work'] == 4) { ?>
                                <tr>
                                    <td> </td>
                                    <td> ผ่านการฝึกงาน</td>
                                </tr>
                                <?php }?>

                                </tbody>
                            </table>
                            <?php } ?>
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