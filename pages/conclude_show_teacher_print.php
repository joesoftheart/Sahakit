<?php session_start();
include '../php/config.php';
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="shortcut icon" href="../img/favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>สหกิจศึกษา</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../pages/css_teacher.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

    <script>
        $(document).ready(function(){

            // hide #back-top first
            $("#back-top").hide();

            // fade in #back-top
            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 100) {
                        $('#back-top').fadeIn();
                    } else {
                        $('#back-top').fadeOut();
                    }
                });

                // scroll body to 0px on click
                $('#back-top a').click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
            });

        });
    </script>




    <?php
    $status = null;

    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        $fn_te = $_SESSION['fn_te'];
        $ln_te = $_SESSION['ln_te'];
        $id = $_REQUEST['id'];



        $sql1 = "SELECT * FROM register_work,company,student
                          WHERE register_work.cid = company.cid AND register_work.sid = student.sid
                          AND student.sid = $id";
        $objquery = mysqli_query($link, $sql1) or die(mysqli_error($sql1));
        $result = mysqli_fetch_array($objquery);


    }
    ?>

</head>
<body id="top">
<?php include 'menu_teacher.php'?>
<div id="page-wrapper">
    <div id="crop">
        <div class="book">
            <?PHP
            $sql_list = "SELECT * FROM conclude WHERE id= ".$_GET['id']." ";
            $sql_listquery = mysqli_query($link,$sql_list)or die(mysqli_errror($link));
            while($row=mysqli_fetch_array($sql_listquery)) {
            $date_list_start = $row["date_start_now"];
            $date_list_end = $row["date_start_end"];
            $hour_amount = "";

            //echo $row["date"];
            $sql_list_not = "SELECT * FROM execute WHERE date_now BETWEEN '$date_list_start' AND '$date_list_end'   ";
            //echo $sql_list_not;
            $sql_list_not_query = mysqli_query($link,$sql_list_not)or die(mysqli_errror($link));
            for($i=1; $row_note=mysqli_fetch_array($sql_list_not_query);$i++ ) {
                $date_note = explode("-",$row_note["date"]);
                $hour_amount += $row_note["hour_amount"];
                ?>
                <div class="page">
                    <div class="subpage">
                        <p class="text-right" style="margin-top: -6%">( <?=  $i ?> )</p>

                        สัปดาห์ที่ <input type="text" data-onload="set_size($(this),70)" value="<?PHP echo $row_note["week"] ?>" style="margin-top: -5px;" readonly>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <font size="4"><b>บันทึกการปฎิบัติประจำวัน</b></font> <br>
                        <div style="border: solid 1px">
                            วันที่<input type="text" data-onload="set_size($(this),25)" readonly value="<?PHP echo $date_note[0]  ?>" style="margin-top: 5px;">/
                            <input type="text" data-onload="set_size($(this),70)" readonly value="<?PHP echo $date_note[1]  ?>" style="margin-top: 5px;">/
                            <input type="text" data-onload="set_size($(this),35)" readonly value="<?PHP echo $date_note[2]  ?>" style="margin-top: 5px;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เวลาเริ่มปฎิบัติงาน
                            <input type="text" data-onload="set_size($(this),35)" readonly value="<?PHP echo $row_note["start_minute"] ?>:<?PHP echo $row_note["start_secound"] ?>" style="margin-top: 5px;">น. เวลาเลิกปฎิบัติงาน
                            <input type="text" data-onload="set_size($(this),35)" readonly value="<?PHP echo $row_note["end_minute"] ?>:<?PHP echo $row_note["end_secound"] ?>" style="margin-top: 5px;">น.  <br>
                            &nbsp;&nbsp;&nbsp; <b>ลักษณะงานที่ปฎิบัติ</b>
                            <div style="border: solid 1px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?PHP echo $row_note["job_work"] ?><br><br><br><br><br><br>
                            </div>
                            &nbsp;&nbsp;&nbsp; <b>ปัญหาที่พบ</b>
                            <div style="border: solid 1px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?PHP echo $row_note["problem"] ?><br><br><br><br><br><br>
                            </div>
                            &nbsp;&nbsp;&nbsp; <b>แนวทางการแก้ไขปัญหา</b>
                            <div style="border: solid 1px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?PHP echo $row_note["work_fix"] ?><br><br><br><br><br><br>
                            </div>
                            &nbsp;&nbsp;&nbsp; <b>หมายเหต</b>
                            <div style="border: solid 1px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?PHP echo $row_note["note"] ?><br><br><br><br><br><br>
                            </div>

                            &nbsp;&nbsp;&nbsp; <b>บันทึกเพิ่มเติม</b>
                            <div style="border: solid 1px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?PHP echo $row_note["save_note"] ?><br><br><br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            <?PHP  }
            ?>

            <div class="page">
                <div class="subpage">
                    <div align="center"><font size="5"><b>สรุปผลบันทึกการปฎิบัติงานประจำวัน &nbsp;&nbsp;&nbsp;ในรอบสัปดาห์ที่
                                <input type="text" data-onload="set_size($(this),45)" readonly value="<?PHP echo $row["week"] ?>"
                                       style="margin-top: 5px;"></b></font><br>
                        ระหว่างวันที่
                        <input type="text" data-onload="set_size($(this),150)" readonly value="<?PHP echo $row["date_start"] ?>" style="margin-top: 5px;"> ถึงวันที่ <input type="text" data-onload="set_size($(this),150)" readonly value="<?PHP echo $row["date_end"] ?>" style="margin-top: 5px;">

                    </div>
                    <div style="border: solid 1px">
                        &nbsp;&nbsp;&nbsp; <b>ลักษณะงานที่ปฎิบัติ</b>
                        <div style="border: solid 1px">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?PHP echo $row["job_work"] ?><br><br><br>
                        </div>
                        &nbsp;&nbsp;&nbsp; <b>ปัญหาที่พบ</b>
                        <div style="border: solid 1px">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?PHP echo $row["problem"] ?><br><br><br>
                        </div>
                        &nbsp;&nbsp;&nbsp; <b>แนวทางการแก้ไขปัญหา</b>
                        <div style="border: solid 1px">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?PHP echo $row["work_fix"] ?><br><br><br>
                        </div>
                        &nbsp;&nbsp;&nbsp; <b>หมายเหต</b>
                        <div style="border: solid 1px">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?PHP echo $row["note"] ?><br><br><br>
                        </div>

                    </div>
                    <br>

                        <font size="5"><b>รวมจำนวนชั่วโมงที่ปฏิบัติงานสหกิจศึกษาทั้งหมดในสัปดาห์นี้ &nbsp;
                                เท่ากับ <input type="text" data-onload="set_size($(this),30)"
                                               value="<?PHP echo $hour_amount; ?>" style="margin-top: 5px;" readonly> ชั่วโมง</b></font>

                    <form action="../php/update_conclude_company.php" method="post" enctype="multipart/form-data">
                        <div style="border: solid 1px">
                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                            <font size="4"><u><b>ข้อเสนอแนะจากพนักงานที่ปรึกษา /
                                        ผู้ควบคุมการปฏิบัติงานสหกิจศึกษา</b></u></font>
                            <div style="border: solid 1px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $row['offer'] ?><br><br><br> </div>
                        </div><br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ลงชื่อ <input type="text" name="name_leder" value="<?= $row['name_leder'] ?>" data-onload="set_size($(this),150)"
                                      style="margin-top: 5px;" readonly="readonly""> พนักงานที่ปรึกษา / ผู้ควบคุมการปฏิบัติงาน <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        (<input type="text" value="<?= $row['name_leder'] ?>" data-onload="set_size($(this),150)"
                                style="margin-top: 5px;" readonly="readonly"">)<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        ตำแหน่ง <input type="text" name="rank_leder" value="<?= $row['rank_leder'] ?>" data-onload="set_size($(this),175)"
                                       style="margin-top: 5px;" readonly="readonly">



                        <br><br><br>
                        <div class="btn" align="center" style="margin-bottom: 20px;">
                            <span class="fa fa-print" onclick="window.print();" style="font-size: 50px;cursor: pointer;margin-left: 220px; margin-right: 200px;" ></span>


                            <a href="list_conclude_teacher.php?id=<?= $row['uid'] ?>" class="btn  btn-primary" > ย้อนกลับ </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <?PHP
        }
        ?>


    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

    <script>
        function set_size(input, width) {
            input.css("width", width + "px");
            //alert(width);
        }

        $('[data-onload]').each(function () {
            eval($(this).data('onload'));
        });
    </script>
</body>
</html>