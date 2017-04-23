
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
                    <?php if ($tid == $tid && $result['cid'] == null) { ?>
                        <li class="active"><a href="timeline.php"><i class="fa fa-search "></i>ค้นหาบริษัทฝึกงาน </a></li>
                    <?php }else{
                        //
                    } if ($result['status_work'] == 3) { ?>
                        <li><a href="#"> ฝึกงาน <i class="fa arrow"></i></a>
                            <ul class="nav nav-second-level">
                                <li><a href="add_note_form.php">สมุดบันทึกประจำวันสำหรับนักศึกษา</a></li>
                                <li><a href="add_conclude_form.php">สมุดบันทึกการฝึกงาน</a></li>
                                <li><a href="list_note.php">ดูประวัติสมุดบันทึกประจำวัน</a> </li>
                                <li><a href="list_conclude.php">ดูสมุดบันทึกการฝึกงาน</a> </li>
                            </ul>
                        </li>
                    <?php }else{
                        //
                    } if ($result['status_work'] == 4){ ?>
                            <li><a href="show_grade_student.php"><i class="fa fa-list-ol  "></i> เกรดฝึกงาน / คะแนน</a></li>
                      <?php  }else{
                          //
                    }    ?>

                </ul>
            </div>
        </div>
    </nav>
</div>
