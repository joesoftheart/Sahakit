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
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <?php




        $status = $_SESSION['status'];
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];


        $sql_student1 = "SELECT * FROM company INNER JOIN register_work ON register_work.cid = company.cid 
                                                 INNER JOIN student ON register_work.sid = student.sid
                                                 INNER JOIN post_company ON register_work.idpost = post_company.idpost
                                                 WHERE register_work.status_work = 1 && company.cid = $cid";
        $query_student1= mysqli_query($link, $sql_student1);

        $sql_student2 = "SELECT * FROM company INNER JOIN register_work ON register_work.cid = company.cid
                                                 INNER JOIN student ON register_work.sid = student.sid
                                                 INNER JOIN post_company ON register_work.idpost = post_company.idpost
                                                 WHERE register_work.status_work = 2 && company.cid = $cid";
        $query_student2 = mysqli_query($link, $sql_student2);




    $sql3 = "SELECT * FROM company WHERE cid= $cid AND c_status_join = 1";
    $qquery = mysqli_query($link,$sql3);
    $result = mysqli_fetch_array($qquery);

    ?>
</head>
<body>
<?php include 'menu_company.php'?>
    <div id="page-wrapper">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" >
                <div class="panel panel-red" style="margin-top: 10%">
                    <div class="panel-heading">
                        รายชื่อ " นักศึกษา " ที่สมัครฝึกงาน
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table table-responsive">
                                    <table class="table table table-hover table-bordered ">
                                        <tr>
                                            <th class="text-center">ลำดับ</th>
                                            <th class="text-center">ชื่อนักศึกษา</th>
                                            <th class="text-center">ตำแหน่ง</th>
                                            <th class="text-center">ข้อมูลส่วนตัว</th>
                                            <th class="text-center">ดู เรซูเม่</th>
                                            <th class="text-center">สมัครมาวันที่</th>
                                            <th class="text-center">ยอมรับ</th>
                                        </tr>
                                        <?php  for ($i=1; $row = mysqli_fetch_array($query_student1); $i++) { ?>
                                            <tr>
                                                <td class="text-center"><?= $i; ?></td>
                                                <td class="text-center"><?= $row['fn_st'] ?> <?= $row['ln_st'] ?></td>
                                                <td class="text-center"><?= $row['rank'] ?></td>
                                                <td class="text-center"><a href="#" data-toggle="modal"
                                                       data-target="#myModal1<?= $row['sid'] ?>">ดูประวัติส่วนตัว</a>
                                                </td>
                                                <td class="text-center"> <a href="../myfile/resume/student/<?= $row["resume_upload"]; ?>" download  >
                                                        <?= $row["resume_upload"]; ?></a>
                                                    </td>
                                                <td class="text-center"><?= $row['dmt'] ?></td>
                                                <td class="text-center">
                                                    <?php if ($row['status_work'] == 1) {?>
                                                    <button class="btn btn-outline btn-success"
                                                            onclick="update('<?= $row['rwid'] ?>')">อนุมัติ</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>



                                            <div id="myModal1<?= $row['sid'] ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="../php/getform_work.php" method="post" enctype="multipart/form-data">
                                                                        <div class=" text-center">
                                                                            <h1><?= $row['fn_st'] ?> <?= $row['ln_st'] ?></h1>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>รหัสนักศึกษา</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"> <?= $row['number_id'] ?>
                                                                                    </p>
                                                                                </div>



                                                                                <div class="col-md-5 col-md-offset-1">
                                                                                    <label>คณะ</label>
                                                                                    <p>วิทยาศาสตร์และเทคโนโลยี</p>
                                                                                </div>
                                                                                <div class="col-md-5 col-md-offset-1">
                                                                                    <label>สาขา</label>
                                                                                    <p>วิทยาการคอมพิวเตอร์ </p>
                                                                                </div>


                                                                                <div class="col-md-5 col-md-offset-1">
                                                                                    <label>ที่อยู่ </label>
                                                                                    <p><?= $row['house_no'] ?> <?= $row['village_no'] ?> <?= $row['province'] ?> </p>
                                                                                </div>


                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>ตำแหน่ง</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"><?= $row['rank'] ?>
                                                                                    </p>
                                                                                </div>

                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>คุณสมบัติผู้สมัคร</label>
                                                                                    <p><img src="../img/checked.png" width="15px"
                                                                                            height="15px"> <?= $row['property'] ?></p>
                                                                                </div>


                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>วิธีการสมัคร</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"> </p>
                                                                                </div>



                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>ติดต่อ</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"> <?= $row['c_tela'] ?> </p>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <?php }  ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6" style="margin-top: 5%">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        รายชื่อ " นักศึกษา " รอการอนุมัติ
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table table-responsive">
                                    <table class="table table-hover  table-bordered ">
                                        <tr>
                                            <th width="9%">ลำดับ</th>
                                            <th width="18%">ชื่อนักศึกษา</th>
                                            <th width="15%">ตำแหน่ง</th>
                                            <th width="15%">ข้อมูลส่วนตัว</th>
                                            <th width="15%">สถานะ</th>

                                        </tr>
                                        <?php  for ($j=1; $row1 = mysqli_fetch_array($query_student2); $j++){ ?>
                                                <tr id="data">
                                                    <td> <?= $j ?></td>
                                                    <td><?= $row1['fn_st'] ?> <?= $row1['ln_st'] ?></td>
                                                    <td><?= $row1['rank'] ?></td>
                                                    <td><a href="#" data-toggle="modal"
                                                           data-target="#myModal2<?= $row1['sid'] ?>">ดูประวัติส่วนตัว</a>
                                                    </td>
                                                    <td><font color="#b8860b">รอยืนยันการเข้าทำงานของนักศึกษา</font> </td>
                                                </tr>



                                            <div id="myModal2<?= $row1['sid'] ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title"></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="../php/getform_work.php" method="post" enctype="multipart/form-data">
                                                                        <div class=" text-center">
                                                                            <h1><?= $row1['fn_st'] ?> <?= $row1['ln_st'] ?></h1>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="row">
                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>รหัสนักศึกษา</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"> <?= $row1['number_id'] ?>
                                                                                    </p>
                                                                                </div>



                                                                                <div class="col-md-5 col-md-offset-1">
                                                                                    <label>คณะ</label>
                                                                                    <p>วิทยาศาสตร์และเทคโนโลยี</p>
                                                                                </div>
                                                                                <div class="col-md-5 col-md-offset-1">
                                                                                    <label>สาขา</label>
                                                                                    <p>วิทยาการคอมพิวเตอร์ </p>
                                                                                </div>


                                                                                <div class="col-md-5 col-md-offset-1">
                                                                                    <label>ที่อยู่ </label>
                                                                                    <p><?= $row1['house_no'] ?> <?= $row1['village_no'] ?> <?= $row1['province'] ?> </p>
                                                                                </div>


                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>ตำแหน่ง</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"><?= $row1['rank'] ?>
                                                                                    </p>
                                                                                </div>

                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>คุณสมบัติผู้สมัคร</label>
                                                                                    <p><img src="../img/checked.png" width="15px"
                                                                                            height="15px"> <?= $row1['property'] ?></p>
                                                                                </div>


                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>วิธีการสมัคร</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"> </p>
                                                                                </div>



                                                                                <div class="col-md-10 col-md-offset-1">
                                                                                    <label>ติดต่อ</label>
                                                                                    <p><img src="../img/checked.png" width="15px" height="15px"> <?= $row1['c_tela'] ?> </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
        </div>





<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>

<script>
    function update(id) {
        $.ajax({
            type: "POST",
            url: "../php/update_company.php",
            data: "id=" + id,
            success: function (data) {
                window.location.reload();
            }
        });
        return false;
    }
</script>
</body>

</html>