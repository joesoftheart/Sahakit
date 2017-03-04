<?php session_start();
include '../php/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/html">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>สหกิจศึกษา</title>

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <?php
    $fname = $_SESSION['fname'];
    $company_name = $_POST['company_name'];
    $cid = $_POST['cid'];
    $property = $_POST['property'];
    $rank = $_POST['rank'];

   $sql = "SELECT * FROM student WHERE fname = '$fname'";
    $query = mysqli_query($link,$sql) ;
    $row = mysqli_fetch_array($query);


?>
</head>
<body>
<div class="container-fluid " style="margin-top: 5%" >
        <div class="col-md-6 col-md-offset-3 well ">
            <div class="row">
                <h1 align="center"><?= $company_name ?></h1>
            <form action="../php/getform_work.php"  method="post" enctype="multipart/form-data">
                <input type="hidden" name="cid" value="<?= $cid ?>">
                <input type="hidden" name="sid" value="<?= $row['sid'] ?>">
                <div class="col-md-12">
                    <label>รหัสนักศึกษา</label>
                    <input type="text" name="idst"  value="<?= $row['idst'] ?>"  class="form-control" >
                </div>
                <div class="col-md-12" >
                    <label>ชื่อ</label>
                    <input type="text" name="fname"  value="<?= $row['fname'] ?>" class="form-control">
                </div>
                <div class="col-md-12" >
                    <label>นามสกุล</label>
                    <input type="text" name="lname" value="<?= $row['lname'] ?>" class="form-control">
                </div>
                <div class="col-md-12" >
                    <label>เบอร์โทรติดต่อ</label>
                    <input type="text" name="telaphone"   minlength="10"  value="<?= $row['telaphone'] ?>"  class="form-control" >
                </div>
                <div  class="col-md-12">
                    <label>อีเมลผู้ใช้</label>
                    <input   type="email"  name="email"  value="<?= $row['email'] ?>" class="form-control">
                </div>
                <div class="col-md-12">
                    <label>เพศ</label>
                    <input type="text" name="gender" value="<?= $row['gender'] ?>" class="form-control">
                </div>
                <div class="col-md-12" >
                    <label>คุณสมบัติผู้สมัคร</label>
                    <input type="text" name="property" required="required" class="form-control"  >
                </div>
                    <div class="col-md-12" >
                        <label>ตำแหน่งที่จะสมัคร</label>
                        <input type="text" name="rank" value="<?= $rank ?>" class="form-control"  >
                    </div>
                <div class="col-md-12 col-md-offset-4" style="margin-top: 5%">
                    <button type="submit" class="btn btn-lg btn-primary" title="สมัครงาน"> ส่งเรซูเม่ถึงบริษัท</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>