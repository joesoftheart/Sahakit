<?php session_start();
include '../php/config.php';
date_default_timezone_set('Asia/Bangkok');
include_once('../vendor/Thaidate/Thaidate.php');
include_once('../vendor/Thaidate/thaidate-functions.php');
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
    <link href="../pages/css_evaluation.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"> </script>
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




    <script language="javascript">
        function IsNumeric(sText,obj)
        {
            var ValidChars = "12345.";
            var IsNumber=true;
            var Char;
            for (i = 0; i < sText.length && IsNumber == true; i++)
            {
                Char = sText.charAt(i);
                if (ValidChars.indexOf(Char) == -1)
                {
                    IsNumber = false;
                }
            }
            if(IsNumber==false){

                obj.value=sText.substr(0,sText.length-1);
            }
        }
    </script>






    <?php
    $status = null;


    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        $c_name = $_SESSION['c_name'];
        $cid = $_SESSION['cid'];
        $sid = $_REQUEST['sid'];


        $sql3 = "SELECT * FROM company WHERE cid= $cid AND c_status_join = 1";
        $qquery = mysqli_query($link,$sql3);
        $result = mysqli_fetch_array($qquery);


        $sql = "SELECT * FROM register_work , company , student 
                    WHERE register_work.cid = company.cid 
                    AND register_work.sid = student.sid 
                    AND register_work.sid = $sid AND  register_work.cid = $cid";
        $query_work = mysqli_query($link, $sql);
        $row_work = mysqli_fetch_array($query_work);



    }
    $sql_from = "SELECT * FROM form_evaluator_company WHERE id = 001";
    $query_from = mysqli_query($link,$sql_from);
    $result_from = mysqli_fetch_array($query_from);
    ?>
