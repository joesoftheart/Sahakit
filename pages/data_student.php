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
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <?PHP
    $tid = $_SESSION['tid'];
    $status = $_SESSION['status'];
    $fn_te = $_SESSION['fn_te'];
    $ln_te = $_SESSION['ln_te'];

    $mysql = "SELECT * FROM teacher WHERE tid = $tid";
    $query_teacher = mysqli_query($link, $mysql);
    $row = mysqli_fetch_array($query_teacher);

    $msql = "SELECT * FROM register_work";
    $query_status = mysqli_query($link, $msql);
    $row_status = mysqli_fetch_array($query_status);
    ?>


</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <i class="fa fa-home"></i> หน้าแรก </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li><?= $status ?> </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $fn_te ?>  <?= $ln_te ?> <i
                        class="fa fa-user"></i> <b class="caret"></b> </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="../pages/profile_teacher.php"><i class="glyphicon glyphicon-user"></i>โปรไฟล์</a></li>
                    <li><a href="../pages/editprofile_teacher.php"><i class="glyphicon glyphicon-edit"></i> แก้ไขโปรไฟล์</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="../php/logout.php"><i class="glyphicon glyphicon-off"></i> ลงชื่อออก</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li><a href="#"><img src="../img/png/user-6.png" width="25px" height="25px"> นักศึกษา <span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="data_student.php">นักศึกษาในการดูแล</a></li>
                            <li><a href="all_student.php">นักศึกษาสหกิจทั้งหมด</a></li>
                        </ul>
                    </li>
                    <li><a href="do_join_work.php"><img src="../img/png/file.png" width="25px" height="25px">
                            การสมัครงานนักศึกษา</a></li>

                </ul>
            </div>
    </nav>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-danger" style="margin-top: 5%">
                        <div class="panel-body">
                            <div class="row"
                            ">
                            <div class="col-md-12">
                                <table width="100%" class="table table-striped table-hover table-responsive"
                                       id="dataTables-example">
                                    <thead>
                                    <tr align="center">
                                        <th class="text-center">รหัสนักศึกษา</th>
                                        <th class="text-center">ชื่อนักศึกษา</th>
                                        <th class="text-center">ตำแหน่งงานที่สมัคร</th>
                                        <th class="text-center">สถานที่ตั้งบริษัท</th>
                                        <th class="text-center">สถานะการสมัครงาน</th>
                                        <?php if ($row_status['status_work'] == 2 || $row_status['status_work'] == 3) { ?>
                                            <th class="text-center">รายงาน</th>
                                            <th class="text-center">ประเมิน</th>
                                            <th class="text-center">ลบนักศึกษา</th>
                                        <?php } ?>

                                    </tr>
                                    </thead>
                                    <?php
                                    $sql_register = "SELECT * FROM teacher INNER JOIN student ON student.tid = $tid
                                                                          INNER JOIN register_work ON student.sid = register_work.sid";
                                    $query_regiswork = mysqli_query($link, $sql_register);

                                    $sql_evaluator ="SELECT * FROM evaluator_company ";
                                    $query_evaluator = mysqli_query($link,$sql_evaluator);
                                    $row_evaluator = mysqli_fetch_array($query_evaluator);

                                    $sql_student = "SELECT * FROM student WHERE tid = $tid";
                                    $query_student = mysqli_query($link,$sql_student);
                                    $row_student = mysqli_fetch_array($query_student);

                                    ?>


                                    <tbody>
                                    <?php for ($i = 1; $row_register = mysqli_fetch_array($query_regiswork); $i++) { ?>
                                        <tr>
                                            <td class="text-center"><?= $row_register['number_id'] ?></td>
                                            <td class="text-center"><?= $row_register['fn_st'] ?> <?= $row_register['ln_st'] ?></td>
                                            <td class="text-center"><?= $row_register['rank'] ?></td>
                                            <td class="text-center"><?= $row_register['map_work'] ?></td>
                                            <?php if($row_register['status_work'] == 0) { ?>
                                            <td class="text-center"><font color="orange">ยังไม่มีที่ฝึกงาน</font></td>
                                            <?php } elseif($row_register['status_work'] == 1) { ?>
                                            <td class="text-center"><font color="#ff4500">รออนุมัติ</font></td>
                                            <?php }elseif($row_register['status_work'] == 2){ ?>
                                                <td class="text-center"><font color="green">กำลังฝึกงาน</font></td>
                                           <?php }elseif($row_register['status_work'] == 3){ ?>
                                            <td class="text-center"><font color="blue">ผ่านการฝึกงานแล้ว</font></td>
                                            <?php }?>
                                            <?php  if ($row_register['status_work'] == 2 || $row_register['status_work'] == 3) { ?>
                                                <td class="text-center"><a
                                                        href="list_conclude_teacher.php?id=<?= $row_register['sid'] ?>">
                                                        <img
                                                            src="../img/png2/notepad-8.png" width="30px"
                                                            height="30px"></a></td>
                                                <td class="text-center"><a
                                                        href="evaluation_for_teacher.php?sid=<?= $row_register['sid'] ?>"><img
                                                            src="../img/png/notebook-4.png"
                                                            width="30px" height="30px"></a>
                                                </td>
                                                <td class="text-center"><a
                                                        href="delete_student.php?id=<?= $row_register['sid']; ?>"> <img
                                                            src="../img/png/garbage-1.png" width="30px"
                                                            height="30px"></a></td>
                                            <?php }  ?>
                                        </tr>
                                    <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer ">
                        <button type="button" data-toggle="modal" data-target="#myModall">
                            <img src="../img/png2/user-40.png" width="30px" height="30px"> เพิ่มนักศึกษา
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $sql_1 = "SELECT * FROM student WHERE tid = '0' ";
    $query_1 = mysqli_query($link, $sql_1);

    ?>
    <div id="myModall" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    ตารางเพิ่มนักศึกษา ของอาจารย์ นิเทศก์
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-4 col-lg-offset-8">
                                        <div class="input-group custom-search-form ">
                                            <input type="text" class="form-control" placeholder="รหัสนักศึกษา"
                                                   onkeyup="search_value(this.value)">
                                            <span class="input-group-btn">
                                        <button class="btn btn-primary " type="button">
                                                <i class="fa fa-search"></i>
                                        </button>
                                                </span>
                                        </div>
                                    </div>

                                    <br><br><br>

                                    <table width="100%" class="table  table-bordered table-hover"
                                           id="dataTables-example">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัสนักศึกษา</th>
                                            <th>ชื่อนักศึกษา</th>
                                            <th>status</th>
                                            <th>เพิ่ม</th>
                                        </tr>
                                        <tbody id="show_seach_value">
                                        <?php
                                        for ($j = 1; $row_1 = mysqli_fetch_array($query_1); $j++) { ?>
                                            <tr>
                                                <td> <?= $j; ?></td>
                                                <td><?php echo $row_1['number_id'] ?></td>
                                                <td><?= $row_1['fn_st'] ?> <?= $row_1['ln_st'] ?></td>
                                                <td><?= $row_1['status'] ?></td>
                                                <td>
                                                    <form action="add_techer_to_student.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="tid" value="<?= $row['tid'] ?>">
                                                    <input type="hidden" name="sid" value="<?= $row_1['sid'] ?>">
                                                    <input type="hidden" name="status_work" value="0">
                                                    <button type="submit" >
                                                        <img src="../img/png/add-1.png" width="30px" height="30px"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>

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


<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>
<?php $id = $row['tid'] . "." . $row_1['sid']; ?>
<script>
    function search_value(value) {
        var id = "<?=$id?>";
        var va_data = value;
        var sent_data = " ";
        if (va_data == "") {
            console.log('no value');
            $.getJSON("./get_value.php", {data: va_data}, function (data) {
                for (var i = 0; i < data.length; i++) {
                    sent_data += '<tr>';
                    sent_data += '<td>' + data[i]['level'] + '</td>';
                    sent_data += '<td>' + data[i]['fn_st'] + ' ' + data[i]['ln_st'] + '</td>';
                    sent_data += '<td>' + data[i]['idst'] + '</td>';
                    sent_data += '<td>' + data[i]['status'] + '</td>';
                    sent_data += '<td>' + '<a href="add_techer_to_student.php?idtecher="' + id + '>' + '<img src="../img/png/add-1.png" width="25px" height="25px"></a>' + '</td>';
                    sent_data += '</tr>';

                }
                $('#show_seach_value').html(sent_data);
            });

        } else {
            $.getJSON("./get_value.php", {data: va_data}, function (data) {
                if (data.length != " ") {
                    console.log("have value");
                    for (var i = 0; i < data.length; i++) {
                        sent_data += '<tr>';
                        sent_data += '<td>' + data[i]['level'] + '</td>';
                        sent_data += '<td>' + data[i]['fn_st'] + ' ' + data[i]['ln_st'] + '</td>';
                        sent_data += '<td>' + data[i]['idst'] + '</td>';
                        sent_data += '<td>' + data[i]['status'] + '</td>';
                        sent_data += '<td>' + '<a href="add_techer_to_student.php?idtecher="' + id + '>' + '<img src="../img/png/add-1.png" width="25px" height="25px"></a>' + '</td>';
                        sent_data += '</tr>';

                    }
                    $('#show_seach_value').html(sent_data);
                } else {
                    $('#show_seach_value').html("<tr align='center'><td colspan='5'><strong>ไม่พบข้อมูล</strong></td></tr>");
                }

            });

        }

    }
</script>

</body>

</html>