
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
                <li><a href="register.php"><i class="fa fa-user-plus"></i> สมัครสมาชิก/ลงทะเบียนนักศึกษา</a></li>
                <li><a href="register_company.php"><i class="fa fa-user-plus"></i> ลงทะเบียนบริษัทใหม่ </a> </li>
                <li><a href="login.html"><i class="fa fa-sign-in"> </i> เข้าสู่ระบบ</a></li>
            <?php } else { ?>
                <li><?= $status ?> </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-user"></i> <b class="caret"></b> </a>
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
                            <li><a href="editprofile_teacher.php"><i class="glyphicon glyphicon-edit"></i> แก้ไขโปรไฟล์</a></li>
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
    </div>