<?php
session_start();
include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');
?>


<html>

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

    <?PHP
    $tid = $_SESSION['tid'];
    $status = $_SESSION['status'];
    $fn_te = $_SESSION['fn_te'];
    $ln_te = $_SESSION['ln_te'];


    $SQL = "SELECT * FROM student INNER JOIN register_work ON student.sid = register_work.sid
                                  INNER JOIN company ON company.cid = register_work.cid";
    $query = mysqli_query($link, $SQL);



    ?>


</head>
<body>
<?php include 'menu_teacher.php'?>

<?php $mysql = "SELECT * FROM register_work";
$query1 = mysqli_query($link,$mysql);
$check = mysqli_fetch_array($query1);

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12" style="margin-top: 5%">
            <div class="panel panel-yellow">
                <div class="panel-body">
                    <div class="col-md-12 table-responsive" >
                        <table class="table table-hover">
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">รูปประจำตัว</th>
                                <th class="text-center">รหัสนักศึกษา</th>
                                <th class="text-center">ชื่อนักศึกษา</th>
                                <th class="text-center">เบอร์โทร</th>
                                <th class="text-center">ชื่อบริษัท</th>
                                <th class="text-center">ตำแหน่งงานที่สมัคร</th>
                                <th class="text-center">สถานที่ตั้ง</th>

                            </tr>
                            <?php  if ($check == null) { ?>

                                <tr>
                                    <td class="text-center" colspan="4">ไม่มีข้อมูล</td>
                                </tr>

                            <?php  }   for($i=1;$result = mysqli_fetch_array($query);$i++) {?>
                                <tr>
                                    <td class="text-center"> <?= $i ?></td>
                                    <td class="text-center"> <img id="myImg" src="../uploads/student/<?=$result['filetoload']?>"  width="50px" height="50px" /> </td>
                                    <td class="text-center"><?= $result['number_id'] ?></td>
                                    <td class="text-center"><?= $result['fn_st'] ?>  <?= $result['ln_st'] ?></td>
                                    <td class="text-center"><?= $result['telaphone'] ?></td>
                                    <td><?= $result['c_name'] ?></td>
                                    <td class="text-center"><?= $result['rank'] ?></td>
                                    <td><?= $result['c_address'] ?></td>

                                </tr>

                            <?php } ?>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>


<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>


</body>

</html>