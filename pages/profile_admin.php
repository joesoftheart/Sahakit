<?php
session_start();
include '../php/config.php';

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sahakit</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../script/script_teacher.js"></script>

</head>
<body>
<?php include 'menu_admin.php'?>
    <?php

    $sql = "SELECT * FROM company WHERE c_status_join = 0";
    $query = mysqli_query($link, $sql);


    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <ol class="breadcrumb">
                        <li class="active">Home</a></li>

                    </ol>
                </div>
                <div class="panel panel-danger" style="margin-top: 5%">

                    <!-- /.panel-heading -->
                    <div class="col-md-10 col-md-offset-1">
                    <div class="panel-body">
                        <div class="table-responsive ">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ชื่อบริษัท</th>
                                    <th>ชื่อผู้ลงนาม</th>
                                    <th>ตำแหน่ง</th>
                                    <th>วันที่ลงนาม</th>
                                    <th>เวลาลงนาม</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <?php  while ($row = mysqli_fetch_array($query)){ ?>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td><?= $row['c_name'] ?></td>
                                        <td><?= $row['leader'] ?></td>
                                        <td><?= $row['rank_leader'] ?></td>
                                        <td>วันที่ <?= $row['d_mou'] ?> เดือน <?= $row['d_mou'] ?>
                                            พ.ศ. <?= $row['d_mou'] ?></td>
                                        <td><?= $row['time_mou'] ?></td>
                                        <td><a href="../php/update_status.php?id=<?= $row['cid'] ?>"> ยอมรับ</a></td>
                                    </tr>

                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                        </div>
                </div>
                <!-- /.panel -->
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