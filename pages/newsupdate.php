<?php include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');
?>
<html>
<head>
    <meta charset="UTF-8" http-equiv="x-ua-compatible">
    <title>sahakit</title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>


<font face="TH Sarabun New" size="5">

        <div class="col-lg-6 col-md-offset-3 " style="margin-top: 20px">
            <form action="../php/newsupload.php" method="post" enctype="multipart/form-data">
                <div class="panel panel-info">
                    <div class="panel panel-heading">
                        โพสข่าวสารต่างๆ
                        </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <label>หัวเรื่องข่าว</label>
                                <input type="text" name="headnews" class="form-control" required="required">
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <label>เนื้อเรื่องข่าว</label>
                                <textarea name="substance" class="form-control" required="required"  rows="5"> </textarea>
                            </div>
                                <input type="hidden" name="dmt" value="<?php echo thaidate('j F Y เวลา H:i:s'); ?> ">
                                </div>
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <button type="submit"  class="btn btn-outline btn-info pull-right "><font
                                            size="4"><strong>ประกาศ</strong> </font></button>
                                </div>
                            </div>
                        </div>
                        </div>
            </form>
        </div>

</font>

<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/metisMenu/metisMenu.min.js"></script>
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>