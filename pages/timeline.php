<?php
session_start();
include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');
?>


<head xmlns="http://www.w3.org/1999/html">
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
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <?php
    $sid = $_SESSION['sid'];
    $status1 = $_SESSION['status'];
    $fn_st  = $_SESSION['fn_st'];
    $ln_st  = $_SESSION['ln_st'];
        $perpage = 4;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start = ($page - 1) * $perpage;


        if(isset($_GET['c_name'],$_GET['rank'])){

            $c_name = $_GET['c_name'];
            $rank = $_GET['rank'];


            if ($c_name != null && $rank == null) {

                $sql = "SELECT * FROM company INNER JOIN post_company ON company.cid = post_company.cid 
                                      WHERE company.c_name = '$c_name' limit {$start} , {$perpage}";
            $query = mysqli_query($link,$sql);


            } elseif ($c_name != null && $rank != null) {

            $sql_rank_name = "SELECT * FROM company,post_company
                                      WHERE company.cid = post_company.cid 
                                              AND company.c_name = '$c_name'
                                               AND post_company.rank = '$rank' limit {$start} , {$perpage}";

            $query = mysqli_query($link,$sql_rank_name);

            }else{

            }

        }else {

            $sql = "SELECT * FROM company,post_company
                                      WHERE company.cid = post_company.cid 
                                              AND company.c_name = c_name limit {$start} , {$perpage} ";
            $query = mysqli_query($link, $sql);

        }

        $sql3 = "SELECT * FROM student WHERE sid = $sid";
        $query3 = mysqli_query($link, $sql3);
        $row3 = mysqli_fetch_array($query3);

    $sql3 = "SELECT * FROM student
                        WHERE student.tid = $sid";
    $query2 = mysqli_query($link, $sql3);
    $row_tea = mysqli_fetch_array($query2);


    $sql1 = "SELECT * FROM student INNER JOIN register_work ON register_work.sid = $sid
                                        INNER JOIN company ON register_work.cid = company.cid";
    $objquery = mysqli_query($link, $sql1) or die(mysqli_error($sql1));
    $result = mysqli_fetch_array($objquery);

    $status = $row3['status'];
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
            <a class="navbar-brand" href="profile_student.php"> <i class="fa fa-home"></i> หน้าแรก </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li><?= $status ?> </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $fn_st ?>  <?= $ln_st ?> <i
                        class="fa fa-user"></i> <b class="caret"></b> </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="profile_student.php"><i class="glyphicon glyphicon-user"></i> Profiles</a></li>
                    <li><a href="editprofile_student.php"><i class="glyphicon glyphicon-edit"></i> เปลี่ยนรหัสผ่าน</a>
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

                        <li class="active"><a href="timeline.php"><i class="fa fa-search "></i>ค้นหาบริษัทฝึกงาน </a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>


<?php
    $sql_search = "SELECT DISTINCT c_name FROM post_company,company
    WHERE post_company.cid = company.cid";
    $query_search = mysqli_query($link,$sql_search);

    $sql_rank = "SELECT DISTINCT rank FROM post_company,company
    WHERE post_company.cid = company.cid";
    $query_rank = mysqli_query($link,$sql_rank);
