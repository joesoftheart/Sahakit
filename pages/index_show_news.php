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
<style>
    .cut{
        color: red;
        size: 100px;
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
    $sql1 = "SELECT *  FROM news WHERE id = " . $_GET['id'] . " ";
    $query1 = mysqli_query($link, $sql1);
    $row1 = mysqli_fetch_array($query1);
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 " style="margin-top: 5%">
                    <div class="panel">
                        <div class="panel-heading">
                            <?= $row1['news_story'] ?> <br>
                        </div>

                        <div class="panel-body">
                            <p class="cut"><?= $row1['fntroductory_message'] ?> </p> <br>
                        </div>
                        <div>
                            <?= $row1['featuring_news'] ?>
                            </div>
                        <div class="panel-footer">
                        <p>
                            <small>ประกาศ ณ วันที่ <?= $row1['dmt'] ?></small>
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</div>




        <footer class="panel-footer">
            <div class="container">
                <p class="text-muted"><i class="fa fa-copyright"></i> Copy right form Rajabhat Bansomdejchaopraya
                    University</p>
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
