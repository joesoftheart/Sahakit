<?php include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sahakit</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



</head>
<body>
<?php include 'menu_admin.php'?>

    <div class="container-fluid">
        <div class="page-header">
            <ol class="breadcrumb">
                <li><a href="profile_admin.php">Home</a></li>
                <li class="active">อัพเดทข่าวสาร</a></li>
            </ol>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <form action="../php/newsupload.php" method="post" enctype="multipart/form-data">
                <div class="panel panel-info">
                    <div class="panel panel-heading">
                        อัพเดทข่าวสาร
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2" style="margin-top: 1%">
                                <label> หัวเรื่องข่าว :</label>
                                <input type="text" name="news_story" class="form-control" required="required" maxlength="45">
                            </div>

                        <br><br>
                        <div class="col-md-8 col-md-offset-2" style="margin-top: 1%">
                            <label> ข้อความเกริ่นนำ : </label>
                            <textarea name="fntroductory_message" class="form-control" required="required" rows="2"></textarea>
                            </div>

                            <br><br>
                        <div class="col-md-8 col-md-offset-2" style="margin-top: 1%">
                            <label> เนื้อเรื่องข่าว :</label> <br>
                            <textarea name="featuring_news" class="form-control " required="required" cols="45"
                                      rows="5"> </textarea>
                        </div>
                        <input type="hidden" name="dmt" value="<?php echo thaidate('j F Y เวลา H:i:s'); ?> ">



                        <div class="col-md-6 col-md-offset-2" style="margin-top: 3%">
                            <button type="submit" class="btn  btn-info pull-right "> โพส </button>
                            <button type="reset" class="btn  btn-default pull-right "> รีเซต</button>

                        </div>
                    </div>
                </div>
            </form>
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
</html>