<?php
session_start();

include '../php/config.php';
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>สหกิจศึกษา</title>


    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <?php

        $status = $_SESSION['status'];
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];


        $sql = "SELECT * FROM register_work , company,student
                          WHERE register_work.cid = company.cid
                            AND register_work.sid = student.sid
                              AND register_work.status_work = 4  
                              AND register_work.cid = $cid";
        $query = mysqli_query($link, $sql);

    $sql3 = "SELECT * FROM company WHERE cid= $cid AND c_status_join = 1";
    $qquery = mysqli_query($link,$sql3);
    $result = mysqli_fetch_array($qquery);

    ?>
</head>
<body>
<?php include 'menu_company.php'?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row" style="margin-top: 5%">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            รายชื่อนักศึกษาที่ผ่านการฝึกงาน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover"
                                   id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>รหัสนักศึกษา</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>ฝึกงานตำแหน่ง</th>
                                    <th>เข้ามาฝึกงานเมื่อ</th>
                                    <th>ใบรองรับการฝึกงาน</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?= $row['number_id']; ?></td>
                                        <td><?= $row['fn_st']; ?>  <?= $row['ln_st']; ?></td>
                                        <td class="center"><?= $row['rank']; ?></td>
                                        <td class="center"><?= $row['dmt']; ?></td>
                                        <td>นี่ไงใบฝึกงานเสด</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

</body>

</html>