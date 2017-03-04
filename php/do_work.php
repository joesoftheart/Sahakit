<?php
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sahakit System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog-post.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <?php
   $sql = "SELECT * FROM post_company
                INNER JOIN company
                 ON post_company.id=company.id";
    $query = mysqli_query($link,$sql) ;
    $row = mysqli_fetch_array($query)

    ?>


</head>
<body >
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="gteform_workpost.php" method="post" enctype="multipart/form-data">
                <div class=" text-center">
                    <h1>ประกาศรับสมัครงาน</h1>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <label>ตำแหน่ง</label>
                            <p><?= $row['rank'] ?></p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <label>จำนวนคน</label>
                           <p> <?= $row['num_stu'] ?> </p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <label>รายละเอียดงาน</label>
                            <p>  <?= $row['detail']?> </p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <label>คุณสมบัติ</label>
                            <p> <?= $row['property'] ?></p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <label>สถานที่ปฏิบัติงาน</label>
                            <p> <?= $row['map_work'] ?></p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <label>สวัสดิการ</label> <br>
                            <p> <?= $row['monney']?></p>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-5">
                            <input type="submit" name="submit" value="บันทึก" class="btn btn-info  btn-lg ">
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>