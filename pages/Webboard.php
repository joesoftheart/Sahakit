<?php session_start();
$_SESSION['mylog']='login';
include '../php/config.php';
?>
<?php
$status = null;
if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
}

?>
<?php if($status == "") { ?>
    <script>location.replace("login.php");</script>

<?php } else{ ?>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <!DOCTYPE html>
    <html lang="en">

    <head>
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
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>

    <body>

    <?php include 'menu_index.php'?>

        <div id="page-wrapper">
            <div class="row">
        <table width="100%" style="margin: 20px" >
            <tr>
                <td><i class="fa fa-question-circle-o fa-5x" aria-hidden="true"></i>
                    <p><span>สอบถามปัญหา ถาม-ตอบข้อสงสัย แนะนำ ประกาศเกี่ยวกับสหกิจศึกษา</span></p>
                    <p><span>Q&A Discussion</span></p>
                    <p><span>ถาม-ตอบ ข้อสงสัยเกี่ยวกับการใช้งาน และปัญหาต่างๆ</span></p>
                </td>
                <td>
                    <p><i class="fa fa-commenting fa-2x" aria-hidden="true"></i> หัวข้อเรื่องต่างๆ ของฟอรั่ม Q&A Discussion จะมีดังต่อไปนี้</p>
                    <p><i class="fa fa-comments-o" aria-hidden="true"></i> คำถามเกี่ยวกับวิธีการใช้งาน ระบบสหกิจศึกษา (ทั้งการสมัครเข้าศึกษา, การจัดการข้อมูลอื่นๆ)</p>
                    <p><i class="fa fa-comments-o" aria-hidden="true"></i> คำถามเกี่ยวกับปัญหา ข้อผิดพลาด ของระบบสหกิจศึกษา</p>
                    <p><i class="fa fa-comments-o" aria-hidden="true"></i> คำถามเกี่ยวกับการใช้งานเว็บไซต์ สหกิจศึกษา (เช่น บริการเสริม, เว็บบอร์ด เป็นต้น)</p>
                    <p><i class="fa fa-comments-o" aria-hidden="true"></i> ชี้แจงในเรื่องต่างๆจากทีมงาน ระบบสหกิจ</p>
                    <p><i class="fa fa-comments-o" aria-hidden="true"></i> ทางผู้ดูแลระบบสหกิจ ขอสงวนสิทธิ์ในการย้าย หรือ ลบกระทู้ที่ไม่เกี่ยวข้องกับฟอรั่มนี้ โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</p>

                </td>
            </tr>
        </table>
            <hr>
        </div>
            <a href="NewQuestion.php">ตั้งกระทู้ใหม่</a>

            <?php
            $strSQL = "SELECT * FROM webboard ORDER BY View DESC ";
            $objQuery = mysqli_query($link, $strSQL) or die ("Error Query [".$strSQL."]");
            $Num_Rows = mysqli_num_rows($objQuery);


            $objQuery  = mysqli_query($link,$strSQL);
            ?>
            <table class="table" >
                <tr>
                    <th width="458"> <div align="center">คำถาม</div></th>
                    <th width="90"> <div align="center">ชื่อ</div></th>
                    <th width="130"> <div align="center">ถูกสร้างเมื่อ</div></th>
                    <th width="45"> <div align="center">View</div></th>
                    <th width="47"> <div align="center">Reply</div></th>
                </tr>
                <?php
                while($objResult = mysqli_fetch_array($objQuery))
                {
                    ?>
                    <tr>

                        <td><i class="fa fa-thumb-tack" a></i> <a href="ViewWebboard.php?QuestionID=<?php echo $objResult["QuestionID"];?>"><?php echo $objResult["Question"];?></a></td>
                        <td><?php echo $objResult["Name"];?></td>
                        <td><div align="center"><?php echo $objResult["CreateDate"];?></div></td>
                        <td align="right"><?php echo $objResult["View"];?></td>
                        <td align="right"><?php echo $objResult["Reply"];?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>

            <br>




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


<?php } ?>


