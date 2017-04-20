
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="profile_teacher.php"> <i class="fa fa-home"></i> หน้าแรก </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li><?= $status ?> </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $fn_te ?>  <?= $ln_te ?> <i
                        class="fa fa-user"></i> <b class="caret"></b> </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="../pages/profile_teacher.php"><i class="glyphicon glyphicon-user"></i>โปรไฟล์</a></li>
                    <li><a href="../pages/editprofile_teacher.php"><i class="glyphicon glyphicon-edit"></i> แก้ไขโปรไฟล์</a></li>
                    <li class="divider"></li>
                    <li><a href="../php/logout.php"><i class="glyphicon glyphicon-off"></i> ลงชื่อออก</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li><a href="#"><img src="../img/png/user-6.png" width="25px" height="25px"> นักศึกษา <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="data_student.php">นักศึกษาในการดูแล</a></li>
                        <li><a href="all_student.php">นักศึกษาสหกิจทั้งหมด</a></li>
                    </ul>
                    </li>
                    <li><a href="do_join_work.php"><img src="../img/png/file.png" width="25px" height="25px"> การสมัครงานนักศึกษา</a> </li>
                </ul>
            </div>
    </nav>
</div>