</head>
<body id="top">
<?php include 'menu_company.php'?>
<div id="page-wrapper">
    <div id="crop">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                    <br>

                    <div align="center">
                        <div style="margin-top: 5px"><font
                                size="5"><u><b>แบบประเมินผลการปฏิบัติงานสหกิจศึกษา</b></u></font></div>
                        <br>
                    </div>
                    <font size="4"><b>(ผู้ให้ข้อมูล : <u>สถานประกอบการ</u>)</b></font> <br> <br>
                    <font size="3"><b><u>คำชี้แจง</u></b></font> <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1.
                    ผู้ให้ข้อมูลในแบบประเมินนี้ต้องเป็นพนักงานที่ปรึกษา (Job supervisor)
                    ของนักศึกษาสหกิจศึกษาหรือบุคคลที่ได้รับมอบหมายให้ทำหน้าที่แทน <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2. เมื่อประเมินผลเรียบร้อยแล้ว
                    โปรดปิดผนึกและลงลายมือชื่อกำกับเอกสารสำคัญฉบับนี้ด้วย และให้นักศึกษานำส่งที่งานสหกิจศึกษา <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3. โปรดให้คะแนนในช่อง <img src="../img/table.PNG"
                                                                                          height="20px">
                    ในแต่ละหัวข้อการประเมิน (5 = มากที่สุด 4 = มาก 3 = ปานกลาง
                    2 = น้อย 1 = น้อยที่สุด) หากไม่มีข้อมูลให้ใส่เครื่องหมาย - และโปรดให้ความคิดเห็นเพิ่มเติม (ถ้ามี)
                    <br><br> <br>
                    <form action="../php/update_evaluation_for_company.php" method="post" enctype="multipart/form-data">
                        <font size="4"> <b>ข้อมูลทั่วไป / Work Term Information</b> </font> <br>
                        <input type="hidden" name="sid" value="<?= $sid ?>">
                        <input type="hidden" name="cid" value="<?= $cid ?>">
                        ชื่อ - สกุล (นักศึกษา) <input type="text" name="fn_st" data-onload="set_size($(this),100)"
                                                      value="<?= $row_work['fn_st'] ?>" readonly="readonly"
                                                      style="margin-top: 5px;"><input type="text" name="ln_st"
                                                                                      data-onload="set_size($(this),100)"
                                                                                      value="<?= $row_work['ln_st'] ?>"
                                                                                      readonly="readonly"
                                                                                      style="margin-top: 5px;">
                        รหัสนักศึกษา <input type="text" name="number_id" value="<?= $row_work['number_id'] ?>"
                                            readonly="readonly" data-onload="set_size($(this),200)"
                                            style="margin-top: 5px;">
                        <br>
                        สาขาวิชา <input type="text" value="วิทยาการคอมพิวเตอร์" data-onload="set_size($(this),270)"
                                        readonly="readonly" style="margin-top: 5px;"> คณะ
                        <input type="text" value="วิทยาศาสตร์และเทคโนโลยี" data-onload="set_size($(this),200)"
                               readonly="readonly" style="margin-top: 5px;"> <br>
                        ชื่อสถานประกอบการ <input type="text" name="c_name" value="<?= $row_work['c_name'] ?>"
                                                 readonly="readonly" data-onload="set_size($(this),400)"
                                                 style="margin-top: 5px;"> <br>
                        ชื่อ - นามสกุลผู้ประเมิน <input type="text" name="name_leader" required="required"
                                                        data-onload="set_size($(this),200)"
                                                        style="margin-top: 5px;">
                        ตำแหน่ง <input type="text" name="rank_leader" required="required"
                                       data-onload="set_size($(this),210)"
                                       style="margin-top: 5px;">
                        <br><br>


                        <font size="4"><b> <?= $result_from['h_topic1'] ?> </b></font>
                        <table border="1" width="100%">
                            <thead>
                            <tr>
                                <th colspan="2" class="text-center">หัวข้อประเมิน / Items</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?= $result_from['topic_1'] ?>
                                </td>
                                <td class="text-center" ><textarea name="no1" data-onload="set_size($(this),100)"
                                                                  style="margin-top: 5px;"
                                                                  rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                            </tr>
                            <tr>
                                <td><?= $result_from['topic_2'] ?>
                                </td>
                                <td class="text-center"><textarea name="no2" data-onload="set_size($(this),100)"
                                                                  style="margin-top: 5px;"
                                                                  rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                            </tr>
                            </tbody>
                        </table>

                    <font size="4"><b><?= $result_from['h_topic2'] ?> </b></font>
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">หัวข้อประเมิน / Items</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td ><?= $result_from['topic_3'] ?>
                            </td>
                            <td class="text-center"><textarea name="no3" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_4'] ?>
                            </td>
                            <td class="text-center"><textarea name="no4" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_5'] ?>
                            </td>
                            <td class="text-center"><textarea name="no5" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_6'] ?>

                            </td>
                            <td class="text-center"><textarea name="no6" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_7'] ?>

                            </td>
                            <td class="text-center"><textarea name="no7" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required"  minlength="1" maxlength="1" id="mynumber"
                                                              onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_8'] ?>

                            </td>
                            <td class="text-center"><textarea name="no8" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_9'] ?>

                            </td>
                            <td class="text-center"><textarea name="no9" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_10'] ?>
                            </td>
                            <td class="text-center"><textarea name="no10" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <font size="4"><b><?= $result_from['h_topic3'] ?> </b></font>
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">หัวข้อประเมิน / Items</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= $result_from['topic_11'] ?>
                            </td>
                            <td class="text-center" ><textarea name="no11" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>

                        <tr>
                            <td><?= $result_from['topic_12'] ?>
                            </td>
                            <td class="text-center"><textarea name="no12" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_13'] ?>
                            </td>
                            <td class="text-center"><textarea name="no13" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_14'] ?>
                            </td>
                            <td class="text-center"><textarea name="no14" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <font size="4"><b><?= $result_from['h_topic4'] ?></b></font>
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                            <th colspan="2" class="text-center">หัวข้อประเมิน / Items</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= $result_from['topic_15'] ?>
                            </td>
                            <td class="text-center" width="190px"><textarea name="no15" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_16'] ?>
                            </td>
                            <td class="text-center"><textarea name="no16" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>

                        <tr>
                            <td><?= $result_from['topic_17'] ?>
                            </td>
                            <td class="text-center"><textarea name="no17" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_18'] ?>
                            </td>
                            <td class="text-center"><textarea name="no18" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_19'] ?>
                            </td>
                            <td class="text-center"><textarea name="no19" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        <tr>
                            <td><?= $result_from['topic_20'] ?>
                            </td>
                            <td class="text-center"><textarea name="no20" data-onload="set_size($(this),100)"
                                                              style="margin-top: 5px;"
                                                              rows="1" required="required" minlength="1" maxlength="1" id="mynumber"
                                                                  onKeyUp="IsNumeric(this.value,this)"></textarea></td>
                        </tr>
                        </tbody>
                    </table>

                    <b>21.โปรดให้ข้อคิดเห็นที่เป็นประโยชน์แก่นักศึกษา / Please give comments on the student</b>
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                            <th width="25%" height="10%" class="text-center">จุดเด่นของนักศึกษา / Strengh</th>
                            <th width="25%" height=" 10%" class="text-center">ข้อควรปรับปรุงของนักศึกษา / Needed
                                Improvement
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">  <textarea name="no21_1" data-onload="set_size($(this),350)"
                                                                style="margin-top: 5px;"
                                                                rows="3" required="required" ></textarea></td>
                            <td class="text-center"> <textarea name="no21_2" data-onload="set_size($(this),350)"
                                                               style="margin-top: 5px;"
                                                               rows="3" required="required" ></textarea></td>
                        </tr>

                        </tbody>
                    </table>
                    <br>
                    <b>
                        หากนักศึกษาผู้นี้สำเร็จการศึกษาแล้ว ท่านจะรับเข้าทำงานในสถานประกอบการนี้หรือไม่
                        (หากมีโอกาสเลือก)
                        Once this student graduates, will you be interested to offer him/her a job?</b> <br>
                    (&nbsp; <input type="radio" name="get_work" value="yes"> &nbsp;) รับ / yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    (&nbsp; <input type="radio" name="get_work" value="notsure"> &nbsp;)ไม่แน่ใจ / Not sure &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    (&nbsp;<input type="radio" name="get_work" value="no"> &nbsp;)ไม่รับ / No

                    <br><br>
                    <b> 22. ข้อคิดเห็นเพิ่มเติม / Other comments</b> <br>
                    <textarea name="comment" data-onload="set_size($(this),600)" style="margin-top: 5px;"
                              rows="5"></textarea>
                    <br><br><br>
                   <p style="margin-left: 32%">
                        ลงชื่อ / Evaluator ‘s Signature <input type="text" name="evaluator"
                                                               data-onload="set_size($(this),150)"
                                                               style="margin-top: 5px;" required="required" >
                        พนักงานที่ปรึกษา <br>
                   </p>
                        <p style="margin-left: 60%">
                    (<input type="text" data-onload="set_size($(this),150)" style="margin-top: 5px;"
                            required="required" >)
                    <br>



                    <input type="text" name="d" value="<?php echo thaidate('j'); ?>" readonly="readonly"
                           data-onload="set_size($(this),25)" style="margin-top: 5px;">/
                    <input type="text" name="m" value="<?php echo thaidate('F'); ?>" readonly="readonly"
                           data-onload="set_size($(this),60)" style="margin-top: 5px;">/
                    <input type="text" name="y" value="<?php echo thaidate('Y'); ?>" readonly="readonly"
                           data-onload="set_size($(this),40)" style="margin-top: 5px;"></p>
                    <br><br><br><br>

                    <div class="text-right">
                        <button type="submit" class="btn btn-success">ประเมิน</font></button>
                    </div>
                        <br><br><br><br>
                    </form>
                    <p id="back-top">
                        <a href="#top" style="margin-left: 1200%"><span></span>Back to Top</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>




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