?>
    <div id="page-wrapper">
        <br>
        <div class="row">
            <form action="timeline.php" method="get" enctype="multipart/form-data">
            <div class="col-md-3" style="margin-left: 25px">
                <label>ค้นหาบริษัท</label>
        <select name="c_name" class="form-control">
            <option>เลือกชื่อบริษัทที่ต้องการค้นหา</option>
            <?php while ($row_search = mysqli_fetch_array($query_search)) { ?>
            <option value="<?= $row_search['c_name'] ?>"><?= $row_search['c_name'] ?></option>
            <?php  } ?>
        </select>
                </div>
            <div class="col-md-3">
                <label>ตำแหน่งงาน</label>
        <select name="rank" class="form-control">
            <option>เลือกคำแหน่งที่ต้องการค้นหา</option>

            <?php while ($row_rank = mysqli_fetch_array($query_rank)) { ?>
                <option value="<?= $row_rank['rank'] ?>"><?= $row_rank['rank'] ?></option>
            <?php  } ?>

        </select>
                </div>
            <div class="col-md-3" style="margin-top: 25px">
                <button type="submit"  class="btn btn-primary">ค้นหา</button>
                </div>
            </form>
            </div>
        <br><br><br>

        <?php while ($row = mysqli_fetch_array($query)) { ?>
            <div class="col-md-12">
                <div class="panel panel-danger">
                    <div class="panel-heading right"><?= $row['c_name'] ?> :
                        <small><i class="text-muted"> <?= $row['dmt'] ?> </i></small>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-2" style="height: auto; margin-top: 2%; margin-left: 25px">
                            <i class="fa fa-briefcase fa-5x" aria-hidden="true"></i>
                        </div>
                        <div class="caption">
                            <h5 class="col-md-offset-2"><strong>รายละเอียดงาน : </strong><?= $row['detail'] ?></h5>
                            <h5 class="col-md-offset-2"><strong>ตำแหน่ง :</strong> <?= $row['rank'] ?></h5>
                            <h6 class="col-md-offset-2"><img src="../img/png4/placeholder-3.png" width="15px"
                                                             height="15px"><strong>สถานที่ทำงาน
                                    :</strong> <?= $row['map_work'] ?></h6>
                            <h6 class="col-md-offset-2"><img src="../img/png6/price-tag-4.png" width="15px"
                                                             height="15px"><strong>สวัสดิการ :</strong><?= $row['gold'] ?>
                            </h6>
                            <div class="pull-right">

                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#myModall<?= $row['idpost'] ?>">สมัครฝึกงาน
                                    </button>
                            </div>
                        </div>
                    </div>

            <div id="myModall<?= $row['idpost'] ?>" class="modal fade" role="dialog">
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
                                            <h1><?= $row['c_name'] ?></h1>
                                            <input type="hidden" name="idpost" value="<?= $row['idpost'] ?>">
                                            <input type="hidden" name="cid" value="<?= $row['cid'] ?>">
                                            <input type="hidden" name="sid" value="<?= $row3['sid'] ?>">
                                            <input type="hidden" name="rank" value="<?= $row['rank'] ?>">
                                            <input type="hidden" name="map_work" value="<?= $row['map_work'] ?>">
                                            <input type="hidden" name="status_student" value="0">
                                            <input type="hidden" name="dmt"
                                                   value="<?php echo thaidate('วันที่ j เดือน F  Y เวลา H:i:s'); ?> ">
                                            <input type="hidden" name="idpost" value="<?=$row['idpost']?>" />
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <label>รายละเอียดงาน</label>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['detail'] ?> </p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <label>สถานที่ปฏิบัติงาน</label>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['map_work'] ?></p>
                                                </div>
                                                <div class="col-md-5 col-md-offset-1">
                                                    <label>รายละเอียดงาน</label>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['detail'] ?> </p>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-5 col-md-offset-1">
                                                    <label>อัตรา</label>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['num_stu'] ?></p>
                                                </div>
                                                <div class="col-md-5 col-md-offset-1">
                                                    <label>สวัสดิการ</label> <br>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['gold'] ?></p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <label>ตำแหน่ง</label>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['rank'] ?></p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <label>คุณสมบัติผู้สมัคร</label>
                                                    <p><img src="../img/checked.png" width="15px"
                                                            height="15px"> <?= $row['property'] ?></p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <label>วิธีการสมัคร</label>
                                                    <p><img src="../img/checked.png" width="15px" height="15px"> กดยืนยันการสมัคร และ รอการตอบรับจากบริษัท </p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <label>ติดต่อ</label>
                                                    <p><img src="../img/checked.png" width="15px" height="15px"> <?= $row['c_tela'] ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <br><br><br>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-5">
                                                    <input type="submit" name="submit" value="ยืนยันการสมัคร"
                                                           class="btn btn-primary ">
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
            </div>
        </div>
        <?php } ?>

<?php
        $sql2 = "SELECT * FROM post_company
                INNER JOIN company
                 ON post_company.cid=company.cid";
        $query2 = mysqli_query($link, $sql2);
        $total_record = mysqli_num_rows($query2);
        $total_page = ceil($total_record / $perpage);
        ?>
        <div class="col-md-offset-9">
            <ul class="pagination col-md-">
                <li>
                    <a href="timeline.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                    <li><a href="timeline.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <li>
                    <a href="timeline.php?page=<?php echo $total_page; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
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




