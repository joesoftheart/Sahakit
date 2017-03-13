<!DOCTYPE html>
<?php
include '../php/config.php';
include "../php/database.class_company.php";


$db = new Database();
$db->connect();
if (isset($_POST['search_user'])) {
    //get search user
    $get_user = $db->search_user($_POST['search_user']);

} else {
    //call method getUser
    $get_user = $db->get_all_user();
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sahakit</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../script/script_company.js"></script>
    <style>
        body {
            margin-top: 20px;
        }

        .loading {
            background-image: url("../img/ajax-loader.gif");
            background-repeat: no-repeat;
            display: none;
            height: 100px;
            width: 100px;
        }
    </style>
</head>
<body background="../img/jennifer.gif">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อสถานประกอบการที่เข้าร่วมโครงการ</th>
                            <th>วันที่ลงนาม</th>
                            <th>เวลาลงนาม</th>
                            <th>หลักฐานสัญญา</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        if (!empty($get_user)) {
                            foreach ($get_user as $user) {
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td><?php echo $user['c_name']; ?> </td>
                                    <td>วันที่ <?php echo $user['d_mou']; ?> เดือน <?php echo $user['m_mou']; ?> พ.ศ.<?php echo $user['y_mou']; ?></td>
                                    <td><?php echo $user['time_mou'] ?></td>
                                    <td class="text-center"><a href="do_mou.php?id=<?= $user['cid']; ?>"><img src="../img/png/file.png" width="45px" height="45px"> </a></td>
                                </tr>
                                <?php
                                $i++;
                            }
                        } else {
                            echo "<tr><td colspan='5' align='center'>ไม่พบข้อมูล</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <a href="index.php"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Tooltip on bottom">กลับหน้าแรก</button> </a>



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