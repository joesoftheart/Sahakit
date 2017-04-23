<?php
session_start();

include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');


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
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <?php
    $status = $_SESSION['status'];
    $c_name = $_SESSION['c_name'];
    $cid = $_SESSION['cid'];

    $sql = "SELECT * FROM post_company WHERE cid = $cid";
    $query = mysqli_query($link, $sql);
    $result = mysqli_fetch_array($query);

    $sql3 = "SELECT * FROM company WHERE cid= $cid AND c_status_join = 1";
    $qquery = mysqli_query($link, $sql3);
    $result = mysqli_fetch_array($qquery);

    ?>
</head>
<body>
<?php include 'menu_company.php' ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="panel panel-info" style="margin-top: 5%">
            <div class="panel-body">

                <div class="col-md-12">
                    <div class="table table-responsive">
                        <table class="table table table-hover ">
                            <thead>
                            <tr>
                                <th class="text-center">จำนวนโพส</th>
                                <th class="text-center">รายละเอียด</th>
                                <th class="text-center">เวลาที่โพส</th>
                                <th class="text-center">View</th>
                            </tr>
                            </thead>
                            <?php
                            $mysql = "SELECT * FROM post_company post INNER JOIN company com ON post.cid = com.cid WHERE post.cid=$cid";
                            $query_detail = mysqli_query($link, $mysql) or die($mysql);


                            ?>
                            <?php for ($i = 1;
                            $row_detail = mysqli_fetch_array($query_detail);
                            $i++) { ?>
                            <tbody>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td class="text-center"><?= $row_detail['detail_work'] ?></td>
                                <td class="text-center"><?= $row_detail['dmt'] ?></td>
                                <td class="text-center">
                                    <a href="#" data-toggle="modal"
                                       data-target=".bs-example-modal-md<?= $row_detail['idpost'] ?>">
                                        <img src="../img/png/search.png" width="30px" heighi="30px"> </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="modal fade bs-example-modal-md<?= $row_detail['idpost'] ?>"
                             tabindex="-1" role="dialog"
                             aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body ">
                                        <form action="../php/get_work_post_edit.php"
                                              method="post"
                                              enctype="multipart/form-data">
                                            <input type="hidden" name="idpost"
                                                   value="<?= $row_detail['idpost'] ?>">
                                            <input type="hidden" name="cid"
                                                   value="<?= $cid ?> ">
                                            <div class="row">
                                                <div class="col-md-12 table-responsive">
                                                    <table class="table table-bordered">

                                                        <tbody>
                                                        <tr>
                                                            <td>รายละเอียดบริษัท</td>
                                                            <td>
                                                                <input type="text" name="detail_work"
                                                                       class="form-control" required="required"
                                                                       value="<?= $row_detail['detail_work'] ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>เว็บไซต์</td>
                                                            <td>
                                                                <input type="text" name="web"
                                                                       class="form-control"
                                                                       required="required"
                                                                       value=" <?= $row_detail['web'] ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>ต้องการนักศึกษาตำแหน่ง</td>
                                                            <td>
                                                                <?php if ($row_detail['rank'] == "System Engineer" or $row_detail['rank'] == "System Administrator" or $row_detail['rank'] == "Network Engineer" or $row_detail['rank'] == "Network Administrator" or $row_detail['rank'] == "IT Administrator" or $row_detail['rank'] == "IT Security" or $row_detail['rank'] == "Network Security" or $row_detail['rank'] == "Internet Security Manager" or $row_detail['rank'] == "IT Network Infrastructure" or $row_detail['rank'] == "Network Operation" or $row_detail['rank'] == "Internet Security Systems Engineer" or $row_detail['rank'] == "Linux Administrator" or $row_detail['rank'] == "Programmer" or $row_detail['rank'] == "Systems Analyst" or $row_detail['rank'] == "Business Analyst") { ?>
                                                                    <select name="rank" class="form-control"
                                                                            id="selectBox" onchange="changeFunc()">
                                                                        <option
                                                                            value="System Engineer" <?php if ($row_detail['rank'] == "System Engineer") { ?> selected <?php } ?> >
                                                                            System Engineer
                                                                        </option>
                                                                        <option
                                                                            value="System Administrator" <?php if ($row_detail['rank'] == "System Administrator") { ?> selected <?php } ?>>
                                                                            System Administrator
                                                                        </option>
                                                                        <option
                                                                            value="Network Engineer" <?php if ($row_detail['rank'] == "Network Engineer") { ?> selected <?php } ?>>
                                                                            Network Engineer
                                                                        </option>
                                                                        <option
                                                                            value="Network Administrator" <?php if ($row_detail['rank'] == "Network Administrator") { ?> selected <?php } ?>>
                                                                            Network Administrator
                                                                        </option>
                                                                        <option
                                                                            value="IT Administrator" <?php if ($row_detail['rank'] == "IT Administrator") { ?> selected <?php } ?>>
                                                                            IT Administrator
                                                                        </option>
                                                                        <option
                                                                            value="IT Security" <?php if ($row_detail['rank'] == "IT Security") { ?> selected <?php } ?>>
                                                                            IT Security
                                                                        </option>
                                                                        <option
                                                                            value="Network Security" <?php if ($row_detail['rank'] == "Network Security") { ?> selected <?php } ?>>
                                                                            Network Security
                                                                        </option>
                                                                        <option
                                                                            value="Internet Security Manager" <?php if ($row_detail['rank'] == "Internet Security Manager") { ?> selected <?php } ?>>
                                                                            Internet Security Manager
                                                                        </option>
                                                                        <option
                                                                            value="IT Network Infrastructure" <?php if ($row_detail['rank'] == "IT Network Infrastructure") { ?> selected <?php } ?>>
                                                                            IT Network Infrastructure
                                                                        </option>
                                                                        <option
                                                                            value="Network Operation" <?php if ($row_detail['rank'] == "Network Operation") { ?> selected <?php } ?>>
                                                                            Network Operation
                                                                        </option>
                                                                        <option
                                                                            value="Internet Security Systems Engineer" <?php if ($row_detail['rank'] == "Internet Security Systems Engineer") { ?> selected <?php } ?>>
                                                                            Internet Security Systems Engineer
                                                                        </option>
                                                                        <option
                                                                            value="Linux Administrator" <?php if ($row_detail['rank'] == "Linux Administrator") { ?> selected <?php } ?>>
                                                                            Linux Administrator
                                                                        </option>
                                                                        <option
                                                                            value="Programmer" <?php if ($row_detail['rank'] == "Programmer") { ?> selected <?php } ?>>
                                                                            Programmer
                                                                        </option>
                                                                        <option
                                                                            value="Systems Analyst" <?php if ($row_detail['rank'] == "Systems Analyst") { ?> selected <?php } ?>>
                                                                            Systems Analyst
                                                                        </option>
                                                                        <option
                                                                            value="Business Analyst" <?php if ($row_detail['rank'] == "Business Analyst") { ?> selected <?php } ?>>
                                                                            Business Analyst
                                                                        </option>
                                                                    </select>
                                                                <?php } else { ?>
                                                                    <input type="text" name="rank"
                                                                           class="form-control"
                                                                           value="<?= $row_detail['rank'] ?>">
                                                                <?php } ?>
                                                            </td>
                                                        <tr>

                                                            <td>ต้องการนักศึกษา</td>
                                                            <td>
                                                                <select name="num_stu" class="form-control">
                                                                    <option
                                                                        value="1" <?php if ($row_detail['num_stu'] == 1) { ?> selected="selected" <?php } ?>>
                                                                        1 อัตรา
                                                                    </option>
                                                                    <option
                                                                        value="2" <?php if ($row_detail['num_stu'] == 2) { ?> selected="selected" <?php } ?>>
                                                                        2 อัตรา
                                                                    </option>
                                                                    <option
                                                                        value="3" <?php if ($row_detail['num_stu'] == 3) { ?> selected="selected" <?php } ?>>
                                                                        3 อัตรา
                                                                    </option>
                                                                    <option
                                                                        value="4" <?php if ($row_detail['num_stu'] == 4) { ?> selected="selected" <?php } ?>>
                                                                        4 อัตรา
                                                                    </option>
                                                                    <option
                                                                        value="5" <?php if ($row_detail['num_stu'] == 5) { ?> selected="selected" <?php } ?>>
                                                                        5 อัตรา
                                                                    </option>
                                                                    <option
                                                                        value="6" <?php if ($row_detail['num_stu'] == 6) { ?> selected="selected" <?php } ?>>
                                                                        6 อัตรา
                                                                    </option>
                                                                    <option
                                                                        value="7" <?php if ($row_detail['num_stu'] == 7) { ?> selected="selected" <?php } ?>>
                                                                        7 อัตรา
                                                                    </option>
                                                                    <option
                                                                        value="8" <?php if ($row_detail['num_stu'] == 8) { ?> selected="selected" <?php } ?>>
                                                                        8 อัตรา
                                                                    </option>
                                                                    <option
                                                                        value="9" <?php if ($row_detail['num_stu'] == 9) { ?> selected="selected" <?php } ?>>
                                                                        9 อัตรา
                                                                    </option>
                                                                    <option
                                                                        value="10" <?php if ($row_detail['num_stu'] == 10) { ?> selected="selected" <?php } ?>>
                                                                        10 อัตรา
                                                                    </option>
                                                                    <option
                                                                        value="ต้องการนักศึกษาจำนวนมาก" <?php if ($row_detail['num_stu'] == "ต้องการนักศึกษาจำนวนมาก") { ?> selected="selected" <?php } ?>>
                                                                        ต้องการนักศึกษาจำนวนมาก
                                                                    </option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td>รายละเอียดงาน</td>
                                                            <td>
                            <textarea name="detail" class="form-control"
                                      rows="3"
                                      required="required"><?= $row_detail['detail'] ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>


                                                            <td>คุณสมบัติที่ต้องการ</td>
                                                            <td>
                            <textarea name="property" class="form-control"
                                      rows="3"
                                      required="required"><?= $row_detail['property'] ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>สถานที่ปฏิบัติงาน</td>
                                                            <td>
                            <textarea name="map_work" class="form-control"
                                      rows="3"
                                      required="required"><?= $row_detail['map_work'] ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>ข้อเสนอพิเศษ อย่างเช่น
                                                                เบี้ยเลี้ยง,ค่าเดินทาง
                                                            </td>
                                                            <td>
                                                                <input type="text" name="gold"
                                                                       class="form-control"
                                                                       value="<?= $row_detail['gold'] ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td colspan="2">
                                                                <p><?= $row_detail['dmt'] ?></p>
                                                                <input type="hidden" name="dmt"
                                                                       value="<?php echo thaidate('แก้ไขล่าสุด วัน l ที่ j เดือน F พ.ศ. Y เวลา H:i:s'); ?> ">
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td colspan="2" align="right">
                                                                <button type="submit" class="btn btn-warning">
                                                                    แก้ไข
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>


<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>

<script src="../data/morris-data.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>


<script>
    function changeFunc() {
        var selectBox = document.getElementById("selectBox");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        if (selectedValue.toString() == "Other") {
            alert(selectedValue)
            $('.other').removeClass('hide');

        }
    }
</script>
</body>
</html>