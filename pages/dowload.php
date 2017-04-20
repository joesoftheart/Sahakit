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
    .jj {

        display: block;
        width: 138px;
        height: 138px;
        background-image: url("../img/jaja.png");
        text-align: center;

        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        padding-top: 80px;
        background-repeat: repeat-y;
    }

    td.padding1 {padding: 0.2cm}
    td.padding2 {padding: 0.5cm 2.5cm}

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
    $strSQL = "SELECT * FROM files_student";
    $objQuery = mysqli_query($link, $strSQL) or die ("Error Query [" . $strSQL . "]");

    $strSQL_1 = "SELECT * FROM files_teacher";
    $objQuery_1 = mysqli_query($link, $strSQL_1) or die ("Error Query [" . $strSQL_1 . "]");

    $strSQL_2 = "SELECT * FROM files_company";
    $objQuery_2 = mysqli_query($link, $strSQL_2) or die ("Error Query [" . $strSQL_2 . "]");
    ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-default">
                    <h4 class="page-header">
                        ดาวน์โหลดไฟล์เอกสาร
                    </h4>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                                    <table >
                                        <tr>
                                            <th >สำหรับนักศึกษา</th>
                                        </tr>

                                        <tr>
                                            <?php
                                            while ($objResult = mysqli_fetch_array($objQuery)) {
                                                ?>
                                                <td class="padding1"> <a href="../myfile/student/<?php echo $objResult["filestudent"]; ?>"
                                                        download class="jj" >
                                                        <?= $objResult["filestudent"]; ?></a>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>

                                        </table>
                                <br><br>
                                <table>
                                    <tr>
                                        <th>อาจารย์</th>
                                    </tr>
                                        <tr>
                                        <?php while ($objResult_1 = mysqli_fetch_array($objQuery_1)) { ?>
                                            <td class="padding1"><a href="../myfile/techer/<?php echo $objResult_1["filesteacher"]; ?>"
                                                   download class="jj"><?= $objResult_1["filesteacher"]; ?></a></td>
                                            <?php
                                        }
                                        ?>
                                            </tr>
                                    </table>
                                <br><br>
                                <table>
                                    <tr>
                                        <th>บริษัท</th>
                                    </tr>
                                    <tr>
                                        <?php while ($objResult_2 = mysqli_fetch_array($objQuery_2)) { ?>
                                            <td class="padding1"><a href="../myfile/company/<?= $objResult_2["filescompany"]; ?>"
                                                   download class="jj">
                                                    <?= $objResult_2["filescompany"]; ?></a></td>
                                            <?php
                                        }
                                        ?>
                                        </tr>

                                    </table>
                                    <?php
                                    mysqli_close($link);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- /.table-responsive -->

    </div>
    <!-- /.panel -->
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

<script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>
