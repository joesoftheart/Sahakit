<?php session_start();
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

        $status = $_SESSION['status'];
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];



        $sql = "SELECT * FROM register_work 
                      INNER JOIN student ON register_work.sid = student.sid 
                      WHERE register_work.cid = $cid ";
        $query = mysqli_query($link, $sql);


        $sql_sum = "SELECT SUM(hour_amount) AS clock FROM execute  WHERE cid = $cid";
        $query_sum = mysqli_query($link,$sql_sum);
        $row_sum = mysqli_fetch_array($query_sum);


    $sql3 = "SELECT * FROM company WHERE cid= $cid AND c_status_join = 1";
    $qquery = mysqli_query($link,$sql3);
    $result = mysqli_fetch_array($qquery);

    ?>
</head>
<body>
<?php include 'menu_company.php'?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 5%">
            <div class="panel panel-yellow">
                <div class="panel-body">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>รูปประจำตัว</th>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อนักศึกษา</th>
                                <th class="right"></th>
                            </tr>
                            <?php  for ($i = 1; $result = mysqli_fetch_array($query); $i++) {
                                if ($result['status_work'] == '4') { ?>
                                    <tr>
                                        <td><img src="../uploads/student/<?= $result['filetoload'] ?>" width="50px"
                                                 height="50px"/></td>
                                        <td><?= $result['number_id'] ?></td>
                                        <td><?= $result['fn_st'] ?>  <?= $result['ln_st'] ?></td>
                                        <td><a href="#"
                                               class="btn btn-danger" disabled="disable">ประเมินแล้ว</a></td>
                                    </tr>
                                <?php } elseif ($result['status_work'] == '3') { ?>
                                    <tr>
                                        <td><img src="../uploads/student/<?= $result['filetoload'] ?>" width="50px"
                                                 height="50px"/></td>
                                        <td><?= $result['number_id'] ?></td>
                                        <td><?= $result['fn_st'] ?>  <?= $result['ln_st'] ?></td>
                                        <?php if ($row_sum['clock'] >= '300' ){ ?>
                                        <td><a href="evaluation_for_company.php?sid=<?= $result['sid'] ?>"
                                               class="btn btn-success">ประเมิน</a></td>
                                        <?php }else{ ?>
                                            <td><a href="#"
                                                   class="btn btn-danger" disabled="disable">ประเมิน</a></td>
                                       <?php } ?>
                                    </tr>
                                <?php }
                            }?>
                        </table>
                    </div>
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