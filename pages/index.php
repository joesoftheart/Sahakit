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
<style type="text/css">
    .cut{
        width: 250px;
        height: 30px;
        solid #ccc;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

</style>

  

    <?php
    $status = null;

    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
    }

    ?>
</head>

<body>

<?php include 'menu_index.php'?>

    <?php
    $sql1 = "SELECT * FROM news ORDER BY id DESC limit 4 ";
    $query1 = mysqli_query($link, $sql1);
    ?>
    <div id="page-wrapper">
        <br>
        <div class="row">
            <div class="col-md-12">
                <img class="thumbnail img-responsive" src="../img/index.png">
                <h5 class="page-header"><i class="fa fa-newspaper-o" aria-hidden="true"></i>  ข่าวประชาสัมพันธ์</h5>
                <?php $i = 0 ?>
            <?php while ($row1 = mysqli_fetch_array($query1)) { $i++?>
                <?php if($i > 3) { ?>
                    <h5 class="pull-right" style="margin-right: 10px;"><a href="all_new.php">อ่านทั้งหมด>></a> </h5>
                    <?php  } else { ?>
                <div class="col-md-4 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?= $row1['news_story'] ?>
                        </div>
                        <div class="panel-body">
                            <p class="cut"><?= $row1['fntroductory_message'] ?> </p>
                            <p>
                                <small>โพสต์เมื่อ : <?= $row1['dmt'] ?></small>
                            </p>
                            <a href="index_show_news.php?id=<?= $row1['id'] ?>" target="_blank" class="btn btn-outline btn-info pull-right">อ่านต่อ</a>
                        </div>
                    </div>
                </div>
                    <?php } ?>
            <?php } ?>
                </div>
            </div>
        <?php
        $sql = "SELECT * FROM student ";
        $query = mysqli_query($link, $sql);

        ?>
        <div class="col-md-12">
            <h5 class="page-header">
                ผลงานนักศึกษา
            </h5>
        </div>
        <div class="row">
            <div class="col-md-6">

                    <div class="panel-heading">

                    </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>สาขา</th>
                            </tr>
                            </thead>
                            <?php $i=1; while ($row = mysqli_fetch_array($query)) { ?>
                            <tbody>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['fn_st'] ?></td>
                                <td><?= $row['ln_st'] ?></td>
                                <td>วิทยาการคอมพิวเตอร์</td>
                            </tr>
                            </tbody>
                            <?php } $i++; ?>
                        </table>
            </div>
            <div class="col-md-6">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-pie-chart"></div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->



        </div>
    </div>
    <footer class="panel-footer">
        <div class="container">
            <p class="text-muted"><i class="fa fa-copyright"></i> Copy right form Rajabhat Bansomdejchaopraya University</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/flot/excanvas.min.js"></script>
    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../data/flot-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>
