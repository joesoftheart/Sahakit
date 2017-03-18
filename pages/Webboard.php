<?php session_start();
include '../php/config.php';
?>
<?php
$status = null;
if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
}

?>
<?php if($status == "") { ?>
    <script>location.replace("login.html");</script>

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
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="index.php">ระเบียบและข้อบังคับ</a></li>
                    <li><a href="company_join.php">บริษัทที่เข้าร่วมสหกิจ</a></li>
                    <li><a href="Webboard.php">ถามและตอบ FAQ</a></li>
                    <li><a href="dowload.php">ดาวน์โหลด </a></li>
                </ul>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <?php
                if (!isset($_SESSION['login'])) { ?>
                    <li><a href="register.php"><i class="fa fa-user-plus"></i> ลงทะเบียนบริษัทใหม่</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-in"> </i> เข้าสู่ระบบ</a></li>
                <?php } else { ?>
                    <li><?= $status ?> </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <?php
                            if ($status == "นักศึกษา") { ?>
                                <li><a href="profile_student.php"><i class="glyphicon glyphicon-user"></i> โปรไฟล์</a></li>
                                <li><a href="editprofile_student.php"><i class="glyphicon glyphicon-edit"></i> เปลี่ยนรหัสผ่าน</a></li>
                                <?php
                            } else {
                            }
                            if ($status == "อาจารย์") { ?>
                                <li><a href="profile_teacher.php"><i class="glyphicon glyphicon-user"></i> โปรไฟล์</a></li>
                                <li><a href="editprofile_teacher.php"><i class="glyphicon glyphicon-edit"></i> เปลี่ยนรหัสผ่าน</a></li>
                                <?php
                            } else {
                            }
                            if ($status == "สถานประกอบการ") { ?>
                                <li><a href="profile_company.php"><i class="glyphicon glyphicon-user"></i> โปรไฟล์</a></li>
                                <li><a href="editprofile_company.php"><i class="glyphicon glyphicon-edit"></i> เปลี่ยนรหัสผ่าน</a></li>
                                <?php
                            } else {
                            }
                            if ($status == "BOSS") { ?>
                                <li><a href="profile_admin.php">โปรไฟล์</a></li>
                                <?php
                            } else {
                            } ?>
                            <li><a href="../php/logout.php"><i class="glyphicon glyphicon-off"></i> ลงชื่อออก</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="#">เกี่ยวกับสหกิจศึกษา <span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <li><a href="whit_sahakit.php">อะไรคือสหกิจศึกษา</a></li>
                                <li><a href="whit_company.php">เกี่ยวกับสถานประกอบการ</a></li>
                                <li><a href="whit_student.php">เกี่ยวกับนักศึกษา</a></li>
                                <li><a href="whit_techer.php">เกี่ยวกับอาจารย์</a></li>
                                <li><a href="whit_vision.php">วิสัยทัศน์และพันธกิจ</a></li>
                            </ul>
                        </li>

                        <li><a href="#">บุคลากร <span class="fa arrow"></span> </a>
                            <ul class="nav nav-second-level">
                                <li><a href="whit_vision.php">กรรมการบริหาร</a></li>
                                <li><a href="whit_vision.php">อาจารย์ประสานงานประจำสาขาวิชา</a></li>
                                <li><a href="whit_vision.php">เจ้าหน้าที่</a></li>
                            </ul>
                        </li>
                        <?php if ($status != "นักศึกษา") { ?>
                        <li>
                            <a href="./timeline.php">หางาน / ฝึกงาน </a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="#">นักศึกษา <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="manual_student.php">คู่มือสหกิจศึกษา</a></li>
                                <li><a href="#">แนวปฏิบัติสหกิจศึกษา <i class="fa arrow"></i> </a>
                                    <ul class="nav nav-third-level">
                                        <li><a href="property_stu.php">คุณสมบัตินักศึกษา</a> </li>
                                        <li><a href="visit_stu.php">ขั้นตอนการนิเทศงาน</a> </li>
                                        <li><a href="seminar.php">การสัมมนาวิชาการ</a> </li>
                                        <li><a href="evaluation_ca.php">การประเมินผล</a> </li>
                                    </ul>
                                </li>
                                <li><a href="tecnic_student.php">เทคนิคการเลือกสถานประกอบการ</a></li>
                            </ul>
                        </li>
                        <li><a href="#">คณาอาจารย์ <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <li><a href="visit_tea.php">ขั้นตอนการนิเทศงาน</a></li>
                                <li><a href="whit_vision.php">แนวปฏิบัติสหกิจศึกษา</a></li>
                                <li><a href="evaluation_tea.php">ผลการประเมินนักศึกษา</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">สถานประกอบการ <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="receive_stu.php">ขั้นตอนการรับนักศึกษา</a></li>
                                <li><a href="manual_company.php">คู่มือสถานประกอบการ</a></li>
                                <li><a href="visit_comp.php">วัตถุประสงค์ของการนิเทศงาน</a></li>
                                <li><a href="evaluation_comp.php">การประเมินผลนักศึกษา</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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


